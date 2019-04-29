<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Menu extends CI_Controller
{
    public function index()
    {
        $data['path'] = 'admin/konten/menu/v_data_menu';
        $this->load->view('admin/_view', $data);
    }

    function ajax_upload()
    {
        if (isset($_FILES['image_file']['name'])) {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_file')) {
                echo $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                echo '<img src="' . base_url() . 'upload/' . $data["file_name"] . '" />';
            }
        }
    }
}
