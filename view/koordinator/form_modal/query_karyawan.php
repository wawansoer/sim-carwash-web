<?php
$hari_ini = date("Y-m-d");
$tgl_pertama = date('Y-m-01', strtotime($hari_ini));
$tgl_terakhir = date('Y-m-d', strtotime($hari_ini));

$tgl_pertama1 = date('Y-m-d', strtotime($hari_ini));
$tgl_terakhir1 = date('Y-m-d', strtotime($hari_ini));
$nik1 = 0;

if ($_SERVER['REQUEST_METHOD'] === "POST"){
  if($_POST['pilih'] === "001"){
    $tgl_pertama = $_POST['dari'];
    $tgl_terakhir = $_POST['sampai'];
  }elseif($_POST['pilih'] === "002"){
    $tgl_pertama1 = $_POST['dari1'];
    $tgl_terakhir1 = $_POST['sampai1'];
    $nik1 = $_POST['nik1'];
  }elseif($_POST['pilih'] === "003"){
    $nik = $_POST['nik2'];
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama_lengkap'];

    $updateJabatan = mysqli_query($koneksi, "UPDATE pengguna set id_jabatan = '$jabatan' WHERE nik = '$nik'");
    if($updateJabatan == TRUE){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Selamat.</strong> Jabatan ".$nama." Berhasil Diperbaharui.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf.</strong> Tidak Dapat Merubah Jabatan ".$nama.".
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
  }elseif($_POST['pilih'] === "004"){
    $nik = $_POST['nik2'];
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama_lengkap'];

    $updateJabatan = mysqli_query($koneksi, "UPDATE pengguna set id_jabatan = '$jabatan' WHERE nik = '$nik'");
    if($updateJabatan == TRUE){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Selamat.</strong> Jabatan ".$nama." Berhasil Diperbaharui.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf.</strong> Tidak Dapat Merubah Jabatan ".$nama.".
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
  }
}

$ambilStatistik = mysqli_query($koneksi, "select karyawan.nama_panggilan as nama, count(cuci.id_cuci) as jml, jenis.nama_jenis as jen,
                                            AVG(cuci.rating) as rerata FROM cuci INNER join karyawan on karyawan.nik = cuci.nik
                                            INNER join kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
                                            INNER join jenis on jenis.id_jenis = kategori_cuci.id_jenis
                                            INNER join pengguna on pengguna.nik = karyawan.nik
                                            WHERE cuci.tanggal between '$tgl_pertama' AND '$tgl_terakhir'
                                            AND pengguna.id_jabatan = '1004'
                                            GROUP by cuci.nik, jenis.nama_jenis");

if(mysqli_num_rows($ambilStatistik)>0){
    $x=0;
    $nama = '';
    $jenis = '';
    while($tampilStatistik = mysqli_fetch_assoc($ambilStatistik)){
        if($nama === $tampilStatistik['nama']){
            $dataStatistik[$x][3] = $tampilStatistik['jml'];
            $dataStatistik[$x][4] = $tampilStatistik['rerata'];
            $x++;
            $nama = $tampilStatistik['nama'];
        }else{
            if($tampilStatistik['jen'] === 'Mobil'){
                $dataStatistik[$x][0] = $tampilStatistik['nama'];
                $dataStatistik[$x][1] = $tampilStatistik['jml'];
                $dataStatistik[$x][2] = $tampilStatistik['rerata'];
            }else{
                $dataStatistik[$x][3] = $tampilStatistik['jml'];
                $dataStatistik[$x][4] = $tampilStatistik['rerata'];
            }

            $nama = $tampilStatistik['nama'];
        }
    }
}


  if($nik1 == 0){
    $uiRiwayat = 0;
  }else{
    $uiRiwayat = 1;
  }

?>
