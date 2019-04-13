<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model barang (database)
        $this->load->model("M_barang");
        // untuk mengakses model barang (database)
    }
    // konstraktor

    public function rules()
    {
        return [
            [
                'field' => 'id_barang',
                'label' => 'Kode Barang',
                'rules' => 'required'
            ],

            [
                'field' => 'nm_barang',
                'label' => 'Nama Barang',
                'rules' => 'int'
            ],

            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];
    }

    function index()
    {
        // mengambil data dari model
        $data['tbl_barang'] = $this->M_barang->tampil_data()->result();
        // mengambil data dari model

        // memparsing data untuk ditampilkan ke view
        $this->load->view('admin/barang/barang', $data);
        // memparsing data untuk ditampilkan ke view
    }

    function tambah_aksi()
    {
        // mengambil data dari form
        $id_barang = $this->input->post('id_barang');
        $nm_barang = $this->input->post('nm_barang');
        $desk_barang = $this->input->post('desk_barang');
        $stok_barang = $this->input->post('stok_barang');
        $hrg_barang = $this->input->post('hrg_barang');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'id_barang' => $id_barang,
            'nm_barang' => $nm_barang,
            'desk_barang' => $desk_barang,
            'stok_barang' => $stok_barang,
            'hrg_barang' => $hrg_barang
        );
        // menjadikan data menjadi array

        // mengimputkan data ke model untuk dimasukkan ke dalam database
        $this->M_barang->input_data($data, 'tbl_barang');
        // mengimputkan data ke model untuk dimasukkan ke dalam database

        // kembali ke halaman Barang
        redirect('admin/Barang');
        // kembali ke halaman Barang
    }

    function hapus()
    {
        $id_barang = $this->input->post('id_barang');
        // memasukkan data ke array
        $where = array('id_barang' => $id_barang);
        // memasukkan data ke array

        // menghapus data dengan memparsing ke model
        $this->M_barang->hapus_data($where, 'tbl_barang');
        // menghapus data dengan memparsing ke model
        echo $id_barang;
        // redirect('admin/Barang');
    }

    function update()
    {
        // mengambil data dari form
        $id_barang = $this->input->post('id_barang');
        $nm_barang = $this->input->post('nm_barang');
        $desk_barang = $this->input->post('desk_barang');
        $stok_barang = $this->input->post('stok_barang');
        $hrg_barang = $this->input->post('hrg_barang');
        // mengambil data dari form

        // menjadikan data menjadi array
        $data = array(
            'id_barang' => $id_barang,
            'nm_barang' => $nm_barang,
            'desk_barang' => $desk_barang,
            'stok_barang' => $stok_barang,
            'hrg_barang' => $hrg_barang
        );
        // menjadikan data menjadi array

        // memasukkan data ke array
        $where = array('id_barang' => $id_barang);
        // memasukkan data ke array

        $this->M_barang->update_data($where, $data, 'tbl_barang');

        redirect('admin/Barang');
    }

    // link menu dibawah sini 

    function menu_barang_tambah()
    {
        // memparsing data untuk ditampilkan ke view
        $this->load->view('admin/barang/barang_tambah');
        // memparsing data untuk ditampilkan ke view
    }

    function edit($id_barang)
    {
        // memasukkan data ke array
        $where = array('id_barang' => $id_barang);
        // memasukkan data ke array

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_barang1'] = $this->M_barang->edit_data($where, 'tbl_barang')->result();
        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_barang2'] = $this->M_barang->tampil_data()->result();

        // memparsing data untuk ditampilkan ke view
        $this->load->view('admin/barang/barang_edit', $data);
        // memparsing data untuk ditampilkan ke view
    }
}
