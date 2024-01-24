<!-- Modal Tambah Data Anak -->
<div class="modal fade" id="tambah-data-anak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Anak</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controller/Controller.php" method="post">
        <div class="d-flex justify-content-center">
        <img class="img-fluid" width="120px" width="auto" src="../assets/img/kid.png" rel="icon">
        </div>
        
          <h6 class="text-center">Silahkan isi data dengan lengkap di bawah ini. </h6><hr>

          <div class="row mt-2">
            <div class="col-3">
              <label for="nik">NIK</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="anak_NIK" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="nama_lengkap">Nama Lengkap</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="anak_nama_anak" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="nama_ibu">Nama Ibu</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="anak_nama_ibu" required>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-3">
              <label for="tanggal_lahir">Tanggal Lahir</label>
            </div>
            <div class="col-9">
              <input type="date" class="form-control rounded-pill" name="anak_tanggal_lahir" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="tempat_lahir">Tempat Lahir</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="anak_tempat_lahir" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="jenis_kelamin">Jenis Kelamin</label>
            </div>
            <div class="col-9">
                <select class="form-select rounded-pill" name="anak_jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
          </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
         <button class="btn btn-primary rounded-pill" type="submit" name="tambah-data-anak" href="#">Simpan</button>
      <br>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- End modal -->


<!-- Modal Periksa -->
<div class="modal fade" id="periksa-anak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Periksa Anak Periode ini</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controller/Controller.php" method="post">
        <div class="d-flex justify-content-center">
        <img class="img-fluid" width="120px" width="auto" src="../assets/img/kid.png" rel="icon">
        </div>
        
          <h6 class="text-center">Silahkan pilih data  dan isi dengan lengkap di bawah ini. </h6><hr>

          <div class="row mt-2">
            <div class="col-3">
              <label for="nik">Pilih NIK / Nama</label>
            </div>
            <div class="col-9">
            <select class="form-select" id="anak_NIK" name="anak_NIK" required>
            <option value="">Pilih NIK & Nama</option>
              <?php
                    $data_anak=getPeriksaAnak();
                    foreach($data_anak as $fetch_anak){
              ?>
              <option value="<?= $fetch_anak['anak_NIK'];?>"><?= $fetch_anak['anak_NIK'] . " - " . $fetch_anak['anak_nama_anak'];?></option>
              <?php } ?>
            </select>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_tb">Tinggi Badan</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_tb" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_bb">Berat Badan</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_bb" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_lila">LILA (Lingkar Lengan Atas)</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_lila" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_lk">LK (Lingkar Kepala)</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_lk" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="keterangan">Keterangan</label>
            </div>
            <div class="col-9">
              <textarea rows="3" class="form-control rounded-3" name="keterangan" required></textarea>
            </div>
          </div>


      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
         <button class="btn btn-primary rounded-pill" type="submit" name="periksa-anak-entry" href="#">Simpan</button>
      <br>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- End modal -->


<!-- Modal Periksa Entry -->
<div class="modal fade" id="periksa-anak-entry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Periksa Anak pada Periode Ini</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controller/Controller.php" method="post">
        <div class="d-flex justify-content-center">
        <img class="img-fluid" width="120px" width="auto" src="../assets/img/kid.png" rel="icon">
        </div>
        
          <h6 class="text-center">Silahkan lengkapi data dengan lengkap di bawah ini. </h6><hr>

          <div class="row mt-2">
            <div class="col-3">
              <label for="nik">NIK & Nama</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="niknamaanak" id="niknamaanak" readonly>
              <input type="hidden" class="form-control rounded-pill" name="id_pemeriksaan" id="id_pemeriksaan" readonly>
              <input type="hidden" class="form-control rounded-pill" name="anak_NIK" id="anak_NIK" readonly>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_tb">Tinggi Badan</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_tb" id="periksa_tb" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_bb">Berat Badan</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_bb" id="periksa_bb" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_lila">LILA (Lingkar Lengan Atas)</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_lila" id="periksa_lila" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="periksa_lk">LK (Lingkar Kepala)</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="periksa_lk" id="periksa_lk" required>
            </div>
          </div>
          
          <div class="row mt-2">
            <div class="col-3">
              <label for="keterangan">Keterangan</label>
            </div>
            <div class="col-9">
              <textarea rows="3" class="form-control rounded-3" name="keterangan" required></textarea>
            </div>
          </div>


      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
         <button class="btn btn-primary rounded-pill" type="submit" name="periksa-anak-entry" href="#">Simpan</button>
      <br>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- End modal -->