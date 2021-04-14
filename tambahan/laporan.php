<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('pemasukan_model');
        $this->load->model('pengeluaran_model');
        $this->load->model('keuangan_model');
        $this->load->model('rekam_medis_model');
        $this->load->model('transaksi_model');
		if ($this->session->userdata('logged_in') != 'Sudah Login') redirect(base_url(''));
	}
	
	/*function laporan_pemasukan(){
		$data['_laporan_pemasukan'] = 1;
		$data['content'] = 'laporan/pemasukan';
		$this->load->view('template',$data);
	}
	
	function data_laporan_pemasukan(){
		$this->pemasukan_model->tampil();
	}*/
    
    
    // Laporan transaksi -----------------------------------------------------------------------------------------------------
    function laporan_transaksi(){
        $data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$data['_laporan_transaksi'] = 1;
		$data['content'] = 'laporan/transaksi';
		$this->load->view('template',$data);
	}
	
	function filter_laporan_transaksi($awal=NULL,$akhir=NULL){
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;
		$this->load->view('laporan/transaksi_filter',$viewbag);
	}
	
	function data_laporan_transaksi(){
        //$this->transaksi_model->tampil_laporan_transaksi();
        $awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
        $akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$this->transaksi_model->filter_tampil($awal, $akhir);
	}
	
	function data_laporan_filter_transaksi($awal,$akhir){
		$this->transaksi_model->filter_tampil($awal, $akhir);
	}
	
	function data_laporan_filter_awal_transaksi($awal=NULL){
		$this->transaksi_model->filter_tampil_awal($awal);
	}
	
	function data_laporan_filter_akhir_transaksi($akhir=NULL){
		$this->transaksi_model->filter_tampil_akhir($akhir);
	}
    // Laporan transaksi -----------------------------------------------------------------------------------------------------
    
	
	// Laporan Pemasukan -------------------------------------------------------------------------------------------------------
	function laporan_pemasukan(){
        $data['_laporan_pemasukan'] = 1;
		$data['content'] = 'laporan/pemasukan';
		$this->load->view('template',$data);
    }
	// Laporan Pemasukan -------------------------------------------------------------------------------------------------------
	
    
    // Laporan pengeluaran ---------------------------------------------------------------------------------------------------
    function laporan_pengeluaran(){
        $data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
        $data['_laporan_pengeluaran'] = 1;
		$data['content'] = 'laporan/pengeluaran';
		$this->load->view('template',$data);
    }
    
    function filter_laporan_pengeluaran($awal=NULL,$akhir=NULL){
        /*if (($awal!==0) and ($akhir!==0)) {
            $data_laporan = $this->pengeluaran_model->filter_tampil($awal, $akhir);
        }
        elseif (($awal!==0) and ($akhir==0)) {
            $data_laporan = $this->pengeluaran_model->filter_tampil_awal($awal);
        }
        elseif (($awal==0) and ($akhir!==0)) {
            $data_laporan = $this->pengeluaran_model->filter_tampil_akhir($akhir);
        }
        
        foreach ($data_laporan as $row) {
            $viewbag['jumlah'] = $viewbag['jumlah'] + $row['jumlah'];
        }*/
        
        $viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;
        
		$this->load->view('laporan/pengeluaran_filter',$viewbag);
    }
    
    function data_laporan_pengeluaran(){
		//$this->pengeluaran_model->tampil();
        $awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
        $akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));;
        echo json_encode($this->pengeluaran_model->filter_tampil($awal, $akhir));
	}
    
    function data_laporan_filter_pengeluaran($awal,$akhir){
        echo json_encode($this->pengeluaran_model->filter_tampil($awal, $akhir));
	}
	
	function data_laporan_filter_awal_pengeluaran($awal=NULL){
		echo json_encode($this->pengeluaran_model->filter_tampil_awal($awal));
	}
	
	function data_laporan_filter_akhir_pengeluaran($akhir=NULL){
		echo json_encode($this->pengeluaran_model->filter_tampil_akhir($akhir));
	}
    // Laporan pengeluaran ---------------------------------------------------------------------------------------------------

    
    // Laporan Keuangan ------------------------------------------------------------------------------------------------------
    function laporan_keuangan(){
        $data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
        $data['_laporan_keuangan'] = 1;
		$data['content'] = 'laporan/keuangan';
		$this->load->view('template',$data);
    }
    
    function filter_laporan_keuangan($awal=NULL,$akhir=NULL){
        /*if (($awal!==0) and ($akhir!==0)) {
            $data_laporan = $this->pengeluaran_model->filter_tampil($awal, $akhir);
        }
        elseif (($awal!==0) and ($akhir==0)) {
            $data_laporan = $this->pengeluaran_model->filter_tampil_awal($awal);
        }
        elseif (($awal==0) and ($akhir!==0)) {
            $data_laporan = $this->pengeluaran_model->filter_tampil_akhir($akhir);
        }
        
        foreach ($data_laporan as $row) {
            $viewbag['jumlah'] = $viewbag['jumlah'] + $row['jumlah'];
        }*/
        
        $viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;
        
		$this->load->view('laporan/keuangan_filter',$viewbag);
    }
    
    function data_laporan_keuangan(){
		//$this->pengeluaran_model->tampil();
        $awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
        $akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));;
        echo json_encode($this->keuangan_model->filter_tampil($awal, $akhir));
	}
    
    function data_laporan_filter_keuangan($awal,$akhir){
        echo json_encode($this->keuangan_model->filter_tampil($awal, $akhir));
	}
	
	function data_laporan_filter_awal_keuangan($awal=NULL){
		echo json_encode($this->keuangan_model->filter_tampil_awal($awal));
	}
	
	function data_laporan_filter_akhir_keuangan($akhir=NULL){
		echo json_encode($this->keuangan_model->filter_tampil_akhir($akhir));
	}
	
}