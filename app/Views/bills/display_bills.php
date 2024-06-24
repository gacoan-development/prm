<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA BILLS</h4>
        </div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_pengelola" href="<?= base_url('pengelola/form_pengelola'); ?>">+ Tambah data bills</a>
            <table id="table_master_resto" class="table table-bordered table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Kode Pengelola</th>
                        <th>Nama Pengelola</th>
                        <th>Handphone</th>
                        <th>No. KTP</th>
                        <th>Cabang Resto</th>
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
                url: "<?= base_url('pengelola/get_all'); ?>",
                dataSrc: ''
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row+1)
                },
                {
                    data: "parkmanagement_code"
                },
                {
                    data: "parkmanagement_name"
                },
                {
                    data: "parkmanagement_num"
                },
                {
                    data: "parkmanagement_nik"
                },
                {
                    data: "branch_name"
                },
                {
                    render: function(){
                        var html = '<div class="text-center form-inline">'+
                                        '<button type="button" class="btn btn-sm btn-dark"><i class="bi bi-eye"></i></button>&nbsp;'+
                                        '<button type="button" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>&nbsp;'+
                                        '<button type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>'+
                                    '</div>';
                        return html;
                    }
                }
            ]
        });
        // alert('ini adalah yang pertama');
    });
</script>
<?= $this->endSection() ?>