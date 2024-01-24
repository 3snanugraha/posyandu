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

          <div class="row mt-2">
            <div class="col-3">
              <label for="anak_tinggi_badan">Tinggi Badan</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="anak_tinggi_badan" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="anak_berat_badan">Berat Badan</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="anak_berat_badan" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="anak_imunisasi">Imunisasi</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="anak_imunisasi" required>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-3">
              <label for="anak_vaksin">Vaksin</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="anak_vaksin" required>
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