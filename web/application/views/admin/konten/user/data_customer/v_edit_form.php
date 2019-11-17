<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Data Customer</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'tambah_customer') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/user/data_customer/tambah_customer">Tambah Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'edit_customer') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/user/data_customer/data_tabel_customer">Data Tabel Customer</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <?php foreach ($tbl_data as $d) { ?>

                    <?php echo form_open_multipart('admin/user/data_customer/update_aksi'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_customer">Kode Customer</label>
                                <input type="text" class="form-control" id="id_customer" readonly="" name="id_customer" value="<?php echo $d->id_customer; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_customer">Nama</label>
                                <input type="text" class="form-control" id="nm_customer" placeholder="Nama" name="nm_customer" value="<?php echo $d->nm_customer; ?>" required="" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenkel_customer">Jenis Kelamin</label>
                                <select class="form-control" id="jenkel_customer" name="jenkel_customer" required="" oninvalid="this.setCustomValidity('Pilih Jenis Kelamin')" oninput="setCustomValidity('')">
                                    <option value="">-</option>
                                    <option value="pria" <?php if ($d->jenkel_customer == "pria") {
                                                                echo "selected";
                                                            } ?>>Pria</option>
                                    <option value="wanita" <?php if ($d->jenkel_customer == "wanita") {
                                                                echo "selected";
                                                            } ?>>Wanita</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="No Hp" name="no_hp" value="<?php echo $d->no_hp; ?>" required="" oninvalid="this.setCustomValidity('Isi No Hp')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $d->email; ?>" required="" oninvalid="this.setCustomValidity('Isi Email Dengan Benar')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php echo $d->username; ?>" required="" oninvalid="this.setCustomValidity('Isi Username')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="" oninvalid="this.setCustomValidity('Isi Password')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="c_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="c_password" placeholder="Konfirmasi Password" name="c_password" required="" oninvalid="this.setCustomValidity('Isi Konfirmasi Password')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="almt_customer">Alamat</label>
                        <textarea class="form-control" id="almt_customer" rows="3" name="almt_customer" required="" oninvalid="this.setCustomValidity('Isi Alamat')" oninput="setCustomValidity('')"><?php echo $d->almt_customer; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>

                    </form>

                <?php
                } ?>

            </div>
        </div>

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<script src="<?php echo base_url(); ?>assets/template/back/js/form-components.js"></script>

<!-- script logika -->
<script type="text/javascript">
    $(document).ready(function() {

        // deklarasi selec2 picker
        $(".select2").select2();

    });
</script>
<!-- script logika -->