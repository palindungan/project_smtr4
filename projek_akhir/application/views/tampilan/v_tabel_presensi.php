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
                        <h1 class="h3 mb-0 text-gray-800">Tabel Presensi</h1>
                    </div>

                    <!-- Isi konten -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <h2>ini baris konten 1 kolom 1</h2>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <h2>ini baris konten 2 kolom 1</h2>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <h2>ini baris konten 2 kolom 2</h2>
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