<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data_prasmanan extends REST_Controller
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
        $id_paket = $this->post('id_paket');

        $jml_porsi = $this->post('jml_porsi');
        $tot_biaya = $this->post('tot_biaya');
        $tot_dp = $this->post('tot_dp');
        $sisa_bayar = $this->post('sisa_bayar');
        $photo = $this->post('photo');

        $ket_acara = $this->post('ket_acara');
        $tgl_pemesanan = $this->post('tgl_pemesanan');
        $tgl_pelunasan = $this->post('tgl_pelunasan');
        $tgl_acara = $this->post('tgl_acara');
        $status = $this->post('status');

        $kode = $data['kode'] = $this->M_data_prasmanan->get_no();

        $path = "./upload/bukti_bayar/$kode.jpeg";
        $path2 = "$kode.jpeg";

        if (file_put_contents($path, base64_decode($photo))) {
            $data = array(
                'id_prasmanan'           => $kode,
                'id_customer'          => $id_customer,
                'id_paket'    => $id_paket,
                'jml_porsi'           => $jml_porsi,
                'tot_biaya'          => $tot_biaya,
                'tot_dp'    => $tot_dp,
                'sisa_bayar'           => $sisa_bayar,
                'upload_bukti_bayar'          => $path2,

                'ket_acara'           => $ket_acara,
                'tgl_pemesanan'          => $tgl_pemesanan,
                'tgl_pelunasan'    => $tgl_pelunasan,
                'tgl_acara'           => $tgl_acara,
                'status'          => $status
            );

            $insert = $this->db->insert('tbl_prasmanan', $data);
            if ($insert) {
                // membuat array untuk di transfer ke API
                $result["success"] = "1";
                $result["id_prasmanan"] = $kode;
                $result["message"] = "success";
                $this->response($result, 200);
            } else {
                // membuat array untuk di transfer ke API
                $result["success"] = "0";
                $result["message"] = "error";
                $this->response(array($result, 502));
            }
        }
    }
}
