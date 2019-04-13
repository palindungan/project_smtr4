<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Makanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_makanan");
	}

	public function index()
	{
		$data['tbl_makanan'] = $this->M_makanan->tampil_data()->result();
		$this->load->view('makanan/makanan_view', $data);
	}
	function edit($id_mkn)
	{
		$where = array(
			'id_mkn' => $id_mkn
		);

		$data['data_makanan'] = $this->M_makanan->ambil_data('tbl_makanan', $where)->result();

		$this->load->view('makanan/makanan_edit', $data);
	}
	function tambah()
	{
		$this->load->view('makanan/makanan_tambah');
	}


	function tambah_aksi()
	{
		$id_mkn = $this->input->post('id_mkn');
		$nm_mkn = $this->input->post('nm_mkn');
		$desk_mkn = $this->input->post('desk_mkn');
		$hrg_mkn = $this->input->post('hrg_mkn');
		$foto_mkn = $this->input->post('foto_mkn');

		$data = array(
			'id_mkn' => $id_mkn,
			'nm_mkn' => $nm_mkn,
			'desk_mkn' => $desk_mkn,
			'hrg_mkn' => $hrg_mkn,
			'foto_mkn' => $foto_mkn
		);

		$this->M_makanan->input_data('tbl_makanan', $data);

		redirect('Makanan/');
	}
	function hapus_aksi($id_mkn)
	{
		$where = array(
			'id_mkn' => $id_mkn
		);

		$this->M_makanan->hapus_data($where, 'tbl_makanan');

		redirect('Makanan');
	}
	function update_aksi()
	{
		$id_mkn = $this->input->post('id_mkn');
		$nm_mkn = $this->input->post('nm_mkn');
		$desk_mkn = $this->input->post('desk_mkn');
		$hrg_mkn = $this->input->post('hrg_mkn');
		$foto_mkn = $this->input->post('foto_mkn');

		$data = array(
			'id_mkn' => $id_mkn,
			'nm_mkn' => $nm_mkn,
			'desk_mkn' => $desk_mkn,
			'hrg_mkn' => $hrg_mkn,
			'foto_mkn' => $foto_mkn
		);

		$where = array(
			'id_mkn' => $id_mkn
		);

		$this->M_makanan->update_data('tbl_makanan', $where, $data);

		redirect('Makanan');
	}
}
