<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Search extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/menu/M_data_menu");
        $this->load->model("admin/menu/M_base_url");
    }

    //mengirim data detail
    function index_get()
    {

        // mengambil data
        $nm_menu = $this->get('nm_menu');

        // cek apakah ada data dari username
        if ($nm_menu != "") {

            // mengambil data dari database berdasarkan username
            $query = $this->M_data_menu->get_by_nama($nm_menu);

            // variable array
            $result = array();
            $result['meals'] = array();

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {


                $path2 = "upload/gambar_menu/" . $row["gambar"];
                $finalPath =  $this->M_base_url->alamat_url() . $path2;

                // kumpulan data
                $data = array(
                    'id_menu' => $row["id_menu"],
                    'nm_menu' => $row["nm_menu"],
                    'nm_kat' => $row["nm_kat"],
                    'tipe' => $row["tipe"],
                    'hrg_porsi' => $row["hrg_porsi"],
                    'gambar' => $finalPath,
                    'deskripsi' => $row["deskripsi"],
                    'id_kat' => $row["id_kat"]
                );

                array_push($result['meals'], $data);

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
