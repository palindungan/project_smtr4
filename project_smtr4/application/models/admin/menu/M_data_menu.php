<?php
class M_data_menu extends CI_Model
{
    // mengambil semua data pada tabel
    function tampil_data()
    {
        $this->db->order_by('nm_menu', 'ASC');
        return $this->db->get('tabel_menu');
    }

    // mengambil semua data pada tabel
    function tampil_data_kat()
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

    // untuk update data
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // autogenerate kode / ID
    function get_no()
    {
        $field = "id_menu";
        $tabel = "tbl_menu";
        $digit = "3";
        $kode = "MN-";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "MN-001";
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

    function get_by_kategori($nm_kat)
    {
        // return $this->db->get_where($table, $where);

        $this->db->select('*');
        $this->db->from('tabel_menu');

        $where = "nm_kat ='" . $nm_kat . "'";
        $this->db->where($where);
        $this->db->order_by('nm_menu', 'ASC');

        return $this->db->get();
    }

    function get_by_nama($nm_menu)
    {
        // return $this->db->get_where($table, $where);

        $this->db->select('*');
        $this->db->from('tabel_menu');

        $where = "nm_menu ='" . $nm_menu . "'";
        $this->db->where($where);
        $this->db->order_by('nm_menu', 'ASC');

        return $this->db->get();
    }

    function get_by_nama2($nm_menu)
    {
        // return $this->db->get_where($table, $where);

        $this->db->select('*');
        $this->db->from('tabel_menu');

        $where = "nm_menu like '%" . $nm_menu . "%'";
        $this->db->where($where);
        $this->db->order_by('nm_menu', 'ASC');

        return $this->db->get();
    }
}
