<?php
class M_laporan extends CI_Model
{
    function getTotalTransaksi($date1, $date2)
    {
        $query = $this->db->query("SELECT GetTotal ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotal");
        return $query;
    }

    function getTotalPorsi($date1, $date2)
    {
        $query = $this->db->query("SELECT GetTotalPorsi ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotalPorsi");
        return $query;
    }

    function getTotalMenu($date1, $date2)
    {
        $query = $this->db->query("SELECT GetTotalMenu ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotalMenu");
        return $query;
    }

    function getTotalTransaksiPending($date1, $date2)
    {
        $query = $this->db->query("SELECT GetTotalPending ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotalPending");
        return $query;
    }

    function getTotalTransaksiBelumLunas($date1, $date2)
    {
        $query = $this->db->query("SELECT GetTotalBelumLunas ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotalBelumLunas");
        return $query;
    }

    function getTotalTransaksiLunas($date1, $date2)
    {
        $query = $this->db->query("SELECT GetTotalLunas ('" . $date1 . "' , ' " . $date2 . " ') AS GetTotalLunas");
        return $query;
    }

    function getTotalPembayaran($date1, $date2)
    {
        $query = $this->db->query("SELECT getTotalPembayaran ('" . $date1 . "' , ' " . $date2 . " ') AS getTotalPembayaran");
        return $query;
    }

    function getTotalDp($date1, $date2)
    {
        $query = $this->db->query("SELECT getTotalDp ('" . $date1 . "' , ' " . $date2 . " ') AS getTotalDp");
        return $query;
    }

    function getTotalSisa($date1, $date2)
    {
        $query = $this->db->query("SELECT getTotalSisa ('" . $date1 . "' , ' " . $date2 . " ') AS getTotalSisa");
        return $query;
    }
}
