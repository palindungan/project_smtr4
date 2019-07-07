<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Customer extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        $this->load->model("admin/user/M_data_customer");
    }

    // untuk ke menu tambah
    public function tambah_customer()
    {
        $data['kode'] = $this->M_data_customer->get_no();

        $data['path'] = 'admin/konten/user/data_customer/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel user
    public function data_tabel_customer()
    {
        $data['path'] = 'admin/konten/user/data_customer/v_data_tabel';
        $data['tbl_data'] = $this->M_data_customer->tampil_data()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_customer($id_customer)
    {
        $data['path'] = 'admin/konten/user/data_customer/v_edit_form';

        // memasukkan data ke array
        $where['id_customer'] = $id_customer;

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_customer->get_edit_data("tbl_customer", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_customer = $this->input->post('id_customer');
        $nm_customer = $this->input->post('nm_customer');
        $almt_customer = $this->input->post('almt_customer');
        $jenkel_customer = $this->input->post('jenkel_customer');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $c_password = $this->input->post('c_password');

        if ($c_password == $password) {

            // memasukkan data ke dalam array assoc
            $data = array(
                'id_customer' => $id_customer,
                'nm_customer' => $nm_customer,
                'almt_customer' => $almt_customer,
                'jenkel_customer' => $jenkel_customer,
                'no_hp' => $no_hp,
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            );

            // mengirim data ke model untuk diinputkan ke dalam database
            $this->M_data_customer->input_data('tbl_customer', $data);

            // kembali ke halaman utama
            redirect('admin/user/data_customer/tambah_customer');
        } else {

            // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/user/data_customer/tambah_customer') . "';</script>";
        }
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_customer = $this->input->post('id_customer');

        // memasukkan data ke dalam array assoc
        $where['id_customer'] = $id_customer;

        $this->M_data_customer->hapus_data('tbl_customer', $where);
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $id_customer = $this->input->post('id_customer');
        $nm_customer = $this->input->post('nm_customer');
        $almt_customer = $this->input->post('almt_customer');
        $jenkel_customer = $this->input->post('jenkel_customer');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $c_password = $this->input->post('c_password');

        if ($c_password == $password) {
            // memasukkan data ke dalam array assoc
            $data = array(
                'id_customer' => $id_customer,
                'nm_customer' => $nm_customer,
                'almt_customer' => $almt_customer,
                'jenkel_customer' => $jenkel_customer,
                'no_hp' => $no_hp,
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            );

            // memasukkan data ke dalam array assoc
            $where['id_customer'] = $id_customer;

            $this->M_data_customer->update_data($where, $data, 'tbl_customer');

            // kembali ke halaman utama
            redirect('admin/user/data_customer/data_tabel_customer');
        } else {
            // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/user/data_customer/data_tabel_customer') . "';</script>";
        }
    }
}
