<div class="main-content">
    <div class="container-fluid">

        <!-- button search disini -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Search Daftar Menu</h1>
                <div class="input-group mb-3">
                    <select class="form-control form_data1 select2 col-md-3" id="id_menu" name="id_menu">
                        <option>All Kategori</option>

                    </select>
                    <input type="text" class="form-control" id="search-input" placeholder="Nama Menu...">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="button" id="search-button">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- disini isinya konten -->

        <div class="row" id="movie-list">

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">See Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
    });

    // script untuk menu pencarian
    function searchMovie() {
        $('#movie-list').html('');

        // $.getJSON('http://www.omdbapi.com/?apikey=d5a98ffa');

        var input_cari = $('#search-input').val();

        $.ajax({
            url: "<?php echo base_url() . 'admin/daftar_menu'; ?>",
            type: 'post',
            data: {
                'apikey': 'd5a98ffa',
                's': $('#search-input').val()
            },
            success: function(result) {
                if (result.Response == "True") {

                    // let movies = result.Search;

                    // $.each(movies, function(i, data) {

                    //     $('#movie-list').append(`

                    // <div class="col-md-4">
                    //     <div class="card mb-3">
                    //         <img src="` + data.Poster + `" class="card-img-top" alt="...">
                    //         <div class="card-body">
                    //             <h5 class="card-title">` + data.Title + `</h5>
                    //             <h6 class="card-subtitle mb-2 text-muted">` + data.Year + `</h6>
                    //             <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="` + data.imdbID + `">See Detail</a>
                    //         </div>
                    //     </div>
                    // </div>

                    // `);

                    // });

                    // $('#search-input').val('');

                } else {
                    $('#movie-list').html(`

                <div class="col">
                <h1 class="text-center">` + result.Error + `</h1>
                </div>
                
                `);
                }
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

    $('#movie-list').on('click', '.see-detail', function() {

        $.ajax({

            url: "http://www.omdbapi.com",
            type: "GET",
            dataType: "json",
            data: {
                'apikey': 'd5a98ffa',
                'i': $(this).data('id')
            },
            success: function(movie) {
                if (movie.Response === "True") {

                    $('.modal-body').html(`
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="` + movie.Poster + `" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><h3>` + movie.Title + `</h3></li>
                                <li class="list-group-item"> Realeased : ` + movie.Realeased + `</li>
                                <li class="list-group-item"> Genre : ` + movie.Genre + `</li>
                                <li class="list-group-item"> Director : ` + movie.Director + `</li>
                                <li class="list-group-item"> Actors : ` + movie.Actors + `</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                `);

                }
            }

        });

    });
</script>