<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Paket Prasmanan</h2>
                            <!-- <span>ini adalah deksripsi menu user</span> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>admin/home/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="">UI</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- bagian ISI KONTEN -->
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'tambah_paket') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/paket/data_paket/tambah_paket">Tambah Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel_paket') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/paket/data_paket/data_tabel_paket">Data Tabel Paket</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <!-- data table -->
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Kode Paket</th>
                            <th>Nama Paket</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>PK-001</td>
                        <td>Pesanan Paket 1</td>
                        <td>
                            <div class="table-actions">
                                <a href="<?php echo site_url('admin/paket/data_paket/edit_paket/' . "id_paket") ?>"><i class="ik ik-edit-2"></i></a>
                                <a href="javascript:void(0)" class="hapus" id="<?php echo "id_paket" ?>" name="<?php echo "nm_paket" ?>"><i class="ik ik-trash-2"></i></a>
                            </div>
                        </td>
                    </tbody>
                </table>


            </div>
        </div>

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>