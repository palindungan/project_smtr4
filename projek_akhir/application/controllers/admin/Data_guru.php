<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    // untuk ke menu data tabel
    public function data_tabel()
    {
        $this->load->view('tampilan/data_guru/v_data_tabel');
    }

    // untuk ke menu tambah data
    public function tambah_data()
    {
        $this->load->view('tampilan/data_guru/v_tambah_form');
    }

    // untuk ke menu edit data
    public function edit_data()
    {
        $this->load->view('tampilan/data_guru/v_edit_form');
    }
}
