<?php

class Detail_apotik_model extends CI_Model
{
    public $table = 'detail_apotik';
    
    public function insert($data){
		return $this->db->insert($this->table,$data);
	}
}