<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        
        $this->load->model('model_user');
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') != 'Sudah Login')
            redirect(base_url(''));
    }
	
	public function index(){
	
		$data['_update_user'] = 1;
        $data['content'] = 'user/index';
        $this->load->view('template', $data);
	}
	
	public function get_json_user(){
		echo json_encode($this->model_user->get()->result());
	}
	
	public function detail_user($username){
		$data['_update_user'] = 1;
		$data['content'] = 'user/form';		
		$data['username'] = $username;		
		$this->load->view('template',$data);
	}
	
	public function update(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password', 'Password',  'required');
		if ($this->form_validation->run() == FALSE){
			//$viewbag['menu'] = $data;
			$data['_update_user'] = 1;
			$data['content'] = 'user/form';
            $this->load->view('template',$data);
		}
		else{
			$this->model_user->update($data);
			redirect(base_url("user"));
		}
		
	}

	public function registrasi()
    {
        $data = array(

            'title' => 'Tambah Data USER'

        );

        $this->load->view('registrasi', $data);
    }

    public function simpan()
    {
        $data = array(

            'username' => $this->input->post("username"),
            'password' => md5($this->input->post("password")),

        );

        $this->admin->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Berhasil Menambah User.
            </div>');

        //redirect
        redirect('login/');

    }
}
?>