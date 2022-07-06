<!-- Button trigger modal -->
<div class="d-grid gap-2 col-12 mx-auto">
  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detPanjar">
    <i class="fas fa-eye"></i>
  </button>
</div>


<div class="modal fade" id="detPanjar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Panjar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?
        $ambilDetPanj = mysqli_query($koneksi, "SELECT karyawan.nama_panggilan as nama, SUM(gaji_karyawan.jumlah) as total
                                      FROM gaji_karyawan left join karyawan on karyawan.nik  = gaji_karyawan.nik
                                      WHERE gaji_karyawan.id_trx = 'OUT221' AND gaji_karyawan.tanggal = '$tanggal'
                                      GROUP by gaji_karyawan.nik");

        if(mysqli_num_rows($ambilDetPanj) > 0){
          echo "<table class='table'>
                      <thead>
                        <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>Nama </th>
                          <th scope='col'>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>";
              $x = 1;
              $totalPanj= 0;
              while ($tampilDetPanj = mysqli_fetch_assoc($ambilDetPanj)) {
                echo "<tr>";
                echo "<td>".$x."</td>";
                echo "<td>".$tampilDetPanj['nama']."</td>";
                echo "<td>".rupiah($tampilDetPanj['total'])."</td>";
                echo "</tr>";
                $totalPanj = $totalPanj + $tampilDetPanj['total'];
                $x++;
              }
              echo " </tbody>
                      <tfoot class='text-bold'>
                        <tr>
                          <td> </td>
                          <td colspan='2' class='text-center'> Total Panjar </td>
                          <td> ".rupiah($totalPanj)."</td>
                        </tr>
                      </tfoot>
                  </table>";
          }else{
            echo "<h6> Tidak Ada Data Panjar </h6>";
          }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
