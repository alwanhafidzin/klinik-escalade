<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		$this->load->view('index');
	}

	public function cek_login() {
		$data = array(
			'email' => $this->input->post('email', TRUE),
			'password' => md5($this->input->post('password', TRUE))
		);
		$this->load->model('model_user'); // load model_user
		$cek_login = $this->model_user->where($data);
		if($cek_login->num_rows() > 0){
			$sql = $cek_login->result_array();
			
			$items = array();
			foreach($sql as $key) {
				$items = $key;
			}
			// print_r($items);
			$this->session->set_userdata($items);
			
		//	$this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Masuk</div>');
			redirect('pasien');
		}else{
			echo "<script>alert('Gagal login: Cek email dan password!');history.go(-1);</script>";
		}	

		
		//redirect('rekam_medis');
		// if ($hasil->num_rows() == 1) {
		// 	$sql = $hasil->result_array();
                
		// 	$items = array();
		// 	foreach($sql as $key) {
		// 		$items = $key;
		// 	}
		// 	// print_r($items);
		// 	$this->session->set_userdata($items);
		// 	redirect('rekam_medis');
		// 	// foreach ($hasil->result() as $sess) {
		// 	// 	$sess_data['logged_in'] = 'Sudah Login';
		// 	// 	$sess_data['id'] = $sess->id;
		// 	// 	$sess_data['username'] = $sess->username;
		// 	// 	$sess_data['level'] = $sess->level;
		// 	// 	$this->session->set_userdata($sess_data);
		// 	// }
		// 	//if ($this->session->userdata('level')=='Super dokter') {
                
        //     // }
		// 	// elseif ($this->session->userdata('level')=='Dokter') {
		// 	// 	redirect('rekam_medis');
		// 	// }
		// 	// elseif ($this->session->userdata('level')=='Resepsionis') {
		// 	// 	redirect('antrian');
		// 	// }		
		// }
		// else {
		// 	echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		// }
	}
	
	function logout(){
		$this->session->sess_destroy();
        redirect(base_url(''));
	}
}
?>