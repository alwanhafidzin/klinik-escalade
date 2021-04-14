<?php

class Pemasukan_model extends CI_Model
{
	public $table 	 = 'pemasukan';
	public $id_rekam = 'pemasukan.id';
	
	function tampil(){
		echo json_encode($this->db->get($this->table)->result());
	}
	
	function get_by_tanggal($tanggal){
        $this->db->where('tanggal', $tanggal);
        return $this->db->get($this->table)->row();
    }
	
	function insert($data){
        $this->db->insert($this->table, $data);
    }
	
	function update($tanggal, $data){
        $this->db->where('tanggal', $tanggal);
        $this->db->update($this->table, $data);
    }
	
	function filter_tampil($awal, $akhir){
		$this->db->select('*');
		$this->db->from('transaksi t');
		
		$this->db->where('t.waktu >=',$awal);
		$this->db->where('t.waktu <=',$akhir.'23:59:59');
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
        $this->db->order_by('t.waktu','DESC');
		echo json_encode($this->db->get()->result());
	}
	
	function filter_tampil_awal($awal){
		$this->db->select('*');
		$this->db->from('transaksi t');
		
		$this->db->where('t.waktu >=',$awal);
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
		$this->db->order_by('t.waktu','DESC');
        echo json_encode($this->db->get()->result());
	}
	
	function filter_tampil_akhir($akhir){
		$this->db->select('*');
		$this->db->from('transaksi t');
		
		$this->db->where('t.waktu <=',$akhir.'23:59:59');
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
		$this->db->order_by('t.waktu','DESC');
        echo json_encode($this->db->get()->result());
	}
}