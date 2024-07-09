<?= $this->include('layouts/header') ?>
<?php 
    $session = \Config\Services::session();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">BUAT PENAGIHAN (INVOICE)</h4>
            <button class="btn btn-sm btn-success d-none float-end" id="managerial_area_list" data-toggle="tooltip" data-placement="bottom" data-html="true" title="">Resto yang ditangani</button>
        </div>
        <div class="col-lg-12">
            <div class="card border-dark mt-2">
                <div class="card-header border-dark bg-primary text-white text-center p-1">
                    <h6>RESTO</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover" width="80%">
                                <tbody>
                                    <tr>
                                        <td>Nama Resto</td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm selectpicker" name="nama_resto">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Resto</td>
                                        <td>:</td>
                                        <td><div id="kode_resto"> - </div></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><div id="alamat_resto"> - </div></td>
                                    </tr>
                                    <tr>
                                        <td>Region</td>
                                        <td>:</td>
                                        <td><div id="region_resto"> - </div></td>
                                    </tr>
                                    <tr>
                                        <td>Pengelola</td>
                                        <td>:</td>
                                        <td><div id="pic_resto"> - </div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover" width="80%">
                                <tbody>
                                    <tr>
                                        <td>Tanggal Invoice</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="tgl_invoice" id="" class="form-control form-control-sm text-center datepicker serialize required" data-title="Tanggal Invoice" value="<?= date('d-m-Y') ?>"></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>
                                            <textarea name="ket_invoice" id="ket_invoice" class="form-control form-control-sm serialize" style="resize: none;"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="div_buat_penagihan" class="col-lg-12 text-center d-none">
                            <button type="button" class="btn btn-sm btn-success" id="create_invoice">BUAT PENAGIHAN</button>
                            <button type="button" class="btn btn-sm btn-danger batal_form_invoice">BATAL</button>
                        </div>
                        <div id="div_nomor_penagihan" class="col-lg-12 text-center d-none">
                            <div id="alert_penagihan" class="alert alert-sm alert-success p-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="detail_penagihan" class="col-lg-12 d-none">
            <div class="card border-dark mt-0">
                <!-- <div class="card-header border-dark bg-primary text-white text-center p-1">
                    <h6>FORM PENAGIHAN (INVOICE)</h6>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12" style="overflow: auto;">
                            <table class="table table-bordered table-hover">
                                <thead class="text-center bg-primary">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nomor Penagihan</th>
                                        <th>Total Penagihan</th>
                                        <th>Jumlah Terbayar</th>
                                        <th>Jumlah Terutang / Selisih</th>
                                        <th class="invoice_now_setor">Jumlah Setor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" id="tgl_invoice"></td>
                                        <td class="text-center" id="kode_invoice"></td>
                                        <td class="text-center" id="total_invoice"></td>
                                        <td class="text-center" id="terbayar_invoice"></td>
                                        <td class="text-center" id="terutang_invoice"></td>
                                        <td class="invoice_now_setor text-center"><input type="text" class="form-control form-control-sm text-center number" name="setor_invoice" placeholder="..." value="0"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12" style="overflow: auto;">
                            Jenis tarif yang berlaku: <i class="text-primary" id="jenis_tarif"></i>
                            <div id="div_tabel_detail_flat" class="d-none ms-5">
                                <table class="table-condensed table-bordered table-hover" width="30%" style="border: solid black 1px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center bg-primary">Nominal</th>
                                            <td width="1%">:</td>
                                            <td id="nominal_flat" class="text-center"></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div id="div_tabel_detail_persen" class="d-none ms-5">
                                <table class="table table-bordered table-hover" id="tabel_detail_persen">
                                    <thead class="text-center bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Order</th>
                                            <th>Nama Order</th>
                                            <th>Tipe Tarif</th>
                                            <th>Nominal / Persen</th>
                                            <th>Jumlah Bill / Nominal Pendapatan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3" style="overflow: auto;" id="div_invoice_outstanding">
                            <h6 class="text-center">List Invoice Oustanding</h6>
                            <table class="table table-bordered table-hover" id="tabel_invoice_outstanding">
                                <thead class="text-center bg-danger">
                                    <tr>
                                        <th><input class="form-check-input" type="checkbox" id="select_all_invoice_outstanding"></th>
                                        <th>Tanggal</th>
                                        <th>Nomor Penagihan</th>
                                        <th>Total Penagihan</th>
                                        <th>Jumlah Terbayar</th>
                                        <th>Jumlah Terutang / Selisih</th>
                                        <th>Jumlah Setor</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-none" id="div_detail_tarif_flat">
                        <div class="col-lg-12">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text">Nominal (Flat)</span>
                                <input type="text" class="form-control serialize number" name="nominal_flat" aria-label="Sizing example input" aria-describedby="nominal_flat">
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="div_detail_tarif_dinamis">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-sm btn-primary mt-2 add-dynamic-table">+ Tambah Tarif</button>
                            <table class="table table-condensed table-bordered table-hover dynamic-table text-center mt-2" id="tabel_detail_tarif">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Order Code</th>
                                        <th>Order Name</th>
                                        <th>Tipe Tarif</th>
                                        <th width="20%">Nominal/Persen</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 text-center" id="action_button_compilation">
                            <button type="button" class="btn btn-sm py-0 px-3 btn-info" id="cetak_form_invoice" data-toggle="tooltip" data-placement="bottom" title="Cetak Invoice"><i data-feather="printer"></i> Cetak</button>
                            <button type="button" class="btn btn-sm py-0 px-3 btn-success" id="simpan_form_invoice" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i data-feather="save"></i> Simpan</button>
                            <button type="button" class="btn btn-sm py-0 px-3 btn-primary" id="upload_form_invoice" data-toggle="tooltip" data-placement="bottom" title="Upload Invoice" data-inv_id_upload=""><i data-feather="upload"></i> Unggah</button>
                            <button type="button" class="btn btn-sm py-0 px-3 btn-danger batal_form_invoice" data-toggle="tooltip" data-placement="bottom" title="Batal Isi Invoice"><i data-feather="x"></i> Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="modal_upload">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Upload Invoice</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-hover w-100">
                <tr>
                    <td>Pilih File</td>
                    <td><input type="file" class="form-control" name="invoice_attachment" id=""></td>
                    <td><input type="hidden" name="inv_id_upload"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="upload_invoice_action">Upload</button>
        </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    var print_type = 0;
    var outstanding_invoice_array;
    var user_group_code = '<?= $session->get('user_group_code'); ?>';
    var managerial_area_list = '<?= $session->get('managerial_area'); ?>';
    if(!!managerial_area_list){
        managerial_area_list = JSON.parse(managerial_area_list);
    }
    $(document).find('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true, 
        changeYear: true
    })
    $(document).find('select[name="nama_resto"]').select2({
        tokenSeparators: [',', ' '],
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        width: '100%',
        ajax: {
            url: '<?= base_url('invoice/get_all_resto'); ?>',
            dataType: "json",
            type: "POST",
            data: function (params) {
                var queryParameters = {
                    term: params.term,
                    user_group_code: user_group_code,
                    managerial_area_list: managerial_area_list
                }
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.value,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        },
        placeholder: 'Masukkan nama resto'
    });
    $(document).off('change', '[name="nama_resto"]').on('change', '[name="nama_resto"]', function(){
        var selected_value = $(this).find('option:selected').val();
        var branch_code = branch_address = branch_group = parkmanagement_name = '';

        // cek dulu apakah resto ini punya tarif yang sedang berlaku
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/check_fee_header') ?>",
            data: {
                branch_id: selected_value
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if(response.length > 0){
                    if(response[0].fee_status == 'applied'){
                        $.ajax({
                            async: false,
                            type: "GET",
                            url: "<?= base_url('pengelola/get_resto_not_managed_detail') ?>",
                            data: {
                                branch_id: selected_value
                            },
                            dataType: "JSON",
                            success: function (response) {
                                // console.log(response);
                                branch_code = response[0].branch_code;
                                $(this).closest('tr').find('[name="kode_resto"]').val(branch_code);
                                branch_address = response[0].branch_address;
                                branch_group = response[0].branch_group_name;
                                parkmanagement_name = response[0].parkmanagement_name;
                            }
                        });
                        $(document).find('div#kode_resto').html(branch_code);
                        $(document).find('div#alamat_resto').html(branch_address);
                        $(document).find('div#region_resto').html(branch_group);
                        $(document).find('div#pic_resto').html(parkmanagement_name);
                        $(document).find('div#div_buat_penagihan').removeClass('d-none');

                    }else if(response[0].fee_status == 'not_applied'){
                        Swal.fire({
                            icon: "warning",
                            title: "Perhatian!",
                            text: "Tarif parkir untuk resto ini sudah kadaluwarsa / belum ada. Mohon untuk memperbarui data tarif parkir resto tsb.",
                            allowOutsideClick: false,
                            showConfirmButton: true
                        })
                    }
                }else if(response.length == 0){
                    Swal.fire({
                        icon: "warning",
                        title: "Perhatian!",
                        text: "Tarif parkir untuk resto ini belum ada. Mohon isi tarif parkir terlebih dahulu.",
                        allowOutsideClick: false,
                        showConfirmButton: true
                    })
                }
            }
        });
    });
    debtCalc();

    // autofill data resto
    var inv_id = '<?= $this->data['inv_id']; ?>';
    if(inv_id != ''){ 
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/get_data_by_id'); ?>",
            data: {
                inv_id: inv_id
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if(response.length > 0){
                    $(document).find('[name="nama_resto"]').append('<option value="'+response[0].branch_id+'">'+response[0].branch_name+'</option>').trigger('change');
                    $(document).find('[name="tgl_invoice"]').val(response[0].inv_date);
                    $(document).find('#create_invoice').trigger('click');
                    $(document).find('.swal2-deny').trigger('click');
                }
            }
        });
    }
    var managerial_area_list = '<?= $session->get('managerial_area'); ?>';
    var user_group_code = '<?= $session->get('user_group_code'); ?>';
    if(!!managerial_area_list){
        managerial_area_list = JSON.parse(managerial_area_list);
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/get_managerial_area'); ?>",
            data: {
                user_group_code: user_group_code,
                managerial_area_list: managerial_area_list
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                var html = '<ul>';
                for(var keys in response){
                    html += '<li>'+response[keys].branch_name+'</li>';
                }
                html += '</ul>';
                $('button#managerial_area_list').attr('title', html).removeClass('d-none');
            }
        });
    }
    $('[data-toggle="tooltip"]').tooltip({
        html: true
    });
    sync_row_dynamic_table();
});

