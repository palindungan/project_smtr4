<?php

class M_data_guru extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('tabel_siswa');
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

    function data_kelas()
    {
        return $this->db->get('kelas');
    }

    function data_mapel()
    {
        return $this->db->get('mapel');
    }
}
