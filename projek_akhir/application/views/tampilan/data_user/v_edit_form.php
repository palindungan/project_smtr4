<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Head -->
    <?php $this->load->view("tampilan/_partials/head.php") ?>
    <!-- End of Head -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("tampilan/_partials/sidebar.php") ?>
        <!-- End of Sidebar / menu samping kiri -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar / bagian atas -->
                <?php $this->load->view("tampilan/_partials/toolbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <br>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
                    </div>

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
                                    <h6 class="m-0 font-weight-bold text-primary">Data User / Edit User</h6>
                                </div>
                                <div class="card-body">

                                    <!-- button menu tambah -->
                                    <a href="<?php echo base_url() . 'admin/data_user/data_tabel'; ?>" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    <!-- button menu tambah -->

                                    <!-- space antar tombol dengan table -->
                                    <div class="my-4"></div>
                                    <!-- space antar tombol dengan table -->

                                    <?php foreach ($edit_data as $d2) { ?>

                                        <form action="<?php echo base_url() . 'admin/data_user/update_aksi'; ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Kode User</label>
                                                        <input readonly="" type="text" class="form-control" id="kode_user" name="kode_user" placeholder="Kode kelas" required="" readonly="" oninvalid="this.setCustomValidity('isi Kode User')" oninput="setCustomValidity('')" value="<?php echo $d2->kode_user; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Nama user</label>
                                                        <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Jenis Kelas" required="" oninvalid="this.setCustomValidity('isi Nama user')" oninput="setCustomValidity('')" value="<?php echo $d2->nama_user; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" required="" oninvalid="this.setCustomValidity('isi Password')" oninput="setCustomValidity('')">
                                                </div>

                                                    <!-- tombol submit disini -->
                                                    <div class="form-group">
                                                        <input type="submit" value="Simpan">
                                                        <a href="<?php echo base_url() . 'admin/data_user/data_tabel'; ?>"> <input type="Button" value="Batal"></a>
                                                    </div>
                                                    <!-- tombol submit disini -->

                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" oninvalid="this.setCustomValidity('isi Username')" oninput="setCustomValidity('')" value="<?php echo $d2->username; ?>">
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Konfirmasi Password</label>
                                                    <input type="text" class="form-control" id="c_password" name="c_password" placeholder="Konfirmasi Password" required="" oninvalid="this.setCustomValidity('isi Konfirmasi Password')" oninput="setCustomValidity('')">
                                                </div>
                                            </div>

                                            </div>
                                        </form>

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
            <?php $this->load->view("tampilan/_partials/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("tampilan/_partials/scroll_top.php") ?>
    <!-- End of Scroll to Top Button -->

    <!-- Logout Modal-->
    <?php $this->load->view("tampilan/_partials/logout_modal.php") ?>
    <!-- End of Logout Modal -->

    <!-- java script -->
    <?php $this->load->view("tampilan/_partials/js.php") ?>
    <!-- End of java script -->

</body>

</html>