$(document).off('click', '#create_invoice').on('click', '#create_invoice', function(){
    var branch_id = $('[name="nama_resto"]').find('option:selected').val();
    var tgl_invoice = $('[name="tgl_invoice"]').val();
    var inv_note = $('[name="ket_invoice"]').val();
    var user_nik = '<?= $session->get('user_nik') ?>';

    if(branch_id != null && tgl_invoice != null){
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/check_invoice_number'); ?>",
            data: {
                branch_id: branch_id,
                inv_date: tgl_invoice
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response)
                if(response.length == 0){ // belum ada data invoice pada branch tsb dan tanggal tsb
                    $.ajax({
                        async: false,
                        type: "POST",
                        url: "<?= base_url('invoice/save_invoice_header'); ?>",
                        data: {
                            branch_id: branch_id,
                            inv_date: tgl_invoice,
                            user_nik: user_nik,
                            inv_note: inv_note
                        },
                        dataType: "JSON",
                        success: function (response) {
                            // console.log(response);
                            if(typeof response == 'object'){
                                if(response.affected_rows > 0){
                                    Swal.fire({
                                        icon: "success",
                                        title: "Sukses!",
                                        html: "Sukses membuat penagihan <br/>(nomor penagihan: "+response.inv_code+").",
                                        showConfirmButton: true,
                                        allowOutsideClick: false
                                    })
                                    .then((feedback)=>{
                                        if(feedback.isConfirmed){
                                            load_invoice(branch_id, tgl_invoice);
                                            load_outstanding_invoice(branch_id, tgl_invoice);
                                        }
                                    })
                                }
                            }else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal!",
                                    html: "Gagal membuat penagihan. Silahkan menghubungi IT Support.",
                                    showConfirmButton: true,
                                    allowOutsideClick: false
                                })
                            }
                        }
                    });
                }else if(response.length > 0){
                    var invoice_number = response[0].inv_code;
                    var user_created = response[0].user_name;
                    var inv_attachment = response[0].inv_attachment;
                    if(inv_attachment != ''){
                        Swal.fire({
                            icon: "warning",
                            title: "Perhatian!",
                            html: "Nomor penagihan pada resto tsb dan tanggal tsb sudah ada dan sudah <u>diselesaikan</u>. <ul><li>Inv Code: "+invoice_number+"</li><li>User: "+user_created+"</li></ul>",
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            showDenyButton: true, // pake deny soalnya supaya gampang aja
                            denyButtonText: "Lihat",
                            denyButtonColor: "#00bfff"
                        })
                        .then((feedback)=>{
                            if(feedback.isDenied){
                                load_invoice(branch_id, tgl_invoice);
                                load_outstanding_invoice(branch_id, tgl_invoice);
                                $(document).find('#action_button_compilation').addClass('d-none');
                            }
                        })
                    }else{
                        Swal.fire({
                            icon: "warning",
                            title: "Perhatian!",
                            html: "Nomor penagihan pada resto tsb dan tanggal tsb sudah ada. <ul><li>Inv Code: "+invoice_number+"</li><li>User: "+user_created+"</li></ul>",
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            showDenyButton: true, // pake deny soalnya supaya gampang aja
                            denyButtonText: "Edit",
                            denyButtonColor: "#00bfff"
                        })
                        .then((feedback)=>{
                            if(feedback.isDenied){
                                load_invoice(branch_id, tgl_invoice);
                                load_outstanding_invoice(branch_id, tgl_invoice);
                            }
                        })
                    }                    
                }
            }
        });
    }
    else{
        Swal.fire({
            icon: "warning",
            title: "Perhatian",
            text: "Resto / Tanggal penagihan masih kosong. Mohon dicek kembali.",
            allowOutsideClick: false,
            showConfirmButton: true
        })
    }
})

