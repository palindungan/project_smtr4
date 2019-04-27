<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Customer extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/user/v_data_customer';
        $this->load->view('admin/_view', $data);
    }
}
