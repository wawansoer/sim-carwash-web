<?
$ambilData = mysqli_query($koneksi, "SELECT * FROM karyawan
  inner join pengguna on karyawan.nik = pengguna.nik
  inner join jabatan on pengguna.id_jabatan  = jabatan.id_jabatan
  where karyawan.nik = '$nik'");
  while ($data1 = mysqli_fetch_assoc($ambilData)) {
    // code...
    $namaLengkap = $data1['nama_lengkap'];
    $namaPanggilan = $data1['nama_panggilan'];
    $tgl_lahir = $data1['tanggal_lahir'];
    $alamat = $data1['alamat'];
    $email = $data1['email'];
    $noKontak = $data1['nomor_handphone'];
    $status = $data1['status'];
    $pengguna = $data1['pengguna'];
    $jabatan = $data1['nama_jabatan'];
    $sandi = $data1['sandi'];
    $pertanyaan = $data1['pertanyaan'];
    $jawaban = $data1['jawaban'];
    $sandi = $data1['sandi'];
  }

  $koneksi ->autocommit(FALSE);
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['pilih']=="001"){
      $nik = $_POST['nik']; $status = $_POST['status'];
      $updateStatus = mysqli_query($koneksi, "UPDATE karyawan set status = '$status' WHERE nik = '$nik'");
      if($updateStatus == TRUE){
        $koneksi -> commit();
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Selamat !</strong> Berhasil Perbaharui Status Anda.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Mohon Maaf !</strong> Gagal Perbaharui Status Anda.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    }elseif($_POST['pilih']=="002"){
      if(md5($_POST['sandi']) === $sandi){
        $namaPanggilan = $_POST['namaPanggilan']; $alamat = $_POST['alamat']; $email = $_POST['email'];
        $tanya = $_POST['tanya']; $jawab = $_POST['jawab']; $noKontak = $_POST['noKontak']; $nik = $_POST['nik'];


        $updateKaryawan = mysqli_query($koneksi, "UPDATE karyawan set nama_panggilan = '$namaPanggilan', alamat = '$alamat',
                                        email = '$email', nomor_handphone = '$noKontak' WHERE nik = '$nik'");
        if($updateKaryawan == TRUE){
          $updatePengguna = mysqli_query($koneksi, "UPDATE pengguna set pertanyaan = '$tanya', jawaban = '$jawaban',
                                          pengguna = '$noKontak' WHERE nik = '$nik'");
          if($updatePengguna == TRUE){
            $koneksi -> commit();
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Selamat !</strong> Berhasil Perbaharui Profil Anda.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Mohon Maaf !</strong> Gagal Perbaharui Profil Anda. Silahkan Cek Kembali Inputan Anda !
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            $koneksi -> rollback();
          }
        }else{
          $koneksi -> rollback();
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Mohon Maaf !</strong> Gagal Perbaharui Profil Anda. Silahkan Cek Kembali Inputan Anda !
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
      }else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Mohon Maaf !</strong> Gagal Perbaharui Profil Anda. Silahkan Cek Kembali Inputan Anda !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    }elseif($_POST['pilih']=="003"){
      if(md5($_POST['sandi']) === $sandi){
        if($_POST['sandiBaru'] === $_POST['sandiBaru1']){
          $sandiBaru = md5($_POST['sandiBaru']); $nik = $_POST['nik'];
          $updateSandi = mysqli_query($koneksi, "UPDATE pengguna set sandi = '$sandiBaru' WHERE nik = '$nik'");
          if($updateSandi == TRUE){
            $koneksi -> commit();
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Selamat !</strong> Berhasil Perbaharui Sandi Anda.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Mohon Maaf !</strong> Gagal Perbaharui Profil Anda. Silahkan Cek Kembali Inputan Anda !
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          }
        }else{
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Mohon Maaf !</strong> Gagal Perbaharui Sandi Anda. Silahkan Cek Kembali Inputan Anda !
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
      }else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Mohon Maaf !</strong> Gagal Perbaharui Sandi Anda. Silahkan Cek Kembali Inputan Anda !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    }
  }
  ?>