$(document).off('keyup', '.bill_amount').on('keyup', '.bill_amount', function(){
    var nominal = $(this).closest('tr').find('.fee_nominal').data('nominal');
    var calculation_type = $(this).data('calculation-type');
    // console.log(calculation_type);

    switch(calculation_type){
        case "F": // berarti flat, langsung dikalikan jumlah bill dan flat nya berapa
            var bill_amount = parseInt(nominal)*parseInt($(this).val());
        break;
        case "P": // nominal persennya dibagi seratus dulu baru dikalikan dengan jumlah nominal rupiah pemasukan dari pengelola parkir
            var bill_amount = (parseInt(nominal)/100)*parseInt($(this).val());
        break;
    }    
    $(this).closest('tr').find('.total_per_order').val(bill_amount);

    var sum = 0;
    var every_input = $(this).closest('tbody').find('.total_per_order');
    every_input.each(function(index, element){
        sum += parseInt($(element).val());
    })
    $(document).find('#sum_bill_amount').val(sum);
    $(document).find('#total_invoice').html(sum);

    debtCalc();
})

$(document).off('keyup', '[name="setor_invoice"]').on('keyup', '[name="setor_invoice"]', function(){
    debtCalc();
})

function load_master_area(){
    var area_element = $('select[name="area_resto"]');
    $.ajax({
        async: false,
        type: "get",
        url: '<?= base_url('resto/get_master_area'); ?>',
        // data: "data",
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            if(response.length > 0){
                var options;
                for(var keys in response){
                    options += '<option value="'+response[keys].branch_group_id+'">'+response[keys].branch_group_name+'</option>';
                }
                area_element.html(options);
            }
        }
    });
}

$(document).off('click', 'button.add-dynamic-table').on('click', 'button.add-dynamic-table', function(){
    var table_target = $(this).next('.dynamic-table');
    var table_target_id = $(this).next('.dynamic-table').attr('id');
    if($(this).next('.dynamic-table').find('tbody tr.row_none').length > 0){
        $(this).next('.dynamic-table').find('tbody tr.row_none').remove();
    }
    switch(table_target_id){
        case "tabel_detail_tarif":
            var appended =  '<tr>'+
                                '<td class="index"></td>'+
                                '<td>'+
                                    '<select class="form-control form-control-sm" name="kode_order">'+
                                        '<option value="null" selected disabled>-- Pilih Order --</option>'+
                                    '</select>'+
                                '</td>'+
                                '<td><div class="order_name"></div></td>'+
                                '<td>'+
                                    '<select class="form-control form-control-sm" name="tipe_tarif">'+
                                        '<option value="F">FLAT</option>'+
                                        '<option value="P">PERCENTAGE</option>'+
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="input-group">'+
                                        '<span class="input-group-text rupiah_marker d-none">Rp.</span>'+
                                        '<input class="form-control form-control-sm text-center" name="nominal_tarif">'+
                                        '<span class="input-group-text percent_marker d-none">%</span>'+
                                    '</div>'+
                                '</td>'+
                                '<td><button type="button" class="btn btn-sm btn-danger sub-dynamic-table">-</button></td>'+
                            '</tr>';
            table_target.find('tbody').append(appended);
            $.ajax({
                async: false,
                type: "POST",
                url: "<?= base_url('tarif_parkir/get_master_order') ?>",
                // data: "data",
                dataType: "JSON",
                success: function (response) {
                    // console.log(response);
                    var order_option = '';
                    for(var keys in response){
                        order_option += '<option value="'+response[keys].order_id+'" data-order-name="'+response[keys].order_name+'">'+response[keys].order_code+'</option>';
                    }
                    table_target.find('tr:last').find('[name="kode_order"]').append(order_option)
                }
            });
        break;
    }
    sync_row_dynamic_table(table_target_id);
})

