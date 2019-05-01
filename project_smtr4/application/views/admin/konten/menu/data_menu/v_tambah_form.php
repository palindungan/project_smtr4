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
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'tambah_form') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/menu/data_menu/tambah_form">Tambah Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/menu/data_menu/data_tabel">Data Tabel Menu</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <form class="forms-sample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInput1">Kode Menu</label>
                                <input type="text" class="form-control" id="exampleInput1" readonly="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInput2">Nama</label>
                                <input type="text" class="form-control" id="exampleInput2" placeholder="Nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Kategori</label>
                                <select class="form-control select2" id="exampleSelectGender">
                                    <option>-</option>
                                    <option>Aneka1</option>
                                    <option>Aneka2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">Tipe</label>
                                <select class="form-control" id="exampleSelectGender">
                                    <option>-</option>
                                    <option>Makanan</option>
                                    <option>Dessert</option>
                                    <option>Bonus</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInput2">Harga Perporsi</label>
                                <input type="text" class="form-control" id="exampleInput2" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Deksripsi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>


            </div>
        </div>

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<!-- script logika -->
<script type="text/javascript">
    $(document).ready(function() {

        // deklarasi selec2 picker
        $(".select2").select2();

        $('#upload_form').on('submit', function(e) {
            e.preventDefault();
            if ($('#image_file').val() == '') {
                alert("please select the file");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/menu/data_menu/ajax_upload",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $('#uploaded_image').html(data);

                    }
                });
            }
        });

    });
</script>
<!-- script logika -->