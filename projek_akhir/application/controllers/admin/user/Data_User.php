<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_User extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data_user (database)
        $this->load->library('form_validation');
        $this->load->model("admin/user/M_data_user");
    }

    // untuk ke menu tambah user
    public function tambah_user()
    {
        $data['kode'] = $this->M_data_user->get_no_user();

        $data['path'] = 'admin/konten/user/data_user/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel user
    public function data_tabel_user()
    {
        $data['path'] = 'admin/konten/user/data_user/v_data_tabel';
        $data['tbl_data_user'] = $this->M_data_user->tampil_data_user()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_user($id_user)
    {
        $data['path'] = 'admin/konten/user/data_user/v_edit_form';

        // memasukkan data ke array
        $where['id_user'] = $id_user;

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_user->get_edit_data("user", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_user = $this->input->post('id_user');
        $nm_user = $this->input->post('nm_user');
        $almt_user = $this->input->post('almt_user');
        $jenkel_user = $this->input->post('jenkel_user');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $c_password = $this->input->post('c_password');
        if ($c_password == $password) {

            // memasukkan data ke dalam array assoc
            $data = array(
                'id_user' => $id_user,
                'nm_user' => $nm_user,
                'almt_user' => $almt_user,
                'jenkel_user' => $jenkel_user,
                'no_hp' => $no_hp,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'level' => $level
            );

            // mengambil jumlah baris
            $cek = $this->M_data_user->ambil_data($username)->num_rows();

            if ($cek > 0) {

                // pemberitahuan dan pindah page window
                echo "<script>alert('Tidak Boleh Ada 2 Username yang Sama'); window.location = '" . base_url('admin/user/data_user/tambah_user') . "';</script>";
            } else {

                // mengirim data ke model untuk diinputkan ke dalam database
                $this->M_data_user->input_data('user', $data);

                // kembali ke halaman utama
                redirect('admin/user/data_user/tambah_user');
            }
        } else {   // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/user/data_user/tambah_user') . "';</script>";
        }
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_user = $this->input->post('id_user');

        // memasukkan data ke dalam array assoc
        $where['id_user'] = $id_user;

        $this->M_data_user->hapus_data('user', $where);
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $id_user = $this->input->post('id_user');
        $nm_user = $this->input->post('nm_user');
        $almt_user = $this->input->post('almt_user');
        $jenkel_user = $this->input->post('jenkel_user');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $c_password = $this->input->post('c_password');

        if ($c_password == $password) {

            // memasukkan data ke dalam array assoc
            $data = array(
                'id_user' => $id_user,
                'nm_user' => $nm_user,
                'almt_user' => $almt_user,
                'jenkel_user' => $jenkel_user,
                'no_hp' => $no_hp,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'level' => $level
            );

            // mengambil jumlah baris
            $cek = $this->M_data_user->ambil_data($username)->num_rows();

            if ($cek > 1) {

                // pemberitahuan dan pindah page window
                echo "<script>alert('Tidak Boleh Ada 2 Username yang Sama'); window.location = '" . base_url('admin/user/data_user/data_tabel_user') . "';</script>";
            } else {

                // memasukkan data ke dalam array assoc
                $where['id_user'] = $id_user;

                $this->M_data_user->update_data($where, $data, 'user');

                // kembali ke halaman utama
                redirect('admin/user/data_user/data_tabel_user');
            }
        } else {   // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/user/data_user/data_tabel_user') . "';</script>";
        }
    }
}
