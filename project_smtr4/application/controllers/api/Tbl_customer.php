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

    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'id_customer'           => $this->post('id_customer'),
            'nm_customer'          => $this->post('nm_customer'),
            'almt_customer'    => $this->post('almt_customer'),
            'jenkel_customer'           => $this->post('jenkel_customer'),
            'no_hp'          => $this->post('no_hp'),
            'email'    => $this->post('email'),
            'username'           => $this->post('username'),
            'password'          => $this->post('password')
        );

        $insert = $this->db->insert('tbl_customer', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put()
    {
        $id_customer = $this->put('id_customer');
        $data = array(
            'id_customer'           => $this->put('id_customer'),
            'nm_customer'          => $this->put('nm_customer'),
            'almt_customer'    => $this->put('almt_customer'),
            'jenkel_customer'           => $this->put('jenkel_customer'),
            'no_hp'          => $this->put('no_hp'),
            'email'    => $this->put('email'),
            'username'           => $this->put('username'),
            'password'          => $this->put('password')
        );

        $this->db->where('id_customer', $id_customer);
        $update = $this->db->update('tbl_customer', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $id_customer = $this->delete('id_customer');
        $this->db->where('id_customer', $id_customer);
        $delete = $this->db->delete('tbl_customer');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
