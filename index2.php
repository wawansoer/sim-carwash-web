<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash</title>
  <?php include 'header.php';?>
</head>
<body class="hold-transition sidebar-mini">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> Thahira Carwash </a>
      <a href="login.php">
        <span  class="navbar fa fa-fw fa-user"> </span>
      </a>
    </div>
  </nav>

  <script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
  }
  </script>
  <!-- Akhir Slideshow -->
  <!-- Penilaian -->
  <div class="container-fluid">
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img/1.jpg" style="width:100%">
      </div>
      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img/1.jpg" style="width:100%">
      </div>
      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img/1.jpg" style="width:100%">
      </div>
      <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
      <div class="widget-user-header text-white"
      style="background: url('img/1.jpg') center center;">
      <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
      <h5 class="widget-user-desc text-right">Web Designer</h5>
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="img/1.jpg" alt="User Avatar">
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-4 border-right">
          <div class="description-block">
            <h5 class="description-header">3,200</h5>
            <span class="description-text">SALES</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 border-right">
          <div class="description-block">
            <h5 class="description-header">13,000</h5>
            <span class="description-text">FOLLOWERS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">35</h5>
            <span class="description-text">PRODUCTS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
</div>
<div class="container">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-secondary">
          <div class="card-header text-center">
            <h6 class="text-center">Berikan Penilaian Hasil Pelayanan Kami </h6>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm">
            <div class="card-body">
              <div class="form-group">
                <label for="nopol">Nomor Polisi</label>
                <input type="text" name="nopol" class="form-control" id="nopol" placeholder="Contoh : AB1234XX">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Cuci</label>
                <input type="date" name="tc" class="form-control" id="tc" placeholder="Password">
              </div>
            </div> <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-success">Cek Kendaraan</button>
            </div>
          </form>
        </div> <!-- /.card -->
      </div> <!--/.col md 12 -->
    </div> <!-- row -->
  </div> <!-- container-fluid-->
  <hr>
</div> <!-- container-->
<!-- AKhir Penilaian -->
<!-- Tarif Cuci -->
<div class="container">
  <div class="row text-center">
    <div class="col">
      <h5> Tarif Cuci Roda Empat </h5>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-lg-4">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 45.0000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Brio, Ayla, Agya, Datsun Go, Yaris, Jazz, Swift, Small Pick Up dan mobil sejenisnya</p>
        </div>
      </div>
    </div> <!-- /.col-md-6 -->
    <div class="col-lg-4">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 50.000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Avanza, Ertiga, Rush Lama, Terios Lama, Xenia,Luxio, Livina Lama, Big Pick Up, dan mobil sejenisnya</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 60.000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Innova, Terios Baru, Rush Baru, X-Trail, Xpander, Livina Baru, Hard Top dan mobil sejenisnya</p>
        </div>
      </div>
    </div> <!-- /.col-md-6 -->
    <div class="col-lg-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 70.000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Fortuner, Pajero Sport, Hilux D. Cabin, MU-X, Frontier Navara, Triton D. Cabin, dan mobil sejenisnya</p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 80.000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Rubicon, Hiace, Land Cruiser, dan mobil sejenisnya</p>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
  <!-- tarif motor -->
  <hr>
  <div class="row text-center">
    <div class="col">
      <h5> Tarif Cuci Roda Dua </h5>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-lg-4">
      <div class="card card-danger card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 15.0000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Mio, Vario, Fino, Supra, N-Max, dan motor sejenisnya</p>
        </div>
      </div>
    </div> <!-- /.col-md-6 -->
    <div class="col-lg-4">
      <div class="card card-danger card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 20.000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">KLX, Ninja 250, dan motor sejenisnya</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-danger card-outline">
        <div class="card-header">
          <h5 class="m-0">Rp 25.000</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Motor Gede dengan kapasitas mesin melebihi 250cc</p>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
<div class="container text-center">
  <hr>
  <p>Kunjungi Kami Di : </p>
  <div class="gmap_canvas">
    <iframe width="80%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Thahira%20Carwash&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0">
    </iframe>
    <br>
    <style></style>
    <a href="https://www.embedgooglemap.net"></a>
    <style>
    .gmap_canvas {
      overflow:hidden;
      background:none!important;
      height:100%;
      width:100%;
    }
    .mapouter{
      position:relative;
      height:75%;
      width:80%;
    }
    </style>
  </div>
</div>
</div>
<br>
<div class="container-fluid text-center">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">Thahira Carwash &copy; 2021</p>
  </footer>
</div>
<?php include 'js.php';?>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      nopol: {
        required: true,
        maxlength : 9,
        minlength : 5
      },
      tc: {
        required: true,
      },
    },
    messages: {
      nopol: {
        required: "Nomor Polisi Tidak Boleh Kosong",
        maxlength: "Nomor Polisi Tidak Valid",
        minlength: "Nomor Polisi Tidak Valid"
      },
      tc: {
        required: "Silahkan Maasukan Tanggal Cuci",
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
