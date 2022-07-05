<?php
include "shortcut/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Manajer | Karyawan </title>
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
          <!-- validasi form -->
          <?php include 'form_modal/query_karyawan.php';?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- grafik statistik karyawan -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Statistik Performa Karyawan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="pilih" id="pilih" value="001">
                <div class="row">
                  <div class="col">
                    <input type="date" class="form-control" name="dari" id="dari" value="<?php echo $tgl_pertama;?>">
                  </div>
                  <div class="col">
                    <input type="date" class="form-control" name="sampai" id="sampai" value="<?php echo $tgl_terakhir;?>">
                  </div>
                  <div class="col">
                    <button type="submit" class="btn form-control btn-info btn-sm">Tampilkan <i class="fas fa-eye"></i></button>
                  </div>
                </div>
              </form>
              <br>
              <div class="chart">
                <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div> <!-- /.card-ody -->
          </div> <!-- /.card -->

          <!-- daftar karyawan cuci -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Daftar Karyawan Cuci</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table class="table table-striped" data-sorting="true" name="dua" id="dua">
                <thead>
                  <tr>
                    <th data-breakpoints="xs">Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th data-breakpoints="xs sm md">Tanggal Lahir</th>
                    <th data-breakpoints="xs sm md">Alamat</th>
                    <th data-breakpoints="xs">Nomor Kontak</th>
                    <th>Status</th>
                    <th data-breakpoints="xs sm md">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'form_modal/modal_edit_karyawan.php';
                  ?>
                </tbody>
              </table>
            </div> <!-- /.card-ody -->
          </div> <!-- /.card -->

          <!-- timeline riwayat transaksi karyawan -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Transaksi Karyawan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>            <!-- /.card-tools -->
            </div>          <!-- /.card-header -->
            <div class="card-body">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="pilih" id="pilih" value="002">
                <div class="row">
                  <div class="col">
                    <select class="form-select form-control" name="nik1" id="nik1">
                      <option selected> Silahkan Pilih Karyawan  </option>
                      <?php
                      $karyawanRiwayat = mysqli_query($koneksi, "SELECT karyawan.nama_panggilan, karyawan.nik from karyawan
                        left join pengguna on pengguna.nik = karyawan.nik
                        WHERE pengguna.id_jabatan = 1004 ORDER BY karyawan.nik");
                        while($karyawanCuci = mysqli_fetch_assoc($karyawanRiwayat)){
                          echo "<option value='".$karyawanCuci['nik']."'> ".$karyawanCuci['nama_panggilan']."  </option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col">
                      <input type="date" class="form-control" name="dari1" id="dari1" value="<?php echo $tgl_pertama1;?>">
                    </div>
                    <div class="col">
                      <input type="date" class="form-control" name="sampai1" id="sampai1" value="<?php echo $tgl_terakhir1;?>">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn form-control btn-info btn-sm">Tampilkan <i class="fas fa-eye"></i></button>
                    </div>
                  </div> <!-- row -->
                </form>
                <br>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- The time line -->

                      <div class="timeline">
                        <!-- mulai-->
                        <?php include 'form_modal/query_riwayat_karyawan.php';?>

                        <div>
                          <i class="fas fa-clock bg-gray"></i>
                        </div>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div> <!-- row -->
                </div> <!-- container timeline -->
              </div> <!-- /.card body -->
            </div> <!-- /.card -->
          </div>
          <!-- daftar calon karyawan -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Daftar Calon Karyawan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

              </div>
              <!-- /.card-tools -->
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-striped" data-sorting="true" name="satu" id="satu">
                <thead>
                  <tr>
                    <th data-breakpoints="xs">Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th data-breakpoints="xs sm md">Tanggal Lahir</th>
                    <th data-breakpoints="xs sm md">Alamat</th>
                    <th data-breakpoints="xs">Nomor Kontak</th>
                    <th>Pengalaman</th>
                    <th data-breakpoints="xs sm md">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include 'form_modal/modal_edit_praKaryawan.php';?>
                </tbody>
              </table>
            </div> <!-- /.card body -->
          </div> <!-- /.card -->
        </div> <!-- /.content-wrapper -->
      </section>


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
    <?php include "shortcut/dependensi.php"; ?>


    <script>
    jQuery(function($){
      $('#dua').footable({
      });
    });

    jQuery(function($){
      $('#satu').footable({
      });
    });


    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = {
      labels: [
        <?php
        $x = 0;
        while($x < count($dataStatistik)){
          $rerata =  ($dataStatistik[$x][2] + $dataStatistik[$x][4])/2;
          echo "'".$dataStatistik[$x][0]."',  ";
          $x++;
        }
        ?>
      ],
      datasets: [{
        label: 'Rating',
        backgroundColor: 'rgba(255, 190, 0, 0.2)',
        borderColor: 'rgba(255, 190, 0, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [
          <?php
          $x = 0;
          while($x < count($dataStatistik)){
            $rerata =  ($dataStatistik[$x][2] + $dataStatistik[$x][4])/2;
            echo intval($rerata).",";
            $x++;
          }
          ?>
        ],
        borderWidth: 1
      },
      {
        label: 'Mobil',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgb(54, 162, 235)',
        pointRadius: false,
        pointColor: 'rgb(54, 162, 235)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgb(54, 162, 235)',
        borderWidth: 1,
        data: [
          <?php
          $x = 0;
          while($x < count($dataStatistik)){
            echo intval($dataStatistik[$x][1]).",";
            $x++;
          }
          ?>
        ],

      },
      {
        label: 'Motor',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgb(255, 99, 132)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgb(255, 99, 132)',
        borderWidth: 1,
        data: [
          <?php
          $x = 0;
          while($x < count($dataStatistik)){
            echo intval($dataStatistik[$x][3]).",";
            $x++;
          }
          ?>
        ],
      },
    ]
  }
  var stackedBarChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [{
        stacked: false,
        ticks: {
          beginAtZero: true
        }
      }],
      yAxes: [{
        stacked: false,
        ticks: {
          beginAtZero: true
        }
      }],
      rAxes: [{
        stacked: false,
        ticks: {
          beginAtZero: true
        }
      }],
    }
  }

  new Chart(stackedBarChartCanvas, {
    type: 'bar',
    data: stackedBarChartData,
    options: stackedBarChartOptions
  })
  </script>

</body>

</html>
