<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Data Tabel Pemesanan Prasmanan</h2>
                            <!-- <span>ini adalah deksripsi menu user</span> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>owner/home/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="">UI</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Menu Makanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- modal edit -->
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">View Detail Prasmanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" class="forms-sample form_data">
                            <div class="modal-body isi_modal_edit">
                                <!-- modal edit form disini -->

                                <table id="" class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Menu</th>
                                            <th class="nosort">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody class="isi_tabel">

                                    </tbody>
                                </table>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- bagian ISI KONTEN -->
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'edit_data_pending') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>owner/prasmanan/data_prasmanan/data_tabel_pending">Data Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'edit_data_belum_lunas') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>owner/prasmanan/data_prasmanan/data_tabel_belum_lunas">Data Belum Lunas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'edit_data_lunas') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>owner/prasmanan/data_prasmanan/data_tabel_lunas">Data Lunas</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <?php foreach ($tbl_prasmanan as $d2) { ?>

                    <?php echo form_open_multipart('owner/prasmanan/data_prasmanan/update_aksi'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_prasmanan">Kode Prasmanan</label>
                                <input type="text" class="form-control" id="id_prasmanan" readonly="" name="id_prasmanan" value="<?php echo $d2->id_prasmanan ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="visibility:hidden" for="detail_view">none</label>
                                <button type="button" class="form-control tombol_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d2->id_prasmanan ?>"><i class="ik ik-zoom-in"></i> Detail Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_customer">Kode Pelanggan</label>
                                <input type="text" class="form-control" id="id_customer" readonly="" name="id_customer" value="<?php echo $d2->id_customer ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_customer">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nm_customer" readonly="" name="nm_customer" value="<?php echo $d2->nm_customer ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_paket">Kode Paket</label>
                                <input type="text" class="form-control" id="id_paket" readonly="" name="id_paket" value="<?php echo $d2->id_paket ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_paket">Nama Paket</label>
                                <input type="text" class="form-control" id="nm_paket" readonly="" name="nm_paket" value="<?php echo $d2->nm_paket ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jml_porsi">Jumlah Porsi</label>
                                <input type="text" class="form-control" id="jml_porsi" readonly="" name="jml_porsi" value="<?php echo $d2->jml_porsi ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tot_biaya">Total Biaya</label>
                                <input type="text" class="form-control" id="tot_biaya" readonly="" name="tot_biaya" value="<?php echo $d2->tot_biaya ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tot_dp">Total DP</label>
                                <input type="text" class="form-control" id="tot_dp" readonly="" name="tot_dp" value="<?php echo $d2->tot_dp ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sisa_bayar">Sisa Bayar</label>
                                <input type="number" class="form-control" id="sisa_bayar" name="sisa_bayar" value="<?php echo $d2->sisa_bayar ?>" required="" oninvalid="this.setCustomValidity('isi Nominal Sisa Bayar')" oninput="setCustomValidity('')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="upload_bukti_bayar">Upload Bukti Bayar</label>
                                <input type="text" class="form-control" id="upload_bukti_bayar" readonly="" name="upload_bukti_bayar" value="<?php echo $d2->upload_bukti_bayar ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ket_acara">Keterangan Acara</label>
                                <input type="text" class="form-control" id="ket_acara" readonly="" name="ket_acara" value="<?php echo $d2->ket_acara ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_pemesanan">Tanggal Pemesanan</label>
                                <input type="text" class="form-control" id="tgl_pemesanan" readonly="" name="tgl_pemesanan" value="<?php echo $d2->tgl_pemesanan ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_pelunasan">Tanggal Pelunasan</label>
                                <input type="text" class="form-control" id="tgl_pelunasan" readonly="" name="tgl_pelunasan" value="<?php echo $d2->tgl_pelunasan ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_acara">Tanggal Acara</label>
                                <input type="text" class="form-control" id="tgl_acara" readonly="" name="tgl_acara" value="<?php echo $d2->tgl_acara ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="pending" <?php if ($d2->status == "pending") {
                                                                echo "selected";
                                                            } ?>>Pending</option>
                                    <option value="belum_lunas" <?php if ($d2->status == "belum_lunas") {
                                                                    echo "selected";
                                                                } ?>>Belum Lunas</option>
                                    <option value="lunas" <?php if ($d2->status == "lunas") {
                                                                echo "selected";
                                                            } ?>>Lunas</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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
<script>
    $(document).ready(function() {
        // deklarasi selec2 picker
        $(".select2").select2();

    });

    // untuk edit modal
    $(".tombol_edit").click(function() {

        $('.isi_tabel').html('');

        // ajax
        var m = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url() . 'owner/prasmanan/data_prasmanan/lihat_detail'; ?>",
            type: "post",
            data: {
                id_prasmanan: m
            },
            success: function(data) {

                var obj = JSON.parse(data);

                let menu_menu = obj['tbl_detail_menu'];
                let bonus_bonus = obj['tbl_detail_bonus'];

                $.each(menu_menu, function(i, data) {

                    $('.isi_tabel').append(`

                            <tr>
                                <td>` + menu_menu[i].id_menu + `</td>
                                <td>` + menu_menu[i].nm_menu + `</td>
                            </tr>

                    `);

                });

                $.each(bonus_bonus, function(j, data) {

                    $('.isi_tabel').append(`

                        <tr>
                            <td>` + bonus_bonus[j].id_bonus + `</td>
                            <td>` + bonus_bonus[j].nm_menu + `</td>
                        </tr>
                    
                    `);

                });
            }
        });
        // ajax
    });
    // end of untuk edit modal
</script>
<!-- script logika -->