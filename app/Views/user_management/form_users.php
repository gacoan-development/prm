<?= $this->include('layouts/header') ?>
<?php 
    $session = \Config\Services::session();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-dark mt-2">
                <div class="card-header py-2 border-dark bg-primary text-white text-center">
                    <h6>DATA PENGGUNA</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover" width="80%">
                                <tbody>
                                    <tr>
                                        <td>Kode Pengguna</td>
                                        <td>:</td>
                                        <td><input type="text" name="kode_pengguna" id="" class="form-control form-control-sm serialize required" data-title="Kode Pengguna" value="TBA" readOnly></td>
                                    </tr>
                                    <tr>
                                        <td>NIK Pengguna</td>
                                        <td>:</td>
                                        <td><input type="text" name="nik_pengguna" id="" data-title="NIK Pengguna" class="form-control form-control-sm serialize required"></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pengguna</td>
                                        <td>:</td>
                                        <td><input type="text" name="nama_pengguna" id="" data-title="Nama Pengguna" class="form-control form-control-sm serialize required"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover w-100">
                                <tbody>
                                    <tr>
                                        <td>No. Handphone</td>
                                        <td>:</td>
                                        <td><input type="text" name="hp_pengguna" id="" data-title="No. Handphone Pengguna" class="form-control form-control-sm disabled" disabled value="coming soon..."></td>
                                    </tr>
                                    <tr>
                                        <td>No. KTP</td>
                                        <td>:</td>
                                        <td><input type="text" name="ktp_pengguna" id="" data-title="No. KTP Pengguna" class="form-control form-control-sm disabled" disabled value="coming soon..."></td>
                                    </tr>
                                    <tr>
                                        <td>Status Keaktifan</td>
                                        <td>:</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check serialize" name="keaktifan_pengguna" data-title="Keaktifan Pengguna" id="aktif" autocomplete="off" value="1" checked>
                                                <label class="btn btn-sm btn-outline-success" for="aktif">Aktif</label>

                                                <input type="radio" class="btn-check serialize" name="keaktifan_pengguna" data-title="Keaktifan Pengguna" id="nonaktif" autocomplete="off" value="0">
                                                <label class="btn btn-sm btn-outline-danger" for="nonaktif">Non-aktif</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td><input type="text" name="keterangan_pengguna" id="" class="form-control form-control-sm disabled" disabled value="coming soon..."></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Lampiran</td>
                                        <td>:</td>
                                        <td>
                                            <div id="attachment_exist" class="d-none">
                                                <button type="button" class="btn btn-sm btn-info" id="id_attachment" data-file="">Lihat lampiran</button>
                                                <button type="button" class="btn btn-sm btn-danger px-1 py-0" id="delete_file"><i class="bi bi-trash"></i></button>
                                            </div>
                                            <input type="file" class="form-control" name="pengelola_attachment" data-title="Lampiran Pengelola Parkir" id="">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Group Pengguna</td>
                                        <td>:</td>
                                        <td>
                                            <select name="group_pengguna" id="" class="form-control form-control-sm serialize">

                                            </select>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover" width="80%">
                                <tr>
                                    <td>Grup Pengguna</td>
                                    <td>:</td>
                                    <td>
                                        <select name="group_pengguna" id="" data-title="Grup Pengguna" class="form-control form-control-sm serialize required">

                                        </select>
                                    </td>
                                </tr>
                                <tr class="extra_row d-none" id="region_managed">
                                    <td>Wilayah</td>
                                    <td>:</td>
                                    <td>
                                        <select name="wilayah_pengguna" id="" data-title="Wilayah Pengguna" class="form-control form-control-sm serialize required">

                                        </select>
                                    </td>
                                </tr>
                                <tr class="extra_row d-none" id="branch_managed">
                                    <td>Nama Resto</td>
                                    <td>:</td>
                                    <td>
                                        <select name="cabang_pengguna" id="" data-title="Cabang Pengguna" class="form-control form-control-sm selectpicker serialize required">

                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row extra_row d-none" id="div_area_managed">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-sm btn-primary mt-2 add-dynamic-table">+ Resto yang dikelola</button>
                            <table class="table table-condensed table-bordered table-hover dynamic-table text-center m-2" id="tabel_resto_yang_dikelola">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Code</th>
                                        <th>Branch Name</th>
                                        <th>Branch Address</th>
                                        <th>Branch Group</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row extra_row d-none" id="div_branch_managed">
                        <div class="col-lg-12">
                            <!-- <button type="button" class="btn btn-sm btn-primary mt-2 add-dynamic-table">+ Resto yang dikelola</button>
                            <table class="table table-condensed table-bordered table-hover dynamic-table text-center m-2" id="tabel_resto_yang_dikelola">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Code</th>
                                        <th>Branch Name</th>
                                        <th>Branch Address</th>
                                        <th>Branch Group</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table> -->
                        </div>
                    </div>
                    <div class="row d-none" id="action_button_div">
                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-sm btn-success" id="simpan_form_pengguna">SIMPAN</button>
                            <button type="button" class="btn btn-sm btn-danger" id="batal_form_pengguna">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    load_master_group_users();
    $(document).off('change', 'select[name="group_pengguna"]').on('change', 'select[name="group_pengguna"]', function () {
        var this_position = $(this).find('option:selected').data('text'); 
        switch(this_position){
            case "Regional Manager":
                $('.extra_row').addClass('d-none');
                $('#region_managed').removeClass('d-none');
                load_master_wilayah();
            break;
            case "Area Manager":
                $('.extra_row').addClass('d-none');
                $('#div_area_managed').removeClass('d-none');
            break;
            case "Store Manager":
            case "PIC Resto":
                $('.extra_row').addClass('d-none');
                $('#branch_managed').removeClass('d-none');
                $(document).find('[name="cabang_pengguna"]').select2({
                    tokenSeparators: [',', ' '],
                    minimumInputLength: 1,
                    minimumResultsForSearch: 10,
                    width: '100%',
                    ajax: {
                        url: '<?= base_url('users/get_all_resto'); ?>',
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
            break;
            default:
                $('.extra_row').addClass('d-none');
            break;
        }
        $(document).find('#action_button_div').removeClass('d-none');
    });
    // $(document).off('change', 'select[name="nama_resto"]').on('change', 'select[name="nama_resto"]', function(){
    //     var selected_value = $(this).find('option:selected').val();
    //     var branch_code = branch_address = branch_group = '';

    //     $.ajax({
    //         async: false,
    //         type: "GET",
    //         url: "<?//= base_url('pengelola/get_resto_not_managed_detail') ?>",
    //         data: {
    //             branch_id: selected_value
    //         },
    //         dataType: "JSON",
    //         success: function (response) {
    //             // console.log(response);
    //             branch_code = response[0].branch_code;
    //             $(this).closest('tr').find('[name="kode_resto"]').val(branch_code);
    //             branch_address = response[0].branch_address;
    //             branch_group = response[0].branch_group_name;
    //         }
    //     });
    //     var this_index = $(this).closest('tr').index();
    //     var same_branch_code = false;
    //     $(this).closest('tbody').find('tr').each(function(index, element){
    //         if(index != this_index){
    //             if($(element).find('[name="kode_resto"]').val() == branch_code){
    //                 same_branch_code = true;
    //             }
    //         }
    //     })
    //     if(same_branch_code){
    //         Swal.fire({
    //             icon: "warning",
    //             title: "Perhatian",
    //             text: "Ada kode resto yang sama. Mohon dicek kembali.",
    //             allowOutsideClick: false,
    //             showConfirmButton: true
    //         })
    //         .then((feedback)=>{
    //             if(feedback.isConfirmed){
    //                 $(this).val(null).trigger('change');
    //                 $(this).closest('tr').find('[name="kode_resto"]').val(null);
    //                 $(this).closest('tr').find('div.alamat_resto').html('');
    //                 $(this).closest('tr').find('div.group_resto').html('');
    //             }
    //         })
    //     }else{
    //         $(this).closest('tr').find('[name="kode_resto"]').val(branch_code);
    //         $(this).closest('tr').find('div.alamat_resto').html(branch_address);
    //         $(this).closest('tr').find('div.group_resto').html(branch_group);
    //     }
    // });
    // autofill
    var user_id = '<?= $this->data['user_id']; ?>';
    if(user_id != ''){ 
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('pengelola/get_data_by_id'); ?>",
            data: {
                user_id: user_id
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if(response.length > 0){
                    var data = response[0];
                    $(document).find('[name="kode_pengelola_parkir"]').val(response[0].parkmanagement_code);
                    $(document).find('[name="nama_pengelola_parkir"]').val(response[0].parkmanagement_name);
                    $(document).find('[name="hp_pengelola_parkir"]').val(response[0].parkmanagement_num);
                    $(document).find('[name="ktp_pengelola_parkir"]').val(response[0].parkmanagement_nik);
                    $(document).find('[name="keterangan_pengelola_parkir"]').val(response[0].parkmanagement_note);
                    $(document).find('[name="keaktifan_pengelola_parkir"][value="'+response[0].is_active+'"]').trigger('click');
                    if(response[0].additional_attachments != '' && response[0].additional_attachments != null){
                        $(document).find('#attachment_exist').removeClass('d-none');
                        $(document).find('#id_attachment').data('file', response[0].additional_attachments);
                        $(document).find('[name="pengelola_attachment"]').addClass('d-none');
                    }
                }
            }
        });
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('pengelola/get_resto_managed'); ?>",
            data: {
                user_id: user_id
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                for(var keys in response){
                    $('#tabel_resto_yang_dikelola').prev('button.add-dynamic-table').trigger('click');
                    $('#tabel_resto_yang_dikelola').find('tbody tr:last').find('[name="nama_resto"]').append('<option value="'+response[keys].branch_id+'">'+response[keys].branch_name+'</option>').trigger('change');
                }
            }
        });
    };
    sync_row_dynamic_table();
});
$(document).off('click', 'button.add-dynamic-table').on('click', 'button.add-dynamic-table', function(){
    var table_target = $(this).next('.dynamic-table');
    var table_target_id = $(this).next('.dynamic-table').attr('id');
    if($(this).next('.dynamic-table').find('tbody tr.row_none').length > 0){
        $(this).next('.dynamic-table').find('tbody tr.row_none').remove();
    }
    switch(table_target_id){
        case "tabel_resto_yang_dikelola":
            var appended =  '<tr>'+
                                '<td class="index"></td>'+
                                '<td width="10%"><input class="form-control form-control-sm" name="kode_resto" readOnly></td>'+
                                '<td>'+
                                    '<select class="form-control form-control-sm selectpicker" name="nama_resto">'+
                                    '</select>'+
                                '</td>'+
                                '<td><div class="alamat_resto"></div></td>'+
                                '<td><div class="group_resto"></div></td>'+
                                '<td><button type="button" class="btn btn-sm btn-danger sub-dynamic-table">-</button></td>'+
                            '</tr>';
            table_target.find('tbody').append(appended);
            table_target.find('tr:last').find('select[name="nama_resto"]').select2({
                tokenSeparators: [',', ' '],
                minimumInputLength: 1,
                minimumResultsForSearch: 10,
                width: '100%',
                ajax: {
                    url: '<?= base_url('pengelola/get_resto_not_managed'); ?>',
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
        break;
    }
    sync_row_dynamic_table(table_target_id);
})
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
$(document).off('click', '.sub-dynamic-table').on('click', '.sub-dynamic-table', function(){
    var table_target_id = $(this).next('.dynamic-table').attr('id');
    $(this).closest('tr').remove();
    sync_row_dynamic_table(table_target_id);
});
$('button#simpan_form_pengguna').off('click').on('click', function(){
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
        var vendor_code = $('[name="kode_pengelola_parkir"]').val();
        var user_id = '<?= $this->data['user_id']; ?>';
        var user_nik = '<?= $session->get('user_nik') ?>';
        var data = $('.serialize').filter(function(index, element) {
                        return $(element).val() != '';
                    }).serializeArray();
        if($('#tabel_resto_yang_dikelola').find('input, select').length > 0){ // kalau ada detailnya baru di push, kalo ndak ada ya ngapain wkwk
            var managed_resto_compilation = [];
            var manage_resto =  $('#tabel_resto_yang_dikelola').find('tbody tr').each(function(index, element){
                                    if($(element).find('[name="nama_resto"]').val() != null){
                                        var managed_resto_row = {};
                                        $(element).find('input, select').each(function(index2, element2){
                                            var element2name = $(element2).attr('name');
                                            var element2value = $(element2).val();
                                            managed_resto_row[element2name] = element2value;
                                        })
                                        managed_resto_compilation.push(managed_resto_row);
                                    }
                                });
            data.push({
                name: "resto_yang_dikelola",
                value: managed_resto_compilation
            })
        }
        // console.log(data);
        if(vendor_code == 'TBA'){ // insert
            var data = {
                data: data,
                user_nik: user_nik
            }
            var url = '<?= base_url('pengelola/save_form_pengelola') ?>';
            var message_status = 'menambahkan';
        }
        // console.log(user_id);
        else{ // update
            var data = {
                data: data,
                user_nik: user_nik,
                user_id: user_id
            }
            var url = '<?= base_url('pengelola/update_form_pengelola') ?>';
            var message_status = 'update';
        }
        // console.log(data);
        $.ajax({
            async: false,
            type: "POST",
            url: url,
            data: data,
            dataType: "JSON",
            success: function (query_response) {
                // console.log(query_response);
                if(query_response != '0'){
                    if(user_id === ''){
                        upload_pengelola_attachment(query_response);
                    }else{
                        upload_pengelola_attachment(user_id);
                    }
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Berhasil "+message_status+" data pengelola parkir.",
                        allowOutsideClick: false,
                        showConfirmButton: true
                    })
                    .then((feedback)=>{
                        if(feedback.isConfirmed){
                            window.location = "<?= base_url('pengelola') ?>";
                        }
                    })
                }
            }
        });
    }
})

