<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Get_prasmanan_by_id extends REST_Controller
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
        $id_customer = $this->post('id_customer');

        // cek apakah ada data dari username
        if ($id_customer != "") {

            $cek = $this->M_data_prasmanan->tampil_data_prasmanan_pending_dan_belum_lunas($id_customer)->num_rows();

            // cek apakah ada data dari username
            if ($cek > 0) {

                // mengambil data dari database berdasarkan username
                $query = $this->M_data_prasmanan->tampil_data_prasmanan_pending_dan_belum_lunas($id_customer);

                // variable array
                $result = array();
                $result['data'] = array();

                // mengeluarkan data dari database
                foreach ($query->result_array() as $row) {

                    $path2 = "upload/bukti_bayar/" . $row["upload_bukti_bayar"];
                    $finalPath = "http://192.168.56.1/project_smtr4/" . $path2;

                    // kumpulan data
                    $data = array(
                        'id_prasmanan' => $row["id_prasmanan"],
                        'id_customer'          => $row["id_customer"],
                        'nm_customer'          => $row["nm_customer"],
                        'id_paket'    => $row["id_paket"],
                        'nm_paket'    => $row["nm_paket"],
                        'jml_porsi'           => $row["jml_porsi"],
                        'tot_biaya'          => $row["tot_biaya"],
                        'tot_dp'    => $row["tot_dp"],
                        'sisa_bayar'           => $row["sisa_bayar"],
                        'upload_bukti_bayar'          => $finalPath,
                        'ket_acara'           => $row["ket_acara"],
                        'tgl_pemesanan'          => $row["tgl_pemesanan"],
                        'tgl_pelunasan'    => $row["tgl_pelunasan"],
                        'tgl_acara'           => $row["tgl_acara"],
                        'status'          => $row["status"],
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
                $result["message"] = "error";
                $this->response($result, 404);
            }
        } else {
            // membuat array untuk di transfer ke API
            $result["success"] = "0";
            $result["message"] = "error data tidak ada";
            $this->response($result, 404);
        }
    }
}
