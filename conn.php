<?php
$server = "sql102.epizy.com";
$user = "epiz_30534769";
$pass = "loybJFdeF8ky9Jj";
$db = "epiz_30534769_thahira_carwash";

date_default_timezone_set("Asia/Makassar");
$waktuLengkap = date('Y-m-d G:i:s');
$idWaktu = date('YmdGis');
$hariMin14 = date('Y-m-d', strtotime("-14 day", strtotime(date("Y-m-d"))));
$tanggal = date('Y-m-d');
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

function tgl_indo($waktu){
	$hari_array = array(
		'Minggu',
		'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu'
	);
	$hr = date('w', strtotime($waktu));
	$hari = $hari_array[$hr];
	$tanggal = date('j', strtotime($waktu));
	$bulan_array = array(
		1 => 'Januari',
		2 => 'Februari',
		3 => 'Maret',
		4 => 'April',
		5 => 'Mei',
		6 => 'Juni',
		7 => 'Juli',
		8 => 'Agustus',
		9 => 'September',
		10 => 'Oktober',
		11 => 'November',
		12 => 'Desember',
	);
	$bl = date('n', strtotime($waktu));
	$bulan = $bulan_array[$bl];
	$tahun = date('Y', strtotime($waktu));
	$jam = date( 'H:i:s', strtotime($waktu));

	//untuk menampilkan hari, tanggal bulan tahun jam
	//return "$hari, $tanggal $bulan $tahun $jam";

	//untuk menampilkan hari, tanggal bulan tahun
	return "$hari, $tanggal $bulan $tahun";
}

$koneksi = new mysqli($server, $user, $pass, $db);
if ($koneksi->connect_error){
	die("Server Maintenance");
}
?>
