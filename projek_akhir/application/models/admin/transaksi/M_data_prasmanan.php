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
                $tmp = ((int) $k->kd_max) + 1;
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

    // mengambil semua data pada tabel
    function tampil_data_prasmanan_pending_dan_belum_lunas($id_customer)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tabel_prasmanan_pending_dan_belum_lunas tb');

        $where = "tb.id_customer ='" . $id_customer . "'";
        $this->db->where($where);

        return $this->db->get();
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

    // mengambil semua data pada tabel
    function tampil_data_detail_menu($id_prasmanan)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tabel_detail_prasmanan_menu tb');

        $where = "tb.id_prasmanan ='" . $id_prasmanan . "'";
        $this->db->where($where);

        return $this->db->get();
    }

    // mengambil semua data pada tabel
    function tampil_data_detail_bonus($id_prasmanan)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tabel_detail_prasmanan_bonus tb');

        $where = "tb.id_prasmanan ='" . $id_prasmanan . "'";
        $this->db->where($where);

        return $this->db->get();
    }

    // mengambil data paket
    function ambil_paket()
    {
        return $this->db->get('tbl_paket');
    }

    // mengambil data customer
    function ambil_customer()
    {
        return $this->db->get('tbl_customer');
    }

    // mengambil data customer
    function ambil_menu()
    {
        return $this->db->get('tabel_menu');
    }

    // mengambil data customer
    function ambil_bonus()
    {
        return $this->db->get('tabel_bonus');
    }

    function get_by_id_paket($id_paket)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tbl_detail_paket_menu tb');

        $where = "tb.id_paket ='" . $id_paket . "'";
        $this->db->where($where);

        return $this->db->get();
    }

    function get_by_id_paket2($id_paket)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tbl_detail_paket_bonus tb');

        $where = "tb.id_paket ='" . $id_paket . "'";
        $this->db->where($where);

        return $this->db->get();
    }
}
