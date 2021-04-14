<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('layanan_model');
        $this->load->library('form_validation');
        if($this->session->userdata("email") == ""){
			redirect(base_url(''));
		}
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'layanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'layanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'layanan/index.html';
            $config['first_url'] = base_url() . 'layanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->layanan_model->total_rows($q);
        $layanan = $this->layanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'id_survey' => $id_survey,
            'id_pasien' => $id_pasien,
            'survey1' => $survey1,
            'survey2' => $survey2,
            'survey3' => $survey3,
            'survey4' => $survey4,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		
		$data['_layanan'] = 1;
        $data['content']  = 'layanan/layanan_list';
        $this->load->view('template', $data);
    }

    function get_json_layanan(){
        $data=$this->layanan_model->get_json();
        echo json_encode($data);
    }

    public function read($id) {
        $row = $this->layanan_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_layanan' => $row->id_layanan,
				'Layanan' 	 => $row->Layanan,
				'Harga'   	 => $row->Harga
			);
			
			$data['_layanan'] = 1;
            $data['content']  = 'layanan/layanan_read';
            $this->load->view('template', $data);
        }
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('layanan/create_action'),
			'id_layanan' => set_value('id_layanan'),
			'Layanan' => set_value('Layanan'),
			'Harga' => set_value('Harga'),
		);
		
		$data['_layanan'] = 1;
        $data['content']  = 'layanan/layanan_form_add';
        $this->load->view('template', $data);
    }
    
    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }
		else {
            $data = array(
				'Layanan' => $this->input->post('Layanan',TRUE),
				'Harga' => $this->input->post('Harga',TRUE),
			);

            $this->layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('layanan'));
        }
    }

    public function create_action_dokter($id_pasien) {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }
        else {
            $data = array(
                'Layanan' => $this->input->post('Layanan',TRUE),
                'Harga' => $this->input->post('Harga',TRUE),
            );

            $this->layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rekam_medis/create/'.$id_pasien));
        }
    }
    
    public function update($id) 
    {
        $row = $this->layanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('layanan/update_action'),
				'id_layanan' => set_value('id_layanan', $row->id_layanan),
				'Layanan' => set_value('Layanan', $row->Layanan),
				'Harga' => set_value('Harga', $row->Harga),
			);
			
			$data['_layanan'] = 1;
            $data['content'] = 'layanan/layanan_form';
            $this->load->view('template', $data);
        }
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }
    
    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_layanan', TRUE));
        }
		else {
            $data = array(
				'Layanan' => $this->input->post('Layanan',TRUE),
				'Harga' => $this->input->post('Harga',TRUE),
			);

            $this->layanan_model->update($this->input->post('id_layanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('layanan'));
        }
    }

     public function update_action_dokter($id_rekam) {
        
            $data = array(
                'Layanan' => $this->input->post('Layanan',TRUE),
                'Harga' => $this->input->post('Harga',TRUE),
            );

            $this->layanan_model->update($this->input->post('id_layanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rekam_medis/create/'.$id_rekam));
        
    }
    
    public function delete($id) {
        $row = $this->layanan_model->get_by_id($id);

        if ($row) {
            $this->layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('layanan'));
        }
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }
    public function delete_dokter($id_rekam,$id) {
        $row = $this->layanan_model->get_by_id($id);

        if ($row) {
            $this->layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rekam_medis/create/'.$id_rekam));
        }
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
             redirect(site_url('rekam_medis/create/'.$id_rekam));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('Layanan', 'layanan', 'trim|required');
		$this->form_validation->set_rules('Harga', 'harga', 'trim|required');

		$this->form_validation->set_rules('id_layanan', 'id_layanan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-29 06:10:02 */
/* http://harviacode.com */