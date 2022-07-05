<?php
require 'conn.php';
session_start();
if ($_SESSION['reset'] != "reset_password") {
  header("location:lupa_sandi.php");
} else {
  $nik = $_SESSION['nik'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Validasi Pengguna</title>
  <?php include 'header.php'; ?>
</head>
<body class="hold-transition login-page">
  <div class="container">
    <div class="register-logo">
      <a href="index.php"> <b> Thahira </b> Carwash</a>
    </div>
    <!-- validasi data -->
    <div class="container">
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nik = $_POST['nik'];
        $nl = $_POST['nl'];
        $np = $_POST['np'];
        $alamat = $_POST['alamat'];
        $tl = $_POST['tl'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $tanya = $_POST['tanya'];
        $jawab = $_POST['jawab'];

        $tarikData = mysqli_query(
          $koneksi,
          "SELECT karyawan.nama_lengkap, 
                            karyawan.nama_panggilan,
                            karyawan.alamat,
                            karyawan.tanggal_lahir,
                            karyawan.email,
                            karyawan.nomor_handphone,
                            pengguna.pertanyaan,
                            pengguna.jawaban FROM karyawan
                            INNER JOIN pengguna
                            ON karyawan.nik = pengguna.nik
                            WHERE pengguna.nik = '$nik'"
        );

        while ($ambilData = mysqli_fetch_assoc($tarikData)) {
          $sNl = $ambilData['nama_lengkap'];
          $sNp = $ambilData['nama_panggilan'];
          $sAlamat = $ambilData['alamat'];
          $sTl = $ambilData['tanggal_lahir'];
          $sEmail = $ambilData['email'];
          $sHp = $ambilData['nomor_handphone'];
          $sTanya = $ambilData['pertanyaan'];
          $sJawab = $ambilData['jawaban'];
        }
        //validasi data pengguna
        if (($nl === $sNl) && ($np === $sNp) && ($alamat === $sAlamat) && ($tl == $sTl) && ($email === $sEmail) && ($hp === $sHp) && ($tanya === $sTanya) && ($jawab === $sJawab)) {
    ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat</strong> Data Anda Telah Diverifikasi. Silahkan Perbaharui Kata Sandi Anda Dengan Menekan Tombol &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">
              Ini
            </button>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Perbaharui Sandi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" id="perbaharui_sandi" action="perbaharui_sandi.php">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nik">N I K </label>
                      <input type="text" name="nik" class="form-control" id="nik" value="<? echo $nik; ?> " readonly>
                    </div>
                    <div class="form-group">
                      <label for="sandi">Kata Sandi</label>
                      <input type="password" name="sandi" class="form-control" id="sandi" placeholder="Masukan Kata Sandi">
                    </div>
                    <div class="form-group">
                      <label for="uSandi">Ulangi Kata Sandi</label>
                      <input type="password" name="uSandi" class="form-control" id="uSandi" placeholder="Masukan Ulang Kata Sandi">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Sandi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      <?php
        } else {
          $gagal = "<div class='container'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong> Mohon Maaf </strong> Data Anda Tidak Valid.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>
                  </div>";
          echo  $gagal;
        }
      }
      ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header text-center">
              <h5 class="text-center">Pulihkan Sandi Anda Dengan Mengisi Kembali Data Anda</h5>
            </div> <!-- /.card-header -->
            <!-- form start -->
            <form id="reset" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik">N I K </label>
                  <input type="text" name="nik" class="form-control" id="nik" placeholder="<?php echo $nik; ?>" readonly value="<? echo $nik; ?>">
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
                    <option>Berapa Angka Favorit Anda?</option>
                    <option>Apa Warna Favorit Anda?</option>
                    <option>Siapa Guru Favorit Anda Waktu SMA?</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jawab">Jawaban Pertanyaan</label>
                  <input type="text" name="jawab" class="form-control" id="jawab" placeholder="Masukan Jawaban Pertanyaan">
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" name="submit" class="btn btn-success">&nbsp;&nbsp;&nbsp;Validasi&nbsp;&nbsp;&nbsp;</button>
                </div>
            </form>
          </div> <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div> <!-- container -->
  <!-- dependensi -->
  <?php include 'js.php'; ?>
  <script>
    //validasi form data
    $(function() {
      $('#reset').validate({
        rules: {
          nik: {
            required: true,
            minlength: 16,
            maxlength: 16,
            number: true
          },
          nl: {
            required: true,
            minlength: 3,
          },
          np: {
            required: true,
            minlength: 3,
            maxlength: 40
          },
          alamat: {
            required: true,
            minlength: 15,
            maxlength: 70
          },
          ttl: {
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          hp: {
            required: true,
            minlength: 11,
            number: true
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
          np: {
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
            required: "Silahkan Isi Tanggal Lahir Anda"
          },
          email: {
            required: "Silahkan Isi Email!",
            email: "Format Email Tidak Dikenali"
          },
          hp: {
            required: "Silahkan Isi Nomor Handphone",
            minlength: "Format Nomor Handphone Tidak Dikenali",
            number: "Format Nomor Handphone Tidak Dikenali"
          },
          pengalaman: {
            required: "Silahkan Isi Pengalaman Anda"
          },
          tanya: {
            required: "Silahkan Isi Pilih Pertanyaan Keamanan"
          },
          jawab: {
            required: "Silahkan Jawaban Pertanyaan Keamanan"
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    //validasi form perbaharui sandi
    $(function() {
      $('#perbaharui_sandi').validate({
        rules: {
          sandi: {
            required: true,
            minlength: 8
          },
          uSandi: {
            required: true,
            minlength: 8
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>