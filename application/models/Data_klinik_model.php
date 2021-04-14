<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Data_admin_model extends CI_Model {

   public $table = 'rekam_medis';
   public $id = 'id_rekam_medis';
   public $order = 'DESC';

  function __construct() {
    parent::__construct();
  }

  function get_survey(){
   return $this->db->get('survey');
 }

 function get_antrian(){
  $this->db->select('*');
  $this->db->from('antrian a');
  $this->db->join('pasien b','a.id_pasien=b.id_pasien');
  return $this->db->get();
 }

 function get_booking(){
  $konf = '0';
  $this->db->select('*');
  $this->db->from('booking a');
  $this->db->join('rencana b','a.id_booking=b.id_booking');
  $this->db->join('pasien c','a.id_pasien=c.id_pasien');
  $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
  $this->db->join('cabang e','a.id_cabang=e.id_cabang');
  $this->db->where('a.konfirmasi', $konf);
  return $this->db->get();
}

function get_pasien_id($id_booking){
  $this->db->select('*');
  $this->db->from('booking a');
  $this->db->join(' b','a.id_booking=b.id_booking');
  $this->db->join('pasien c','a.id_pasien=c.id_pasien');
  $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
  $this->db->join('cabang e','a.id_cabang=e.id_cabang');
  $this->db->where('a.status', $stt);
  $this->db->order_by('b.tanggal_rencana', 'asc');
  $this->db->order_by('b.jam_rencana', 'asc');
  return $this->db->get();
        // return $this->db->get_where('pasien', array('id_pasien' => $id));
}

public function add_rekam_medis($data)
{

  $query = $this->db->insert("rekam_medis", $data);

  if($query){
    return true;
  }else{
    return false;
  }

}

public function add_antrian($data)
{

  $query = $this->db->insert("antrian", $data);

  if($query){
    return true;
  }else{
    return false;
  }

}

function get_id_last() {
  $this->db->select($this->id);
  $this->db->order_by($this->id,$this->order);
  $this->db->limit(1,0);
  return $this->db->get($this->table)->row();
}
}