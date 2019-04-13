function tampilkanSemuaMenu() {
    $.getJSON('data/pizza.json', function (data) {

        //ini objek /  untuk masuk dan mengeluarkan menu di json (data/pizza.json)
        let menu = data.menu;

        $.each(menu, function (i, data) {

            // menambah (append) kode 
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '"class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">Rp.' + data.harga + '</h5><a href = "#"class = "btn btn-primary" > Pesan Sekarang </a></div></div></div>')
        });

    });
}

tampilkanSemuaMenu();

$('.nav-link').on('click', function () {

    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();

    // untuk mentimpa
    $('h1').html(kategori);

    // untuk menampilkan semua menu (jika All Menu di click)

    if (kategori == "All Menu") {
        tampilkanSemuaMenu();
        return; // untuk keluar dari function onclick (agar function dibawahnya tidak di jalankan)
    }

    // untuk menampilkan menu khusus kategori
    $.getJSON('data/pizza.json', function (data) {

        let menu = data.menu;
        let content = '';

        // isi content setelah di click kategori
        $.each(menu, function (i, data) {

            if (data.kategori == kategori.toLowerCase()) {
                content += '<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '"class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">Rp.' + data.harga + '</h5><a href = "#"class = "btn btn-primary" > Pesan Sekarang </a></div></div></div>';
            }

        });

        // menimpa content dengan isi sesuai kategori
        $('#daftar-menu').html(content);

    });

});