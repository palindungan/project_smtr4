<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Keterangan_Paket extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/paket/M_data_keterangan_paket");
    }

    // untuk ke menu tambah 
    public function tambah_keterangan_paket()
    {
        $data['tbl_data'] = $this->M_data_keterangan_paket->tampil_data()->result();
        $data['kode'] = $this->M_data_keterangan_paket->get_no();

        $data['path'] = 'admin/konten/paket/data_keterangan_paket/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel 
    public function data_tabel_keterangan_paket()
    {
        $data['path'] = 'admin/konten/paket/data_keterangan_paket/v_data_tabel';
        $data['tbl_data'] = $this->M_data_keterangan_paket->tampil_data()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_keterangan_paket($id_keterangan_paket)
    {
        $data['path'] = 'admin/konten/paket/data_keterangan_paket/v_edit_form';

        // memasukkan data ke array
        $where = array('id_keterangan_paket' => $id_keterangan_paket);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_keterangan_paket->edit_data('tbl_keterangan_paket', $where)->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_keterangan_paket = $this->input->post('id_keterangan_paket');
        $deskripsi = $this->input->post('deskripsi');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_keterangan_paket' => $id_keterangan_paket,
            'deskripsi' => $deskripsi
        );

        // mengirim data ke model untuk diinputkan ke dalam database
        $this->M_data_keterangan_paket->input_data('tbl_keterangan_paket', $data);

        // kembali ke halaman utama
        redirect('admin/paket/data_keterangan_paket/tambah_keterangan_paket/');
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_keterangan_paket = $this->input->post('id_keterangan_paket');

        // memasukkan data ke dalam array assoc
        $where['id_keterangan_paket'] = $id_keterangan_paket;

        $this->M_data_keterangan_paket->hapus_data('tbl_keterangan_paket', $where);
    }

    function edit_modal()
    {
        $id_keterangan_paket = $this->input->post('id_keterangan_paket');

        $where['id_keterangan_paket'] = $id_keterangan_paket;

        $data_edit['data_tbl'] = $this->M_data_keterangan_paket->edit_data('tbl_keterangan_paket', $where)->result();

        $data = json_encode($data_edit);

        echo $data;
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $id_keterangan_paket = $this->input->post('id_keterangan_paket');
        $deskripsi = $this->input->post('deskripsi');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_keterangan_paket' => $id_keterangan_paket,
            'deskripsi' => $deskripsi
        );

        // memasukkan data ke dalam array assoc
        $where['id_keterangan_paket'] = $id_keterangan_paket;

        $this->M_data_keterangan_paket->update_data($where, $data, 'tbl_keterangan_paket');

        // kembali ke halaman utama
        redirect('admin/paket/data_keterangan_paket/data_tabel_keterangan_paket');
    }
}
