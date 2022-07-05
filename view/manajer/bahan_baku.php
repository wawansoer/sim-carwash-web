<?php include "shortcut/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thahira Carwash | Manajer | Bahan Baku </title>
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
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="card card-success">
                                <?php include "form_modal/modal_input_bahan.php"; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="card card-warning">
                                <?php include "form_modal/modal_input_pemakaian.php"; ?>
                            </div>
                        </div>
                    </div>
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
                                        <th>Aksi</th>
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
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
    <script>
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                <?php
                $ambilPemakaian = mysqli_query($koneksi, "SELECT DISTINCT pemakaian_bahan_baku.id_bahan_baku, bahan_baku.nama_bahan_baku 
                    FROM pemakaian_bahan_baku LEFT JOIN bahan_baku 
                    on bahan_baku.id_bahan_baku = pemakaian_bahan_baku.id_bahan_baku
                    ORDER BY pemakaian_bahan_baku.id_bahan_baku");
                while ($tampilPemakaian = mysqli_fetch_assoc($ambilPemakaian)) {
                    echo "'" . $tampilPemakaian['nama_bahan_baku'] . "',";
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    $hari_ini = date("Y-m-d");
                    $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
                    $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
                    $ambilJumlah = mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM pemakaian_bahan_baku  WHERE tanggal BETWEEN '$tgl_pertama' AND '$tgl_terakhir' GROUP BY id_bahan_baku ORDER BY id_bahan_baku");
                    while ($tampilJumlah = mysqli_fetch_assoc($ambilJumlah)) {
                        echo $tampilJumlah['jumlah'] . ",";
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