function upload_pengelola_attachment(user_id){
    var file_attachment = $(document).find('[name="pengelola_attachment"]')[0].files[0];
    const formData = new FormData();
    formData.append('pengelola_file', file_attachment);

    var uploadStatus = false;
    var uploaded_filename = '';

    // console.log($(document).find('.outstanding_invoice:checked').length);

    $.ajax({
        async: false,
        type: "POST",
        url: "<?= base_url('pengelola/upload_pengelola'); ?>",
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
                    $.ajax({
                        async: false,
                        type: "POST",
                        url: "<?= base_url('pengelola/update_uploaded_pengelola'); ?>",
                        data: {
                            filename: uploaded_filename,
                            user_id_upload: user_id,
                        },
                        dataType: "JSON",
                        success: function (response) {
                            console.log('filename updated to the table');
                        }
                    });
                } else {
                    uploadStatus = false; // Update the variable on failure
                    console.error('Failed to upload file');
                }
            }
        }
    });
}
$('#batal_form_pengguna').click(function(){
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
            window.location = '<?= base_url('pengelola'); ?>';
        }else if(choice.isDenied){
            // do nothing
        }
    })
})

$(document).off('click', '#id_attachment').on('click', '#id_attachment', function(){
    var origin = 'pengelola';
    var attachment = $(this).data('file');
    imageUrl = '<?= base_url('file/viewFile/'); ?>'+origin+'/'+attachment;
    window.open(imageUrl, '_blank');
});

