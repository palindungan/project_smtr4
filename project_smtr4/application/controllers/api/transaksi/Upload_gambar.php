<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Upload_gambar extends REST_Controller
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
        $where = $this->post('id');
        $photo = $this->post('photo');

        $path = "./upload/bukti_bayar/$where.jpeg";
        $path2 = "/upload/bukti_bayar/$where.jpeg";
        $finalPath = "http://192.168.43.112/project_smtr4/" . $path2;

        $data = array(
            'photo'           =>  $finalPath
        );

        $this->db->where('id_customer', $where);
        $update = $this->db->update('tbl_customer', $data);
        if ($update) {

            if (file_put_contents($path, base64_decode($photo))) {
                // membuat array untuk di transfer
                $result["success"] = "1";
                $result["message"] = "success";
                $this->response($result, 200);
            }
        } else {

            // membuat array untuk di transfer ke API
            $result["success"] = "0";
            $result["message"] = "error";
            $this->response($result, 404);
        }
    }
}
