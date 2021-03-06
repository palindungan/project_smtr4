<?php

if ($this->session->userdata('status') != "login" || $this->session->userdata('level') != $this->uri->segment('1')) {
    redirect('login/login/logout');
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <!-- bagian head -->
    <?php $this->load->view('_partials/head'); ?>

</head>

<body>

    <div class="wrapper">

        <!-- bagian header -->
        <?php $this->load->view('_partials/header'); ?>

        <div class="page-wrap">

            <!-- bagian left_sidebar -->
            <?php

            if ($this->session->userdata('level') == "admin") {
                $this->load->view('_partials/left_sidebar_admin');
            }
            if ($this->session->userdata('level') == "owner") {
                $this->load->view('_partials/left_sidebar_owner');
            }
            if ($this->session->userdata('level') == "kasir") {
                $this->load->view('_partials/left_sidebar_kasir');
            }

            ?>

            <!-- bagian isi konten -->
            <?php $this->load->view($path); ?>

            <!-- bagian chat sistem -->

            <!-- bagian right_sidebar_chat -->
            <?php $this->load->view('_partials/right_sidebar_chat'); ?>

            <!-- bagian isi chat -->
            <?php $this->load->view('_partials/isi_chat'); ?>

            <!-- end of bagian chat sistem -->



        </div>
    </div>

    <!-- bagian modal_pilihan_menu -->
    <?php $this->load->view('_partials/modal_pilihan_menu'); ?>

    <!-- bagian script -->
    <?php $this->load->view('_partials/script'); ?>
</body>

</html>