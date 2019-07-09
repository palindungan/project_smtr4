<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_mapel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("admin/M_data_mapel");
    }

    // untuk ke menu data tabel
    public function data_tabel()
    {
        // mengambil data dari model
        $data['tampil_data'] = $this->M_data_mapel->tampil_data()->result();

        $this->load->view('tampilan/data_mapel/v_data_tabel', $data);
    }

    // untuk ke menu tambah data
    public function tambah_data()
    {
        $this->load->view('tampilan/data_mapel/v_tambah_form');
    }

    // untuk ke menu edit data
    public function edit_data($kode_mapel)
    {
        // memasukkan data ke array
        $where = array('kode_mapel' => $kode_mapel);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['edit_data'] = $this->M_data_mapel->edit_data($where, 'mapel')->result();

        $this->load->view('tampilan/data_mapel/v_edit_form', $data);
    }

    // aksi tambah
    function tambah_aksi()
    {
        // mengambil data dari form
        $kode_mapel = $this->input->post('kode_mapel');
        $nama_mapel = $this->input->post('nama_mapel');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel
        );
        // menjadikan data menjadi array

        // mengimputkan data ke model untuk dimasukkan ke dalam database
        $this->M_data_mapel->input_data($data, 'mapel');
        // mengimputkan data ke model untuk dimasukkan ke dalam database

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Menambah Data !!'); window.location = '" . base_url('admin/data_mapel/tambah_data') . "';</script>";
    }

    function hapus_aksi()
    {
        $kode_mapel = $this->input->post('kode_mapel');
        // memasukkan data ke array
        $where = array('kode_mapel' => $kode_mapel);

        // menghapus data dengan memparsing ke model
        $this->M_data_mapel->hapus_data($where, 'mapel');
    }

    function update_aksi()
    {
        // mengambil data dari form
        $kode_mapel = $this->input->post('kode_mapel');
        $nama_mapel = $this->input->post('nama_mapel');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel
        );
        // menjadikan data menjadi array

        // memasukkan data ke array
        $where = array('kode_mapel' => $kode_mapel);
        // memasukkan data ke array

        $this->M_data_mapel->update_data($where, $data, 'mapel');

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Mengupdate Data !!'); window.location = '" . base_url('admin/data_mapel/data_tabel') . "';</script>";
    }
}
