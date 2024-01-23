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

// Fungsi Ambil Data Anak
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
function tambahDataAnak($anak_NIK,$anak_nama_anak,$anak_nama_ibu,$anak_jenis_kelamin,$anak_tanggal_lahir,$anak_tempat_lahir,$anak_tinggi_badan,$anak_berat_badan,$anak_imunisasi,$anak_vaksin){
    include "../controller/Database.php";
    $check=mysqli_fetch_array(mysqli_query($conn,"SELECT anak_NIK FROM tblAnak WHERE anak_NIK='$anak_NIK'"));
    if(!empty($check['anak_NIK'])){
        echo "<script>alert('Tambah data tidak berhasil. NIK sudah ada, silahkan dicek kembali');window.location='../router/Router.php?u=data-anak';</script>";
    }else{
        $result = mysqli_query($conn, "INSERT INTO tblAnak(anak_NIK,anak_nama_anak,anak_nama_ibu,anak_jenis_kelamin,anak_tanggal_lahir,anak_tempat_lahir,anak_tinggi_badan,anak_berat_badan,anak_imunisasi,anak_vaksin)VALUES('$anak_NIK','$anak_nama_anak','$anak_nama_ibu','$anak_jenis_kelamin','$anak_tanggal_lahir','$anak_tempat_lahir','$anak_tinggi_badan','$anak_berat_badan','$anak_imunisasi','$anak_vaksin')");
    
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }else{
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
    $result = mysqli_query($conn, 
    "SELECT *,YEAR(anak_tanggal_lahir) AS anak_tahun_lahir
    FROM tblAnak
    LEFT JOIN tblPeriksaAnak ON tblAnak.anak_NIK = tblPeriksaAnak.anak_NIK
    
    UNION
    
    SELECT *,YEAR(anak_tanggal_lahir) AS anak_tahun_lahir
    FROM tblAnak
    RIGHT JOIN tblPeriksaAnak ON tblAnak.anak_NIK = tblPeriksaAnak.anak_NIK
    WHERE tblAnak.anak_NIK IS NULL;
    ");
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
