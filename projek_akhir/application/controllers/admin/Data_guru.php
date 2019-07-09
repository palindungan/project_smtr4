<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("admin/M_data_guru");
    }

    // untuk ke menu data tabel
    public function data_tabel()
    {
        // mengambil data dari model
        $data['tampil_data'] = $this->M_data_guru->tampil_data()->result();

        $this->load->view('tampilan/data_guru/v_data_tabel', $data);
    }

    // untuk ke menu tambah data
    public function tambah_data()
    {
        // mengambil data dari model
        $data['data_kelas'] = $this->M_data_guru->data_kelas()->result();

        // mengambil data dari model
        $data['data_mapel'] = $this->M_data_guru->data_mapel()->result();

        $this->load->view('tampilan/data_guru/v_tambah_form', $data);
    }

    // untuk ke menu edit data
    public function edit_data($NIP)
    {
         // mengambil data dari model
         $data['data_kelas'] = $this->M_data_guru->data_kelas()->result();

         // mengambil data dari model
         $data['data_mapel'] = $this->M_data_guru->data_mapel()->result();

        // memasukkan data ke array
        $where = array('NIP' => $NIP);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['edit_data'] = $this->M_data_guru->edit_data($where, 'guru')->result();

        $this->load->view('tampilan/data_guru/v_edit_form', $data);
    }

    // aksi tambah
    function tambah_aksi()
    {
        // mengambil data dari form
        $NIP = $this->input->post('NIP');
        $nama_guru = $this->input->post('nama_guru');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $kode_mapel = $this->input->post('kode_mapel');
        $kode_kelas = $this->input->post('kode_kelas');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'NIP' => $NIP,
            'nama_guru' => $nama_guru,
            'jk' => $jk,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'kode_mapel' => $kode_mapel,
            'kode_kelas' => $kode_kelas
        );
        // menjadikan data menjadi array

        // mengimputkan data ke model untuk dimasukkan ke dalam database
        $this->M_data_guru->input_data($data, 'guru');
        // mengimputkan data ke model untuk dimasukkan ke dalam database

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Menambah Data !!'); window.location = '" . base_url('admin/data_guru/tambah_data') . "';</script>";
    }

    function hapus_aksi()
    {
        $NIP = $this->input->post('NIP');
        // memasukkan data ke array
        $where = array('NIP' => $NIP);

        // menghapus data dengan memparsing ke model
        $this->M_data_guru->hapus_data($where, 'guru');
    }

    function update_aksi()
    {
        // mengambil data dari form
        $NIP = $this->input->post('NIP');
        $nama_guru = $this->input->post('nama_guru');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $kode_mapel = $this->input->post('kode_mapel');
        $kode_kelas = $this->input->post('kode_kelas');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'NIP' => $NIP,
            'nama_guru' => $nama_guru,
            'jk' => $jk,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'kode_mapel' => $kode_mapel,
            'kode_kelas' => $kode_kelas
        );
        // menjadikan data menjadi array

        // memasukkan data ke array
        $where = array('NIP' => $NIP);
        // memasukkan data ke array

        $this->M_data_guru->update_data($where, $data, 'guru');

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Mengupdate Data !!'); window.location = '" . base_url('admin/data_guru/data_tabel') . "';</script>";
    }
}
