<?= $this->include('layouts/header') ?>
<?php 
    $session = \Config\Services::session();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center">BUAT PENAGIHAN (INVOICE)</h4>
        </div>
        <div class="col-lg-12">
            <div class="card border-dark mt-2">
                <div class="card-header border-dark bg-primary text-white text-center p-1">
                    <h6>DATA RESTO</h6>
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
                                        <td>PIC</td>
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
                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-sm btn-success" id="create_invoice">BUAT PENAGIHAN</button>
                            <button type="button" class="btn btn-sm btn-danger" id="batal_form_invoice">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 d-none">
            <div class="card border-dark mt-2">
                <div class="card-header border-dark bg-primary text-white text-center">
                    <h6>FORM PENAGIHAN (INVOICE)</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover" width="80%">
                                <tbody>
                                    <tr>
                                        <td>Tarif Code</td>
                                        <td>:</td>
                                        <td><input type="text" name="kode_tarif_parkir" id="" class="form-control form-control-sm serialize required" data-title="Kode Tarif" value="TBA" readOnly></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Tarif</td>
                                        <td>:</td>
                                        <td><input type="text" name="nama_tarif_parkir" id="" data-title="Nama Tarif" class="form-control form-control-sm serialize required"></td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Komisi</td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm serialize required" name="tipe_komisi" id="tipe_komisi" data-title="Tipe Komisi">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran</td>
                                        <td>:</td>
                                        <td><input type="text" name="lampiran_tarif_parkir" id="" class="form-control form-control-sm serialize" data-title="Lampiran Tarif"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover w-100">
                                <tbody>
                                    <tr>
                                        <td>Tanggal Aktif</td>
                                        <td>:</td>
                                        <td><input type="text" name="tanggal_aktif_tarif_parkir" id="" class="form-control form-control-sm datepicker serialize required" data-title="Tanggal Aktif Tarif" value="<?= date('d-m-Y') ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired</td>
                                        <td>:</td>
                                        <td><input type="text" name="tanggal_kadaluwarsa_tarif_parkir" id="" class="form-control form-control-sm datepicker serialize required" data-title="Tanggal Kadaluwarsa Tarif"></td>
                                    </tr>
                                    <tr>
                                        <td>Status Keaktifan</td>
                                        <td>:</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check serialize" name="keaktifan_tarif_parkir" data-title="Keaktifan Tarif" id="aktif" autocomplete="off" value="1" checked>
                                                <label class="btn btn-sm btn-outline-success" for="aktif">Aktif</label>

                                                <input type="radio" class="btn-check serialize" name="keaktifan_tarif_parkir" data-title="Keaktifan Tarif" id="nonaktif" autocomplete="off" value="0">
                                                <label class="btn btn-sm btn-outline-danger" for="nonaktif">Non-aktif</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td><input type="text" name="keterangan_tarif_parkir" id="" class="form-control form-control-sm serialize"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-none" id="div_detail_tarif_flat">
                        <div class="col-lg-12">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text" id="nominal_flat">Nominal (Flat)</span>
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
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-sm btn-success" id="simpan_form_tarif_parkir">SIMPAN</button>
                            <button type="button" class="btn btn-sm btn-danger" id="batal_form_tarif_parkir">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    // load_master_revenue_type();
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
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
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
    });

    // autofill data resto
    // var branch_id = '<?// = $this->data['branch_id']; ?>';
    // if(branch_id != ''){ 
    //     $.ajax({
    //         async: false,
    //         type: "POST",
    //         url: "<?// = base_url('tarif_parkir/get_data_by_id'); ?>",
    //         data: {
    //             branch_id: branch_id
    //         },
    //         dataType: "JSON",
    //         success: function (response) {
    //             // console.log(response);
    //             if(response.length > 0){
    //                 $(document).find('#kode_resto').html(response[0].branch_code);
    //                 $(document).find('#nama_resto').html(response[0].branch_name);
    //                 $(document).find('#alamat_resto').html(response[0].branch_address);
    //                 $(document).find('#region_resto').html(response[0].branch_group_name);
    //             }
    //         }
    //     });
    // }
    // autofill data tarif parkir
    // var fee_id = '<?// = $this->data['fee_id']; ?>';
    // if(fee_id != ''){ 
    //     $.ajax({
    //         async: false,
    //         type: "POST",
    //         url: "<?// = base_url('tarif_parkir/get_fee'); ?>",
    //         data: {
    //             fee_id: fee_id
    //         },
    //         dataType: "JSON",
    //         success: function (response) {
    //             // console.log(response);
    //             if(response.length > 0){
    //                 $(document).find('[name="kode_tarif_parkir"]').val(response[0].fee_code);
    //                 $(document).find('[name="nama_tarif_parkir"]').val(response[0].fee_name);
    //                 $(document).find('[name="tipe_komisi"]').val(response[0].revenue_id).trigger('change');
    //                 $(document).find('[name="tanggal_aktif_tarif_parkir"]').val(date_convert(response[0].fee_date_active));
    //                 $(document).find('[name="tanggal_kadaluwarsa_tarif_parkir"]').val(date_convert(response[0].fee_date_exp));
    //                 $(document).find('[name="keaktifan_tarif_parkir"][value="'+response[0].is_active+'"]').trigger('click');
    //                 $(document).find('[name="keterangan_tarif_parkir"]').val(response[0].fee_note);
    //                 if(response[0].detail_status == 'detailed'){
    //                     for(var keys in response){
    //                         $('table#tabel_detail_tarif').prev('button.add-dynamic-table').trigger('click');
    //                         $('table#tabel_detail_tarif tbody tr:last').find('[name="kode_order"]').val(response[keys].order_id).trigger('change');
    //                         $('table#tabel_detail_tarif tbody tr:last').find('[name="tipe_tarif"]').val(response[keys].order_type_fee).trigger('change');
    //                         $('table#tabel_detail_tarif tbody tr:last').find('[name="nominal_tarif"]').val(response[keys].fee_nominal);
    //                     }
    //                 }else if(response[0].detail_status == 'no_detail'){
    //                     $(document).find('[name="nominal_flat"]').val(response[0].flat_nbill_nominal);
    //                 }
    //             }
    //         }
    //     });
    // }
    sync_row_dynamic_table();
});



