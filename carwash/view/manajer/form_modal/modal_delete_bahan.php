<!-- Modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<? echo $tampilBahan['id_bahan_baku']; ?>"><i class="fas fa-trash-alt"></i>
</button>
<!-- target modal -->
<div class="modal fade" id="del<? echo $tampilBahan['id_bahan_baku']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Bahan Baku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="conatainer">
                        <input type="hidden" name="pilih" value="delete">
                        <input type="hidden" name="idBahan" value="<?php echo $tampilBahan['id_bahan_baku']; ?>">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="namaBahan" placeholder="<?php echo $tampilBahan['nama_bahan_baku']; ?>" value="<?php echo $tampilBahan['nama_bahan_baku']; ?>" readonly>
                            <label for="namaBahan">Nama Bahan Baku</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="<?php echo $tampilBahan['satuan']; ?>" value="<?php echo $tampilBahan['satuan']; ?>" readonly>
                            <label for="modalBahan">Satuan Bahan Baku</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="<?php echo $tampilBahan['satuan']; ?>" value="<?php echo $tampilBahan['jumlah']; ?>" readonly>
                            <label for="jumlah">Jumlah Bahan Baku</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="<?php echo $tampilBahan['harga']; ?>" value="<?php echo $tampilBahan['harga']; ?>" readonly>
                            <label for="harga">Harga Satuan Bahan Baku</label>
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