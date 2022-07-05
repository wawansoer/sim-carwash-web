<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tambahPemakaian">
<i class="fas fa-plus-square"></i> Pemakaian Bahan Baku
</button>

<!-- Modal -->
<div class="modal fade" id="tambahPemakaian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="inputPemakaian" name="inputPemakaian" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pemakaian Bahan Baku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pilih" value="tambahPemakaian">
                    <div class="form-floating">
                        <select class="form-select form-control" name="idBahan" id="idBahan" require>
                            <option selected>Pilih Bahan Baku</option>
                            <?php 
                                $ambilBahan = mysqli_query($koneksi, "SELECT * FROM bahan_baku");
                                if($ambilBahan==TRUE){
                                    while($tampilBahan = mysqli_fetch_assoc($ambilBahan)){

                            ?>
                                <option value="<? echo $tampilBahan['id_bahan_baku'];?>"><? echo $tampilBahan['nama_bahan_baku'];?></option>
                            <?        
                                    }
                                }
                            ?>
                        </select>
                        <label for="jumlah">Bahan Baku</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                        <label for="jumlah">Jumlah</label>
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