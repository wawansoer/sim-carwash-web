<?php
$dataKaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan
  left join pengguna on pengguna.nik = karyawan.nik
  left join jabatan on pengguna.id_jabatan = jabatan.id_jabatan
  WHERE pengguna.id_jabatan = 1004");
  while ($tabelKaryawan = mysqli_fetch_assoc($dataKaryawan)) {
    echo "<tr data-expanded='false'>";
    echo "<td>" . $tabelKaryawan['nama_lengkap'] . "</td>";
    echo "<td>" . $tabelKaryawan['nama_panggilan'] . "</td>";
    echo "<td>" . $tabelKaryawan['tanggal_lahir'] . "</td>";
    echo "<td>" . $tabelKaryawan['alamat'] . "</td>";
    echo "<td>" . $tabelKaryawan['nomor_handphone'] . "</td>";
    echo "<td>" . $tabelKaryawan['status'] . "</td>";
    ?>
    <td>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $tabelKaryawan['nik'];?>">
        <i class="fas fa-edit"></i>
      </button>

      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $tabelKaryawan['nik'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form class="form-floating" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rubah Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="pilih" value="003" >
                <input type="hidden" name="nik2" value="<?php echo $tabelKaryawan['nik'];?>">
                <input type="hidden" name="nama_lengkap" value="<?php echo $tabelKaryawan['nama_lengkap'];?>">
                <div class="form-floating">
                  <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<? echo $tabelKaryawan['nama_lengkap'];?>" disabled>
                  <label for="namaLengkap">Nama Lengkap</label>
                </div>
                <br>
                <div class="form-floating">
                  <input type="text" class="form-control" id="nama" name="nama" value="<? echo $tabelKaryawan['nama_panggilan'];?>" disabled>
                  <label for="nama">Nama Panggilan</label>
                </div>
                <br>
                <div class="form-floating">
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<? echo $tabelKaryawan['alamat'];?>" disabled>
                  <label for="alamat">Alamat</label>
                </div>
                <br>
                <div class="form-floating">
                  <input type="text" class="form-control" id="noHp" name="noHp" value="<? echo $tabelKaryawan['nomor_handphone'];?>" disabled>
                  <label for="noHp">Nomor Kontak</label>
                </div>
                <br>
                <div class="form-floating">
                  <select class="form-select" id="jabatan" name="jabatan" required>
                    <option selected value="<?echo $tabelKaryawan['id_jabatan']?>"><?echo $tabelKaryawan['nama_jabatan']?></option>
                    <option value="1003">Koordinator</option>
                    <option value="1004">Karyawan Cuci</option>
                    <option value="1005">Calon Karyawan</option>
                  </select>
                  <label for="jabatan">Jabatan</label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
    <?
    echo "</tr>";
  }
  ?>
