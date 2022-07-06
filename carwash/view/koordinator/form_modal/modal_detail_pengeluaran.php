<!-- Button trigger modal -->
<div class="d-grid gap-2 col-12 mx-auto">
  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detPengeluaran">
    <i class="fas fa-eye"></i>
  </button>
</div>


<div class="modal fade" id="detPengeluaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Pengeluaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?
        $ambilDetPeng = mysqli_query($koneksi, "SELECT keterangan as ket, jumlah_pengeluaran as jml FROM pengeluaran
                                                WHERE jenis_pengeluaran = 'Bonus Karyawan' OR jenis_pengeluaran = 'Lainnya'
                                                AND tanggal = '$tanggal'");

        if(mysqli_num_rows($ambilDetPeng) > 0){
          echo "<table class='table'>
                      <thead>
                        <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>Keterangan</th>
                          <th scope='col'>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>";
              $x = 1;
              $totalPeng = 0;
              while ($tampilDetPeng = mysqli_fetch_assoc($ambilDetPeng)) {
                echo "<tr>";
                echo "<td>".$x."</td>";
                echo "<td>".$tampilDetPeng['ket']."</td>";
                echo "<td>".rupiah($tampilDetPeng['jml'])."</td>";
                echo "</tr>";
                $totalPeng = $totalPeng + $tampilDetPeng['jml'];
                $x++;
              }
              echo " </tbody>
                    <tfoot class='text-bold'>
                      <tr>
                        <td> </td>
                        <td class='text-center'> Total Pengeluaran </td>
                        <td> ".rupiah($totalPeng)."</td>
                      </tr>
                    </tfoot>
                  </table>";
          }else{
            echo "<h6> Tidak Ada Data Pengeluaran </h6>";
          }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
