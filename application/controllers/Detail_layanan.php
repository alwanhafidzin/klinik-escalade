<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detail_layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('antrian_model');
        $this->load->model('layanan_model');
        $this->load->model('detail_layanan_model');
        $this->load->model('Data_pasien_model');
        $this->load->model('Rekam_medis_model');
        $this->load->library('form_validation');
		if ($this->session->userdata('logged_in') != 'Sudah Login') redirect(base_url(''));
    }
    public function tambah_data(){
        $id_rekam_medis = $this->input->post('id_rekam_medis');
        $id_layanan = $this->input->post('id_layanan');
        $harga_layanan = $this->input->post('harga_layanan');
        $row = array('id_rekam_medis' => $id_rekam_medis,'id_layanan' => $id_layanan, 'harga_layanan' => $harga_layanan);

        $this->detail_layanan_model->insert($row);
    }
}