$(document).off('click', '.sub-dynamic-table').on('click', '.sub-dynamic-table', function(){
    var table_target_id = $(this).next('.dynamic-table').attr('id');
    $(this).closest('tr').remove();
    sync_row_dynamic_table(table_target_id);
})

$(document).off('change', '[name="kode_order"]').on('change', '[name="kode_order"]', function(){
    var selected_value = $(this).find('option:selected').val();
    var this_index = $(this).closest('tr').index();
    var same_order_type = false;
    $(this).closest('tbody').find('tr').each(function(index, element){
        if(index != this_index){
            if($(element).find('[name="kode_order"]').val() == selected_value){
                same_order_type = true;
            }
        }
    })
    if(same_order_type){
        Swal.fire({
            icon: "warning",
            title: "Perhatian",
            text: "Ada kode order yang sama. Mohon dicek kembali.",
            allowOutsideClick: false,
            showConfirmButton: true
        })
        .then((feedback)=>{
            if(feedback.isConfirmed){
                $(this).val(null);
                $(this).closest('tr').find('div.order_name').html('');
            }
        })
    }else{
        var selected_order_name = $(this).find('option:selected').data('order-name');
        $(this).closest('tr').find('div.order_name').html(selected_order_name);
    }
});

$(document).off('change', '[name="tipe_komisi"]').on('change', '[name="tipe_komisi"]', function(){
    // alert($(this).val());
    var this_value = $(this).val();

    switch(this_value){
        case "3":
        case "4":
            $(document).find('#div_detail_tarif_dinamis').removeClass('d-none');
            $(document).find('#div_detail_tarif_flat').addClass('d-none');
        break;
        default:
            $(document).find('#div_detail_tarif_dinamis').addClass('d-none');
            // $(document).find('#tabel_detail_tarif').find('tbody').empty();
            $(document).find('#div_detail_tarif_flat').removeClass('d-none');
        break;
    }
})

$(document).off('change', '[name="tipe_tarif"]').on('change', '[name="tipe_tarif"]', function () {
    var this_value = $(this).val();
    var this_tr = $(this).closest('tr');

    if(this_value == "P"){
        this_tr.find('[name="nominal_tarif"]').prev('.rupiah_marker').addClass('d-none');
        this_tr.find('[name="nominal_tarif"]').next('.percent_marker').removeClass('d-none');
    }else if(this_value == 'F'){
        this_tr.find('[name="nominal_tarif"]').prev('.rupiah_marker').removeClass('d-none');
        this_tr.find('[name="nominal_tarif"]').next('.percent_marker').addClass('d-none');
    }
});

$('button#simpan_form_tarif_parkir').off('click').on('click', function(){
    var passed = true;
    var not_passed_comp = [];
    $('.required').each(function(index, element){
        var type = $(element).attr('type');
        var name = $(element).data('title');
        switch(type){
            case "text":
            case "radio":
                if($(element).val() == ''){
                    passed = false;
                    not_passed_comp.push(name);
                }
            break;
            default:
                if($(element).val() == '' || $(element).val() == null){
                    passed = false;
                    not_passed_comp.push(name);
                }
            break;
        }
    })
    if(!passed){
        var html = 'Field masih kosong: <ul>';
        for(var keys in not_passed_comp){
            html += '<li>'+not_passed_comp[keys]+'</li>';
        }
        html += '</ul>';
        Swal.fire({
            icon: "error",
            title: "Perhatian!",
            html: html,
            allowOutsideClick: false,
        })
    }else if(passed){
        // var fee_code = $('[name="kode_tarif_parkir"]').val();
        // var fee_id = '<?// = $this->data['fee_id']; ?>';
        // var user_nik = '<?// = $session->get('user_nik') ?>';
        // var branch_id = '<?// = $this->data['branch_id']; ?>';
        // var data = $('.serialize').filter(function(index, element) {
        //                 return $(element).val() != '';
        //             }).serializeArray();
        // if($('#tabel_detail_tarif').find('input, select').length > 0){ // kalau ada detailnya baru di push, kalo ndak ada ya ngapain wkwk
        //     var detail_tarif_parkir_compilation = [];
        //     var detail_tarif =  $('#tabel_detail_tarif').find('tbody tr').each(function(index, element){
        //                             var detail_tarif_parkir_row = {};
        //                             $(element).find('input, select').each(function(index2, element2){
        //                                 var element2name = $(element2).attr('name');
        //                                 var element2value = $(element2).val();
        //                                 detail_tarif_parkir_row[element2name] = element2value;
        //                             })
        //                             detail_tarif_parkir_compilation.push(detail_tarif_parkir_row);
        //                         });
        //     data.push({
        //         name: "detail_tarif_parkir",
        //         value: detail_tarif_parkir_compilation
        //     })
        // }
        // // console.log(data);
        // if(fee_code == 'TBA'){ // insert
        //     var data = {
        //         data: data,
        //         user_nik: user_nik,
        //         branch_id: branch_id
        //     }
        //     var url = '<?// = base_url('tarif_parkir/save_form_tarif_parkir') ?>';
        //     var message_status = 'menambahkan';
        // }else{ // update
        //     var data = {
        //         fee_id: fee_id,
        //         data: data,
        //         user_nik: user_nik,
        //         branch_id: branch_id
        //     }
        //     var url = '<?// = base_url('tarif_parkir/update_form_tarif_parkir') ?>';
        //     var message_status = 'update';
        // }
        // $.ajax({
        //     async: false,
        //     type: "POST",
        //     url: url,
        //     data: data,
        //     dataType: "JSON",
        //     success: function (query_response) {
        //         console.log(query_response);
        //         if(query_response == '1'){
        //             Swal.fire({
        //                 icon: "success",
        //                 title: "Berhasil!",
        //                 text: "Berhasil "+message_status+" data tarif parkir.",
        //                 allowOutsideClick: false,
        //                 showConfirmButton: true
        //             })
        //             .then((feedback)=>{
        //                 if(feedback.isConfirmed){
        //                     window.location = "<?// = base_url('tarif_parkir') ?>";
        //                 }
        //             })
        //         }
        //     }
        // });
    }
})

