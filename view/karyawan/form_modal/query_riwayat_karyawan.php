<?php

if(empty($nik)){
  $uiRiwayat = 0;
}else{
  $uiRiwayat = 1;
}

if($uiRiwayat == 0){
  echo "
  <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Mohon Maaf.</strong> Belum Ada Data Transaksi.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}elseif($uiRiwayat == 1){

  // query ambil trx
  $result = mysqli_query($koneksi,"SELECT karyawan.nama_panggilan as nama, gaji_karyawan.tanggal as tgl, gaji_karyawan.jumlah as jml,
    jenis_trx.jenis_trx as jenis, jenis_trx.ket_trx as ketTRX, gaji_karyawan.keterangan as ket,
    gaji_karyawan.waktu as waktu FROM gaji_karyawan
    inner join karyawan on karyawan.nik = gaji_karyawan.nik
    inner join jenis_trx on jenis_trx.id_trx = gaji_karyawan.id_trx
    WHERE karyawan.nik = '$nik'
    AND gaji_karyawan.waktu between '$tgl_pertama1 00:00:01' AND '$tgl_terakhir1 23:59:00'
    ORDER BY gaji_karyawan.waktu desc");


    //ambil nama karyawan
    $ambil_nama = mysqli_query($koneksi, "SELECT nama_panggilan as nama from karyawan where nik = '$nik'");
    while($ambilNama = mysqli_fetch_assoc($ambil_nama)){
      $nama = $ambilNama['nama'];
    }

    if(mysqli_num_rows($result) > 0){
      echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
      Rincian data tranaski <strong>".$nama."</strong> Dari ".$tgl_pertama1." s/d ".$tgl_terakhir1."
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
      $tanggalAwal = $tgl_pertama1;
      // ambil data tampilkan ke UI
      while($ambil = mysqli_fetch_assoc($result)){
        //ambil tanggal
        $now = date('Y-m-d G:i:s', strtotime($ambil['waktu']));
        // pemilihan warna icon
        $trx = $ambil['ketTRX'];
        if($trx === "Upah Cuci"){
          $show = "fas fa-wallet bg-green";
          $jenis = "Pendapatan";
        }elseif($trx === "Minuman"){
          $show = "fas fa-mug-hot bg-yellow";
          $jenis = "Pengambilan Minuman";
        }elseif($trx === "Tunai"){
          $show = "fas fa-money-bill-wave bg-yellow";
          $jenis = "Pengambilan Tunai";
        }elseif ($trx === "Kasbon") {
          $show = "fas fa-money-bill-wave bg-red";
          $jenis = "Pinjaman";
        }elseif ($trx === "Ganti Rugi") {
          $show = "fas fa-car-crash bg-red";
          $jenis = "Ganti Rugi";
        }else {
          $show = "fas fa-money-bill-wave bg-gray";
          $jenis = "Lainnya";
        }


        $totalSatu = mysqli_query($koneksi, "SELECT SUM(if(jenis_trx.jenis_trx = 'Pengeluaran', gaji_karyawan.jumlah, 0)) as keluar,
        SUM(if(jenis_trx.jenis_trx = 'Pendapatan', gaji_karyawan.jumlah, 0)) as masuk
        from gaji_karyawan left join jenis_trx USING(id_trx) WHERE gaji_karyawan.nik = '$nik'
        AND waktu between '1990-01-26 17:32:34' AND '$now'");
        $a = 0;
        while($totalGaji = mysqli_fetch_assoc($totalSatu)){
          $pendapatan = $totalGaji['masuk']; $pengeluaran = $totalGaji['keluar'];
        }

        $sisSaldo = $pendapatan - $pengeluaran;


        if($tanggalAwal != $ambil['tgl']){
          echo "<div class='time-label'>
          <span class='bg-blue font-monospace'>".tgl_indo($ambil['tgl'])."</span>
          </div>";
          echo "<div>
          <i class='".$show."'></i>
          <div class='timeline-item'>
          <span class='time'><i class='fas fa-clock'></i> ".$ambil['waktu']."</span>
          <h3 class='timeline-header fw-bolder'>".$jenis."</h3>
          <div class='timeline-body'>
          ".$ambil['ket']." sebesar ".rupiah($ambil['jml'])."
          </div>
          <div class='timeline-footer fw-bold'>
          Sisa Saldo ".rupiah($sisSaldo)."
          </div>
          </div>
          </div>";
          $tanggalAwal = $ambil['tgl'];
        }else {
          echo "<div>
          <i class='".$show."'></i>
          <div class='timeline-item'>
          <span class='time'><i class='fas fa-clock'></i> ".$ambil['waktu']."</span>
          <h3 class='timeline-header fw-bolder'>".$jenis."</h3>
          <div class='timeline-body'>
          ".$ambil['ket']." sebesar ".rupiah($ambil['jml'])."
          </div>
          <div class='timeline-footer fw-bold'>
          Sisa Saldo ".rupiah($sisSaldo)."
          </div>
          </div>
          </div>";
          $tanggalAwal = $ambil['tgl'];
        }
      }
    }else{
      echo "
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Mohon Maaf.</strong> Tidak Ada Data Transaksi.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }

  }

  ?>
