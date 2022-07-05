<?php
$ambilMinuman = mysqli_query($koneksi, "SELECT * FROM minuman");
while ($tampilMinuman = mysqli_fetch_assoc($ambilMinuman)) {
    echo "<tr class='text-center'>";
    echo "<td>" . $tampilMinuman['nama_minuman'] . "</td>";
    echo "<td>" . rupiah($tampilMinuman['modal']) . "</td>";
    echo "<td>" . rupiah($tampilMinuman['harga_jual']) . "</td>";
?>
    <td>
        <!-- Modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<? echo $tampilMinuman['id_minuman']; ?>"> <i class="fas fa-edit"></i>
        </button>
        <!-- target modal -->
        <div class="modal fade" id="edit<? echo $tampilMinuman['id_minuman']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Perbaharui Data Minuman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="conatainer">
                                <input type="hidden" name="pilih" value="edit">
                                <input type="hidden" name="idMinuman" value="<?php echo $tampilMinuman['id_minuman'];?>">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="namaMinuman" placeholder="<?php echo $tampilMinuman['nama_minuman'];?>" value="<?php echo $tampilMinuman['nama_minuman'];?>" readonly> 
                                    <label for="namaMinuman">Nama Minuman</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="modalMinuman" name="modalMinuman" placeholder="<?php echo $tampilMinuman['modal'];?>" value="<?php echo $tampilMinuman['modal'];?>"> 
                                    <label for="modalMinuman">Modal Minuman</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="hargaMinuman" name="hargaMinuman" placeholder="<?php echo $tampilMinuman['harga_jual'];?>" value="<?php echo $tampilMinuman['harga_jual'];?>"> 
                                    <label for="hargaMinuman">Harga Minuman</label>
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
        <?php include "form_modal/modal_delete_minuman.php";?>
    </td>
<?
    echo "</tr>";
}
?>