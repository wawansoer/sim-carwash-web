<?php
include "shortcut/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Manajer| Dashboard</title>
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
          <? include "form_modal/query_kendaraan_cuci.php"; ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-car"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Prakiraan Mobil Masuk Hari Ini</span>
                  <span class="info-box-number"><? echo $prediksiMobil; ?></span>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-motorcycle"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Prakiraan Motor Masuk Hari Ini</span>
                  <span class="info-box-number"><? echo $prediksiMotor; ?></span>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
          </div> <!-- /.row -->
          <!-- Grafik Kendaraan -->
          <div class="row">
            <div class="col">
              <div class="card card-dark">
                <div class="card-header">
                  <i class="fas fa-car"></i>
                  Kendaraan
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="container">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="kendaraanCuci">
                      <div class="row">
                        <div class="input-group">
                          <input type="hidden" name="pilih" value="001">
                          <input type="date" class="form-control" name="awal" value="<? echo $awal; ?>">
                          &nbsp;
                          <input type="date" class="form-control" name="akhir" value="<? echo $akhir; ?>">
                          &nbsp;
                          <button type="submit" class="btn btn-primary"> Tampilkan </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="chart">
                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div> <!-- ./col -->
          </div> <!-- ./row -->
          <!-- Grafik Pendapatan -->
          <div class="row">
            <div class="col">
              <div class="card card-primary">
                <div class="card-header">
                  <i class="fas fa-car-side"></i>
                  Kendaraan Berdasakan Kategori
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="container">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="kendaraanCuci">
                      <div class="row">
                        <div class="input-group">
                          <input type="hidden" name="pilih" value="002">
                          <input type="date" class="form-control" name="awal1" value="<? echo $awal1; ?>">
                          &nbsp;
                          <input type="date" class="form-control" name="akhir1" value="<? echo $akhir1; ?>">
                          &nbsp;
                          <button type="submit" class="btn btn-primary"> Tampilkan </button>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="chart">
                          <canvas id="donutChart" height="300" style="height: 300px;"> Pendapatan & Pengeluaran</canvas>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="chart">
                          <canvas id="donutChart1" height="300" style="height: 300px;"> Pendapatan & Pengeluaran</canvas>
                        </div>
                      </div>
                      <div>
                      </div>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div> <!-- ./col -->
              </div> <!-- ./row -->
              <!-- Grafik Pemakaian Bahan Baku -->
              <div class="row">
                <div class="col">
                  <div class="card card-success">
                    <div class="card-header">
                      <i class="fas fa-book"></i>
                      Daftar Kendaraan Cuci
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="container">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="kendaraanCuci">
                          <div class="row">
                            <div class="input-group">
                              <input type="hidden" name="pilih" value="003">
                              <input type="date" class="form-control" name="awal2" value="<? echo $awal2; ?>">
                              &nbsp;
                              <input type="date" class="form-control" name="akhir2" value="<? echo $akhir2; ?>">
                              &nbsp;
                              <button type="submit" class="btn btn-primary"> Tampilkan </button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <br>
                      <table id="karyawan" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nopol</th>
                            <th>Kendaraan</th>
                            <th>Petugas</th>
                            <th>Bayar</th>
                            <th>Tanggal Cuci</th>
                            <th>Bayar</th>
                            <th>Kerja</th>
                            <th>Rating</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $ambilCuci = mysqli_query($koneksi, "SELECT jenis.nama_jenis as jen, cuci.nopol as nopol,
                                                            cuci.nama_kendaraan as kendaraan,
                                                            karyawan.nama_panggilan as petugas, cuci.jumlah_bayar as bayar, cuci.tanggal as tgl,
                                                            cuci.status_bayar as staBayar, cuci.status_kerja as staKerja, cuci.keterangan as ket,
                                                            cuci.rating as rating from cuci
                                                            inner join karyawan on karyawan.nik = cuci.nik
                                                            Inner join kategori_cuci on cuci.id_kategori_cuci = kategori_cuci.id_kategori_cuci
                                                            inner join jenis on jenis.id_jenis = kategori_cuci.id_jenis
                                                            where cuci.tanggal between '$awal2' and '$akhir2' ORDER by cuci.tanggal desc");
                          while ($tampilCuci = mysqli_fetch_assoc($ambilCuci)) {
                            if ($tampilCuci['jen'] === 'Motor') {
                              $icon = "<i class='fas fa-motorcycle'></i>";
                            } else {
                              $icon = "<i class='fas fa-car-side'></i>";
                            }

                            if ($tampilCuci['staBayar'] === 'Belum') {
                              $icon1 = "<i class='fas fa-times'></i>";
                            } else {
                              $icon1 = "<i class='fas fa-check-double'></i>";
                            }

                            if ($tampilCuci['staKerja'] === 'SELESAI') {
                              $icon2 = "<i class='fas fa-check-double'></i>";
                            } elseif ($tampilCuci['staKerja'] === 'BATAL') {
                              $icon2 = "<i class='fas fa-times'></i>";
                            } else {
                              $icon2 = "<i class='fas fa-check'></i>";
                            }
                            echo "<tr>";
                            echo "<td>" . $icon . "</td>";
                            echo "<td>" . $tampilCuci['nopol'] . "</td>";
                            echo "<td>" . $tampilCuci['kendaraan'] . "</td>";
                            echo "<td>" . $tampilCuci['petugas'] . "</td>";
                            echo "<td>" . rupiah($tampilCuci['bayar']) . "</td>";
                            echo "<td>" . tgl_indo($tampilCuci['tgl']) . "</td>";
                            echo "<td>" . $icon1 . "</td>";
                            echo "<td>" . $icon2 . "</td>";
                            echo "<td>" . $tampilCuci['rating'] . "</td>";
                            echo "<td>" . $tampilCuci['ket'] . "</td>";
                            echo "</tr>";
                          }
                          ?>

                        </tbody>
                      </table>
                    </div> <!-- /.card-ody -->
                  </div> <!-- /.card -->

                  <!-- /.card -->
                </div> <!-- ./col -->
              </div> <!-- ./row -->
              <!-- karyawan -->
            </div> <!-- /.container-fluid -->
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
    $(function() {
      //grafik kendaraan
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = {
        labels: [
          <?
          $t = 0;
          while ($t < count($dataKendaraan)) {
            echo "'" . $dataKendaraan[$t][0] . "',";
            $t++;
          }
          ?>
        ],
        datasets: [{
            label: 'Motor',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgb(255, 99, 132)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(255, 99, 132)',
            borderWidth: 1,
            data: [<?php
                    $t = 0;
                    while ($t < count($dataKendaraan)) {
                      echo $dataKendaraan[$t][2] . ",";
                      $t++;
                    }
                    ?>]
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
              $t = 0;
              while ($t < count($dataKendaraan)) {
                echo $dataKendaraan[$t][1] . ",";
                $t++;
              }
              ?>
            ]
          },
        ]
      }

      var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          xAxes: [{
            stacked: true,
            ticks: {
              beginAtZero: true,
            }
          }],
          yAxes: [{
            stacked: false,
            ticks: {
              beginAtZero: true,
            }
          }]
        }
      }
      new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      })


      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        title: [

        ],
        labels: [
          <?
          $t = 0;
          while ($t < count($dataKatMotor)) {
            echo "'" . $dataKatMotor[$t][0] . "',";
            $t++;
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            $t = 0;
            while ($t < count($dataKatMotor)) {
              echo $dataKatMotor[$t][1] . ",";
              $t++;
            }
            ?>
          ],
          backgroundColor: ['rgb(54, 162, 235)', '#ed2424', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
      }
      var donutOptions = {

        maintainAspectRatio: false,
        responsive: true,
        legend: {
          position: "bottom"
        },
        title: {
          display: true,
          text: "Motor Per Kategori"
        }

      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      var donutChartCanvas = $('#donutChart1').get(0).getContext('2d')
      var donutData = {
        labels: [
          <?
          $t = 0;
          while ($t < count($dataKatMobil)) {
            echo "'" . $dataKatMobil[$t][0] . "',";
            $t++;
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            $t = 0;
            while ($t < count($dataKatMobil)) {
              echo $dataKatMobil[$t][1] . ",";
              $t++;
            }
            ?>
          ],
          backgroundColor: ['#1375ed', '#fa5737', '#edd413', '#f39c12', '#f56954', '#00a65a'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          position: "bottom"
        },
        title: {
          display: true,
          text: "Mobil Per Kategori"
        }
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions

      })

      $(document).ready(function() {
        var table = $('#karyawan').DataTable({
          responsive: true,
          lengthChange: false,
          buttons: ['colvis', 'pdf', 'csv']
        });

        table.buttons().container()
          .appendTo('#karyawan_wrapper .col-md-6:eq(0)');
      });
    })
  </script>
</body>

</html>
