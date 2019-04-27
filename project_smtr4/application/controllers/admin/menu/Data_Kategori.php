<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Kategori extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_kategori");
    }

    public function index()
    {
        $data['tbl_data'] = $this->M_data_kategori->tampil_data()->result();
        $data['kode'] = $this->M_data_kategori->get_no();

        $data['path'] = 'admin/konten/menu/v_data_kategori';
        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_kat = $this->input->post('id_kat');
        $nm_kat = $this->input->post('nm_kat');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_kat' => $id_kat,
            'nm_kat' => $nm_kat
        );

        // mengirim data ke model untuk diinputkan ke dalam database
        $this->M_data_kategori->input_data('tbl_kategori', $data);

        // kembali ke halaman utama
        redirect('admin/menu/data_kategori');
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_kat = $this->input->post('id_kat');

        // memasukkan data ke dalam array assoc
        $where['id_kat'] = $id_kat;

        $this->M_data_kategori->hapus_data('tbl_kategori', $where);
    }

    function edit_modal()
    {
        $id_kat = $this->input->post('id_kat');

        $where['id_kat'] = $id_kat;

        $data_edit['data_tbl'] = $this->M_data_kategori->edit_data('tbl_kategori', $where)->result();

        $data = json_encode($data_edit);

        echo $data;
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $id_kat = $this->input->post('id_kat');
        $nm_kat = $this->input->post('nm_kat');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_kat' => $id_kat,
            'nm_kat' => $nm_kat
        );

        // memasukkan data ke dalam array assoc
        $where['id_kat'] = $id_kat;

        $this->M_data_kategori->update_data($where, $data, 'tbl_kategori');

        // kembali ke halaman utama
        redirect('admin/menu/data_kategori');
    }
}
