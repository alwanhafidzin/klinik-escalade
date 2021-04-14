<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_pasien_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_pasien/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_pasien/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_pasien/index.html';
            $config['first_url'] = base_url() . 'data_pasien/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_pasien_model->total_rows($q);
        $data_pasien = $this->Data_pasien_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_pasien_data' => $data_pasien,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('data_pasien/data_pasien_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_pasien' => $row->ID_pasien,
		'foto' => $row->foto,
		'Nama' => $row->Nama,
		'Alamat' => $row->Alamat,
		'Tanggal_lahir' => $row->Tanggal_lahir,
		'No_hp' => $row->No_hp,
		'keluhan_utama' => $row->keluhan_utama,
		'riwayat_penyakit' => $row->riwayat_penyakit,
		'riwayat_alergi_obat' => $row->riwayat_alergi_obat,
		'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya,
	    );
            $this->load->view('data_pasien/data_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_pasien'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_pasien/create_action'),
	    'ID_pasien' => set_value('ID_pasien'),
	    'foto' => set_value('foto'),
	    'Nama' => set_value('Nama'),
	    'Alamat' => set_value('Alamat'),
	    'Tanggal_lahir' => set_value('Tanggal_lahir'),
	    'No_hp' => set_value('No_hp'),
	    'keluhan_utama' => set_value('keluhan_utama'),
	    'riwayat_penyakit' => set_value('riwayat_penyakit'),
	    'riwayat_alergi_obat' => set_value('riwayat_alergi_obat'),
	    'riwayat_pengobatan_sebelumnya' => set_value('riwayat_pengobatan_sebelumnya'),
	);
        $this->load->view('data_pasien/data_pasien_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Tanggal_lahir' => $this->input->post('Tanggal_lahir',TRUE),
		'No_hp' => $this->input->post('No_hp',TRUE),
		'keluhan_utama' => $this->input->post('keluhan_utama',TRUE),
		'riwayat_penyakit' => $this->input->post('riwayat_penyakit',TRUE),
		'riwayat_alergi_obat' => $this->input->post('riwayat_alergi_obat',TRUE),
		'riwayat_pengobatan_sebelumnya' => $this->input->post('riwayat_pengobatan_sebelumnya',TRUE),
	    );

            $this->Data_pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_pasien'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_pasien/update_action'),
		'ID_pasien' => set_value('ID_pasien', $row->ID_pasien),
		'foto' => set_value('foto', $row->foto),
		'Nama' => set_value('Nama', $row->Nama),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'Tanggal_lahir' => set_value('Tanggal_lahir', $row->Tanggal_lahir),
		'No_hp' => set_value('No_hp', $row->No_hp),
		'keluhan_utama' => set_value('keluhan_utama', $row->keluhan_utama),
		'riwayat_penyakit' => set_value('riwayat_penyakit', $row->riwayat_penyakit),
		'riwayat_alergi_obat' => set_value('riwayat_alergi_obat', $row->riwayat_alergi_obat),
		'riwayat_pengobatan_sebelumnya' => set_value('riwayat_pengobatan_sebelumnya', $row->riwayat_pengobatan_sebelumnya),
	    );
            $this->load->view('data_pasien/data_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_pasien'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_pasien', TRUE));
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Tanggal_lahir' => $this->input->post('Tanggal_lahir',TRUE),
		'No_hp' => $this->input->post('No_hp',TRUE),
		'keluhan_utama' => $this->input->post('keluhan_utama',TRUE),
		'riwayat_penyakit' => $this->input->post('riwayat_penyakit',TRUE),
		'riwayat_alergi_obat' => $this->input->post('riwayat_alergi_obat',TRUE),
		'riwayat_pengobatan_sebelumnya' => $this->input->post('riwayat_pengobatan_sebelumnya',TRUE),
	    );

            $this->Data_pasien_model->update($this->input->post('ID_pasien', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_pasien'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_pasien_model->get_by_id($id);

        if ($row) {
            $this->Data_pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_pasien'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('Tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('No_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('keluhan_utama', 'keluhan utama', 'trim|required');
	$this->form_validation->set_rules('riwayat_penyakit', 'riwayat penyakit', 'trim|required');
	$this->form_validation->set_rules('riwayat_alergi_obat', 'riwayat alergi obat', 'trim|required');
	$this->form_validation->set_rules('riwayat_pengobatan_sebelumnya', 'riwayat pengobatan sebelumnya', 'trim|required');

	$this->form_validation->set_rules('ID_pasien', 'ID_pasien', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Data_pasien.php */
/* Location: ./application/controllers/Data_pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-21 10:42:39 */
/* http://harviacode.com */