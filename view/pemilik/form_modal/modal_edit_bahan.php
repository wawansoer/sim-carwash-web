<?php
$ambilBahan = mysqli_query($koneksi, "SELECT * FROM bahan_baku");
while ($tampilBahan = mysqli_fetch_assoc($ambilBahan)) {
    echo "<tr class='text-center'>";
    echo "<td>" . $tampilBahan['nama_bahan_baku'] . "</td>";
    echo "<td>" . $tampilBahan['satuan'] . "</td>";
    echo "<td>" . $tampilBahan['jumlah'] . "</td>";
    echo "<td>" . rupiah($tampilBahan['harga']) . "</td";
    echo "</tr>";
}
?>
