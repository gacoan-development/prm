<?= $this->include('layouts/header') ?>
<?php 
    $session = \Config\Services::session();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-dark mt-2">
                <div class="card-header p-1 border-dark bg-primary text-white text-center">
                    FORM PEMBAYARAN PAJAK
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover mb-3" width="100%">
                                <tbody>
                                    <tr>
                                        <td>Kode Pembayaran Pajak</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control serialize" name="kode_taxpay" aria-label="Sizing example input" data-title="Kode Pembayaran Pajak" value="TBA" readOnly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Resto</td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm serialize selectpicker" name="nama_resto">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nominal Pembayaran Pajak</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control serialize" name="bill_total_taxpay" aria-label="Sizing example input" data-title="Nominal Pembayaran Pajak">
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Alamat Resto</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control serialize" name="alamat_resto" aria-label="Sizing example input">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Pengelola Parkir</td>
                                        <td>:</td>
                                        <td>
                                            <select name="pengelola_parkir_resto" id="pengelola_parkir_resto" class="form-control serialize"></select>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Status Keaktifan</td>
                                        <td>:</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check serialize" name="keaktifan" id="aktif" autocomplete="off" value="1">
                                                <label class="btn btn-outline-success" for="aktif">Aktif</label>

                                                <input type="radio" class="btn-check serialize" name="keaktifan" id="nonaktif" autocomplete="off" value="0">
                                                <label class="btn btn-outline-secondary" for="nonaktif">Non-aktif</label>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table-condensed table-hover mb-3" width="100%">
                                <tbody>
                                    <!-- <tr>
                                        <td>Store key</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control serialize" name="store_key" aria-label="Sizing example input" data-title="Store Key" readOnly>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>Catatan</td>
                                        <td>:</td>
                                        <td>
                                            <textarea name="ket_taxpay" id="ket_taxpay" class="form-control form-control-sm serialize" style="resize: none;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran</td>
                                        <td>:</td>
                                        <td><input type="file" class="form-control" name="taxpay_attachment" id=""></td>
                                        <!-- <td><input type="hidden" name="inv_id_upload"></td> -->
                                    </tr>
                                    <!-- <tr>
                                        <td>Branch Entity</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control serialize" name="branch_entity" aria-label="Sizing example input" data-title="Branch Entity" value="PPA" readOnly>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-sm btn-success" id="simpan_form_pajak">SIMPAN</button>
                            <button type="button" class="btn btn-sm btn-danger" id="batal_form_pajak">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    load_master_area();
    $('[name="pengelola_parkir_resto"]').select2({
        tokenSeparators: [',', ' '],
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        width: '85%',
        height: '100%',
        ajax: {
            url: '<?= base_url('resto/get_master_pengelola'); ?>',
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
            }
        },
        placeholder: 'Masukkan nama pengelola'
    });
    $(document).find('select[name="nama_resto"]').select2({
        tokenSeparators: [',', ' '],
        minimumInputLength: 1,
        minimumResultsForSearch: 10,
        width: '100%',
        ajax: {
            url: '<?= base_url('pajak/get_all_resto'); ?>',
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
    // autofill
    var taxpay_id = '<?= $this->data['taxpay_id']; ?>';
    if(taxpay_id != ''){ 
        $.ajax({
            type: "POST",
            url: "<?= base_url('pajak/get_data_by_id'); ?>",
            data: {
                taxpay_id: taxpay_id
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response);
                if(response.length > 0){
                    var data = response[0];
                    $(document).find('[name="kode_taxpay"]').val(response[0].taxpay_code);
                    $(document).find('[name="bill_total_taxpay"]').val(response[0].taxpay_total);
                    $(document).find('[name="ket_taxpay"]').val(response[0].taxpay_note);
                    // $(document).find('[name="alamat_resto"]').val(response[0].branch_address);
                    // $(document).find('[name="store_key"]').val(response[0].store_key);
                    // $(document).find('[name="branch_pos"]').val(response[0].branch_pos);
                    // $(document).find('[name="keaktifan"][value="'+response[0].is_active+'"]').trigger('click');
                    $(document).find('[name="nama_resto"]').append('<option value="'+response[0].branch_id+'">'+response[0].branch_name+'</option>').trigger('change');
                }
            }
        });
    }
});

