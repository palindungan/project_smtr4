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

    public function index()
    {
        $data['path'] = 'admin/konten/user/v_data_customer';

        $data['tbl_data'] = $this->M_data_customer->tampil_data()->result();
        $data['kode'] = $this->M_data_customer->get_no();

        $this->load->view('admin/_view', $data);
    }

    function edit_modal()
    {
        $id_customer = $this->input->post('id_customer');

        $where['id_customer'] = $id_customer;

        $data_edit['data_tbl'] = $this->M_data_customer->edit_data('tbl_customer', $where)->result();

        $data = json_encode($data_edit);

        echo $data;
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

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_customer' => $id_customer,
            'nm_customer' => $nm_customer,
            'almt_customer' => $almt_customer,
            'jenkel_customer' => $jenkel_customer,
            'no_hp' => $no_hp,
            'email' => $email,
            'username' => $username,
            'password' => $password
        );

        // mengirim data ke model untuk diinputkan ke dalam database
        $this->M_data_customer->input_data('tbl_customer', $data);

        // kembali ke halaman utama
        redirect('admin/user/data_customer');
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

        // memasukkan data ke dalam array assoc
        $data = array(
            'id_customer' => $id_customer,
            'nm_customer' => $nm_customer,
            'almt_customer' => $almt_customer,
            'jenkel_customer' => $jenkel_customer,
            'no_hp' => $no_hp,
            'email' => $email,
            'username' => $username,
            'password' => $password
        );

        // memasukkan data ke dalam array assoc
        $where['id_customer'] = $id_customer;

        $this->M_data_customer->update_data($where, $data, 'tbl_customer');

        // kembali ke halaman utama
        redirect('admin/user/data_customer');
    }
}
