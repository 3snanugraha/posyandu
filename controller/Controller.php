<?php
include "Database.php";
include "../function/Function.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['login'])){
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    UserLogin($username,$password);
}else if(isset($_POST['tambah-data-anak'])){
    $anak_NIK=mysqli_real_escape_string($conn, $_POST['anak_NIK']);
    $anak_nama_anak=mysqli_real_escape_string($conn, $_POST['anak_nama_anak']);
    $anak_nama_ibu=mysqli_real_escape_string($conn, $_POST['anak_nama_ibu']);
    $anak_jenis_kelamin=mysqli_real_escape_string($conn, $_POST['anak_jenis_kelamin']);
    $anak_tanggal_lahir=mysqli_real_escape_string($conn, $_POST['anak_tanggal_lahir']);
    $anak_tempat_lahir=mysqli_real_escape_string($conn, $_POST['anak_tempat_lahir']);
    tambahDataAnak($anak_NIK,$anak_nama_anak,$anak_nama_ibu,$anak_jenis_kelamin,$anak_tanggal_lahir,$anak_tempat_lahir);
}else if(isset($_POST['periksa-anak-entry'])){
    $id_pemeriksaan=mysqli_real_escape_string($conn, $_POST['id_pemeriksaan']);
    $anak_NIK=mysqli_real_escape_string($conn, $_POST['anak_NIK']);
    $periksa_tb=mysqli_real_escape_string($conn, $_POST['periksa_tb']);
    $periksa_bb=mysqli_real_escape_string($conn, $_POST['periksa_bb']);
    $periksa_lila=mysqli_real_escape_string($conn, $_POST['periksa_lila']);
    $periksa_lk=mysqli_real_escape_string($conn, $_POST['periksa_lk']);
    $keterangan=mysqli_real_escape_string($conn, $_POST['keterangan']);
    periksaAnakEntry($id_pemeriksaan,$anak_NIK,$periksa_tb,$periksa_bb,$periksa_lila,$periksa_lk,$keterangan);
}else if(isset($_POST['update-pengaturan'])){
    $id='1';
    $png_nama_pengaturan='Pengaturan Basic';
    $png_nama_posyandu=mysqli_real_escape_string($conn, $_POST['png_nama_posyandu']);
    $png_alamat_posyandu=mysqli_real_escape_string($conn, $_POST['png_alamat_posyandu']);
    $png_no_telepon=mysqli_real_escape_string($conn, $_POST['png_no_telepon']);
    updatePengaturan($id,$png_nama_pengaturan,$png_nama_posyandu,$png_alamat_posyandu,$png_no_telepon);
}else if(isset($_POST['update-akun-admin'])){
    $id='1';
    $adm_username=mysqli_real_escape_string($conn, $_POST['adm_username']);
    $adm_password=mysqli_real_escape_string($conn, $_POST['adm_password']);
    $adm_password_verification=mysqli_real_escape_string($conn, $_POST['adm_password_verification']);
    $adm_nama_admin=mysqli_real_escape_string($conn, $_POST['adm_nama_admin']);
    $adm_role=mysqli_real_escape_string($conn, $_POST['adm_role']);
    updateAkunAdmin($id,$adm_username,$adm_password,$adm_password_verification,$adm_nama_admin,$adm_role);
}
?>