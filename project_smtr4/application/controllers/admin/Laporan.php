<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/v_laporan';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke halaman laporan transaksi
    public function detail_transaksi()
    {
        $data['path'] = 'admin/konten/laporan_detail/konten/v_laporan_transaksi';
        $this->load->view('admin/konten/laporan_detail/_view', $data);
    }
}
