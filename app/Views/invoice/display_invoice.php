<?= $this->include('layouts/header') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">DATA PENAGIHAN (INVOICE)</h4>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-center">
            <div class="input-group mb-3">
                <button class="btn btn-sm btn-dark" type="button" id="button_prev_date"><i class="bi bi-caret-left-fill"></i></button>
                <input type="text" name="tgl_invoice" id="tgl_invoice" class="form-control form-control-sm border-dark text-center datepicker" value="<?= date('d-m-Y'); ?>">
                <button class="btn btn-sm btn-dark" type="button" id="button_next_date"><i class="bi bi-caret-right-fill"></i></button>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-12">
            <a type="button" class="btn btn-sm btn-primary btn_tambah" id="tambah_penagihan" menu-available-for="2 3 4" href="<?= base_url('invoice/form_invoice'); ?>">+ Tambah data penagihan</a>
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
        restrict_input();
    })
});

function load_invoice_table(){
    $('table#table_master_invoice').dataTable({
        ajax: {
            async: false,
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
                    inv_status: "inv_status",
                    billed_nominal: "billed_nominal",
                    pay_off_nominal: "pay_off_nominal"             
                },
                render: function(data){
                    if(data.billed_nominal != 0){
                        if(data.inv_status == '1'){
                            return 'Complete';
                        }else{
                            return 'Outstanding';
                        }
                    }else{
                        return 'outstanding';
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
                    inv_id: 'inv_id',
                    inv_attachment: 'inv_attachment'
                },
                render: function(data){
                    if(data.inv_attachment != '' && data.inv_attachment != null){
                        var view_html = '<button type="button" class="btn btn-sm btn-dark px-1 py-0 attachment" menu-available-for="1 2 3 4 5" data-attachment="'+data.inv_attachment+'"><i class="bi bi-file-earmark-image"></i></button>&nbsp;';
                    }else{
                        var view_html = '';
                    }
                    var html = '<div class="text-center form-inline">'+
                                    view_html+
                                    '<a type="button" class="btn btn-sm btn-primary px-1 py-0 btn_edit" menu-available-for="2 3 4" href="<?= base_url('invoice/form_invoice'); ?>?invoice='+data.inv_id+'"><i class="bi bi-pencil"></i></a>&nbsp;'+
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
    restrict_input();
}
$(document).off('click', '#button_next_date').on('click', '#button_next_date', function(){
    // Get the current date from the input
    let currentDate = $('[name="tgl_invoice"]').val();
        
    // Check if the input has a value in the expected format 'dd-mm-yyyy'
    if (currentDate && /^\d{2}-\d{2}-\d{4}$/.test(currentDate)) {
        // Split the input date to get day, month, and year
        let parts = currentDate.split('-');
        let day = parseInt(parts[0], 10);
        let month = parseInt(parts[1], 10) - 1; // Month is zero-based
        let year = parseInt(parts[2], 10);
        
        // Create a new Date object
        let date = new Date(year, month, day);
        
        // Increment the date by one day
        date.setDate(date.getDate() + 1);
        
        // Format the date back to 'dd-mm-yyyy' format
        let newDay = ('0' + date.getDate()).slice(-2); // Add leading zero
        let newMonth = ('0' + (date.getMonth() + 1)).slice(-2); // Add leading zero
        let newYear = date.getFullYear();
        let nextDate = `${newDay}-${newMonth}-${newYear}`;
        
        // Set the new date back to the input
        $('[name="tgl_invoice"]').val(nextDate).trigger('change');
    } else {
        alert('Please enter a date in the format dd-mm-yyyy.');
    }
})
$(document).off('click', '#button_prev_date').on('click', '#button_prev_date', function(){
    // Get the current date from the input
    let currentDate = $('[name="tgl_invoice"]').val();
        
    // Check if the input has a value in the expected format 'dd-mm-yyyy'
    if (currentDate && /^\d{2}-\d{2}-\d{4}$/.test(currentDate)) {
        // Split the input date to get day, month, and year
        let parts = currentDate.split('-');
        let day = parseInt(parts[0], 10);
        let month = parseInt(parts[1], 10) - 1; // Month is zero-based
        let year = parseInt(parts[2], 10);
        
        // Create a new Date object
        let date = new Date(year, month, day);
        
        // Increment the date by one day
        date.setDate(date.getDate() - 1);
        
        // Format the date back to 'dd-mm-yyyy' format
        let newDay = ('0' + date.getDate()).slice(-2); // Add leading zero
        let newMonth = ('0' + (date.getMonth() + 1)).slice(-2); // Add leading zero
        let newYear = date.getFullYear();
        let nextDate = `${newDay}-${newMonth}-${newYear}`;
        
        // Set the new date back to the input
        $('[name="tgl_invoice"]').val(nextDate).trigger('change');
    } else {
        alert('Please enter a date in the format dd-mm-yyyy.');
    }
});
$(document).off('click', '.attachment').on('click', '.attachment', function(){
    var origin = 'invoice';
    var attachment = $(this).data('attachment');
    imageUrl = '<?= base_url('file/viewFile/'); ?>'+origin+'/'+attachment;
    window.open(imageUrl, '_blank');
})
</script>
<?= $this->include('layouts/footer') ?>