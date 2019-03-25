<?php

class M_barang extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('tbl_barang');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_data($where, $table)
    {
        // untuk menyeleksi querry
        $this->db->where($where);
        // untuk menyeleksi querry

        // untuk menghapus
        $this->db->delete($table);
        // untuk menghapus
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
