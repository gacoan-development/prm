<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA PENGGUNA</h4>
        </div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary" id="tambah_user" href="<?= base_url('users/form_users'); ?>">+ Tambah data pengguna</a>
            <table id="table_master_user" class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama Pengguna</th>
                        <th>Grup Pengguna</th>
                        <th>Wilayah</th>
                        <th>Area Manajerial</th>
                        <th>Keaktifan</th>
                        <th>Aksi</th>
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
        $('table#table_master_user').dataTable({
            ajax: {
                url: "<?= base_url('users/get_all'); ?>",
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
                    data: "user_nik"
                },
                {
                    data: "user_name"
                },
                {
                    data: "group_name"
                },
                {
                    data: "wilayah"
                },
                {
                    data: "cabang"
                },
                {
                    data: {
                        is_active: "is_active"
                    },
                    render: function(data){
                        switch(data.is_active){
                            case "1":
                                return '<button type="button" class="btn btn-sm btn-success">AKTIF</button>';
                            break;
                            case "0":
                                return '<button type="button" class="btn btn-sm btn-secondary">TIDAK AKTIF</button>';
                            break;
                            default:
                                return '';
                            break;
                        }
                    }
                },
                {
                    data: {
                        user_id: "user_id"
                    },
                    render: function(data){
                        var html = '<div class="form-inline">'+
                                        '<a type="button" class="btn btn-sm btn-primary px-1 py-0" href="<?= base_url('users/form_users'); ?>?user='+data.user_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
                                        // '<button type="button" class="btn btn-sm btn-danger px-3 py-1"><i class="bi bi-trash"></i></button>'+
                                    '</div>';
                        return html;
                        return '<button type="button" class="btn btn-sm btn-danger px-3 py-1"><i class="bi bi-trash"></i></button>';
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