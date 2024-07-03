<?php
    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Invoice (Flat)</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        /* Add any styles for the print content here */
        /* table{
            border: 1px solid black !important;
        } */
        body{
            font-size: 12px !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-2">
        <table class="table-condensed table-bordered" width="100%">
            <thead>
                <tr>
                    <th colspan="100%">
                        <div class="d-flex bd-highlight">
                            <div class="me-auto p-2 bd-highlight">
                                <h5><b>Surat Serah Terima Biaya Pendapatan Parkir</b></h5>
                            </div>
                            <div class="p-1 bd-highlight">
                                <b style="font-size: 10px;">PT. Pesta Pora Abadi</b>
                            </div>
                            <div class="p-1 bd-highlight">
                                <img class="img-fluid for-light" src="../ppa_logo.png" height="20px" width="20px" alt="">
                            </div>
                            <div class="p-1 bd-highlight">
                                <img class="img-fluid for-light" src="../favicon.ico" alt="">
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="100%">
                        <div class="container-fluid">
                            <div class="d-flex">
                                <div class="me-auto">
                                    Kepada, <br>
                                    PIC Resto
                                </div>
                                <div>
                                    Tanggal: <?= $this->data['existing_invoice'][0]->inv_date; ?>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="me-auto">
                                    Pengelola Parkir <br/>
                                    <?= $this->data['existing_invoice'][0]->parkmanagement_name; ?> <br>
                                    <?= $this->data['existing_invoice'][0]->parkmanagement_num; ?>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="me-auto">
                                    Nomor Penagihan: <u><?= $this->data['existing_invoice'][0]->inv_code; ?></u>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <h6><b>Rincian Biaya & Tagihan:</b></h6>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table-condensed table-bordered table-dark" width="80%">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary">Biaya Setoran Flat</th>
                                                <th class="text-center"><?= rupiah($this->data['existing_invoice'][0]->billed_nominal); ?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <h6><b>Rincian Setoran Saat Ini:</b></h6>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table-condensed table-bordered table-dark" width="100%">
                                        <thead class="bg-dark text-center">
                                            <tr>
                                                <th>Tanggal Tagihan</th>
                                                <th>Total Tagihan</th>
                                                <th>Jumlah Terbayar</th>
                                                <th class="text-danger">Jumlah Terutang</th>
                                                <th>Jumlah yang Disetor Saat Ini</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td><?= $this->data['existing_invoice'][0]->inv_date; ?></td>
                                                <td><?= rupiah($this->data['existing_invoice'][0]->billed_nominal); ?></td>
                                                <td><?= rupiah($this->data['existing_invoice'][0]->pay_off_nominal); ?></td>
                                                <td><?= rupiah(intval($this->data['existing_invoice'][0]->billed_nominal) - intval($this->data['existing_invoice'][0]->pay_off_nominal)); ?></td>
                                                <td class="bg-warning"></td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-primary text-center">
                                            <tr>
                                                <td class="text-center"><b>Total</b></td>
                                                <td><?= rupiah($this->data['existing_invoice'][0]->billed_nominal); ?></td>
                                                <td><?= rupiah($this->data['existing_invoice'][0]->pay_off_nominal); ?></td>
                                                <td><?= rupiah(intval($this->data['existing_invoice'][0]->billed_nominal) - intval($this->data['existing_invoice'][0]->pay_off_nominal)); ?></td>
                                                <td class="bg-warning"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3" id="div_outstanding_invoice" style="font-size: 12px;">
                                <div class="col-lg-12">
                                    <h6><b>Rincian Tunggakan Sebelumnya:</b></h6>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table-condensed table-bordered table-dark" width="100%" id="tabel_outstanding_invoice">
                                        <thead class="bg-dark text-center">
                                            <tr>
                                                <th width="25%">Nomor Surat</th>
                                                <th>Tanggal Tagihan</th>
                                                <th>Total Tagihan</th>
                                                <th>Jumlah Terbayar</th>
                                                <th class="text-danger">Jumlah Terutang</th>
                                                <th width="15%">Jumlah yang Disetor Saat Ini</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            
                                        </tbody>
                                        <tfoot class="bg-primary text-center">
                                            
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-md-6 col-sm-6 text-start">
                                    Menyetujui,
                                    <br/>
                                    <br/>
                                    <br/>
                                    _____________________________<br/>
                                    PIC Resto
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 text-end">
                                    <br/>
                                    <br/>
                                    <br/>
                                    <u><?= $this->data['existing_invoice'][0]->parkmanagement_name; ?></u><br/>
                                    Pengelola Parkir
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- <h1>Content to Print</h1>
    <p>This content is generated by a PHP script and will be printed.</p> -->
</body>
<script>
    $(document).ready(function () {
        $.ajax({
            async: false,
            type: "POST",
            url: "<?= base_url('invoice/get_all_outstanding') ?>",
            data: {
                branch_id: "<?= $this->data['branch_id'] ?>",
                inv_date: "<?= $this->data['inv_date'] ?>"
            },
            dataType: "JSON",
            success: function (response) {
                // console.log(response)
                if(response.length > 0){
                    var html = '';
                    for(var keys in response){
                        html += '<tr>'+
                                    '<td>'+response[keys].inv_code+'</td>'+
                                    '<td>'+response[keys].inv_date+'</td>'+
                                    '<td>'+rupiah(response[keys].billed_nominal)+'</td>'+
                                    '<td>'+rupiah(response[keys].pay_off_nominal)+'</td>'+
                                    '<td>'+rupiah(parseInt(response[keys].billed_nominal)-parseInt(response[keys].pay_off_nominal))+'</td>'+
                                    '<td></td>'+
                                '</tr>';
                    }
                    $('#tabel_outstanding_invoice tbody').append(html);
                }else{
                    $('#div_outstanding_invoice').addClass('d-none');
                }
            }
        });
        window.print();
    });
    function rupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount);
    }
</script>
</html>
