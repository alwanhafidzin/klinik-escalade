<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
   public $table = 'login_session';
   public $id = 'id_user';
   public $order = 'DESC';
    //fungsi cek session
function logged_id()
   {
    return $this->session->userdata('id_user');
}

 function get_antrian(){
     return $this->db->get('antrian');
 }

    //fungsi check login
function check_login($table, $field1, $field2)
{
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($field1);
    $this->db->where($field2);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
        return FALSE;
    } else {
        return $query->result();
    }
}

function where($where){     
        //$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
    return $this->db->get_where('login_session',$where);
}

public function simpan($data)
{

    $query = $this->db->insert("login_session", $data);

    if($query){
        return true;
    }else{
        return false;
    }

}

public function edit($token)
{

    $query = $this->db->where("token", $token)
    ->get("tokens");

    if($query){
        return $query->row();
    }else{
        return false;
    }

}

public function edit_hp($token)
{

    $query = $this->db->where("no_hp", $token)
    ->get("login_session");

    if($query){
        return $query->row();
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

function get_by_id($id) {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
}

function delete_pasien($id) {
    $this->db->where('id_user', $id);
    $this->db->delete($this->table);
}

public function update($data, $id)
{

    $query = $this->db->update("login_session", $data, $id);

    if($query){
        return true;
    }else{
        return false;
    }

}
}