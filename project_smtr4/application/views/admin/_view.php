<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- bagian HEAD -->
    <?php $this->load->view('admin/_partials/head'); ?>
</head>

<body>
    <div class="wrapper">

        <!-- bagian HEADER -->
        <?php $this->load->view('admin/_partials/header'); ?>

        <div class="page-wrap">

            <!-- bagian SIDEBAR KIRI -->
            <?php $this->load->view('admin/_partials/left_sidebar'); ?>

            <!-- bagian KONTEN UTAMA -->
            <?php $this->load->view($path); ?>

            <!-- bagian SIDEBAR KANAN -->
            <?php $this->load->view('admin/_partials/right_sidebar'); ?>

            <!-- bagian CHAT SIDEBAR KANAN -->
            <?php $this->load->view('admin/_partials/chat_sidebar'); ?>

            <!-- bagian FOOTER -->


        </div>
    </div>

    <!-- bagian SCRIPT -->
    <?php $this->load->view('admin/_partials/script'); ?>
</body>

</html>