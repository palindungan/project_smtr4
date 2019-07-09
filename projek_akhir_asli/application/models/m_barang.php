<?php

class m_barang extends CI_Model {

    
    function list_barang(){
        return $this->db->get('barang')->result();
    }
    
}
?>