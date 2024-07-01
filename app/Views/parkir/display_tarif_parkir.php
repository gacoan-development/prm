<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA TARIF PARKIR</h4>
        </div>
        <div class="col-lg-12" style="overflow: auto;">
            <div class="text-end">
                <button type="button" class="btn btn-sm px-3" style="background-color: #d4edda"></button>: Tarif berlaku &emsp;
                <button type="button" class="btn btn-sm px-3" style="background-color: #fff3cd"></button>: Tarif < seminggu akan kadaluwarsa &emsp;
                <button type="button" class="btn btn-sm px-3" style="background-color: #f8d7da"></button>: Tarif kadaluwarsa <br/>
            </div>
            <a type="button" class="btn btn-sm btn-primary" id="tambah_tarif_parkir" href="<?= base_url('tarif_parkir/form_parkir'); ?>">+ Tambah data tarif parkir</a>
            <table id="table_master_tarif_parkir" class="table table-bordered table-hover">
                <thead class="bg-primary text-center text-white">
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2" class="text-center">Kode Cabang</th>
                        <th rowspan="2" class="text-center">Nama Cabang</th>
                        <th rowspan="2" class="text-center">Area</th>
                        <th colspan="2" class="text-center">Tanggal Berlaku</th>
                        <th rowspan="2" class="text-center">Jenis Tagihan</th>
                        <th rowspan="2" class="text-center">Pengelola</th>
                        <th rowspan="2" class="text-center">Aksi</th>
                    </tr>
                    <tr>
                        <!-- <td>Status</td> -->
                        <th class="text-center">Mulai</th>
                        <th class="text-center">Berakhir</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_fee_history" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">FEE HISTORY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover" id="table_fee_history">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fee Type</th>
                            <th>Active Date</th>
                            <th>Exp Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    // $(document).find('[data-toggle="tooltip"]').tooltip();
    $('table#table_master_tarif_parkir').dataTable({
        ajax: {
            url: "<?= base_url('tarif_parkir/get_all'); ?>",
            dataSrc: ''
        },
        createdRow: function (row, data, dataIndex) {
            switch(data['active_status']){
                case "1_active": // aktif
                    $(row).addClass('table-success');
                break;
                case "2_notdeclared": // nggak ada fee header atau (fee header dan detailnya)
                    // row warna putih
                break;
                case "3_warning": // waktu expired <= seminggu
                    $(row).addClass('table-warning');
                break;
                case "4_expired": // now > waktu berakhir tarif parkir
                    $(row).addClass('table-danger');
                break;
                default:
                    // $(row).addClass('table-success');
                break;
            }
        },
        columns: [
            {
                data: null,
                render: (data, type, row, meta) => (meta.row+1)
            },
            {
                data: "branch_code"
            },
            {
                data: "branch_name"
            },
            {
                data: "branch_group_name"
            },
            {
                data: {
                    fee_date_active: "fee_date_active"
                },
                render: function(data){
                    if(data.fee_date_active == null){
                        return '-';
                    }else{
                        return data.fee_date_active;
                    }
                }
            },
            {
                data: {
                    fee_date_exp: "fee_date_exp",
                    active_status: "active_status"
                },
                render: function(data){
                    if(data.active_status == 'expired'){
                        return '<i class="text-danger">'+data.fee_date_exp+'</i>';
                    }else{
                        if(data.fee_date_exp == null){
                            return '-';
                        }else{
                            return data.fee_date_exp;
                        }
                    }
                }
            },
            {
                data: "revenue_sharing_type"
            },
            {
                data: "parkmanagement_name"
            },
            {
                data: {
                    branch_id: "branch_id",
                    fee_id: "fee_id",
                    active_status: "active_status"
                },
                render: function(data){
                    var fee_id_param = '';
                    if(data.fee_id != null){
                        fee_id_param = '&fee='+data.fee_id;
                    }
                    if(data.active_status != '3_warning' && data.active_status != '4_expired'){
                        var edit_tarif_html = '<a type="button" class="btn btn-sm btn-primary px-3 py-1" href="<?= base_url('tarif_parkir/form_parkir'); ?>?branch='+data.branch_id+fee_id_param+'"><i class="bi bi-pencil"></i></a>&nbsp;';
                    }else{
                        var edit_tarif_html = '';
                    }
                    var html = '<div class="text-center form-inline">'+
                                    '<button type="button" class="btn btn-sm btn-dark px-3 py-1 fee_history" data-branch-id="'+data.branch_id+'"><i class="bi bi-eye"></i></button>&nbsp;'+
                                    edit_tarif_html+
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
        }
    });
});
$(document).off('click', '.fee_history').on('click', '.fee_history', function(){
    var branch_id = $(this).data('branch-id');
    $.ajax({
        type: "POST",
        url: "<?= base_url('tarif_parkir/get_fee_history') ?>",
        data: {
            branch_id: branch_id
        },
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            var appended_html = '';
            if(response.length > 0){
                for(var keys in response){
                    appended_html += '<tr>'+
                                        '<td>'+(parseInt(keys)+1)+'</td>'+
                                        '<td>'+response[keys].revenue_sharing_type+'</td>'+
                                        '<td>'+response[keys].fee_date_active+'</td>'+
                                        '<td>'+response[keys].fee_date_exp+'</td>'+
                                    '</tr>';
                }
            }else{
                appended_html += '<tr><td colspan="100%" class="text-center"><b class="text-danger">Tidak ada data.</b></td></tr>';
            }
            $(document).find('table#table_fee_history tbody').empty().append(appended_html);
            $(document).find('#modal_fee_history').modal('show');
        }
    });
})
</script>
<?= $this->include('layouts/footer') ?>