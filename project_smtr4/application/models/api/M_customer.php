<?php
class M_customer extends CI_Model
{
    // untuk mengambil nilai data yg di edit
    function get_edit_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function ambil_data($id_customer)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer c');

        $where = "c.id_customer ='" . $id_customer . "'";
        $this->db->where($where);
        $this->db->order_by('c.id_customer', 'ASC');

        return $this->db->get();
    }
}
