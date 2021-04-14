<?php

class Pengeluaran_model extends CI_Model
{
    public $table = 'pengeluaran';
    
    function __construct(){
        parent::__construct();
    }

    function harga_edit_pengeluaran($data, $id){
    	$this->db->where('id',$id);
    	$this->db->update('pengeluaran', $data);
    }
    
    function tampil(){
        echo json_encode($this->db->get($this->table)->result());
    }
    
	function filter_tampil($awal, $akhir){
		$this->db->select('*');
		$this->db->from('pengeluaran');
		
		$this->db->where('waktu >=',$awal.' 00:00:00');
		$this->db->where('waktu <=',$akhir.' 23:59:59');
		return $this->db->get()->result();
	}
	
	function filter_tampil_awal($awal){
		$this->db->select('*');
		$this->db->from('pengeluaran');
		
		$this->db->where('waktu >=',$awal);
		return $this->db->get()->result();
	}
	
	function filter_tampil_akhir($akhir){
		$this->db->select('*');
		$this->db->from('pengeluaran');
		
		$this->db->where('waktu <=',$akhir.'23:59:59');
		return $this->db->get()->result();
	}
	
    function insert($data){
        $this->db->insert($this->table, $data);
    }
}