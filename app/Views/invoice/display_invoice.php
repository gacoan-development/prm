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
                        <th rowspan="2">No. Fee</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Branch Name</th>
                        <th rowspan="2">Region</th>
                        <th colspan="2">Amount</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Procentage</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th>Billed</th>
                        <th>Paid</th>
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
});
$(document).off('change', '#tgl_invoice').on('change', '#tgl_invoice', function(){
    $('#table_master_invoice').DataTable().ajax.reload();
})
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
                data: "billed_nominal"
            },
            {
                data: "pay_off_nominal"
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
                    return parseFloat((parseInt(data.pay_off_nominal)/parseInt(data.billed_nominal))*100).toFixed(2)+' %';
                }
            },
            {
                render: function(){
                    var html = '<div class="text-center form-inline">'+
                                    '<button type="button" class="btn btn-sm btn-dark px-3 py-1"><i class="bi bi-eye"></i></button>&nbsp;'+
                                    '<button type="button" class="btn btn-sm btn-primary px-3 py-1"><i class="bi bi-pencil"></i></button>&nbsp;'+
                                    '<button type="button" class="btn btn-sm btn-danger px-3 py-1"><i class="bi bi-trash"></i></button>'+
                                '</div>';
                    return html;
                }
            }
        ]
    });
}
</script>
<?= $this->include('layouts/footer') ?>