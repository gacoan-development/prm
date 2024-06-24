<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA TIPE ORDER</h4>
        </div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_tipe_order" href="<?= base_url('order_type/form_order_type'); ?>">+ Tambah data tipe order</a>
            <table id="table_master_resto" class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Order Code</th>
                        <th>Order Name</th>
                        <th>Order Service</th>
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
        $('table#table_master_resto').dataTable({
            ajax: {
                url: "<?= base_url('order_type/get_all'); ?>",
                dataSrc: ''
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row+1)
                },
                {
                    data: "order_code"
                },
                {
                    data: "order_name"
                },
                {
                    data: "order_service"
                },
                {
                    data: {
                        order_id: "order_id"
                    },
                    render: function(data){
                        var html = '<div class="text-center form-inline">'+
                                        // '<button type="button" class="btn btn-sm btn-dark"><i class="bi bi-eye"></i></button>&nbsp;'+
                                        '<a type="button" class="btn btn-sm btn-primary edit_order" href="<?= base_url('order_type/form_order_type'); ?>?order='+data.order_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
                                        // '<button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>'+
                                    '</div>';
                        return html;
                    }
                }
            ]
        });
        // alert('ini adalah yang pertama');
    });
</script>
<?= $this->include('layouts/footer') ?>