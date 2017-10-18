<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homelog extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'index.php/login');
		}
	}
	
	public function index()
	{
		$session_data = $this->session->userdata();
		$data['username'] = $session_data['nama'];
		$this->load->view('homelog', $data);
                
		
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}
?>