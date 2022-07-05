<button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#tambahTunai">
<i class="fas fa-plus-square"></i> Pengambilan Tunai
</button>

<!-- Modal -->
<div class="modal fade" id="tambahTunai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengambilan Minuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pilih" value="001">
                    <input type="hidden" name="nik" value="<?echo $nik?>">
                    <br>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        <label for="jumlah">Jumlah</label>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
