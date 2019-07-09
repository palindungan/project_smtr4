<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data_prasmanan_detail extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/transaksi/M_data_prasmanan");
    }

    //mengirim data detail
    function index_post()
    {
        // mengambil data
        $id_prasmanan = $this->post('id_prasmanan');
        $id_menu = $this->post('id_menu');
        $id_bonus = $this->post('id_bonus');

        if ($id_bonus == "kosong") {
            $data = array(
                'id_prasmanan'           => $id_prasmanan,
                'id_menu'          => $id_menu
            );

            $insert = $this->db->insert('tbl_prasmanan_detail_menu', $data);
            if ($insert) {
                // membuat array untuk di transfer ke API
                $result["success"] = "1";
                $result["message"] = "success";
                $this->response($result, 200);
            } else {
                // membuat array untuk di transfer ke API
                $result["success"] = "0";
                $result["message"] = "error";
                $this->response(array($result, 502));
            }
        } else {
            $data = array(
                'id_prasmanan'           => $id_prasmanan,
                'id_bonus'    => $id_bonus
            );

            $insert = $this->db->insert('tbl_prasmanan_detail_bonus', $data);
            if ($insert) {
                // membuat array untuk di transfer ke API
                $result["success"] = "1";
                $result["message"] = "success";
                $this->response($result, 200);
            } else {
                // membuat array untuk di transfer ke API
                $result["success"] = "0";
                $result["message"] = "error";
                $this->response(array($result, 502));
            }
        }
    }
}
