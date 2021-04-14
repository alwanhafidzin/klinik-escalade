<?php

class Pengeluaran extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('pengeluaran_model');
        $this->load->library('form_validation');
        if($this->session->userdata("email") == ""){
			redirect(base_url(''));
		}
    }
    
    function index(){
        $data['_pengeluaran'] = 1;
		$data['content'] = 'pengeluaran/pengeluaran';
		$this->load->view('template',$data);
    }
    
    function simpan_pengeluaran(){
		$this->form_validation->set_rules('keterangan',   'Keterangan',	  'required');
		$this->form_validation->set_rules('pengambil',    'Pengambil',	  'required');
        $this->form_validation->set_rules('waktu',        'waktu',    'required');
		$this->form_validation->set_rules('jumlah', 	  'Jumlah', 	  'required|is_natural_no_zero');
        
        if ($this->form_validation->run() == FALSE){
            $data['_pengeluaran'] = 1;
            $data['content'] = 'pengeluaran/pengeluaran';
            $this->load->view('template',$data);
        }
        else{
            $data_pengeluaran = array(
                'waktu'      => $this->input->post('waktu',TRUE)." ".date('H:i:s'),
                'keterangan' => $this->input->post('keterangan',TRUE),
                'pengambil'  => $this->input->post('pengambil',TRUE),
                'jumlah'     => $this->input->post('jumlah',TRUE)
            );
            $this->pengeluaran_model->insert($data_pengeluaran);
            
            redirect(base_url('laporan/laporan_pengeluaran'));
        }
    }
}