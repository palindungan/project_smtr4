<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tbl_kategori extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/menu/M_data_kategori");
    }

    //mengirim data detail
    function index_get()
    {

        // mengambil jumlah baris
        $cek = $this->M_data_kategori->tampil_data()->num_rows();

        // cek apakah ada data dari username
        if ($cek > 0) {

            // mengambil data dari database berdasarkan username
            $query = $this->M_data_kategori->tampil_data();

            // variable array
            $result = array();
            $result['daftar_kategori'] = array();

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {

                // kumpulan data
                $data = array(
                    'id_kat' => $row["id_kat"],
                    'nm_kat' => $row["nm_kat"]
                );

                array_push($result['daftar_kategori'], $data);

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
