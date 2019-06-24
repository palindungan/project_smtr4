<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Prasmanan extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data_user (database)
        $this->load->library('form_validation');
        $this->load->model("admin/transaksi/M_data_prasmanan");
    }

    // untuk ke menu tabel invalid
    public function data_tabel_invalid()
    {
        $data['tbl_data_prasmanan_invalid'] = $this->M_data_prasmanan->tampil_data_prasmanan_invalid()->result();

        $data['path'] = 'admin/konten/prasmanan/v_tabel_invalid';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu tabel invalid
    public function data_tabel_valid()
    {
        $data['tbl_data_prasmanan_valid'] = $this->M_data_prasmanan->tampil_data_prasmanan_valid()->result();

        $data['path'] = 'admin/konten/prasmanan/v_tabel_valid';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_data_invalid($id_prasmanan)
    {
        $data['path'] = 'admin/konten/prasmanan/v_edit_form';

        // memasukkan data ke array
        $where = array('id_prasmanan' => $id_prasmanan);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_prasmanan'] = $this->M_data_prasmanan->edit_data("tabel_prasmanan_invalid", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_data_valid($id_prasmanan)
    {
        $data['path'] = 'admin/konten/prasmanan/v_edit_form';

        // memasukkan data ke array
        $where = array('id_prasmanan' => $id_prasmanan);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_prasmanan'] = $this->M_data_prasmanan->edit_data("tabel_prasmanan_valid", $where)->result();

        $this->load->view('admin/_view', $data);
    }
}
