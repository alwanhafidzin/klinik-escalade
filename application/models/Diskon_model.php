<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diskon_model extends CI_Model
{
    public $table = 'diskon';
    

    function __construct(){
        parent::__construct();
    }

    // get all

     function diskon_active(){
        $this->db->where('status_diskon', '1');
        return $this->db->get($this->table);
    }

     function diskon_pil_active($id_rekam_medis){
     	$this->db->select('*');
		$this->db->from('diskon a');
		$this->db->join('pilih_layanan b','a.id_diskon=b.id_diskon');
		$this->db->join('rekam_medis c','b.id_rekam_medis=c.id_rekam_medis');
        $this->db->where('a.status_diskon', '1');
        $this->db->where('c.id_rekam_medis', $id_rekam_medis);
        return $this->db->get('');
    }    
}
