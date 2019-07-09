<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Edit_detail_customer extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/user/M_data_customer");
    }

    //Mengirim atau menambah data kontak baru
    function index_post()
    {

        $id_customer = $this->post('id_customer');
        $password = $this->post('password');
        $data = array(
            'id_customer'           => $this->post('id_customer'),
            'nm_customer'          => $this->post('nm_customer'),
            'almt_customer'    => $this->post('almt_customer'),
            'jenkel_customer'           => $this->post('jenkel_customer'),
            'no_hp'          => $this->post('no_hp'),
            'email'    => $this->post('email'),
            'username'           => $this->post('username'),
            'password'          => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->where('id_customer', $id_customer);
        $update = $this->db->update('tbl_customer', $data);
        if ($update) {

            // membuat array untuk di transfer
            $result["success"] = "1";
            $result["message"] = "success";
            $this->response($result, 200);
        } else {

            // membuat array untuk di transfer ke API
            $result["success"] = "0";
            $result["message"] = "error";
            $this->response($result, 404);
        }
    }
}
