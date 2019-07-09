<?php
    class m_mapel extends CI_Model{
        private $_table = "mapel";

        public $kode_mapel;
        public $nama_mapel;

        public function rules(){
            return{
                ['field'=>'kode_mapel',
                'label'=>'Kode Mapel',
                'rules'=>'numeric'],

                ['field'=>'nama_mapel',
                'label'=>'Nama Mapel',
                'rules'=>'required'],
            }
        }

        function daftar_mapel(){
            return $this->db->get("mapel")->result();
        }
        public function save(){
            $post = $this->input->post();
            $this->kode_mapel = $post['kode_mapel'];
            $this->nama_mapel = $post['nama_mapel'];
            $this->db->insert($this->_table, $this);
        } 
    }
 ?>