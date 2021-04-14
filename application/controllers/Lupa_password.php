 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
   
 class Lupa_password extends CI_Controller {  

   function __construct() {
        parent::__construct();
        if($this->session->userdata("email") == ""){
      redirect(base_url(''));
    }
        $this->load->model('token_model');
        $this->load->model('admin');
        $this->load->model('model_booking');
        $this->load->model('layanan_model');
        $this->load->model('detail_layanan_model');
        $this->load->model('Data_pasien_model');
        $this->load->model('Rekam_medis_model');
        $this->load->model('transaksi_model');
        $this->load->model('pembayaran_model');
    $this->load->model('obat_model');
        $this->load->model('detail_obat_model');
        $this->load->model('detail_stok_obat_model');
        $this->load->library('form_validation');
        // if ($this->session->userdata('logged_in') != 'Sudah Login')
        //     redirect(base_url(''));
        // if($this->session->userdata("username") == ""){
    //  redirect(base_url(''));
    // }
    }

     public function kirimEmail(){
      $this->_sendEmail();
     }

     

     private function _sendEmail(){serialize(value)
      $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'aneesha.dhani@gmail.com',
        'smtp_pass' => 'ngompilan0901',
        'smtp_port' => 465,
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
      ];

      $this->load->library('email', $config);

      $this->email->from('aneesha.dhani@gmail.com', 'Reset Password');
      $this->email->to('pashaneesa0901@gmail.com');
      $this->email->subject('Test');
      $this->email->message('Halo');

      if($this->email->send()){
        return true;
      }else{
        echo $this->email->print_debugger();
        die;
      }
     }
 }  