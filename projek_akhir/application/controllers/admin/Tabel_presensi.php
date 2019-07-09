<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_presensi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('tampilan/v_tabel_presensi');
    }
}
