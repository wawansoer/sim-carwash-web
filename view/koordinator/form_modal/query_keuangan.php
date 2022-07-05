<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
  if($_POST['pilih']==="001"){
    $jenis = $_POST['jenis']; $jml = $_POST['jumlah']; $ket = $_POST['ket'];
    $idPeng = "300".$idWaktu;
    $koneksi -> autocommit(FALSE);
    $inputPeng = mysqli_query($koneksi, "INSERT INTO pengeluaran VALUES ('$idPeng','$jenis', $jml, '$tanggal','$ket','$waktuLengkap')");
    if($inputPeng === TRUE){
      $idTRX = "103".$idPeng;
      $inputTRX = mysqli_query($koneksi, "INSERT INTO transaksi values ('$idTRX',null,null, '$idPeng',$jml,'Pengeluaran','$tanggal')");
      if($inputTRX === TRUE){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Selamat !</strong> Berhasil Menambahkan Data Pengeluaran.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Mohon Maaf !</strong> Gagal Input Data Pengeluaran. Silahkan Cek Kembali Inputan Anda !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    }else{
      $koneksi -> rollback();
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Mohon Maaf !</strong> Gagal Input Data Pengeluaran. Silahkan Cek Kembali Inputan Anda !
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  }
}

$ambilPendapatan = mysqli_query($koneksi, "SELECT SUM(jumlah_bayar) as totalPendapatan from cuci
where waktu_bayar between '$tanggal 00:00' AND '$tanggal 23:59:59'
AND status_bayar ='SUDAH'");
if (mysqli_num_rows($ambilPendapatan) > 0) {
  while ($dataPendapatan = mysqli_fetch_assoc($ambilPendapatan)) {
    $pendapatan = $dataPendapatan['totalPendapatan'];
  }
} else {
  $pendapatan = 0;
}

$modal = 150000;

$ambilPenjualan = mysqli_query($koneksi, "SELECT SUM(total) as totalPenjualan from penjualan
WHERE waktu between '$tanggal 00:00' AND '$tanggal 23:59:59'
AND status_bayar ='Lunas'");
if (mysqli_num_rows($ambilPenjualan) > 0) {
  while ($dataPenjualan = mysqli_fetch_assoc($ambilPenjualan)) {
    $penjualan = $dataPenjualan['totalPenjualan'];
  }
} else {
  $penjualan = 0;
}

$ambilPanjar = mysqli_query($koneksi, "SELECT SUM(jumlah) as total from gaji_karyawan
left join jenis_trx on jenis_trx.id_trx  = gaji_karyawan.id_trx
WHERE jenis_trx.id_trx = 'OUT221' AND gaji_karyawan.tanggal = '$tanggal'");

if (mysqli_num_rows($ambilPanjar) > 0) {
  while ($totalPanjar = mysqli_fetch_assoc($ambilPanjar)) {
    if (is_null($totalPanjar['total'])) {
      $panjar = 0;
    } else {
      $panjar = $totalPanjar['total'];
    }
  }
}

$ambilPengeluaran = mysqli_query($koneksi, "SELECT SUM(jumlah_pengeluaran) as total FROM pengeluaran
WHERE jenis_pengeluaran = 'Bonus Karyawan' OR jenis_pengeluaran = 'Lainnya'
AND tanggal = '$tanggal'");
if (mysqli_num_rows($ambilPengeluaran) > 0) {
  while ($totalPengeluaran = mysqli_fetch_assoc($ambilPengeluaran)) {
    if (is_null($totalPengeluaran['total'])) {
      $pengeluaran = 0;
    } else {
      $pengeluaran = $totalPengeluaran['total'];
    }
  }
}
?>
