<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Data Menu Makanan</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Data Menu Makanan</li>
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
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'tambah_menu') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/menu/data_menu/tambah_menu">Tambah Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'edit_menu') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/menu/data_menu/data_tabel_menu">Data Tabel Menu</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <?php foreach ($tbl_data as $d2) { ?>

                    <?php echo form_open_multipart('admin/menu/data_menu/tambah_aksi'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_menu">Kode Menu</label>
                                <input type="text" class="form-control" id="id_menu" readonly="" name="id_menu" value="<?php echo $d2->id_menu ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_menu">Nama</label>
                                <input type="text" class="form-control" id="nm_menu" placeholder="Nama" name="nm_menu">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kat">Kategori</label>
                                <select class="form-control select2" id="id_kat" name="id_kat">
                                    <option>-</option>
                                    <?php foreach ($tbl_data_kat as $d) {  ?>
                                        <option value="<?php echo $d->id_kat ?>"><?php echo $d->nm_kat ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select class="form-control" id="tipe" name="tipe">
                                    <option>-</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="dessert">Dessert</option>
                                    <option value="bonus">Bonus</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hrg_porsi">Harga Porsi</label>
                                <input type="number" class="form-control" id="hrg_porsi" placeholder="Harga" name="hrg_porsi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="gambar" class="file-upload-default" id="image_file">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Gambar">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deksripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
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