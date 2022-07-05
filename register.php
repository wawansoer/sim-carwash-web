<?php require 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Daftar Karyawan</title>
  <?php include 'header.php';?>
</head>
<body class="hold-transition login-page"> 
  <!-- validasi input & ke database --> 
   
  <!-- akhir validari --> 
  <div class="container">
    <div class="register-logo">
      <a href="index.php"> <b> Thahira </b> Carwash</a>
    </div>
    <!-- validasi password & input user -->
    <?php
                if ($_SERVER["REQUEST_METHOD"]=="POST"){
                  $nik = $_POST['nik'];
                  $nl = $_POST['nl'];
                  $np = $_POST['np'];
                  $alamat = $_POST['alamat'];
                  $tl = $_POST['tl'];
                  $sandi = $_POST['sandi'];
                  $uSandi = $_POST['uSandi'];
                  $email = $_POST['email'];
                  $hp = $_POST['hp'];
                  $tanya = $_POST['tanya'];
                  $jawab = $_POST['jawab'];
                  $pengalaman = $_POST['pengalaman'];
                  $jabatan = 1005;

                  if ($sandi != $uSandi){
                    $peringatanSandi = "<div class='container'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Mohon Maaf</strong> Kata Sandi Anda Tidak Sama. Silahkan Input Ulang Data Anda !
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>
                  </div>";
                    echo  $peringatanSandi;  
                  }else {
                    $sandi = md5($sandi);
                    $tambahData = "INSERT INTO karyawan 
                                    (nik, nama_lengkap, nama_panggilan, tanggal_lahir, alamat, email,nomor_handphone, pengalaman)VALUES 
                                    ('$nik','$nl','$np', '$tl','$alamat','$email','$hp','$pengalaman')";
                    if($koneksi->query($tambahData)===TRUE){
                      $tambahData = "INSERT INTO pengguna VALUES 
                                    ('$hp','$nik',$jabatan,'$sandi','$tanya','$jawab')";
                      if($koneksi->query($tambahData)===TRUE){
                        $berhasil = "<div class='container'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Selamat</strong> Anda Telah Berhasil Mendaftar Sebagai Calon Karyawan Kami. Akan Kami Informasikan Jikalau Anda Memenuhi Syarat. Pastikan Nomor Kontak Anda Selalu Aktif. Salam Sukses !!
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>
                          </div>";
                        echo $berhasil;
                      }
                    }else{
                      $gagal = "<div class='container'>
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Mohon Maaf !</strong> Anda Tidak Dapat Melakukan Registrasi.
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>
                          </div>";
                        echo $gagal;
                    }
                  }
                }
              ?>
    <div class="container">
      <div class="row"> 
          <div class="col-md-12"> 
            <div class="card card-info">
              <div class="card-header text-center">
                <h5 class="text-center"> Daftar Sebagai Karyawan Cuci</h5>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form id="daftar" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="card-body">
                <div class="form-group">
                    <label for="nik">N I K </label>
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK">
                  </div>
                  <div class="form-group">
                    <label for="nl">Nama Lengkap</label>
                    <input type="text" name="nl" class="form-control" id="nl" placeholder="Masukan Nama Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="np">Nama Panggilan</label>
                    <input type="text" name="np" class="form-control" id="np" placeholder="Masukan Nama Panggilan">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat">
                  </div>
                  <div class="form-group">
                    <label for="tl">Tanggal Lahir</label>
                    <input type="date" name="tl" class="form-control" id="tl" value="">
                  </div>
                  <div class="form-group">
                    <label for="sandi">Kata Sandi</label>
                    <input type="password" name="sandi" class="form-control" id="sandi" placeholder="Masukan Kata Sandi">
                  </div>
                  <div class="form-group">
                    <label for="uSandi">Ulangi Kata Sandi</label>
                    <input type="password" name="uSandi" class="form-control" id="uSandi" placeholder="Masukan Ulang Kata Sandi">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email">
                  </div>
                  <div class="form-group">
                    <label for="hp">Nomor Handphone</label>
                    <input type="text" name="hp" class="form-control" id="hp" placeholder="Masukan Nomor Handphone">
                  </div>
                  <div class="form-group">
                    <label for="tanya">Pilih Pertanyaan Keamanan Anda !</label>
                    <select class="form-control" id="tanya" name="tanya">
                      <option></option>
                      <option>Siapa Nama Panggilan Peliharaan Anda?</option>
                      <option>Apa Makanan Favorit Anda?</option>
                      <option>Dimana Anda Dilahirkan?</option>
                      <option >Berapa Angka Favorit Anda?</option>
                      <option>Apa Warna Favorit Anda?</option>
                      <option>Siapa Guru Favorit Anda Waktu SMA?</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jawab">Jawaban Pertanyaan</label>
                    <input type="text" name="jawab" class="form-control" id="jawab" placeholder="Masukan Jawaban Pertanyaan">
                  </div>
                  <div class="form-group">
                    <label for="pengalaman">Apakah anda pernah kerja di pencucian sebelumnya?</label>
                    <select class="form-control" id="pengalaman" name="pengalaman">
                      <option></option>
                      <option value="Sudah">Sudah Pernah</option>
                      <option value="Belum">Belum Pernah</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" name="submit" class="btn btn-success">Daftar</button>
                </div>
              </form>
            </div> <!-- /.card -->
          </div> <!--/.col (left) -->
      </div>  <!-- /.row -->
    </div><!-- /.container-fluid -->  
  </div> <!-- container -->
  
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
          nl: {
            required: true,
            minlength: 3,
          },
          np: {
            required: true,
            minlength : 3, 
            maxlength : 40
          },
          alamat: {
            required: true,
            minlength : 15, 
            maxlength : 70
          },
          ttl: {
            required: true,
          },
          sandi: {
            required: true,
            minlength : 8
          },
          uSandi: {
            required: true,
            minlength : 8
          },
          email: {
            required: true,
            email : true
          },
          hp: {
            required: true,
            minlength : 11,
            number : true
          },
          pengalaman: {
            required: true
          },
          tanya: {
            required: true
          },
          jawab: {
            required: true
          },
        },
        messages: {
          nik: {
            required: "Silahkan Isi NIK",
            minlength: "Format NIK Tidak Dikenali",
            maxlength: "Format NIK Tidak Dikenali",
            number: "Format NIK Tidak Dikenali"
          },
          nl: {
            required: "Silahkan Isi Nama Lengkap",
            minlength: "Format Nama Tidak Dikenali"
          },
          np:{
            required: "Silahkan Isi Nama Panggilan!",
            minlength: "Format Nama Tidak Dikenali",
            maxlength: "Format Nama Tidak Dikenali"
          },
          alamat: {
            required: "Silahkan Isi Alamat Anda!",
            minlength: "Format Alamat Tidak Dikenali",
            maxlength: "Format Alamat Tidak Dikenali"
          },
          ttl: {
            required : "Silahkan Isi Tanggal Lahir Anda"
          },
          sandi: {
            required: "Silahkan Isi Kata Sandi!",
            minlength: "Kata Sandi Minimal 8 Karakter"
          },
          uSandi: {
            required: "Silahkan Isi Kata Sandi!",
            minlength: "Kata Sandi Minimal 8 Karakter"
          },
          email: {
            required: "Silahkan Isi Email!",
            email: "Format Email Tidak Dikenali"
          },
          hp : {
            required : "Silahkan Isi Nomor Handphone",
            minlength : "Format Nomor Handphone Tidak Dikenali",
            number : "Format Nomor Handphone Tidak Dikenali"
          },
          pengalaman : {
            required : "Silahkan Isi Pengalaman Anda"
          },
          tanya : {
            required : "Silahkan Isi Pilih Pertanyaan Keamanan"
          },
          jawab : {
            required : "Silahkan Jawaban Pertanyaan Keamanan"
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