$('.batal_form_invoice').click(function(){
    Swal.fire({
        icon: "question",
        title: "Yakin?",
        text: "Apakah anda yakin untuk batal mengisi form?",
        allowOutsideClick: false,
        showConfirmButton: true,
        confirmButtonText: "Ya",
        showDenyButton: true,
        denyButtonText: "Tidak"
    })
    .then((choice)=>{
        if(choice.isConfirmed){
            window.location = '<?= base_url('invoice'); ?>';
        }else if(choice.isDenied){
            // do nothing
        }
    })
});

$(document).off('click', '#cetak_form_invoice').on('click', '#cetak_form_invoice', function(){
    update_invoice_header(print_type);
    var url;
    var branch_id = $(document).find('[name="nama_resto"]').val();
    var inv_date = $(document).find('[name="tgl_invoice"]').val();
    var checked_outstanding_invoice = [];
    $('.outstanding_invoice:checked').each(function (index, element) {
        checked_outstanding_invoice.push(this.value);
    });
    checked_outstanding_invoice = checked_outstanding_invoice.join(',');
    switch(print_type){
        case 1:
            url = '<?= base_url('invoice/print_flat') ?>';
        break;
        case 2:
            url = '<?= base_url('invoice/print_persen') ?>';
        break;
        default:
        break;
    }
    var newWindow = window.open('', 'newWindow', 'height=700,width=900');
    var form = $('<form>', {
        action: url,
        method: 'POST',
        target: 'newWindow'
    }).append($('<input>', {
        type: 'hidden',
        name: 'branch_id',
        value: branch_id
    })).append($('<input>', {
        type: 'hidden',
        name: 'inv_date',
        value: inv_date
    }))
    // .append($('<input>', {
    //     type: 'hidden',
    //     name: 'checked_outstanding_invoice',
    //     value: checked_outstanding_invoice
    // }));
    form.appendTo('body').submit().remove();
});

$(document).off('click', '#simpan_form_invoice').on('click', '#simpan_form_invoice', function(){
    update_invoice_header(print_type);
});

function update_invoice_header(print_type){
    // if print_type == 1, itu berarti flat. If print_type == 2, itu berarti format persenan
    var branch_id = $(document).find('[name="nama_resto"]').val();
    var inv_date = $(document).find('[name="tgl_invoice"]').val();
    var inv_note = $(document).find('[name="ket_invoice"]').val();
    var total_penagihan = parseRupiah($(document).find('#total_invoice').html());
    var jumlah_terbayar = parseInt($(document).find('#terbayar_invoice').html());
    var user_nik = '<?= $session->get('user_nik') ?>';
    $.ajax({
        async: false,
        type: "POST",
        url: "<?= base_url('invoice/update_invoice_header') ?>",
        data: {
            branch_id: branch_id,
            inv_date: inv_date,
            inv_note: inv_note,
            billed_nominal: total_penagihan,
            pay_off_nominal: jumlah_terbayar,
            user_nik: user_nik
        },
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            if(response == '1'){
                const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Update data success"
                });
            }
        }
    });
    if(print_type == 2){
        var compInvoiceDetail = [];
        $(document).find('#tabel_detail_persen tbody tr').each(function(index, element){
            var order_id = $(element).find('.total_per_order').data('order-id');
            var fee_id = $(element).find('.total_per_order').data('fee-id');
            var bill_parking_fee = $(element).find('.fee_nominal').data('nominal');
            var amount_of_bill = $(element).find('.bill_amount').val();
            var amount_of_income = $(element).find('.total_per_order').val();

            compInvoiceDetail.push({
                order_id: order_id,
                fee_id: fee_id,
                bill_parking_fee: bill_parking_fee,
                amount_of_bill: amount_of_bill,
                amount_of_income: amount_of_income
            })
        })
        // console.log(compInvoiceDetail);
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/update_invoice_detail'); ?>",
            data: {
                compInvoiceDetail: compInvoiceDetail,
                branch_id: branch_id,
                inv_date: inv_date,
                user_nik: user_nik
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if(response == '1'){
                    // Swal.fire({
                    //     icon: "success",
                    //     title: "Berhasil!",
                    //     text: "Berhasil mengunggah file!",
                    //     allowOutsideClick: false,
                    //     showConfirmButton: true
                    // })
                    // .then((feedback)=>{
                    //     if(feedback.isConfirmed){
                    //         window.location = "<?//= base_url('invoice/form_invoice') ?>";
                    //     }
                    // })
                }else{
                    // Swal.fire({
                    //     icon: "error",
                    //     title: "Gagal!",
                    //     text: "Gagal mengunggah file!",
                    //     allowOutsideClick: false,
                    //     showConfirmButton: true
                    // })
                    // .then((feedback)=>{
                        
                    // })
                }
            }
        });
    }
}

