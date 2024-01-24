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
      <h1>Informasi Profil / Akun Petugas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card rounded-4">
            <div class="card-body">
              <h5 class="card-title">Informasi Profil / Akun Petugas</h5>
              <!-- Bordered Tabs Justified -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Basic</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Lainnya</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade active show" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">    

                <form action="../controller/Controller.php" method="post">
                    <div class="row mt-4">
                      <?php $fetchdata_akun=getDataAkun(); 
                      ?>
                      <div class="col-3">
                        <label for="adm_nama_admin">Nama Admin / Petugas</label>
                      </div>
                      <div class="col-9">
                        <input type="text" class="form-control rounded-pill" name="adm_nama_admin" value="<?= $fetchdata_akun['adm_nama_admin']; ?>" required>
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-3">
                        <label for="adm_role">Role</label>
                      </div>
                      <div class="col-9">
                        <input type="text" class="form-control rounded-pill" name="adm_role" value="<?= $fetchdata_akun['adm_role']; ?>" required>
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-3">
                        <label for="adm_username">Username</label>
                      </div>
                      <div class="col-9">
                        <input type="text" class="form-control rounded-pill" name="adm_username" value="<?= $fetchdata_akun['adm_username']; ?>" required>
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-3">
                        <label for="adm_password">Update Password Baru</label>
                      </div>
                      <div class="col-9">
                        <input type="password" class="form-control rounded-pill" name="adm_password">
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col-3">
                        <label for="adm_password_verification">Ulangi Password Baru</label>
                      </div>
                      <div class="col-9">
                        <input type="password" class="form-control rounded-pill" name="adm_password_verification">
                      </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                      <button type="submit" name="update-akun-admin" class="btn btn-sm btn-primary rounded-pill" style="width:40%!important;"><i class="bi bi-arrow-clockwise"></i><span> Update Info Akun</span></button>
                    </div>
                </form>

                </div>
                
                <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                  <span class="mt-5 d-flex justify-content-center"><h1>---</h1></span>
                  <h2 class="d-flex justify-content-center mt-5 mb-5"> Maaf fitur belum ada. </h2>
                  <span class="mb-5 d-flex justify-content-center"><h1>---</h1></span>
                </div>
              </div><!-- End Bordered Tabs Justified -->

            </div>
          </div>

        </div>
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
<?php include "Modal.php"; ?>
</html>