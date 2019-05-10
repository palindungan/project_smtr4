<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tbl_customer extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $id_customer = $this->get('id_customer');
        if ($id_customer == '') {
            $tbl_customer = $this->db->get('tbl_customer')->result();
        } else {
            $this->db->where('id_customer', $id_customer);
            $tbl_customer = $this->db->get('tbl_customer')->result();
        }
        $this->response($tbl_customer, 200);
    }

    //Masukan function selanjutnya disini
}
