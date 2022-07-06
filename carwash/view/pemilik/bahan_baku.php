<?php include "shortcut/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Pemilik | Bahan Baku </title>
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
          <?php include "form_modal/query_bahan.php"; ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Data Bahan Baku</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap table-striped">
                <thead class="text-center">
                  <tr class="">
                    <th>Nama Bahan Baku</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include "form_modal/modal_edit_bahan.php"; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div> <!-- /.card -->
          <!-- PIE CHART -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Pemakaian Bahan Baku Bulan Ini</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="container">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="row g-3">
                    <div class="col-sm">
                      <input type="hidden" name="pilih" value="001">
                      <input type="date" class="form-control" name="dari" value="<?php echo $dari;?>" required>
                    </div>
                    <div class="col-sm">
                      <input type="date" class="form-control" name="sampai" value="<?php echo $sampai;?>" required>
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary btn-sm form-control">Tampilkan Data</button>
                    </div>
                  </div>
                </form>
              </div>
              <br>
              <div class="container">
                <div class="row">
                  <div class="col-sm-3 col-sm-6 col-12">
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <div class="col-sm-3 col-sm-6 col-12">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-3 col-sm-6 col-12">
                          <div class="info-box bg-gradient-light">
                            <span class="info-box-icon"><i class="fas fa-air-freshener"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo $hasilPemakaian[0][0];?></span>
                              <span class="info-box-number">
                                <?php
                                echo round($hasilPemakaian[0][2],4)." ". $hasilPemakaian[0][1]." / "
                                . rupiah(round($hasilPemakaian[0][3],4));
                                ?>
                              </span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                                Per Mobil/Motor Yang Dicuci
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-sm-6 col-12">
                          <div class="info-box bg-gradient-light">
                            <span class="info-box-icon"><i class="fas fa-spray-can"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo $hasilPemakaian[1][0];?></span>
                              <span class="info-box-number">
                                <?php
                                echo round($hasilPemakaian[1][2],4)." ". $hasilPemakaian[1][1]." / "
                                . rupiah(round($hasilPemakaian[1][3],4));
                                ?>
                              </span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                                Per Mobil/Motor Yang Dicuci
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-sm-6 col-12">
                          <div class="info-box bg-gradient-light">
                            <span class="info-box-icon"><i class="fas fa-soap"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo $hasilPemakaian[2][0];?></span>
                              <span class="info-box-number"><?php
                              echo round($hasilPemakaian[2][2],4)." ". $hasilPemakaian[2][1]." / "
                              . rupiah(round($hasilPemakaian[2][3],4));
                              ?></span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                                Per Mobil/Motor Yang Dicuci
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-sm-6 col-12">
                          <div class="info-box bg-gradient-light">
                            <span class="info-box-icon"><i class="fas fa-car-side"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo $hasilPemakaian[3][0];?></span>
                              <span class="info-box-number">
                                <?php
                                echo round($hasilPemakaian[3][2],4)." ". $hasilPemakaian[3][1]." / "
                                . rupiah(round($hasilPemakaian[3][3],4));
                                ?>
                              </span>

                              <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                                Per Mobil/Motor Yang Dicuci
                              </span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                      </div> <!-- row  pemakaian bahan baku-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
  <?php include "shortcut/dependensi.php"; ?>
  <?php

  ?>
  <script>
  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData = {
    labels: [
      <?php
      $y = 0;
      while ($y < count($pemakaianBahan)) {
        echo "'" . $pemakaianBahan[$y][0] . "',";
        $y++;
      }
      ?>
    ],
    datasets: [{
      data: [
        <?php
        $y=0;
        while ($y < count($pemakaianBahan)) {
          echo $pemakaianBahan[$y][1]. ",";
          $y++;
        }
        ?>
      ],
      backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
    }]
  }
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  })
  </script>

</body>

</html>
