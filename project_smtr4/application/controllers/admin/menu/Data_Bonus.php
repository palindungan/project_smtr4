<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Bonus extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/menu/v_data_bonus';
        $this->load->view('admin/_view', $data);
    }
}
