<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
	public $table 	 = 'rekam_medis';
	public $id_rekam = 'rekam_medis.id_rekam_medis';
	public $order 	 = 'DESC';
	
	function tampil_data_pasien(){
        $this->db->order_by('rekam_medis.tanggal', 'DESC');
		$this->db->join('data_pasien','rekam_medis.ID_pasien=data_pasien.ID_pasien');
        $this->db->join('transaksi','rekam_medis.id_rekam_medis=transaksi.id_rekam_medis');
		$this->db->where('transaksi.status',0);
		echo json_encode($this->db->get($this->table)->result());
    }
	
    function data_pembayaran($id){
		$this->db->select('layanan.id_layanan');
		$this->db->select('layanan.Layanan');
		$this->db->select('layanan.Harga');
		$this->db->where('rekam_medis.id_rekam_medis',$id);
		$this->db->join('detail_layanan','rekam_medis.id_rekam_medis=detail_layanan.id_rekam_medis');
		$this->db->join('layanan','detail_layanan.id_layanan=layanan.id_layanan');
        return $this->db->get($this->table)->result();
    }
    
	function tampil_data_pembayaran($id){
		$this->db->select('layanan.id_layanan');
		$this->db->select('layanan.Layanan');
		$this->db->select('layanan.Harga');
		$this->db->select('rekam_medis.tanggal');
		$this->db->where('rekam_medis.id_rekam_medis',$id);
		$this->db->join('detail_layanan','rekam_medis.id_rekam_medis=detail_layanan.id_rekam_medis');
		$this->db->join('layanan','detail_layanan.id_layanan=layanan.id_layanan');
		echo json_encode($this->db->get($this->table)->result());
    }
	
	function tampil_data_layanan($id){
		$this->load->model('layanan_model');
		$this->db->where('id_rekam_medis',$id);
		$query = $this->db->get('detail_layanan')->result();
		foreach($query as $row){
			$layanan = $this->layanan_model->get_by_id($row->id_layanan);
			$data = array(
			'id' => $row->id,
			'nama' => $layanan->Layanan,
			'harga' => $row->harga_layanan
			);
			$data_layanan[] = $data;
		}
		return $data_layanan;
	}
	
	function tampil_data_obat($id){
		$this->load->model('obat_model');
		$this->db->where('id_rekam_medis',$id);
		$query = $this->db->get('detail_obat')->result();
		foreach($query as $row){
			$obat = $this->obat_model->get_by_id($row->id_obat);
			$data = array(
			'id' => $row->id,
			'nama' => $obat->nama,
			'harga' => $row->harga_satuan_obat,
			'total' => $row->jumlah * $row->harga_satuan_obat
			);
			$data_obat[] = $data;
		}
		return $data_obat;
	}
	
	function delete_obat($id){
		$this->db->where('id',$id);
		$this->db->delete('detail_obat');
	}
	
	public function get_all(){
		$this->db->order_by($this->id_rekam,'DESC');
		return $this->db->get($this->table)->result_array();
	}
	
	public function getshow($id){
		$this->db->where($this->id_rekam,$id);
		return $this->db->get($this->table)->result_array();
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
	
    function total_rows($q = NULL) {
        $this->db->like($this->id_rekam, $q);
		$this->db->or_like('ID_pasien', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id_rekam, $this->order);
        $this->db->like($this->id_rekam, $q);
		// $this->db->or_like('rekam_medis.ID_pasien', $q);
		$this->db->limit(10, $start);
		$this->db->join('data_pasien','rekam_medis.ID_pasien=data_pasien.ID_pasien');
        return $this->db->get($this->table)->result_array();
    }
	
	function get_metode(){
		return $this->db->get('metode_pembayaran')->result();
	}
}