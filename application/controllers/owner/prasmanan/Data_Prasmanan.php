<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Prasmanan extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data_user (database)
        $this->load->library('form_validation');
        $this->load->model("admin/transaksi/M_data_prasmanan");
    }

    // untuk ke menu tabel lunas
    public function data_tabel_lunas()
    {
        $data['tbl_data_prasmanan_lunas'] = $this->M_data_prasmanan->tampil_data_prasmanan_lunas()->result();

        $data['path'] = 'admin/konten/prasmanan/v_tabel_lunas';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu tabel belum lunas
    public function data_tabel_belum_lunas()
    {
        $data['tbl_data_prasmanan_belum_lunas'] = $this->M_data_prasmanan->tampil_data_prasmanan_belum_lunas()->result();

        $data['path'] = 'admin/konten/prasmanan/v_tabel_belum_lunas';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu tabel pending
    public function data_tabel_pending()
    {
        $data['tbl_data_prasmanan_pending'] = $this->M_data_prasmanan->tampil_data_prasmanan_pending()->result();

        $data['path'] = 'admin/konten/prasmanan/v_tabel_pending';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_data_lunas($id_prasmanan)
    {
        $data['path'] = 'admin/konten/prasmanan/v_edit_form';

        // memasukkan data ke array
        $where = array('id_prasmanan' => $id_prasmanan);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_prasmanan'] = $this->M_data_prasmanan->edit_data("tabel_prasmanan_lunas", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_data_belum_lunas($id_prasmanan)
    {
        $data['path'] = 'admin/konten/prasmanan/v_edit_form';

        // memasukkan data ke array
        $where = array('id_prasmanan' => $id_prasmanan);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_prasmanan'] = $this->M_data_prasmanan->edit_data("tabel_prasmanan_belum_lunas", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_data_pending($id_prasmanan)
    {
        $data['path'] = 'admin/konten/prasmanan/v_edit_form';

        // memasukkan data ke array
        $where = array('id_prasmanan' => $id_prasmanan);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_prasmanan'] = $this->M_data_prasmanan->edit_data("tabel_prasmanan_pending", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    function lihat_detail()
    {
        // mengambil data dari ajax bertipe post
        $id_prasmanan = $this->input->post('id_prasmanan');

        // memasukkan data ke array
        $where = array('id_prasmanan' => $id_prasmanan);

        $data_edit['tbl_detail_menu'] = $this->M_data_prasmanan->edit_data("tabel_detail_prasmanan_menu", $where)->result();
        $data_edit['tbl_detail_bonus'] = $this->M_data_prasmanan->edit_data("tabel_detail_prasmanan_bonus", $where)->result();

        $data = json_encode($data_edit);

        echo $data;
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $id_prasmanan = $this->input->post('id_prasmanan');
        $status = $this->input->post('status');
        $sisa_bayar = $this->input->post('sisa_bayar');

        // memasukkan data ke dalam array assoc
        $data = array(
            'status' => $status,
            'sisa_bayar' => $sisa_bayar
        );

        // memasukkan data ke dalam array assoc
        $where['id_prasmanan'] = $id_prasmanan;

        $this->M_data_prasmanan->update_data($where, $data, 'tbl_prasmanan');

        // kembali ke halaman utama
        if ($status == "pending") {
            redirect('owner/prasmanan/data_prasmanan/data_tabel_pending');
        } elseif ($status == "belum_lunas") {
            redirect('owner/prasmanan/data_prasmanan/data_tabel_belum_lunas');
        } elseif ($status == "lunas") {
            redirect('owner/prasmanan/data_prasmanan/data_tabel_lunas');
        }
    }
}
