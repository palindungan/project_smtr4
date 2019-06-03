<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Kategori extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_kategori");
    }

    // untuk ke menu tambah 
    public function tambah_kategori()
    {
        $data['kode'] = $this->M_data_kategori->get_no();
        $data['tbl_data'] = $this->M_data_kategori->tampil_data()->result();

        $data['path'] = 'admin/konten/menu/data_kategori/v_tambah_form';
        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu data tabel 
    public function data_tabel_kategori()
    {
        $data['path'] = 'admin/konten/menu/data_kategori/v_data_tabel';
        $data['tbl_data'] = $this->M_data_kategori->tampil_data()->result();

        $this->load->view('admin/_view', $data);
    }

    // untuk ke menu edit data
    public function edit_kategori($id_kat)
    {
        $data['path'] = 'admin/konten/menu/data_kategori/v_edit_form';

        // memasukkan data ke array
        $where = array('id_kat' => $id_kat);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_data'] = $this->M_data_kategori->edit_data("tbl_kategori", $where)->result();

        $this->load->view('admin/_view', $data);
    }

    function tambah_aksi()
    {

        $config['upload_path']          = './upload/gambar_kategori';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gmbr_kat')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            // code tambah ke database

            // mengambil dari inputan (name)
            $id_kat = $this->input->post('id_kat');
            $nm_kat = $this->input->post('nm_kat');
            $desk_kat = $this->input->post('desk_kat');

            // memasukkan data ke dalam array assoc
            $data2 = array(
                'id_kat' => $id_kat,
                'nm_kat' => $nm_kat,
                'gmbr_kat' => $data["file_name"],
                'desk_kat' => $desk_kat
            );

            // mengirim data ke model untuk diinputkan ke dalam database
            $this->M_data_kategori->input_data('tbl_kategori', $data2);

            // kembali ke halaman utama
            redirect('admin/menu/data_kategori/tambah_kategori');

            // end of code tambah ke database
        }
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_kat = $this->input->post('id_kat');

        // memasukkan data ke dalam array assoc
        $where['id_kat'] = $id_kat;

        // hapus gambar
        // mengambil nama gambar
        $data = $this->M_data_kategori->get_nama_gambar($id_kat);

        // lokasi gambar berada
        $path = './upload/gambar_kategori/';
        unlink($path . $data->gmbr_kat); // hapus data di folder dimana data tersimpan
        // End of hapus gambar

        // hapus file didatabase
        $this->M_data_kategori->hapus_data('tbl_kategori', $where);
    }

    function update_aksi()
    {
        // hapus file lama
        $id = $this->input->post('id_kat');

        // mengambil nama gambar
        $data = $this->M_data_kategori->get_nama_gambar($id);

        // lokasi gambar berada
        $path = './upload/gambar_kategori/';
        unlink($path . $data->gmbr_kat); // hapus data di folder dimana data tersimpan
        // end of hapus file lama

        // tambah gambar ke database dan local folder
        $config['upload_path']          = './upload/gambar_kategori/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gmbr_kat')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            // End of tambah gambar ke database dan local folder

            // code tambah ke database

            // mengambil dari inputan (name)
            $id_kat = $this->input->post('id_kat');
            $nm_kat = $this->input->post('nm_kat');
            $desk_kat = $this->input->post('desk_kat');

            $data2 = array(
                'id_kat' => $id_kat,
                'nm_kat' => $nm_kat,
                'gmbr_kat' => $data["file_name"],
                'desk_kat' => $desk_kat
            );

            // memasukkan data ke dalam array assoc
            $where['id_kat'] = $id_kat;

            $this->M_data_kategori->update_data($where, $data2, 'tbl_kategori');

            // kembali ke halaman utama
            redirect('admin/menu/data_kategori/data_tabel_kategori');

            // end of code tambah ke database
        }
    }
}
