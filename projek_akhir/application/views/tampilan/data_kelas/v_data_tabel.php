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
                        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kelas</h6>
                                </div>
                                <div class="card-body">

                                    <!-- button menu tambah -->
                                    <a href="<?php echo base_url() . 'admin/data_kelas/tambah_data'; ?>" class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Tambah Kelas</span>
                                    </a>
                                    <!-- button menu tambah -->

                                    <!-- space antar tombol dengan table -->
                                    <div class="my-2"></div>
                                    <!-- space antar tombol dengan table -->

                                    <div class="table-responsive">

                                        <!-- tabel data -->
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Kode Kelas</th>
                                                                <th>Jenis Kelas</th>
                                                                <th>option</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- ISI DATA AKAN MUNCUL DISINI -->
                                                            <?php foreach ($tampil_data as $d) {  ?>
                                                                <tr>
                                                                    <td><?php echo $d->kode_kelas ?></td>
                                                                    <td><?php echo $d->jenis_kelas ?></td>
                                                                    <td>
                                                                        <div>
                                                                            <a href="<?php echo site_url('admin/data_kelas/edit_data/' . $d->kode_kelas) ?>">Edit</a>
                                                                            <a href="javascript:void(0)" class="hapus" id="<?php echo $d->kode_kelas ?>" name="<?php echo $d->jenis_kelas ?>">Hapus</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tabel data -->

                                    </div>
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

    <!-- script logika -->
    <script type="text/javascript">
        $(document).ready(function() {

            // delete dan validasinya
            $(".hapus").click(function() {
                var name = $(this).attr("name");
                var jawab = confirm("Ingin Menghapus Data " + name + " ?");
                if (jawab === true) {
                    // kita set hapus false untuk mencegah duplicate request
                    var hapus = false;
                    if (!hapus) {
                        hapus = true;
                        // ajax
                        var m = $(this).attr("id");
                        // alert(m);
                        $.ajax({
                            url: "<?php echo base_url() . 'admin/data_kelas/hapus_aksi/'; ?>",
                            type: "post",
                            data: {
                                kode_kelas: m
                            },
                            success: function(data) {
                                alert("Data " + name + " berhasil Terhapus");
                                location.reload();
                            }
                        });
                        // ajax
                        hapus = false;
                    }
                } else {
                    return false;
                }
            });
            // delete dan validasinya

        });
    </script>
    <!-- script logika -->

</body>

</html>