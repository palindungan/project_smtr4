<?php
class M_laporan extends CI_Model
{
    function getTotalTransaksi($date1, $date2)
    {

        $query = $this->db->query("SELECT GetTotal ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotal");

        return $query;
    }
}
