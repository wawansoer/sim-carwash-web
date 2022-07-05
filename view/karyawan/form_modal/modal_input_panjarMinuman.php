<button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#tambahMinuman">
<i class="fas fa-plus-square"></i> Pengambilan Minuman
</button>

<!-- Modal -->
<div class="modal fade" id="tambahMinuman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengambilan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pilih" value="002">
                    <input type="hidden" name="nik" value="<?echo $nik;?>">
                    <br>
                    <div class="form-floating">
                      <select class="form-select" id="minuman" name="minuman" required>
                        <option value="" selected>Pilih Minuman</option>
                        <?php
                        $ambilMinuman = mysqli_query($koneksi, "SELECT * FROM minuman");
                        if(mysqli_num_rows($ambilMinuman) > 0){
                          while($dataMinuman = mysqli_fetch_assoc($ambilMinuman)){
                            echo "<option value='".$dataMinuman['id_minuman']."'>".$dataMinuman['nama_minuman']."</option>";
                          }
                        }else{
                          echo "<option>Tidak Ada Karyawan</option>";
                        }
                        ?>
                      </select>
                      <label for="minuman">Nama Minuman</label>
                    </div>
                    <br>
                    <div class="form-floating">
                      <input type="number" class="form-control" name="jumlahMinuman" id="jumlahMinuman" required></input>
                      <label for="jumlahMinuman">Jumlah Minuman</label>
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
