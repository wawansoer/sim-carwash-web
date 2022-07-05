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
?>
    <td>
        <!-- Modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<? echo $tampilKategori['id_kategori_cuci']; ?>"><i class="fas fa-edit"></i>
        </button>
        <!-- target modal -->
        <div class="modal fade" id="edit<? echo $tampilKategori['id_kategori_cuci']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Perbaharui Data Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="conatainer">
                                <input type="hidden" name="pilih" value="edit">
                                <input type="hidden" name="idKategoriCuci" value="<?php echo $tampilKategori['id_kategori_cuci'];?>">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="jenisKendaraan" placeholder="<?php echo $tampilKategori['nama_jenis'];?>" value="<?php echo $tampilKategori['nama_jenis'];?>" readonly> 
                                    <label for="jenisKendaraan">Jenis Kendaraan</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kategoriKendaraan" placeholder="<?php echo $tampilKategori['nama_kategori'];?>" value="<?php echo $tampilKategori['nama_kategori'];?>" readonly> 
                                    <label for="kategoriKendaraan">Kategori Kendaraan</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="serviceCuci" placeholder="<?php echo $tampilKategori['nama_service'];?>" value="<?php echo $tampilKategori['nama_service'];?>" readonly> 
                                    <label for="serviceCuci">Service Cuci</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="upahKaryawan" id="upahKaryawan" placeholder="<?php echo $tampilKategori['upah_karyawan'];?>"> 
                                    <label for="upahKaryawan">Upah Karyawan</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="tarifCuci" name= "tarifCuci" placeholder="<?php echo $tampilKategori['tarif_cuci'];?>"> 
                                    <label for="tarifCuci">Tarif Cuci</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include "form_modal/modal_delete_kategori.php";?>
    </td>
<?
    echo "</tr>";
}
?>