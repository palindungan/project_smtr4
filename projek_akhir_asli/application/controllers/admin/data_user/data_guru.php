<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data_guru extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data_user (database)
        $this->load->library('form_validation');
        $this->load->model("m_guru");
    }

    // untuk ke menu tambah guru
    public function tambah_guru()
    {
        // ngambil data
        $data['tabel_guru'] = $this->m_guru->tampil_data_guru()->result();

       // $data['path'] = 'admin/dataguru';
       // $this->load->view('admin/_view', $data);
        $this->load->view('admin/dataguru',$data);
    }

    // untuk ke menu edit data
    public function edit_guru($NIP)
    {
        //$data['path'] = 'admin/konten/user/data_user/v_edit_form';

        // memasukkan data ke array
        $where['NIP'] = $NIP;

         // fungsi result adalah mengenerate hasil querry menjadi array untuk di tampilkan
        $data['data_edit'] = $this->m_guru->edit_data('guru', $where)->result();

        $this->load->view('admin/data_guru/edit_form', $data);
    }

    function update_aksi()
    {
        // mengambil dari inputan (name)
        $NIP = $this->input->post('NIP');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $jk = $this->input->post('jk');
        $kode_mapel = $this->input->post('kode_mapel');
        $kelas = $this->input->post('kelas');

        // memasukkan data ke dalam array assoc
        $data = array(
            'NIP' => $NIP,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'jk' => $jk,
            'kode_mapel' => $kode_mapel,
            'kelas' => $kelas
        );

        // memasukkan data ke dalam array assoc
        $where['NIP'] = $NIP;

        $this->m_guru->update_data($where, $data, 'guru');

        // kembali ke halaman utama
        redirect('admin/user/data_user/data_tabel_user');
    }

    function tambah_aksi()
    {
        // mengambil dari inputan (name)
        $id_user = $this->input->post('id_user');
        $nm_user = $this->input->post('nm_user');
        $almt_user = $this->input->post('almt_user');
        $jenkel_user = $this->input->post('jenkel_user');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $c_password = $this->input->post('c_password');
        if ($c_password == $password) {

            // memasukkan data ke dalam array assoc
            $data = array(
                'id_user' => $id_user,
                'nm_user' => $nm_user,
                'almt_user' => $almt_user,
                'jenkel_user' => $jenkel_user,
                'no_hp' => $no_hp,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'level' => $level
            );

            // mengambil jumlah baris
            $cek = $this->M_data_user->ambil_data($username)->num_rows();

            if ($cek > 0) {

                // pemberitahuan dan pindah page window
                echo "<script>alert('Tidak Boleh Ada 2 Username yang Sama'); window.location = '" . base_url('admin/user/data_user/tambah_user') . "';</script>";
            } else {

                // mengirim data ke model untuk diinputkan ke dalam database
                $this->M_data_user->input_data('user', $data);

                // kembali ke halaman utama
                redirect('admin/user/data_user/tambah_user');
            }
        } else {   // pemberitahuan dan pindah page window
            echo "<script>alert('Password dan konfirmasi password harus sama !!'); window.location = '" . base_url('admin/user/data_user/tambah_user') . "';</script>";
        }
    }

    function hapus_aksi()
    {
        // mengambil data dari ajax bertipe post
        $id_user = $this->input->post('id_user');

        // memasukkan data ke dalam array assoc
        $where['id_user'] = $id_user;

        $this->M_data_user->hapus_data('user', $where);
    }

}
