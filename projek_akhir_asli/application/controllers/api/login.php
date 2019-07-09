<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

require APPATH . 'libraries/REST_Controller.php';
require APPATH . 'libraries/Format.php';

/**
 * 
 */
class Login extends REST_Controller{
	 var $CI = null;
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->CI =& get_instance();
		$this->load->database();
		# code...
	}
	function index_post(){
		$username = $this->post('nisn');
		$password = $this->post('NIP');

		$query = $this->CI->db->get_where('siswa',array('nisn'=> $username, 'NIP'=>$password));

		$result =array();
		$result['Login']=array();
		if ($query->num_rows() ==1) {

			$row = $this->CI->db->query('SELECT nama,nisn FROM siswa where email ="'.$email'"');
			$admin=$row->row();

			$index['nisn'] = $admin->nisn;
			$index['nip'] = $admin->nip;

			array_push($result['login'],$index);

			$result["success"] = "1";
			$result["message"] = "success";
			$this->response($result,200);
		}else{
			$this->response(array('status' => 'fail',502));
		}
			# code...
		}
	}
		
	}?> 
}
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
}
