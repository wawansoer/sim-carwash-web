<?php include "shortcut/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Manajer| Minuman </title>
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
          <?php include "form_modal/query_minuman.php"; ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Minuman & Snack</h3>

                  <div class="card-tools">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMinuman">
                      <i class="fas fa-plus-square"></i> Minuman
                    </button>

                    <!-- Modal -->
                    <?php include "form_modal/modal_input_minuman.php"; ?>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap table-striped">
                    <thead class="text-center">
                      <tr class="">
                        <th>Nama Minuman</th>
                        <th>Modal</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include "form_modal/modal_edit_minuman.php"; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">Data Penjualan</h3>

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
                  <table class="table table-striped" id="penjualan">
                    <thead>
                      <tr>
                        <th>Aksi</th>
                        <th>Nama Minuman</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total Bayar</th>
                        <th>Status Bayar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ambilPenjualan = mysqli_query($koneksi, "SELECT * from penjualan inner join minuman on minuman.id_minuman  = penjualan.id_minuman
                        WHERE penjualan.tgl between '$dari' AND '$sampai' ORDER BY penjualan.waktu");

                        while ($tampilPenjualan = mysqli_fetch_assoc($ambilPenjualan)) {
                          $total = $tampilPenjualan['harga_jual'] * $tampilPenjualan['jumlah'];
                          echo "<tr>";
                          ?>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editPen<?echo $tampilPenjualan['id_penjualan'];?>">
                              <i class="fas fa-edit"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="editPen<?echo $tampilPenjualan['id_penjualan'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <form id="editPenjualan" name="editPenjualan" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                  <?
                                  if($tampilPenjualan['status_bayar'] === 'Lunas'){
                                    $icon1 = "<i class='fas fa-check-double'></i>";
                                    $blockText = 'Readonly';
                                    $blockOption = 'Disabled';
                                    ?>
                                    <input type="hidden" name="minuman" value="<?echo $tampilPenjualan['id_minuman'];?>">
                                    <input type="hidden" name="staBayar" value="<?echo $tampilPenjualan['status_bayar'];?>">
                                    <?
                                  }else{
                                    $icon1 = "<i class='fas fa-times'></i>";
                                    $blockOption = $blockText = '';
                                  }
                                  ?>
                                  <input type="hidden" name="pilih" value="004">
                                  <input type="hidden" name="idPenjualan" value="<?echo $tampilPenjualan['id_penjualan'];?>">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Perbaharui Data Penjualan</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-3 row">
                                        <label for="minuman" class="col-sm-4 col-form-label">Nama Minuman</label>
                                        <div class="col-sm-8">
                                          <select class="form-select" id="minuman" name="minuman" <?echo $blockOption;?>>
                                            <option selected value="<?php echo $tampilPenjualan['id_minuman'];?>"><?php echo $tampilPenjualan['nama_minuman'];?></option>
                                            <?php
                                            $ambilMinuman1 = mysqli_query($koneksi, "SELECT id_minuman as id, nama_minuman as namaMin FROM minuman;");
                                            if(mysqli_num_rows($ambilMinuman1) > 0){
                                              while($dataMinuman1 = mysqli_fetch_assoc($ambilMinuman1)){
                                                echo "<option value='".$dataMinuman1['id']."'>".$dataMinuman1['namaMin']."</option>";
                                              }
                                            }else{
                                              echo "<option>Tidak Ada Minuman Tersedia</option>";
                                            }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="jml" class="col-sm-4 col-form-label">Qty</label>
                                        <div class="col-sm-8">
                                          <input type="number" class="form-control-plaintext" id="jml" name="jml" <? echo $blockText; ?> value="<?php echo $tampilPenjualan['jumlah'];?>">
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="staBayar" class="col-sm-4 col-form-label">Status Bayar</label>
                                        <div class="col-sm-8">
                                          <select class="form-select" id="staBayar" name="staBayar" <? echo $blockOption; ?>>
                                            <option selected value="<?php echo $tampilPenjualan['status_bayar'];?>"><?php echo $tampilPenjualan['status_bayar'];?></option>
                                            <option value="Belum"> Belum Bayar </option>
                                            <option value="Lunas"> Lunas </option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </td>
                          <?
                          echo "<td>" . $tampilPenjualan['nama_minuman'] ."</td>";
                          echo "<td>" . $tampilPenjualan['jumlah'] ."</td>";
                          echo "<td>" . rupiah($tampilPenjualan['harga_jual']) ."</td>";
                          echo "<td>" . rupiah($total) ."</td>";
                          echo "<td>" . $tampilPenjualan['status_bayar']." ".$icon1 ."</td>";
                          echo "</tr>";
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div> <!-- card -->
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
  $(document).ready(function() {
    var table = $('#penjualan').DataTable({
      responsive: true,
      lengthChange: false,
      buttons: ['colvis', 'pdf', 'csv']
    });

    table.buttons().container()
    .appendTo('#penjualan_wrapper .col-md-6:eq(0)');

  });

  </script>

</body>

</html>
