<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Ketentuan Paket</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Ketentuan Paket</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- bagian ISI KONTEN -->
        <div class="card">
            <div class="card-header justify-content-between">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_modal">Tambah Ketentuan</button>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <!-- data table -->
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Kode Ketentuan</th>
                            <th>Deksripsi</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbl_data as $d) {  ?>
                            <tr>
                                <td><?php echo $d->id_keterangan_paket ?></td>
                                <td><?php echo $d->deskripsi ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="javascript:void(0)" class="tombol_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d->id_keterangan_paket ?>"><i class="ik ik-edit-2"></i></a>
                                        <a href="javascript:void(0)" class="hapus" id="<?php echo $d->id_keterangan_paket ?>" name="<?php echo $d->id_keterangan_paket ?>"><i class="ik ik-trash-2"></i></a>
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
                            <h5 class="modal-title" id="demoModalLabel">Tambah Ketentuan Paket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'admin/paket/data_keterangan_paket/tambah_aksi'; ?>" method="post" class="forms-sample form_data">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInput1" class="col-sm-3 col-form-label">Kode Ketentuan</label>
                                    <div class="col-sm-9">
                                        <input name="id_keterangan_paket" type="text" class="form-control form_data1" id="exampleInput1" value="<?php echo $kode; ?>" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInput2" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <input name="deskripsi" type="text" class="form-control form_data1" id="exampleInput2" placeholder="Deskripsi">
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
                            <h5 class="modal-title" id="demoModalLabel">Edit Ketentuan Paket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url() . 'admin/paket/data_keterangan_paket/update_aksi'; ?>" method="post" class="forms-sample form_data">
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
                        url: "<?php echo base_url() . 'admin/paket/data_keterangan_paket/hapus_aksi'; ?>",
                        type: "post",
                        data: {
                            id_keterangan_paket: m
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
                url: "<?php echo base_url() . 'admin/paket/data_keterangan_paket/edit_modal'; ?>",
                type: "post",
                data: {
                    id_keterangan_paket: m
                },
                success: function(data) {
                    var obj = JSON.parse(data);

                    $('.isi_modal_edit').html(`

                    <div class="form-group row">
                        <label for="exampleInput1" class="col-sm-3 col-form-label">Kode Kategori</label>
                        <div class="col-sm-9">
                            <input name="id_keterangan_paket" type="text" class="form-control form_data1" id="exampleInput1" value="` + obj['data_tbl'][0]['id_keterangan_paket'] + `" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInput2" class="col-sm-3 col-form-label">Nama Kategori</label>
                        <div class="col-sm-9">
                            <input name="deskripsi" type="text" class="form-control form_data1" id="exampleInput2" placeholder="Deskripsi" value="` + obj['data_tbl'][0]['deskripsi'] + `">
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