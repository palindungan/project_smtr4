<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kelas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("admin/M_data_kelas");
    }

    // untuk ke menu data tabel
    public function data_tabel()
    {
        // mengambil data dari model
        $data['tampil_data'] = $this->M_data_kelas->tampil_data()->result();

        $this->load->view('tampilan/data_kelas/v_data_tabel', $data);
    }

    // untuk ke menu tambah data
    public function tambah_data()
    {
        $this->load->view('tampilan/data_kelas/v_tambah_form');
    }

    // untuk ke menu edit data
    public function edit_data($kode_kelas)
    {
        // memasukkan data ke array
        $where = array('kode_kelas' => $kode_kelas);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['edit_data'] = $this->M_data_kelas->edit_data($where, 'kelas')->result();

        $this->load->view('tampilan/data_kelas/v_edit_form', $data);
    }

    // aksi tambah
    function tambah_aksi()
    {
        // mengambil data dari form
        $kode_kelas = $this->input->post('kode_kelas');
        $jenis_kelas = $this->input->post('jenis_kelas');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'kode_kelas' => $kode_kelas,
            'jenis_kelas' => $jenis_kelas
        );
        // menjadikan data menjadi array

        // mengimputkan data ke model untuk dimasukkan ke dalam database
        $this->M_data_kelas->input_data($data, 'kelas');
        // mengimputkan data ke model untuk dimasukkan ke dalam database

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Menambah Data !!'); window.location = '" . base_url('admin/data_kelas/tambah_data') . "';</script>";
    }

    function hapus_aksi()
    {
        $kode_kelas = $this->input->post('kode_kelas');
        // memasukkan data ke array
        $where = array('kode_kelas' => $kode_kelas);

        // menghapus data dengan memparsing ke model
        $this->M_data_kelas->hapus_data($where, 'kelas');
    }

    function update_aksi()
    {
        // mengambil data dari form
        $kode_kelas = $this->input->post('kode_kelas');
        $jenis_kelas = $this->input->post('jenis_kelas');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'kode_kelas' => $kode_kelas,
            'jenis_kelas' => $jenis_kelas
        );
        // menjadikan data menjadi array

        // memasukkan data ke array
        $where = array('kode_kelas' => $kode_kelas);
        // memasukkan data ke array

        $this->M_data_kelas->update_data($where, $data, 'kelas');

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Mengupdate Data !!'); window.location = '" . base_url('admin/data_kelas/data_tabel') . "';</script>";
    }
}
