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

                        <?php foreach ($tbl_data_paket as $d) {  ?>
                            <tr>
                                <td><?php echo $d->id_paket ?></td>
                                <td><?php echo $d->nm_paket ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="javascript:void(0)" class="tombol_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d->id_paket ?>"><i class="ik ik-eye"></i></a>
                                        <a href="javascript:void(0)" class="hapus" id="<?php echo $d->id_paket ?>" name="<?php echo $d->nm_paket ?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>

        <!-- modal edit -->
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">View Paket</h5>
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
                        url: "<?php echo base_url() . 'admin/paket/data_paket/hapus_aksi'; ?>",
                        type: "post",
                        data: {
                            id_paket: m
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

            $('.isi_tabel').html('');

            // ajax
            var m = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'admin/paket/data_paket/edit_modal'; ?>",
                type: "post",
                data: {
                    id_paket: m
                },
                success: function(data) {

                    var obj = JSON.parse(data);

                    let menu_menu = obj['tbl_data_paket_menu'];
                    let bonus_bonus = obj['tbl_data_paket_bonus'];

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

    });
</script>
<!-- script logika -->