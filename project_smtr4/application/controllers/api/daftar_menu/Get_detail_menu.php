<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_detail_menu extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model("admin/menu/M_data_menu");
    }

    //mengirim data detail
    function index_get()
    {

        // mengambil jumlah baris
        $cek = $this->M_data_menu->tampil_data()->num_rows();

        // cek apakah ada data dari username
        if ($cek > 0) {

            // mengambil data dari database berdasarkan username
            $query = $this->M_data_menu->tampil_data();

            // variable array
            $result = array();
            $result['daftar_menu'] = array();

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {

                // mengambil gambar dan mengkonversi kedalam string untuk dikirim API
                // $path = "./upload/gambar_menu/";
                // $file = $path . $row["gambar"];

                $path2 = "upload/gambar_menu/" . $row["gambar"];
                $finalPath = "http://192.168.56.1/project_smtr4/" . $path2;

                // $encode = base64_encode(file_get_contents($file));

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

                array_push($result['daftar_menu'], $data);

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
