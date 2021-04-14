<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contoh_upload_webcam extends CI_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->con = new Db_handler();
		$this->data['view'] = $this->data['controller'] . '/';
		$this->data['name'] = '';
		$this->data['email'] = '';
		$this->data['pesan'] = '';
		$this->data['msg'] = '';
		$this->data['MX_BREADCUMB'] = 'AMBIL GAMBAR MELALUI WEBCAM';
		if ($this->session->userdata('logged_in') != 'Sudah Login') redirect(base_url(''));
	}

	public function index() {
		$this->data['view'] .= $this->data['method'];
		$this->parser->parse('templates/default', $this->data);
	}

	public function upload() {
		//$jpg = file_get_contents('php://input');
		$jpeg_data = file_get_contents('php://input');

		//$filename = "/mcinew/media/mci_" . mktime() . ".jpg";
		$filename = "./assets/media/uploads/mx_" . mktime() . ".jpg";

		$result = file_put_contents($filename, $jpeg_data);
		//$r = file_put_contents($filename, $jpg);
		echo $filename;
	}
}