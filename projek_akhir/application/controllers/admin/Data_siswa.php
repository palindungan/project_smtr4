<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("admin/M_data_siswa");
    }

    // untuk ke menu data tabel
    public function data_tabel()
    {
        // mengambil data dari model
        $data['tampil_data'] = $this->M_data_siswa->tampil_data()->result();

        $this->load->view('tampilan/data_siswa/v_data_tabel', $data);
    }

    
}
