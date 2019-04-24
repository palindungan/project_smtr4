<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/v_laporan';
        $this->load->view('admin/_view', $data);
    }
}
