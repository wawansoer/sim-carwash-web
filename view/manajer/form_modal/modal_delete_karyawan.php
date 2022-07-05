
<!-- Modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<? echo $tampilKaryawan['nik']; ?>"> <i class="fas fa-trash-alt"></i>
</button>
<!-- target modal -->
<div class="modal fade" id="delete<? echo $tampilKaryawan['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Perbaharui Data Bahan Baku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="conatainer">
            <input type="hidden" name="pilih" value="karyawan">
            <input type="hidden" name="nik" value="<?php echo $tampilKaryawan['nik'];?>">
            <div class="form-floating">
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="<?php echo $tampilKaryawan['nama_lengkap'];?>" value="<?php echo $tampilKaryawan['nama_lengkap'];?>" readonly>
              <label for="modalBahan">Nama Lengkap</label>
            </div>
            <br>
            <div class="form-floating">
              <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="<?php echo $tampilKaryawan['nama_panggilan'];?>" value="<?php echo $tampilKaryawan['nama_panggilan'];?>" readonly>
              <label for="modalBahan">Nama Panggilan</label>
            </div>
            <br>
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
