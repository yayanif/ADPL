<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listuser extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "log"){
			redirect(base_url().'index.php/login');
		}
	}
	
	public function index()
	{
		$data=$this->mymodel->Read("user");
		$this->load->view('listuser', array('data' => $data));
		
	}
}
?>