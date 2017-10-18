<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {


	public function index()
	{
		$this->load->view('sign');
		
	}
	
	public function daftar(){
		$Namad= $this->input->post('named');
		$Nameb = $this->input->post('nameb');
		$mail= $this->input->post('mail');
		$pass = $this->input->post('password');
		$data = $this->security->xss_clean($Namad);
		$data2 = $this->security->xss_clean($Nameb);
		$data3 = $this->security->xss_clean($mail);
		$data4 = $this->security->xss_clean($pass);
		$daftar = array(
			'named' => $data,
			'nameb' => $data2,
			'Mail' => $data3,
			'Pass' => $data4
			);
		$res = $this->mymodel->Input('user',$daftar);
					if($res>=1){
					$dat['message'] =  'Akun berhasil dibuat.';
					$this->load->view('notif', $dat);
					}
					else{
					echo "<h2> GAGAL</h2>";
					}
		
		}
		
	
	}	
?>