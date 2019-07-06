<?php
class M_home extends CI_Model
{
    function getCountPenggunaWeb()
    {
        $query = $this->db->query("SELECT GetCountUserWeb() AS GetCountUserWeb");
        return $query;
    }

    function getCountPenggunaAndroid()
    {
        $query = $this->db->query("SELECT GetCountUserAndroid() AS GetCountUserAndroid");
        return $query;
    }

    function getCountMenu()
    {
        $query = $this->db->query("SELECT GetCountMenu() AS GetCountMenu");
        return $query;
    }

    function getCountBonus()
    {
        $query = $this->db->query("SELECT GetCountBonus() AS GetCountBonus");
        return $query;
    }

    function getCountKategori()
    {
        $query = $this->db->query("SELECT GetCountKategori() AS GetCountKategori");
        return $query;
    }

    function getCountPaket()
    {
        $query = $this->db->query("SELECT GetCountPaket() AS GetCountPaket");
        return $query;
    }

    function getCountKeterangan()
    {
        $query = $this->db->query("SELECT GetCountKeterangan() AS GetCountKeterangan");
        return $query;
    }
}
