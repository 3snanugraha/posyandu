<?php
// File ini berisi fungsi-fungsi dasar
// ==============================================
//              Kontrol Database
// ============================================== 
// Fungsi Login
function UserLogin($username,$password){
    include "../controller/Database.php";
    session_start();
    $key=rand();
    $enc_password=md5($password);
    $query=mysqli_query($conn, "select * from tblAdmin where adm_username='$username' and adm_password='$enc_password'");
    $fetchdata=mysqli_fetch_array($query);
    if(!empty($fetchdata['adm_username'])){
        $_SESSION['adm_username'] = $fetchdata['adm_username'];
        $_SESSION['adm_password'] = $fetchdata['adm_password'];
        $_SESSION['adm_nama_admin'] = $fetchdata['adm_nama_admin'];
        $_SESSION['adm_role'] = $fetchdata['adm_role'];
        $_SESSION['key'] = $key;
        header('location:../router/Router.php?u=home');
    }else{
        header('location:../router/Router.php?u=login-failed');
    }
}
// Fungsi Ambil Data Anak
function getDataAnak(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT *,YEAR(anak_tanggal_lahir) AS anak_tahun_lahir FROM tblAnak");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}

// Fungsi Ambil Data Lansia
function getDataLansia(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT *,YEAR(lansia_tanggal_lahir) AS lansia_tahun_lahir,MONTH(lansia_tanggal_lahir) AS lansia_bulan_lahir FROM tblLansia");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}

// Fungsi Ambil Data Pengaturan
function getDataPengaturan(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT * FROM tblPengaturan WHERE ID='1'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $fetch_pengaturan = mysqli_fetch_array($result);
    return $fetch_pengaturan;
}

// Fungsi Ambil Data Akun
function getDataAkun(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT * FROM tblAdmin WHERE ID='1'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $fetch_akun = mysqli_fetch_array($result);
    return $fetch_akun;
}

// Fungsi Hapus Data Anak
function hapusDataAnak($nik){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "DELETE FROM tblAnak WHERE anak_NIK='$nik'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        header('location:../router/Router.php?u=data-anak');
    }
}

// Fungsi Tambah Data Anak
function tambahDataAnak($anak_NIK,$anak_nama_anak,$anak_nama_ibu,$anak_jenis_kelamin,$anak_tanggal_lahir,$anak_tempat_lahir){
    include "../controller/Database.php";
    $check=mysqli_fetch_array(mysqli_query($conn,"SELECT anak_NIK FROM tblAnak WHERE anak_NIK='$anak_NIK'"));
    $datenow=date("Y-m-d");
    if(!empty($check['anak_NIK'])){
        echo "<script>alert('Tambah data tidak berhasil. NIK sudah ada, silahkan dicek kembali');window.location='../router/Router.php?u=data-anak';</script>";
    }else{
        $result = mysqli_query($conn, "INSERT INTO tblAnak(anak_NIK,anak_nama_anak,anak_nama_ibu,anak_jenis_kelamin,anak_tanggal_lahir,anak_tempat_lahir)VALUES('$anak_NIK','$anak_nama_anak','$anak_nama_ibu','$anak_jenis_kelamin','$anak_tanggal_lahir','$anak_tempat_lahir')");
        $result2 = mysqli_query($conn, "INSERT INTO tblPeriksaAnak(anak_NIK,status_periksa,periksa_tb,periksa_bb,periksa_lila,periksa_lk,keterangan,tanggal_periksa)VALUES('$anak_NIK','Belum Periksa','-','-','-','-','-','$datenow')");

        if (!$result && !$result2) {
            die("Query error: " . mysqli_error($conn));
        }else{
            echo "<script>alert('Data berhasil ditambahkan.');</script>";
            header('location:../router/Router.php?u=data-anak');
        }
    }

}


// Fungsi Hitung data Anak
function hitungDataAnak(){
    include "../controller/Database.php";
    $result=mysqli_query($conn, "SELECT * FROM tblAnak");
    if ($result) 
    { 
        $jumlah_row = mysqli_num_rows($result); 
        return $jumlah_row;
        mysqli_free_result($result); 
    } 

}

// Update Setting
function updatePengaturan($id,$png_nama_pengaturan,$png_nama_posyandu,$png_alamat_posyandu,$png_no_telepon){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "UPDATE tblPengaturan SET 
    png_nama_pengaturan='$png_nama_pengaturan',
    png_nama_posyandu='$png_nama_posyandu',
    png_alamat_posyandu='$png_alamat_posyandu',
    png_no_telepon='$png_no_telepon' WHERE id='$id'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        echo "<script>alert('Pengaturan berhasil diupdate.');window.location='../router/Router.php?u=pengaturan';</script>";
    }
}

