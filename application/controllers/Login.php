<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
        //load model admin
    $this->load->model('Admin');
    $this->load->model('Data_pasien_model');
  }

  public function index(){
    if($this->Admin->logged_id())
    {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
      redirect("Pasien");

    }else{

                //jika session belum terdaftar

                //set form validation
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
      $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
      if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
        $email = $this->input->post("email", TRUE);
        $password = MD5($this->input->post('password', TRUE));

                //checking data via model
        $checking = $this->Admin->check_login('login_session', array('email' => $email), array('password' => $password));

                //jika ditemukan, maka create session
        if ($checking != FALSE) {
          foreach ($checking as $apps) {

            $session_data = array(
              'id_user'   => $apps->id_user,
              'nama_depan'   => $apps->nama_depan,
              'id_user'   => $apps->id_user,
              'email' => $apps->email,
              'password' => $apps->password,
              'level' => $apps->level,
            );
                        //set session userdata
            $this->session->set_userdata($session_data);
            if($this->session->userdata('level') == 'Owner'){
              redirect('Owner');
            }
            elseif($this->session->userdata('level') == 'Dokter'){
              redirect('Doctor');
            }
            elseif($this->session->userdata('level') == 'Klinik'){
              redirect('Klinik');
            }
            else{
              redirect('Pasien'); 
            }
          }
        }else{

          echo "<script>alert('Gagal login: Cek email dan password!');history.go(-1);</script>";
          //redirect(base_url(''));
        }

      }else{

        $this->load->view('index');
      }

    }

  }

  public function tambah()
  {
    $data = array(

      'title' => 'Tambah Data USER'

    );

    $this->load->view('registrasi', $data);
  }

  public function lupa()
  {
    $data = array(

      'title' => 'Lupa Password'

    );

    $this->load->view('lupa', $data);
  }

  public function lupa_pass_email()
  {
    $data = array(

      'title' => 'Lupa Password Email'

    );

    $this->load->view('lupa_pass_email', $data);
  }

  public function verifikasi_hp($no)
  {
    $no = $this->uri->segment(3);

    $data = array(

      'title' => 'Edit Data Mahasiswa',
      'no' => $this->Admin->edit_hp($no)

    );

    $this->load->view('verifikasi_hp', $data);
  }

  public function lupa_pass_hp()
  {
    $data = array(

      'title' => 'Lupa Password HP'

    );

    $this->load->view('lupa_pass_hp', $data);
  }

  public function hp($token)
  {
    $token = $this->uri->segment(3);

    $data = array(

      'title' => 'Edit Data Mahasiswa',
      'verif' => $this->Admin->edit($token)

    );

    $this->load->view('reset_password', $data);
  }

  public function reset_pass()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('login_session', ['email' => $email])->row_array();

    if($user){
      $user_token = $this->db->get_where('tokens', ['token' => $token])->row_array();
      if($user_token){
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      } else{
            // $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert> Token Salah.
            // </div>');
        echo "<script>alert('Token Salah');history.go(-1);</script>";
        redirect(base_url('Login/index'));
      }
    } else{
          // $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert> Email belum terdaftar.
          //   </div>');
      echo "<script>alert('Email belum terdaftar');history.go(-1);</script>";
      redirect(base_url('Login/index'));
    }

  }

  public function changePassword(){

    if(!$this->session->userdata('reset_email')){
      redirect(base_url('Login/index'));
    }

    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[passconf]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password]');

    if($this->form_validation->run() == false){
      $data = array(

        'title' => 'Reset Password'

      );

      $this->load->view('lupa_pass', $data);
    } else{
      $password = md5($this->input->post("password"));
      $view_password = $this->input->post("password");
      $email = $this->session->userdata('reset_email');

      $this->db->set('view_password', $view_password);
      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('login_session');

      $this->session->unset_userdata('reset_email');
      redirect(base_url('Login/index'));
    }
  }

  public function changePassword_hp(){

    $id['no_hp'] = $this->input->post("no_hp");
    $data = array(
      'password' => md5($this->input->post("password")),
      'view_password' => $this->input->post("password"),
    );

    $this->Admin->update($data, $id);

    echo "<script>alert('Kata Sandi Anda berhasil diubah. Silahkan Login');history.go(-1);</script>";
    redirect(base_url('Login'));
  }

  public function registrasi()
  {
    $data = array(

      'nama_depan_u' => $this->input->post("nama_depan"),
      'nama_belakang_u' => $this->input->post("nama_belakang"),
      'tanggal_lahir' => $this->input->post("tanggal_lahir"),
      'jenis_kelamin' => $this->input->post("jenis_kelamin"),
      'alamat' => $this->input->post("alamat"),
      'email' => $this->input->post("email"),
      'no_hp' => $this->input->post("no_hp"),
      'password' => md5($this->input->post("password")),
      'view_password' => $this->input->post("password"),
      'level' => $this->input->post("level"),

    );

    $this->Admin->simpan($data);

    $id_user = $this->Admin->get_id_last();

    $data_pasien = array(
            //'id_pasien' => $this->input->post('id_pasien'),
      'id_user' => $id_user->id_user,
      'nama_depan' => $this->input->post('nama_depan'),
      'nama_belakang' => $this->input->post('nama_belakang'),
      'hubungan' => $this->input->post('hubungan'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post("alamat"),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp'),
    );
    $this->Data_pasien_model->insert_pasien($data_pasien);


        // $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Berhasil Menambah User.
        //     </div>');
    echo "<script>alert('Anda telah melakukan registrasi. Silahkan Login');history.go(-1);</script>";

        //redirect
    redirect(base_url('Login/index'));

  }

  public function update($id)
  {
        //$id['id_user'] = $this->input->post("id_user");
    $data = array(

      'password' => $this->input->post("cpasswors"),

    );

    $this->model_mhs->update($data, $id);

        // $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data berhasil diubah.
        //     </div>');

    echo "<script>alert('Data berhasil diubah');history.go(-1);</script>";

        //redirect
    redirect(base_url('Login/index'));

  }

  function random_bytes($length)
  {
    $characters = '0123456789';
    $characters_length = strlen($characters);
    $output = '';
    for ($i = 0; $i < $length; $i++)
      $output .= $characters[rand(0, $characters_length - 1)];

    return $output;
  }

  public function kirimEmail(){
    $data = array(
      'email' => $this->input->post('email', TRUE),
    );
    $user = $this->Admin->where($data);
    if($user->num_rows() > 0){
      $token = substr(sha1(rand()), 0, 30);
      $tokens = base64_encode($token);
              // var_dump($tokens);
              // die;
      $user_token = array(
        'email' => $this->input->post('email'),
        'token' => $tokens,
        'date_created' => time()
      );

      $this->db->insert('tokens', $user_token);

      $this->_sendEmail($tokens);
    }else{
      echo "<script>alert('Email belum terdaftar');history.go(-1);</script>";
    }
    
    

    // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    // if($this->form_validation->run() == false){
    //   $data = array(
    //     'title' => 'Lupa Password'
    //   );
    //   $this->load->view('lupa_pass_email', $data);
    // } else{
    //   $email = $this->input->post('email');
    //   $user = $this->db->get_where('login_session', ['email' => $email])->row_array();
    //   if($user){
    //     $token = substr(sha1(rand()), 0, 30);
    //     $tokens = base64_encode($token);
    //           // var_dump($tokens);
    //           // die;
    //     $user_token = array(
    //       'email' => $this->input->post('email'),
    //       'token' => $tokens,
    //       'date_created' => time()
    //     );

    //     $this->db->insert('tokens', $user_token);

    //     $this->_sendEmail($tokens);
    //   } else{
    //         // $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert> Email belum terdaftar.
    //         // </div>');
    //     echo "<script>alert('Email belum terdaftar');history.go(-1);</script>";
    //   }
    // }
  }

  public function kirim_nohp(){
    $no_hp = $this->input->post('no_hp');

    $this->form_validation->set_rules('no_hp', 'No_hp', 'trim|required');
    if($this->form_validation->run() == false){
      $data = array(
        'title' => 'Lupa Password'
      );
      $this->load->view('lupa_pass_email', $data);
    } else{
      $no_hp = $this->input->post('no_hp');
      $user = $this->db->get_where('login_session', ['no_hp' => $no_hp])->row_array();
      if($user){
        // $token = substr(sha1(rand()), 0, 3);
        // $tokens = base64_encode($token);
        $tokens = '1234';
        $user_token = array(
          'no_hp' => $this->input->post('no_hp'),
          'token' => $tokens,
          'date_created' => time()
        );

        $this->db->insert('tokens', $user_token);
        redirect(base_url('Login/verifikasi_hp/'.$no_hp));

              //$this->_sendEmail($tokens);
      } else{
            // $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert> Email belum terdaftar.
            // </div>');
        echo "<script>alert('No. Handphone belum terdaftar');history.go(-1);</script>";
      }
    }
  }

  public function verifikasi(){
    $token1 = $this->input->post('kode_verif');
    $no_hp = $this->input->post('no_hp');

    $this->form_validation->set_rules('kode_verif', 'Kode_verif', 'trim|required');
    if($this->form_validation->run() == false){
      $data = array(
        'title' => 'Verifikasi No. HP'
      );
      $this->load->view('verifikasi_hp', $data);
    } else{
      $kode_verif = $this->input->post('kode_verif');
      $user = $this->db->get_where('tokens', ['token' => $kode_verif])->row_array();
      if($user){
       redirect(base_url('Login/hp/'.$token1.'/'.$no_hp));
     } else{
            // $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert> Email belum terdaftar.
            // </div>');
      echo "<script>alert('Kode Verifikasi Salah');history.go(-1);</script>";
    }
  }
}

private function _sendEmail($token){
  $config = Array(  
    'protocol' => 'smtp',  
    'smtp_host' => 'ssl://smtp.googlemail.com',  
    'smtp_port' => 465, 
    'smtp_user' => 'shaniku.corporation@gmail.com',   
    'smtp_pass' => 'pashadiniwiku',   
    'mailtype' => 'html',   
    'charset' => 'iso-8859-1'  
  );  
  $this->load->library('email', $config);  
  $this->email->set_newline("\r\n");  
  $this->email->from('shaniku.corporation@gmail.com', 'Reset Kata Sandi');   
  $this->email->to($this->input->post('email'));   
  $this->email->subject('Lupa Kata Sandi');   
  $this->email->message('Klik link ini untuk mengubah Kata Sandi Anda <a href="'. base_url() . 'Login/reset_pass?email=' . $this->input->post('email') . '&token='. urlencode($token) .'">Reset Kata Sandi</a>');  
  if (!$this->email->send()) {  
    show_error($this->email->print_debugger());   
  }else{  
    echo "<script>alert('Email telah terkirim. Silahkan lihat Email Anda untuk mereset password');history.go(-1);</script>";

  }  
  //redirect(base_url(''));
}

}