$(document).off('keyup', '.number').on('keyup', '.number', function(){
    var this_value = $(this).val();
    $(this).val(this_value.replace(/[^0-9]/g, ''));
    // this_value.replace(/[^0-9]/g, '');
})

$(document).off('change', '#select_all_invoice_outstanding').on('change', '#select_all_invoice_outstanding', function(){
    $('.outstanding_invoice').prop('checked', this.checked);
    // console.log(this.checked);
    if(this.checked){
        $(this).closest('table').find('tbody .outstanding_invoice_deposit').each(function(index, element){ $(element).attr('disabled', false); })
    }else{
        $(this).closest('table').find('tbody .outstanding_invoice_deposit').each(function(index, element){ $(element).attr('disabled', true); })
    }
})

$(document).off('click', '#upload_form_invoice').on('click', '#upload_form_invoice', function(){
    Swal.fire({
        icon: "question",
        title: "Perhatian.",
        html: "Pastikan semua jumlah setoran pada invoice ini sudah benar. <br/><br/>Lanjut untuk pengunggahan Surat Serah Terima Biaya Pendapatan Parkir?",
        allowOutsideClick: false,
        confirmButtonText: "Lanjut",
        showDenyButton: true,
        denyButtonText: "Periksa dulu"
    })
    .then((feedback)=>{
        if(feedback.isConfirmed){
            $('#modal_upload').find('input[name="inv_id_upload"]').val($(this).data('inv_id_upload'));
            $('#modal_upload').modal('show');
        }
    });
});

$(document).off('click', '#upload_invoice_action').on('click', '#upload_invoice_action', function(){
    var file_attachment = $(document).find('[name="invoice_attachment"]')[0].files[0];
    const formData = new FormData();
    formData.append('invoice_file', file_attachment);
    var inv_id_upload = $(document).find('[name="inv_id_upload"]').val();

    var uploadStatus = false;
    var uploaded_filename = '';

    // console.log($(document).find('.outstanding_invoice:checked').length);

    $.ajax({
        async: false,
        type: "POST",
        url: "<?= base_url('invoice/upload_invoice'); ?>",
        data: formData,
        processData: false, 
        contentType: false,
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            if(response != 'Failed to upload'){
                if (response.success) {
                    uploadStatus = true; // Update the variable on success
                    uploaded_filename = response.message; // Update the variable on success
                    console.log('File uploaded successfully');
                } else {
                    uploadStatus = false; // Update the variable on failure
                    console.error('Failed to upload file');
                }
            }
        }
    });
    var setoran_invoice = $(document).find('[name="setor_invoice"]').val();
    var selisih_invoice = parseRupiah($(document).find('#terutang_invoice').html());
    if(uploaded_filename != ''){
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/update_uploaded_invoice'); ?>",
            data: {
                filename: uploaded_filename,
                inv_id_upload: inv_id_upload,
                setoran_invoice: setoran_invoice,
                selisih_invoice: selisih_invoice
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if(response == '1'){
                    if($(document).find('.outstanding_invoice:checked').length > 0){
                        var compSelectedOutstanding = [];
                        $(document).find('.outstanding_invoice:checked').each(function(index, element){
                            var id_outstanding_invoice = this.value;
                            var outstanding_nominal = parseRupiah($(this).closest('tr').find('.outstanding_remainder').html());
                            var outstanding_deposit = parseInt($(this).closest('tr').find('.outstanding_invoice_deposit').val());

                            compSelectedOutstanding.push({
                                id: id_outstanding_invoice,
                                outstanding_nominal: outstanding_nominal,
                                outstanding_deposit: outstanding_deposit
                            })
                        })
                        // console.log(compSelectedOutstanding);
                        $.ajax({
                            async: false,
                            type: "POST",
                            url: "<?= base_url('invoice/update_selected_outstanding_invoice'); ?>",
                            data: {
                                outstanding_comp: compSelectedOutstanding,
                                inv_id_upload: inv_id_upload
                            },
                            dataType: "JSON",
                            success: function (response) {
                                // console.log(response);
                                if(response == '1'){
                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil!",
                                        text: "Berhasil mengunggah file!",
                                        allowOutsideClick: false,
                                        showConfirmButton: true
                                    })
                                    .then((feedback)=>{
                                        if(feedback.isConfirmed){
                                            window.location = "<?= base_url('invoice/form_invoice') ?>";
                                        }
                                    })
                                }else{
                                    Swal.fire({
                                        icon: "error",
                                        title: "Gagal!",
                                        text: "Gagal mengunggah file!",
                                        allowOutsideClick: false,
                                        showConfirmButton: true
                                    })
                                    .then((feedback)=>{
                                        
                                    })
                                }
                            }
                        });
                    }else{
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: "Berhasil mengunggah file!",
                            allowOutsideClick: false,
                            showConfirmButton: true
                        })
                        .then((feedback)=>{
                            if(feedback.isConfirmed){
                                window.location = "<?= base_url('invoice/form_invoice') ?>";
                            }
                        })
                    }
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: "Gagal mengunggah file!",
                        allowOutsideClick: false,
                        showConfirmButton: true
                    })
                    .then((feedback)=>{
                        
                    })
                }
            }
        });
    }
});

