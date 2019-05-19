<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Read_detail_customer extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("api/M_customer");
    }

    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        // menangkap data 
        $id_customer = $this->post('id_customer');

        // mengambil jumlah baris
        $cek = $this->M_customer->ambil_data($id_customer)->num_rows();

        // cek apakah ada data 
        if ($cek > 0) {

            // mengambil data dari database berdasarkan id_customer
            $query = $this->M_customer->ambil_data($id_customer);

            // variable array
            $result = array();
            $result['read'] = array();

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {

                // kumpulan data
                $data = array(
                    'id_customer' => $row["id_customer"],
                    'nm_customer' => $row["nm_customer"],
                    'almt_customer' => $row["almt_customer"],
                    'jenkel_customer' => $row["jenkel_customer"],
                    'no_hp' => $row["no_hp"],
                    'email' => $row["email"],
                    'username' => $row["username"],
                    'password' => $row["password"]
                );

                array_push($result['read'], $data);

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
