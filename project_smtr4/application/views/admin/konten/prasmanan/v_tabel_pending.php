<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Data Tabel Prasmanan</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Prasmanan</li>
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
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel_pending') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/prasmanan/data_prasmanan/data_tabel_pending">Data Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel_belum_lunas') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/prasmanan/data_prasmanan/data_tabel_belum_lunas">Data Belum Lunas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment('4') == 'data_tabel_lunas') {
                                                echo 'active';
                                            } ?>" href="<?php echo base_url(); ?>admin/prasmanan/data_prasmanan/data_tabel_lunas">Data Lunas</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <!-- disini isinya konten -->

                <!-- data table -->
                <table id="data_table" class="table">

                    <thead>
                        <tr>
                            <th>Kode Prasmanan</th>
                            <th>Nama Customer</th>
                            <th>Nama Paket</th>
                            <th>Status</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbl_data_prasmanan_pending as $d) {  ?>
                            <tr>
                                <td><?php echo $d->id_prasmanan ?></td>
                                <td><?php echo $d->nm_customer ?></td>
                                <td><?php echo $d->nm_paket ?></td>
                                <td><?php echo $d->status ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo site_url('admin/prasmanan/data_prasmanan/edit_data_pending/' . $d->id_prasmanan) ?>"><i class="ik ik-eye"></i></a>
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
                        url: "<?php echo base_url() . 'admin/user/data_user/hapus_aksi'; ?>",
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

    });
</script>
<!-- script logika -->