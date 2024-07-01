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
                        parkmanagement_id: "parkmanagement_id",
                        additional_attachments: "additional_attachments"
                    },
                    render: function(data){
                        if(data.additional_attachments != '' && data.additional_attachments != null){
                            var view_html = '<button type="button" class="btn btn-sm btn-dark px-1 py-0 attachment" data-attachment="'+data.additional_attachments+'"><i class="bi bi-file-earmark-image"></i></button>&nbsp;';
                        }else{
                            var view_html = '';
                        }
                        var html = '<div class="form-inline">'+
                                        view_html+
                                        '<a type="button" class="btn btn-sm btn-primary px-1 py-0" href="<?= base_url('pengelola/form_pengelola'); ?>?vendor='+data.parkmanagement_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
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
                { className: 'text-center', targets: [6] },
            ],
        });
        // alert('ini adalah yang pertama');
    });
    $(document).off('click', '.attachment').on('click', '.attachment', function(){
        var origin = 'pengelola';
        var attachment = $(this).data('attachment');
        imageUrl = '<?= base_url('file/viewFile/'); ?>'+origin+'/'+attachment;
        window.open(imageUrl, '_blank');
    })
</script>
<?= $this->include('layouts/footer') ?>