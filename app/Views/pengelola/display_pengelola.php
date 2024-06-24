<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA PENGELOLA</h4>
        </div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_pengelola" href="<?= base_url('pengelola/form_pengelola'); ?>">+ Tambah data pengelola</a>
            <table id="table_master_resto" class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
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
                    data: {
                        branch_name: "branch_name"
                    },
                    render: function(data){
                        var branch_name = data.branch_name;
                        if(branch_name != null){
                            branch_name = branch_name.split('?');
                            var branch_name_html = '<ul>';
                            for(var keys in branch_name){
                                branch_name_html += '<li>'+branch_name[keys]+'</li>';
                            }
                            branch_name_html += '</ul>';
                            return branch_name_html;
                        }else{
                            return '-';
                        }
                    }
                },
                {
                    data: {
                        parkmanagement_id: "parkmanagement_id"
                    },
                    render: function(data){
                        var html = '<div class="text-center form-inline">'+
                                        // '<button type="button" class="btn btn-sm btn-dark px-3 py-1"><i class="bi bi-eye"></i></button>&nbsp;'+
                                        '<a type="button" class="btn btn-sm btn-primary px-3 py-1" href="<?= base_url('pengelola/form_pengelola'); ?>?vendor='+data.parkmanagement_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
                                        // '<button type="button" class="btn btn-sm btn-danger px-3 py-1"><i class="bi bi-trash"></i></button>'+
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