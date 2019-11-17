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
                    <a href="<?php echo base_url(); ?>admin/home/"><i class="ik ik-home"></i><span>Home</span></a>
                </div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'daftar_menu') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>admin/daftar_menu/"><i class="ik ik-grid"></i><span>Daftar Menu</span></a>
                </div>

                <div class="nav-lavel">Pengolahan Data</div>
                <div class="nav-item has-sub <?php if ($this->uri->segment('2') == 'user') {
                                                    echo 'active open';
                                                } ?>">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>User</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url(); ?>admin/user/data_user/tambah_user" class="menu-item <?php if ($this->uri->segment('3') == 'data_user') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">Data User</a>
                        <a href="<?php echo base_url(); ?>admin/user/data_customer/tambah_customer" class="menu-item <?php if ($this->uri->segment('3') == 'data_customer') {
                                                                                                                            echo 'active';
                                                                                                                        } ?>">Data Customer</a>
                    </div>
                </div>
                <div class="nav-item has-sub <?php if ($this->uri->segment('2') == 'menu') {
                                                    echo 'active open';
                                                } ?>">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Menu</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url(); ?>admin/menu/data_menu/tambah_menu" class="menu-item <?php if ($this->uri->segment('3') == 'data_menu') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">Data Menu</a>
                        <a href="<?php echo base_url(); ?>admin/menu/data_bonus/tambah_bonus" class="menu-item <?php if ($this->uri->segment('3') == 'data_bonus') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">Data Bonus</a>
                        <a href="<?php echo base_url(); ?>admin/menu/data_kategori/tambah_kategori" class="menu-item <?php if ($this->uri->segment('3') == 'data_kategori') {
                                                                                                                            echo 'active';
                                                                                                                        } ?>">Data Kategori</a>
                    </div>
                </div>
                <div class="nav-item has-sub <?php if ($this->uri->segment('2') == 'paket') {
                                                    echo 'active open';
                                                } ?>">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Paket</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url(); ?>admin/paket/data_paket/tambah_paket" class="menu-item <?php if ($this->uri->segment('3') == 'data_paket') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">Data Paket</a>
                        <a href="<?php echo base_url(); ?>admin/paket/data_keterangan_paket/tambah_keterangan_paket/" class="menu-item <?php if ($this->uri->segment('3') == 'data_keterangan_paket') {
                                                                                                                                            echo 'active';
                                                                                                                                        } ?>">Data Keterangan Paket</a>
                    </div>
                </div>

                <div class="nav-lavel">Transaksi</div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'data_prasmanan') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>admin/prasmanan/data_prasmanan/data_tabel_pending"><i class="ik ik-tag"></i><span>Prasmanan</span></a>
                </div>

                <div class="nav-lavel">Extra</div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'laporan') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>admin/laporan/"><i class="ik ik-bar-chart-2"></i><span>Laporan</span></a>
                </div>

            </nav>
        </div>
    </div>
</div>