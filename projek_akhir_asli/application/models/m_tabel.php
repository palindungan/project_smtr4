<?php

class m_tabel extends CI_Model {

    
    function list_barang(){
        return $this->db->get('siswa,guru')->result();
    }
    
}
?>