$('button#simpan_form_pajak').off('click').on('click', function(){
    var taxpay_code = $('[name="kode_taxpay"]').val();
    var taxpay_id = '<?= $this->data['taxpay_id']; ?>';
    var data = $('.serialize').serializeArray();
    var user_nik = '<?= $session->get('user_nik') ?>';
    var taxpay_id = '<?= $this->data['taxpay_id']; ?>';
    var uploadStatus = false;
    var uploaded_filename = '';
    if(taxpay_id != ''){ // update
        var url = "<?= base_url('pajak/update_form_pajak'); ?>";
        data = {
            data: data,
            user_nik: user_nik,
            taxpay_id: taxpay_id
        };
        var message_status = 'update';
    }else{ // insert
        var url = "<?= base_url('pajak/simpan_form_pajak'); ?>";
        data = {
            data: data,
            user_nik: user_nik
        };
        var message_status = 'menyimpan';
    }
    // console.log(data)
    $.ajax({
        async: false,
        type: "POST",
        url: url,
        data: data,
        dataType: "JSON",
        success: function (insert_response) {
            if(insert_response != '0'){
                // upload file
                var file_attachment = $(document).find('[name="taxpay_attachment"]')[0].files[0];
                const formData = new FormData();
                formData.append('taxpay_file', file_attachment);
                var taxpay_id = insert_response;
                $.ajax({
                    async: false,
                    type: "POST",
                    url: "<?= base_url('pajak/upload_pajak'); ?>",
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
                                    url: "<?= base_url('pajak/update_attachment'); ?>",
                                    data: {
                                        taxpay_id: taxpay_id,
                                        filename: uploaded_filename
                                    },
                                    dataType: "JSON",
                                    success: function (response) {
                                        if(response == '1'){
                                            Swal.fire({
                                                icon: "success",
                                                title: "Berhasil!",
                                                text: "Berhasil "+message_status+" data pembayaran pajak.",
                                                allowOutsideClick: false,
                                                showConfirmButton: true
                                            })
                                            .then((feedback)=>{
                                                if(feedback.isConfirmed){
                                                    window.location = "<?= base_url('pajak') ?>";
                                                }
                                            })
                                        }
                                    }
                                });
                            } else {
                                uploadStatus = false; // Update the variable on failure
                                console.error('Failed to upload file');
                            }
                        }
                    }
                });
                // Swal.fire({
                //     icon: "success",
                //     title: "Berhasil!",
                //     text: "Berhasil "+message_status+" data pembayaran pajak.",
                //     allowOutsideClick: false,
                //     showConfirmButton: true
                // })
                // .then((feedback)=>{
                //     if(feedback.isConfirmed){
                //         window.location = "<?//= base_url('pajak') ?>";
                //     }
                // })
            }
        }
    });
    // if(branch_code != ''){
    //     $.ajax({
    //         async: false,
    //         type: "GET",
    //         url: '<?//= base_url('resto/get_duplicate_code'); ?>',
    //         data: {
    //             resto_code: branch_code
    //         },
    //         dataType: "JSON",
    //         success: function (response) {
    //             // console.log(response);
    //             if(response.length > 0 && taxpay_id == ''){
    //                 Swal.fire({
    //                     icon: 'warning',
    //                     title: "Perhatian!",
    //                     text: 'Kode resto cabang '+response[0].branch_code+' sudah ada ('+response[0].branch_name+'). mohon periksa kode resto cabang kembali.'
    //                 })
    //             }else{
    //                 var data = $('.serialize').serializeArray();
    //                 var user_nik = '<?//= $session->get('user_nik') ?>';
    //                 var taxpay_id = '<?//= $this->data['taxpay_id']; ?>';
    //                 if(taxpay_id != ''){ // update
    //                     var url = "<?//= base_url('resto/update_form_pajak'); ?>";
    //                     data = {
    //                         data: data,
    //                         user_nik: user_nik,
    //                         taxpay_id: taxpay_id
    //                     };
    //                     var message_status = 'update';
    //                 }else{ // insert
    //                     var url = "<?//= base_url('resto/simpan_form_pajak'); ?>";
    //                     data = {
    //                         data: data,
    //                         user_nik: user_nik
    //                     };
    //                     var message_status = 'menyimpan';
    //                 }
    //                 // console.log(data)
    //                 $.ajax({
    //                     async: false,
    //                     type: "POST",
    //                     url: url,
    //                     data: data,
    //                     dataType: "JSON",
    //                     success: function (insert_response) {
    //                         if(insert_response == '1'){
    //                             Swal.fire({
    //                                 icon: "success",
    //                                 title: "Berhasil!",
    //                                 text: "Berhasil "+message_status+" data resto.",
    //                                 allowOutsideClick: false,
    //                                 showConfirmButton: true
    //                             })
    //                             .then((feedback)=>{
    //                                 if(feedback.isConfirmed){
    //                                     window.location = "<?//= base_url('resto') ?>";
    //                                 }
    //                             })
    //                         }
    //                     }
    //                 });
    //             }
    //         }
    //     });
    // }else{
    //     Swal.fire({
    //         icon: 'warning',
    //         title: "Perhatian!",
    //         text: "Kode resto cabang masih kosong, mohon diperiksa kembali."
    //     })
    // }
})

$('#batal_form_pajak').click(function(){
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
            window.location = '<?= base_url('resto'); ?>';
        }else if(choice.isDenied){
            // do nothing
        }
    })
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
                var options = '<option value="null" selected disabled>-- PILIH AREA --</option>';
                for(var keys in response){
                    options += '<option value="'+response[keys].branch_group_id+'">'+response[keys].branch_group_name+'</option>';
                }
                area_element.html(options);
            }
        }
    });
}
</script>
<?= $this->include('layouts/footer') ?>