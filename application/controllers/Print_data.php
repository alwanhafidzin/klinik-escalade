<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_data extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('apotik_model');
		$this->load->model('keuangan_model');
	}
	public function index($awal="",$akhir="")
	{
		$data['awal']=$awal;
		$data['akhir']=$akhir;	
		$data['pemasukan_klinik']=$this->transaksi_model->filter_tampil_print($awal, $akhir);
		$data['pemasukan_apotik']=$this->apotik_model->filter_tampil_print($awal, $akhir);
		$data['pengeluaran']=$this->keuangan_model->filter_tampil($awal, $akhir);
		$this->load->view('print/keuangan.php',$data);
	}

}

/* End of file print.php */
/* Location: ./application/controllers/print.php */