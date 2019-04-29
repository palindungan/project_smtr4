<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Menu extends CI_Controller
{
    // konstraktor
    function __construct()
    {
        parent::__construct();

        // untuk mengakses model data (database)
        $this->load->model("admin/menu/M_data_menu");
    }

    public function index()
    {
        $data['path'] = 'admin/konten/menu/v_data_menu';

        $data["image_data"] = $this->M_data_menu->fetch_image();

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

                // untuk compres and resize images
                $data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './upload/' . $data["file_name"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = true; // jika false maka ratio akan tidak sesuai original
                $config['quality'] = '60%';
                $config['width'] = 200;
                // $config['height'] = 200;
                $config['new_image'] = './upload/' . $data["file_name"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image_data = array(
                    'name' => $data["file_name"]
                );

                // mengirim data ke model untuk diinputkan ke dalam database
                $this->M_data_menu->insert_image($image_data);

                echo $this->M_data_menu->fetch_image();
                // End of untuk compres and resize images

                // echo '<img src="' . base_url() . 'upload/' . $data["file_name"] . '" />';
            }
        }
    }
}
