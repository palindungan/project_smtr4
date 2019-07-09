<?php
class m_siswa extends CI_Model {
    function list_siswa(){
        return $this->db->get('siswa')->result();
    }
}
?>