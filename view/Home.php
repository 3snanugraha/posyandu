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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-4 mb-3">
          <img src="../assets/img/medical.png" class="img-fluid rounded-pill">
        </div>
        <div class="col-lg-8">
          <h2>Selamat datang di Posyandu <?=$fetchdata_pengaturan['png_nama_posyandu'] . "<br>";?> <?= $_SESSION['adm_nama_admin'] ?>,</h2>
          <p>Berikut adalah rangkuman semua data, <br> Silahkan Klik Menu <code> Di Bawah ini </code> untuk melihat data secara detail. </p>
        </div>
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card rounded-4">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Aksi</h6>
                    </li>
                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=data-anak"?>">Buka Data</a></li>
                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=home"?>">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data Anak <span>| Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                      $data_anak=hitungDataAnak(); 
                      echo $data_anak;
                      ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">Pilih</span> <span class="text-muted small pt-2 ps-1">menu untuk olah data</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card rounded-4">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=data-lansia"?>">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Lansia <span>| Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        $data_lansia=hitungDataLansia(); 
                        echo $data_lansia;
                      ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">Pilih</span> <span class="text-muted small pt-2 ps-1">menu untuk olah data</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card rounded-4">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=data-ibu"?>">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Ibu <span>| Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        $data_ibu=hitungDataIbu(); 
                        echo $data_ibu;
                      ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">Pilih</span> <span class="text-muted small pt-2 ps-1">menu untuk olah data</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card rounded-4">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=pemeriksaan-anak"?>">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pemeriksaan <span>| Data Pemeriksaan Anak</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $data_periksa_anak=hitungDataPeriksaAnak(); 
                        echo $data_periksa_anak;
                        ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">Pilih</span> <span class="text-muted small pt-2 ps-1">menu untuk olah data</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->
            
            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card rounded-4">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=pemeriksaan-ibu"?>">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pemeriksaan <span>| Data Pemeriksaan Ibu</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $data_periksa_ibu=hitungDataPeriksaIbu(); 
                        echo $data_periksa_ibu;
                        ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">Pilih</span> <span class="text-muted small pt-2 ps-1">menu untuk olah data</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card rounded-4">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Menu</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . "?u=pemeriksaan-lansia"?>">Buka</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pemeriksaan <span>| Data Pemeriksaan Lansia</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $data_periksa_lansia=hitungDataPeriksaLansia();
                        echo $data_periksa_lansia;
                        ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">Pilih</span> <span class="text-muted small pt-2 ps-1">menu untuk olah data</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->



          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "Footer.php"; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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

</body>

</html>