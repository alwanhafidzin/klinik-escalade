<?php

class Obat_model extends CI_Model
{
	public $table = 'obat';
	public $id = 'id';
	
	function __construct(){
		parent::__construct();
	}
	
	function tampil(){
		echo json_encode($this->db->get($this->table)->result());
	}
	function tampil_result(){
		return $this->db->get($this->table)->result();
	}
	function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function get_detail_stok_obat($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
	function get_all(){
        $this->db->order_by('nama', 'asc');
        return $this->db->get($this->table)->result_array();
    }

	
	function insert($data){
        $this->db->insert($this->table, $data);
    }
	
	function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    

    function update_obat($jumlah,$id){
    	$this->db->set("jumlah", "jumlah+$jumlah", FALSE);
		$this->db->where('id', $id);
		$this->db->update($this->table);
    }
}