// Update Akun Admin
function updateAkunAdmin($id,$adm_username,$adm_password,$adm_password_verification,$adm_nama_admin,$adm_role){
    if($adm_password!=$adm_password_verification){
        echo "<script>alert('Kesalahan : Password baru yang dimasukan tidak sama dengan verifikasinya, Silahkan diulangi.');window.location='../router/Router.php?u=akun';</script>";
    }else{
        include "../controller/Database.php";
        if(!empty($adm_password) && !empty($adm_password_verification)){
            $adm_password_enc=md5($adm_password);
            $result = mysqli_query($conn, "UPDATE tblAdmin SET 
            adm_username='$adm_username',
            adm_password='$adm_password_enc',
            adm_nama_admin='$adm_nama_admin',
            adm_role='$adm_role' WHERE id='$id'");
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }else{
                echo "<script>alert('Informasi Akun berhasil diupdate. Silahkan login kembali');window.location='../router/Router.php?u=logout';</script>";
            }
        }else if(empty($adm_password) && empty($adm_password_verification)){
            $result = mysqli_query($conn, "UPDATE tblAdmin SET 
            adm_username='$adm_username',
            adm_nama_admin='$adm_nama_admin',
            adm_role='$adm_role' WHERE id='$id'");
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }else{
                echo "<script>alert('Informasi Akun berhasil diupdate. Silahkan login kembali');window.location='../router/Router.php?u=logout';</script>";
            }
        }

    }
}

// Function Ibu
// Fungsi Ambil Data Ibu
function getDataIbu(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT *,YEAR(ibu_tanggal_lahir) AS ibu_tahun_lahir,MONTH(ibu_tanggal_lahir) AS ibu_bulan_lahir FROM tblIbu");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}

// Fungsi Ambil Data Pemeriksaan Anak
function getDataPemeriksaanIbu(){
    include "../controller/Database.php";
    // Cek Bulan Sekarang
    $bulan_sekarang=date('m');
    $fetch_bulan=mysqli_fetch_array(mysqli_query($conn, "SELECT *,MONTH(tanggal_periksa) AS bulan_periksa from tblPeriksaIbu ORDER BY tanggal_periksa DESC LIMIT 1;"));
    
    if($bulan_sekarang==$fetch_bulan['bulan_periksa']){
            // Jika data di bulan sekarang ada, maka Tampilkan data pemeriksaan bulan sekarang
            $result = mysqli_query($conn, "SELECT *,YEAR(tblIbu.ibu_tanggal_lahir) AS ibu_tahun_lahir FROM tblPeriksaIbu INNER JOIN tblIbu ON tblPeriksaIbu.ibu_nik=tblIbu.ibu_nik WHERE MONTH(tanggal_periksa)='$bulan_sekarang'");
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }

            $array = [];
            while ($box = mysqli_fetch_array($result)) {
                $array[] = $box;
            }
            return $array;
    }else{
        echo "<script>alert('Periode bulan telah hangus. akan generate data baru untuk bulan ini. Jika ada belum ganti bulan silahkan atur kembali tanggal pada Komputer anda.');</script>";
        $datenow=date("Y-m-d");
        $query_ibu=mysqli_query($conn, "SELECT * FROM tblIbu");
        while($generate_ibu=mysqli_fetch_array($query_ibu)){
            $generate_pemeriksaan=mysqli_query($conn, "INSERT INTO tblPeriksaIbu(ibu_nik,jenis_pelayanan,tanggal_periksa,keterangan,status_periksa)VALUES('$generate_ibu[ibu_nik]','-','$datenow','-','Belum Periksa')");
            if($generate_pemeriksaan){
                echo "<script>console.log('Berhasil');</script>";
            }
        }
        echo "<script>alert('Generate berhasil');location.reload();</script>";

        // Setelah selesai generate. tampilkan data
        $result = mysqli_query($conn, "SELECT *,YEAR(tblIbu.ibu_tanggal_lahir) AS ibu_tahun_lahir FROM tblPeriksaIbu INNER JOIN tblIbu ON tblPeriksaIbu.ibu_nik=tblIbu.ibu_nik");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }

        $array = [];
        while ($box = mysqli_fetch_array($result)) {
            $array[] = $box;
        }
        return $array;

    }
}

