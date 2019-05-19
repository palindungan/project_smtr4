<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Data User</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'tambah_user') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/user/data_user/tambah_user">Tambah User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel_user') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/user/data_user/data_tabel_user">Data Tabel User</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <?php echo form_open_multipart('admin/user/data_user/tambah_aksi'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_user">Kode User</label>
                            <input type="text" class="form-control" id="id_user" readonly="" name="id_user" value="<?php echo $kode; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nm_user">Nama</label>
                            <input type="text" class="form-control" id="nm_user" placeholder="Nama" name="nm_user">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenkel_user">Jenis Kelamin</label>
                            <select class="form-control" id="jenkel_user" name="jenkel_user">
                                <option>-</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="No Hp" name="no_hp">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level">
                                <option>-</option>
                                <option value="owner">Owner</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="c_password">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="c_password" placeholder="Konfirmasi Password" name="c_password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="almt_user">Alamat</label>
                    <textarea class="form-control" id="almt_user" rows="3" name="almt_user"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>

                </form>



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

        $('#upload_form').on('submit', function(e) {
            e.preventDefault();
            if ($('#image_file').val() == '') {
                alert("please select the file");
            }

            // else {
            //     $.ajax({
            //         url: "<?php echo base_url(); ?>admin/menu/data_menu/tambah_form/tambah_aksi",
            //         type: "post",
            //         data: new FormData(this),
            //         // contentType: false,
            //         // cache: false,
            //         // processData: false,
            //         success: function(data) {

            //             alert(data);
            //             console.log(data);

            //         }
            //     });
            // }
        });

    });
</script>
<!-- script logika -->