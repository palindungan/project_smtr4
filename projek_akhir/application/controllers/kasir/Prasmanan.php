<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prasmanan extends CI_Controller
{

    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/transaksi/M_data_prasmanan");
    }

    // untuk ke menu tambah
    public function tambah_prasamanan()
    {
        // $data['kode'] = $this->M_data_prasmanan->get_no();
        // $data['tbl_data_bonus'] = $this->M_data_prasmanan->tampil_data_bonus()->result();

        $data['tbl_paket'] = $this->M_data_prasmanan->ambil_paket()->result();
        $data['tbl_customer'] = $this->M_data_prasmanan->ambil_customer()->result();

        $data['tabel_menu'] = $this->M_data_prasmanan->ambil_menu()->result();
        $data['tabel_bonus'] = $this->M_data_prasmanan->ambil_bonus()->result();

        $data['path'] = 'admin/konten/prasmanan/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    public function ambil_data_detail_paket()
    {
        // mengambil data dari ajax bertipe post
        $id_paket = $this->input->post('id_paket');

        $data_cari['tbl_detail_paket_menu'] = $this->M_data_prasmanan->get_by_id_paket($id_paket)->result();
        $data_cari['tbl_detail_paket_bonus'] = $this->M_data_prasmanan->get_by_id_paket2($id_paket)->result();

        $data_cari['jumlah_menu'] = $this->M_data_prasmanan->get_by_id_paket($id_paket)->num_rows();
        $data_cari['jumlah_bonus'] = $this->M_data_prasmanan->get_by_id_paket2($id_paket)->num_rows();

        $data = json_encode($data_cari);

        echo $data;
    }

    // untuk ke menu data tabel 
    public function tambah_transaksi()
    {
        $id_prasmanan = $this->M_data_prasmanan->get_no();
        // tambah tabel transaksi
        $id_customer = $this->input->post('id_customer');
        $id_paket = $this->input->post('id_paket');
        $jml_porsi = $this->input->post('jml_porsi');
        $tot_biaya = $this->input->post('tot_biaya');
        $tot_dp = $this->input->post('tot_dp');

        $sisa_bayar = $this->input->post('sisa_bayar');
        $upload_bukti_bayar = "logo_catering.png";
        $ket_acara = $this->input->post('ket_acara');
        $tgl_pemesanan = date("Y/m/d");
        $tgl_pelunasan = $this->input->post('tgl_pelunasan');

        $tgl_acara = $this->input->post('tgl_acara');
        $status = "belum_lunas";

        $data = array(
            'id_prasmanan' => $id_prasmanan,
            'id_customer' => $id_customer,
            'id_paket' => $id_paket,
            'jml_porsi' => $jml_porsi,
            'tot_biaya' => $tot_biaya,
            'tot_dp' => $tot_dp,

            'sisa_bayar' => $sisa_bayar,
            'upload_bukti_bayar' => $upload_bukti_bayar,
            'ket_acara' => $ket_acara,
            'tgl_pemesanan' => $tgl_pemesanan,
            'tgl_pelunasan' => $tgl_pelunasan,

            'tgl_acara' => $tgl_acara,
            'status' => $status

        );

        $this->M_data_prasmanan->input_data('tbl_prasmanan', $data);

        if (isset($_POST['id_menu'])) {

            // tambah detail transaksi
            for ($i = 0; $i < count($this->input->post('id_menu')); $i++) {
                $id_menu = $this->input->post('id_menu')[$i];

                $data2 = array(
                    'id_prasmanan' => $id_prasmanan,
                    'id_menu' => $id_menu
                );

                $this->M_data_prasmanan->input_data('tbl_prasmanan_detail_menu', $data2);
            }
        }

        if (isset($_POST['id_bonus'])) {

            // tambah detail transaksi
            for ($i = 0; $i < count($this->input->post('id_bonus')); $i++) {
                $id_bonus = $this->input->post('id_bonus')[$i];

                $data3 = array(
                    'id_prasmanan' => $id_prasmanan,
                    'id_bonus' => $id_bonus
                );

                $this->M_data_prasmanan->input_data('tbl_prasmanan_detail_bonus', $data3);
            }
        }
    }
}
