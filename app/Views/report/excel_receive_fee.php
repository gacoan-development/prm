<!DOCTYPE html>
<html>
<head>
	<title>Laporan Parkir Harian ( <?= $this->data['date_receive_fee']; ?> )</title>
</head>
<body>
	<style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th,
        table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
    
        }
        a{
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
	</style>
 
	<?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Parkir Harian ".$this->data['date_receive_fee'].".xls");
	?>
 
	<center>
		<h1>Laporan Parkir Harian (<?= $this->data['date_receive_fee']; ?>)</h1>
	</center>
 
	<table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Resto</th>
                <th>Kode Resto</th>
                <th>Tagihan Bill</th>
                <th>Setoran Harian Bill</th>
                <th>Selisih</th>
                <th>Jumlah Terhutang</th>
                <th>Persentase Setoran Harian</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(count(json_decode($this->data['result'])) > 0){
                    $result = json_decode($this->data['result']);
                    foreach($result AS $key => $value){
                        ?>
                            <tr>
                                <td class="text-center"><?= intval($key)+1 ?></td>
                                <td class="text-center"><?= $value->nama_resto; ?></td>
                                <td class="text-center"><?= $value->kode_resto; ?></td>
                                <td class="text-center"><?= $value->tagihan_bill; ?></td>
                                <td class="text-center"><?= $value->setoran_harian_bill; ?></td>
                                <td class="text-center"><?= $value->selisih; ?></td>
                                <td class="text-center"><?= $value->jumlah_terhutang; ?></td>
                                <td class="text-center"><?= $value->persentase_setoran_harian; ?></td>
                                <td class="text-center"><?= $value->keterangan; ?></td>
                            </tr>
                        <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan="9" class="text-danger text-center"><b>Tidak ada data.</b></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
	</table>
</body>
</html>