$(function(){ // harus dijadiin satu supaya function lain bisa baca event yang lain (mboh agak laen versi ini)
    $(document).off('change', '.outstanding_invoice').on('change', '.outstanding_invoice', function(){
        const isChecked = $(this).is(':checked');
        if(isChecked){
            $(this).closest('tr').find('.outstanding_invoice_deposit').attr('disabled', false);
        }else{
            $(this).closest('tr').find('.outstanding_invoice_deposit').attr('disabled', true).val(0).keyup();
        }
    });

    $(document).off('keyup', '.outstanding_invoice_deposit').on('keyup', '.outstanding_invoice_deposit', function(){         
        var deposit_value = $(this).val();
        if (deposit_value === '') {
            $(this).val('0');
            deposit_value = 0;
        }
        var index = $(this).closest('tr').index();

        var terbayar = (parseInt(deposit_value) + parseInt(outstanding_invoice_array[index].pay_off_nominal));
        $(this).closest('tr').find('.outstanding_paid_off').html(rupiah(terbayar));

        if(outstanding_invoice_array[index].amount_outstanding != null){
            var terutang = (parseInt(outstanding_invoice_array[index].amount_outstanding) - parseInt(deposit_value));
        }else{
            var terutang = (parseInt(outstanding_invoice_array[index].billed_nominal) - parseInt(deposit_value));
        }
        if(terutang >= 0){
            $(this).closest('tr').find('.outstanding_remainder').html(rupiah(terutang));
        }else{
            Swal.fire({
                icon: "warning",
                title: "Perhatian",
                text: "Jumlah setoran melebihi jumlah terhutang. Mohon input kembali jumlah yang benar.",
                allowOutsideClick: false
            })
            .then((feedback)=>{
                if(feedback.isConfirmed){
                    $(this).closest('tr').find('.outstanding_invoice_deposit').val(0).keyup();
                }
            })
        }
    });
})



function date_convert(date){
    // Split the date string into an array [yyyy, mm, dd]
    let parts = date.split('-');
    // Rearrange and join the parts to get the desired format dd-mm-yyyy
    return `${parts[2]}-${parts[1]}-${parts[0]}`;
}

function sync_row_dynamic_table(table_id = 'all'){
    if(table_id == 'all'){
        $(document).find('table.dynamic-table').each(function(index, element){
            if($(element).find('tbody tr').length > 0){
                $(element).find('tbody tr').each(function(index2, element2){
                    $(element2).find('td.index').html((parseInt(index2)+1))
                })
            }else{
                $(element).find('tbody').append('<tr class="row_none"><td class="bg-white" colspan="100%"><b class="text-danger">Tidak ada data.</b></td></tr>');
            }
        })
    }else{
        var table = $(document).find('table.dynamic-table#'+table_id);
        if(table.find('tbody tr').length > 0){
            table.find('tbody tr').each(function(index, element){
                $(element).find('td.index').html((parseInt(index)+1))
            })
        }else{
            table.find('tbody').append('<tr class="row_none"><td class="bg-white" colspan="100%"><b class="text-danger">Tidak ada data.</b></td></tr>');
        }
    }
}

function load_master_revenue_type(){
    var revenue_element = $('select[name="tipe_komisi"]');
    $.ajax({
        async: false,
        type: "POST",
        url: '<?= base_url('tarif_parkir/get_master_revenue_type'); ?>',
        // data: "data",
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            if(response.length > 0){
                var options = '<option value="null" disabled selected>-- PILIH TIPE KOMISI --</option>';
                for(var keys in response){
                    options += '<option value="'+response[keys].id+'">'+response[keys].revenue_sharing_type+'</option>';
                }
                revenue_element.html(options);
            }
        }
    });
}

