<div class="main-content">
    <div class="container-fluid">

        <!-- button search disini -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Search Daftar Menu</h1>
                <div class="input-group mb-3">
                    <select class="form-control form_data1 select2 col-md-3" id="id_kat" name="id_kat">
                        <option value="All Kategori" id="default_kategori">All Kategori</option>
                        <?php foreach ($tbl_data_kat as $d) {  ?>
                            <option value="<?php echo $d->id_kat ?>"><?php echo $d->nm_kat ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" class="form-control" id="search-input" placeholder="Nama Menu...">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="button" id="search-button">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- disini isinya konten -->

        <div class="row" id="menu-list">

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function() {
        // deklarasi selec2 picker
        $(".select2").select2();

        // untuk ketika halaman pertama dieksekusi
        searchMovie();
    });

    // script untuk menu pencarian
    function searchMovie() {
        $('#menu-list').html('');

        var search_input = $('#search-input').val();
        var kategori = $('#id_kat').val();

        $.ajax({
            url: "<?php echo base_url() . 'admin/daftar_menu/cari_menu'; ?>",
            type: 'post',
            data: {
                search_input: search_input,
                kategori: kategori
            },
            success: function(data) {
                var obj = JSON.parse(data);

                let menu_menu = obj['tbl_data'];

                $.each(menu_menu, function(i, data) {

                    $('#menu-list').append(`

                    <div class="col-md-3">
                        <div class="card" >
                            <img class="card-img-top" src="/project_smtr4/upload/gambar_menu/` + data.gambar + `" alt="gambar_menu" >
                            <div class="card-body">
                                <h5 class="card-title">Nama : ` + data.nm_menu + `</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tipe : ` + data.tipe + `</h6>
                                <a href="javascript:void(0)" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="` + data.id_menu + `">Lihat Detail...</a>
                            </div>
                        </div>
                    </div>
                    
                    `);

                });

                // untuk mengembalikan nilai ke default
                document.getElementById("default_kategori").selected = "true";
                $(".select2").select2();
                $('#search-input').val('');
            }
        });
    }

    // jika kita tekan / click button search-button
    $('#search-button').on('click', function() {
        searchMovie();
    });

    $('#search-input').on('keyup', function(e) {

        // jika kita tekan key enter
        if (e.keyCode === 13) {
            searchMovie();
        }

    });

    $('#menu-list').on('click', '.see-detail', function() {

        $.ajax({

            url: "<?php echo base_url() . 'admin/daftar_menu/lihat_detail'; ?>",
            type: "post",
            data: {
                id_menu: $(this).data('id')
            },
            success: function(result) {

                var obj = JSON.parse(result);

                let data = obj['tbl_data'][0];

                $('.modal-body').html(`
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/project_smtr4/upload/gambar_menu/` + data.gambar + `" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><h3>` + data.id_menu + `</h3></li>
                                <li class="list-group-item"> Nama : ` + data.nm_menu + `</li>
                                <li class="list-group-item"> Tipe : ` + data.tipe + `</li>
                                <li class="list-group-item"> Kategori : ` + data.nm_kat + `</li>
                                <li class="list-group-item"> Harga : ` + data.hrg_porsi + `</li>
                                <li class="list-group-item"> Deskripsi : ` + data.deskripsi + `</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                `);
            }

        });

    });
</script>