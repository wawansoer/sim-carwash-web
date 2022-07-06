<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thahira Carwash</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Thahira Carwash" name="keywords">
    <meta content="Cuci Mobil Bersih Kendari Cuci Mobil Seperti Baru" name="description">

  
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/dist/css/bootstrap.min.css">
    <!-- Libraries Stylesheet -->
    <link href="assets/home/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/home/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a href="" class="navbar-brand p-0">
                        <h1 class="text-light m-0"><i class="fas fa-car-alt"></i> Thahira Carwash</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>

                    <a href="login.php" class="btn float-right btn-light py-2 px-4">Masuk</a>
                </div>

            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Mobil Bersih<br>Seperti Baru Lagi</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Kendaraan Anda Akan Dikerjakan Oleh Tenaga Berpengalaman Membuat Kendaraan Anda Bersih Seperti Baru Lagi</p>
                            <a href="https://www.google.co.id/maps/dir//Pencucian+Thahira,+Jl.+Martandu+No.99,+Kambu,+Kec.+Kambu,+Kota+Kendari,+Sulawesi+Tenggara+93231/@-4.0154295,122.5334036,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2d988d8b25e9141b:0x445a86a5007a0a7a!2m2!1d122.5355923!2d-4.0154295?hl=id" class="btn btn-light py-sm-3 px-sm-5 me-3 animated slideInLeft">Kunjungi Kami <i class="fas fa-location-arrow"></i> </a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="assets/home/img/thahira.png" alt="Thahira Carwash">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Reservation Start -->
        <div class="container">
            <div class="col-bg-12 bg-dark d-flex align-items-center">
                <div class="col-12 p-4 wow fadeInUp" data-wow-delay="0.2s">
                    <h1 class="text-white mb-4">Berikan Penilaian Pelayanan Kami </h1>
                    <form method="post" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <input type="hidden" name="pilih" value="001">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nopol" placeholder="DT1234XX" name="nopol"  pattern="^([A-Z]{1,3})(\S|-)*([1-9][0-9]{1,4})(\S|-)*([A-Z]{0,3}|[1-9][0-9]{1,2})$" required>
                                    <label for="nopol">Nomor Polisi</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="tglCuci" name="tglCuci"  placeholder="Tanggal Cuci Kendaraan" required>
                                    <label for="tglCuci">Tanggal Cuci Kendaraan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-info w-100 py-3" type="submit">Cek Kendaraan</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <? include 'penilaian.php';?>

                </div>
            </div>


            <!-- Service Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-user-tie text-info mb-4"></i>
                                    <h5>Tenaga Profesional</h5>
                                    <p>Dikerjakan Oleh Tenaga Berpengalaman & Profesional</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fas fa-3x fa-car-alt text-info mb-4"></i>
                                    <h5>Hidrolik H</h5>
                                    <p>Menggunakan Hidrolik H Agar Lebih Aman Ketika Diangkat</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fas fa-3x fa-hand-sparkles text-info mb-4"></i>
                                    <h5>Semir</h5>
                                    <p>Menggunakan Semir Dashboard & Ban Berkualitas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fas fa-3x fa-spray-can text-info mb-4"></i>
                                    <h5>Parfum</h5>
                                    <p>Menggunakan Parfum Agar Kabin Kendaraan Anda Menjadi Lebih Fresh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->


            <!-- About Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-12 text-center">
                            <h5 class="section-title ff-secondary text-center text-info fw-normal">Tentang Kami</h5>
                            <h1 class="mb-4">Selamat Datang <i class="fas fa-car-side text-info me-2"></i>Thahira Carwash</h1>
                            <p class="mb-4">Thahira Carwash berdiri sejak 2018 sehari dapat menyelesaikan kendaraan sampai dengan 30 mobil dengan moto utama kami adalah <b> Bersih Adalah Yang Utama </b>.</p>
                            <div class="row g-4 mb-4">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center border-start border-5 border-info px-3">
                                        <h1 class="flex-shrink-0 display-5 text-info mb-0" data-toggle="counter-up">4</h1>
                                        <div class="ps-4">
                                            <p class="mb-0">Tahun</p>
                                            <h6 class="text-uppercase mb-0">Pengalaman</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center border-start border-5 border-info px-3">
                                        <h1 class="flex-shrink-0 display-5 text-info mb-0" data-toggle="counter-up">12</h1>
                                        <div class="ps-4">
                                            <p class="mb-0">Profesional</p>
                                            <h6 class="text-uppercase mb-0">Tenaga Kerja</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


            <!-- Menu Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-info fw-normal"> Tarif Kami</h5>
                        <h1 class="mb-5">Tarif Cuci Kami</h1>
                    </div>
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                    <i class="fa fa-car-side fa-2x text-info"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">Mobil</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                    <i class="fa fa-motorcycle fa-2x text-info"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">Motor</h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Mobil Kecil</span>
                                                    <span class="text-info">Rp 45.0000</span>
                                                </h5>
                                                <small class="fst-italic">Brio, Ayla, Agya, Datsun Go, Yaris, Jazz, Swift, Small Pick Up dan mobil sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Mobil Sedang</span>
                                                    <span class="text-info">Rp 50.000</span>
                                                </h5>
                                                <small class="fst-italic">Avanza, Ertiga, Rush Lama, Terios Lama, Xenia,Luxio, Livina Lama, Big Pick Up, dan mobil sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Mobil Besar</span>
                                                    <span class="text-info">Rp. 60.000</span>
                                                </h5>
                                                <small class="fst-italic">Innova, Terios Baru, Rush Baru, X-Trail, Xpander, Livina Baru, Hard Top dan mobil sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Mobil Super Besar</span>
                                                    <span class="text-info">Rp. 70.000</span>
                                                </h5>
                                                <small class="fst-italic">Fortuner, Pajero Sport, Hilux D. Cabin, MU-X, Frontier Navara, Triton D. Cabin, dan mobil sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Mobil Jumbo</span>
                                                    <span class="text-info">Rp. 80.000</span>
                                                </h5>
                                                <small class="fst-italic">Rubicon, Hiace, Land Cruiser, dan mobil sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Motor Kecil</span>
                                                    <span class="text-info">Rp. 15.000</span>
                                                </h5>
                                                <small class="fst-italic">Mio, Vario, Fino, Supra, N-Max, dan motor sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Motor Besar</span>
                                                    <span class="text-info">Rp. 20.000</span>
                                                </h5>
                                                <small class="fst-italic">KLX, Ninja 250, dan motor sejenisnya</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>Motor Jumbo</span>
                                                    <span class="text-info">Rp. 25.000</span>
                                                </h5>
                                                <small class="fst-italic">Motor Gede dengan kapasitas mesin melebihi 250cc</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->

        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">

                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-info fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Martandu No. 97 Kota Kendari</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6281243590903</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>wawansoer@gmail.com</p>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-info fw-normal mb-4">Buka</h4>
                        <h5 class="text-light fw-normal">Senin - Minggu</h5>
                        <p>07AM - 06PM</p>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Thahira Carwash</a>, All Right Reserved.

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-info btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/home/lib/wow/wow.min.js"></script>
    <script src="assets/home/lib/easing/easing.min.js"></script>
    <script src="assets/home/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/home/lib/counterup/counterup.min.js"></script>
    <script src="assets/home/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/home/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/home/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/home/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/home/js/main.js"></script>
    <script type="text/javascript" src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
