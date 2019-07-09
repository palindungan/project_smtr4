<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Paket extends CI_Controller
{

    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/paket/M_data_paket");
    }

    // untuk ke menu tambah
    public function tambah_paket()
    {
        $data['kode'] = $this->M_data_paket->get_no();

        $data['tbl_data_menu'] = $this->M_data_paket->tampil_data_menu()->result();

        $data['tbl_data_bonus'] = $this->M_data_paket->tampil_data_bonus()->result();

        $data['path'] = 'admin/konten/paket/data_paket/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel 
    public function data_tabel_paket()
    {
        $data['tbl_data_paket'] = $this->M_data_paket->tampil_data_paket()->result();

        $data['path'] = 'admin/konten/paket/data_paket/v_data_tabel';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel 
    public function tambah_aksi()
    {
        // tambah tabel transaksi
        $id_paket = $this->input->post('id_paket');
        $nm_paket = $this->input->post('nm_paket');
        $hrg_paket = $this->input->post('hrg_paket');
        $jml_menu = $this->input->post('jml_menu');
        $jml_bonus = $this->input->post('jml_bonus');

        $data = array(
            'id_paket' => $id_paket,
            'nm_paket' => $nm_paket,
            'hrg_paket' => $hrg_paket,
            'jml_menu' => $jml_menu,
            'jml_bonus' => $jml_bonus
        );

        $this->M_data_paket->input_data('tbl_paket', $data);

        if (isset($_POST['id_menu'])) {

            // tambah detail transaksi
            for ($i = 0; $i < count($this->input->post('id_menu')); $i++) {
                $id_menu = $this->input->post('id_menu')[$i];

                $data2 = array(
                    'id_paket' => $id_paket,
                    'id_menu' => $id_menu
                );

                $this->M_data_paket->input_data('tbl_detail_paket_menu', $data2);
            }
        }

        if (isset($_POST['id_bonus'])) {

            // tambah detail transaksi
            for ($i = 0; $i < count($this->input->post('id_bonus')); $i++) {
                $id_bonus = $this->input->post('id_bonus')[$i];

                $data3 = array(
                    'id_paket' => $id_paket,
                    'id_bonus' => $id_bonus
                );

                $this->M_data_paket->input_data('tbl_detail_paket_bonus', $data3);
            }
        }
    }

    function edit_modal()
    {
        // mengambil data dari ajax bertipe post
        $id_paket = $this->input->post('id_paket');

        $data_edit['tbl_data_paket_menu'] = $this->M_data_paket->tampil_data_paket_menu($id_paket)->result();
        $data_edit['tbl_data_paket_bonus'] = $this->M_data_paket->tampil_data_paket_bonus($id_paket)->result();

        $data = json_encode($data_edit);

        echo $data;
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_paket = $this->input->post('id_paket');

        // memasukkan data ke dalam array assoc
        $where['id_paket'] = $id_paket;

        $this->M_data_paket->hapus_data('tbl_detail_paket_menu', $where);

        $this->M_data_paket->hapus_data('tbl_detail_paket_bonus', $where);

        $this->M_data_paket->hapus_data('tbl_paket', $where);
    }
}
