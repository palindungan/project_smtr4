<?php
class M_data_prasmanan extends CI_Model
{
    // untuk input data ke dalam database
    function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    // autogenerate kode / ID
    function get_no()
    {
        $field = "id_prasmanan";
        $tabel = "tbl_prasmanan";
        $digit = "7";
        $kode = "PR-";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "PR-0000001";
        }

        return $kd;
    }

    // mengambil semua data pada tabel
    function tampil_data_prasmanan_invalid()
    {
        return $this->db->get('tabel_prasmanan_invalid');
    }

    // mengambil semua data pada tabel
    function tampil_data_prasmanan_valid()
    {
        return $this->db->get('tabel_prasmanan_valid');
    }
}
