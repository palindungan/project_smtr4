<!doctype html>
<html class="no-js" lang="en">

<head>

    <!-- bagian head -->
    <?php $this->load->view('admin/_partials/head'); ?>

</head>

<body>

    <div class="wrapper">

        <!-- bagian header -->
        <?php $this->load->view('admin/_partials/header'); ?>

        <div class="page-wrap">

            <!-- bagian left_sidebar -->
            <?php $this->load->view('admin/_partials/left_sidebar'); ?>

            <!-- bagian isi konten -->
            <?php $this->load->view($path); ?>

            <!-- bagian chat sistem -->

            <!-- bagian right_sidebar_chat -->
            <?php $this->load->view('admin/_partials/right_sidebar_chat'); ?>

            <!-- bagian isi chat -->
            <?php $this->load->view('admin/_partials/isi_chat'); ?>

            <!-- end of bagian chat sistem -->

            <!-- bagian footer -->
            <!-- <?php $this->load->view('admin/_partials/footer'); ?> -->

        </div>
    </div>

    <!-- bagian modal_pilihan_menu -->
    <?php $this->load->view('admin/_partials/modal_pilihan_menu'); ?>

    <!-- bagian script -->
    <?php $this->load->view('admin/_partials/script'); ?>
</body>

</html>