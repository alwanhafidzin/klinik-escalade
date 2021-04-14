<?php

class Obat extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('obat_model');
		$this->load->model('detail_stok_obat_model');
		$this->load->library('form_validation');
		if($this->session->userdata("email") == ""){
			redirect(base_url(''));
		}
	}
	
	function index(){
		$data['_obat']	 = 1;
		$data['content'] = 'obat/obat';
		$this->load->view('template',$data);
	}
	
	function data_obat(){
		$this->obat_model->tampil();
	}
	
	function tambah_obat_baru(){
		$data['_obat'] 	 = 1;
		$data['content'] = 'obat/obat_tambah_baru';
		$this->load->view('template',$data);
	}
	
	function edit_obat($id){
		$data_obat = $this->obat_model->get_by_id($id);
		
		$data['id']			  = $id;
		$data['nama']	 	  = $data_obat->nama;
		$data['harga_satuan'] = $data_obat->harga_satuan;
		$data['kode_krim']	= $data_obat->kode_krim;
		$data['_obat'] 	 = 1;
		$data['content'] = 'obat/obat_edit';
		$this->load->view('template',$data);
	}
	
	function simpan_obat($id=NULL){
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		//$this->form_validation->set_rules('kode_krim', 'Kode Krim', 'required');
		$this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|is_natural');
		
		if ($this->form_validation->run() == FALSE) {
			$data_obat = $this->obat_model->get_by_id($id);
			
			$data['id']	     	  = $id;
			$data['nama']	 	  = $data_obat->nama;
			$data['harga_satuan'] = $data_obat->harga_satuan;
			$data['_obat'] 	 = 1;
			$data['content'] = 'obat/obat_edit';
			$this->load->view('template',$data);
		}
		else {
			$data_obat = array(
				'nama' => $this->input->post('nama_obat'),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'kode_krim'=>$this->input->post('kode_krim')
			);
			
			if ($id != NULL) {
				$this->obat_model->update($id,$data_obat);	
			}
			else{
				$this->obat_model->insert($data_obat);
			}
			
			redirect(base_url('obat'));
		}
	}
	
	function tambah_stok($id){
		$data_obat = $this->obat_model->get_by_id($id);
		
		$data['nama_obat'] = $data_obat->nama;
		$data['id']		 = $id;
		$data['_obat'] 	 = 1;
		$data['content'] = 'obat/obat_stok_tambah';
		$this->load->view('template',$data);
	}
	
	function simpan_stok($id){
		$jumlah=0;
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|is_natural');
		$this->form_validation->set_rules('tanggal_expired', 'Tanggal Expired', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['nama_obat'] = $data_obat->nama;
			$data['id']		 = $id;
			$data['_obat'] 	 = 1;
			$data['content'] = 'obat/obat_stok_tambah';
			$this->load->view('template',$data);
		}
		else{
			// insert tabel detail stok obat
			$data_detail_stok_obat = array(
				'id_obat' 		  => $id,
				'tanggal_expired' => $this->input->post('tanggal_expired'),
				'jumlah' 		  => $this->input->post('jumlah'),
				'tgl_masuk'		  => $this->input->post('tgl_masuk')
			);
			$this->detail_stok_obat_model->insert($data_detail_stok_obat);
			
			// hitung jumlah total obat pada tabel detail stok obat berdasarkan id obat yang dipilih

			$detail_obat_obat = $this->detail_stok_obat_model->get_all_id_obat($id);
			foreach ($detail_obat_obat as $detail_obat) {
				$jumlah = $jumlah + $detail_obat->jumlah;
			}
			
			// update jumlah stok obat pada tabel obat
			$data_obat = array(
				'jumlah' => $jumlah
			);
			$this->obat_model->update($id,$data_obat);

			$this->db->insert('detail_sisa_stok_obat', array(
            	'tgl_transaksi'=> $this->input->post('tgl_masuk'),
            	'id_obat'	=> $id,
            	'jumlah_sisa'=> $jumlah,
            	
            ));
			
			redirect(base_url('obat'));
		}
	}
    
	
	// Edit stok obat ---------------------------------------------------------------------------------------------
	function detail_stok_obat($id){
		
		$data['id_obat']=$id;
		$data['data_obat']=$this->db->get_where('obat',array('id'=>$id))->result();
		$data['_obat'] 	 = 1;
		$data['content'] = 'obat/obat_stok_detail';
		$this->load->view('template',$data);
	}

	function get_data_detail_obat($id_obat){
		echo json_encode($this->detail_stok_obat_model->get_detail_obat($id_obat));	
	}

	function tambah_stok_detail(){
		$jumlah_obat=$this->input->post("jumlah_obat");
		$id_obat 	=$this->input->post("id_add_obat");
		$get_data 	=$this->detail_stok_obat_model->get_detail_obat_by_id($id_obat);
		$data_update=array('jumlah' => $jumlah_obat );
		$this->detail_stok_obat_model->update_detail_obat($id_obat,$data_update);
		$jumlah=0;
		$detail_obat_obat = $this->detail_stok_obat_model->get_all_id_obat($get_data['id_obat']);
		foreach ($detail_obat_obat as $detail_obat) {
				$jumlah = $jumlah + $detail_obat->jumlah;
		}
			
			// update jumlah stok obat pada tabel obat
			$data_obat = array(
				'jumlah' => $jumlah
		);
		$this->obat_model->update($get_data['id_obat'],$data_obat);		

		redirect(base_url('obat/detail_stok_obat/'.$get_data['id_obat']));
		

	}
	function hapus_stok_detail($id){
		$jumlah=0;
		$get_data 	=$this->detail_stok_obat_model->get_detail_obat_by_id($id);
		$this->detail_stok_obat_model->delete($id);
	 	$detail_obat_obat = $this->detail_stok_obat_model->get_all_id_obat($get_data['id_obat']);
		foreach ($detail_obat_obat as $detail_obat) {
				$jumlah = $jumlah + $detail_obat->jumlah;
		}
			
			// update jumlah stok obat pada tabel obat
			$data_obat = array(
				'jumlah' => $jumlah
		);
		$this->obat_model->update($get_data['id_obat'],$data_obat);	
		$this->detail_stok_obat_model->delete($id);

		redirect(base_url('obat/detail_stok_obat/'.$get_data['id_obat']));
	}

	function simpan_tambah_dokter($id){
		$data_obat = array(
				'nama' => $this->input->post('nama_obat'),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'kode_krim'=>$this->input->post('kode_krim')
			);
			
			$this->obat_model->insert($data_obat);
			
			
			redirect(base_url('rekam_medis/create/'.$id));
	}


	function simpan_edit_dokter($id,$id_obat){
		$data_obat = array(
				'nama' => $this->input->post('nama_obat'),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'kode_krim'=>$this->input->post('kode_krim')
			);
			
		
			$this->obat_model->update($id_obat,$data_obat);	
			
			
			
			redirect(base_url('rekam_medis/create/'.$id));
	}

	function simpan_stok_obat_dokter($id,$id_pasien){
		// insert tabel detail stok obat
			$data_detail_stok_obat = array(
				'id_obat' 		  => $id,
				'tanggal_expired' => $this->input->post('tanggal_expired'),
				'jumlah' 		  => $this->input->post('jumlah'),
				'tgl_masuk'			=> $this->input->post('tgl_masuk')
			);
			$this->detail_stok_obat_model->insert($data_detail_stok_obat);
			
			// hitung jumlah total obat pada tabel detail stok obat berdasarkan id obat yang dipilih
			$detail_obat_obat = $this->detail_stok_obat_model->get_all_id_obat($id);
			foreach ($detail_obat_obat as $detail_obat) {
				$jumlah = $jumlah + $detail_obat->jumlah;
			}
			
			// update jumlah stok obat pada tabel obat
			$data_obat = array(
				'jumlah' => $jumlah
			);
			$this->obat_model->update($id,$data_obat);

			$this->db->insert('detail_sisa_stok_obat', array(
            	'tgl_transaksi'=> $this->input->post('tgl_masuk'),
            	'id_obat'	=> $id,
            	'jumlah_sisa'=> $jumlah,
            	
            ));
			
			redirect(base_url('rekam_medis/create/'.$id_pasien));
	}

	function sembunyi(){

		
		$data['_obat'] 	 = 1;
		$data['content'] = 'obat/sembunyi';
		$this->load->view('template',$data);
	}

	function data_obat_sisa(){
		$this->db->select('*');
		$this->db->from('detail_sisa_stok_obat');
		$this->db->join('obat', 'detail_sisa_stok_obat.id_obat = obat.id');
		$data=$this->db->get()->result_array();
		echo json_encode($data);
	}

	function edit_sisa_obat(){
		$data=$this->input->post();

		$data_obat=array(
			'jumlah_sisa'=>$data['jumlah_sisa']
		);
		$this->db->where('id_detail_sisa_stok_obat',$data['id_detail_sisa_stok_obat']);
		$this->db->update('detail_sisa_stok_obat', $data_obat);
		redirect(base_url('obat/sembunyi/'));
	}
	// Edit stok obat ---------------------------------------------------------------------------------------------
}