// Cetak Laporan Ibu
function cetakLaporanIbu($dari_tanggal,$sampai_tanggal){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT *,YEAR(tblIbu.ibu_tanggal_lahir) AS ibu_tahun_lahir FROM tblPeriksaIbu INNER JOIN tblIbu ON tblPeriksaIbu.ibu_nik=tblIbu.ibu_nik WHERE tanggal_periksa BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}

// Fungsi Tambah Data Ibu
function tambahDataIbu($ibu_nik,$ibu_nama,$ibu_nama_suami,$ibu_tanggal_lahir,$ibu_alamat){
    include "../controller/Database.php";
    $check=mysqli_fetch_array(mysqli_query($conn,"SELECT ibu_nik FROM tblIbu WHERE ibu_nik='$ibu_nik'"));
    $datenow=date("Y-m-d");
    if(!empty($check['ibu_nik'])){
        echo "<script>alert('Tambah data tidak berhasil. NIK sudah ada, silahkan dicek kembali');window.location='../router/Router.php?u=data-ibu';</script>";
    }else{
        $result = mysqli_query($conn, "INSERT INTO tblIbu(ibu_nik,ibu_nama,ibu_nama_suami,ibu_tanggal_lahir,ibu_alamat)VALUES('$ibu_nik','$ibu_nama','$ibu_nama_suami','$ibu_tanggal_lahir','$ibu_alamat')");

        // $result2 = mysqli_query($conn, "INSERT INTO tblPeriksaAnak(anak_NIK,status_periksa,periksa_tb,periksa_bb,periksa_lila,periksa_lk,keterangan,tanggal_periksa)VALUES('$anak_NIK','Belum Periksa','-','-','-','-','-','$datenow')");

        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }else{
            echo "<script>alert('Data berhasil ditambahkan.');window.location='../router/Router.php?u=data-ibu'</script>";
        }
    }

}
// Get Data Periksa Ibu
function getPeriksaIbu(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT *,YEAR(tblIbu.ibu_tanggal_lahir) AS ibu_tahun_lahir FROM tblPeriksaIbu INNER JOIN tblIbu ON tblPeriksaIbu.ibu_nik=tblIbu.ibu_nik");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}

// Entry Ibu / Update Pemeriksaan Ibu
function periksaIbu($ibu_nik,$jenis_pelayanan,$keterangan){
    include "../controller/Database.php";
    $tanggal_periksa=date("Y-m-d");
    $update=mysqli_query($conn, "UPDATE tblPeriksaIbu SET 
    status_periksa='Sudah Periksa',
    jenis_pelayanan='$jenis_pelayanan',
    keterangan='$keterangan',
    tanggal_periksa='$tanggal_periksa'
    WHERE ibu_nik='$ibu_nik'");
    
    if($update){
        echo "<script>alert('Pelayanan Ibu Berhasil. Data berhasil diupdate.');window.location='../router/Router.php?u=pemeriksaan-ibu';</script>";
    }else{
        echo "<script>alert('Periksa Ibu Gagal. Data tidak dapat diupdate.');window.location='../router/Router.php?u=pemeriksaan-ibu';</script>";
    }
}

// HapusData
function hapusDataIbu($nik){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "DELETE FROM tblIbu WHERE ibu_nik='$nik'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }else{
        echo "<script>alert('Delete data berhasil.');window.location='../router/Router.php?u=data-ibu'</script>";
    }
}



// ==============================================
//                  Kontrol Form
// ============================================== 
// Logout
function Logout(){
    session_destroy();
    echo "<script>alert('Logout berhasil');window.location='$_SERVER[PHP_SELF]?u=login';</script>";
}

// Fungsi Periksa Session Login 
function LoginSessionCheck(){
    session_start();
    if(!empty($_SESSION['adm_username']) AND !empty($_SESSION['adm_password']) AND !empty($_SESSION['key'])){
        header('location:../router/Router.php?u=home');
    }
}

// Fungsi Periksa Session
function SessionCheck(){
    session_start();
    if(empty($_SESSION['adm_username']) AND empty($_SESSION['adm_password']) AND empty($_SESSION['key'])){
        echo "<script>alert('Session telah habis. silahkan login kembali.');window.location='../router/Router.php?u=login'</script>";
    }
}

// Fungsi Pemeriksaan Anak
// Fungsi Ambil Data Pemeriksaan Anak
function getDataPemeriksaanAnak(){
    include "../controller/Database.php";
    // Cek Bulan Sekarang
    $bulan_sekarang=date('m');
    $fetch_bulan=mysqli_fetch_array(mysqli_query($conn, "SELECT *,MONTH(tanggal_periksa) AS bulan_periksa from tblPeriksaAnak ORDER BY tanggal_periksa DESC LIMIT 1;"));
    
    if($bulan_sekarang==$fetch_bulan['bulan_periksa']){
            // Jika data di bulan sekarang ada, maka Tampilkan data pemeriksaan bulan sekarang
            $result = mysqli_query($conn, "SELECT *,YEAR(tblAnak.anak_tanggal_lahir) AS anak_tahun_lahir FROM tblPeriksaAnak INNER JOIN tblAnak ON tblPeriksaAnak.anak_NIK=tblAnak.anak_NIK WHERE MONTH(tanggal_periksa)='$bulan_sekarang'");
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }

            $array = [];
            while ($box = mysqli_fetch_array($result)) {
                $array[] = $box;
            }
            return $array;
    }else{
        echo "<script>alert('Periode bulan telah hangus. akan generate data baru untuk bulan ini. Jika ada belum ganti bulan silahkan atur kembali tanggal pada Komputer anda.');</script>";
        $datenow=date("Y-m-d");
        $query_anak=mysqli_query($conn, "SELECT * FROM tblAnak");
        while($generate_anak=mysqli_fetch_array($query_anak)){
            $generate_pemeriksaan=mysqli_query($conn, "INSERT INTO tblPeriksaAnak(anak_NIK,status_periksa,periksa_tb,periksa_bb,periksa_lila,periksa_lk,keterangan,tanggal_periksa)VALUES('$generate_anak[anak_NIK]','Belum Periksa','-','-','-','-','-','$datenow')");
            if($generate_pemeriksaan){
                echo "<script>console.log('Berhasil');</script>";
            }
        }
        echo "<script>alert('Generate berhasil');location.reload();</script>";

        // Setelah selesai generate. tampilkan data
        $result = mysqli_query($conn, "SELECT *,YEAR(tblAnak.anak_tanggal_lahir) AS anak_tahun_lahir FROM tblPeriksaAnak INNER JOIN tblAnak ON tblPeriksaAnak.anak_NIK=tblAnak.anak_NIK");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }

        $array = [];
        while ($box = mysqli_fetch_array($result)) {
            $array[] = $box;
        }
        return $array;

    }
}
// Get Data Periksa Anak
function getPeriksaAnak(){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT *,YEAR(tblAnak.anak_tanggal_lahir) AS anak_tahun_lahir FROM tblPeriksaAnak INNER JOIN tblAnak ON tblPeriksaAnak.anak_NIK=tblAnak.anak_NIK");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}
// Entry Anak / Update Pemeriksaan Anak
function periksaAnakEntry($anak_NIK,$periksa_tb,$periksa_bb,$periksa_lila,$periksa_lk,$keterangan){
    include "../controller/Database.php";
    $tanggal_periksa=date("Y-m-d");
    $update=mysqli_query($conn, "UPDATE tblPeriksaAnak SET 
    status_periksa='Sudah Periksa',
    periksa_tb='$periksa_tb',
    periksa_bb='$periksa_bb',
    periksa_lila='$periksa_lila',
    periksa_lk='$periksa_lk',
    keterangan='$keterangan',
    tanggal_periksa='$tanggal_periksa'
    WHERE anak_NIK='$anak_NIK'");
    
    if($update){
        echo "<script>alert('Periksa Anak Berhasil. Data berhasil diupdate.');window.location='../router/Router.php?u=pemeriksaan-anak';</script>";
    }else{
        echo "<script>alert('Periksa Anak Gagal. Data tidak dapat diupdate.');window.location='../router/Router.php?u=pemeriksaan-anak';</script>";
    }
}

// Cetak Laporan Anak
function cetakLaporanAnak($dari_tanggal,$sampai_tanggal){
    include "../controller/Database.php";
    $result = mysqli_query($conn, "SELECT * FROM tblPeriksaAnak INNER JOIN tblAnak ON tblPeriksaAnak.anak_NIK=tblAnak.anak_NIK WHERE tanggal_periksa BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($box = mysqli_fetch_array($result)) {
        $array[] = $box;
    }
    return $array;
}
?>
