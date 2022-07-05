<?php
  $danger = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Mohon Maaf.</strong> Data Masukan Tidak Lengkap. Silahkan Isi Kembali Data!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
  $warning = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Mohon Maaf.</strong> Data Yang Anda Masukan Tidak Sesuai Dengan Format Yang Ditentukan. Silahkan Isi Kembali Data!
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
      if(empty($_POST['namaBahan']) or empty($_POST['satuan']) or empty($_POST['jumlah']) or empty($_POST['harga'])){
        echo $danger;
      }else{
        $nama = $_POST['namaBahan'];
        $satuan = $_POST['satuan'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];

        if(is_numeric($jumlah) and is_numeric($harga)){
          $tambah_bahan = "INSERT INTO bahan_baku (nama_bahan_baku, satuan, jumlah, harga)
                                VALUES ('$nama', '$satuan', $jumlah, $harga)";
          if($koneksi->query($tambah_bahan)==TRUE){
            echo $success;
          }else{
            echo $warning ;
          }
        }else {
          echo $warning;
        }
      }
    }else if($_POST['pilih']==="edit"){
      if(empty($_POST['jumlah']) or empty($_POST['harga'])){
        echo $danger;
      }else {
        $eId = $_POST['idBahan'];
        $ejumlah = $_POST['jumlah'];
        $eharga = $_POST['harga'];

        $edit_bahan = "UPDATE bahan_baku
                            SET jumlah = $ejumlah, harga = $eharga
                            WHERE id_bahan_baku = '$eId'";
        if($koneksi->query($edit_bahan)==TRUE){
            echo $success;
          }else{
            echo $warning;
          }

      }
    }else if($_POST['pilih']==="delete"){
      $dId = $_POST['idBahan'];
      $deleteKategori = "DELETE FROM bahan_baku WHERE id_bahan_baku = '$dId'";
      if($koneksi->query($deleteKategori)){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Selamat.</strong> Data Bahan Baku Berhasil Dihapus.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Mohon Maaf.</strong> Data Bahan Baku Tidak Dapat Dihapus!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
    }else if($_POST["pilih"]==="tambahPemakaian"){
      if(empty($_POST["idBahan"]) or empty($_POST["jumlah"])){
        echo $danger;
      }else{
        if(is_numeric($_POST['jumlah'])){
          $id = $_POST['idBahan'];
          $jumlah = $_POST['jumlah'];
          $inputPemakaian = mysqli_query($koneksi, "INSERT INTO pemakaian_bahan_baku (id_bahan_baku, jumlah, tanggal, waktu)
                                                    VALUES ($id, $jumlah, '$tanggal','$waktuLengkap')");
          if($inputPemakaian==TRUE){
            echo $success;
          }else{
            echo $warning;
          }
        }else{
          echo $warning;
        }
      }
    }
  }
?>
