<?php
$ambilMinuman = mysqli_query($koneksi, "SELECT * FROM minuman");
while ($tampilMinuman = mysqli_fetch_assoc($ambilMinuman)) {
    echo "<tr class='text-center'>";
    echo "<td>" . $tampilMinuman['nama_minuman'] . "</td>";
    echo "<td>" . rupiah($tampilMinuman['modal']) . "</td>";
    echo "<td>" . rupiah($tampilMinuman['harga_jual']) . "</td>";
    echo "</tr>";
}
?>
