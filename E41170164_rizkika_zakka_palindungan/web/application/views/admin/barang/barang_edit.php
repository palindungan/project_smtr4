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

                    <!-- Isi konten -->

                    <div class="row">
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
                                information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                                    DataTables documentation</a>.</p> -->

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Barang / Edit Barang</h6>
                                </div>
                                <div class="card-body">

                                    <!-- button menu tambah -->
                                    <a href="<?php echo base_url() . 'admin/Barang'; ?>" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    <!-- button menu tambah -->

                                    <!-- space antar tombol dengan table -->
                                    <div class="my-4"></div>
                                    <!-- space antar tombol dengan table -->

                                    <!-- form inputan data -->

                                    <?php foreach ($tbl_barang1 as $u1) { ?>

                                    <form action="<?php echo base_url() . 'admin/Barang/update'; ?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>Kode Barang</label>
                                                    <input type="text" readonly="" class="form-control" name="id_barang" placeholder="Kode Barang" value="<?php echo $u1->id_barang; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <input type="text" class="form-control" name="nm_barang" placeholder="Nama Barang" value="<?php echo $u1->nm_barang; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea class="form-control" name="desk_barang" placeholder="Deskripsi" rows="3"><?php echo $u1->desk_barang; ?></textarea>
                                                </div>

                                                <!-- tombol submit disini -->
                                                <div class="form-group">
                                                    <input type="submit" value="Update">
                                                    <a href="<?php echo base_url() . 'admin/Barang'; ?>"> Batal</a>
                                                </div>
                                                <!-- tombol submit disini -->

                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>Stok Barang</label>
                                                    <input type="number" class="form-control" name="stok_barang" placeholder="Stok Barang" value="<?php echo $u1->stok_barang; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Stok Barang</label>
                                                    <input type="number" class="form-control" name="hrg_barang" placeholder="Stok Barang" value="<?php echo $u1->hrg_barang; ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                    <!-- form inputan data -->

                                    <?php 
                                } ?>

                                </div>
                            </div>

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