<?php 
require 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Masuk </title>
  <?php include 'header.php';?>
</head>
<body class="hold-transition login-page">   
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>Thahira</b> Carwash</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Masuk Sebagai Karyawan : </p>
        <form method="post" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan Username" id="pengguna" name="pengguna">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone" aria-hidden="true"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Kata Sandi" id="sandi" name="sandi">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="ingat" name="ingat">
                <label for="ingat">
                  Ingat Saya
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <div class="container-fluid">
          <?php
          if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $pengguna = $_POST['pengguna'];
            $sandi = md5($_POST['sandi']);

            $ambil = mysqli_query($koneksi, "SELECT pengguna, nik, id_jabatan, sandi 
              FROM pengguna WHERE pengguna = '$pengguna' and sandi = '$sandi'");

            $cekPengguna = mysqli_num_rows($ambil);

            if($cekPengguna > 0){
              while($tampilData = mysqli_fetch_assoc($ambil)){
                $pengguna = $tampilData['pengguna'];
                $nik = $tampilData['nik'];
                $jabatan = $tampilData['id_jabatan'];
              }

              session_start();
              if($jabatan==1001){
                $_SESSION['nik'] = $nik;
                $_SESSION['hak'] = "1001";
                header("location:view/pemilik/dashboard.php");
              }else if($jabatan==1002){
                $_SESSION['nik'] = $nik;
                $_SESSION['hak'] = "1002";
                header("location:view/manajer/dashboard.php");
              }else if($jabatan==1003){
                $_SESSION['nik'] = $nik;
                $_SESSION['hak'] = "1003";
                header("location:view/koordinator/dashboard.php");
              }else if($jabatan==1004){
                $_SESSION['nik'] = $nik;
                $_SESSION['hak'] = "1004";
                header("location:view/karyawan/dashboard.php");
              }else if($jabatan==1005){
                $_SESSION['nik'] = $nik;
                $_SESSION['hak'] = "1005";
                header("location:view/pra_karyawan/dashboard.php");
              }
            }else {
              $peringatanUser = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf</strong> Kombinasi NIK dan Kata Sandi Anda Kurang Tepat. 
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button>
              </div>";
              echo $peringatanUser;
            }
          }
          ?>  
        </div>
        <p class="mb-1">
          <a href="lupa_sandi.php">Lupa Sandi ?</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Daftar Sebagai Karyawan</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <?php include 'js.php';?> 
  <script>
    $(function () {
      $('#login').validate({
        rules: {
          pengguna: {
            required: true,
            minlength: 10,
            maxlength: 13,
            number : true
          },
          sandi: {
            required: true,
            minlength : 8
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>
</html>