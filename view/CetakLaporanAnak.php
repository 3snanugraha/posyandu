<?php
$fetchdata_pengaturan = array();
$fetchdata_pengaturan = getDataPengaturan();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Posyandu <?= $fetchdata_pengaturan['png_nama_posyandu'];?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<style>
		body {
			font-family: Arial, sans-serif;
			max-width: 800px;
			margin: 0 auto;
		}
		
		table {
			width: 100%;
			border-collapse: collapse;
		}
		
		th, td {
			padding: 8px;
			text-align: left;
			border: 1px solid #ddd;
		}
		
		@media (max-width: 600px) {
			table, thead, tbody, th, td, tr {
				display: block;
			}
			th, td {
				padding: 8px;
			}
			thead {
				display: none;
			}
		}
	</style>
</head>
<body>
    <div class="row">
        <div class="col-4">
            <img src="../assets/img/logoposyandu.png" width="100%" alt="">
        </div>
        <div class="col-8">
            <h1 class="mt-5">Posyandu <?= $fetchdata_pengaturan['png_nama_posyandu'];?></h1>
            <p><?= $fetchdata_pengaturan['png_alamat_posyandu'];?></p>
        </div>
    </div>    
    
    <hr>
	<b><p class="text-center">Laporan Hasil Posyandu <?= $fetchdata_pengaturan['png_nama_posyandu'];?> Periode <?= $dari_tanggal;?> S/D <?= $sampai_tanggal; ?></p></b>
	<table>
		<thead>
			<tr>
				<th>#No</th>
				<th>Nama Balita</th>
				<th>Tanggal Lahir</th>
				<th>JK</th>
				<th>TB(CM)</th>
				<th>BB(KG)</th>
				<th>LILA(CM)</th>
				<th>LK(CM)</th>
				<th>Status</th>
				<th>Keterangan</th>
				<th>BL/TH Entri</th>
			</tr>
		</thead>
		<tbody>
            <?php
            $fetchdata_laporan=cetakLaporanAnak($dari_tanggal,$sampai_tanggal);
            $no=0;
            foreach($fetchdata_laporan as $fetch){
            $no++;
            ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $fetch['anak_nama_anak']; ?></td>
				<td><?= $fetch['anak_tanggal_lahir']; ?></td>
				<td>
                <?php if($fetch['anak_jenis_kelamin']=='Laki-Laki'){
                    echo "L";
                }else{
                    echo "P";    
                }
                ?>
                </td>
				<td><?= $fetch['periksa_tb']; ?></td>
				<td><?= $fetch['periksa_bb']; ?></td>
				<td><?= $fetch['periksa_lila']; ?></td>
				<td><?= $fetch['periksa_lk']; ?></td>
				<td><?= $fetch['status_periksa']; ?></td>
				<td><?= $fetch['keterangan']; ?></td>
				<td>
                    <?php 
                    $date=date_create($fetch['tanggal_periksa']);
                    echo date_format($date, "m/Y"); 
                    ?>
                </td>
			</tr>
            <?php } ?>
			<!-- Add more rows as needed -->
		</tbody>
	</table>
</body>
</html>