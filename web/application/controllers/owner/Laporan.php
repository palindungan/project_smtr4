<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/M_laporan");
    }

    public function index()
    {
        $data['path'] = 'admin/konten/v_laporan';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke halaman laporan transaksi
    public function detail_transaksi()
    {
        // mengambil data
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');

        //SET @p0='2019-06-24 00:00:00.000000'; SET @p1='2019-07-03 00:00:00.000000'; SELECT `GetTotal`(@p0, @p1) AS `GetTotal`; 

        $totalTransaksi = $this->M_laporan->getTotalTransaksi($date1, $date2)->result();
        $totalPorsi = $this->M_laporan->getTotalPorsi($date1, $date2)->result();
        $TotalTransaksiPending = $this->M_laporan->getTotalTransaksiPending($date1, $date2)->result();
        $TotalTransaksiBelumLunas = $this->M_laporan->getTotalTransaksiBelumLunas($date1, $date2)->result();
        $TotalTransaksiLunas = $this->M_laporan->getTotalTransaksiLunas($date1, $date2)->result();
        $TotalPembayaran = $this->M_laporan->getTotalPembayaran($date1, $date2)->result();
        $TotalDp = $this->M_laporan->getTotalDp($date1, $date2)->result();
        $TotalSisa = $this->M_laporan->getTotalSisa($date1, $date2)->result();

        // memasukkan data ke dalam array assoc
        $data = array(
            'totalTransaksi' => $totalTransaksi,
            'totalPorsi' => $totalPorsi,
            'TotalTransaksiPending' => $TotalTransaksiPending,
            'TotalTransaksiBelumLunas' => $TotalTransaksiBelumLunas,
            'TotalTransaksiLunas' => $TotalTransaksiLunas,
            'TotalPembayaran' => $TotalPembayaran,
            'TotalDp' => $TotalDp,
            'TotalSisa' => $TotalSisa,
            'date1' => $date1,
            'date2' => $date2
        );

        $data['path'] = 'admin/konten/laporan_detail/konten/v_laporan_transaksi';
        $this->load->view('admin/konten/laporan_detail/_view', $data);
    }
}
