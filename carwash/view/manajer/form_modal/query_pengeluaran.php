<?php
$danger = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>Mohon Maaf.</strong> Data Pengeluaran Yang Anda Masukan Tidak Lengkap. Silahkan Isi Kembali Data Pengeluaran!
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";
$warning = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Mohon Maaf.</strong> Data Yang Anda Masukan Tidak Sesuai Dengan Format Yang Ditentukan. Silahkan Isi Kembali Data Pengeluaran!
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";
$success = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Selamat.</strong> Data Pengeluaran Yang Anda Masukan Telah Ditambahkan.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";


$sampai = date('Y-m-d');
$dari = $hariMin14;

$dari1 = $hariMin14;
$sampai1 = date('Y-m-d');

$dari2 = date('Y-m-d');
$sampai2 = date('Y-m-d');

$dari3 = $hariMin14;
$sampai3 = date('Y-m-d');


// seleksi form
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if($_POST['pilih']=="satu"){
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $ket = $_POST['ket'];
    $id = "300".$waktuLengkap;
    $idTRX = "103".$id;
    $keterangan = 'Pengeluaran';
    $inputPengeluaran = mysqli_query($koneksi, "INSERT into pengeluaran VALUES ('$id','$jenis',$jumlah,'$waktuLengkap','$ket','$waktuLengkap')");
    if($inputPengeluaran == TRUE){
      $inputTRX = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('$idTRX', null, null, '$id', $jumlah, '$keterangan', '$waktuLengkap')");
      if($inputTRX == TRUE){
        echo $success;
      }else {
        echo $warning;
      }
    }else{
      echo $warning;
    }
  }elseif ($_POST['pilih']=="dua") {
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];
    // code...
  }elseif ($_POST['pilih']=="tiga") {
    // code...
    $dari2 = $_POST['dari2'];
    $sampai2 = $_POST['sampai2'];
  }elseif ($_POST['pilih']=="empat") {
    // code...
    $dari3 = $_POST['dari3'];
    $sampai3 = $_POST['sampai3'];
  }
}


//data pendapatan

$ambilPendapatan = mysqli_query($koneksi, "SELECT keterangan as ket, SUM(jumlah) as jml
FROM transaksi WHERE waktu_transaksi BETWEEN '$dari3'
AND '$sampai3' GROUP BY keterangan ORDER BY keterangan");
$a = 0;
while($tampilPendapatan = mysqli_fetch_assoc($ambilPendapatan)){
	$b = 0;
	$arrPendapatan [$a][$b] = $tampilPendapatan['ket'] ;
	$b++;
	$arrPendapatan [$a][$b] = $tampilPendapatan['jml'];
	$a++;
}

$nPendapatan = count($arrPendapatan);

//pengeluaran

$ambilPengeluaran = mysqli_query($koneksi, "SELECT jenis_pengeluaran as jenPeng, SUM(jumlah_pengeluaran) as jmlPeng
FROM pengeluaran WHERE tanggal BETWEEN '$dari3' and '$sampai3'
GROUP BY jenis_pengeluaran ORDER BY jenis_pengeluaran ");
$a=0;
while($tampilPengeluaran = mysqli_fetch_assoc($ambilPengeluaran)){
	$b = 0;
	$arrPengeluaran [$a][$b] = $tampilPengeluaran['jmlPeng'] ;
	$b++;
	$arrPengeluaran [$a][$b] = $tampilPengeluaran['jenPeng'];
	$a++;
}


//pendapatan bersih
$pendaptanBersih = $arrPendapatan[0][1] - $arrPendapatan[1][1];

//total Pengeluaran
$t = 0;
$totalPengeluaran = 0;
while($t < count($arrPengeluaran)){
	$totalPengeluaran = $totalPengeluaran + $arrPengeluaran[$t][0];
	$t++;
}

//QUERY BUAT GRAFIK PENDAPATAN
$ambilPendapatan = mysqli_query($koneksi,"SELECT sum(jumlah), waktu_transaksi from transaksi
WHERE waktu_transaksi between '$dari' AND '$sampai' AND
keterangan = 'Pendapatan' GROUP BY waktu_transaksi");

$a = 0;
while ($tampil = mysqli_fetch_array($ambilPendapatan)) {
  // code...
  $b = 0;
  $pendapatan[$a][$b]= $tampil[1];
  $b++;
  $pendapatan[$a][$b]= $tampil[0];
  $a++;
}

$ambilPengeluaran = mysqli_query($koneksi, "SELECT sum(jumlah), waktu_transaksi from transaksi
WHERE waktu_transaksi between '$dari' AND '$sampai' AND
keterangan = 'Pengeluaran' GROUP BY waktu_transaksi");

$a = 0;
while ($tampil1 = mysqli_fetch_array($ambilPengeluaran)) {
  // code...
  $b = 2;
  $pendapatan[$a][$b]= $tampil1[0];
  $a++;
}


//query buat timeline

$result = $koneksi->query("SELECT SUM(transaksi.jumlah) as jml, pengeluaran.jenis_pengeluaran as jenis, pengeluaran.tanggal as tgl, pengeluaran.keterangan as ket
from transaksi inner join pengeluaran on pengeluaran.id_pengeluaran = transaksi.id_pengeluaran
WHERE pengeluaran.tanggal between '$dari2' AND '$sampai2'
GROUP BY pengeluaran.jenis_pengeluaran, transaksi.waktu_transaksi ORDER BY pengeluaran.tanggal DESC");


$a = 0;
while ($tampil = mysqli_fetch_array($result)) {
// code...
$b = 0;
$dataPengeluaran[$a][$b] = $tampil[2];
$b++;
$dataPengeluaran[$a][$b] = $tampil[1];
$b++;
$dataPengeluaran[$a][$b] = $tampil[0];
$b++;
$dataPengeluaran[$a][$b] = $tampil[3];
$a++;
}

$queryPendapatan = $koneksi->query("SELECT SUM(jumlah) as jumlah, waktu_transaksi as tgl, keterangan from transaksi
where keterangan = 'Pendapatan'  AND waktu_transaksi between '$dari2' AND '$sampai2'
GROUP BY waktu_transaksi ORDER BY waktu_transaksi DESC");

$c = 0;
while ($tampilPendapatan = mysqli_fetch_array($queryPendapatan)) {
// code...
$d = 0;
$dataPendapatan[$c][$d] = $tampilPendapatan[1];
$d++;
$dataPendapatan[$c][$d] = $tampilPendapatan[2];
$d++;
$dataPendapatan[$c][$d] = $tampilPendapatan[0];
$c++;
}

?>
