<?php
  include "shortcut/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Manajer| Keuangan</title>
  <?php include "shortcut/head.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- side bar -->
    <?php include "shortcut/sidebar.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <?php include "form_modal/query_pengeluaran.php";?>
        </div><!-- /.container-fluid -->
      </div> <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container">
          <!-- Tambah data transaksi -->
          <div class="card">
            <?php include "form_modal/modal_input_pengeluaran.php";?>
          </div>

          <!-- STACKED BAR CHART -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Transaksi Harian</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <div class="container">
                  <form id="perioPengeluaran" name="perioPengeluaran" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="row g-3">
                    <div class="col-sm">
                      <input type="hidden" name="pilih" value="dua">
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
                <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div> <!-- /.card -->
          <!-- PIE CHART -->
          <!-- Grafik Pendapatan -->
          <div class="row">
            <div class="col">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Keuangan</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="container">
                    <form id="perioPengeluaran" name="perioPengeluaran" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row g-3">
                      <div class="col-sm">
                        <input type="hidden" name="pilih" value="empat">
                        <input type="date" class="form-control" name="dari3" value="<?php echo $dari3;?>"required>
                      </div>
                      <div class="col-sm">
                        <input type="date" class="form-control" name="sampai3" value="<?php echo $sampai3;?>"required>
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
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Riwayat Transaksi</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- timeline -->
            <div class="card-body">
              <div class="container">
                <form id="timeline" name="timeline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row g-3">
                  <div class="col-sm">
                    <input type="hidden" name="pilih" value="tiga">
                    <input type="date" class="form-control" name="dari2" value="<?php echo $dari2;?>"required>
                  </div>
                  <div class="col-sm">
                    <input type="date" class="form-control" name="sampai2" value="<?php echo $sampai2;?>" required>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm form-control">Tampilkan Data</button>
                  </div>
                </div>
                  </form>
              </div>
              <br>
              <div class="timeline">
                 <?php
                 $x = $y = 0;
                 while($x < count($dataPendapatan)){
                 echo "<div class='time-label'>
                   <span class='bg-blue'>".tgl_indo($dataPengeluaran[$x][0])."</span>
                 </div>";

                 while($dataPendapatan[$y][0] == $dataPengeluaran[$x][0]){
                   if($dataPengeluaran[$x][1] == 'Gaji Karyawan'){
                     $xy = "fas fa-users bg-red";
                     $o = 1;
                   }else{
                     $xy = "fas fa-layer-group bg-yellow";
                     $o = 3;
                   }
                   echo "<div>
                  <i class='".$xy."'></i>
                  <div class='timeline-item'>
                    <h3 class='timeline-header'>".$dataPengeluaran[$x][1]."</h3>
                    <div class='timeline-body'>
                      Biaya  ".$dataPengeluaran[$x][$o]." Sebesar ". rupiah($dataPengeluaran[$x][2])." 
                    </div>
                  </div>
                </div>";
                   $x++;
                 }
                 echo "<div>
                  <i class='fas fa-wallet bg-green'></i>
                  <div class='timeline-item'>
                    <h3 class='timeline-header'>".$dataPendapatan[$y][1]."</h3>
                    <div class='timeline-body'>
                      Pendapatan sebesar ".rupiah($dataPendapatan[$y][2])."
                    </div>
                  </div>
                </div>";
                 $y++;
                 }

                  ?>
                <!-- /.timeline-label -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <!-- timeline item -->
                <!-- END timeline item -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
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
  <?php include "shortcut/dependensi.php"; ?>
  <script>
  $(function() {
    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = {
      labels: [
        <?php
          $a = 0;
          while ($a < count($pendapatan)) {
            // code...
            echo "'".$pendapatan[$a][0]."', ";
            $a++;
          }
        ?>
      ],
      datasets: [{
        label: 'Pengeluaran',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgb(255, 99, 132)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgb(255, 99, 132)',
        borderWidth: 1,
        data: [<?php
          $a = 0;
          while ($a < count($pendapatan)) {
            // code...
            echo $pendapatan[$a][2].", ";
            $a++;
          }
        ?>]
      },
      {
        label: 'Pemasukan',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgb(54, 162, 235)',
        pointRadius: false,
        pointColor: 'rgb(54, 162, 235)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgb(54, 162, 235)',
        borderWidth: 1,
        data: [<?php
          $a = 0;
          while ($a < count($pendapatan)) {
            // code...
            echo $pendapatan[$a][1].", ";
            $a++;
          }
        ?>]
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

</script>
</body>

</html>
