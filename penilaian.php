<?
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  if($_POST['pilih']=='001'){
    $nopol = $_POST['nopol']; $tglCuci = $_POST['tglCuci'];
    $cariKendaraan = mysqli_query($koneksi, "SELECT id_cuci, nopol, nama_kendaraan, tanggal, jumlah_bayar from cuci where nopol = '$nopol' AND tanggal = '$tglCuci' AND status_bayar = 'SUDAH' AND status_kerja = 'SELESAI'");
    if (mysqli_num_rows($cariKendaraan) > 0) {
      echo "<div class='container'>";
      while ($tampilData = mysqli_fetch_assoc($cariKendaraan)) {
        $nopol = $tampilData['nopol'];
        $nama_kendaraan = $tampilData['nama_kendaraan'];
        $tanggal = $tampilData['tanggal'];
        $tarif = $tampilData['jumlah_bayar'];
        $idCuci = $tampilData['id_cuci'];
        ?>

        <h1 class="text-white mb-4">Silahkan Lengkapi Data Dibawah </h1>
        <form method="post" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="hidden" name="pilih" value="002">
          <input type="hidden" name="idCuci" value="<?echo $idCuci;?>">
          <div class="row">
            <div class="col-md-6 py-1">
              <div class="form-floating">
                <input type="text" class="form-control" id="nopol" value="<?echo $nopol;?>" disabled>
                <label for="nopol">Nomor Polisi</label>
              </div>
            </div>
            <div class="col-md-6 py-1">
              <div class="form-floating">
                <input type="text" class="form-control" id="kendaraan" value="<?echo $nama_kendaraan;?>" disabled>
                <label for="kendaraan">Nama Kendaraan</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 py-1">
              <div class="form-floating">
                <input type="text" class="form-control" id="tglCuci" value="<?echo tgl_indo($tanggal);?>" disabled>
                <label for="tglCuci">Tanggal Cuci</label>
              </div>
            </div>
            <div class="col-md-6 py-1">
              <div class="form-floating">
                <input type="text" class="form-control" id="tarif" value="<?echo rupiah($tarif);?>" disabled>
                <label for="tarif">Tarif Cuci</label>
              </div>
            </div>
          </div>
          <div class="row py-1">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Berikan Masukan Pelayanan Kami" id="komentar" name="komentar" style="height: 100px" required></textarea>
              <label for="komentar">Masukan & Saran</label>
            </div>
          </div>
          <div class="row py-1">
            <div class="form-floating text-center">
              <input type="range" class="form-range" min="60" max="100" step="10" id="customRange3" name="rating" required>
            </div>
          </div>
          <br>
          <div class="row">
            <button class="btn btn-info w-100 py-3" type="submit">Berikan Penilaian</button>
          </div>
          <div class="row py-3">
            <div class="col-8 py-1">
              <small class="form-text text-muted"> Jika Nominal Pembayaran Yang Anda Lakukan Berbeda Dengan Yang Tertera Pada Sistem Silahkan Hubungi Kami Dengan Menekan Tombol Disamping!!  </small>
            </div>
            <div class="col-3 py-1 text-center">
              <a href="https://wa.me/6281243590903?text=Saya Ingin Menginformasikan Bahwa Pembayaran Yang Saya Lakukan Berbeda Dengan Nominal Yang Tertera Pada Sistem">
                <button type="button" class="btn btn-info">
                  Hubungi Kami
                </button>
              </a>
            </div>
          </div>

        </form>
      </DIV>
      <?
    }
  }else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Mohon Maaf !</strong> Data Kendaraan Anda Tidak Ditemukan. Hubungi Kami <a href='https://wa.me/6281243590903?text=Saya Ingin Menginformasikan Bahwa Data Kendaraan Saya Tidak Dapat Ditemukan'>
    <button type='button' class='btn btn-success'>
    disini
    </button>
    </a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div> ";
  }
}elseif ($_POST['pilih']=='002') {
  $idCuci = $_POST['idCuci']; $komentar = $_POST['komentar']; $rating = $_POST['rating'];
  $koneksi -> autocommit(FALSE);
  $inputRating = mysqli_query($koneksi, "UPDATE cuci set ulasan = '$komentar', rating = $rating WHERE id_cuci = '$idCuci'");
  if($inputRating == TRUE){
    echo "<div class='container'> <div class='alert alert-light alert-dismissible fade show' role='alert'>
    <strong>Terimas Kasih !</strong> Masukan Anda Sangat Berarti Bagi Kemajuan Kami.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div> </div>";
    $koneksi -> commit();
  }else {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Mohon Maaf !</strong> Ada Yang Salah Dengan Data Yang Anda Isi. SIlahkan Cek Kembali Inputan Anda.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div> ";
  }
}
}
?>
