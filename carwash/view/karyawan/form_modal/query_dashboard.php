<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if($_POST['pilih']==="001"){
    $nik = $_POST['nik']; $jml = $_POST['jumlah'];
    $idTRXPanjar = $nik."".$idWaktu;
    $ketTRXKaryawan = "Pengambilan Tunai";
    $koneksi -> autocommit(FALSE);
    $inputPanjarTunai = mysqli_query($koneksi, "INSERT INTO gaji_karyawan VALUES('$idTRXPanjar','$nik','OUT221','$waktuLengkap', $jml, '$ketTRXKaryawan','$tanggal')");

    if($inputPanjarTunai == TRUE){
      $koneksi -> commit();
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Selamat ! </strong> Berhasil menambahkan Pengambilan Tunai Anda.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Mohon Maaf ! </strong> Tidak Dapat Menambah Data Pengambilan Tunai. Silahkan Cek Kembali Inputan Anda
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  }elseif($_POST['pilih']==="002"){
    $lengkap = date('YmdGis');
    $idMinuman = $_POST['minuman'];
    $jumlah = $_POST['jumlahMinuman'];
    $nik = $_POST['nik'];
    $status = 'Lunas';
    $ambilHarga = mysqli_query($koneksi, "SELECT harga_jual, nama_minuman from minuman where id_minuman = '$idMinuman'");
    if(mysqli_num_rows($ambilHarga)>0){
      while ($tampilHarga = mysqli_fetch_assoc($ambilHarga)) {
        // code...
        $hargaMinuman = $tampilHarga['harga_jual'];
        $namaMinuman = $tampilHarga['nama_minuman'];
      }
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Mohon Maaf ! </strong> Data Yang Anda Masukan Tidak Valid.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }

    $idPenjualan = $idMinuman."".$lengkap;
    $total = $hargaMinuman * $jumlah;
    $koneksi -> autocommit(FALSE);
    $inputPenjualan = mysqli_query($koneksi, "INSERT INTO penjualan VALUES('$idPenjualan','$idMinuman', $jumlah, $total, 'Lunas','$tanggal','$waktuLengkap')");
    if($inputPenjualan == TRUE){
      if($status === 'Lunas'){
        $idTRXPenjualan = "222".$idPenjualan;
        $inputTRX = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('$idTRXPenjualan',null,'$idPenjualan',null, $total, 'Pendapatan', '$tanggal')");
        if($inputTRX == TRUE){
          $ketTRXKaryawan = "Pengambilan " . $jumlah . " Buah " . $namaMinuman;
          $inputTRXKaryawan = mysqli_query($koneksi, "INSERT INTO gaji_karyawan VALUES('$idPenjualan','$nik','OUT222','$waktuLengkap', $total, '$ketTRXKaryawan','$tanggal')");
          if($inputTRXKaryawan == TRUE){
            $koneksi -> commit();
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Selamat ! </strong> Berhasil menambahkan Pengambilan Minuman Anda.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Mohon Maaf ! </strong> Tidak Dapat Menambah Data Pengambilan Minuman. Silahkan Cek Kembali Inputan Anda
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            $koneksi -> rollback();
          }
        }else {
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Mohon Maaf ! </strong> Tidak Dapat Menambah Data Pengambilan Minuman. Silahkan Cek Kembali Inputan Anda
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          $koneksi -> rollback();
        }
      }
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Mohon Maaf ! </strong> Tidak Dapat Menambah Data Pengambilan Minuman. Silahkan Cek Kembali Inputan Anda
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      $koneksi -> rollback();
    }
  }
}

// jumlah mobil dan motor hari ini


?>
