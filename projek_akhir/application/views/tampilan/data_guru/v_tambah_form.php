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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Data Barang / Tambah Barang</h6>
                                </div>
                                <div class="card-body">

                                    <!-- button menu tambah -->
                                    <a href="<?php echo base_url() . 'admin/data_guru/data_tabel'; ?>" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                    <!-- button menu tambah -->

                                    <!-- space antar tombol dengan table -->
                                    <div class="my-4"></div>
                                    <!-- space antar tombol dengan table -->

                                    <form action="<?php echo base_url() . 'admin/data_guru/tambah_aksi'; ?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input type="text" class="form-control" id="NIP" name="NIP" placeholder="NIP" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama Guru" value="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Jenis Kelamin</label>
                                                    <select class="form-control select2" id="jk" name="jk" required="">
                                                        <option value="">-</option>
                                                        <option value="L">L</option>
                                                        <option value="P">P</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="3"></textarea>
                                                </div>

                                                <!-- tombol submit disini -->
                                                <div class="form-group">
                                                    <input type="submit" value="Simpan">
                                                    <a href="<?php echo base_url() . 'admin/data_guru/tambah_data'; ?>"> <input type="Button" value="Batal"></a>
                                                </div>
                                                <!-- tombol submit disini -->

                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Hp</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilih Mapel</label>
                                                    <select class="form-control select2" id="kode_mapel" name="kode_mapel" required="">
                                                        <option value="">-</option>
                                                        <?php foreach ($data_mapel as $d) {  ?>
                                                            <option value="<?php echo $d->kode_mapel ?>"><?php echo $d->nama_mapel ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilih Kelas</label>
                                                    <select class="form-control select2" id="kode_kelas" name="kode_kelas" required="">
                                                        <option value="">-</option>
                                                        <?php foreach ($data_kelas as $d) {  ?>
                                                            <option value="<?php echo $d->kode_kelas ?>"><?php echo $d->jenis_kelas ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                    </form>

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