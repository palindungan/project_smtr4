<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="">
            <div class="logo-img">
                <img src="<?php echo base_url(); ?>upload/logo_catering.png" height="40" class="header-brand-img" alt="Logo">
            </div>
            <span style="margin: 10px 5px 15px 65px;" class="text">SiKat</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">

                <div class="nav-lavel">Navigation</div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'home') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>kasir/home/"><i class="ik ik-home"></i><span>Home</span></a>
                </div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'daftar_menu') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>kasir/daftar_menu/"><i class="ik ik-grid"></i><span>Daftar Menu</span></a>
                </div>

                <div class="nav-lavel">Transaksi</div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'prasmanan') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>kasir/prasmanan/tambah_prasamanan"><i class="ik ik-tag"></i><span>Pesan Prasmanan</span></a>
                </div>

            </nav>
        </div>
    </div>
</div>