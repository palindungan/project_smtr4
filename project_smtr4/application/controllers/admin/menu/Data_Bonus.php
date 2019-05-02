<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Bonus extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_bonus");
    }

    // untuk ke menu tambah bonus
    public function tambah_bonus()
    {
        $data['kode'] = $this->M_data_bonus->get_no();
        $data['tbl_data_menu'] = $this->M_data_bonus->tampil_data_menu()->result();

        $data['path'] = 'admin/konten/menu/data_bonus/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel bonus
    public function data_tabel_bonus()
    {
        $data['path'] = 'admin/konten/menu/data_bonus/v_data_tabel';
        $data['tbl_data'] = $this->M_data_bonus->tampil_data()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_bonus($id_menu)
    {
        $data['path'] = 'admin/konten/menu/data_bonus/v_edit_form';

        // memasukkan data ke array
        $where = array('id_menu' => $id_menu);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_menu->get_edit_data($id_menu)->result();
        $data['tbl_data_kat'] = $this->M_data_menu->tampil_data_kat()->result();

        $this->load->view('admin/_view', $data);
    }
}
