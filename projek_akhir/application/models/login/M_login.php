<?php
class M_login extends CI_Model
{
    function ambil_data($username)
    {
        $this->db->select('*');
        $this->db->from('user u');

        $where = "u.username ='" . $username . "'";
        $this->db->where($where);
        $this->db->order_by('u.username', 'ASC');

        return $this->db->get();
    }

    function ambil_data2($username)
    {
        $this->db->select('*');
        $this->db->from('siswa u');

        $where = "u.username ='" . $username . "'";
        $this->db->where($where);
        $this->db->order_by('u.username', 'ASC');

        return $this->db->get();
    }
}
