<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">Laporan Parkir Harian</h4>
        </div>
        <div class="col-lg-5"></div>
        <div class="col-lg-2 text-center">
            <input type="text" name="tgl_receive_fee" id="tgl_receive_fee" class="form-control form-control-sm text-center datepicker" value="<?= date('d-m-Y'); ?>">
        </div>
        <div class="col-lg-5"></div>
        <div class="col-lg-12">
            <form action="<?= base_url('report/receive_fee/export_to_excel'); ?>" target="_blank" method="POST">
                <input type="hidden" name="tgl_receive_export" value="<?= date('d-m-Y'); ?>">
                <button type="submit" class="btn btn-sm btn-success text-center text-white"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export to Excel</button>
            </form>
            <!-- <a class="btn btn-sm btn-success p-1" target="_blank" href="<?//= base_url('report/receive_fee/export_to_excel'); ?>">EXPORT KE EXCEL</a> -->
            <table id="table_master_receive_fee" class="table table-bordered table-hover">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Resto</th>
                        <th>Kode Resto</th>
                        <th>Tagihan Bill</th>
                        <th>Setoran Harian Bill</th>
                        <th>Selisih</th>
                        <th>Jumlah Terhutang</th>
                        <th>Persentase Setoran Harian</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $(document).find('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true, 
        changeYear: true
    });
    load_receive_fee_table();
    $(document).off('change', '#tgl_receive_fee').on('change', '#tgl_receive_fee', function(){
        $(document).find('[name="tgl_receive_export"]').val($(this).val());
        // console.log($(document).find('[name="tgl_receive_export"]').val())
        $('#table_master_receive_fee').DataTable().ajax.reload();
    })
});

function load_receive_fee_table(){
    $('table#table_master_receive_fee').dataTable({
        ajax: {
            type: "POST",
            url: "<?= base_url('report/receive_fee/get_all'); ?>",
            data: function(d){
                d.date_receive_fee = $('#tgl_receive_fee').val()
            },
            processing: true,
            serverSide: true,
            dataSrc: ''
        },
        columns: [
            {
                data: null,
                render: (data, type, row, meta) => (meta.row+1)
            },
            {
                data: "nama_resto"
            },
            {
                data: "kode_resto"
            },
            {
                data: "tagihan_bill"
            },
            {
                data: "setoran_harian_bill"
            },
            {
                data: "selisih"
            },
            {
                data: "jumlah_terhutang"
            },
            {
                data: "persentase_setoran_harian"
            },
            {
                data: "keterangan"
            },
        ],
        "language": {
            "sProcessing":    "Memproses...",
            "sLengthMenu":    "Menampilkan _MENU_ baris",
            "sZeroRecords":   "Tidak ada data",
            "sEmptyTable":    "Tidak ada data yang tersedia di tabel ini",
            "sInfo":          "Menampilkan baris _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty":     "Menampilkan baris 0 sampai 0 dari 0 data",
            "sInfoFiltered":  "(disaring dari _MAX_ data)",
            "sInfoPostFix":   "",
            "sSearch":        "Cari:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Memuat...",
            "oPaginate": {
                "sFirst":    "Awal",
                "sLast":    "Akhir",
                "sNext":    "Berikutnya",
                "sPrevious": "Sebelumya"
            },
            "oAria": {
                "sSortAscending":  ": Aktifkan untuk mengurutkan kolom dalam urutan menaik",
                "sSortDescending": ": Aktifkan untuk mengurutkan kolom dalam urutan menurun"
            }
        },
        columnDefs: [
            // { className: 'text-right', targets: [7, 10, 11, 14, 16] },
            { className: 'text-center', targets: [2, 3, 4, 5, 6, 7] },
        ],
    });
}
</script>
<?= $this->include('layouts/footer') ?>