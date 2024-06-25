<?= $this->include('layouts/header') ?>
<?php 
    $session = \Config\Services::session();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-dark mt-2">
                <div class="card-header p-1 border-dark bg-primary text-white text-center">
                    FORM GROUP RESTO
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table-condensed table-hover mb-3" width="60%">
                                <tbody>
                                    <tr>
                                        <td>Kode Group Resto</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm serialize" name="kode_branch_group" aria-label="Sizing example input" data-title="Kode Branch Group" aria-describedby="kode_branch_group" value="TBA" readOnly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Group Resto</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm required serialize" name="nama_group_resto" aria-label="Sizing example input" data-title="Nama Group Resto" aria-describedby="nama_group_resto">
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Jenis Layanan Order</td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control form-control-sm required serialize selectpicker" name="jenis_layanan_order" data-title="Jenis Layanan Order">
                                                <option value="null" selected disabled>-- PILIH JENIS LAYANAN ORDER --</option>
                                                <option value="DELIVERY">DELIVERY</option>
                                                <option value="REGULAR">REGULAR</option>
                                            </select>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="button" class="btn btn-sm btn-success" id="simpan_form_group_resto">SIMPAN</button>
                            <button type="button" class="btn btn-sm btn-danger" id="batal_form_group_resto">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    // autofill
    var branch_group_id = '<?= $this->data['branch_group_id']; ?>';
    if(branch_group_id != ''){ 
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('group_resto/get_data_by_id'); ?>",
            data: {
                branch_group_id: branch_group_id
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if(response.length > 0){
                    var data = response[0];
                    $(document).find('[name="kode_branch_group"]').val(response[0].branch_group_code);
                    $(document).find('[name="nama_group_resto"]').val(response[0].branch_group_name);
                    // $(document).find('[name="jenis_layanan_order"]').val(response[0].order_service);
                    // $(document).find('[name="alamat_resto"]').val(response[0].branch_address);
                    // $(document).find('[name="keaktifan"][value="'+response[0].is_active+'"]').trigger('click');
                    // $(document).find('[name="pengelola_parkir"]').append('<option value="'+response[0].parkmanagement_id+'">'+response[0].parkmanagement_name+'</option>').trigger('change');
                }
            }
        });
    }
});

$('button#simpan_form_group_resto').off('click').on('click', function(){
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
    if(passed){
        var data = $('.serialize').serializeArray();
        var user_nik = '<?= $session->get('user_nik') ?>';
        var branch_group_id = '<?= $this->data['branch_group_id']; ?>';
        if(branch_group_id != ''){ // update
            var url = "<?= base_url('group_resto/update_form_group_resto'); ?>";
            data = {
                data: data,
                user_nik: user_nik,
                branch_group_id: branch_group_id
            };
            var message_status = 'update';
        }else{ // insert
            var url = "<?= base_url('group_resto/simpan_form_group_resto'); ?>";
            data = {
                data: data,
                user_nik: user_nik
            };
            var message_status = 'menyimpan';
        }
        $.ajax({
            async: false,
            type: "POST",
            url: url,
            data: data,
            dataType: "JSON",
            success: function (insert_response) {
                if(insert_response == '1'){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Berhasil "+message_status+" data group resto.",
                        allowOutsideClick: false,
                        showConfirmButton: true
                    })
                    .then((feedback)=>{
                        if(feedback.isConfirmed){
                            window.location = "<?= base_url('group_resto') ?>";
                        }
                    })
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: "Gagal "+message_status+" data group resto.",
                        allowOutsideClick: false,
                        showConfirmButton: true
                    })
                }
            }
        });
    }else if(!passed){
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
    }
})

$('#batal_form_group_resto').click(function(){
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
            window.location = '<?= base_url('group_resto'); ?>';
        }else if(choice.isDenied){
            // do nothing
        }
    })
})
</script>
<?= $this->include('layouts/footer') ?>