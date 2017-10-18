<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Input extends CI_Controller {
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
		$this->load->view('input', $data);
		
	}
	public function d_upload(){
		$session_data = $this->session->userdata();
		$config['upload_path'] = './asset/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '501';
		$config['max_height']  = '501';
		
		$this->upload->initialize($config);
		
		
		
		//if upload failed
		if ( !$this->upload->do_upload('upload')){
			$data['message'] =  $this->upload->display_errors();
			$this->load->view('message',$data);
		//if upload success
		}else{

			$data_insert = array(
					            'Name' => $this->input->post('name'),
					            'Harga' => $this->input->post('harga'),
								'Pemilik' => $session_data['nama'],
								'Alamat' => $this->input->post('alamat'),
								'Desk' => $this->input->post('desk'),
								'Jenis' => $this->input->post('jenis'),
					            'Pic' => $this->upload->data('file_name')
					        );
			
			$res = $this->mymodel->Input('data', $data_insert);
			$this->load->view(redirect('homelog'));
			
		}
	}	
	
	}
	?>