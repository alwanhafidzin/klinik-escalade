<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Superdokter extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Data_pasien_model');
    $this->load->model('Home_model');
    $this->load->model('Metode_model');
    $this->load->model('Model_booking');
    $this->load->library('form_validation');
    $this->load->library('pagination');

  }

  public function index() {
    $medis = $this->Home_model->get_medis();
    $data['medis'] = $medis;
    $data['_jadwal_pemeriksaan'] = 1;
    $data['content'] = 'dokter/home';
    $this->load->view('template/template', $data);
  }

  public function get_periksa($id){
      $stat = '2';
      $data_rekam_medis = array(
        'status' => $stat
      );

      $this->Home_model->periksa_edit_status($id, $data_rekam_medis);
      redirect('superdokter');
  }

  public function index1() {
    $id_user = $this->session->userdata('id_user');

    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $this->Home_model->get_pasien(); 
    $rencana_sebelum = $this->Home_model->get_rencana_sebelum();
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_jadwal_pemeriksaan'] = 1;
    $data['content'] = 'superdokter/home';
    $this->load->view('template/template', $data);
  }

  function home() {

    $id_user = $this->session->userdata('id_user');

    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $this->Home_model->get_pasien(); 
    $rencana_sebelum = $this->Home_model->get_rencana_sebelum();
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_antrian'] = 1;
    $data['content'] = 'superdokter/home';
    $this->load->view('template/template', $data);
  }

  function home_keluarga($id_user) {

    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $user = $this->Data_pasien_model->get_user($id_user);
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['user'] = $user;
    $data['pasien'] = $this->Data_pasien_model->get_pasien($id_user); 
    $rencana_sebelum = $this->Data_pasien_model->get_rencana_sebelum($id_user);
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_antrian'] = 1;
    $data['content'] = 'superdokter/home_keluarga';
    $this->load->view('template/template', $data);
  }

  function data_keluarga(){
    $this->Home_model->tampil();
  }

  function tambah_pasien() {
    $data['_antrian'] = 1;
    $data['content'] = 'superdokter/tambah_pasien';
    $this->load->view('template/template', $data);
  }

  public function tambah_pasien_k($id_user)
  {
    $user = $this->Data_pasien_model->get_user($id_user);
    $data['user'] = $user;
    $data['_antrian'] = 1;
    $data['content'] = 'superdokter/tambah_pasien_k';
    $this->load->view('template/template', $data);
  }

  public function add_pasien() {
   $data_login = array(
    'nama_depan_u' => $this->input->post('nama_depan'),
    'nama_belakang_u' => $this->input->post('nama_belakang'),
    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    'email' => $this->input->post('email'),
    'no_hp' => $this->input->post('no_hp'),
    'level' => 'Pasien',
  );

   $this->Home_model->insert_login($data_login);
   $data= $this->Home_model->get_iduser($this->input->post('nama_depan'),$this->input->post('tanggal_lahir'),$this->input->post('nama_belakang'));
   $data_pasien = array(
    'id_user' => $data->id_user,
    'nama_depan' => $this->input->post('nama_depan'),
    'nama_belakang' => $this->input->post('nama_belakang'),
    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    'email' => $this->input->post('email'),
    'no_hp' => $this->input->post('no_hp'),
    'hubungan' => 'Anda',
  );
   $this->Home_model->insert_pasien($data_pasien);
   $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');

   redirect(site_url('Superdokter/home'));
 }

 public function add_pasien_k() {
   $data_pasien = array(
    'id_user' => $this->input->post('id_user'),
    'nama_depan' => $this->input->post('nama_depan'),
    'nama_belakang' => $this->input->post('nama_belakang'),
    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    'email' => $this->input->post('email'),
    'no_hp' => $this->input->post('no_hp'),
    'hubungan' => $this->input->post('hubungan'),
  );
   $this->Home_model->insert_pasien($data_pasien);
   $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');

   redirect(site_url('Superdokter/home'));
 }

 public function add_booking(){
  $booking = substr(md5(rand()), 0, 9);
  $id_booking = base64_encode($booking);
  $data1 = array(
    'id_booking' => $id_booking,
    'id_user' => $this->input->post("id_user"),
    'id_pasien' => $this->input->post("id_pasien2"),
    'id_cabang' => $this->input->post("id_cabang2"),
    'id_dokter' => $this->input->post("id_dokter2"),
    'status' => $this->input->post("status"),
  );


  $id_pasien = $this->input->post("id_pasien2");
  $id_cabang = $this->input->post("id_cabang2");
  $id_dokter = $this->input->post("id_dokter2");

  if ($id_pasien==""||$id_cabang==""||$id_dokter=="") {
    echo "<script>alert('Pastikan data terisi semua!');history.go(-1);</script>";
  }
  else{
    $query=$this->Model_booking->insert($data1);
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
      </div>');
    $id_pasien = $this->input->post("id_pasien");

    redirect(base_url('Superdokter/data_booking/'.$id_pasien.'/'.$id_booking));
  }
}

