<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "log"){
			redirect(base_url().'index.php/login');
		}
	
	}
	
	public function index()
	{
		$d=$this->mymodel->Read("data");
		$this->load->view('admin',array('d' => $d));
		
	}
}
?>