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
}
