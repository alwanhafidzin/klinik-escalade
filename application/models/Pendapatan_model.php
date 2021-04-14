<?php

class Pendapatan_model extends CI_Model
{
    public $table = 'pendapatan';
    
    public function insert($data){
		return $this->db->insert($this->table,$data);
	}
}