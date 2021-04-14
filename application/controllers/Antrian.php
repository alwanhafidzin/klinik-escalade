<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Antrian extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('antrian_model');
        $this->load->model('model_booking');
        $this->load->model('Data_pasien_model');
        $this->load->model('rekam_medis_model');
        $this->load->library('form_validation');
        // if ($this->session->userdata('logged_in') != 'Sudah Login')
        //     redirect(base_url(''));
    }

    public function index() {
        $data['_antrian'] = 1;
        $data['content'] = 'superdokter/home';
        $this->load->view('template_dokter', $data);
    }

    public function get_json() {
        $data_antrian = $this->antrian_model->get_json();
        echo json_encode($data_antrian);
    }

    /* public function read($id) {
      $row = $this->antrian_model->get_by_id($id);
      if ($row) {
      $data = array(
      'no_antrian' => $row->no_antrian,
      'nama' 		 => $row->nama,
      );
      $this->load->view('antrian/antrian_read', $data);
      }
      else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('antrian'));
      }
      } */

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('antrian/create_action'),
            'no_antrian' => set_value('no_antrian'),
            'nama' => set_value('nama'),
        );

        $data['_antrian'] = 1;
        $data['content'] = 'antrian/antrian_form';
        $this->load->view('template', $data);
    }

    public function create_action($id) {

      $id_user = $this->model_booking->get_by_id($id);
        $data_rekam_medis = array(
            'keluhan_utama' => $this->input->post('keluhan_utama'),
            'id_booking' => $id
        );
        
        
        $this->rekam_medis_model->insert($data_rekam_medis,$id);
 
        $rekam_medis = $this->rekam_medis_model->get_id_last();

        // $this->_rules();
        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } 
        //else {
        $data = array(
            'id_booking' => $id,
            'id_rekam_medis' => $rekam_medis->id_rekam_medis
        );

        $status =  array(
          'status' => '1' );
        $where =  array(
          'id_booking' => $id );

        $this->antrian_model->update_book($where,$status,'booking');

        $this->antrian_model->insert($data);
        //$this->model_booking->update($status, 'id_booking');
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('antrian'));
        // }
    }

    /* public function update($id) {
      $row = $this->antrian_model->get_by_id($id);

      if ($row) {
      $data = array(
      'button' 	 => 'Update',
      'action' 	 => site_url('antrian/update_action'),
      'no_antrian' => set_value('no_antrian', $row->no_antrian),
      'nama' 		 => set_value('nama', $row->nama),
      );
      $this->load->view('antrian/antrian_form', $data);
      }
      else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('antrian'));
      }
      }

      public function update_action(){
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('no_antrian', TRUE));
      }
      else {
      $data = array(
      'nama' => $this->input->post('nama',TRUE),
      );

      $this->antrian_model->update($this->input->post('no_antrian', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('antrian'));
      }
      } */

    public function delete($id) {
        $row = $this->antrian_model->get_by_id($id);
        $this->rekam_medis_model->delete($row->id_rekam_medis);
        
        if ($row) {
            $this->antrian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('antrian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('antrian'));
        }   
    }

    public function _rules() {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');

        $this->form_validation->set_rules('no_antrian', 'no_antrian', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function pilih() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'antrian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'antrian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'antrian/index.html';
            $config['first_url'] = base_url() . 'antrian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_pasien_model->total_rows($q);
        $antrian = $this->Data_pasien_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_pasien_data' => $antrian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $data['_antrian'] = 1;
        $data['content'] = 'antrian/antrian_pilih';
        $this->load->view('template', $data);
    }

    function data_antrian_pilih() {
        $this->model_booking->tampil_antri();
    }

}

/* End of file Antrian.php */
/* Location: ./application/controllers/Antrian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-29 07:33:28 */
/* http://harviacode.com */