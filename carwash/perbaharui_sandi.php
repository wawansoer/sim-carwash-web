<?php
require 'conn.php';
session_start();
if ($_SESSION['reset'] != "reset_password" && isset($_SESSION['nik'])) {
    header("location:lupa_sandi.php");
} else {
    $nik = $_SESSION['nik'];
    $sandi = md5($_POST['sandi']);
    $uData = "UPDATE pengguna set sandi = '$sandi' 
                WHERE nik = '$nik'";
    if($koneksi->query($uData)===TRUE){
        session_unset();
        session_destroy();
        header("location:login.php");
    }else{
        header("location:reset_sandi.php");
    }            
}
?>
