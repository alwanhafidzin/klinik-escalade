<?php

class Detail_stok_obat_model extends CI_Model
{
	public $table = 'detail_stok_obat';
	
	function get_by_id_obat($id_obat) {
        $this->db->where('id_obat', $id_obat);
        return $this->db->get($this->table)->row();
    }
	
	function get_all_id_obat($id_obat) {
    	$this->db->where('id_obat', $id_obat);
        return $this->db->get($this->table)->result();
    }
	
	function insert($data){
        $this->db->insert($this->table, $data);
    }

    function get_detail_obat($id){
    	$this->db->where('id_obat', $id);
        $this->db->order_by('tanggal_expired', 'asc');
    	return $this->db->get('detail_stok_obat')->result_array();

    }
    
    function get_detail_obat_by_id($id){
    	$this->db->where('id', $id);
    	return $this->db->get('detail_stok_obat')->row_array();

    }
    
    function get_by_first_expired($id) {
        $this->db->select('*');
        $this->db->order_by('tanggal_expired', 'asc');
        $this->db->where('id_obat', $id);
        $this->db->limit(1,0);
        return $this->db->get($this->table)->row();
        //return $this->db->get($this->table)->result();
    }
    
    function update_detail_obat($id, $data){
        $this->db->where('id', $id);
        $this->db->update("detail_stok_obat", $data);
    }
    
    function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}