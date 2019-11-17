<?php
foreach ($totalTransaksi as $d) {
    $getTotalTransaksi = $d->GetTotal;
}

foreach ($totalPorsi as $d) {
    $totalPorsi = $d->GetTotalPorsi;
}

foreach ($TotalTransaksiPending as $d) {
    $TotalTransaksiPending = $d->GetTotalPending;
}

foreach ($TotalTransaksiBelumLunas as $d) {
    $TotalTransaksiBelumLunas = $d->GetTotalBelumLunas;
}

foreach ($TotalTransaksiLunas as $d) {
    $TotalTransaksiLunas = $d->GetTotalLunas;
}

foreach ($TotalPembayaran as $d) {
    $TotalPembayaran = $d->getTotalPembayaran;
}

foreach ($TotalDp as $d) {
    $TotalDp = $d->getTotalDp;
}

foreach ($TotalSisa as $d) {
    $TotalSisa = $d->getTotalSisa;
}
?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <div class="">

                <div class="row">

                    <!-- untuk kolom sebelah kiri -->
                    <div class="col col-md-6">

                        <div class="row form-group" style="font-size: 18">
                            <div class="col col-md-12">
                                <strong>INFORMASI TRANSAKSI</strong>
                            </div>

                        </div>

                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td class=""><strong>Detail Transaksi</strong></td>
                                    <td class="text-right"><strong>Jumlah</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Detail pemasukan -->

                                <tr>
                                    <td class="">Total Seluruh Transaksi</td>
                                    <td class="text-right"><?php echo $getTotalTransaksi ?> </td>
                                </tr>

                                <tr>
                                    <td class="">Total Transaksi Pending</td>
                                    <td class="text-right"><?php echo $TotalTransaksiPending ?></td>
                                </tr>

                                <tr>
                                    <td class="">Total Transaksi Belum Lunas</td>
                                    <td class="text-right"><?php echo $TotalTransaksiBelumLunas ?></td>
                                </tr>

                                <tr>
                                    <td class="">Total Transaksi Lunas</td>
                                    <td class="text-right"><?php echo $TotalTransaksiLunas ?></td>
                                </tr>

                                <!-- Detail pemasukan -->

                            </tbody>
                        </table>
                    </div>
                    <!-- end of untuk kolom sebelah kiri -->

                    <!-- untuk kolom sebelah kanan -->
                    <div class="col col-md-6">
                        <div class="row form-group" style="font-size: 18">
                            <div class="col col-md-12">
                                <strong>INFORMASI PEMBAYARAN</strong>
                            </div>
                        </div>

                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td class=""><strong>Detail Pembayaran</strong></td>
                                    <td class="text-right"><strong>Nominal</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Detail Pengeluaran -->
                                <tr>
                                    <td class="">Total Pembayaran</td>
                                    <td class="text-right">Rp. <?php echo number_format($TotalPembayaran, 2, ",", "."); ?></td>
                                </tr>
                                <tr>
                                    <td class="">Total Uang Dp </td>
                                    <td class="text-right">Rp. <?php echo number_format($TotalDp, 2, ",", "."); ?></td>
                                </tr>
                                <tr>
                                    <td class="">Total Sisa Bayar</td>
                                    <td class="text-right">Rp. <?php echo number_format($TotalSisa, 2, ",", "."); ?></td>
                                </tr>
                                <!-- Detail Pengeluaran  -->

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- end of untuk kolom sebelah kanan -->

                <br><br>
                <div class="row" style="font-size: 15">
                    <div class="col col-md-5"></div>
                    <div class="col col-md-4"></div>

                    <div class="col-md-2 text-center">
                        <address>
                            Jember, <?php echo date("Y-m-d"); ?>
                            <br>
                            Penanggung Jawab <br><br><br>
                            TTD
                        </address>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>