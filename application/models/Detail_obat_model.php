<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_obat_model extends CI_Model
{
	public $table = 'detail_obat';
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
    
    function get_by_id_rekam_medis($id){
        $this->db->select('*');
        $this->db->select('detail_obat.jumlah');
        
        $this->db->from('detail_obat');
        $this->db->join('obat','detail_obat.id_obat = obat.id');
        $this->db->where('detail_obat.id_rekam_medis', $id);
        
        return $this->db->get()->result();
        
        //$query = $this->db->get();

		
        //echo json_encode($query->result());
    }

    function get_by_id_rekam_medis_layanan($id){
        $this->db->select('*');
       // $this->db->select('detail_layanan');
        
        $this->db->from('detail_layanan');
        $this->db->join('layanan','detail_layanan.id_layanan = layanan.id_layanan');
        $this->db->where('detail_layanan.id_rekam_medis', $id);
        
        return $this->db->get()->result();
        
        //$query = $this->db->get();

		
        //echo json_encode($query->result());
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