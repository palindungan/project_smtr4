<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Menu extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_menu");
    }

    // untuk ke menu tambah menu
    public function tambah_menu()
    {
        $data['kode'] = $this->M_data_menu->get_no();
        $data['tbl_data_kat'] = $this->M_data_menu->tampil_data_kat()->result();

        $data['path'] = 'admin/konten/menu/data_menu/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel menu
    public function data_tabel_menu()
    {
        $data['path'] = 'admin/konten/menu/data_menu/v_data_tabel';
        $data['tbl_data'] = $this->M_data_menu->tampil_data()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_menu($id_menu)
    {
        $data['path'] = 'admin/konten/menu/data_menu/v_edit_form';

        // memasukkan data ke array
        // $where = array('id_menu' => $id_menu);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_menu->get_edit_data($id_menu)->result();
        $data['tbl_data_kat'] = $this->M_data_menu->tampil_data_kat()->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {
        $config['upload_path']          = './upload/gambar_menu';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

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

            redirect('admin/menu/data_menu/tambah_menu');

            // end of code tambah ke database
        }
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_menu = $this->input->post('id_menu');

        // memasukkan data ke dalam array assoc
        $where['id_menu'] = $id_menu;

        // hapus gambar
        // mengambil nama gambar
        $data = $this->M_data_menu->get_nama_gambar($id_menu);

        // lokasi gambar berada
        $path = './upload/gambar_menu/';
        unlink($path . $data->gambar); // hapus data di folder dimana data tersimpan
        // End of hapus gambar

        // hapus file didatabase
        $this->M_data_menu->hapus_data('tbl_menu', $where);
    }

    function update_aksi()
    {
        // hapus file lama
        $id = $this->input->post('id_menu');

        // mengambil nama gambar
        $data = $this->M_data_menu->get_nama_gambar($id);

        // lokasi gambar berada
        $path = './upload/gambar_menu/';
        unlink($path . $data->gambar); // hapus data di folder dimana data tersimpan
        // end of hapus file lama

        // tambah gambar ke database dan local folder
        $config['upload_path']          = './upload/gambar_menu/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            // End of tambah gambar ke database dan local folder

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

            // memasukkan data ke dalam array assoc
            $where['id_menu'] = $id_menu;

            $this->M_data_menu->update_data($where, $data2, 'tbl_menu');

            redirect('admin/menu/data_menu/data_tabel_menu');

            // end of code tambah ke database
        }
    }
}
