<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('tampilan/v_mata_pelajaran');
    }
}
