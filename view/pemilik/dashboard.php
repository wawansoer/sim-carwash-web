<?php
include "shortcut/session.php";
include "form_modal/query_prakiraan.php";
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
              <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-car"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Prakiraan Mobil Masuk Hari Ini</span>
                  <span class="info-box-number"><? echo $prediksiMobil;?></span>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-motorcycle"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Prakiraan Motor Masuk Hari Ini</span>
                  <span class="info-box-number"><? echo $prediksiMotor;?></span>
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
                  <i class="fas fa-money-bill-alt"></i>
                  Keuangan Bulan Ini
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6">
                        <h6 class="text-center"> Total Pendapatan Bersih <?php echo rupiah($pendaptanBersih);?> </h6>
                      </div>
                      <div class="col-sm-6">
                        <h6 class="text-center"> Total Pengeluaran <?php echo rupiah($totalPengeluaran);?> </h6>
                      </div>
                    </div>
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
            <div class="card card-info">
              <div class="card-header">
                <i class="fas fa-digital-tachograph"></i>
                Pemakaian Bahan Baku
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="container">
                  <!-- rerata bahan baku -->
                  <div class="row">
                    <div class="col-sm-3 col-sm-6 col-12">
                      <div class="info-box bg-gradient-dark">
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
                      <div class="info-box bg-gradient-dark">
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
                      <div class="info-box bg-gradient-dark">
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
                      <div class="info-box bg-gradient-dark">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> <!-- ./col -->
        </div> <!-- ./row -->
        <!-- karyawan -->
        <div class="card card-success">
            <div class="card-header">
                <i class="fas fa-users"></i>
                Daftar Karyawan Cuci

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="karyawan" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Nama Panggilan</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nomor Kontak</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambilPraKaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan
                        left join pengguna on pengguna.nik = karyawan.nik
                        WHERE pengguna.id_jabatan = 1004");
                        while ($tampilPra = mysqli_fetch_assoc($ambilPraKaryawan)) {
                            echo "<tr>";
                            echo "<td>" . $tampilPra['nik'] . "</td>";
                            echo "<td>" . $tampilPra['nama_lengkap'] . "</td>";
                            echo "<td>" . $tampilPra['nama_panggilan'] . "</td>";
                            echo "<td>" . $tampilPra['tanggal_lahir'] . "</td>";
                            echo "<td>" . $tampilPra['alamat'] . "</td>";
                            echo "<td>" . $tampilPra['nomor_handphone'] . "</td>";
                            echo "<td>" . $tampilPra['status'] . "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div> <!-- /.card-ody -->
        </div> <!-- /.card -->
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
      <?php
      $n = count($dataMobil)-1;
      $t = 0;
      while($t < $n) {
        echo "'".$dataMobil [$t][5]."',";
        $t++;
      }
      ?>
    ],
    datasets: [
      {
        label: 'Motor',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgb(255, 99, 132)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgb(255, 99, 132)',
        borderWidth : 1,
        data: [<?php
        $n = count($dataMotor)-1;
        $t = 0;
        while($t < $n) {
          echo $dataMotor [$t][1].",";
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
        borderWidth : 1,
        data: [
          <?php
          $n = count($dataMobil)-1;
          $t = 0;
          while($t < $n) {
            echo $dataMobil [$t][1].",";
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
      }],
      yAxes: [{
        stacked: false
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
  var donutData        = {
    title:[

    ],
    labels: [
      <?php
      $t = 0;
      while($t < $nPendapatan){
        echo "'".$arrPendapatan[$t][0]."',";
        $t++;
      }
      ?>
    ],
    datasets: [
      {
        data: [<?php
        $t = 0;
        while($t < $nPendapatan){
          echo $arrPendapatan[$t][1].",";
          $t++;
        }
        ?>],
        backgroundColor : [ 'rgb(54, 162, 235)', '#ed2424', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
      }
    ]
  }
  var donutOptions     = {

    maintainAspectRatio : false,
    responsive : true,
    legend : {
      position: "bottom"
    },
    title :{
      display : true,
      text : "Pendapatan & Pengeluaran"
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
  var donutData        = {
    labels: [
      <?php
      $t = 0;
      while($t < count($arrPengeluaran)){
        echo "'".$arrPengeluaran[$t][1]."',";
        $t++;
      }
      ?>
    ],
    datasets: [
      {
        data: [<?php
        $t = 0;
        while($t < count($arrPengeluaran)){
          echo $arrPengeluaran[$t][0].",";
          $t++;
        }
        ?>],
        backgroundColor : [ '#1375ed', '#fa5737','#edd413' , '#f39c12', '#f56954', '#00a65a'],
      }
    ]
  }
  var donutOptions     = {
    maintainAspectRatio : false,
    responsive : true,
    legend : {
      position: "bottom"
    },
    title :{
      display : true,
      text : "Pengeluaran"
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
