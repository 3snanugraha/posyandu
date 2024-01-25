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
      <h1>Pemeriksaan Lansia Periode <?= date('m/Y');?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pemeriksaan Lansia Periode <?= date('m/Y');?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card rounded-4">
            <div class="card-body">
              <h5 class="card-title">Pemeriksaan Lansia Periode <?= date('m/Y');?></h5>
              <p>Berikut adalah semua data pemeriksaan lansia gunakan <code>.Search </code> untuk mencari atau memfilter data. gunakan kolom <code>.Periksa </code> untuk mengolah data.</p>
              <a href="#" data-bs-toggle="modal" data-bs-target="#periksa-lansia" class="btn btn-outline-primary mt-2 mb-4 rounded-pill"><i class="bi bi-plus-circle"></i><span> Periksa Lansia </span></a>
              <a href="#" onclick="location.reload();" class="btn btn-outline-warning mt-2 mb-4 rounded-pill"><i class="bi bi-arrow-clockwise"></i><span> Refresh data </span></a>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Usia</th>
                    <th scope="col">JK</th>
                    <th scope="col">TB</th>
                    <th scope="col">BB</th>
                    <th scope="col">Body Fat</th>
                    <th scope="col">Tensi</th>
                    <th scope="col">Gula Darah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Status Pemeriksaan</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $data=getDataPemeriksaanLansia();
                    $no=0;
                    foreach($data as $fetch){
                    $no++;
                    ?>
                  <tr>
                    <th scope="row"><b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$no;?></b></th>
                    <td>
                        <?=$fetch['lansia_NIK'];?>
                    </td>
                    <td>
                        <?=$fetch['lansia_nama_lengkap'];?>
                    </td>
                    <td>
                        <?=intval(date('Y'))-intval($fetch['lansia_tahun_lahir']) . " Tahun";?>
                    </td>  
                    <td>
                        <?=$fetch['lansia_jenis_kelamin'];?>
                    </td>
                    <td>
                        <?=$fetch['periksa_tb']." Cm";?>
                    </td>
                    <td>
                        <?=$fetch['periksa_bb']." Kg";?>     
                    </td>
                    <td>
                        <?=$fetch['body_fat'];?>     
                    </td>
                    <td>
                        <?=$fetch['tensi'];?>     
                    </td>
                    <td>
                        <?=$fetch['gula_darah'];?>     
                    </td>

                    <td>
                        <?=$fetch['keterangan'];?>     
                    </td>

                    <td>
                        <?php if($fetch['status_periksa']=='Belum Periksa'){
                            echo "<div class='badge bg-danger mb-2'>Belum Periksa</div>";
                            echo "<a href='#' data-bs-toggle='modal' data-bs-target='#periksa-lansia' class='btn btn-sm btn-outline-primary rounded-5'
                            data-bs-id_pemeriksaan='{$fetch["id_pemeriksaan"]}'
                            data-bs-niknamalansia='{$fetch["lansia_NIK"]} - {$fetch["lansia_nama_lengkap"]}'
                            data-bs-lansia_NIK='{$fetch["lansia_NIK"]}'
                            data-bs-periksa_tb='{$fetch["periksa_tb"]}'
                            data-bs-periksa_bb='{$fetch["periksa_bb"]}'
                            data-bs-body_fat='{$fetch["body_fat"]}'
                            data-bs-tensi='{$fetch["tensi"]}' 
                            data-bs-gula_darah='{$fetch["gula_darah"]}'
                            data-bs-keterangan='{$fetch["keterangan"]}'
                            ><i class='bi bi-calendar2-check-fill'></i><span> Periksa / Edit</span></a>";
                        }else if($fetch['status_periksa']=='Sudah Periksa'){
                            echo "<div class='badge bg-success mb-2'>Sudah Periksa</div>";
                            echo "<a href='#' data-bs-toggle='modal' data-bs-target='#periksa-lansia' class='btn btn-sm btn-outline-primary rounded-5'
                            data-bs-id_pemeriksaan='{$fetch["id_pemeriksaan"]}'
                            data-bs-niknamalansia='{$fetch["lansia_NIK"]} - {$fetch["lansia_nama_lengkap"]}'
                            data-bs-lansia_NIK='{$fetch["lansia_NIK"]}'
                            data-bs-periksa_tb='{$fetch["periksa_tb"]}'
                            data-bs-periksa_bb='{$fetch["periksa_bb"]}'
                            data-bs-body_fat='{$fetch["body_fat"]}'
                            data-bs-tensi='{$fetch["tensi"]}' 
                            data-bs-gula_darah='{$fetch["gula_darah"]}'
                            data-bs-keterangan='{$fetch["keterangan"]}'
                            ><i class='bi bi-calendar2-check-fill'></i><span> Periksa / Edit</span></a>";
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
        $('#anak_NIK').select2({
          dropdownParent: $('#periksa-anak .modal-content'),
          theme: "bootstrap-5",
        });
    });
  </script>

</body>


<script>
    var EntryPeriksa = document.getElementById('periksa-anak-entry')
    EntryPeriksa.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var id_pemeriksaan = button.getAttribute('data-bs-id_pemeriksaan')
    var anak_NIK = button.getAttribute('data-bs-anak_NIK')
    var niknamaanak = button.getAttribute('data-bs-niknamaanak')
    var periksa_tb = button.getAttribute('data-bs-periksa_tb')
    var periksa_bb = button.getAttribute('data-bs-periksa_bb')
    var periksa_lila = button.getAttribute('data-bs-periksa_lila')
    var periksa_lk = button.getAttribute('data-bs-periksa_lk')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = EntryPeriksa.querySelector('.modal-title')
    var niknamaanak_inp = EntryPeriksa.querySelector('.modal-body #niknamaanak')
    var periksa_tb_inp = EntryPeriksa.querySelector('.modal-body #periksa_tb')
    var periksa_bb_inp = EntryPeriksa.querySelector('.modal-body #periksa_bb')
    var periksa_lila_inp = EntryPeriksa.querySelector('.modal-body #periksa_lila')
    var periksa_lk_inp = EntryPeriksa.querySelector('.modal-body #periksa_lk')
    var id_pemeriksaan_inp = EntryPeriksa.querySelector('.modal-body #id_pemeriksaan')
    var anak_NIK_inp = EntryPeriksa.querySelector('.modal-body #anak_NIK')

    modalTitle.textContent = 'Entri Pemeriksaan ID' + id_pemeriksaan
    niknamaanak_inp.value = niknamaanak
    periksa_tb_inp.value = periksa_tb
    periksa_bb_inp.value = periksa_bb
    periksa_lila_inp.value = periksa_lila
    periksa_lk_inp.value = periksa_lk
    id_pemeriksaan_inp.value = id_pemeriksaan
    anak_NIK_inp.value = anak_NIK
  })
</script>
</html>