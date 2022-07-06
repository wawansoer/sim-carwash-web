<?php
$ambilKategori = mysqli_query($koneksi, "SELECT jenis.nama_jenis, kategori.nama_kategori,
                            service.nama_service, kategori_cuci.upah_karyawan, kategori_cuci.tarif_cuci,
                            kategori_cuci.id_kategori_cuci
                            FROM kategori_cuci
                            INNER JOIN jenis on jenis.id_jenis = kategori_cuci.id_jenis
                            INNER JOIN kategori on kategori.id_kategori = kategori_cuci.id_kategori
                            INNER JOIN service on service.id_service = kategori_cuci.id_service");
while ($tampilKategori = mysqli_fetch_assoc($ambilKategori)) {
    echo "<tr class='text-center'>";
    echo "<td>" . $tampilKategori['nama_jenis'] . "</td>";
    echo "<td>" . $tampilKategori['nama_kategori'] . "</td>";
    echo "<td>" . $tampilKategori['nama_service'] . "</td>";
    echo "<td>" . rupiah($tampilKategori['upah_karyawan']) . "</td>";
    echo "<td>" . rupiah($tampilKategori['tarif_cuci']) . "</td>";
    echo "</tr>";
}
?>
