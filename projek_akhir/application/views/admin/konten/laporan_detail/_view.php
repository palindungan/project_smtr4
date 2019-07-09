<html lang="en">

<head>
    <!-- bagian head -->
    <?php $this->load->view('_partials/head'); ?>
</head>

<body>
    <div class="container">

        <!-- Logo dan Alamat -->
        <div class="row">
            <?php $this->load->view('admin/konten/laporan_detail/_partials/logo_dan_alamat'); ?>
        </div>
        <!-- End of Logo dan Alamat -->

        <!-- konten -->
        <div class="row">
            <?php $this->load->view($path); ?>
        </div>
        <!-- end of konten -->

    </div>

</body>

</html>