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
          <div class="card">
            <?php include "form_modal/modal_input_pengeluaran.php"; ?>
          </div>
          <!-- Transaksi Hari ini -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Transaksi Hari Ini</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-borderless" id="setoran">
                <thead class="text-center">
                  <tr>
                    <th>Nama Transaksi</th>
                    <th>Jumlah</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Modal</td>
                    <td class="text-right">
                      <? echo rupiah($modal); ?>
                    </td>
                    <td class="text-center"> </td>
                  </tr>
                  <tr>
                    <td>Pendapatan</td>
                    <td class="text-right">
                      <? echo rupiah($pendapatan); ?>
                    </td>
                    <td class="text-center"> <?include 'form_modal/modal_detail_pendapatan.php';?> </td>
                  </tr>
                  <?
                    if($penjualan > 0 ){
                  ?>
                  <tr>
                    <td>Penjualan</td>
                    <td class="text-right">
                      <? echo rupiah($penjualan); ?>
                    </td>
                    <td class="text-center"> <?include 'form_modal/modal_detail_penjualan.php';?> </td>
                  </tr>
                  <?
                    }
                  ?>

                  <?
                  $totalSatu = $pendapatan + $modal + $penjualan;
                  ?>
                  <tr class="text-bold table-primary">
                    <td>Total</td>
                    <td class="text-right">
                      <? echo rupiah($totalSatu); ?>
                    </td>
                    <td></td>
                  </tr>
                  <?
                  if($panjar > 0){
                  ?>
                  <tr>
                    <td>Panjar Karyawan</td>
                    <td class="text-right">
                      <? echo rupiah($panjar); ?>
                    </td>
                    <td class="text-center"> <?include 'form_modal/modal_detail_panjar.php';?> </td>
                  </tr>
                  <?
                  }
                  ?>

                  <?
                  if($pengeluaran > 0){
                  ?>
                  <tr>
                    <td>Pengeluaran</td>
                    <td class="text-right">
                      <? echo rupiah($pengeluaran); ?>
                    </td>
                    <td class="text-center"> <?include 'form_modal/modal_detail_pengeluaran.php';?> </td>
                  </tr>
                  <?
                  }
                  ?>


                  <?php
                  $totalDua = $panjar + $pengeluaran;
                  if($totalDua > 0){
                  ?>
                  <tr class="text-bold table-danger">
                    <td>Total Pengeluaran</td>
                    <td class="text-right">
                      <? echo rupiah($totalDua); ?>
                    </td>
                    <td></td>
                  </tr>
                  <?
                  }
                  ?>
                </tbody>
                <?
                  $totalSetor = $totalSatu - $totalDua;
                ?>
                <tfoot>
                  <tr class="text-bold">
                    <td class="text-center"> Total Yang Harus Di Setor </td>
                    <td class="text-right"> <? echo rupiah($totalSetor); ?> </td>
                    <td> </td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div> <!-- /.card -->
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
