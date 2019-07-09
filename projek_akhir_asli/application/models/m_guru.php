<?php
class m_guru extends CI_Model
{
    // mengambil semua data pada tabel
    function tampil_data_guru()
    {
        return $this->db->get('guru');
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
    function tampil_data_bonus()
    {
        return $this->db->get('tabel_bonus');
    }

    // mengambil semua data pada tabel
    function tampil_data_paket()
    {
        return $this->db->get('tbl_paket');
    }

    // mengambil semua data pada tabel
    function tampil_data_paket_menu($id_paket)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tabel_detail_paket_menu dm');

        $where = "dm.id_paket ='" . $id_paket . "'";
        $this->db->where($where);
        $this->db->order_by('dm.nm_menu', 'ASC');

        return $this->db->get();
    }

    // mengambil semua data pada tabel
    function tampil_data_paket_bonus($id_paket)
    {
        // pencarian semua yang sesuai id_paket
        $this->db->select('*');
        $this->db->from('tabel_detail_paket_bonus db');

        $where = "db.id_paket ='" . $id_paket . "'";
        $this->db->where($where);
        $this->db->order_by('db.nm_menu', 'ASC');

        return $this->db->get();
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
    function get_edit_data($id_menu)
    {
        // return $this->db->get_where($table, $where);

        $this->db->select('tm.id_menu, tm.nm_menu, tk.nm_kat , tm.tipe, tm.hrg_porsi, tm.gambar, tm.deskripsi , tk.id_kat');
        $this->db->from('tbl_menu tm, tbl_kategori tk');

        $where = "tm.id_kat = tk.id_kat && tm.id_menu ='" . $id_menu . "'";
        $this->db->where($where);
        $this->db->order_by('tm.id_menu', 'ASC');

        return $this->db->get();
    }

    // autogenerate kode / ID
    function get_no()
    {
        $field = "id_paket";
        $tabel = "tbl_paket";
        $digit = "3";
        $kode = "PK-";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "PK-001";
        }

        return $kd;
    }

    function get_nama_gambar($id_menu)
    {
        $this->db->from('tbl_menu');
        $this->db->where('id_menu', $id_menu);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }
}