$(document).off('click', '#delete_file').on('click', '#delete_file', function(){
    Swal.fire({
        icon: "question",
        title: "Yakin?",
        text: "Anda yakin untuk menghapus file lampiran?",
        allowOutsideClick: false,
        showDenyButton: true,
        confirmButtonText: "Ya",
        denyButtonText: "Tidak"
    })
    .then((feedback)=>{
        if(feedback.isConfirmed){
            $(document).find('#attachment_exist').remove();
            $(document).find('[name="pengelola_attachment"]').removeClass('d-none');
            var user_id = '<?= $this->data['user_id']; ?>';
            $.ajax({
                async: false,
                type: "POST",
                url: "<?= base_url('pengelola/update_uploaded_pengelola'); ?>",
                data: {
                    filename: '',
                    user_id_upload: user_id,
                },
                dataType: "JSON",
                success: function (response) {
                    console.log('filename updated to the table');
                }
            });
        }
    })
});

function load_master_group_users(){
    var group_user_element = $('select[name="group_pengguna"]');
    $.ajax({
        async: false,
        type: "POST",
        url: '<?= base_url('users/get_master_group_users'); ?>',
        // data: "data",
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            if(response.length > 0){
                var options = '<option value="null" disabled selected>-- PILIH GRUP PENGGUNA --</option>';
                for(var keys in response){
                    options += '<option value="'+response[keys].group_user_id+'" data-text="'+response[keys].group_name+'">'+response[keys].group_name+'</option>';
                }
                group_user_element.html(options);
            }
        }
    });
}

function load_master_wilayah(){
    var wilayah_element = $('select[name="wilayah_pengguna"]');
    $.ajax({
        async: false,
        type: "POST",
        url: '<?= base_url('users/get_master_wilayah_users'); ?>',
        // data: "data",
        dataType: "JSON",
        success: function (response) {
            // console.log(response);
            if(response.length > 0){
                var options = '<option value="null" disabled selected>-- PILIH WILAYAH --</option>';
                for(var keys in response){
                    options += '<option value="'+response[keys].branch_group_id+'" data-text="'+response[keys].branch_group_name+'">'+response[keys].branch_group_name+'</option>';
                }
                wilayah_element.html(options);
            }
        }
    });
}
</script>
<?= $this->include('layouts/footer') ?>