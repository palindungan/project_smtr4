<?php
class M_login extends CI_Model
{
    function ambil_data($username)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer c');

        $where = "c.username ='" . $username . "'";
        $this->db->where($where);
        $this->db->order_by('c.username', 'ASC');

        return $this->db->get();
    }
}
