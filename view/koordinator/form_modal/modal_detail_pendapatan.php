<!-- Button trigger modal -->
<div class="d-grid gap-2 col-12 mx-auto">
  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detPendapatan">
    <i class="fas fa-eye"></i>
  </button>
</div>


<div class="modal fade" id="detPendapatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Pendapatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?
        $ambilDetPend = mysqli_query($koneksi, "SELECT * FROM cuci where waktu_bayar between '
                                                $tanggal 00:00' AND '$tanggal 23:59:59'
                                                AND status_bayar ='SUDAH'");

        if(mysqli_num_rows($ambilDetPend) > 0){
          echo "<table class='table'>
                      <thead>
                        <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>Nopol</th>
                          <th scope='col'>Kendaraan</th>
                          <th scope='col'>Jumlah Bayar</th>
                        </tr>
                      </thead>
                      <tbody>";
              $x = 1;
              $totalPend= 0;
              while ($tampilDetPend = mysqli_fetch_assoc($ambilDetPend)) {
                echo "<tr>";
                echo "<td>".$x."</td>";
                echo "<td>".$tampilDetPend['nopol']."</td>";
                echo "<td>".$tampilDetPend['nama_kendaraan']."</td>";
                echo "<td>".rupiah($tampilDetPend['jumlah_bayar'])."</td>";
                echo "</tr>";
                $totalPend = $totalPend + $tampilDetPend['jumlah_bayar'];
                $x++;
              }
              echo " </tbody>
                      <tfoot class='text-bold'>
                        <tr>
                          <td> </td>
                          <td colspan='2' class='text-center'> Total Pendapatan </td>
                          <td> ".rupiah($totalPend)."</td>
                        </tr>
                      </tfoot>
                  </table>";
          }else{
            echo "<h6> Tidak Ada Data Pendapatan </h6>";
          }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