function data_booking($id_pasien,$id_booking) {
  $id_user = $this->session->userdata('id_user');
  $booking1 = $this->Data_pasien_model->get_booking($id_booking);
  $data['booking'] = $booking1;

  $pasien1 = $this->Data_pasien_model->get_pasien_id($id_booking);
  $data['pasien'] = $pasien1;

        //echo $id_booking;
  $dokter = $this->Data_pasien_model->get_dokter_id($id_booking);
  $data['dokter'] = $dokter;

  $bayar = $this->Metode_model->get_all();
  $data['metodebayar'] = $bayar ; 
  $data['_antrian'] = 1;
  $data['content'] = 'superdokter/booking';
  $this->load->view('template/template', $data);
}

function konfirmasi_janji() {
  $booking = $this->Home_model->get_booking();
  $data['booking'] = $booking;
  $data['_konfirmasi'] = 1;
  $data['content'] = 'superdokter/konfirmasi_janji';
  $this->load->view('template/template', $data);
}

public function konfirmasi(){
  $konfirmasi = '1';
  $data_booking = array(
    'konfirmasi' => $konfirmasi,
  );

  $rekam_medis = substr(md5(rand()), 0, 9);
  $id_rekam_medis = base64_encode($rekam_medis);
  $status = '0';
  $data_rekam_medis = array(
    'id_rekam_medis' => $id_rekam_medis,
    'id_booking' => $this->input->post('id_booking'),
    'id_pasien' => $this->input->post('id_pasien'),
    'status' => $status,
  );

  $this->Home_model->add_rekam_medis($data_rekam_medis);
  $this->Home_model->update_booking($this->input->post('id_booking'), $data_booking);

  redirect(site_url('Superdokter/konfirmasi_janji'));
}

public function konfirmasi_tolak(){
  $konfirmasi = '2';
  $data_booking = array(
    'konfirmasi' => $konfirmasi,
    'alasan_tolak' => $this->input->post('alasan_tolak'),
  );

  $this->Home_model->update_booking($this->input->post('id_booking'), $data_booking);

  redirect(site_url('Superdokter/konfirmasi_janji'));
}

public function registrasi_janji() {
  $janji = $this->Home_model->get_data_janji();
  $data['janji'] = $janji;
  $cabang = $this->Data_pasien_model->get_cabang();
  $dokter = $this->Data_pasien_model->get_dokter();
  $data['cabang'] = $cabang;
  $data['dokter'] = $dokter;
  $data['_registrasi'] = 1;
  $data['content'] = 'superdokter/registrasi_janji';
  $this->load->view('template/template', $data);
}

public function update_janji(){
  $status_r = '1';
  $data_janji = array(
    'status' => $status_r,
  );
  $data_antrian = array(
    'id_booking' => $this->input->post('id_booking'),
    'id_pasien' => $this->input->post('id_pasien'),
    'id_dokter' => $this->input->post('id_dokter'),
    'id_rekam_medis' => $this->input->post('id_rekam_medis'),
  );
  $this->Home_model->update_rekam_medis($this->input->post('id_booking'), $data_janji);
  $this->Home_model->add_antrian($data_antrian);
  redirect(site_url('Superdokter/registrasi_janji'));
}

public function update_rencana() {
 $data_rencana = array(
  'id_booking' => $this->input->post('id_booking'),
  'tanggal_rencana' => $this->input->post('tanggal_rencana'),
  'jam_rencana' => $this->input->post('jam_rencana'),
);
 $this->Home_model->update_rencana($this->input->post('id_rcn'), $data_rencana);
 $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
  </div>');
 redirect(site_url('Superdokter/registrasi_janji'));
}

public function pembayaran() {
  $bayar = $this->Home_model->get_data_bayar();
  $data['bayar'] = $bayar;
  $data['_pembayaran'] = 1;
  $data['content'] = 'superdokter/pembayaran';
  $this->load->view('template/template', $data);
}

