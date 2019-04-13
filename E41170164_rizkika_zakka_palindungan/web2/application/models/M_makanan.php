<?php 
class M_makanan extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get("tbl_makanan");
    }

    function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);

        $this->db->delete($table);
    }
    function ambil_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($table, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
