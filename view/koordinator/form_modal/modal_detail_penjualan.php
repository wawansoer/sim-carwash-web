<!-- Button trigger modal -->
<div class="d-grid gap-2 col-12 mx-auto">
  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detPenjualan">
    <i class="fas fa-eye"></i>
  </button>
</div>


<div class="modal fade" id="detPenjualan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Penjualan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?
        $ambilDetPenj = mysqli_query($koneksi, "SELECT minuman.nama_minuman, sum(penjualan.jumlah) as qty, sum(penjualan.total) as total
                                                from penjualan left join minuman on penjualan.id_minuman = minuman.id_minuman
                                                WHERE penjualan.status_bayar = 'Lunas' and penjualan.tgl = '$tanggal'
                                                GROUP by penjualan.id_minuman ");

        if(mysqli_num_rows($ambilDetPenj) > 0){
          echo "<table class='table'>
                      <thead>
                        <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>Nama Minuman</th>
                          <th scope='col'>Jumlah</th>
                          <th scope='col'>Total</th>
                        </tr>
                      </thead>
                      <tbody>";
              $x = 1;
              $totalPenj = 0;
              while ($tampilDetPenj = mysqli_fetch_assoc($ambilDetPenj)) {
                echo "<tr>";
                echo "<td>".$x."</td>";
                echo "<td>".$tampilDetPenj['nama_minuman']."</td>";
                echo "<td>".$tampilDetPenj['qty']."</td>";
                echo "<td>".rupiah($tampilDetPenj['total'])."</td>";
                echo "</tr>";
                $totalPenj = $totalPenj + $tampilDetPenj['total'];
                $x++;
              }
              echo " </tbody>
                    <tfoot class='text-bold'>
                      <tr>
                        <td> </td>
                        <td colspan='2' class='text-center'> Total Penjualan </td>
                        <td> ".rupiah($totalPenj)."</td>
                      </tr>
                    </tfoot>
                  </table>";
          }else{
            echo "<h6> Tidak Ada Data Penjualan </h6>";
          }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
