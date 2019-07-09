<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("admin/M_data_siswa");
    }

    // untuk ke menu data tabel
    public function data_tabel()
    {
        // mengambil data dari model
        $data['tampil_data'] = $this->M_data_siswa->tampil_data()->result();

        $this->load->view('tampilan/data_siswa/v_data_tabel', $data);
    }

    // untuk ke menu tambah data
    public function tambah_data()
    {
        // mengambil data dari model
        $data['data_kelas'] = $this->M_data_siswa->data_kelas()->result();

        $this->load->view('tampilan/data_siswa/v_tambah_form', $data);
    }

    // untuk ke menu edit data
    public function edit_data($nisn)
    {
        // mengambil data dari model
        $data['data_kelas'] = $this->M_data_siswa->data_kelas()->result();

        // memasukkan data ke array
        $where = array('nisn' => $nisn);

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['edit_data'] = $this->M_data_siswa->edit_data($where, 'siswa')->result();

        $this->load->view('tampilan/data_siswa/v_edit_form', $data);
    }

    // aksi tambah
    function tambah_aksi()
    {
        // mengambil data dari form
        $nisn = $this->input->post('nisn');
        $nama_siswa = $this->input->post('nama_siswa');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');

        $nama_wali = $this->input->post('nama_wali');
        $no_hp_wali = $this->input->post('no_hp_wali');
        $kode_kelas = $this->input->post('kode_kelas');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'jk' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'nama_wali' => $nama_wali,
            'no_hp_wali' => $no_hp_wali,
            'kode_kelas' => $kode_kelas
        );
        // menjadikan data menjadi array

        // mengimputkan data ke model untuk dimasukkan ke dalam database
        $this->M_data_siswa->input_data($data, 'siswa');
        // mengimputkan data ke model untuk dimasukkan ke dalam database

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Menambah Data !!'); window.location = '" . base_url('admin/data_siswa/tambah_data') . "';</script>";
    }

    function hapus_aksi()
    {
        $nisn = $this->input->post('nisn');
        // memasukkan data ke array
        $where = array('nisn' => $nisn);

        // menghapus data dengan memparsing ke model
        $this->M_data_siswa->hapus_data($where, 'siswa');
    }

    function update_aksi()
    {
         // mengambil data dari form
        $nisn = $this->input->post('nisn');
        $nama_siswa = $this->input->post('nama_siswa');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');

        $nama_wali = $this->input->post('nama_wali');
        $no_hp_wali = $this->input->post('no_hp_wali');
        $kode_kelas = $this->input->post('kode_kelas');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'jk' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'nama_wali' => $nama_wali,
            'no_hp_wali' => $no_hp_wali,
            'kode_kelas' => $kode_kelas
        );
        // menjadikan data menjadi array

        // memasukkan data ke array
        $where = array('nisn' => $nisn);
        // memasukkan data ke array

        $this->M_data_siswa->update_data($where, $data, 'siswa');

        // pemberitahuan dan pindah page window
        echo "<script>alert('Berhasil Mengupdate Data !!'); window.location = '" . base_url('admin/data_siswa/data_tabel') . "';</script>";
    }
}
