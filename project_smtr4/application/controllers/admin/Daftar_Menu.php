<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Menu extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/v_daftar_menu';
        $this->load->view('admin/_view', $data);
    }
}
