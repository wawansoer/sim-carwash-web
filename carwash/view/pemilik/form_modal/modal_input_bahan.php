<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahBahan">
    <i class="fas fa-plus-square"></i> Bahan Baku
</button>

<!-- Modal -->
<div class="modal fade" id="tambahBahan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="inputBahan" name="inputBahan" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Bahan Baku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pilih" value="input">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="namaBahan" name="namaBahan" placeholder="Nama Bahan Baku" require>
                        <label for="namaBahan">Nama Bahan Baku</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="form-select form-control" name="satuan" id="satuan">
                            <option selected>Pilih Satuan Bahan Baku</option>
                            <option value="Bungkus">Bungkus</option>
                            <option value="Liter">Liter</option>
                            <option value="Pieces">Pieces</option>
                        </select>
                        <label for="jumlah">Satuan Bahan Baku</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                        <label for="jumlah">Jumlah Bahan Baku</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="harga" name="harga">
                        <label for="harga">Harga Satuan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>