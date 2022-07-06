<?

$sekarang = date("Y-m-d");
$awal_bulan = date("Y-m-01");
$minusTujuh_hari = mktime(0, 0, 0, date("n"), date("j") - 7, date("Y"));
$rangeHari = date("Y-m-d", $minusTujuh_hari);

$awal = $rangeHari;
$akhir = date("Y-m-d");

$awal1 = $rangeHari;
$akhir1 = date("Y-m-d");

$awal2 = date("Y-m-d");
$akhir2 = date("Y-m-d");

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
//seleksi inputan tanggal
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if ($_POST['pilih'] === "001") {
		$awal = $_POST['awal'];
		$akhir = $_POST['akhir'];
	} elseif ($_POST['pilih'] === "002") {
		$awal1 = $_POST['awal1'];
		$akhir1 = $_POST['akhir1'];
	} elseif ($_POST['pilih'] === "003") {
		$awal2 = $_POST['awal2'];
		$akhir2 = $_POST['akhir2'];
	}
}

//prakiraan mobil
$ambilMobil = mysqli_query($koneksi, "SELECT count(id_kategori_cuci)as mobil, tanggal FROM cuci
WHERE id_kategori_cuci like '12%'
AND tanggal BETWEEN '$rangeHari' and '$sekarang'
GROUP BY tanggal order by tanggal");
$a = 0;
while ($tampilMobil = mysqli_fetch_assoc($ambilMobil)) {
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
	$dataMobil[$a][$b] = $tampilMobil['mobil'];
	$b++;
	$x = intval($dayList[$day]);
	$dataMobil[$a][$b] = pow($x, 2);
	$b++;
	$y = intval($tampilMobil['mobil']);
	$dataMobil[$a][$b] = pow($y, 2);
	$b++;
	$dataMobil[$a][$b] = $x * $y;
	$b++;
	$dataMobil[$a][$b] = $hari[$day];
	$a++;
}


$n = count($dataMobil) - 1;
$t = 0;
$totalX =  $totalY =  $totalX2 =  $totalY2 = $totalXY = 0;
while ($t < $n) {
	$totalX = $totalX + $dataMobil[$t][0];
	$totalY = $totalY + $dataMobil[$t][1];
	$totalX2 = $totalX2 + $dataMobil[$t][2];
	$totalY2 = $totalY2 + $dataMobil[$t][3];
	$totalXY = $totalXY + $dataMobil[$t][4];
	$t++;
}

$aAtas = ($totalY * $totalX2) - ($totalX * $totalXY);
$aBawah = ($n * $totalX2) - pow($totalX, 2);

$hasila = $aAtas / $aBawah;

$bAtas = ($n * $totalXY) - ($totalX * $totalY);
$bBawah = ($n * $totalX2) - ($totalX2);

$hasilB = $bAtas / $bBawah;

$prediksiMobil = intval($hasila + ($hasilB * $dayList[$day]));


//prakiraan motor
$ambilMotor = mysqli_query($koneksi, "SELECT count(id_kategori_cuci)as motor, tanggal FROM cuci
WHERE id_kategori_cuci like '11%'
AND tanggal BETWEEN '$rangeHari' and '$sekarang'
GROUP BY tanggal order by tanggal");
$a = 0;
while ($tampilMotor = mysqli_fetch_assoc($ambilMotor)) {
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
	$dataMotor[$a][$b] = $tampilMotor['motor'];
	$b++;
	$x = intval($dayList[$day]);
	$dataMotor[$a][$b] = pow($x, 2);
	$b++;
	$y = intval($tampilMotor['motor']);
	$dataMotor[$a][$b] = pow($y, 2);
	$b++;
	$dataMotor[$a][$b] = $x * $y;
	$b++;
	$dataMotor[$a][$b] = $hari[$day];
	$a++;
}


$nMotor = count($dataMotor) - 1;
$t = 0;
$totalX =  $totalY =  $totalX2 =  $totalY2 = $totalXY = 0;
while ($t < $nMotor) {
	$totalX = $totalX + $dataMotor[$t][0];
	$totalY = $totalY + $dataMotor[$t][1];
	$totalX2 = $totalX2 + $dataMotor[$t][2];
	$totalY2 = $totalY2 + $dataMotor[$t][3];
	$totalXY = $totalXY + $dataMotor[$t][4];
	$t++;
}

$aAtas = ($totalY * $totalX2) - ($totalX * $totalXY);
$aBawah = ($n * $totalX2) - pow($totalX, 2);

$hasila = $aAtas / $aBawah;

$bAtas = ($n * $totalXY) - ($totalX * $totalY);
$bBawah = ($n * $totalX2) - ($totalX2);

$hasilB = $bAtas / $bBawah;

$prediksiMotor = intval($hasila + ($hasilB * $dayList[$day]));

// grafik kendaraan cuci

$ambilMobil = mysqli_query($koneksi, "SELECT cuci.tanggal, SUM(IF(jenis.nama_jenis = 'Mobil',1, 0)) as jmlMobil,
SUM(IF(jenis.nama_jenis = 'Motor',1, 0)) as jmlMotor FROM cuci  
left join kategori_cuci on kategori_cuci.id_kategori_cuci  = cuci.id_kategori_cuci
inner  JOIN jenis on kategori_cuci.id_jenis  = jenis.id_jenis 
WHERE cuci.tanggal BETWEEN '$awal' AND '$akhir' 
GROUP BY cuci.tanggal");
if (mysqli_num_rows($ambilMobil) > 0) {
	$x = 0;
	$tgl = 0;
	while ($tampilMobil = mysqli_fetch_assoc($ambilMobil)) {
		// code...
		$dataKendaraan[$x][0] = $tampilMobil['tanggal'];
		$dataKendaraan[$x][1] = $tampilMobil['jmlMobil'];
		$dataKendaraan[$x][2] = $tampilMobil['jmlMotor'];
		$x++;
	}
} else {
}

//data kendaraaan per kategori
// motor
$kategoriMotor = mysqli_query($koneksi, "SELECT kategori.nama_kategori as kat, count(cuci.id_cuci) as jml FROM cuci
Inner join kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
inner join kategori on kategori.id_kategori = kategori_cuci.id_kategori
WHERE cuci.tanggal between '$awal1' AND '$akhir1'
AND cuci.id_kategori_cuci like '11%' GROUP BY kategori.id_kategori");
$x = 0;
if (mysqli_num_rows($kategoriMotor) > 0) {
	while ($kategoriMotor1 = mysqli_fetch_assoc($kategoriMotor)) {
		// code...
		$dataKatMotor[$x][0] = $kategoriMotor1['kat'];
		$dataKatMotor[$x][1] = $kategoriMotor1['jml'];
		$x++;
	}
}

// mobil
$kategoriMobil = mysqli_query($koneksi, "SELECT kategori.nama_kategori as kat, count(cuci.id_cuci) as jml FROM cuci
Inner join kategori_cuci on kategori_cuci.id_kategori_cuci = cuci.id_kategori_cuci
inner join kategori on kategori.id_kategori = kategori_cuci.id_kategori
WHERE cuci.tanggal between '$awal1' AND '$akhir1'
AND cuci.id_kategori_cuci like '12%' GROUP BY kategori.id_kategori");
$x = 0;
if (mysqli_num_rows($kategoriMobil) > 0) {
	while ($kategoriMobil1 = mysqli_fetch_assoc($kategoriMobil)) {
		// code...
		$dataKatMobil[$x][0] = $kategoriMobil1['kat'];
		$dataKatMobil[$x][1] = $kategoriMobil1['jml'];
		$x++;
	}
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
while ($tampilPemakaian = mysqli_fetch_assoc($ambilPemakaian)) {
	$dataPemakaian[$arrBahan][0] = $tampilPemakaian['nama'];
	$dataPemakaian[$arrBahan][1] = $tampilPemakaian['satuan'];
	$dataPemakaian[$arrBahan][2] = $tampilPemakaian['qty'];
	$dataPemakaian[$arrBahan][3] = $tampilPemakaian['harga'];
	$dataPemakaian[$arrBahan][4] = $tampilPemakaian['jml'];
	$arrBahan++;
}

$jmlKendaraan = $dataCuci[0][1] + ($dataCuci[1][1] / 2);

$a = 0;
while ($a < count($dataPemakaian)) {
	$pemakaian = ($dataPemakaian[$a][4] * $dataPemakaian[$a][2]) / $jmlKendaraan;
	$modal = ($dataPemakaian[$a][4] * $dataPemakaian[$a][3]) / $jmlKendaraan;
	$hasilPemakaian[$a][0] = $dataPemakaian[$a][0];
	$hasilPemakaian[$a][1] = $dataPemakaian[$a][1];
	$hasilPemakaian[$a][2] = $pemakaian;
	$hasilPemakaian[$a][3] = $modal;

	$a++;
}