$(document).off('click', '#create_invoice').on('click', '#create_invoice', function(){
    var branch_id = $('[name="nama_resto"]').find('option:selected').val();
    var tgl_invoice = $('[name="tgl_invoice"]').val();

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
                        type: "POST",
                        url: "<?= base_url('invoice/save_invoice_header'); ?>",
                        data: {
                            branch_id: branch_id,
                            inv_date: tgl_invoice
                        },
                        dataType: "JSON",
                        success: function (response) {
                            console.log(response);
                        }
                    });

                    // Swal.fire({
                    //     icon: "success",
                    //     title: "Sukses!",
                    //     text: "Nanti bikin nomer invoice. Sabar ya prosesnya belum selesai.",
                    //     showConfirmButton: true,
                    //     allowOutsideClick: false
                    // })
                }else if(response.length > 0){
                    var invoice_number = response[0].inv_code;
                    var user_created = response[0].create_by;
                    Swal.fire({
                        icon: "warning",
                        title: "Perhatian!",
                        text: "Nomor penagihan pada resto tsb dan tanggal tsb sudah ada. ("+invoice_number+") dibuat oleh "+user_created+" ",
                        showConfirmButton: true,
                        allowOutsideClick: false
                    })
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

$('#batal_form_invoice').click(function(){
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
})

$(document).off('keyup', '.number').on('keyup', '.number', function(){
    var this_value = $(this).val();
    $(this).val(this_value.replace(/[^0-9]/g, ''));
    // this_value.replace(/[^0-9]/g, '');
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
</script>
<?= $this->include('layouts/footer') ?>