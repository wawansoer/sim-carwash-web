<?php
  $danger = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Mohon Maaf.</strong> Data Kategori Yang Anda Masukan Tidak Lengkap. Silahkan Isi Kembali Data Kategori!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
  $warning = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Mohon Maaf.</strong> Data Yang Anda Masukan Tidak Sesuai Dengan Format Yang Ditentukan. Silahkan Isi Kembali Data Kategori!
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
      if(empty($_POST['jenisKendaraan']) or empty($_POST['kategoriKendaraan']) or empty($_POST['serviceCuci']) or empty($_POST['upahKaryawan']) or empty($_POST['tarifCuci'])){
        echo $danger;
      }else{
        $jenis = $_POST['jenisKendaraan'];
        $kategori = $_POST['kategoriKendaraan'];
        $service = $_POST['serviceCuci'];
        $upah = $_POST['upahKaryawan'];
        $tarif = $_POST['tarifCuci'];

        if(is_numeric($upah) and is_numeric($tarif)){
          $id = $jenis.$kategori.$service;
          $tambah_kategori = "INSERT INTO kategori_cuci VALUES ('$id', '$jenis', '$kategori', '$service', $upah, $tarif)";
          if($koneksi->query($tambah_kategori)==TRUE){
            echo $success;
          }else{
            echo $warning;
          }
        }else {
          echo $warning;
        }
      }
    }else if($_POST['pilih']==="edit"){
      if(empty($_POST['upahKaryawan']) or empty($_POST['tarifCuci'])){
        echo $danger;
      }else {
        $eId = $_POST['idKategoriCuci'];
        $eUpah = $_POST['upahKaryawan'];
        $eTarif = $_POST['tarifCuci'];
        
        $edit_kategori = "UPDATE kategori_cuci 
                            SET upah_karyawan = $eUpah, tarif_cuci = $eTarif
                            WHERE id_kategori_cuci = '$eId'";
        if($koneksi->query($edit_kategori)==TRUE){
            echo $success;
          }else{
            echo $warning;
          }
        
      }
    }else if($_POST['pilih']==="delete"){
      $dId = $_POST['idKategoriCuci'];
      $deleteKategori = "DELETE FROM kategori_cuci WHERE id_kategori_cuci = '$dId'";
      if($koneksi->query($deleteKategori)){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Selamat.</strong> Data Kategori Cuci Berhasil Dihapu.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Mohon Maaf.</strong> Data Kategori Tidak Dapat Dihapus!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
    }
  }
?>