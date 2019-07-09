<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Menu extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data_user (database)
        $this->load->model("admin/M_daftar_menu");
    }

    public function index()
    {
        $data['path'] = 'admin/konten/v_daftar_menu';

        $data['tbl_data_kat'] = $this->M_daftar_menu->tampil_data_kat()->result();

        $this->load->view('admin/_view', $data);
    }

    function cari_menu()
    {
        // mengambil data dari ajax bertipe post
        $search_input = $this->input->post('search_input');
        $kategori = $this->input->post('kategori');

        $data_cari['tbl_data'] = $this->M_daftar_menu->cari_data($search_input, $kategori)->result();

        $data = json_encode($data_cari);

        echo $data;
    }

    function lihat_detail()
    {
        // mengambil data dari ajax bertipe post
        $id_menu = $this->input->post('id_menu');

        $data_cari['tbl_data'] = $this->M_daftar_menu->get_by_id_menu($id_menu)->result();

        $data = json_encode($data_cari);

        echo $data;
    }
}
