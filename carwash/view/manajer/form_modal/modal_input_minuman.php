<div class="modal fade" id="tambahMinuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Minuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="inputMinuman" name="inputMinuman" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="pilih" value="input">
                        <!-- Nama Minuman -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="namaMinuman" name="namaMinuman">
                            <label for="namaMinuman">Nama Minuman</label>
                        </div>
                        <br> <!-- Modal Minuman -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="modalMinuman" name="modalMinuman" >
                            <label for="tarifCuci">Modal Minuman</label>
                        </div>
                        <br> <!-- Harga Jual Minuman -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="hargaMinuman" name="hargaMinuman" >
                            <label for="hargaMinuman">Harga Jual</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>