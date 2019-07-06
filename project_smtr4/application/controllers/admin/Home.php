<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/M_home");
    }

    public function index()
    {
        $CountPenggunaWeb = $this->M_home->getCountPenggunaWeb()->result();
        $CountPenggunaAndroid = $this->M_home->getCountPenggunaAndroid()->result();
        $CountMenu = $this->M_home->getCountMenu()->result();
        $CountBonus = $this->M_home->getCountBonus()->result();
        $CountKategori = $this->M_home->getCountKategori()->result();
        $CountPaket = $this->M_home->getCountPaket()->result();
        $CountKeterangan = $this->M_home->getCountKeterangan()->result();

        // memasukkan data ke dalam array assoc
        $data = array(
            'CountPenggunaWeb' => $CountPenggunaWeb,
            'CountPenggunaAndroid' => $CountPenggunaAndroid,
            'CountMenu' => $CountMenu,
            'CountBonus' => $CountBonus,
            'CountKategori' => $CountKategori,
            'CountPaket' => $CountPaket,
            'CountKeterangan' => $CountKeterangan
        );

        $data['path'] = 'admin/konten/v_home';
        $this->load->view('admin/_view', $data);
    }
}
