<div class="main-content">
    <div class="container-fluid">

        <!-- bagian PAGE HEADER -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-command bg-blue"></i>
                        <div class="d-inline">
                            <h2>Laporan</h2>
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
        <div class="col-xs-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3> <strong>Cetak Laporan</strong> <small>Berdasarkan Tanggal</small></h3>

                </div>
                <div class="card-body card-block">

                    <form action="mpdf/laporan/cetak_laporan.php" target="_black" method="post">

                        <label class=" form-control-label">
                            <h6>Mulai</h6>
                        </label>
                        <div class="row">
                            <div class="col-sm-8 col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-calendar"></i></label>
                                    </span>
                                    <input type="date" name="date1" class="form-control" required="">
                                </div>
                            </div>
                        </div>

                        <label class=" form-control-label">
                            <h6>Hingga</h6>
                        </label>
                        <div class="row">
                            <div class="col-sm-8 col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-calendar"></i></label>
                                    </span>
                                    <input type="date" name="date2" class="form-control" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <button type="submit" class="btn btn-info mb-1"><i class="ik ik-printer"></i> CETAK</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>