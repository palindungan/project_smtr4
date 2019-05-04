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

        if ($kategori == "All Kategori" && $search_input == "") {
            // pencarian semua data
            $data_cari['tbl_data'] = $this->M_daftar_menu->cari_data_semua()->result();
        } elseif ($kategori == "All Kategori" && $search_input != "") {
            // pencarian semua yang sesuai search_input
            $data_cari['tbl_data'] = $this->M_daftar_menu->cari_data_by_input($search_input)->result();
        } elseif ($kategori != "All Kategori" && $search_input == "") {
            // pencarian semua yang sesuai kategori
            $data_cari['tbl_data'] = $this->M_daftar_menu->cari_data_by_kat($kategori)->result();
        } else {
            // pencarian berdasarkan kategori & search_input
            $data_cari['tbl_data'] = $this->M_daftar_menu->cari_data_by_kat_input($search_input, $kategori)->result();
        }

        $data = json_encode($data_cari);

        echo $data;
    }
}
