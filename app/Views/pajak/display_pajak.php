<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA MONITORING PAJAK</h4>
        </div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_data_pajak" href="<?= base_url('pajak/form_pajak'); ?>">+ Tambah data pajak</a>
            <table id="table_master_monitoring_pajak" class="table table-bordered table-hover">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Resto</th>
                        <th>Periode</th>
                        <th>Pengelola</th>
                        <th>Jumlah Bayar</th>
                        <th>Keterangan</th>
                        <th>Action</th>
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
        $('table#table_master_monitoring_pajak').dataTable({
            ajax: {
                url: "<?= base_url('pajak/get_all'); ?>",
                dataSrc: ''
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row+1)
                },
                {
                    data: "branch_name"
                },
                {
                    data: "bill_total_periodic"
                },
                {
                    data: "parkmanagement_name"
                },
                {
                    data: "taxpay_total"
                },
                {
                    data: "taxpay_note"
                },
                {
                    data: {
                        taxpay_id: "taxpay_id"
                    },
                    render: function(data){
                        var html = '<div class="text-center form-inline">'+
                                        // '<button type="button" class="btn btn-sm btn-dark"><i class="bi bi-eye"></i></button>&nbsp;'+
                                        '<a type="button" class="btn btn-sm btn-primary px-3 py-1 edit_taxpay" href="<?= base_url('pajak/form_pajak'); ?>?id='+data.taxpay_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
                                        // '<button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>'+
                                    '</div>';
                        return html;
                    }
                }
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
                { className: 'text-center', targets: [4] },
            ],
        });
        // alert('ini adalah yang pertama');
    });
</script>
<?= $this->include('layouts/footer') ?>