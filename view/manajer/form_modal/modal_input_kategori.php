<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Cuci</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="inputKategori" name="inputKategori" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="pilih" value="input">
                        <!-- Select Jenis Kendaraan -->
                        <div class="form-floating">
                            <select class="form-select form-control" name="jenisKendaraan" id="jenisKendaraan" aria-label="Floating label select example">
                                <option> </option>
                                <?php
                                $ambilData = mysqli_query($koneksi, "SELECT * FROM jenis");
                                while ($tampilData = mysqli_fetch_assoc($ambilData)) {
                                ?>
                                    <option value="<?php echo $tampilData['id_jenis']; ?>"> <?php echo $tampilData['nama_jenis']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="jenisKendaraan">Jenis Kendaraan</label>
                        </div>
                        <br><!-- Select Kategori Kendaraan -->
                        <div class="form-floating">
                            <select class="form-select form-control" name="kategoriKendaraan" id="kategoriKendaraan" aria-label="Floating label select example">
                                <option> </option>
                                <?php
                                $ambilData = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($tampilData = mysqli_fetch_assoc($ambilData)) {
                                ?>
                                    <option value="<?php echo $tampilData['id_kategori']; ?>"> <?php echo $tampilData['nama_kategori']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="kategoriKendaraan">Kategori Kendaraan</label>
                        </div>
                        <br><!-- Select Service Cuci -->
                        <div class="form-floating">
                            <select class="form-select form-control" name="serviceCuci" id="serviceCuci" aria-label="Floating label select example">
                                <option> </option>
                                <?php
                                $ambilData = mysqli_query($koneksi, "SELECT * FROM service");
                                while ($tampilData = mysqli_fetch_assoc($ambilData)) {
                                ?>
                                    <option value="<?php echo $tampilData['id_service']; ?>"> <?php echo $tampilData['nama_service']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="serviceCuci">Service Cuci</label>
                        </div>
                        <br> <!-- upah karyawan -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="upahKaryawan" name="upahKaryawan">
                            <label for="upahKaryawan">Upah Karyawan</label>
                        </div>
                        <br> <!-- tarif cuci -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="tarifCuci" name="tarifCuci" >
                            <label for="tarifCuci">Tarif Cuci</label>
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