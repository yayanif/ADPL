<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('login');
		
	}
	function aksi_login(){
		$Id = $this->input->post('mail');
		$Pass = $this->input->post('Password');
		$wher = array(
			'nama' => $Id,
			'password' => $Pass
			);
		$where = array(
			'Mail' => $Id,
			'Pass' => $Pass
			);
		
		$cek2 = $this->mymodel->Login("admin",$wher)->num_rows();
		$cek = $this->mymodel->Login("user",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $Id,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			
			redirect(base_url().'index.php/homelog');
			
		}elseif($cek2 > 0){
			$data_session = array(
				'nama' => $Id,
				'status' => "log"
				);
 
			$this->session->set_userdata($data_session);
			
			redirect(base_url().'index.php/admin');
		}
		else{
			redirect(base_url().'index.php/login');
		}
		
		
	}	
}
?>