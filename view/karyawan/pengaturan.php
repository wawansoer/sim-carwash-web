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
          <? include 'form_modal/query_pengaturan.php';?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-dark card-outline">
                <div class="card-body box-profile">

                  <h3 class="profile-username text-center"><?echo $namaLengkap;?></h3>

                  <p class="text-muted text-center"><?echo $jabatan;?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b><?echo $hasil[0][0];?></b> <a class="float-right"><?echo $hasil[0][1];?></a>
                    </li>
                    <li class="list-group-item">
                      <b><?echo $hasil[1][0];?></b> <a class="float-right"><?echo $hasil[1][1];?></a>
                    </li>
                  </ul>
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="pilih" value="001">
                    <input type="hidden" name="nik" value="<?echo$nik;?>">
                    <div class="input-group input-group-lg input-group-sm input-group-md">
                      <span class="input-group-text" id="inputGroup-sizing-lg">Status</span>
                      <select class="form-select" aria-label="Default select example" name="status">
                        <option selected value="<?echo $status;?>"><?echo $status;?></option>
                        <option value="AKTIF">Aktif</option>
                        <option value="ISTIRAHAT">Istirahat</option>
                        <option value="LIBUR">Libur</option>
                      </select>
                      <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ubah Sandi</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- profil -->
                      <form class="form-horizontal" id="karyawan" name="karyawan" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="pilih" value="002">
                        <input type="hidden" name="nik" value="<?echo$nik;?>">
                        <div class="form-group row">
                          <label for="namaPanggilan" class="col-sm-4 col-form-label">Nama Penggilan</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="namaPanggilan" name="namaPanggilan" value="<?echo$namaPanggilan;?>" pattern="[A-Za-z]{3,10}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?echo$alamat;?>" required pattern="[A-Za-z0-9.]+{10,50}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="<?echo$email;?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="noKontak" class="col-sm-4 col-form-label">Nomor Kontak</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="noKontak" name="noKontak" value="<?echo$noKontak;?>" required pattern="[0-9]{10,13}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tanya" class="col-sm-4 col-form-label">Pertanyaan Keamanan</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="tanya" name="tanya">
                              <option selected value="<?echo $pertanyaan;?>"> <?echo $pertanyaan;?> </option>
                              <option>Siapa Nama Panggilan Peliharaan Anda?</option>
                              <option>Apa Makanan Favorit Anda?</option>
                              <option>Dimana Anda Dilahirkan?</option>
                              <option>Berapa Angka Favorit Anda?</option>
                              <option>Apa Warna Favorit Anda?</option>
                              <option>Siapa Guru Favorit Anda Waktu SMA?</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="jawab" class="col-sm-4 col-form-label">Jawaban</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="jawab" name="jawab" value="<?echo $jawaban;?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="sandi" class="col-sm-4 col-form-label">Sandi</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="sandi1" name="sandi" required pattern="{8.50}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="pilih" value="003">
                        <input type="hidden" name="nik" value="<?echo$nik;?>">
                        <div class="form-group row">
                          <label for="sandi" class="col-sm-4 col-form-label">Sandi Lama</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="sandi" name="sandi" required pattern="{8.50}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="sandiBaru" class="col-sm-4 col-form-label">Sandi Baru</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="sandiBaru" name="sandiBaru" required pattern="{8.50}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="sandiBaru1" class="col-sm-4 col-form-label">Sandi Lama</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" id="sandiBaru1" name="sandiBaru1" required pattern="{8.50}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
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

</body>

</html>
