<?php
include "shortcut/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash | Koordinator | Dashboard</title>
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
          <?php include "form_modal/query_dashboard.php"; ?>
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
          <!-- Jumlah Mobil & motor  -->
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
              <?
              $ambilJmlMobil = mysqli_query($koneksi, "SELECT jenis.nama_jenis as jenis, COUNT(cuci.id_cuci) as jml from cuci
              INNER join kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
              INNER join jenis on kategori_cuci.id_jenis = jenis.id_jenis
              WHERE cuci.tanggal between '$tanggal' AND '$tanggal' AND jenis.nama_jenis = 'Mobil'
              AND cuci.nik = '$nik'");
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
                WHERE cuci.tanggal between '$tanggal' AND '$tanggal' AND jenis.nama_jenis = 'Motor' AND cuci.nik = '$nik'");
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
                  <span class="info-box-text">Motor Masuk Hari Ini</span>
                  <span class="info-box-number"><? echo $dataMotor;?></span>
                </div> <!-- /.info-box-content -->
              </div> <!-- /.info-box -->
            </div> <!-- /.col -->
          </div> <!-- /.row -->
          <!-- tabel kendaraan cuci -->
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
          <div class="row">
            <!-- tabel kendaraan cuci -->
            <div class="col-md-12 col-sm-12 col-12">
              <div class="card card-info">
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
                  <table class="table table-striped" id="tabelCuci">
                    <thead>
                      <tr>
                        <th>Aksi</th>
                        <th>#</th>
                        <th>Nopol</th>
                        <th>Kendaraan</th>
                        <th>Petugas</th>
                        <th>Jumlah Bayar</th>
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
                        where cuci.tanggal between '$tanggal' and '$tanggal' AND cuci.status_bayar ='BELUM'
                        ORDER by cuci.waktu_bayar desc");

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

                          echo "<tr>";

                          ?>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?echo $tampilCuci['idcuci'];?>">
                              <i class="fas fa-edit"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="edit<?echo $tampilCuci['idcuci'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <form id="kendaraanForm" name="kendaraanForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                  <?
                                  if($tampilCuci['staKerja'] === 'SELESAI'){
                                    echo "<input type='hidden' name='petugas' value='".$tampilCuci['nik']."'>";
                                    echo "<input type='hidden' name='staKerja' value='".$tampilCuci['staKerja']."'>";
                                  }

                                  if($tampilCuci['staBayar'] === 'SUDAH'){
                                    echo "<input type='hidden' name='staBayar' value='".$tampilCuci['staBayar']."'>";
                                  }
                                  ?>
                                  <input type="hidden" name="pilih" value="003">
                                  <input type="hidden" name="idCuci" value="<?echo $tampilCuci['idcuci'];?>">
                                  <input type="hidden" name="upah" value="<?echo $tampilCuci['upah'];?>">
                                  <input type="hidden" name="bayar" value="<?echo $tampilCuci['bayar'];?>">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Perbaharui Data Cuci</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-3 row">
                                        <label for="nopol" class="col-sm-4 col-form-label">Nomor Polisi</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control-plaintext" id="nopol" name="nopol" <? echo $blokText; ?> value="<?php echo $tampilCuci['nopol'];?>">
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="namaKendaraan" class="col-sm-4 col-form-label">Nama Kendaraan</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control-plaintext" id="namaKendaraan" name="namaKendaraan" <? echo $blokText; ?> value="<?php echo $tampilCuci['kendaraan'];?>">
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="petugas" class="col-sm-4 col-form-label">Petugas Cuci</label>
                                        <div class="col-sm-8">
                                          <select class="form-select" id="petugas" name="petugas" <?echo $blokKerja;?>>
                                            <option selected value="<?php echo $tampilCuci['nik'];?>"><?php echo $tampilCuci['petugas'];?></option>
                                            <?php
                                            $ambilKaryawan1 = mysqli_query($koneksi, "SELECT karyawan.nik as nik, karyawan.nama_panggilan as nama from karyawan
                                              inner join pengguna on pengguna.nik = karyawan.nik
                                              where karyawan.status = 'AKTIF' AND pengguna.id_jabatan = '1004'");
                                              if(mysqli_num_rows($ambilKaryawan1) > 0){
                                                while($dataKaryawan1 = mysqli_fetch_assoc($ambilKaryawan1)){
                                                  echo "<option value='".$dataKaryawan1['nik']."'>".$dataKaryawan1['nama']."</option>";
                                                }
                                              }else{
                                                echo "<option>Tidak Ada Karyawan</option>";
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="mb-3 row">
                                          <label for="jmlBayar" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control-plaintext" id="jmlBayar" name="jmlBayar" value="<?php echo rupiah($tampilCuci['bayar']);?>">
                                          </div>
                                        </div>
                                        <div class="mb-3 row">
                                          <label for="staBayar" class="col-sm-4 col-form-label">Status Bayar</label>
                                          <div class="col-sm-8">
                                            <select class="form-select" id="staBayar" name="staBayar" <? echo $blokBayar; ?>>
                                              <option selected value="<?php echo $tampilCuci['staBayar'];?>"><?php echo $tampilCuci['staBayar'];?></option>
                                              <option value="BELUM"> BELUM BAYAR </option>
                                              <option value="SUDAH"> SUDAH BAYAR </option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="mb-3 row">
                                          <label for="staKerja" class="col-sm-4 col-form-label">Status Kerja</label>
                                          <div class="col-sm-8">
                                            <select class="form-select" id="staKerja" name="staKerja" <?echo $blokKerja;?>>
                                              <option selected value="<?php echo $tampilCuci['staKerja'];?>"><?php echo $tampilCuci['staKerja'];?></option>
                                              <option value="PROSES"> PROSES KERJA </option>
                                              <option value="BATAL"> BATAL </option>
                                              <option value="SELESAI"> SELESAI </option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="mb-3 row">
                                          <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control-plaintext" id="ket" name="ket" value="<?php echo $tampilCuci['ket'];?>">
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
                            echo "<td>" . $icon ."</td>";
                            echo "<td>" . $tampilCuci['nopol'] ."</td>";
                            echo "<td>" . $tampilCuci['kendaraan'] ."</td>";
                            echo "<td>" . $tampilCuci['petugas'] ."</td>";
                            echo "<td>" . rupiah($tampilCuci['bayar']) ."</td>";
                            echo "<td>" . tgl_indo($tampilCuci['tgl']) ."</td>";
                            echo "<td>" . $tampilCuci['staBayar']." ".$icon1 ."</td>";
                            echo "<td>" . $tampilCuci['staKerja']." ".$icon2 ."</td>";
                            echo "</tr>";
                          }
                          ?>

                        </tbody>
                      </table>
                    </div><!-- /.card-body -->
                  </div> <!-- card -->
                </div><!-- col -->
              </div> <!-- row -->
              <!--tabel penjualan -->
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
