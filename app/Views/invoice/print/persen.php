<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Invoice (Persen)</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        /* Add any styles for the print content here */
        /* table{
            border: 1px solid black !important;
        } */
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
                                <img class="img-fluid for-light" src="../ppa_logo.png" height="100px" width="100px" alt="">
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
                                    Tanggal: {dd-mm-yyyy}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-auto">
                                    {Nama manajemen parkir} <br>
                                    {No Telp manajemen parkir}
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-auto">
                                    Nomor Penagihan: <u>{Nomor invoice}</u>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6><b>Rincian Biaya & Tagihan:</b></h6>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table-condensed table-bordered table-dark" width="80%">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary">Biaya Setoran Flat</th>
                                                <th>Rp. <span class="me-auto">100000</span></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6><b>Rincian Setoran Saat Ini:</b></h6>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table-condensed table-bordered table-dark" width="100%">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th>Tanggal Tagihan</th>
                                                <th>Total Tagihan</th>
                                                <th>Jumlah Terbayar</th>
                                                <th class="text-danger">Jumlah Terutang</th>
                                                <th>Jumlah yang Disetor Saat Ini</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot class="bg-primary">
                                            <tr>
                                                <td class="text-center"><b>Total</b></td>
                                                <td>Rp. 100000</td>
                                                <td></td>
                                                <td class="text-danger">Rp. -</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                <div class="col-lg-12">
                                    <h6><b>Rincian Tunggakan Sebelumnya:</b></h6>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table-condensed table-bordered table-dark" width="100%">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th>Nomor Surat</th>
                                                <th>Tanggal Tagihan</th>
                                                <th>Total Tagihan</th>
                                                <th>Jumlah Terbayar</th>
                                                <th class="text-danger">Jumlah Terutang</th>
                                                <th>Jumlah yang Disetor Saat Ini</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot class="bg-primary">
                                            <tr>
                                                <td colspan="2" class="text-center"><b>Total</b></td>
                                                <td>Rp. 100000</td>
                                                <td></td>
                                                <td class="text-danger">Rp. -</td>
                                                <td></td>
                                            </tr>
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
                                    {PIC Resto}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 text-end">
                                    <br/>
                                    <br/>
                                    <br/>
                                    _____________________________<br/>
                                    {Pengelola Parkir}
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
        window.print();
    });
</script>
</html>
