<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_layanan_model extends CI_Model
{
	public $table = 'detail_layanan';
	public $id_rekam = 'id_rekam_medis';
	
	function get_data_layanan($id){
		$this->db->where($this->id_rekam,$id);
		$this->db->join('layanan','detail_layanan.id_layanan=layanan.id_layanan');
        echo json_encode($this->db->get($this->table)->result());
	}
	
	public function getshow($id){
		$this->db->where($this->id_rekam,$id);
		return $this->db->get($this->table)->result_array();
	}
	
	public function insert($data){
		return $this->db->insert($this->table,$data);
	}
	
	public function edit($data,$where){
		return $this->db->update($this->table,$data,$where);
	}
	
	public function delete($table,$where){
		return $this->db->delete($this->table,$where);
	}
}