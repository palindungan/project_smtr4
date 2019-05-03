<?php
class M_data_bonus extends CI_Model
{
    // mengambil semua data pada tabel
    function tampil_data()
    {
        return $this->db->get('tabel_bonus');
    }

    // mengambil semua data pada tabel
    function tampil_data_menu()
    {
        return $this->db->get('tabel_menu');
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
        $field = "id_bonus";
        $tabel = "tbl_bonus";
        $digit = "2";
        $kode = "BN-";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "BN-01";
        }
        return $kd;
    }

    // untuk mengambil nilai data yg di edit
    function get_edit_data($id_bonus)
    {
        // return $this->db->get_where($table, $where);

        $this->db->select('tb.id_bonus , tm.id_menu , tm.nm_menu');
        $this->db->from('tbl_bonus tb , tbl_menu tm');

        $where = "tb.id_menu = tm.id_menu && tb.id_bonus ='" . $id_bonus . "'";
        $this->db->where($where);
        $this->db->order_by('tb.id_bonus', 'ASC');

        return $this->db->get();
    }
}
