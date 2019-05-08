<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Paket extends CI_Controller
{

    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/paket/M_data_paket");
    }

    // untuk ke menu tambah
    public function tambah_paket()
    {
        $data['kode'] = $this->M_data_paket->get_no();

        $data['tbl_data_menu'] = $this->M_data_paket->tampil_data_menu()->result();

        $data['tbl_data_bonus'] = $this->M_data_paket->tampil_data_bonus()->result();


        $data['path'] = 'admin/konten/paket/data_paket/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel 
    public function data_tabel_paket()
    {
        // $data['tbl_data'] = $this->M_data_paket->tampil_data()->result();

        $data['path'] = 'admin/konten/paket/data_paket/v_data_tabel';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel 
    public function tambah_aksi()
    {
        $id_paket = $this->input->post('id_paket');
        $nm_paket = $this->input->post('nm_paket');
        $hrg_paket = $this->input->post('hrg_paket');
        $jml_menu = $this->input->post('jml_menu');
        $jml_bonus = $this->input->post('jml_bonus');

        $data = array(
            'id_paket' => $id_paket,
            'nm_paket' => $nm_paket,
            'hrg_paket' => $hrg_paket,
            'jml_menu' => $jml_menu,
            'jml_bonus' => $jml_bonus
        );

        $this->M_data_paket->input_data('tbl_paket', $data);
    }
}
