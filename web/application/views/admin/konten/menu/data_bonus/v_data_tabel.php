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

                <!-- data table -->
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Kode Bonus</th>
                            <th>Nama Bonus</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbl_data as $d) {  ?>
                            <tr>
                                <td><?php echo $d->id_bonus ?></td>
                                <td><?php echo $d->nm_menu ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo site_url('admin/menu/data_bonus/edit_bonus/' . $d->id_bonus) ?>"><i class="ik ik-edit-2"></i></a>
                                        <a href="javascript:void(0)" class="hapus" id="<?php echo $d->id_bonus ?>" name="<?php echo $d->nm_menu ?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


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
                        url: "<?php echo base_url() . 'admin/menu/data_bonus/hapus_aksi'; ?>",
                        type: "post",
                        data: {
                            id_bonus: m
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

    });
</script>
<!-- script logika -->