<!doctype html>
<html class="no-js" lang="en">

<head>

    <!-- bagian head -->
    <?php $this->load->view('_partials/head'); ?>

</head>

<body>

    <!-- konten -->
    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('<?php echo base_url(); ?>upload/bg_login.jpg')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo">
                            <a href=""><img src="<?php echo base_url(); ?>upload/logo_catering.png" style="margin: 10px 5px 15px 10px;" width="300" alt=""></a>
                        </div>
                        <h3>Masuk Ke Dalam Website</h3>
                        <form action="<?php echo base_url('login/login/aksi_login'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required="" name="username">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required="" name="password">
                                <i class="ik ik-lock"></i>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of konten -->

    <!-- bagian script -->
    <?php $this->load->view('_partials/script'); ?>
</body>

</html>