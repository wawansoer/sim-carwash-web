<?

$sekarang = date("Y-m-d");
$awal_bulan = date("Y-m-01");
$minusTujuh_hari = mktime(0,0,0,date("n"),date("j")-7,date("Y"));
$rangeHari = date("Y-m-d", $minusTujuh_hari);

$day = date('D', strtotime($sekarang));
$dayList = array(
	'Sun' => '7',
	'Mon' => '1',
	'Tue' => '2',
	'Wed' => '3',
	'Thu' => '4',
	'Fri' => '5',
	'Sat' => '6'
);

$ambilMobil = mysqli_query($koneksi, "SELECT count(id_kategori_cuci)as mobil, tanggal FROM cuci
										WHERE id_kategori_cuci like '12%'
										AND tanggal BETWEEN '$rangeHari' and '$sekarang'
										GROUP BY tanggal order by tanggal");
$a = 0;
while($tampilMobil = mysqli_fetch_assoc($ambilMobil)){
	$b = 0;
	$day = date('D', strtotime($tampilMobil['tanggal']));
	$dayList = array(
		'Sun' => '7',
		'Mon' => '1',
		'Tue' => '2',
		'Wed' => '3',
		'Thu' => '4',
		'Fri' => '5',
		'Sat' => '6'
	);

	$hari = array(
		'Sun' => 'Ahad',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	$dataMobil[$a][$b] = $dayList[$day];
	$b++;
	$dataMobil[$a][$b] = $tampilMobil['mobil'] ;
	$b++;
	$x = intval($dayList[$day]);
	$dataMobil[$a][$b] = pow($x,2);
	$b++;
	$y = intval($tampilMobil['mobil']);
	$dataMobil[$a][$b] = pow($y,2);
	$b++;
	$dataMobil[$a][$b] = $x * $y;
	$b++;
	$dataMobil[$a][$b] = $hari[$day];
	$a++;
}


$n = count($dataMobil)-1;
$t = 0;
$totalX =  $totalY =  $totalX2 =  $totalY2 = $totalXY = 0;
while($t < $n) {
	$totalX = $totalX + $dataMobil[$t][0];
	$totalY = $totalY + $dataMobil[$t][1];
	$totalX2 = $totalX2 + $dataMobil[$t][2];
	$totalY2 = $totalY2 + $dataMobil[$t][3];
	$totalXY = $totalXY + $dataMobil[$t][4];
	$t++;
}

$aAtas = ($totalY * $totalX2) - ($totalX * $totalXY);
$aBawah = ($n * $totalX2) - pow($totalX,2);

$hasila = $aAtas/$aBawah;

$bAtas = ($n * $totalXY) - ($totalX * $totalY);
$bBawah = ($n * $totalX2) - ($totalX2);

$hasilB = $bAtas/$bBawah;

$prediksiMobil = intval($hasila + ($hasilB*$dayList[$day]));


//prakiraan motor
$ambilMotor = mysqli_query($koneksi, "SELECT count(id_kategori_cuci)as motor, tanggal FROM cuci
										WHERE id_kategori_cuci like '11%'
										AND tanggal BETWEEN '$rangeHari' and '$sekarang'
										GROUP BY tanggal order by tanggal");
$a = 0;
while($tampilMotor = mysqli_fetch_assoc($ambilMotor)){
	$b = 0;
	$day = date('D', strtotime($tampilMotor['tanggal']));
	$dayList = array(
		'Sun' => '7',
		'Mon' => '1',
		'Tue' => '2',
		'Wed' => '3',
		'Thu' => '4',
		'Fri' => '5',
		'Sat' => '6'
	);

	$hari = array(
		'Sun' => 'Ahad',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	$dataMotor[$a][$b] = $dayList[$day];
	$b++;
	$dataMotor[$a][$b] = $tampilMotor['motor'] ;
	$b++;
	$x = intval($dayList[$day]);
	$dataMotor[$a][$b] = pow($x,2);
	$b++;
	$y = intval($tampilMotor['motor']);
	$dataMotor[$a][$b] = pow($y,2);
	$b++;
	$dataMotor[$a][$b] = $x * $y;
	$b++;
	$dataMotor[$a][$b] = $hari[$day];
	$a++;
}


$nMotor = count($dataMotor)-1;
$t = 0;
$totalX =  $totalY =  $totalX2 =  $totalY2 = $totalXY = 0;
while($t < $nMotor) {
	$totalX = $totalX + $dataMotor[$t][0];
	$totalY = $totalY + $dataMotor[$t][1];
	$totalX2 = $totalX2 + $dataMotor[$t][2];
	$totalY2 = $totalY2 + $dataMotor[$t][3];
	$totalXY = $totalXY + $dataMotor[$t][4];
	$t++;
}

$aAtas = ($totalY * $totalX2) - ($totalX * $totalXY);
$aBawah = ($n * $totalX2) - pow($totalX,2);

$hasila = $aAtas/$aBawah;

$bAtas = ($n * $totalXY) - ($totalX * $totalY);
$bBawah = ($n * $totalX2) - ($totalX2);

$hasilB = $bAtas/$bBawah;

$prediksiMotor = intval($hasila + ($hasilB*$dayList[$day])) ;

//data pendapatan

$bulan = date('Y-m');

$ambilPendapatan = mysqli_query($koneksi, "SELECT SUM(jumlah) as pendapatan, keterangan from transaksi WHERE waktu_transaksi like '$bulan%' GROUP by keterangan");
$a = 0;
while($tampilPendapatan = mysqli_fetch_assoc($ambilPendapatan)){
	$b = 0;
	$arrPendapatan [$a][$b] = $tampilPendapatan['keterangan'] ;
	$b++;
	$arrPendapatan [$a][$b] = $tampilPendapatan['pendapatan'];
	$a++;
}

$nPendapatan = count($arrPendapatan);

//pengeluaran

$ambilPengeluaran = mysqli_query($koneksi, "SELECT SUM(jumlah_pengeluaran) as jumlah, jenis_pengeluaran as jenis FROM pengeluaran
WHERE tanggal like '$bulan%' GROUP BY jenis_pengeluaran");
$a=0;
while($tampilPengeluaran = mysqli_fetch_assoc($ambilPengeluaran)){
	$b = 0;
	$arrPengeluaran [$a][$b] = $tampilPengeluaran['jumlah'] ;
	$b++;
	$arrPengeluaran [$a][$b] = $tampilPengeluaran['jenis'];
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

//pemakaian bahan Baku

$ambilCuci = mysqli_query($koneksi, "SELECT count(cuci.id_cuci) as qty, jenis.nama_jenis as jenis
FROM cuci INNER JOIN kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
INNER JOIN jenis on kategori_cuci.id_jenis = jenis.id_jenis
WHERE cuci.tanggal between '$awal_bulan' AND '$sekarang'
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
WHERE pemakaian_bahan_baku.tanggal BETWEEN '$awal_bulan' AND '$sekarang'
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
