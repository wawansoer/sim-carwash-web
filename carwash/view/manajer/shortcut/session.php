<?php
require "../../conn.php";
session_start();
if (empty($_SESSION['nik']) and empty($_SESSION['hak'])){
    header("Location:../../login.php");
}else if ($_SESSION['hak'] !== '1002'){
    header("Location:../../login.php");
}else{
    $nik = $_SESSION['nik'];
    $ambilData = mysqli_query($koneksi, "SELECT nama_panggilan FROM karyawan where nik = '$nik'");
    while($tampilData = mysqli_fetch_assoc($ambilData)){
        $nama = $tampilData['nama_panggilan'];
    }
}
?>