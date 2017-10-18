<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Mymodel extends CI_Model{
//	public function Create($tableName,$data){
//		$res = $this->db->insert($tableName,$data);
//		return $res;
//	}
	public function Read($table){
		
	$data=$this->db->query('select * from '.$table);
	return $data->result_array();	
	}	
	
	function Login($table,$where){		
		
		return $this->db->get_where($table,$where);
	}	
	public function Input($tableName,$data){
		$res = $this->db->insert($tableName,$data);
		return $res;
	}
}
?>