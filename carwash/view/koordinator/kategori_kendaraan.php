<?php include "shortcut/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thahira Carwash | Koordinator | Kategori Kendaraan</title>
    <?php include "shortcut/head.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "shortcut/sidebar.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <!-- validasi form -->
                    <?php include "form_modal/query_kategori.php"; ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Kategori Cuci Kendaraan</h3>

                                    <div class="card-tools">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">
                                            <i class="fas fa-plus-square"></i> Kategori
                                        </button>

                                        <!-- Modal -->
                                        <?php include "form_modal/modal_input_kategori.php"; ?>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table id="kategori" class="table table-striped" style="width:100%">
                                        <thead class="text-center">
                                            <tr class="">
                                                <th>Jenis</th>
                                                <th>Kategori</th>
                                                <th>Service Cuci</th>
                                                <th>Upah Karyawan</th>
                                                <th>Tarif Cuci</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include "form_modal/modal_edit_kategori.php";?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section> <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">OneDSoeR</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include "shortcut/dependensi.php"; ?>
    <script>

    </script>
</body>

</html>
