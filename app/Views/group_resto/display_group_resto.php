<?= $this->include('layouts/header') ?>
<div class="container-fluid default-dash">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA GROUP RESTO</h4>
        </div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_group_resto" href="<?= base_url('group_resto/form_group_resto'); ?>">+ Tambah data group resto</a>
            <table id="table_master_group_resto" class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Branch Group Code</th>
                        <th>Branch Group Name</th>
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
    var table = $('table#table_master_group_resto').dataTable({
        ajax: {
            url: "<?= base_url('group_resto/get_all'); ?>",
            dataSrc: ''
        },
        createdRow: function (row, data, dataIndex) {
            switch(data['is_active']){
                case "0":
                    // $(row).css('background-color', '#ff0000');
                    $(row).addClass('table-secondary');
                break;
                case "1":
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
                data: "branch_group_code"
            },
            {
                data: "branch_group_name"
            },
            {
                data: {
                    branch_id: "branch_id" 
                },
                render: function(data){
                    var html = '<div class="text-center form-inline">'+
                                    // '<button type="button" class="btn btn-sm btn-dark px-3 py-1"><i class="bi bi-eye"></i></button>&nbsp;'+
                                    '<a type="button" class="btn btn-sm btn-primary px-3 py-1 edit_resto" href="<?= base_url('group_resto/form_group_resto'); ?>?id='+data.branch_group_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
                                    // '<button type="button" class="btn btn-sm btn-danger px-3 py-1"><i class="bi bi-trash"></i></button>'+
                                '</div>';
                    return html;
                }
            }
        ]
    });
});
</script>
<?= $this->include('layouts/footer') ?>