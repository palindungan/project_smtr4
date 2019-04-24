<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_User extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/v_data_user';
        $this->load->view('admin/_view', $data);
    }
}
