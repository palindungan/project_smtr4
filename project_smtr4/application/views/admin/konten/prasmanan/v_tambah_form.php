<div class="main-content">
	<div class="container-fluid">

		<!-- bagian PAGE HEADER -->
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-command bg-blue"></i>
						<div class="d-inline">
							<h2>Pemesanan Prasmanan</h2>
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
							<li class="breadcrumb-item active" aria-current="page">Data Menu Makanan</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<!-- bagian ISI KONTEN -->
		<div class="card">
			<div class="card-body">

				<!-- disini isinya konten -->

				<form method="post" id="transaksi_form" action="">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_paket">Pilih Paket</label>
								<select class="form-control select2" id="id_paket" name="id_paket" required="">
									<option value="">-</option>
									<?php foreach ($tbl_paket as $d) {  ?>
									<option value="<?php echo $d->id_paket ?>"><?php echo $d->nm_paket ?></option>
									<?php } ?>
								</select>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_customer">Pilih Customer</label>
								<select class="form-control select2" id="id_customer" name="id_customer" required="">
									<option value="">-</option>
									<?php foreach ($tbl_customer as $d) {  ?>
									<option value="<?php echo $d->id_customer ?>"><?php echo $d->nm_customer ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="jml_porsi">Jumlah Porsi</label>
								<input type="number" class="form-control" id="jml_porsi" placeholder="Jumlah Porsi"
									name="jml_porsi" required=""
									oninvalid="this.setCustomValidity('isi Jumlah Porsi Makanan')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tot_biaya">Total Biaya</label>
								<input type="number" class="form-control" id="tot_biaya" placeholder="Total Biaya"
									name="tot_biaya" required="" oninvalid="this.setCustomValidity('isi Total Biaya')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tot_dp">Total Dp</label>
								<input type="number" class="form-control" id="tot_dp" placeholder="Total Dp"
									name="tot_dp" required="" oninvalid="this.setCustomValidity('isi Total Dp')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="sisa_bayar">Sisa Bayar</label>
								<input type="number" class="form-control" id="sisa_bayar" placeholder="Sisa Bayar"
									name="sisa_bayar" required="" oninvalid="this.setCustomValidity('isi Sisa Bayar')"
									oninput="setCustomValidity('')">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="ket_acara">Lokasi Acara</label>
								<input type="text" class="form-control" id="ket_acara" placeholder="Lokasi Acara"
									name="ket_acara" required="" oninvalid="this.setCustomValidity('isi Lokasi Acara')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tgl_acara">Tanggal Acara</label>
								<input type="date" class="form-control" id="tgl_acara" placeholder="Tanggal Acara"
									name="tgl_acara" required="" oninvalid="this.setCustomValidity('isi Total Dp')"
									oninput="setCustomValidity('')">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tgl_pelunasan">Tanggal Pelunasan</label>
								<input type="date" class="form-control" id="tgl_pelunasan"
									placeholder="Tanggal Pelunasan" name="tgl_pelunasan" required=""
									oninvalid="this.setCustomValidity('isi Tanggal Pelunasan')"
									oninput="setCustomValidity('')">
							</div>
						</div>
					</div>

					<button type="button" class="btn btn-primary mr-2" id="tampil_detail">Tampil Detail Paket</button>
					<button type="button" class="btn btn-light">Kembali</button>

					<div id="detail_list">


					</div>

					<br>
					<button id="action" type="submit" class="btn btn-primary mr-2">Simpan</button>

				</form>

			</div>
		</div>

	</div>
</div>

<!-- untuk ajax -->
<!-- <script src="<?= base_url(); ?>assets/template/back/js/jquery.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/back/src/js/vendor/jquery-3.3.1.min.js"></script>

<script src="<?php echo base_url(); ?>assets/template/back/js/form-components.js"></script>

<!-- script logika -->
<script type="text/javascript">
	$(document).ready(function () {

		// deklarasi selec2 picker
		$(".select2").select2();

		// tambah ke database
		$(document).on('submit', '#transaksi_form', function (event) {
			event.preventDefault();
			$('#action').attr('disabled', 'disabled');

			// mengambil nilai di dalam form
			var form_data = $(this).serialize();

			$.ajax({
				url: "<?php echo base_url() . 'kasir/prasmanan/tambah_transaksi'; ?>",
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

		$.ajax({

			url: "<?php echo base_url() . 'kasir/prasmanan/ambil_data_detail_paket'; ?>",
			type: "post",
			data: {
				id_paket: $('#id_paket').val()
			},
			success: function (result) {

				var obj = JSON.parse(result);

				let data = obj['tbl_detail_paket_menu'];
				let data2 = obj['tbl_detail_paket_bonus'];

				let jumlah_menu = obj['jumlah_menu'];
				let jumlah_bonus = obj['jumlah_bonus'];

				console.log(obj);

				if (jumlah_menu > 0) {

					for (let index = 0; index < jumlah_menu; index++) {

						let id_menunya = data[index].id_menu;
						console.log(id_menunya);

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
											<?php foreach ($tabel_menu as $d) {  ?>
												<option value="<?php echo $d->id_menu ?>"><?php echo $d->nm_menu ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							
						`);

					}

				}

				if (jumlah_bonus > 0) {

					for (let index = 0; index < jumlah_bonus; index++) {

						let id_bonusnya = data2[index].id_bonus;
						console.log(id_bonusnya);

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
											<?php foreach ($tabel_bonus as $d) {  ?>
												<option value="<?php echo $d->id_bonus ?>"><?php echo $d->nm_menu ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							
						`);

					}

				}

				// deklarasi selec2 picker
				$(".select2").select2();
			}

		});

	}

	// jika kita tekan / click button
	$('#tampil_detail').on('click', function () {
		tampilDetail();

		// deklarasi selec2 picker
		$(".select2").select2();
	});

</script>
<!-- script logika -->
