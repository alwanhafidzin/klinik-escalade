<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Metodebayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('metode_model');
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
            $config['base_url'] = base_url() . 'metodebayar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'metodebayar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'metodebayar/index.html';
            $config['first_url'] = base_url() . 'metodebayar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->metode_model->total_rows($q);
        $metode = $this->metode_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'metode_data' => $metode,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		
		$data['_metodebayar'] = 1;
        $data['content']  = 'metodebayar/metode_list';
        $this->load->view('template', $data);
    }

    function get_json_metode(){
        $data=$this->metode_model->get_json();
        echo json_encode($data);
    }

    public function read($id) {
        $row = $this->metode_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_metode' => $row->id_metode,
				'nama_metode' 	 => $row->nama_metode,
			);
			
			$data['_metodebayar'] = 1;
            $data['content']  = 'metodebayar/metode_read';
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
            'action' => site_url('metodebayar/create_action'),
			'id_metode' => set_value('id_metode'),
			'nama_metode' => set_value('nama_metode'),
		);
		
		$data['_metodebayar'] = 1;
        $data['content']  = 'metodebayar/metode_form_add';
        $this->load->view('template', $data);
    }
    
    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }
		else {
            $data = array(
				'nama_metode' => $this->input->post('nama_metode',TRUE),
			);

            $this->metode_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('metodebayar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->metode_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('layanan/update_action'),
				'id_metode' => set_value('id_metode', $row->id_metode),
				'nama_metode' => set_value('nama_metode', $row->nama_metode),
			);
			
			$data['_metodebayar'] = 1;
            $data['content'] = 'metodebayar/metode_form';
            $this->load->view('template', $data);
        }
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('metodebayar'));
        }
    }
    
    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_metode', TRUE));
        }
		else {
            $data = array(
				'nama_metode' => $this->input->post('nama_metode',TRUE),
			);

            $this->metode_model->update($this->input->post('id_metode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('metodebayar'));
        }
    }
    
    public function delete($id) {
        $row = $this->metode_model->get_by_id($id);

        if ($row) {
            $this->metode_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('metodebayar'));
        }
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('metodebayar'));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('nama_metode', 'nama_metode', 'trim|required');

		$this->form_validation->set_rules('id_metode', 'id_metode', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-29 06:10:02 */
/* http://harviacode.com */