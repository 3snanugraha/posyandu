<?php
include "../function/Function.php";
$url=$_GET["u"];
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
$fetchdata_pengaturan=getDataPengaturan();



if($url=="login"){
    LoginSessionCheck();
    include "../view/Login.php";
}else if($url=="home"){
    SessionCheck();
    include "../view/Home.php";
}else if($url=="data-anak"){
    SessionCheck();
    include "../view/DataAnak.php";
}else if($url=="pemeriksaan-anak"){
    SessionCheck();
    include "../view/PeriksaAnak.php";
}else if($url=="pemeriksaan-ibu"){
    SessionCheck();
    include "../view/PeriksaIbu.php";
}else if($url=="laporan-pemeriksaan-anak"){
    SessionCheck();
    include "../view/LaporanPAnak.php";
}else if($url=="logout"){
    SessionCheck();
    Logout();
}else if($url=="login-failed"){
    $login_error=true;
    include "../view/Login.php";
}else if($url=="pengaturan"){
    SessionCheck();
    include "../view/Pengaturan.php";
}else if($url=="data-lansia"){
    SessionCheck();
    include "../view/DataLansia.php";
}else if($url=="data-ibu"){
    SessionCheck();
    include "../view/DataIbu.php";
}else if($url=="akun"){
    SessionCheck();
    include "../view/Akun.php";
}else if($url=="del-data-anak"){
    SessionCheck();
    $nik=$_GET["nik"];
    hapusDataAnak($nik);
}else if($url=="laporan-pemeriksaan-ibu"){
    SessionCheck();
    include "../view/LaporanPIbu.php";
}else if($url=="del-data-ibu"){
    SessionCheck();
    $nik=$_GET['nik'];    
    hapusDataIbu($nik);
}else{
    echo "<h1 style='text-align:center;'><br><br>Maaf, <br>Halaman belum ada / Fitur masih dalam uji coba.</h1>";
}
?>