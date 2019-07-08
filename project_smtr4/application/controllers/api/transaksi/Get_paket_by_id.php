<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Get_paket_by_id extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/paket/M_data_paket");
    }

    //mengirim data detail
    function index_post()
    {
        // mengambil data
        $id_paket = $this->post('id_paket');

        // mengambil data dari database 
        $query = $this->M_data_paket->tampil_data_paket_menu($id_paket);
        $query2 = $this->M_data_paket->tampil_data_paket_bonus($id_paket);

        // variable array
        $result = array();
        $result['data'] = array();

        // mengeluarkan data dari database
        foreach ($query->result_array() as $row) {

            $path2 = "upload/gambar_menu/" . $row["gambar"];
            $finalPath = "http://192.168.43.112/project_smtr4/" . $path2;

            // kumpulan data
            $data = array(
                'id_paket' => $row["id_paket"],
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
        }

        // mengeluarkan data dari database
        foreach ($query2->result_array() as $row) {

            $path3 = "upload/gambar_menu/" . $row["gambar"];
            $finalPath2 = "http://192.168.43.112/project_smtr4/" . $path3;

            // kumpulan data
            $data = array(
                'id_paket' => $row["id_paket"],
                'id_bonus' => $row["id_bonus"],
                'id_menu' => $row["id_menu"],
                'nm_menu' => $row["nm_menu"],
                'id_kat' => $row["id_kat"],
                'nm_kat' => $row["nm_kat"],
                'tipe' => $row["tipe"],
                'hrg_porsi' => $row["hrg_porsi"],
                'gambar' => $finalPath2,
                'deskripsi' => $row["deskripsi"]
            );

            array_push($result['data'], $data);
        }

        // membuat array untuk di transfer
        $result["success"] = "1";
        $result["message"] = "success";
        $this->response($result, 200);
    }
}
