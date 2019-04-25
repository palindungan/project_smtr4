<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_User extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data_user (database)
        $this->load->model("admin/M_data_user");
    }

    public function index()
    {
        // alamat page yang ingin dibuka
        $data['path'] = 'admin/konten/v_data_user';

        // mengambil data dari model
        $data['tbl_data_user'] = $this->M_data_user->tampil_data_user()->result();

        // mengakses viewnya
        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_user = $this->input->post('id_user');
        $nm_user = $this->input->post('nm_user');
        $almt_user = $this->input->post('almt_user');
        $jenkel_user = $this->input->post('jenkel_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_user' => $id_user,
            'nm_user' => $nm_user,
            'almt_user' => $almt_user,
            'jenkel_user' => $jenkel_user,
            'username' => $username,
            'password' => $password,
            'level' => $level
        );

        // mengirim data ke model untuk diinputkan ke dalam database
        $this->M_data_user->input_data('user', $data);

        // kembali ke halaman utama
        redirect('admin/data_user');
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_user = $this->input->post('id_user');

        // memasukkan data ke dalam array assoc
        $where['id_user'] = $id_user;

        $this->M_data_user->hapus_data('user', $where);
    }

    function edit_aksi($id_user)
    {
        // memasukkan data ke dalam array assoc
        $where['id_user'] = $id_user;

        $data['tbl_user'] = $this->M_data_user->edit_data('user', $where)->result();
    }

    function edit_modal()
    {
        // mengambil data dari ajax bertipe post
        $id_user = $this->input->post('id_user');

        // memasukkan data ke dalam array assoc
        $where['id_user'] = $id_user;

        $data_edit['tbl_user'] = $this->M_data_user->edit_data('user', $where)->result();

        $data = json_encode($data_edit);

        echo $data;
    }
}
