<?php 
    require 'conn.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Lupa Sandi </title>
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
      <p class="login-box-msg">Setel Ulang Sandi Anda ? </p>
      <form method="post" id="reset" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukan NIK" id="nik" name="nik">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-id-card" aria-hidden="true"></span>
            </div>
          </div>
        </div>
        <div class="container-fluid">
        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
          $nik = $_POST['nik'];

          $ambil = mysqli_query($koneksi, "SELECT nik FROM pengguna WHERE nik = '$nik'");

          $cekPengguna = mysqli_num_rows($ambil);

          if($cekPengguna > 0){
            while($tampilData = mysqli_fetch_assoc($ambil)){
              $nik = $tampilData['nik'];
            }
            echo $nik;
            $_SESSION['nik'] = $nik;
            $_SESSION['reset'] = "reset_password";
            header("location:reset_sandi.php");
          }else {
            $peringatanUser = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Mohon Maaf</strong> Anda belum terdaftar dalam sistem kami. 
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
            echo $peringatanUser;
          }
        }
        ?>  
      </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">Cek</button>
            </div>
        </div>
      </form>
      <br>
    </div> <!-- /.card-body -->
  </div> <!-- /.card -->
</div>
  <?php include 'js.php';?> 
  <script>
    $(function () {
      $('#daftar').validate({
        rules: {
          nik: {
            required: true,
            minlength: 16,
            maxlength: 16,
            number : true
          },
          sandi: {
            required: true,
            minlength : 8
          },
        },
        messages: {
          nik: {
            required: "Silahkan Isi NIK",
            minlength: "Format NIK Tidak Dikenali",
            maxlength: "Format NIK Tidak Dikenali",
            number: "Format NIK Tidak Dikenali"
          },
          sandi: {
            required: "Silahkan Isi Kata Sandi!",
            minlength: "Kata Sandi Minimal 8 Karakter"
          }
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