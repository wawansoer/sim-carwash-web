<?php
include "shortcut/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Koordinator | Kendaraan Cuci</title>
  <?php include "shortcut/head.php"; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include "shortcut/sidebar.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat Datang <?php echo $nama;?>.</strong> Semoga Hari Anda Menyenangkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
              <?
              $ambilJmlMobil = mysqli_query($koneksi, "SELECT jenis.nama_jenis as jenis, COUNT(cuci.id_cuci) as jml from cuci
              INNER join kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
              INNER join jenis on kategori_cuci.id_jenis = jenis.id_jenis
              WHERE cuci.tanggal between '$tanggal' AND '$tanggal' AND jenis.nama_jenis = 'Mobil'
              AND nik = '$nik'");
              if(mysqli_num_rows($ambilJmlMobil) > 0){
                $x = 0;
                while($jmlMobil = mysqli_fetch_assoc($ambilJmlMobil)){
                  $dataMobil = $jmlMobil['jml'];
                }
              }else {
                $dataMobil = 0;
              }
              ?>
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-car"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Mobil Yang Anda Cuci Hari Ini</span>
                  <span class="info-box-number"><? echo $dataMobil;?></span>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <?
                $ambilJmlMotor = mysqli_query($koneksi, "SELECT jenis.nama_jenis as jenis, COUNT(cuci.id_cuci) as jml from cuci
                INNER join kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
                INNER join jenis on kategori_cuci.id_jenis = jenis.id_jenis
                WHERE cuci.tanggal between '$tanggal' AND '$tanggal' AND jenis.nama_jenis = 'Motor' AND nik = '$nik'");
                if(mysqli_num_rows($ambilJmlMotor) > 0){
                  $x = 0;
                  while($jmlMotor = mysqli_fetch_assoc($ambilJmlMotor)){
                    $dataMotor = $jmlMotor['jml'];
                  }
                }else {
                  $dataMotor = 0;
                }
                ?>
                <span class="info-box-icon bg-danger"><i class="fas fa-motorcycle"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Motor Yang Anda Cuci Hari Ini</span>
                  <span class="info-box-number"><? echo $dataMotor;?></span>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
          </div> <!-- /.row -->

          <!-- kendaraan cuci -->
          <div class="row">
            <!-- tabel kendaraan cuci -->
            <div class="col-md-12 col-sm-12 col-12">
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Data Kendaraan Cuci</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="paging-ui-container"> </div>
                  <table class="table table-striped" id="tabelCuci">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nopol</th>
                        <th>Kendaraan</th>
                        <th>Petugas</th>
                        <th>Jumlah Bayar</th>
                        <th>Upah Karyawan</th>
                        <th>Tanggal Cuci</th>
                        <th>Status Bayar</th>
                        <th>Status Kerja</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ambilCuci = mysqli_query($koneksi, "SELECT cuci.id_cuci as idcuci, jenis.nama_jenis as jen, cuci.nopol as nopol,
                        cuci.nama_kendaraan as kendaraan, karyawan.nama_panggilan as petugas,
                        cuci.jumlah_bayar as bayar, cuci.tanggal as tgl, cuci.nik as nik, kategori_cuci.upah_karyawan as upah,
                        cuci.status_bayar as staBayar, cuci.status_kerja as staKerja, cuci.keterangan as ket,
                        cuci.rating as rating from cuci inner join karyawan on karyawan.nik = cuci.nik
                        Inner join kategori_cuci on cuci.id_kategori_cuci = kategori_cuci.id_kategori_cuci
                        inner join jenis on jenis.id_jenis = kategori_cuci.id_jenis
                        where cuci.tanggal between '$tanggal' and '$tanggal' ORDER by cuci.waktu_bayar desc");

                        while ($tampilCuci = mysqli_fetch_assoc($ambilCuci)) {
                          $blokText = $blokBayar = $blokKerja = '';
                          if($tampilCuci['jen'] === 'Motor'){
                            $icon = "<i class='fas fa-motorcycle'></i>";
                          }else{
                            $icon = "<i class='fas fa-car-side'></i>";
                          }

                          if($tampilCuci['staBayar'] === 'BELUM'){
                            $icon1 = "<i class='fas fa-times'></i>";
                          }else{
                            $icon1 = "<i class='fas fa-check-double'></i>";
                            $blokBayar = 'Disabled';
                          }

                          if($tampilCuci['staKerja'] === 'SELESAI'){
                            $icon2 = "<i class='fas fa-check-double'></i>";
                            $blokKerja = 'Disabled';
                            $blokText = 'Readonly';
                          }elseif($tampilCuci['staKerja'] === 'BATAL'){
                            $icon2 = "<i class='fas fa-times'></i>";
                          }else{
                            $icon2 = "<i class='fas fa-spinner'></i>";
                          }
                          $bayar = $tampilCuci['bayar'];
                          echo "<tr>";
                          echo "<td>" . $icon ."</td>";
                          echo "<td>" . $tampilCuci['nopol'] ."</td>";
                          echo "<td>" . $tampilCuci['kendaraan'] ."</td>";
                          echo "<td>" . $tampilCuci['petugas'] ."</td>";
                          echo "<td>" . rupiah($tampilCuci['bayar']) ."</td>";
                          echo "<td>" . rupiah($tampilCuci['upah']) ."</td>";
                          echo "<td>" . tgl_indo($tampilCuci['tgl']) ."</td>";
                          echo "<td>" . $tampilCuci['staBayar']." ".$icon1 ."</td>";
                          echo "<td>" . $tampilCuci['staKerja']." ".$icon2 ."</td>";
                          echo "</tr>";
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>

          </div>

        </section> <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">OneDSoeR</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



    <?php include "shortcut/dependensi.php";  ?>

    <script>
    $(document).ready(function() {
      var table = $('#tabelCuci').DataTable({
        responsive: true,
        lengthChange: false,
        buttons: ['colvis', 'csv']
      });

      table.buttons().container()
      .appendTo('#tabelCuci_wrapper .col-md-6:eq(0)');
    });
    </script>



  </body>

  </html>
