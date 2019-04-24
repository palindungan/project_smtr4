<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
                <img src="<?php echo base_url(); ?>assets/template/back/src/img/brand-white.svg" class="header-brand-img" alt="lavalite">
            </div>
            <span class="text">ThemeKit</span>
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
                    <a href="<?php echo base_url(); ?>admin/home/"><i class="ik ik-bar-chart-2"></i><span>Home</span></a>
                </div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'daftar_menu') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>admin/daftar_menu/"><i class="ik ik-bar-chart-2"></i><span>Daftar Menu</span></a>
                </div>

                <div class="nav-lavel">Pengolahan Data</div>
                <div class="nav-item <?php if ($this->uri->segment('2') == 'data_user') {
                                            echo 'active';
                                        } ?>">
                    <a href="<?php echo base_url(); ?>admin/data_user/"><i class="ik ik-bar-chart-2"></i><span>Data User</span></a>
                </div>
                <div class="nav-item has-sub <?php if ($this->uri->segment('2') == 'menu') {
                                                    echo 'active open';
                                                } ?>">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Menu</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url(); ?>admin/menu/data_menu/" class="menu-item <?php if ($this->uri->segment('3') == 'data_menu') {
                                                                                                        echo 'active';
                                                                                                    } ?>">Data Menu</a>
                        <a href="<?php echo base_url(); ?>admin/menu/data_bonus/" class="menu-item <?php if ($this->uri->segment('3') == 'data_bonus') {
                                                                                                        echo 'active';
                                                                                                    } ?>">Data Bonus</a>
                        <a href="<?php echo base_url(); ?>admin/menu/data_kategori/" class="menu-item <?php if ($this->uri->segment('3') == 'data_kategori') {
                                                                                                            echo 'active';
                                                                                                        } ?>">Data Kategori</a>
                    </div>
                </div>
                <div class="nav-item has-sub <?php if ($this->uri->segment('2') == 'paket') {
                                                    echo 'active open';
                                                } ?>">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Paket</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo base_url(); ?>admin/paket/data_paket/" class="menu-item <?php if ($this->uri->segment('3') == 'data_paket') {
                                                                                                        echo 'active';
                                                                                                    } ?>">Data Paket</a>
                        <a href="<?php echo base_url(); ?>admin/paket/data_keterangan_paket/" class="menu-item <?php if ($this->uri->segment('3') == 'data_keterangan_paket') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">Data Keterangan Paket</a>
                    </div>
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