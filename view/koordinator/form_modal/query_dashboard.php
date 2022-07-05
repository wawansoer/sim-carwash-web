<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if($_POST['pilih']==="001"){
    $nopol = $_POST['nopol'];
    $namaKend = $_POST['namaKendaraan'];
    $idKat = $_POST['jenisKendaraan']."".$_POST['kategoriKendaraan']."".$_POST['serviceCuci'];
    $nik = $_POST['petugas'];
    $ket = $_POST['ket'];

    $ambilHarga = mysqli_query($koneksi, "SELECT tarif_cuci, upah_karyawan FROM kategori_cuci WHERE id_kategori_cuci = '$idKat'");
    if(mysqli_num_rows($ambilHarga) > 0){
      while ($tarifUpah = mysqli_fetch_assoc($ambilHarga)) {
        // code...
        $upah = $tarifUpah['upah_karyawan'];
        $tarif = $tarifUpah['tarif_cuci'];
      }
    }else {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf ! </strong> Tidak dapat menambahkan data kendaraan cuci. Silahkan cek kembali inputan anda.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    $idCuci = date("Ymd")."".$nopol;
    $inputCuci = mysqli_query($koneksi, "INSERT INTO cuci VALUES('$idCuci','$idKat','$nik','$nopol','$namaKend','$tanggal','BELUM',
                                        'PROSES','$waktuLengkap','$ket', null, null, $tarif)");
    if($inputCuci == true){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Selamat ! </strong> Berhasil menambahkan data kendaraan cuci.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf !</strong> Tidak dapat menambahkan data kendaraan cuci. Silahkan cek kembali inputan anda.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
  }elseif($_POST['pilih']==="002"){
    $lengkap = date('YmdGis');
    $idMinuman = $_POST['minuman'];
    $jumlah = $_POST['jumlahMinuman'];
    $status = $_POST['statusBayar'];
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

    $inputPenjualan = mysqli_query($koneksi, "INSERT INTO penjualan VALUES('$idPenjualan','$idMinuman', $jumlah, $total, '$status','$tanggal','$waktuLengkap')");
    if($inputPenjualan == TRUE){
      if($status === 'Lunas'){
        $idTRXPenjualan = "222".$idPenjualan;
        $inputTRX = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('$idTRXPenjualan',null,'$idPenjualan',null, $total, 'Pendapatan', '$tanggal')");
      }
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Selamat ! </strong> Berhasil menambahkan data penjualan.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf ! </strong> Tidak Dapat Menambah Data Penjualan. Silahkan Cek Kembali Inputan Anda
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

  }elseif($_POST['pilih']==="003"){
    $idCuci = $_POST['idCuci']; $nopol = $_POST['nopol']; $kendaraan = $_POST['namaKendaraan']; $upah = $_POST['upah'];
    $nik = $_POST['petugas']; $staBayar = $_POST['staBayar']; $staKerja = $_POST['staKerja']; $ket = $_POST['ket']; $bayar = $_POST['bayar'];

    echo $idCuci. " ". $nopol ." ". $kendaraan ." ". $nik ."  ". $staBayar ." ". $staKerja." ". $ket." ". $upah. "  ". $bayar;
    $updateCuci = mysqli_query($koneksi, "UPDATE cuci set nik = '$nik', nopol = '$nopol', nama_kendaraan = '$kendaraan',
                                status_bayar = '$staBayar', status_kerja = '$staKerja', keterangan = '$ket'
                                WHERE id_cuci = '$idCuci'");
    if($updateCuci === TRUE){
      //cek apakah gaji sudah dimasukan atau belum
      if($staKerja === 'SELESAI'){
        $cekGaji = mysqli_query($koneksi, "SELECT * from gaji_karyawan where id_gaji = '$idCuci'");
        if(mysqli_num_rows($cekGaji)>=0){
          $ketGaji = "Upah Cuci Kendaraan ".$kendaraan." Dengan Nomor Polisi " .$nopol;
          $inputGaji = mysqli_query($koneksi, "INSERT INTO gaji_karyawan VALUES ('$idCuci','$nik','IN111','$waktuLengkap', $upah,'$ketGaji','$tanggal')");

          // cek data pengeluaran
          $cekPengeluaran = mysqli_query($koneksi, "SELECT * from pengeluaran where id_pengeluaran = '$idCuci'");
          if(mysqli_num_rows($cekPengeluaran)>=0){
            $inputPengeluaran = mysqli_query($koneksi, "INSERT INTO pengeluaran VALUES ('$idCuci','Gaji Karyawan', $upah, '$tanggal', 'Gaji Karyawan','$waktuLengkap')");
            $cekTRXOUT = mysqli_query($koneksi, "SELECT * FROM transaksi where id_pengeluaran = '$idCuci'");
            if(mysqli_num_rows($cekTRXOUT)>=0){
              $idTRX = "333".$idCuci;
              $inputTRXOUT = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$idTRX', null, null, '$idCuci', $upah, 'Gaji Karyawan', '$tanggal')");
            }
          }
        }
      }
      //cek transaksi
      if($staBayar === 'SUDAH'){
        $cekTRX = mysqli_query($koneksi, "SELECT * from transaksi where id_cuci = '$idCuci'");
        //cek apakah gaji sudah dimasukan atau belum
        if(mysqli_num_rows($cekTRX)>=0){
          $ketTRXIN = 'Pendapatan';
          $idTRXIN = "111".$idCuci;
          $inputTRXIN = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('$idTRXIN','$idCuci',null,null, $bayar, '$ketTRXIN', '$tanggal')");
        }
      }
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Selamat ! </strong> Berhasil Ubah Data Cuci.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else{
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Selamat ! </strong> Berhasil Ubah Data Cuci.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
  }elseif($_POST['pilih']==="004"){
    $idPenjualan = $_POST['idPenjualan']; $idMinuman = $_POST['minuman']; $qty = $_POST['jml'];$staBayar = $_POST['staBayar'];

    echo $idPenjualan." | ". $idMinuman ." | ". $qty ." | ". $staBayar;

    $dataHargaMinuman = mysqli_query($koneksi, "SELECT * FROM minuman where id_minuman = $idMinuman");
    if(mysqli_num_rows($dataHargaMinuman) > 0){
      while ($dataMinuman = mysqli_fetch_assoc($dataHargaMinuman)) {
        // code...
        $hargaMinuman = $dataMinuman ['harga_jual'];
      }
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Mohon Maaf ! </strong> Inputan Anda Tidak Valid. Gagal Perbaharui Data Penjualan.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

    $totalBayarMin = $hargaMinuman * $qty;
    $updatePenjualan = mysqli_query($koneksi, "UPDATE penjualan set id_minuman = '$idMinuman', jumlah = $qty,
                                                total = $totalBayarMin, status_bayar = '$staBayar', waktu = '$waktuLengkap'
                                                WHERE id_penjualan = '$idPenjualan'");
     if($updatePenjualan === TRUE){
       if($staBayar === 'Lunas'){
         $cekTRXPenjualan = mysqli_query($koneksi, "SELECT * from transaksi where id_penjualan = '$idPenjualan'");
         if(mysqli_num_rows($cekTRXPenjualan)!=0){
           echo " Siap Input TRX";
          $idTRX = "222".$idPenjualan;
          $inputTRXPenjualan = mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('$idTRX', null, '$idPenjualan', null,
                                                        $totalBayarMin, 'Pendapatan','$tanggal')");
          if($inputTRXPenjualan === TRUE){
            echo "BErhasil input transaksi penjualan";
            echo $totalBayar;
          }else {
            echo " | Sudah Ada Transaksi";
          }
         }
       }
     }else{
       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>Mohon Maaf ! </strong> Inputan Anda Tidak Valid. Gagal Perbaharui Data Penjualan.
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
     }

  }
}


  // jumlah mobil dan motor hari ini


?>
