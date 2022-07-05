<?php
include "shortcut/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Koordinator| Keuangan</title>
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
          <?php include 'form_modal/query_keuangan.php'; ?>
        </div><!-- /.container-fluid -->
      </div> <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Tambah data transaksi -->
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-money-bill-wave"></i></span>

                <div class="info-box-content">
                  <div class="d-grid gap-6">
                    <? include 'form_modal/modal_input_pengambilan.php';?>
                  </div>
                </div> <!-- /.info-box-content -->

              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-mug-hot"></i></i></span>

                <div class="info-box-content">
                  <div class="d-grid gap-2">
                    <?php include 'form_modal/modal_input_panjarMinuman.php';?>
                  </div>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div>
          </div> <!-- /.row -->
          <!-- Transaksi Hari ini -->
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
                <input type="hidden" name="pilih" id="pilih" value="003">
                <div class="row">
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
          <!-- PIE CHART -->
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

  </script>

</body>

</html>
