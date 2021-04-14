<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{
	public function cek_user($data) {
		$query = $this->db->get_where('login_session', $data);
		return $query;
	}

	function where($where){		
		//$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
		return $this->db->get_where('login_session',$where);
	}
	
	public function get($user=null){
		if($user!=null)
			return $this->db->get_where('login_session',$user);
		else
			return $this->db->get('login_session');
	}
	
	public function update($data){
		if($this->db->where('username',$data['username'])){
			$data['password'] = md5($data['password']);
			$this->db->update('login_session',$data);
			return true;
		}
		else 
			return false;
	}
}