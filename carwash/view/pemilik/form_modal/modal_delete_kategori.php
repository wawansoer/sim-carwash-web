        <!-- Modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<? echo $tampilKategori['id_kategori_cuci']; ?>"><i class="fas fa-trash-alt"></i></i>
        </button>
        <!-- target modal -->
        <div class="modal fade" id="del<? echo $tampilKategori['id_kategori_cuci']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Perbaharui Data Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="conatainer">
                                <input type="hidden" name="pilih" value="delete">
                                <input type="hidden" name="idKategoriCuci" value="<?php echo $tampilKategori['id_kategori_cuci']; ?>">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="jenisKendaraan" placeholder="<?php echo $tampilKategori['nama_jenis']; ?>" value="<?php echo $tampilKategori['nama_jenis']; ?>" readonly>
                                    <label for="jenisKendaraan">Jenis Kendaraan</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kategoriKendaraan" placeholder="<?php echo $tampilKategori['nama_kategori']; ?>" value="<?php echo $tampilKategori['nama_kategori']; ?>" readonly>
                                    <label for="kategoriKendaraan">Kategori Kendaraan</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="serviceCuci" placeholder="<?php echo $tampilKategori['nama_service']; ?>" value="<?php echo $tampilKategori['nama_service']; ?>" readonly>
                                    <label for="serviceCuci">Service Cuci</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="upahKaryawan" id="upahKaryawan" value="<?php echo $tampilKategori['upah_karyawan']; ?>" readonly>
                                    <label for="upahKaryawan">Upah Karyawan</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="tarifCuci" name="tarifCuci" value="<?php echo $tampilKategori['tarif_cuci']; ?>" readonly>
                                    <label for="tarifCuci">Tarif Cuci</label>
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