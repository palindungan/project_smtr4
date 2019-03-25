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

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function index()
    {
        // mengambil data dari model
        $data['tbl_barang'] = $this->M_barang->tampil_data()->result();
        // mengambil data dari model

        // memparsing data untuk ditampilkan ke view
        $this->load->view('admin/barang', $data);
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

    function hapus($id_barang)
    {
        // memasukkan data ke array
        $where = array('id_barang' => $id_barang);
        // memasukkan data ke array

        // menghapus data dengan memparsing ke model
        $this->M_barang->hapus_data($where, 'tbl_barang');
        // menghapus data dengan memparsing ke model

        redirect('admin/Barang');
    }

    function edit($id_barang)
    {
        // memasukkan data ke array
        $where = array('id_barang' => $id_barang);
        // memasukkan data ke array

        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['tbl_barang1'] = $this->M_barang->edit_data($where, 'tbl_barang')->result();
        // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan

        // memparsing data untuk ditampilkan ke view
        $this->load->view('admin/barang_edit', $data);
        // memparsing data untuk ditampilkan ke view
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
}
