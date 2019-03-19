<?php

class Barang_model extends CI_Model
{
    private $_table = "tbl_barang";

    public $kodeBarang;
    public $namaBarang;
    public $deskripsiBarang;
    public $stokBarang;
    public $hargaBarang;

    // public function rules()
    // {
    //     return [
    //         [
    //             'field' => 'name',
    //             'Label' => 'Name',
    //             'rules' => 'required'
    //         ],
    //         [
    //             'field' => 'price',
    //             'label' => 'Price',
    //             'rules' => 'numeric'
    //         ],
    //         [
    //             'field' => 'description',
    //             'label' => 'Description',
    //             'rules' => 'required'
    //         ]
    //     ];
    // }

    //untuk mengambil data keseluruhan dari tabel barang
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    //untuk ambil data per baris berdasarkan ID barang 
    public function getById($kodeBarang)
    {
        return $this->db->get_where($this->_table, ["kodeBarang" => $kodeBarang])->row();
    }

    // untuk menyimpan data ke database
    public function save()
    {
        $post = $this->input->post();
        //
        $this->kodeBarang = $post['kodeBarang'];
        $this->namaBarang = $post['namaBarang'];
        $this->deskripsiBarang = $post['deskripsiBarang'];
        $this->stokBarang = $post['stokBarang'];
        $this->hargaBarang = $post['hargaBarang'];
        $this->db->insert($this->_table, $this);
    }

    // untuk edit data di database
    public function edit($kode)
    {
        $post = $this->input->post();
        //
        $this->kodeBarang = $post['kodeBarang'];
        $this->namaBarang = $post['namaBarang'];
        $this->deskripsiBarang = $post['deskripsiBarang'];
        $this->stokBarang = $post['stokBarang'];
        $this->hargaBarang = $post['hargaBarang'];
        $this->db->update($this->_table, $this, array('kode_barang' => $post['kodeBarang']));
    }

    // untuk hapus data di database
    public function hapus()
    {
        //
    }
}
