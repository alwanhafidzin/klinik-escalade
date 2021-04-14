<?php

class Apotik_model extends CI_Model
{
    public $table = 'apotik';
    
    public function insert($data){
		return $this->db->insert($this->table,$data);
	}
    
    function get_id_last() {
        $this->db->select('*');
        $this->db->order_by('id','DESC');
        $this->db->limit(1,0);
        return $this->db->get($this->table)->row();
    }
	
	function filter_tampil($awal, $akhir){
		$this->db->select('*');
		$this->db->from('apotik a');
		
		$this->db->where('a.waktu >=',$awal.' 00:00:00');
		$this->db->where('a.waktu <=',$akhir.' 23:59:59');
		$this->db->join('pendapatan p', 'p.id_apotik=a.id', 'left');
        $this->db->order_by('a.waktu','DESC');
		echo json_encode($this->db->get()->result());
	}

	function filter_tampil_print($awal, $akhir){
		$this->db->select('*');
		$this->db->from('apotik a');
		
		$this->db->where('a.waktu >=',$awal.' 00:00:00');
		$this->db->where('a.waktu <=',$akhir.' 23:59:59');
		$this->db->join('pendapatan p', 'p.id_apotik=a.id', 'left');
        $this->db->order_by('a.waktu','DESC');
		return $this->db->get()->result();
	}
	
	function filter_tampil_awal($awal){
		$this->db->select('*');
		$this->db->from('apotik a');
		
		$this->db->where('a.waktu >=',$awal);
		$this->db->join('pendapatan p', 'p.id_apotik=a.id', 'left');
        $this->db->order_by('a.waktu','DESC');
        echo json_encode($this->db->get()->result());
	}
	
	function filter_tampil_akhir($akhir){
		$this->db->select('*');
		$this->db->from('apotik a');
		
		$this->db->where('a.waktu <=',$akhir.'24:00:00');
		$this->db->join('pendapatan p', 'p.id_apotik=a.id', 'left');
        $this->db->order_by('a.waktu','DESC');
        echo json_encode($this->db->get()->result());
	}
	
	function laporan_obat($awal,$akhir){
		
		$obat = $this->db->get('obat')->result();
		foreach($obat as $ob){
			$dattt=$this->jumlah($ob->id,$awal,$akhir);
			$data = array(
				'nama' => $ob->nama,
				'jumlah' => $dattt['jumlah'],
				'kode_krim'=>$ob->kode_krim,
				'sisa_obat'=>$ob->jumlah,
				'id_obat'=>$ob->id,
				'jumlah_sisa'=>$dattt['sisa_jumlah']
			);
		
			$data_obat[] = $data;	
		}
		return $data_obat;
		
		// $this->db->select('nama');
		// $this->db->select('obat.jumlah');
		// $this->db->select('obat.kode_krim');
		// $this->db->select('apotik.waktu');
		// $this->db->select('sum(detail_apotik.jumlah) as detjum');
		// $awal=str_replace("%20", " ", $awal);
		// $akhir=str_replace("%20", " ", $akhir);
		// $data_where = array(
		// 	'apotik.waktu >=' => $awal,
		// 	'apotik.waktu <=' => $akhir	
		//  );

		
		// $this->db->where($data_where);
		// $this->db->from('obat');
		// $this->db->join('detail_apotik', 'obat.id=detail_apotik.id_obat', 'left');
		// $this->db->join('apotik', 'detail_apotik.id_apotik=apotik.id', 'left');
		// $this->db->group_by('detail_apotik.id_obat');
		// return $this->db->get()->result_array();
	}
	
	function jumlah($id,$awal,$akhir){
		$awal=str_replace("%20", " ", $awal);
		$akhir=str_replace("%20", " ", $akhir);
		$jumlah = 0;
		if($akhir == 0)
			$akhir = date('Y-m-d', strtotime('now'));
		$this->db->where('waktu >=',$awal);
		//echo $awal; die();
		$this->db->where('waktu <=',$akhir);
		//echo $akhir; die();
		$klinik = $this->db->get('transaksi')->result();
		foreach($klinik as $clinic){
			//echo $clinic->id_rekam_medis; die();
			$this->db->where('id_rekam_medis',$clinic->id_rekam_medis);
			$this->db->where('id_obat',$id);
			$obat = $this->db->get('detail_obat')->result();
			foreach($obat as $ob){
				$jumlah = $jumlah + $ob->jumlah;
			}
		}
		
		$this->db->where('waktu >=',$awal);
		$this->db->where('waktu <=',$akhir);
		$apotik = $this->db->get('apotik')->result();
		$siss=0;
		foreach($apotik as $drug){
			$this->db->where('id_apotik',$drug->id);
			$this->db->where('id_obat',$id);
			$obat = $this->db->get('detail_apotik')->result();
			foreach($obat as $ob){
				$jumlah = $jumlah + $ob->jumlah;
			}
			$this->db->where('id_apotik',$drug->id);
			$this->db->where('id_obat',$id);
			$er= $this->db->get('detail_sisa_stok_obat')->row();
			if (!empty($er)) {
				$siss=$er->jumlah_sisa;
			}		
		}
		$data_return=array(
			'jumlah'=>$jumlah,
			'sisa_jumlah'=>$siss
		);
		
		return $data_return;
	}
	
}