function load_invoice(branch_id, inv_date){
    $.ajax({
        async: false,
        type: "POST",
        url: "<?= base_url('invoice/load_existing_invoice') ?>",
        data: {
            branch_id: branch_id,
            inv_date: inv_date
        },
        dataType: "JSON",
        success: function (response) {
            // console.log(response)
            var inv_attachment = response[0].inv_attachment;
            $(document).find('#detail_penagihan').removeClass('d-none');
            $(document).find('#div_buat_penagihan').addClass('d-none');
            $(document).find('#div_nomor_penagihan').removeClass('d-none');
            $(document).find('#div_nomor_penagihan').find('div#alert_penagihan').html(response[0].inv_code);
            $(document).find('[name="nama_resto"]').attr('disabled', true);
            $(document).find('[name="tgl_invoice"]').attr('disabled', true);
            $(document).find('[name="ket_invoice"]').val(response[0].inv_note)
            // .attr('disabled', true);
            // console.log(response[0].invoice_id);
            $(document).find('#upload_form_invoice').attr('data-inv_id_upload', response[0].invoice_id);

            $(document).find('#tgl_invoice').html(response[0].inv_date);
            $(document).find('#kode_invoice').html(response[0].inv_code);
            $(document).find('#total_invoice').html(rupiah(parseInt(response[0].billed_nominal)));
            $(document).find('#terbayar_invoice').html(rupiah(parseInt(response[0].pay_off_nominal)));
            var terutang = rupiah(parseInt(response[0].billed_nominal) - parseInt(response[0].pay_off_nominal));
            $(document).find('#terutang_invoice').html(terutang);
            $.ajax({
                async: false,
                type: "POST",
                url: "<?= base_url('invoice/get_format_tarif'); ?>",
                data: {
                    branch_id: branch_id
                },
                dataType: "JSON",
                success: function (response) {
                    function rupiah(amount) {
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(amount);
                    }
                    // console.log(response);
                    $(document).find('#jenis_tarif').addClass('bg-warning text-white').html(response[0].revenue_sharing_type);
                    // console.log(response[0].revenue_id)
                    switch(response[0].revenue_id){
                        case "1":
                        case "2":
                            print_type = 1; // format flat
                            $(document).find('#div_tabel_detail_flat').removeClass('d-none');
                            $(document).find('#div_tabel_detail_persen').addClass('d-none');
                            $(document).find('#nominal_flat').html(rupiah(response[0].flat_nbill_nominal));
                            $(document).find('#total_invoice').html(rupiah(response[0].flat_nbill_nominal));
                            if(inv_attachment == null || inv_attachment == ''){ // kalo udah ada file upload-an berarti udah ditutup invoice-nya
                                debtCalc();
                            }
                        break;
                        case "3":
                        case "4":
                            print_type = 2; // format persenan (ada detailnya)
                            $(document).find('#div_tabel_detail_flat').addClass('d-none');
                            $(document).find('#div_tabel_detail_persen').removeClass('d-none');

                            var html = '';
                            for(var keys in response){
                                if(response[keys].order_type_fee == 'F'){
                                    var order_type_fee = 'FLAT';
                                    var nominal = rupiah(response[keys].fee_nominal);
                                    var prepend = '';
                                    var append = '<span class="input-group-text">Bill</span>';
                                }else if(response[keys].order_type_fee == 'P'){
                                    var order_type_fee = 'PERCENTAGE';
                                    var nominal = response[keys].fee_nominal+' %';
                                    var prepend = '<span class="input-group-text">Rp</span>';
                                    var append = '';
                                }
                                html += '<tr>'+
                                            '<td>'+(parseInt(keys)+1)+'</td>'+
                                            '<td>'+response[keys].order_code+'</td>'+
                                            '<td>'+response[keys].order_name+'</td>'+
                                            '<td class="text-center">'+order_type_fee+'</td>'+
                                            '<td class="text-center fee_nominal" data-nominal="'+response[keys].fee_nominal+'">'+nominal+'</td>'+
                                            '<td>'+
                                                '<div class="input-group">'+
                                                    prepend+
                                                    '<input type="text" class="form-control form-control-sm text-center bill_amount" data-calculation-type="'+response[keys].order_type_fee+'">'+
                                                    append+
                                                '</div>'+
                                            '</td>'+
                                            '<td><input class="form-control form-control-sm text-center total_per_order" data-order-id="'+response[keys].order_id+'" data-fee-id="'+response[keys].fee_id+'" readOnly value="0"></td>'+
                                        '</tr>';
                            }
                            $(document).find('table#tabel_detail_persen tbody').empty().append(html);
                            $(document).find('table#tabel_detail_persen').append('<tfoot class="bg-warning"><tr><td colspan="6" class="text-center">TOTAL</td><td class="text-center"><input class="form-control form-control-sm text-center" id="sum_bill_amount" value="0" readOnly></td></tr></tfoot>');
                        break;
                        default:

                        break;
                    }
                }
            });
            if(inv_attachment != null && inv_attachment != ''){
                $(document).find('.invoice_now_setor').remove();
                $('#div_invoice_outstanding').addClass('d-none');
                $('#div_tabel_detail_persen').addClass('d-none');
            }
        }
    });
}
function debtCalc(){
    var terutang = rupiah(parseRupiah($(document).find('#total_invoice').html()) - (parseRupiah($(document).find('#terbayar_invoice').html() + parseInt($(document).find('[name="setor_invoice"]').val()))));
    if(Math.sign(terutang) == 1){
        var bg = '#ff0000'; // red
    }else if(Math.sign(terutang) == -1){
        var bg = '#47d147'; // green
        Swal.fire({
            icon: "warning",
            title: "Perhatian!",
            text: "Jumlah setoran yang dimasukkan lebih besar dari selisih tagihan. Mohon cek kembali jumlah setor bayaran.",
            allowOutsideClick: false,
            showConfirmButton: true
        })
    }else if(Math.sign(terutang) == 0){
        var bg = '#ffffff'; // white
    }
    // alert(terutang)
    $(document).find('#terutang_invoice').css('background-color', bg).html(terutang);
}
function load_outstanding_invoice(branch_id, tgl_invoice){
    $.ajax({
        async: false,
        type: "POST",
        url: "<?= base_url('invoice/outstanding_invoice_list'); ?>",
        data: {
            branch_id: branch_id,
            inv_date: tgl_invoice
        },
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            outstanding_invoice_array = response;
            var html = '';
            if(response.length > 0){
                for(var keys in response){
                    if(response[keys].amount_outstanding != null){
                        var amount_outstanding = response[keys].amount_outstanding;
                    }else{
                        var amount_outstanding = parseInt(response[keys].billed_nominal)-parseInt(response[keys].pay_off_nominal);
                    }
                    html += '<tr>'+
                                '<td><input class="form-check-input outstanding_invoice" type="checkbox" value="'+response[keys].inv_id+'"></td>'+
                                '<td>'+response[keys].inv_date+'</td>'+
                                '<td>'+response[keys].inv_code+'</td>'+
                                '<td>'+rupiah(parseInt(response[keys].billed_nominal))+'</td>'+
                                '<td class="outstanding_paid_off">'+rupiah(parseInt(response[keys].pay_off_nominal))+'</td>'+
                                '<td class="outstanding_remainder">'+rupiah(amount_outstanding)+'</td>'+
                                '<td><input type="text" class="form-control form-control-sm text-center outstanding_invoice_deposit" value="0" disabled></td>'+
                            '</tr>';
                }
            }else{
                html = '<tr><td colspan="100%" class="text-center text-danger"><b>Tidak ada data.</b></td></tr>';
            }
            $(document).find('#tabel_invoice_outstanding tbody').empty().append(html);
        }
    });
}
</script>
<?= $this->include('layouts/footer') ?>