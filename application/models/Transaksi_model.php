<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public $table = 'transaksi';
    public $id 	  = 'id_rekam_medis';
    public $order = 'ASC';

    function __construct(){
        parent::__construct();
    }
	
    function tampil_laporan_transaksi(){
        $this->db->select('*');
        $this->db->from('transaksi t'); 
        $this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
        $this->db->order_by('t.waktu','DESC');
        $query = $this->db->get();

		
        echo json_encode($query->result());
	}
	
	function filter_tampil($awal, $akhir){
		$this->db->select('*');
		$this->db->from('transaksi t');
		
		$this->db->where('t.waktu >=',$awal);
		$this->db->where('t.waktu <=',$akhir.'24:00:00');
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
        $this->db->order_by('t.waktu','DESC');
		echo json_encode($this->db->get()->result());
	}
	function filter_tampil_print($awal, $akhir){
		$this->db->select('*');
		$this->db->from('transaksi t');
		
		$this->db->where('t.waktu >=',$awal);
		$this->db->where('t.waktu <=',$akhir.'24:00:00');
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
        $this->db->order_by('t.waktu','DESC');
		return $this->db->get()->result();
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
		
		$this->db->where('t.waktu <=',$akhir.'24:00:00');
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
		$this->db->order_by('t.waktu','DESC');
        echo json_encode($this->db->get()->result());
	}
    
	public function insert($data){
		return $this->db->insert($this->table,$data);
	}
	
	function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	function get_id_last() {
        $this->db->select('*');
        $this->db->order_by('waktu','DESC');
        $this->db->limit(1,0);
        return $this->db->get($this->table)->row();
    }

    function filter_tampil_SUM_Pemasukan($awal=null, $akhir=null){
		$this->db->select('SUM(total_bayar) as jumlah');
		$this->db->from('transaksi t');
		
		if(!empty($awal)){
			$this->db->where('t.waktu >=',$awal);
			$this->db->where('t.waktu <=',$akhir.'24:00:00');
		}else{
			$awal = date('Y-m-d');
			$akhir = date('Y-m-d');
			$this->db->where('t.waktu >=',$awal);
			$this->db->where('t.waktu <=',$akhir.'24:00:00');
		}
		
		$this->db->join('rekam_medis r', 'r.id_rekam_medis=t.id_rekam_medis', 'left');
        $this->db->join('data_pasien d', 'd.ID_pasien=r.ID_pasien', 'left');
        $this->db->where('t.status',1);
        $this->db->order_by('t.waktu','DESC');
		return $this->db->get()->row();
	}

	function filter_tampil_SUM_Apotik($awal=null, $akhir=null){
		$this->db->select('SUM(jumlah) as jumlah');
		$this->db->from('apotik a');
		
		if(!empty($awal)){
			$this->db->where('a.waktu >=',$awal);
			$this->db->where('a.waktu <=',$akhir.' 23:59:59');
		}else{
			$awal = date('Y-m-d');
			$akhir = date('Y-m-d');
			$this->db->where('a.waktu >=',$awal);
			$this->db->where('a.waktu <=',$akhir.'24:00:00');
		}

		$this->db->join('pendapatan p', 'p.id_apotik=a.id', 'left');
        $this->db->order_by('a.waktu','DESC');
		return $this->db->get()->row();
	}

	function filter_tampil_SUM_Keuangan($awal=null, $akhir=null){
		$this->db->select('SUM(jumlah) as jumlah');
		$this->db->from('pengeluaran');
		
		if(!empty($awal)){
			$this->db->where('waktu >=',$awal);
			$this->db->where('waktu <=',$akhir.' 23:59:59');
		}else{
			$awal = date('Y-m-d');
			$akhir = date('Y-m-d');
			$this->db->where('waktu >=',$awal);
			$this->db->where('waktu <=',$akhir.'24:00:00');
		}
		
		return $this->db->get()->row();
	}
}