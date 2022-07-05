<?php
$dari = $dari2 =  $hariMin14;
$sampai = $sampai2 = date('Y-m-d');
$danger = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>Mohon Maaf.</strong> Data Minuman Yang Anda Masukan Tidak Lengkap. Silahkan Isi Kembali Data Minuman!
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";
$warning = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Mohon Maaf.</strong> Data Yang Anda Masukan Tidak Sesuai Dengan Format Yang Ditentukan. Silahkan Isi Kembali Data Minuman!
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";
$success = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Selamat.</strong> Data Yang Anda Masukan Telah Ditambahkan.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if($_POST['pilih']==="input"){
    if(empty($_POST['namaMinuman']) or empty($_POST['modalMinuman']) or empty($_POST['hargaMinuman'])){
      echo $danger;
    }else{
      $nama = $_POST['namaMinuman'];
      $modal = $_POST['modalMinuman'];
      $jual = $_POST['hargaMinuman'];

      if(is_numeric($modal) and is_numeric($jual)){
        $tambah_minuman = "INSERT INTO minuman (nama_minuman, modal, harga_jual)
        VALUES ('$nama', $modal, $jual)";
        if($koneksi->query($tambah_minuman)==TRUE){
          echo $success;
        }else{
          echo $warning;
        }
      }else {
        echo $warning;
      }
    }
  }else if($_POST['pilih']==="edit"){
    if(empty($_POST['modalMinuman']) or empty($_POST['hargaMinuman'])){
      echo $danger;
    }else {
      $eId = $_POST['idMinuman'];
      $eModal = $_POST['modalMinuman'];
      $eharga = $_POST['hargaMinuman'];

      $edit_kategori = "UPDATE minuman
      SET modal = $eModal, harga_jual = $eharga
      WHERE id_minuman = '$eId'";
      if($koneksi->query($edit_kategori)==TRUE){
        echo $success;
      }else{
        echo $warning;
      }
    }
  }else if($_POST['pilih']==="delete"){
    $dId = $_POST['idMinuman'];
    $deleteKategori = "DELETE FROM minuman WHERE id_minuman = '$dId'";
    if($koneksi->query($deleteKategori)){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Selamat.</strong> Data Minuman Berhasil Dihapus.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }else{
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Mohon Maaf.</strong> Data Minuman Tidak Dapat Dihapus!
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }
  }elseif($_POST['pilih']==="001"){
    $dari = $_POST['dari']; $sampai = $_POST['sampai'];
  }elseif($_POST['pilih']==="001"){
    $dari2 = $_POST['dari']; $sampai2 = $_POST['sampai'];
  }
}

$donutMinuman = mysqli_query($koneksi, "SELECT minuman.nama_minuman as nama, SUM(penjualan.jumlah) as qty
FROM penjualan left join minuman on minuman.id_minuman  = penjualan.id_minuman
WHERE penjualan.tgl BETWEEN '$dari2' AND '$sampai2'
GROUP BY minuman.nama_minuman");

$v = 0;
while ($dataMinuman = mysqli_fetch_assoc($donutMinuman)) {
  // code...
  $dataMinu[$v][0] = $dataMinuman['nama'];
  $dataMinu[$v][1] = $dataMinuman['qty'];
}
?>
