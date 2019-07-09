<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model user (database)
        $this->load->model("login/M_login");
    }

    function index()
    {
        $this->load->view('tampilan/v_login');
    }

    function aksi_login()
    {
        // ambil data dari inputan 
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // mengambil jumlah baris
        $cek = $this->M_login->ambil_data($username)->num_rows();

        // cek apakah ada data dari username
        if ($cek > 0) {

            // mengambil data dari database berdasarkan username
            $query = $this->M_login->ambil_data($username);

            // mengeluarkan data dari database
            foreach ($query->result_array() as $row) {

                // dicek apakah data inputan sama dengan data di database
                if ($password == $row["password"]) {

                    // session
                    $data_session = array(
                        'kode_user' => $row['kode_user'],
                        'nama_user' => $row['nama_user'],
                        'username' => $username,
                        'password' => $password,
                        'status' => 'login'
                    );
                    $this->session->set_userdata($data_session);

                    // link
                    redirect('admin/dashboard');
                } else {
                    echo "<script> alert('Password Anda Salah'); window.location.href = '" . base_url() . "login/login'; </script>";
                }
            }
        } else {

            echo "<script> alert('Username Tidak Ada'); window.location.href = '" . base_url() . "login/login'; </script>";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login/login'));
    }
}
