<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php $this->load->view("admin/_partials/head.php") ?>
    <!-- End of Head -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar / menu samping kiri -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar / bagian atas -->
                <?php $this->load->view("admin/_partials/toolbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Barang</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Isi konten -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">

                            <!-- tabel data -->
                            <table style="margin:20px auto;" border="1">
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php 
                                foreach ($tbl_barang as $u) {
                                    ?>
                                <tr>
                                    <td><?php echo $u->id_barang ?></td>
                                    <td><?php echo $u->nm_barang ?></td>
                                    <td><?php echo $u->desk_barang ?></td>
                                    <td><?php echo $u->stok_barang ?></td>
                                    <td><?php echo $u->hrg_barang ?></td>
                                    <td>

                                        <!-- fungsi hyperlink pada CI 3 -->
                                        <?php echo anchor('admin/Barang/edit/' . $u->id_barang, 'Edit'); ?>
                                        <?php echo anchor('admin/Barang/hapus/' . $u->id_barang, 'Hapus'); ?>
                                        <!-- fungsi hyperlink pada CI 3 -->

                                    </td>
                                </tr>
                                <?php 
                            } ?>
                            </table>
                            <!-- tabel data -->

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-4">

                            <!-- form inputan data -->
                            <form action="<?php echo base_url() . 'admin/Barang/tambah_aksi'; ?>" method="post">
                                <table style="margin:20px auto;">
                                    <tr>
                                        <td>Kode Barang :</td>
                                        <td><input type="text" name="id_barang"></td>
                                    </tr>
                                    <tr>
                                        <td>Nama :</td>
                                        <td><input type="text" name="nm_barang"></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi :</td>
                                        <td><input type="text" name="desk_barang"></td>
                                    </tr>
                                    <tr>
                                        <td>Stok :</td>
                                        <td><input type="text" name="stok_barang"></td>
                                    </tr>
                                    <tr>
                                        <td>Harga :</td>
                                        <td><input type="text" name="hrg_barang"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Tambah"></td>
                                    </tr>
                                </table>
                            </form>
                            <!-- form inputan data -->

                        </div>

                    </div>
                    <!-- End of Isi konten-->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scroll_top.php") ?>
    <!-- End of Scroll to Top Button -->

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_partials/logout_modal.php") ?>
    <!-- End of Logout Modal -->

    <!-- java script -->
    <?php $this->load->view("admin/_partials/js.php") ?>
    <!-- End of java script -->

</body>

</html> 