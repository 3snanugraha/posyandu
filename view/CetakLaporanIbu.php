<?php
$fetchdata_pengaturan = array();
$fetchdata_pengaturan = getDataPengaturan();
$date_dari=date_create($dari_tanggal);
$date_sampai=date_create($sampai_tanggal);
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
            <h1 class="mt-5">Data Keluarga Berencana Posyandu <?= $fetchdata_pengaturan['png_nama_posyandu'];?></h1>
            <p><?= $fetchdata_pengaturan['png_alamat_posyandu'];?></p>
        </div>
    </div>    
    
    <hr>
	<b><p class="text-center">Data Hasil KB <?= $fetchdata_pengaturan['png_nama_posyandu'];?> Periode <?= date_format($date_dari, "M Y");?> S/D <?= date_format($date_sampai, "M Y"); ?></p></b>
	<table>
		<thead>
			<tr>
				<th>#No</th>
				<th>Nama Akseptor</th>
				<th>NIK</th>
				<th>Nama Suami</th>
				<th>Usia</th>
				<th>Jenis Pelayanan</th>
				<th>Keterangan</th>
				<th>BL/TH Entri</th>
			</tr>
		</thead>
		<tbody>
            <?php
            $fetchdata_laporan=cetakLaporanIbu($dari_tanggal,$sampai_tanggal);
            $no=0;
            foreach($fetchdata_laporan as $fetch){
            $no++;
            ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $fetch['ibu_nama']; ?></td>
				<td><?= $fetch['ibu_nik']; ?></td>
				<td><?= $fetch['ibu_nama_suami'];?></td>
				<td><?=intval(date('Y'))-intval($fetch['ibu_tahun_lahir']) . " Tahun";?></td>
				<td><?= $fetch['jenis_pelayanan']; ?></td>
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
<script>
	window.print();
</script>
</html>