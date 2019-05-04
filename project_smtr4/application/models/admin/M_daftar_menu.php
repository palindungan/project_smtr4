<?php
class M_daftar_menu extends CI_Model
{
    // mengambil semua data pada tabel
    function tampil_data_kat()
    {
        return $this->db->get('tbl_kategori');
    }

    // pencarian semua data
    function cari_data_semua()
    {
        $this->db->select('*');
        $this->db->from('tabel_menu tm');

        $this->db->order_by('tm.nm_menu', 'ASC');

        return $this->db->get();
    }

    // pencarian data dengan 2 parameter
    function cari_data_by_kat_input($search_input, $kategori)
    {
        $this->db->select('*');
        $this->db->from('tabel_menu tm');

        $where = "tm.nm_menu ='" . $search_input . "' && tm.id_kat ='" . $kategori . "'";
        $this->db->where($where);
        $this->db->order_by('tm.nm_menu', 'ASC');

        return $this->db->get();
    }

    // pencarian data dengan 1 parameter
    function cari_data_by_kat($kategori)
    {
        $this->db->select('*');
        $this->db->from('tabel_menu tm');

        $where = "tm.id_kat ='" . $kategori . "'";
        $this->db->where($where);
        $this->db->order_by('tm.nm_menu', 'ASC');

        return $this->db->get();
    }

    // pencarian data dengan 1 parameter
    function cari_data_by_input($search_input)
    {
        $this->db->select('*');
        $this->db->from('tabel_menu tm');

        $where = "tm.nm_menu ='" . $search_input . "'";
        $this->db->where($where);
        $this->db->order_by('tm.nm_menu', 'ASC');

        return $this->db->get();
    }
}
