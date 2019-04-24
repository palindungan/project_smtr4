<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Paket extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/paket/v_data_paket';
        $this->load->view('admin/_view', $data);
    }
}
