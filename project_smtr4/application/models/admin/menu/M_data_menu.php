<?php
class M_data_menu extends CI_Model
{
    // mengambil semua data pada tabel
    function tampil_data()
    {
        return $this->db->get('tbl_kategori');
    }

    // untuk input data ke dalam database
    function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    // untuk hapus data 
    function hapus_data($table, $where)
    {
        // idnya
        $this->db->where($where);

        // tabelnya
        $this->db->delete($table);
    }

    // untuk mengambil nilai data yg di edit
    function edit_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    // untuk update data
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // autogenerate kode / ID
    function get_no()
    {
        $field = "id_kat";
        $tabel = "tbl_kategori";
        $digit = "2";
        $kode = "KT-";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "KT-01";
        }
        return $kd;
    }

    function insert_image($data)
    {
        $this->db->insert("tbl_images", $data);
    }

    function fetch_image()
    {
        $output = '';
        $this->db->select('name');
        $this->db->from('tbl_images');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $output .= '  
            <div class="col-md-3">  
                 <img src="' . base_url() . 'upload/' . $row->name . '" class="img-responsive img-thumbnail" />  
            </div>  
            ';
        }
        return $output;
    }
}
