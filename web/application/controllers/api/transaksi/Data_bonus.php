<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Data_bonus extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/menu/M_data_bonus");
        $this->load->model("api/M_base_url");
    }

    //mengirim data detail
    function index_get()
    {

        // mengambil jumlah baris
        $cek = $this->M_data_bonus->tampil_data()->num_rows();

        // cek apakah ada data dari username
        if ($cek > 0) {

            // mengambil data dari database berdasarkan username
            $query = $this->M_data_bonus->tampil_data();

            // variable array
            $result = array();
            $result['data'] = array();

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {

                $path2 = "upload/gambar_menu/" . $row["gambar"];
                $finalPath =  $this->M_base_url->alamat_url() . $path2;

                // kumpulan data
                $data = array(
                    'id_bonus' => $row["id_bonus"],
                    'id_menu' => $row["id_menu"],
                    'nm_menu' => $row["nm_menu"],
                    'id_kat' => $row["id_kat"],
                    'nm_kat' => $row["nm_kat"],
                    'tipe' => $row["tipe"],
                    'hrg_porsi' => $row["hrg_porsi"],
                    'gambar' => $finalPath,
                    'deskripsi' => $row["deskripsi"]
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
