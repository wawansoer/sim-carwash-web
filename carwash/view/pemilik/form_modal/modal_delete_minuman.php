        <!-- Modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<? echo $tampilMinuman['id_minuman']; ?>"><i class="fas fa-trash-alt"></i></i>
        </button>
        <!-- target modal -->
        <div class="modal fade" id="del<? echo $tampilMinuman['id_minuman']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Minuman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="conatainer">
                                <input type="hidden" name="pilih" value="delete">
                                <input type="hidden" name="idMinuman" value="<?php echo $tampilMinuman['id_minuman']; ?>">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="namaMinuman" placeholder="<?php echo $tampilMinuman['nama_minuman']; ?>" value="<?php echo $tampilMinuman['nama_minuman']; ?>" readonly>
                                    <label for="namaMinuman">Nama Minuman</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="modalMinuman" placeholder="<?php echo $tampilMinuman['modal']; ?>" value="<?php echo $tampilMinuman['modal']; ?>" readonly>
                                    <label for="modalMinuman">Modal Minuaman</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="hargaJual" placeholder="<?php echo $tampilMinuman['harga_jual']; ?>" value="<?php echo $tampilMinuman['harga_jual']; ?>" readonly>
                                    <label for="hargaJual">Harga Jual</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus Data Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>