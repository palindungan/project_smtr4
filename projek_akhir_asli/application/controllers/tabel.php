<?php

class Tabel extends CI_Controller{

    function index(){

        $this->load->model("m_tabel");
        $data['item']=$this->m_barang->list_barang();
        $this->load->view("datatabel",$data);
    }
}
?>