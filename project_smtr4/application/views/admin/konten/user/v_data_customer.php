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
            <div class="card-header justify-content-between">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_modal">Tambah Customer</button>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <!-- data table -->
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Kode Customer</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbl_data as $d) {  ?>
                            <tr>
                                <td><?php echo $d->id_customer ?></td>
                                <td><?php echo $d->nm_customer ?></td>
                                <td><?php echo $d->almt_customer ?></td>
                                <td><?php echo $d->jenkel_customer ?></td>
                                <td><?php echo $d->no_hp ?></td>
                                <td><?php echo $d->email ?></td>
                                <td><?php echo $d->username ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="javascript:void(0)" class="tombol_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d->id_customer ?>"><i class="ik ik-edit-2"></i></a>
                                        <a href="javascript:void(0)" class="hapus" id="<?php echo $d->id_customer ?>" name="<?php echo $d->nm_customer ?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- bagian modal -->

        <!-- modal tambah -->
        <div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Tambah Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'admin/user/data_customer/tambah_aksi'; ?>" method="post" class="forms-sample form_data">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInput1" class="col-sm-3 col-form-label">Kode Customer</label>
                                    <div class="col-sm-9">
                                        <input name="id_customer" type="text" class="form-control form_data1" id="exampleInput1" value="<?php echo $kode; ?>" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput2" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input name="nm_customer" type="text" class="form-control form_data1" id="exampleInput2" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="almt_customer" class="form-control form_data1" id="exampleInput3" rows="3" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput4" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jenkel_customer" class="form-control form_data1" id="exampleInput4">
                                            <option value="">-</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput9" class="col-sm-3 col-form-label">No Telepon</label>
                                    <div class="col-sm-9">
                                        <input name="no_hp" type="text" class="form-control form_data1" id="exampleInput9" placeholder="No Telepon">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput10" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control form_data1" id="exampleInput10" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput5" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input name="username" type="text" class="form-control form_data1" id="exampleInput5" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput6" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input name="password" type="password" class="form-control form_data1" id="exampleInput6" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput7" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control form_data1" id="exampleInput7" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal edit -->
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Edit Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'admin/user/data_customer/update_aksi'; ?>" method="post" class="forms-sample form_data">
                            <div class="modal-body isi_modal_edit">
                                <!-- modal edit form disini -->
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-2" onclick="return confirm('Ingin Mengupdate Data ?');">Update</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- end of bagian modal -->

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<!-- script logika -->
<script type="text/javascript">
    $(document).ready(function() {

        // delete dan validasinya
        $(".hapus").click(function() {
            var name = $(this).attr("name");
            var jawab = confirm("Ingin Menghapus Data " + name + " ?");
            if (jawab === true) {
                // kita set hapus false untuk mencegah duplicate request
                var hapus = false;
                if (!hapus) {
                    hapus = true;
                    // ajax
                    var m = $(this).attr("id");
                    // alert(m);
                    $.ajax({
                        url: "<?php echo base_url() . 'admin/user/data_customer/hapus_aksi'; ?>",
                        type: "post",
                        data: {
                            id_customer: m
                        },
                        success: function(data) {
                            alert("Data " + name + " berhasil Terhapus");
                            location.reload();
                        }
                    });
                    // ajax
                    hapus = false;
                }
            } else {
                return false;
            }
        });
        // end of delete dan validasinya

        // untuk edit modal
        $(".tombol_edit").click(function() {
            // ajax
            var m = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'admin/user/data_customer/edit_modal'; ?>",
                type: "post",
                data: {
                    id_customer: m
                },
                success: function(data) {
                    var obj = JSON.parse(data);

                    var pria = "";
                    var wanita = "";
                    if (obj['data_tbl'][0]['jenkel_customer'] == "pria") {
                        pria = "selected";
                    }
                    if (obj['data_tbl'][0]['jenkel_customer'] == "wanita") {
                        wanita = "selected";
                    }

                    $('.isi_modal_edit').html(`

                    <div class="form-group row">
                        <label for="exampleInput1" class="col-sm-3 col-form-label">Kode Customer</label>
                        <div class="col-sm-9">
                            <input name="id_customer" type="text" class="form-control form_data1" id="exampleInput1" value="` + obj['data_tbl'][0]['id_customer'] + `" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput2" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input name="nm_customer" type="text" class="form-control form_data1" id="exampleInput2" placeholder="Nama" value="` + obj['data_tbl'][0]['nm_customer'] + `">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput3" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="almt_customer" class="form-control form_data1" id="exampleInput3" rows="3" placeholder="Alamat">` + obj['data_tbl'][0]['almt_customer'] + `</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput4" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select name="jenkel_customer" class="form-control form_data1" id="exampleInput4">
                                <option value="">-</option>
                                <option value="pria" ` + pria + `>Pria</option>
                                <option value="wanita" ` + wanita + `>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput9" class="col-sm-3 col-form-label">No Telepon</label>
                        <div class="col-sm-9">
                            <input name="no_hp" type="text" class="form-control form_data1" id="exampleInput9" placeholder="No Telepon" value="` + obj['data_tbl'][0]['no_hp'] + `">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput10" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control form_data1" id="exampleInput10" placeholder="Email" value="` + obj['data_tbl'][0]['email'] + `">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput5" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input name="username" type="text" class="form-control form_data1" id="exampleInput5" placeholder="Username" value="` + obj['data_tbl'][0]['username'] + `">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput6" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input name="password" type="password" class="form-control form_data1" id="exampleInput6" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput7" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control form_data1" id="exampleInput7" placeholder="Konfirmasi Password">
                        </div>
                    </div>

                    `);
                }
            });
            // ajax
        });
        // end of untuk edit modal

    });
</script>
<!-- script logika -->