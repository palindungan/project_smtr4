<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Bonus extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_bonus");
    }

    // untuk ke menu tambah bonus
    public function tambah_bonus()
    {
        $data['kode'] = $this->M_data_bonus->get_no();
        $data['tbl_data_menu'] = $this->M_data_bonus->tampil_data_menu()->result();

        $data['path'] = 'admin/konten/menu/data_bonus/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel bonus
    public function data_tabel_bonus()
    {
        $data['path'] = 'admin/konten/menu/data_bonus/v_data_tabel';
        $data['tbl_data'] = $this->M_data_bonus->tampil_data()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_bonus($id_bonus)
    {
        $data['path'] = 'admin/konten/menu/data_bonus/v_edit_form';

        // memasukkan data ke array
        $where = array('id_bonus' => $id_bonus);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_bonus->get_edit_data($id_bonus)->result();
        $data['tbl_data_menu'] = $this->M_data_bonus->tampil_data_menu()->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_bonus = $this->input->post('id_bonus');
        $id_menu = $this->input->post('id_menu');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_bonus' => $id_bonus,
            'id_menu' => $id_menu
        );

        // mengirim data ke model untuk diinputkan ke dalam database
        $this->M_data_bonus->input_data('tbl_bonus', $data);

        // kembali ke halaman utama
        redirect('admin/menu/data_bonus/tambah_bonus');
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $id_bonus = $this->input->post('id_bonus');
        $id_menu = $this->input->post('id_menu');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_bonus' => $id_bonus,
            'id_menu' => $id_menu
        );

        // memasukkan data ke dalam array assoc
        $where['id_bonus'] = $id_bonus;

        $this->M_data_bonus->update_data($where, $data, 'tbl_bonus');

        // kembali ke halaman utama
        redirect('admin/menu/data_bonus/data_tabel_bonus');
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_bonus = $this->input->post('id_bonus');

        // memasukkan data ke dalam array assoc
        $where['id_bonus'] = $id_bonus;

        $this->M_data_bonus->hapus_data('tbl_bonus', $where);
    }
}
