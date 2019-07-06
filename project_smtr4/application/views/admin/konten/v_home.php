<?php
foreach ($CountPenggunaWeb as $d) {
    $GetCountUserWeb = $d->GetCountUserWeb;
}

foreach ($CountPenggunaAndroid as $d) {
    $GetCountUserAndroid = $d->GetCountUserAndroid;
}

foreach ($CountMenu as $d) {
    $GetCountMenu = $d->GetCountMenu;
}

foreach ($CountBonus as $d) {
    $GetCountBonus = $d->GetCountBonus;
}

foreach ($CountKategori as $d) {
    $GetCountKategori = $d->GetCountKategori;
}

foreach ($CountPaket as $d) {
    $GetCountPaket = $d->GetCountPaket;
}

foreach ($CountKeterangan as $d) {
    $GetCountKeterangan = $d->GetCountKeterangan;
}

?>

<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Pengguna Web</h6>
                                <h2 class="counter-count"><?php echo $GetCountUserWeb; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-award"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Pengguna Android</h6>
                                <h2 class="counter-count"><?php echo $GetCountUserAndroid; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-thumbs-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Menu Makanan</h6>
                                <h2 class="counter-count"><?php echo $GetCountMenu; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Menu Bonus</h6>
                                <h2 class="counter-count"><?php echo $GetCountBonus; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-message-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Kategori Makanan</h6>
                                <h2 class="counter-count"><?php echo $GetCountKategori; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-award"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Paket Prasmanan</h6>
                                <h2 class="counter-count"><?php echo $GetCountPaket; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-thumbs-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Keterangan Paket</h6>
                                <h2 class="counter-count"><?php echo $GetCountKeterangan; ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<!-- script logika 
    -->
<script type="text/javascript">
    $(document).ready(function() {

        $('.counter-count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

    });
</script>
<!-- script logika -->