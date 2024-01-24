<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Posyandu <?= $fetchdata_pengaturan['png_nama_posyandu'];?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logoposyandu.png" rel="icon">
  <link href="../assets/img/logoposyandu.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../assets/vendor/select2/select2.min.css" rel="stylesheet">
  <link href="../assets/vendor/select2/select2-bootstrap-5-theme.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
<?php include "Header.php"; ?>

  <!-- ======= Sidebar ======= -->
<?php include "Navigation.php"; ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pemeriksaan Ibu Periode <?= date('m/Y');?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pemeriksaan Ibu Periode <?= date('m/Y');?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card rounded-4">
            <div class="card-body">
              <h5 class="card-title">Pemeriksaan Ibu Periode <?= date('m/Y');?></h5>
              <p>Berikut adalah semua data pemeriksaan Akseptor gunakan <code>.Search </code> untuk mencari atau memfilter data. gunakan kolom <code>.Jenis pelayanan </code> untuk mengubah data.</p>
              <a href="#" data-bs-toggle="modal" data-bs-target="#periksa-ibu-entry" class="btn btn-outline-primary mt-2 mb-4 rounded-pill"><i class="bi bi-plus-circle"></i><span> Jenis Pelayanan </span></a>
              <a href="#" onclick="location.reload();" class="btn btn-outline-warning mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise"></i><span> Refresh data </span></a>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#No</th>
                    <th scope="col">NIK Ibu</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Nama Suami</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Status Pemeriksaan</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $data=getDataPemeriksaanIbu();
                    $no=0;
                    foreach($data as $fetch){
                    $no++;
                    ?>
                  <tr>
                    <th scope="row"><b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$no;?></b></th>
                    <td>
                        <?=$fetch['ibu_nik'];?>
                    </td>
                    <td>
                        <?=$fetch['ibu_nama'];?>
                    </td>               
                    <td>
                        <?=$fetch['ibu_nama_suami'];?>
                    </td>  
                    <td><?=$fetch['ibu_tanggal_lahir'];?></td>
                    <td>
                        <?=intval(date('Y'))-intval($fetch['ibu_tahun_lahir']) . " Tahun";?>
                    </td>
                    <td>
                        <?=$fetch['keterangan'];?>     
                    </td>

                    <td>
                        <?php if($fetch['status_periksa']=='Belum Periksa'){
                            echo "<div class='badge bg-danger mb-2'>Belum Periksa</div>";
                            echo "<a href='#' data-bs-toggle='modal' data-bs-target='#periksa-ibu' class='btn btn-sm btn-outline-primary rounded-5'
                            data-bs-id_pemeriksaan='{$fetch["id_pemeriksaan"]}'
                            data-bs-niknamaibu='{$fetch["ibu_nik"]} - {$fetch["ibu_nama"]}'
                            data-bs-ibu_nik='{$fetch["ibu_nik"]}'><i class='bi bi-calendar2-check-fill'></i><span> Jenis Pelayanan / Edit</span></a>";
                        }else if($fetch['status_periksa']=='Sudah Periksa'){
                            echo "<div class='badge bg-success mb-2'>Sudah Periksa</div>";
                            echo "<a href='#' data-bs-toggle='modal' data-bs-target='#periksa-ibu' class='btn btn-sm btn-outline-primary rounded-5'
                            data-bs-id_pemeriksaan='{$fetch["id_pemeriksaan"]}'
                            data-bs-niknamaibu='{$fetch["ibu_nik"]} - {$fetch["ibu_nama"]}'
                            data-bs-ibu_nik='{$fetch["ibu_nik"]}'><i class='bi bi-calendar2-check-fill'></i><span> Jenis Pelayanan / Edit</span></a>";
                        };?>     
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "Footer.php"; ?>
  <?php include "Modal.php"; ?>

  <!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery-3.7.1.min.js"></script>
  <script src="../assets/vendor/select2/select2.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#ibu_nik-entry').select2({
          dropdownParent: $('#periksa-ibu-entry .modal-content'),
          theme: "bootstrap-5",
        });
    });
  </script>

</body>


<script>
    var EntryPeriksa = document.getElementById('periksa-ibu')
    EntryPeriksa.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var id_pemeriksaan = button.getAttribute('data-bs-id_pemeriksaan')
    var ibu_nik = button.getAttribute('data-bs-ibu_nik')
    var niknamaibu = button.getAttribute('data-bs-niknamaibu')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = EntryPeriksa.querySelector('.modal-title')
    var niknamaibu_inp = EntryPeriksa.querySelector('.modal-body #niknamaibu')
    var id_pemeriksaan_inp = EntryPeriksa.querySelector('.modal-body #id_pemeriksaan')
    var ibu_nik_inp = EntryPeriksa.querySelector('.modal-body #ibu_nik')

    modalTitle.textContent = 'Tambah Jenis Pelayanan Ibu ID : ' + id_pemeriksaan
    niknamaibu_inp.value = niknamaibu
    id_pemeriksaan_inp.value = id_pemeriksaan
    ibu_nik_inp.value = ibu_nik
  })
</script>
</html>