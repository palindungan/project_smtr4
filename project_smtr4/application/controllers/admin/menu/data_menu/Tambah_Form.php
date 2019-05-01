<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_Form extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_menu");
    }

    public function index()
    {
        $data['path'] = 'admin/konten/menu/data_menu/v_tambah_form';

        // $data["image_data"] = $this->M_data_menu->fetch_image();

        $data['kode'] = $this->M_data_menu->get_no();
        $data['tbl_data_kat'] = $this->M_data_menu->tampil_data_kat()->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        $config['upload_path']          = './upload/gambar_menu';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            // code tambah ke database

            $id_menu = $this->input->post('id_menu');
            $nm_menu = $this->input->post('nm_menu');
            $id_kat = $this->input->post('id_kat');
            $tipe = $this->input->post('tipe');
            $hrg_porsi = $this->input->post('hrg_porsi');
            $deskripsi = $this->input->post('deskripsi');

            $data2 = array(
                'id_menu' => $id_menu,
                'nm_menu' => $nm_menu,
                'id_kat' => $id_kat,
                'tipe' => $tipe,
                'hrg_porsi' => $hrg_porsi,
                'gambar' => $data["file_name"],
                'deskripsi' => $deskripsi
            );

            $this->M_data_menu->input_data('tbl_menu', $data2);

            redirect('admin/menu/data_menu/tambah_form');

            // end of code tambah ke database
        }
    }
}
