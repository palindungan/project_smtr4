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

				<form method="post" id="transaksi_form" action="">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_paket">Kode Paket</label>
								<input type="text" class="form-control" id="id_paket" readonly="" name="id_paket"
									value="<?php echo $kode; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nm_paket">Nama</label>
								<input type="text" class="form-control" id="nm_paket" placeholder="Nama" name="nm_paket"
									required="" oninvalid="this.setCustomValidity('isi Nama Paket')"
									oninput="setCustomValidity('')">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="hrg_paket">Harga Porsi</label>
								<input type="number" class="form-control" id="hrg_paket" placeholder="Harga"
									name="hrg_paket" required="" oninvalid="this.setCustomValidity('isi Harga Paket')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="jml_menu">Jumlah Menu</label>
								<input type="number" class="form-control" id="jml_menu" placeholder="Jumlah Menu"
									name="jml_menu" required=""
									oninvalid="this.setCustomValidity('isi Jumlah Menu Makanan')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="jml_bonus">Jumlah Bonus</label>
								<input type="number" class="form-control" id="jml_bonus" placeholder="Jumlah Bonus"
									name="jml_bonus" required=""
									oninvalid="this.setCustomValidity('isi Jumlah Menu Bonus')"
									oninput="setCustomValidity('')">
							</div>
						</div>
					</div>

					<button type="button" class="btn btn-primary mr-2" id="tampil_detail">Tampil Detail Paket</button>
					<button type="button" class="btn btn-light">Kembali</button>

					<div id="detail_list">


					</div>

					<br>
					<button type="submit" class="btn btn-primary mr-2">Simpan</button>

				</form>

			</div>
		</div>

	</div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<script>
	$(document).ready(function () {

		// tambah ke database
		$(document).on('submit', '#transaksi_form', function (event) {
			event.preventDefault();
			$('#action').attr('disabled', 'disabled');

			// mengambil nilai di dalam form
			var form_data = $(this).serialize();

			$.ajax({
				url: "<?php echo base_url() . 'admin/paket/data_paket/tambah_aksi'; ?>",
				method: "POST",
				data: form_data,
				success: function (data) {
					alert("Data berhasil Ditambahkan");
					location.reload();
				}
			});
		});
		// tambah ke database

	});

	// script untuk tampil detail paket
	function tampilDetail() {
		$('#detail_list').html('');

		var jml_menu = $('#jml_menu').val();
		var jml_bonus = $('#jml_bonus').val();

		if (jml_menu > 0) {

			for (let index = 0; index < jml_menu; index++) {

				$('#detail_list').append(`

                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text">Menu ke-` + index + `</label>
                                </span>
                                <select class="form-control select2" id="id_menu` + index + `" name="id_menu[]" required="">
                                    <option value="">-</option>
                                    <?php foreach ($tbl_data_menu as $d) {  ?>
                                        <option value="<?php echo $d->id_menu ?>"><?php echo $d->nm_menu ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                `);

			}

		}

		if (jml_bonus > 0) {

			for (let index = 0; index < jml_bonus; index++) {

				$('#detail_list').append(`

                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text">Bonus ke-` + index + `</label>
                                </span>
                                <select class="form-control select2" id="id_bonus` + index + `" name="id_bonus[]" required="">
                                    <option value="">-</option>
                                    <?php foreach ($tbl_data_bonus as $d) {  ?>
                                        <option value="<?php echo $d->id_bonus ?>"><?php echo $d->nm_menu ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                `);

			}
		}

	}

	// jika kita tekan / click button
	$('#tampil_detail').on('click', function () {
		tampilDetail();

		// deklarasi selec2 picker
		$(".select2").select2();
	});

</script>
