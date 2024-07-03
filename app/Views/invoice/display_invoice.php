<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA PENAGIHAN (INVOICE)</h4>
        </div>
        <div class="col-lg-5"></div>
        <div class="col-lg-2 text-center">
            <input type="text" name="tgl_invoice" id="tgl_invoice" class="form-control form-control-sm text-center datepicker" value="<?= date('d-m-Y'); ?>">
        </div>
        <div class="col-lg-5"></div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_penagihan" href="<?= base_url('invoice/form_invoice'); ?>">+ Tambah data penagihan</a>
            <table id="table_master_invoice" class="table table-bordered table-hover">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">No. Tagihan</th>
                        <th rowspan="2">Tanggal</th>
                        <th rowspan="2">Nama Cabang</th>
                        <th rowspan="2">Area</th>
                        <th colspan="2">Jumlah</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Persentase</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Tertagih</th>
                        <th>Terbayar</th>
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
    load_invoice_table();
    $(document).off('change', '#tgl_invoice').on('change', '#tgl_invoice', function(){
        $('#table_master_invoice').DataTable().ajax.reload();
    })
});

function load_invoice_table(){
    $('table#table_master_invoice').dataTable({
        ajax: {
            type: "POST",
            url: "<?= base_url('invoice/get_all'); ?>",
            data: function(d){
                d.date_invoice = $('#tgl_invoice').val()
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
                data: "inv_code"
            },
            {
                data: "inv_date"
            },
            {
                data: "branch_name"
            },
            {
                data: "branch_group_name"
            },
            {
                data: {
                    billed_nominal: "billed_nominal"
                },
                render: function(data){
                    return rupiah(data.billed_nominal);
                }
            },
            {
                data: {
                    pay_off_nominal: "pay_off_nominal"
                },
                render: function(data){
                    return rupiah(data.pay_off_nominal);
                }
            },
            {
                data: {
                    inv_status: "inv_status"                    
                },
                render: function(data){
                    if(data.inv_status == '1'){
                        return 'Complete';
                    }else{
                        return 'Outstanding';
                    }
                }
            },
            {
                data: {
                    billed_nominal: "billed_nominal",
                    pay_off_nominal: "pay_off_nominal"
                },
                render: function(data){
                    if(parseInt(data.pay_off_nominal) != 0 && parseInt(data.billed_nominal) != 0){
                        return parseFloat((parseInt(data.pay_off_nominal)/parseInt(data.billed_nominal))*100).toFixed(2)+' %';
                    }else{
                        return '0 %';
                    }
                }
            },
            {
                data: {
                    'inv_id': 'inv_id'
                },
                render: function(data){
                    var html = '<div class="text-center form-inline">'+
                                    // '<button type="button" class="btn btn-sm btn-dark px-3 py-1"><i class="bi bi-eye"></i></button>&nbsp;'+
                                    // '<button type="button" class="btn btn-sm btn-primary px-3 py-1"><i class="bi bi-pencil"></i></button>&nbsp;'+
                                    '<a type="button" class="btn btn-sm btn-primary px-1 py-0" href="<?= base_url('invoice/form_invoice'); ?>?invoice='+data.inv_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
                                    // '<button type="button" class="btn btn-sm btn-danger px-3 py-1"><i class="bi bi-trash"></i></button>'+
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
            { className: 'text-center', targets: [2, 3, 4, 5, 6, 7, 8] },
        ],
    });
}
</script>
<?= $this->include('layouts/footer') ?>