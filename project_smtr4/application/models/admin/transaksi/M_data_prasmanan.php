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
    function tampil_data_prasmanan_lunas()
    {
        return $this->db->get('tabel_prasmanan_lunas');
    }

    // mengambil semua data pada tabel
    function tampil_data_prasmanan_belum_lunas()
    {
        return $this->db->get('tabel_prasmanan_belum_lunas');
    }

    // mengambil semua data pada tabel
    function tampil_data_prasmanan_pending()
    {
        return $this->db->get('tabel_prasmanan_pending');
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
}
