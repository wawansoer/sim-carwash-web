<button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#tambahPengeluaran">
<i class="fas fa-plus-square"></i> Pengeluaran
</button>

<!-- Modal -->
<div class="modal fade" id="tambahPengeluaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="inputPengeluaran" name="inputPengeluaran" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pilih" value="satu">
                    <div class="form-floating">
                        <select class="form-select form-control" name="jenis" id="jenis" required>
                            <option selected></option>
                            <option value="Bahan Baku">Pembelian Bahan Baku</option>
                            <option value="Pemeliharaan">Biaya Pemeliharaan</option>
                            <option value="Operasional">Biaya Operasional</option>
                            <option value="Lainnya">Biaya Lainya</option>
                        </select>
                        <label for="jenis">Jenis Pengeluaran</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        <label for="jumlah">Jumlah</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="ket" name="ket" required>
                        <label for="ket">Keterangan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
