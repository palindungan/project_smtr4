<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Data Bonus Menu</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Data Bonus Menu</li>
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
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'tambah_bonus') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/menu/data_bonus/tambah_bonus">Tambah Bonus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel_bonus') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/menu/data_bonus/data_tabel_bonus">Data Tabel Bonus</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <?php echo form_open_multipart('admin/menu/data_bonus/tambah_aksi'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_bonus">Kode Bonus</label>
                            <input type="text" class="form-control" id="id_bonus" readonly="" name="id_bonus" value="<?php echo $kode; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_menu">Menu</label>
                            <select class="form-control select2" id="id_menu" name="id_menu">
                                <option>-</option>
                                <?php foreach ($tbl_data_menu as $d) {  ?>
                                    <option value="<?php echo $d->id_menu ?>"><?php echo $d->nm_menu ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
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