
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">Thahira Carwash</i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="../../assets/admin_lte/dist/img/1.png" alt="" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">Thahira Carwash</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        &nbsp;
      </div>
      <div class="info">
        <a href="#" class="d-block"><? echo $nama; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="keuangan.php" class="nav-link">
            <i class="fas fa-wallet nav-icon"></i>
            <p>Keuangan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="kendaraan_cuci.php" class="nav-link">
            <i class="fas fa-car nav-icon"></i>
            <p>Kendaraan Cuci</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pengaturan.php" class="nav-link">
            <i class="fas fa-user-cog nav-icon"></i>
            <p>Pengaturan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
