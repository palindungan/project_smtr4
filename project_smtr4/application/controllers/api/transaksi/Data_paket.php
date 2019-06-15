<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data_paket extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/paket/M_data_paket");
    }

    //mengirim data detail
    function index_get()
    {

        // mengambil jumlah baris
        $cek = $this->M_data_paket->tampil_data_paket()->num_rows();

        // cek apakah ada data dari username
        if ($cek > 0) {

            // mengambil data dari database berdasarkan username
            $query = $this->M_data_paket->tampil_data_paket();

            // variable array
            $result = array();
            $result['data'] = array();

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {

                // kumpulan data
                $data = array(
                    'id_paket' => $row["id_paket"],
                    'nm_paket' => $row["nm_paket"],
                    'hrg_paket' => $row["hrg_paket"],
                    'jml_menu' => $row["jml_menu"],
                    'jml_bonus' => $row["jml_bonus"]
                );

                array_push($result['data'], $data);

                // membuat array untuk di transfer
                $result["success"] = "1";
                $result["message"] = "success";
                $this->response($result, 200);
            }
        } else {
            // membuat array untuk di transfer ke API
            $result["success"] = "0";
            $result["message"] = "error daftar menu tidak ada";
            $this->response($result, 404);
        }
    }
}
