<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Get_detail_by_id extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/transaksi/M_data_prasmanan");
        $this->load->model("admin/menu/M_base_url");
    }

    //mengirim data detail
    function index_post()
    {
        // mengambil data
        $id_prasmanan = $this->post('id_prasmanan');

        // mengambil data dari database 
        $query = $this->M_data_prasmanan->tampil_data_detail_menu($id_prasmanan);
        $query2 = $this->M_data_prasmanan->tampil_data_detail_bonus($id_prasmanan);

        // variable array
        $result = array();
        $result['data'] = array();

        // mengeluarkan data dari database
        foreach ($query->result_array() as $row) {

            $path2 = "upload/gambar_menu/" . $row["gambar"];
            $finalPath =  $this->M_base_url->alamat_url() . $path2;

            // kumpulan data
            $data = array(
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
            $finalPath2 =  $this->M_base_url->alamat_url() . $path3;

            // kumpulan data
            $data = array(
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
