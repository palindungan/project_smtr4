<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Tabel extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_menu");
    }

    public function index()
    {
        $data['path'] = 'admin/konten/menu/data_menu/v_data_tabel';

        $this->load->view('admin/_view', $data);
    }
}
