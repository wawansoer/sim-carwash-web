<?php
$hari_ini = date("Y-m-d");
$dari = date('Y-m-01', strtotime($hari_ini));
$sampai = date('Y-m-t', strtotime($hari_ini));

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if($_POST['pilih']=="001"){
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];
  }
}

$bahanBaku = mysqli_query($koneksi, "SELECT bahan_baku.nama_bahan_baku as nama,
                          SUM(pemakaian_bahan_baku.jumlah) as jumlah
                          FROM pemakaian_bahan_baku  left join bahan_baku
                          on bahan_baku.id_bahan_baku = pemakaian_bahan_baku.id_bahan_baku
                          WHERE tanggal BETWEEN '$dari' AND '$sampai'
                          GROUP BY bahan_baku.id_bahan_baku ORDER BY bahan_baku.id_bahan_baku");
if(mysqli_num_rows($bahanBaku)>0){
  $x = 0;
  while ($dataBahan = mysqli_fetch_assoc($bahanBaku)) {
    // code...
    $pemakaianBahan[$x][0] = $dataBahan['nama'];
    $pemakaianBahan[$x][1] = $dataBahan['jumlah'];
    $x++;
  }
}else{
  $pemakaianBahan[0][0] = "Tidak Ada Data Pemakaian Bahan Baku";
  $pemakaianBahan[0][1] = 0;
}

//pemakaian bahan_baku
$ambilCuci = mysqli_query($koneksi, "SELECT count(cuci.id_cuci) as qty, jenis.nama_jenis as jenis
FROM cuci INNER JOIN kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
INNER JOIN jenis on kategori_cuci.id_jenis = jenis.id_jenis
WHERE cuci.tanggal between '$dari' AND '$sampai'
GROUP BY jenis.nama_jenis ORDER by cuci.tanggal, jenis.nama_jenis");

$arrCuci = 0;
while ($tampilCuci = mysqli_fetch_assoc($ambilCuci)) {
  // code...
  $dataCuci[$arrCuci][0] = $tampilCuci['jenis'];
  $dataCuci[$arrCuci][1] = $tampilCuci['qty'];
  $arrCuci++;
}


$ambilPemakaian = mysqli_query($koneksi, "SELECT SUM(pemakaian_bahan_baku.jumlah) as jml, bahan_baku.nama_bahan_baku as nama, bahan_baku.satuan as satuan,
  bahan_baku.harga as harga, bahan_baku.jumlah as qty
from pemakaian_bahan_baku INNER JOIN bahan_baku ON
pemakaian_bahan_baku.id_bahan_baku = bahan_baku.id_bahan_baku
WHERE pemakaian_bahan_baku.tanggal BETWEEN '$dari' AND '$sampai'
GROUP BY pemakaian_bahan_baku.id_bahan_baku");

$arrBahan = 0;
while($tampilPemakaian = mysqli_fetch_assoc($ambilPemakaian)){
  $dataPemakaian[$arrBahan][0] = $tampilPemakaian['nama'];
  $dataPemakaian[$arrBahan][1] = $tampilPemakaian['satuan'];
  $dataPemakaian[$arrBahan][2] = $tampilPemakaian['qty'];
  $dataPemakaian[$arrBahan][3] = $tampilPemakaian['harga'];
  $dataPemakaian[$arrBahan][4] = $tampilPemakaian['jml'];
  $arrBahan++;
}

$jmlKendaraan = $dataCuci[0][1] + ($dataCuci[1][1]/2);

$a = 0;
while ($a < count($dataPemakaian)) {
  $pemakaian = ($dataPemakaian[$a][4]* $dataPemakaian[$a][2]) / $jmlKendaraan;
  $modal = ($dataPemakaian[$a][4]* $dataPemakaian[$a][3]) / $jmlKendaraan;
  $hasilPemakaian[$a][0] = $dataPemakaian[$a][0];
  $hasilPemakaian[$a][1] = $dataPemakaian[$a][1];
  $hasilPemakaian[$a][2] = $pemakaian;
  $hasilPemakaian[$a][3] = $modal;

  $a++;
}
?>
