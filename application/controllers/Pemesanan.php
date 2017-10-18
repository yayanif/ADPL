<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemesanan extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "log"){
			redirect(base_url().'index.php/login');
		}
	}
	
	public function index()
	{
		$data=$this->mymodel->Read("pemesanan");
		$this->load->view('pemesanan', array('data' => $data));
		
	}
}
?>