public function metode_bayar($id_booking)
{
  $id_booking = $this->uri->segment(3);
  $data = array(
    'title' => 'Metode Pembayaran',
    'pembayaran' => $this->Home_model->edit_pembayaran($id_booking),
  );
  $bayar = $this->Home_model->get_proses_bayar($id_booking);
  $data['bayar'] = $bayar;
  $layanan = $this->Home_model->get_layanan($id_booking);
  $data['layanan'] = $layanan;
  $metode = $this->Metode_model->get_all();
  $data['metodebayar'] = $metode;
  $diskon = $this->Home_model->get_diskon();
  $data['diskon'] = $diskon;
  $data['_pembayaran'] = 1;
  $data['content'] = 'superdokter/metode_pembayaran';
  $this->load->view('template/template', $data);
}

private function _uploadImage()
{
  $config['upload_path']          = './images/asuransi/';
  $config['allowed_types']        = 'gif|jpg|png|jpeg';
  $config['file_name']            = $this->input->post('id_booking');
  $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto_asuransi')) {
          return $this->upload->data("file_name");
        }
        
      }

      public function update_bayar(){
        $status_r = '3';
        $data_bayar = array(
          'diagnosis'   => $this->input->post('diagnosa'),
          'grandtotal'  => $this->input->post('hasil'),
          'status'      => $status_r,
        );
        $status_b = '1';
        $data_booking = array(
          'status' => $status_b,
        );

        $data_rencana = array(
          'id_metode' => $this->input->post('jenis_pembayaran'),
          'provider' => $this->input->post('provider'),
          'kategori_asuransi' => $this->input->post('kasuransi'),
          'nomor_asuransi' => $this->input->post('no_asuransi'),
          'foto_asuransi' => $this->_uploadImage(),
        );
        $this->Home_model->update_booking($this->input->post('id_booking'), $data_booking);
        $this->Home_model->update_rekam_medis($this->input->post('id_booking'), $data_bayar);
        $this->Home_model->update_rencana_bayar($this->input->post('id_booking'), $data_rencana);
        redirect(site_url('Superdokter/pembayaran'));
      }

      public function laporan_harian()
      {
        $laporan = $this->Home_model->get_laporan();
        $data['laporan'] = $laporan;
        $data['harian'] = $this->Home_model->get_harian(); 
        $data['_laporan_transaksi'] = 1;
        $data['content'] = 'Superdokter/laporan_harian';
        $this->load->view('template/template', $data);
      }

      public function laporan_harian_dokter()
      {
        $laporan = $this->Home_model->get_laporan();
        $data['laporan'] = $laporan;
        $data['harian'] = $this->Home_model->get_perdokter(); 
        $data['_laporan_transaksi'] = 1;
        $data['content'] = 'Superdokter/laporan_harian_d';
        $this->load->view('template/template', $data);
      }

      public function export_detail(){
       $data['title'] = 'Laporan Detail Pemeriksaan';
       $data['laporan'] = $this->Home_model->get_laporan(); 

       $this->load->view('Superdokter/vw_laporan_detail',$data);
     }

     public function export_harian(){
       $data['title'] = 'Laporan Total Pendapatan Harian';
       $data['harian'] = $this->Home_model->get_harian(); 

       $this->load->view('Superdokter/vw_laporan_pendapatan_harian',$data);
     }

     public function export_per_dokter(){
       $data['title'] = 'Laporan Pendapatan Harian Dokter';
       $data['perdokter'] = $this->Home_model->get_perdokter(); 

       $this->load->view('Superdokter/vw_laporan_perdokter',$data);
     }

     function filter_profil() {
      $id_user = $this->session->userdata('id_user');
      $cabang = $this->Data_pasien_model->get_cabang();
      $dokter = $this->Data_pasien_model->get_dokter();
      $id = $_GET['id'];
      if ($id == 0){
        $konfirmasi='1';
        $stt='0';
        $stt2 = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e','a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
        $this->db->where('a.konfirmasi', $konfirmasi);
        $this->db->where('a.status', $stt);
        $this->db->where('f.status', $stt2);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
      else{
        $konfirmasi='1';
        $stt='0';
        $stt2 = '0';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e','a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
        $this->db->where('a.id_dokter', $id);
        $this->db->where('a.konfirmasi', $konfirmasi);
        $this->db->where('a.status', $stt);
        $this->db->where('f.status', $stt2);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
      if(!empty($data)) {
        foreach ($data as $result) : ?>
          <div class="timeline">
            <div class="entry">
              <div class="title">
                <font style="text-align: right;">
                  <?php $namahari = date('l', strtotime($result->tanggal_rencana));?>
                  <?php
                  switch($namahari){
                    case 'Sunday':
                    $hari_ini = "Minggu";
                    break;

                    case 'Monday':     
                    $hari_ini = "Senin";
                    break;

                    case 'Tuesday':
                    $hari_ini = "Selasa";
                    break;

                    case 'Wednesday':
                    $hari_ini = "Rabu";
                    break;

                    case 'Thursday':
                    $hari_ini = "Kamis";
                    break;

                    case 'Friday':
                    $hari_ini = "Jumat";
                    break;

                    case 'Sataturday':
                    $hari_ini = "Sabtu";
                    break;

                    default:
                    $hari_ini = "Tidak di ketahui";   
                    break;
                  }
                  ?>
                  <p><?php echo $hari_ini ?></p>
                  <?php $tgl = date('d M', strtotime($result->tanggal_rencana));?>
                  <h3><b><?php echo $tgl ?></b></h3>
                  <p><?php echo $result->jam_rencana  ?></p>
                </font>
              </div>
              <div class="body">
                <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                <div class="form-group">

                  <?php if ($result->konfirmasi=='0'){ ?>
                    <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                    Belum terkonfirmasi </font>
                  <?php }elseif($result->konfirmasi=='2'){ ?>
                    <font style="background-color: red; color: black; padding: 5px" size="2px">
                    Ditolak</font>
                  <?php }else{ ?> 
                    <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                    Sudah terkonfirmasi</font>
                  <?php } ?>
                  <!-- <font size="2px">   <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font> -->

                  <div id="myModal<?php echo $result->id_pasien?>" class="modal">
                    <form class="form-horizontal" action="<?php echo base_url('Booking/update_rencana/');?>" method="post" enctype="multipart/form-data" role="form">
                     <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" style="text-align: center;"><b>Jadwal yang akan datang</b></h4>
                        </div>
                        <div class="col-lg-12">

                          <div class="modal-body">
                            <h3 class="madal-body"> <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center></h3>
                            <?php if ($result->konfirmasi=='0' || $result->konfirmasi=='2'){ ?>
                              <?php if ($result->konfirmasi=='0'){ ?>
                                <font style="background-color: yellow; color: black; padding: 5px; float: right;" >
                                Belum terkonfirmasi </font>
                              <?php }else{?>
                                <p><center>alasan ditolak:</center></p>
                                <h5><center><?php echo $result->alasan_tolak?></center></h5><br>
                                <h6><center>Silahkan menjadwalkan ulang di bawah ini</center></h6><br>
                                <font style="background-color: red; color: black; padding: 5px; float: right;" >
                                Ditolak</font>
                                <?php }?>s
                                <br>
                                <div class="form-group">
                                  <label class="col-lg-3 col-sm-3 control-label">Nama Dokter</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="id_dokter" required data-required-msg="Address is required">
                                      <option value="<?php echo $result->id_dokter  ?>" disabled selected style="display: none;"><?php echo $result->nama_dokter  ?></option>
                                      <?php foreach ($dokter->result() as $result2) : ?>
                                        <option value="<?php echo $result2->id_dokter  ?>"><?php echo $result2->nama_dokter  ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 col-sm-3 control-label">Nama Cabang</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="id_cabang" required data-required-msg="Address is required">
                                      <option value="<?php echo $result->id_cabang  ?>" disabled selected style="display: none;"><?php echo $result->nama_cabang  ?></option>
                                      <?php foreach ($cabang->result() as $result2) : ?>
                                        <option value="<?php echo $result2->id_cabang ?>"><?php echo $result2->nama_cabang  ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 col-sm-3 control-label">Tanggal</label>
                                  <div class="col-lg-3">
                                    <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
                                    <input type="text" id="date" class="form-control" name="tanggal_rencana"  value="<?php echo $tgl ?>" readonly>
                                  </div>
                                  <div class="col-lg-6">
                                    <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
                                    <input type="date" id="date" class="form-control" name="tanggal_rencana"  value="<?php echo $tgl ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-3 col-sm-3 control-label">Waktu</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="jam_rencana" required data-required-msg="Address is required">
                                      <option value="<?php echo $result->jam_rencana  ?>" disabled selected style="display: none;"><?php echo $result->jam_rencana  ?></option>
                                      <?php 
                                      $query=$this->db->query('select * from jadwal_dokter where id_dokter="'.$result->id_dokter.'"');
                                      foreach ($query->result() as $hasil) :
                                       ?>
                                       <option value="<?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?>"><?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?></option>
                                     <?php endforeach; ?>
                                   </select>
                                 </div>
                               </div>

                             <?php }else{ ?>                                         
                              <h5><center>dengan dokter <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></center></h5>
                              <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
                              <h5><center>pada tanggal <?php echo $tgl  ?> jam <?php echo $result->jam_rencana  ?></center></h5>
                              <br>
                              <center><font style="background-color: lightgreen; color: black; padding: 5px;" >
                              Sudah terkonfirmasi</font></center>
                              <br>
                              <p><center>Kode Booking:</center></p>
                              <b><h4 class="madal-title"> <center><?php echo $result->id_booking ?></center></h4></b>
                              <h6><center>Tunjukkan kode booking ini pada saat registrasi di klinik kami</center></h6>
                              <h6><center>Sampai Berjumpa</center></h6>

                              <br>
                            <?php } ?>
                          </div>

                          <input type="hidden"class="form-control" name="id_rcn"  value="<?php echo $result->id_rcn ?>">
                          <input type="hidden"class="form-control" name="id_booking"  value="<?php echo $result->id_booking ?>">
                          <hr>
                        </div>
                        <div class="modal-footer">
                          <?php if ($result->konfirmasi=='0' || $result->konfirmasi=='2'){ ?>
                            <button class="btn salmon" type="submit"> Ubah&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                          <?php }else{ ?>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Kembali</button> 
                          <?php } ?>
                        </div>

                      </div>
                    </div>
                  </form>   
                </div>    
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;
    }
    else{
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_tanggal() {
    $id_user = $this->session->userdata('id_user');
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $tgl = $_GET['tgl'];
    if ($tgl == 0){
      $konfirmasi='1';
      $stt = '0';
      $stt2 = '0';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b','a.id_booking=b.id_booking');
      $this->db->join('pasien c','a.id_pasien=c.id_pasien');
      $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e','a.id_cabang=e.id_cabang');
      $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
      $this->db->where('a.konfirmasi', $konfirmasi);
      $this->db->where('a.status', $stt);
      $this->db->where('f.status', $stt2);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    }
    else{
      $konfirmasi='1';
      $stt = '0';
      $stt2 = '0';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b','a.id_booking=b.id_booking');
      $this->db->join('pasien c','a.id_pasien=c.id_pasien');
      $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e','a.id_cabang=e.id_cabang');
      $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
      $this->db->where('b.tanggal_rencana', $tgl);
      $this->db->where('a.konfirmasi', $konfirmasi);
      $this->db->where('a.status', $stt);
      $this->db->where('f.status', $stt2);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    }
    if(!empty($data)) {
      foreach ($data as $result) : ?>
        <div class="timeline">
          <div class="entry">
            <div class="title">
              <font style="text-align: right;">
                <?php $namahari = date('l', strtotime($result->tanggal_rencana));?>
                <?php
                switch($namahari){
                  case 'Sunday':
                  $hari_ini = "Minggu";
                  break;

                  case 'Monday':     
                  $hari_ini = "Senin";
                  break;

                  case 'Tuesday':
                  $hari_ini = "Selasa";
                  break;

                  case 'Wednesday':
                  $hari_ini = "Rabu";
                  break;

                  case 'Thursday':
                  $hari_ini = "Kamis";
                  break;

                  case 'Friday':
                  $hari_ini = "Jumat";
                  break;

                  case 'Sataturday':
                  $hari_ini = "Sabtu";
                  break;

                  default:
                  $hari_ini = "Tidak di ketahui";   
                  break;
                }
                ?>
                <p><?php echo $hari_ini ?></p>
                <?php $tgl = date('d M', strtotime($result->tanggal_rencana));?>
                <h3><b><?php echo $tgl ?></b></h3>
                <p><?php echo $result->jam_rencana  ?></p>
              </font>
            </div>
            <div class="body">
              <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
              <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
              <div class="form-group">

                <?php if ($result->konfirmasi=='0'){ ?>
                  <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                  Belum terkonfirmasi </font>
                <?php }elseif($result->konfirmasi=='2'){ ?>
                  <font style="background-color: red; color: black; padding: 5px" size="2px">
                  Ditolak</font>
                <?php }else{ ?> 
                  <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                  Sudah terkonfirmasi</font>
                <?php } ?>
                <br>
                <!-- <font size="2px">   <a href="#"  data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: salmon; padding: 5px; float: right;"> Lihat Rencana </a></font> -->

                <div id="myModal<?php echo $result->id_pasien?>" class="modal" style="top: 50px;">
                  <form class="form-horizontal" action="<?php echo base_url('Booking/update_rencana/');?>" method="post" enctype="multipart/form-data" role="form">
                   <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align: center;"><b>Jadwal yang akan datang</b></h4>
                      </div>
                      <div class="col-lg-12">

                        <div class="modal-body">
                          <h3 class="madal-body"> <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center></h3>
                          <?php if ($result->konfirmasi=='0' || $result->konfirmasi=='2'){ ?>
                            <?php if ($result->konfirmasi=='0'){ ?>
                              <font style="background-color: yellow; color: black; padding: 5px; float: right;" >
                              Belum terkonfirmasi </font>
                            <?php }else{?>
                              <p><center>alasan ditolak:</center></p>
                              <h5><center><?php echo $result->alasan_tolak?></center></h5><br>
                              <h6><center>Silahkan menjadwalkan ulang di bawah ini</center></h6><br>
                              <font style="background-color: red; color: black; padding: 5px; float: right;" >
                              Ditolak</font>
                            <?php }?>

                            <br>
                            <div class="form-group">
                              <label class="col-lg-3 col-sm-3 control-label">Nama Dokter</label>
                              <div class="col-lg-9">
                                <select class="form-control" name="id_dokter" required data-required-msg="Address is required">
                                  <option value="<?php echo $result->id_dokter  ?>" disabled selected style="display: none;"><?php echo $result->nama_dokter  ?></option>
                                  <?php foreach ($dokter->result() as $result2) : ?>
                                    <option value="<?php echo $result2->id_dokter  ?>"><?php echo $result2->nama_dokter  ?></option>
                                  <?php endforeach; ?>
                                </select>

                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-3 col-sm-3 control-label">Nama Cabang</label>
                              <div class="col-lg-9">
                                <select class="form-control" name="id_cabang" required data-required-msg="Address is required">
                                  <option value="<?php echo $result->id_cabang  ?>" disabled selected style="display: none;"><?php echo $result->nama_cabang  ?></option>
                                  <?php foreach ($cabang->result() as $result2) : ?>
                                    <option value="<?php echo $result2->id_cabang ?>"><?php echo $result2->nama_cabang  ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-3 col-sm-3 control-label">Tanggal</label>
                              <div class="col-lg-3">
                                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
                                <input type="text" id="date" class="form-control" name="tanggal_rencana"  value="<?php echo $tgl ?>" readonly>
                              </div>
                              <div class="col-lg-6">
                                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
                                <input type="date" id="date" class="form-control" name="tanggal_rencana"  value="<?php echo $tgl ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-3 col-sm-3 control-label">Waktu</label>
                              <div class="col-lg-9">
                                <select class="form-control" name="jam_rencana" required data-required-msg="Address is required">
                                  <option value="<?php echo $result->jam_rencana  ?>" disabled selected style="display: none;"><?php echo $result->jam_rencana  ?></option>
                                  <?php 
                                  $query=$this->db->query('select * from jadwal_dokter where id_dokter="'.$result->id_dokter.'"');
                                  foreach ($query->result() as $hasil) :
                                   ?>
                                   <option value="<?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?>"><?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?></option>
                                 <?php endforeach; ?>
                               </select>
                             </div>
                           </div>

                         <?php }else{ ?>                                         
                          <h5><center>dengan dokter <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></center></h5>
                          <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
                          <h5><center>pada tanggal <?php echo $tgl  ?> jam <?php echo $result->jam_rencana  ?></center></h5>
                          <br>
                          <center><font style="background-color: lightgreen; color: black; padding: 5px;" >
                          Sudah terkonfirmasi</font></center>
                          <br>
                          <p><center>Kode Booking:</center></p>
                          <b><h4 class="madal-title"> <center><?php echo $result->id_booking ?></center></h4></b>
                          <h6><center>Tunjukkan kode booking ini pada saat registrasi di klinik kami</center></h6>
                          <h6><center>Sampai Berjumpa</center></h6>

                          <br>
                        <?php } ?>
                      </div>

                      <input type="hidden"class="form-control" name="id_rcn"  value="<?php echo $result->id_rcn ?>">
                      <input type="hidden"class="form-control" name="id_booking"  value="<?php echo $result->id_booking ?>">
                      <hr>
                    </div>
                    <div class="modal-footer">
                      <?php if ($result->konfirmasi=='0' || $result->konfirmasi=='2'){ ?>
                        <button class="btn salmon" type="submit"> Ubah&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                      <?php }else{ ?>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Kembali</button> 
                      <?php } ?>
                    </div>

                  </div>
                </div>
              </form>   
            </div>    
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;
}
else{
  ?>
  <font style="text-align: center;">
    <h4>Tidak Ada Data</h4>
  </font>
  <?php
}

}

function filter_profil_2() {
  $id_user = $this->session->userdata('id_user');
  $cabang = $this->Data_pasien_model->get_cabang();
  $dokter = $this->Data_pasien_model->get_dokter();
  $id = $_GET['id'];
  if ($id == 0){
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  else{
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('a.id_dokter', $id);
    $this->db->where('a.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  if (!empty($data)) {
    foreach ($data as $result) : ?>
      <?php if ($result->konfirmasi=='1' && $result->status=='1'){ ?>
        <div class="timeline">
          <div class="entry">
            <div class="title">
              <font style="text-align: right;">
                <?php $namahari = date('l', strtotime($result->tanggal_rencana));?>
                <?php
                switch($namahari){
                  case 'Sunday':
                  $hari_ini = "Minggu";
                  break;

                  case 'Monday':     
                  $hari_ini = "Senin";
                  break;

                  case 'Tuesday':
                  $hari_ini = "Selasa";
                  break;

                  case 'Wednesday':
                  $hari_ini = "Rabu";
                  break;

                  case 'Thursday':
                  $hari_ini = "Kamis";
                  break;

                  case 'Friday':
                  $hari_ini = "Jumat";
                  break;

                  case 'Sataturday':
                  $hari_ini = "Sabtu";
                  break;

                  default:
                  $hari_ini = "Tidak di ketahui";   
                  break;
                }
                ?>
                <p><?php echo $hari_ini ?></p>
                <?php $tgl = date('d M', strtotime($result->tanggal_rencana));?>
                <h3><b><?php echo $tgl ?></b></h3>
                <p><?php echo $result->jam_rencana  ?></p>
              </font>
            </div>
            <div class="body">
              <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
              <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
              <div class="form-group">
                <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                  Telah Terbayar</font>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php endforeach;
  }
  else{
    ?>
    <font style="text-align: center;">
      <h4>Tidak Ada Data</h4>
    </font>
    <?php
  }
}

function filter_tanggal_2() {
  $id_user = $this->session->userdata('id_user');
  $cabang = $this->Data_pasien_model->get_cabang();
  $dokter = $this->Data_pasien_model->get_dokter();
  $tgl = $_GET['tgl'];
  if ($tgl == 0){
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  else{
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('b.tanggal_rencana', $tgl);
    $this->db->where('a.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  if (!empty($data)) {
    foreach ($data as $result) : ?>
      <?php if ($result->konfirmasi=='1' && $result->status=='1'){ ?>
        <div class="timeline">
          <div class="entry">
            <div class="title">
              <font style="text-align: right;">
                <?php $namahari = date('l', strtotime($result->tanggal_rencana));?>
                <?php
                switch($namahari){
                  case 'Sunday':
                  $hari_ini = "Minggu";
                  break;

                  case 'Monday':     
                  $hari_ini = "Senin";
                  break;

                  case 'Tuesday':
                  $hari_ini = "Selasa";
                  break;

                  case 'Wednesday':
                  $hari_ini = "Rabu";
                  break;

                  case 'Thursday':
                  $hari_ini = "Kamis";
                  break;

                  case 'Friday':
                  $hari_ini = "Jumat";
                  break;

                  case 'Sataturday':
                  $hari_ini = "Sabtu";
                  break;

                  default:
                  $hari_ini = "Tidak di ketahui";   
                  break;
                }
                ?>
                <p><?php echo $hari_ini ?></p>
                <?php $tgl = date('d M', strtotime($result->tanggal_rencana));?>
                <h3><b><?php echo $tgl ?></b></h3>
                <p><?php echo $result->jam_rencana  ?></p>
              </font>
            </div>
            <div class="body">
              <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
              <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
              <div class="form-group">
                <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                  Telah Terbayar</font>
                <!-- <font size="2px">   <a href="#" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font> -->
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php endforeach;
  }
  else{
    ?>
    <font style="text-align: center;">
      <h4>Tidak Ada Data</h4>
    </font>
    <?php
  }
}

function filter_profil_3() {
  $id_user = $this->session->userdata('id_user');
  $cabang = $this->Data_pasien_model->get_cabang();
  $dokter = $this->Data_pasien_model->get_dokter();
  $id = $_GET['id'];
  if ($id == 0){
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('f.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  else{
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('a.id_dokter', $id);
    $this->db->where('f.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  if (!empty($data)) {
    foreach ($data as $result) : ?>
      <?php if ($result->konfirmasi=='1' && $result->status=='1'){ ?>
        <div class="timeline">
          <div class="entry">
            <div class="title">
              <font style="text-align: right;">
                <?php $namahari = date('l', strtotime($result->tanggal_rencana));?>
                <?php
                switch($namahari){
                  case 'Sunday':
                  $hari_ini = "Minggu";
                  break;

                  case 'Monday':     
                  $hari_ini = "Senin";
                  break;

                  case 'Tuesday':
                  $hari_ini = "Selasa";
                  break;

                  case 'Wednesday':
                  $hari_ini = "Rabu";
                  break;

                  case 'Thursday':
                  $hari_ini = "Kamis";
                  break;

                  case 'Friday':
                  $hari_ini = "Jumat";
                  break;

                  case 'Sataturday':
                  $hari_ini = "Sabtu";
                  break;

                  default:
                  $hari_ini = "Tidak di ketahui";   
                  break;
                }
                ?>
                <p><?php echo $hari_ini ?></p>
                <?php $tgl = date('d M', strtotime($result->tanggal_rencana));?>
                <h3><b><?php echo $tgl ?></b></h3>
                <p><?php echo $result->jam_rencana  ?></p>
              </font>
            </div>
            <div class="body">
              <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
              <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
              <div class="form-group">
                <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                  Sedang Pemeriksaan</font>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php endforeach;
  }
  else{
    ?>
    <font style="text-align: center;">
      <h4>Tidak Ada Data</h4>
    </font>
    <?php
  }
}

function filter_tanggal_3() {
  $id_user = $this->session->userdata('id_user');
  $cabang = $this->Data_pasien_model->get_cabang();
  $dokter = $this->Data_pasien_model->get_dokter();
  $tgl = $_GET['tgl'];
  if ($tgl == 0){
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('f.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  else{
    $stt='1';
    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b','a.id_booking=b.id_booking');
    $this->db->join('pasien c','a.id_pasien=c.id_pasien');
    $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e','a.id_cabang=e.id_cabang');
    $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
    // $this->db->where('a.id_user', $id_user);
    $this->db->where('b.tanggal_rencana', $tgl);
    $this->db->where('f.status', $stt);
    $this->db->order_by('b.tanggal_rencana', 'asc');
    $this->db->order_by('b.jam_rencana', 'asc');
    $data = $this->db->get('')->result();
  }
  if (!empty($data)) {
    foreach ($data as $result) : ?>
      <?php if ($result->konfirmasi=='1' && $result->status=='1'){ ?>
        <div class="timeline">
          <div class="entry">
            <div class="title">
              <font style="text-align: right;">
                <?php $namahari = date('l', strtotime($result->tanggal_rencana));?>
                <?php
                switch($namahari){
                  case 'Sunday':
                  $hari_ini = "Minggu";
                  break;

                  case 'Monday':     
                  $hari_ini = "Senin";
                  break;

                  case 'Tuesday':
                  $hari_ini = "Selasa";
                  break;

                  case 'Wednesday':
                  $hari_ini = "Rabu";
                  break;

                  case 'Thursday':
                  $hari_ini = "Kamis";
                  break;

                  case 'Friday':
                  $hari_ini = "Jumat";
                  break;

                  case 'Sataturday':
                  $hari_ini = "Sabtu";
                  break;

                  default:
                  $hari_ini = "Tidak di ketahui";   
                  break;
                }
                ?>
                <p><?php echo $hari_ini ?></p>
                <?php $tgl = date('d M', strtotime($result->tanggal_rencana));?>
                <h3><b><?php echo $tgl ?></b></h3>
                <p><?php echo $result->jam_rencana  ?></p>
              </font>
            </div>
            <div class="body">
              <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
              <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
              <div class="form-group">
                <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                  Sedang Pemeriksaan</font>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php endforeach;
  }
  else{
    ?>
    <font style="text-align: center;">
      <h4>Tidak Ada Data</h4>
    </font>
    <?php
  }
}

}