<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("admin/M_data_user");
    }

    // untuk ke menu data tabel
    public function data_tabel()
    {
        // mengambil data dari model
        $data['tampil_data'] = $this->M_data_user->tampil_data()->result();

        $this->load->view('tampilan/data_user/v_data_tabel', $data);
    }

    // untuk ke menu tambah data
    public function tambah_data()
    {
        $data['kode'] = $this->M_data_user->get_no();
        $this->load->view('tampilan/data_user/v_tambah_form',$data);
    }

    // untuk ke menu edit data
    public function edit_data($kode_user)
    {
        // memasukkan data ke array
        $where = array('kode_user' => $kode_user);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['edit_data'] = $this->M_data_user->edit_data($where, 'user')->result();

        $this->load->view('tampilan/data_user/v_edit_form', $data);
    }

    // aksi tambah
    function tambah_aksi()
    {
        // mengambil data dari form
        $kode_user = $this->input->post('kode_user');
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $c_password = $this->input->post('c_password');
        // mengambil data dari form

        if ($c_password == $password) {

            // menjadikan data menjadi array
            $data = array(
                'kode_user' => $kode_user,
                'nama_user' => $nama_user,
                'username' => $username,
                'password' =>  $password
            );
            // menjadikan data menjadi array

            // mengimputkan data ke model untuk dimasukkan ke dalam database
            $this->M_data_user->input_data($data, 'user');
            // mengimputkan data ke model untuk dimasukkan ke dalam database

            // pemberitahuan dan pindah page window
            echo "<script>alert('Berhasil Menambah Data !!'); window.location = '" . base_url('admin/data_user/tambah_data') . "';</script>";
        } else {
            // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/data_user/tambah_data') . "';</script>";
        }
    }

    function hapus_aksi()
    {
        $kode_user = $this->input->post('kode_user');
        // memasukkan data ke array
        $where = array('kode_user' => $kode_user);

        // menghapus data dengan memparsing ke model
        $this->M_data_user->hapus_data($where, 'user');
    }

    function update_aksi()
    {
        // mengambil data dari form
        $kode_user = $this->input->post('kode_user');
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $c_password = $this->input->post('c_password');
        // mengambil data dari form

        if ($c_password == $password) {

            // menjadikan data menjadi array
            $data = array(
                'kode_user' => $kode_user,
                'nama_user' => $nama_user,
                'username' => $username,
                'password' =>  $password
            );
            // menjadikan data menjadi array

            // memasukkan data ke array
            $where = array('kode_user' => $kode_user);
            // memasukkan data ke array

            $this->M_data_user->update_data($where, $data, 'user');

            // pemberitahuan dan pindah page window
            echo "<script>alert('Berhasil Mengupdate Data !!'); window.location = '" . base_url('admin/data_user/data_tabel') . "';</script>";
        } else {
            // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/data_user/data_tabel') . "';</script>";
        }
    }
}
