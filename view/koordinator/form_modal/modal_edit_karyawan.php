<?php
$dataKaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan
  left join pengguna on pengguna.nik = karyawan.nik
  left join jabatan on pengguna.id_jabatan = jabatan.id_jabatan
  WHERE pengguna.id_jabatan = 1004");
  while ($tabelKaryawan = mysqli_fetch_assoc($dataKaryawan)) {
    echo "<tr data-expanded='false'>";
    echo "<td>" . $tabelKaryawan['nama_lengkap'] . "</td>";
    echo "<td>" . $tabelKaryawan['nama_panggilan'] . "</td>";
    echo "<td>" . $tabelKaryawan['tanggal_lahir'] . "</td>";
    echo "<td>" . $tabelKaryawan['alamat'] . "</td>";
    echo "<td>" . $tabelKaryawan['nomor_handphone'] . "</td>";
    echo "<td>" . $tabelKaryawan['status'] . "</td>";
    echo "</tr>";
  }
  ?>
