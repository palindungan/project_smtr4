<?php
class M_daftar_menu extends CI_Model
{
    // mengambil semua data pada tabel
    function tampil_data_kat()
    {
        return $this->db->get('tbl_kategori');
    }

    // pencarian data
    function cari_data($search_input, $kategori)
    {
        if ($kategori == "All Kategori" && $search_input == "") {
            // pencarian semua data
            $this->db->select('*');
            $this->db->from('tabel_menu tm');

            $this->db->order_by('tm.nm_menu', 'ASC');

            return $this->db->get();
        } elseif ($kategori == "All Kategori" && $search_input != "") {
            // pencarian semua yang sesuai search_input
            $this->db->select('*');
            $this->db->from('tabel_menu tm');

            $where = "tm.nm_menu ='" . $search_input . "'";
            $this->db->where($where);
            $this->db->order_by('tm.nm_menu', 'ASC');

            return $this->db->get();
        } elseif ($kategori != "All Kategori" && $search_input == "") {
            // pencarian semua yang sesuai kategori
            $this->db->select('*');
            $this->db->from('tabel_menu tm');

            $where = "tm.id_kat ='" . $kategori . "'";
            $this->db->where($where);
            $this->db->order_by('tm.nm_menu', 'ASC');

            return $this->db->get();
        } else {
            // pencarian berdasarkan kategori & search_input
            $this->db->select('*');
            $this->db->from('tabel_menu tm');

            $where = "tm.nm_menu ='" . $search_input . "' && tm.id_kat ='" . $kategori . "'";
            $this->db->where($where);
            $this->db->order_by('tm.nm_menu', 'ASC');

            return $this->db->get();
        }
    }
}
