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
            <div class="card-header justify-content-between">
                <!-- <h3>Judul Menu User</h3> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_modal">Tambah User</button>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <!-- data table -->
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Kode User</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbl_data_user as $d) {  ?>
                            <tr>
                                <td><?php echo $d->id_user ?></td>
                                <td><?php echo $d->nm_user ?></td>
                                <td><?php echo $d->almt_user ?></td>
                                <td><?php echo $d->jenkel_user ?></td>
                                <td><?php echo $d->username ?></td>
                                <td><?php echo $d->level ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="javascript:void(0)" class="tombol_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d->id_user ?>"><i class="ik ik-edit-2"></i></a>
                                        <a href="javascript:void(0)" class="hapus" id="<?php echo $d->id_user ?>" name="<?php echo $d->nm_user ?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- bagian modal -->

        <!-- modal tambah_user -->
        <div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Tambah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'admin/data_user/tambah_aksi'; ?>" method="post" class="forms-sample form_data">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInput1" class="col-sm-3 col-form-label">Kode User</label>
                                    <div class="col-sm-9">
                                        <input name="id_user" type="text" class="form-control form_data1" id="exampleInput1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput2" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input name="nm_user" type="text" class="form-control form_data1" id="exampleInput2" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="almt_user" class="form-control form_data1" id="exampleInput3" rows="3" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput4" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jenkel_user" class="form-control form_data1" id="exampleInput4">
                                            <option value="">-</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
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
                                <div class="form-group row">
                                    <label for="exampleInput8" class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select name="level" id="exampleInput8" name="level" class="form-control form_data1">
                                            <option value="">-</option>
                                            <option value="owner">Owner</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
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

        <!-- modal edit user -->
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'admin/data_user/tambah_aksi'; ?>" method="post" class="forms-sample form_data">
                            <div class="modal-body isi_modal_edit">

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

        <!-- end of bagian modal -->

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>

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
                        url: "<?php echo base_url() . 'admin/data_user/hapus_aksi'; ?>",
                        type: "post",
                        data: {
                            id_user: m
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
            // alert(m);
            $.ajax({
                url: "<?php echo base_url() . 'admin/data_user/edit_modal'; ?>",
                type: "post",
                data: {
                    id_user: m
                },
                success: function(data) {
                    let result = data.tbl_user;

                    alert(result);

                    //     $('.isi_modal_edit').html(`

                    //     <div class="form-group row">
                    //         <label for="exampleInput1" class="col-sm-3 col-form-label">Kode User</label>
                    //         <div class="col-sm-9">
                    //             <input name="id_user" type="text" class="form-control form_data1" id="exampleInput1" value="` + data.tbl_user + `">
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput2" class="col-sm-3 col-form-label">Nama</label>
                    //         <div class="col-sm-9">
                    //             <input name="nm_user" type="text" class="form-control form_data1" id="exampleInput2" placeholder="Nama">
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput3" class="col-sm-3 col-form-label">Alamat</label>
                    //         <div class="col-sm-9">
                    //             <textarea name="almt_user" class="form-control form_data1" id="exampleInput3" rows="3" placeholder="Alamat"></textarea>
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput4" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    //         <div class="col-sm-9">
                    //             <select name="jenkel_user" class="form-control form_data1" id="exampleInput4">
                    //                 <option value="">-</option>
                    //                 <option value="pria">Pria</option>
                    //                 <option value="wanita">Wanita</option>
                    //             </select>
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput5" class="col-sm-3 col-form-label">Username</label>
                    //         <div class="col-sm-9">
                    //             <input name="username" type="text" class="form-control form_data1" id="exampleInput5" placeholder="Username">
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput6" class="col-sm-3 col-form-label">Password</label>
                    //         <div class="col-sm-9">
                    //             <input name="password" type="password" class="form-control form_data1" id="exampleInput6" placeholder="Password">
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput7" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                    //         <div class="col-sm-9">
                    //             <input type="password" class="form-control form_data1" id="exampleInput7" placeholder="Konfirmasi Password">
                    //         </div>
                    //     </div>
                    //     <div class="form-group row">
                    //         <label for="exampleInput8" class="col-sm-3 col-form-label">Level</label>
                    //         <div class="col-sm-9">
                    //             <select name="level" id="exampleInput8" name="level" class="form-control form_data1">
                    //                 <option value="">-</option>
                    //                 <option value="owner">Owner</option>
                    //                 <option value="admin">Admin</option>
                    //                 <option value="kasir">Kasir</option>
                    //             </select>
                    //         </div>
                    //     </div>

                    // `);
                }
            });
            // ajax
        });
        // end of untuk edit modal

    });
</script>
<!-- script logika -->