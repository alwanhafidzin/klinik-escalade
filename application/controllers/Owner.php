<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Data_pasien_model');
    $this->load->model('Klinik_model');
    $this->load->model('Diskon_model');
    $this->load->model('Metode_model');
    $this->load->model('Home_model');
    $this->load->model('Informasi_pasien_model');
    $this->load->model('Model_booking');
    $this->load->library('form_validation');
    $this->load->library('pagination');
  }

  public function index()
  {
    $id_user = $this->session->userdata('id_user');

    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $this->Klinik_model->get_pasien();
    $rencana_sebelum = $this->Klinik_model->get_rencana_sebelum();
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_antrian'] = 1;
    $data['content'] = 'owner/home';
    $this->load->view('template/template', $data);
  }

  function home()
  {

    $id_user = $this->session->userdata('id_user');

    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $this->Klinik_model->get_pasien();
    $rencana_sebelum = $this->Klinik_model->get_rencana_sebelum();
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_antrian'] = 1;
    $data['content'] = 'owner/home';
    $this->load->view('template/template', $data);
  }

  function home_keluarga($id_user)
  {

    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $user = $this->Data_pasien_model->get_user($id_user);
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['user'] = $user;
    $data['pasien'] = $this->Data_pasien_model->get_pasien($id_user);
    $rencana_sebelum = $this->Klinik_model->get_rencana_sebelum();
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_antrian'] = 1;
    $data['content'] = 'owner/home_keluarga';
    $this->load->view('template/template', $data);
  }

  function data_keluarga()
  {
    $this->Klinik_model->tampil();
  }

  function tambah_pasien()
  {
    $data['_antrian'] = 1;
    $data['content'] = 'owner/tambah_pasien';
    $this->load->view('template/template', $data);
  }

  public function tambah_pasien_k($id_user)
  {
    $user = $this->Data_pasien_model->get_user($id_user);
    $data['user'] = $user;
    $data['_antrian'] = 1;
    $data['content'] = 'owner/tambah_pasien_k';
    $this->load->view('template/template', $data);
  }

  public function add_pasien()
  {
    $kode_negara = $this->input->post('kode_negara');
    $no_hp = $this->input->post('no_hp');
    $angka_depan_no_hp = substr($no_hp, 0, 1);

    if ($angka_depan_no_hp == '0') {
      $sisa_no_hp = substr($no_hp, 1);
      $no_hp_full = $kode_negara . $sisa_no_hp;
    } else {
      $no_hp_full = $kode_negara . $no_hp;
    }
    print_r($no_hp_full);

    $data_login = array(
      'nama_depan_u' => $this->input->post('nama_depan'),
      'nama_belakang_u' => $this->input->post('nama_belakang'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'email' => $this->input->post('email'),
      'no_hp' => $no_hp_full,
      'level' => 'Pasien',
    );

    $this->Klinik_model->insert_login($data_login);
    $data = $this->Klinik_model->get_iduser($this->input->post('nama_depan'), $this->input->post('tanggal_lahir'), $this->input->post('nama_belakang'));
    $data_pasien = array(
      'id_user' => $data->id_user,
      'nama_depan' => $this->input->post('nama_depan'),
      'nama_belakang' => $this->input->post('nama_belakang'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'email' => $this->input->post('email'),
      'no_hp' => $no_hp_full,
      'hubungan' => 'Anda',
    );
    $this->Klinik_model->insert_pasien($data_pasien);
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');

    redirect(site_url('owner/home'));
  }

  public function add_pasien_2()
  {
    $data_login = array(
      'nama_depan_u' => $this->input->post('nama_depan'),
      'nama_belakang_u' => $this->input->post('nama_belakang'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp'),
      'level' => 'Pasien',
    );

    $this->Klinik_model->insert_login($data_login);

    $id_user = $this->Klinik_model->get_id_last();

    $data_pasien = array(
      'id_user' => $id_user->id_user,
      'nama_depan' => $this->input->post('nama_depan'),
      'nama_belakang' => $this->input->post('nama_belakang'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp'),
      'hubungan' => 'Anda',
    );
    $this->Klinik_model->insert_pasien($data_pasien);
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');

    redirect(site_url('owner/home'));
  }

  public function add_pasien_k()
  {
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
    $this->Klinik_model->insert_pasien($data_pasien);
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');

    redirect(site_url('owner/home'));
  }

  public function add_booking()
  {
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

    if ($id_pasien == "" || $id_cabang == "" || $id_dokter == "") {
      echo "<script>alert('Pastikan data terisi semua!');history.go(-1);</script>";
    } else {
      $query = $this->Model_booking->insert($data1);
      $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
      </div>');
      $id_pasien = $this->input->post("id_pasien");

      redirect(base_url('owner/data_booking/' . $id_pasien . '/' . $id_booking));
    }
  }

  function data_booking($id_pasien, $id_booking)
  {
    $id_user = $this->session->userdata('id_user');
    $booking1 = $this->Data_pasien_model->get_booking($id_booking);
    $data['booking'] = $booking1;

    $pasien1 = $this->Data_pasien_model->get_pasien_id($id_booking);
    $data['pasien'] = $pasien1;

    $dokter = $this->Data_pasien_model->get_dokter_id($id_booking);
    $data['dokter'] = $dokter;

    $dokter2 = $this->Data_pasien_model->get_dokter_id2($id_booking);
    $data['dokter2'] = $dokter2;

    $cabang2 = $this->Data_pasien_model->get_dokter_id2($id_booking);
    $data['cabang2'] = $cabang2;

    $bayar = $this->Metode_model->get_all();
    $data['metodebayar'] = $bayar;
    $data['_antrian'] = 1;
    $data['content'] = 'owner/booking';
    $this->load->view('template/template', $data);
  }

  public function informasi_pasien()
  {
    $laporan = $this->Informasi_pasien_model->get_laporan_pemeriksaan_all();
    $data['laporan'] = $laporan;
    $informasi = $this->Informasi_pasien_model->get_informasi_all();
    $data['informasi'] = $informasi;
    $rencana_sebelum = $this->Informasi_pasien_model->get_rencana_sebelum();
    $data['rencana_sebelum'] = $rencana_sebelum;
    $data['_informasi_pasien'] = 1;
    $data['content'] = 'owner/informasi_pasien';
    $this->load->view('template/template', $data);
  }

  public function detail_informasi_pasien($id_pasien, $id_booking)
  {
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['dokter'] = $dokter;
    $data['info'] = $this->Informasi_pasien_model->show_informasi($id_pasien, $id_booking);
    $data['info_umum'] = $this->Informasi_pasien_model->get_umum($id_pasien, $id_booking);
    $data['info_klinis'] = $this->Informasi_pasien_model->get_klinis($id_pasien);
    $data['info_penunjang'] = $this->Informasi_pasien_model->get_penunjang($id_pasien);
    $data['info_summary'] = $this->Informasi_pasien_model->get_summary($id_pasien);
    $data['info_odontogram'] = $this->Informasi_pasien_model->get_odontogram($id_pasien);
    $data['info_asuransi'] = $this->Informasi_pasien_model->get_asuransi($id_pasien, $id_booking);
    $data['info_bayar'] = $this->Informasi_pasien_model->get_pembayaran($id_pasien, $id_booking);
    $data['tanggal_periksa_penunjang'] = $this->Informasi_pasien_model->get_tanggal_pemeriksaan($id_pasien);
    $data['_informasi_pasien'] = 1;
    $data['content'] = 'owner/detail_informasi_pasien';
    $this->load->view('template/template', $data);
  }

  function kode_booking($id_pasien, $id_booking)
  {
    $id_user = $this->session->userdata('id_user');
    $booking1 = $this->Data_pasien_model->get_booking($id_booking);
    $data['booking'] = $booking1;

    $pasien1 = $this->Data_pasien_model->get_pasien_id($id_booking);
    $data['pasien'] = $pasien1;

    $dokter = $this->Data_pasien_model->get_dokter_id($id_booking);
    $data['dokter'] = $dokter;

    $bayar = $this->Metode_model->get_all();
    $data['metodebayar'] = $bayar;
    $data['_antrian'] = 1;
    // $data['content'] = 'owner/booking';
    $data['content'] = 'owner/data_booking';
    $this->load->view('template/template', $data);
  }

  public function create_action()
  {

    $tgl = $this->input->post('tanggal_rencana');
    $tgl_rencana = date("Y-m-d", strtotime($tgl));
    // $this->load->view('pasien/site4',array('error'=>''));

    $data_rencana = array(
      'id_booking' => $this->input->post('id_booking'),
      'tanggal_rencana' => $tgl_rencana,
      // 'tanggal_rencana' => $this->input->post('tanggal_rencana'),
      'jam_rencana' => $this->input->post('jam_rencana'),
      'tanggal_keluhan' => $this->input->post('tanggal_keluhan'),
      'keluhan' => $this->input->post('keluhan'),
      'id_metode' => $this->input->post('jenis_pembayaran'),
      'provider' => $this->input->post('provider'),
      'kategori_asuransi' => $this->input->post('kasuransi'),
      'nomor_asuransi' => $this->input->post('no_asuransi'),
      'foto_asuransi' => $this->_uploadImage(),
    );

    $data_pasien = array(
      'id_pasien' => $this->input->post('id_pasien'),
      'id_user' => $this->input->post('id_user'),
      'nama_depan' => $this->input->post('nama_depan'),
      'nama_belakang' => $this->input->post('nama_belakang'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'status_nikah' => $this->input->post('status_nikah'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'pendidikan' => $this->input->post('pendidikan'),
      'jenis_id' => $this->input->post('jenis_id'),
      'no_id' => $this->input->post('no_id'),
      'alamat' => $this->input->post('alamat'),
      'kota_kab' => $this->input->post('kota_kab'),
      'provinsi' => $this->input->post('provinsi'),
      'kode_pos' => $this->input->post('kode_pos'),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp'),
      'gol_darah' => $this->input->post('gol_darah'),
      'alergi' => $this->input->post('alergi'),
      'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
    );
    $data_terdekat = array(
      'id_pasien' => $this->input->post('id_pasien'),
      'id_booking' => $this->input->post('id_booking'),
      'nama_depan_dekat' => $this->input->post('nama_depan_dekat'),
      'nama_belakang_dekat' => $this->input->post('nama_belakang_dekat'),
      'tempat_lahir_dekat' => $this->input->post('tempat_lahir_dekat'),
      'tanggal_lahir_dekat' => $this->input->post('tanggal_lahir_dekat'),
      'jenis_kelamin_dekat' => $this->input->post('jenis_kelamin_dekat'),
      'hubungan_dekat' => $this->input->post('hubungan_dekat'),
      'jenis_id_dekat' => $this->input->post('jenis_id_dekat'),
      'no_id_dekat' => $this->input->post('no_id_dekat'),
      'alamat_dekat' => $this->input->post('alamat_dekat'),
      'kota_kab_dekat' => $this->input->post('kota_kab_dekat'),
      'provinsi_dekat' => $this->input->post('provinsi_dekat'),
      'kode_pos_dekat' => $this->input->post('kode_pos_dekat'),
      'email_dekat' => $this->input->post('email_dekat'),
      'no_hp_dekat' => $this->input->post('no_hp_dekat'),

    );
    $data_survey = array(
      'id_pasien' => $this->input->post('id_pasien'),
      'survey1' => $this->input->post('kunjungan'),
      'survey2' => $this->input->post('market'),
      'survey3' => $this->input->post('komunikasi'),
      'survey4' => $this->input->post('informasi_update'),
    );

    $this->Model_booking->insert_rencana($data_rencana);
    $this->Model_booking->insert_orang_terdekat($data_terdekat);
    $this->Model_booking->insert_survey($data_survey);
    $this->Model_booking->update_pasien($this->input->post('id_pasien'), $data_pasien);

    $kuota = $this->Data_pasien_model->get_kuota($this->input->post('id_dokter'), $this->input->post('hari'));
    $kurang = 1;
    $hasil = 0;
    foreach ($kuota->result() as $qty) {
      $hasil = $qty->kuota - $kurang;
    }

    $id_pasien = $this->input->post('id_pasien');
    $id_booking = $this->input->post('id_booking');

    //$hasil = $kuota - $kurang;
    $this->db->set('kuota', $hasil);
    $this->db->where('id_dokter', $this->input->post('id_dokter'));
    $this->db->where('hari', $this->input->post('hari'));
    $this->db->update('jadwal_dokter');

    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');

    //redirect
    redirect(site_url('owner/kode_booking/' . $id_pasien . '/' . $id_booking));
  }

  function konfirmasi_janji()
  {
    $booking = $this->Klinik_model->get_booking();
    $data['booking'] = $booking;
    $terlambat_booking = $this->Klinik_model->get_terlambat_booking();
    $data['terlambat_booking'] = $terlambat_booking;
    $data['_konfirmasi'] = 1;
    $data['content'] = 'owner/konfirmasi_janji';
    $this->load->view('template/template', $data);
  }

  public function konfirmasi()
  {
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

    $this->Klinik_model->add_rekam_medis($data_rekam_medis);
    $this->Klinik_model->update_booking($this->input->post('id_booking'), $data_booking);

    redirect(site_url('owner/konfirmasi_janji'));
  }

  public function konfirmasi_tolak()
  {
    $konfirmasi = '2';
    $stt = '4';
    $data_booking = array(
      'konfirmasi' => $konfirmasi,
      'status' => $stt,
      'alasan_tolak' => $this->input->post('alasan_tolak'),
    );

    $this->Klinik_model->update_booking($this->input->post('id_booking'), $data_booking);

    redirect(site_url('owner/konfirmasi_janji'));
  }

  public function registrasi_janji()
  {
    $janji = $this->Klinik_model->get_data_janji();
    $data['janji'] = $janji;
    $terlambat_janji = $this->Klinik_model->get_terlambat_janji();
    $data['terlambat_janji'] = $terlambat_janji;
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['_registrasi'] = 1;
    $data['content'] = 'owner/registrasi_janji';
    $this->load->view('template/template', $data);
  }

  public function update_janji()
  {
    $stat_b = '1';
    $data_book = array(
      'status' => $stat_b,
    );
    $data_antrian = array(
      'id_booking' => $this->input->post('id_booking'),
      'id_pasien' => $this->input->post('id_pasien'),
      'id_dokter' => $this->input->post('id_dokter'),
      'id_rekam_medis' => $this->input->post('id_rekam_medis'),
    );
    $this->Klinik_model->update_stat_book($this->input->post('id_booking'), $data_book);
    $this->Klinik_model->add_antrian($data_antrian);
    redirect(site_url('owner/registrasi_janji'));
  }

  public function update_rencana()
  {
    $konf_b = '0';
    $data_book = array(
      'konfirmasi' => $konf_b,
    );
    $data_rencana = array(
      'id_booking' => $this->input->post('id_booking'),
      'tanggal_rencana' => $this->input->post('tanggal_rencana'),
      'jam_rencana' => $this->input->post('jam_rencana'),
    );
    $this->Klinik_model->update_stat_book($this->input->post('id_booking'), $data_book);
    $this->Klinik_model->delete_r($this->input->post('id_booking'));
    $this->Klinik_model->update_rencana($this->input->post('id_rcn'), $data_rencana);
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
    </div>');
    redirect(site_url('owner/registrasi_janji'));
  }

  public function update_rencana_h()
  {

    $data_booking = array(
      //'id_pasien' => $this->input->post('id_pasien'),
      'id_cabang' => $this->input->post('id_cabang'),
      'id_dokter' => $this->input->post('id_dokter'),
    );

    $data_rencana = array(
      'id_booking' => $this->input->post('id_booking'),
      //'id_metode' => $this->input->post('jenis_pembayaran'),
      'tanggal_rencana' => $this->input->post('tanggal_rencana'),
      'jam_rencana' => $this->input->post('jam_rencana'),
    );

    $this->Klinik_model->update_stat_book($this->input->post('id_booking'), $data_booking);
    $this->Klinik_model->update_rencana($this->input->post('id_rcn'), $data_rencana);

    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
  </div>');

    //redirect
    redirect(site_url('owner/home'));
  }

  public function pembayaran()
  {
    $bayar = $this->Klinik_model->get_data_bayar();
    $data['bayar'] = $bayar;
    $data['_pembayaran'] = 1;
    $data['content'] = 'owner/pembayaran';
    $this->load->view('template/template', $data);
  }

  public function metode_bayar($id_booking, $id_rekam_medis)
  {
    $id_booking = $this->uri->segment(3);
    $data = array(
      'title' => 'Metode Pembayaran',
      'pembayaran' => $this->Klinik_model->edit_pembayaran($id_booking),
    );
    $bayar = $this->Klinik_model->get_proses_bayar($id_booking);
    $data['bayar'] = $bayar;
    $layanan = $this->Klinik_model->get_layanan($id_booking);
    $data['layanan'] = $layanan;
    $diskon = $this->Diskon_model->diskon_active();
    $data['diskon'] = $diskon;
    $diskon = $this->Diskon_model->diskon_pil_active($id_rekam_medis);
    $data['diskon_pil'] = $diskon;
    $metode = $this->Metode_model->get_all();
    $data['metodebayar'] = $metode;
    $data['_pembayaran'] = 1;
    $data['content'] = 'owner/metode_pembayaran';
    $this->load->view('template/template', $data);
  }

  public function grandtotal($id_rekam_medis)
  {

    $id3 = $_GET['diskon'];

    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rekam_medis b', 'a.id_booking=b.id_booking');
    $this->db->join('pilih_layanan c', 'b.id_rekam_medis=c.id_rekam_medis');
    $this->db->join('layanan d', 'c.id_layanan=d.id_layanan');
    $this->db->where('b.id_rekam_medis', $id_rekam_medis);
    $data = $this->db->get('')->result();

    $this->db->select('*');
    $this->db->from('diskon');
    $this->db->where('id_diskon', $id3);
    $disk = $this->db->get('')->result();

    foreach ($data as $key) :
      foreach ($disk as $value) :
        if ($id3 != 0) {
          $subtotal = $key->subtotal;
          $diskon = $value->nilai_diskon;
          $grand = $subtotal * ($diskon / 100);
          $total = $subtotal - $grand;
          echo '' . $total;
        } elseif ($id3 == 0) {
          $total = $key->subtotal;
          echo '' . $total;
        } else {
          $total = $key->subtotal;
          echo '' . $total;
        }

      endforeach;
    endforeach;
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

  public function get_hubungan_pasien($id_user)
  {
    $id = $_GET['id'];
    if ($id == 0) {
      $this->db->select('*');
      $this->db->from('pasien');
      $this->db->where('id_user', $id_user);
      $this->db->like('hubungan', 'Anda');
      $data = $this->db->get('')->result();
      foreach ($data as $key) {
        echo $key->nama_depan . " " . $key->nama_belakang;
      }
    }
  }

  public function get_conversion_rate()
  {
    $cr = $_GET['cr'];
    if ($cr == 0) {
      $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
      $this->db->from('rekam_medis a');
      $this->db->join('booking b', 'a.id_booking = b.id_booking');
      $this->db->where('b.konfirmasi', '1');
      $this->db->where('b.status', '3');
      $this->db->where('a.status', '3');
      $data = $this->db->get('')->result();

      $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
      $this->db->from('rekam_medis a');
      $this->db->join('booking b', 'a.id_booking = b.id_booking');
      $this->db->where('b.konfirmasi', '1');
      $all = $this->db->get('')->result();

      foreach ($data as $key) {
        foreach ($all as $value) {
          $total = ($key->jml_id * 100) / $value->jml_all_id;
          $hasil = substr($total, 0, 4);
          echo $hasil . "%";
        }
      }
    }
  }

  public function get_e_rekam_medis()
  {
    $cr = $_GET['cr'];
    if ($cr == 0) {
      $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_id');
      $this->db->from('rekam_medis a');
      $this->db->join('booking b', 'a.id_booking = b.id_booking');
      $this->db->where('b.konfirmasi', '1');
      $this->db->where('b.status', '2');
      $this->db->where('a.status', '2');
      $data = $this->db->get('')->result();

      $this->db->select('* ,COUNT(a.id_rekam_medis) as jml_all_id');
      $this->db->from('rekam_medis a');
      $this->db->join('booking b', 'a.id_booking = b.id_booking');
      $this->db->where('b.konfirmasi', '1');
      $all = $this->db->get('')->result();

      foreach ($data as $key) {
        foreach ($all as $value) {
          $total = ($key->jml_id * 100) / $value->jml_all_id;
          $hasil = substr($total, 0, 4);
          echo $hasil . "%";
        }
      }
    }
  }

  public function update_bayar()
  {
    $status_r = '3';
    $id = $this->input->post('id_rekam_medis');
    $grand = $this->grandtotal($id);
    $data_bayar = array(
      'diagnosis'   => $this->input->post('diagnosa'),
      'grandtotal'  => $this->input->post('grandtotal'),
      'status'      => $status_r,
    );
    $status_b = '3';
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

    $data_pilih = array(
      'id_diskon' => $this->input->post('id_diskon')
    );
    $this->Klinik_model->update_booking($this->input->post('id_booking'), $data_booking);
    $this->Klinik_model->update_rekam_medis($this->input->post('id_booking'), $data_bayar);
    $this->Klinik_model->update_rencana_bayar($this->input->post('id_booking'), $data_rencana);
    $this->Klinik_model->update_pilih_layanan($this->input->post('id_rekam_medis'), $data_pilih);
    redirect(site_url('owner/pembayaran'));
  }

  public function laporan_harian()
  {
    // $laporan = $this->Klinik_model->get_laporan();
    // $data['laporan'] = $laporan;
    // $data['harian'] = $this->Klinik_model->get_graph_day_in_week();
    // $data['_laporan_transaksi'] = 1;
    // $data['content'] = 'owner/laporan_pemeriksaan';
    // $this->load->view('template/template', $data);
    var_dump($this->Klinik_model->get_graph_day_in_week());
  }

 public function laporan_pemeriksaan()
  {
    if (empty($_GET['id_dokter']) && empty($_GET['endDate'])){
      $id_dokter= 0;
      $currentDate= date('Y-m-d');
      $endDate = $currentDate;
      $interval = 6;
      $data['harian'] = $this->Klinik_model->get_harian($id_dokter,$endDate,$interval);
    }
    $laporan = $this->Klinik_model->get_laporan();
    $dokter = $this->Data_pasien_model->get_dokter_filter();
    $data['dokter'] = $dokter;
    $data['laporan'] = $laporan;
    $data['_laporan_transaksi'] = 1;
    $data['content'] = 'owner/laporan_pemeriksaan';
    $this->load->view('template/template', $data);
  }
  public function filter_laporan_pemeriksaan()
  {
    if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= $_GET['id_dokter'];
      $endDate= $_GET['endDate'];
      $interval = $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->get_harian($id_dokter,$endDate,$interval);
    }else if(empty($_GET['id_dokter']) && empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate = $_GET['startDate'];
      $interval = 0;
      $data['harian2'] = $this->Klinik_model->get_harian($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])){
      $currentDate= date('Y-m-d');
      $endDate = $currentDate;
      $interval = 6;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->get_harian($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])){
      $endDate = $_GET['startDate'];
      $interval = 0;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->get_harian($id_dokter,$endDate,$interval);
    }else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate= $_GET['endDate'];
      $interval= $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->get_harian($id_dokter,$endDate,$interval);
    }
    $this->load->view('template/filter_harian_chart_owner', $data);
  }

  public function laporan_pemeriksaan_m()
  {
    $laporan = $this->Klinik_model->get_laporan();
    $dokter = $this->Data_pasien_model->get_dokter_filter();
    $data['harian'] = $this->Klinik_model->get_laporan_pendapatan_m();
    $data['dokter'] = $dokter;
    $data['laporan'] = $laporan;
    $data['_laporan_transaksi'] = 1;
    $data['content'] = 'owner/laporan_pemeriksaan_m';
    $this->load->view('template/template', $data);
  }
  public function filter_laporan_pemeriksaan_m()
  {
    if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= $_GET['id_dokter'];
      $endDate= $_GET['endDate'];
      $interval = $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter,$endDate,$interval);
    }else if(empty($_GET['id_dokter']) && empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate = $_GET['startDate'];
      $interval = 0;
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])){
      $currentDate= date('Y-m-d');
      $endDate = $currentDate;
      $interval = 49;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])){
      $endDate = $_GET['startDate'];
      $interval = 0;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter,$endDate,$interval);
    }else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate= $_GET['endDate'];
      $interval= $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_m($id_dokter,$endDate,$interval);
    }
    $this->load->view('template/filter_mingguan_chart_owner', $data);
  }

  public function laporan_pemeriksaan_b()
  {
    $laporan = $this->Klinik_model->get_laporan();
    $dokter = $this->Data_pasien_model->get_dokter_filter();
    $data['laporan'] = $laporan;
    $data['dokter'] = $dokter;
    $data['harian'] = $this->Klinik_model->get_laporan_pendapatan_b();
    $data['_laporan_transaksi'] = 1;
    $data['content'] = 'owner/laporan_pemeriksaan_b';
    $this->load->view('template/template', $data);
  }
  public function filter_laporan_pemeriksaan_b()
  {
    if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= $_GET['id_dokter'];
      $endDate= $_GET['endDate'];
      $interval = $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter,$endDate,$interval);
    }else if(empty($_GET['id_dokter']) && empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate = $_GET['startDate'];
      $interval = 0;
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])){
      $currentDate= date('Y-m-d');
      $endDate = $currentDate;
      $interval = 364;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])){
      $endDate = $_GET['startDate'];
      $interval = 0;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter,$endDate,$interval);
    }else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate= $_GET['endDate'];
      $interval= $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_b($id_dokter,$endDate,$interval);
    }
    $this->load->view('template/filter_bulanan_chart_owner', $data);
  }

  public function laporan_pemeriksaan_t()
  {
    $laporan = $this->Klinik_model->get_laporan();
    $dokter = $this->Data_pasien_model->get_dokter_filter();
    $data['laporan'] = $laporan;
    $data['dokter'] = $dokter;
    $data['harian'] = $this->Klinik_model->get_laporan_pendapatan_t();
    $data['_laporan_transaksi'] = 1;
    $data['content'] = 'owner/laporan_pemeriksaan_t';
    $this->load->view('template/template', $data);
  }
  public function filter_laporan_pemeriksaan_t()
  {
    if (!empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= $_GET['id_dokter'];
      $endDate= $_GET['endDate'];
      $interval = $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter,$endDate,$interval);
    }else if(empty($_GET['id_dokter']) && empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate = $_GET['startDate'];
      $interval = 0;
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && empty($_GET['startDate'])){
      $currentDate= date('Y-m-d');
      $endDate = $currentDate;
      $interval = 4379;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter,$endDate,$interval);
    }else if (!empty($_GET['id_dokter']) && empty($_GET['endDate']) && !empty($_GET['startDate'])){
      $endDate = $_GET['startDate'];
      $interval = 0;
      $id_dokter= $_GET['id_dokter'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter,$endDate,$interval);
    }else if (empty($_GET['id_dokter']) && !empty($_GET['endDate'])){
      $id_dokter= 0;
      $endDate= $_GET['endDate'];
      $interval= $_GET['interval'];
      $data['harian2'] = $this->Klinik_model->filter_laporan_pendapatan_t($id_dokter,$endDate,$interval);
    }
    $this->load->view('template/filter_tahunan_chart_owner', $data);
  }
  public function laporan_harian_dokter()
  {
    $laporan = $this->Klinik_model->get_laporan();
    $data['laporan'] = $laporan;
    $data['harian'] = $this->Klinik_model->get_perdokter();
    $data['_laporan_transaksi'] = 1;
    $data['content'] = 'owner/laporan_pemeriksaan_d';
    $this->load->view('template/template', $data);
  }

  public function export_detail()
  {
    $data['title'] = 'Laporan Detail Pemeriksaan';
    $data['laporan'] = $this->Klinik_model->get_laporan();

    $this->load->view('owner/vw_laporan_detail', $data);
  }

  public function export_pemeriksaan()
  {
    $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Harian';
    $data['harian'] = $this->Home_model->get_laporan_pendapatan();

    $this->load->view('owner/vw_laporan_pendapatan_pemeriksaan', $data);
  }

  public function export_pemeriksaan_m()
  {
    $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Mingguan';
    $data['harian'] = $this->Home_model->get_laporan_pendapatan_m();

    $this->load->view('owner/vw_laporan_pendapatan_pemeriksaan_m', $data);
  }

  public function export_pemeriksaan_b()
  {
    $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Bulanan';
    $data['harian'] = $this->Home_model->get_laporan_pendapatan_b();

    $this->load->view('owner/vw_laporan_pendapatan_pemeriksaan_b', $data);
  }

  public function export_pemeriksaan_t()
  {
    $data['title'] = 'Laporan Total Pendapatan Pemeriksaan Tahunan';
    $data['harian'] = $this->Home_model->get_laporan_pendapatan_t();

    $this->load->view('owner/vw_laporan_pendapatan_pemeriksaan_t', $data);
  }

  public function export_harian()
  {
    $data['title'] = 'Laporan Total Pendapatan Harian';
    $data['harian'] = $this->Klinik_model->get_harian();

    $this->load->view('owner/vw_laporan_pendapatan_harian', $data);
  }

  public function export_per_dokter()
  {
    $data['title'] = 'Laporan Total Pendapatan Harian Dokter';
    $data['perdokter'] = $this->Klinik_model->get_perdokter();

    $this->load->view('owner/vw_laporan_perdokter', $data);
  }

  function filter_pemeriksaan_klinis()
  {
    $tgl = $_POST['tgl'];
    $id_pasien = $_POST['id'];

    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b', 'a.id_booking=b.id_booking');
    $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
    $this->db->join('rekam_medis d', 'a.id_booking=d.id_booking');
    $this->db->join('pemeriksaan_klinis_umum e', 'a.id_booking=e.id_booking');
    $this->db->join('pemeriksaan_klinis_khusus f', 'a.id_booking=f.id_booking');
    $this->db->where('a.id_pasien', $id_pasien);
    $this->db->where('d.id_pasien', $id_pasien);
    $this->db->where('e.id_pasien', $id_pasien);
    $this->db->where('f.id_pasien', $id_pasien);

    if ($tgl != 0) {
      $this->db->where('d.tanggal_periksa', $tgl);
    }

    $this->db->order_by('d.tanggal_periksa desc');
    $this->db->where('a.konfirmasi', 1);
    $this->db->limit(1);
    $data = $this->db->get('')->result();

    if (!empty($data)) {
?>
      <?php foreach ($data as $info) : ?>
        <div class="col-md-12"><br>
          <div class="col-md-6">
            <div class="col-md-12">
              <font style="font-weight: bold; font-size: 16px;">Pemeriksaan Ekstra Oral</font>
            </div>
            <div class="col-md-6"><br>
              <p>Wajah</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->wajah ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Bibir</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->wajah ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-12"><br>
              <p>Kelenjar Getah Bening</p>
            </div>
            <div class="col-md-12">
              <div class="col-md-6"><br>
                <p>Submandibula Kanan</p>
              </div>
              <div class="col-md-6"><br>
                <p><b><?php echo $info->submandibula_kanan ?></b></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-6"><br>
                <p>Submandibula Kiri</p>
              </div>
              <div class="col-md-6"><br>
                <p><b><?php echo $info->submandibula_kiri ?></b></p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-6"><br>
                <p>Lainnya</p>
              </div>
              <div class="col-md-6"><br>
                <p><b><?php echo $info->lainnya ?></b></p>
              </div>
            </div>
            <div class="col-md-6"><br>
              <p>Kelainan Lainnya</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->submandibula_kanan ?></b></p>
            </div>
          </div>

          <div class="col-md-6" style="border-left: 1px solid #e0e0e0;">
            <div class="col-md-12">
              <font style="font-weight: bold; font-size: 16px;">Pemeriksaan Intra Oral</font>
            </div>
            <div class="col-md-6"><br>
              <p>Gingiva</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->gingiva ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Debris</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->debris ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Stain</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->stain ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Kalkulus</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->kalkulus ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Mukosa</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->mukosa ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Palatum</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->palatum ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Lidah</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->lidah ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Dasar Mulut</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->dasar_mulut ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Hubungan Rahang</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->hubungan_rahang ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Kelainan Gigi Geligi</p>
            </div>
            <div class="col-md-6"><br>
              <p><b><?php echo $info->kelainan_gigi_geligi ?></b></p>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><br>
              <p>Lainnya</p>
            </div>
            <div class="col-md-6"><br>
              <p><b>Tidak Ada</b></p>
            </div>
          </div>
          <div class="col-md-12"><br></div>
        </div>
      <?php endforeach; ?>
    <?php
    } else {
    ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_pemeriksaan_klinis_khusus()
  {
    $tgl = $_POST['tgl'];
    $id_pasien = $_POST['id'];

    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b', 'a.id_booking=b.id_booking');
    $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
    $this->db->join('rekam_medis d', 'a.id_booking=d.id_booking');
    $this->db->join('pemeriksaan_klinis_umum e', 'a.id_booking=e.id_booking');
    $this->db->join('pemeriksaan_klinis_khusus f', 'a.id_booking=f.id_booking');
    $this->db->where('a.id_pasien', $id_pasien);
    $this->db->where('d.id_pasien', $id_pasien);
    $this->db->where('e.id_pasien', $id_pasien);
    $this->db->where('f.id_pasien', $id_pasien);

    if ($tgl != 0) {
      $this->db->where('d.tanggal_periksa', $tgl);
    }

    $this->db->order_by('d.tanggal_periksa desc');
    $this->db->where('a.konfirmasi', 1);
    $this->db->limit(1);
    $data = $this->db->get('')->result();


    if (!empty($data)) {
      foreach ($data as $info) :
      ?>
        <div class="form-group">
          <br><textarea name="keterangan" class="form-control" placeholder="Keterangan" readonly><?php echo $info->keterangan ?></textarea>
        </div>
      <?php
      endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_pemeriksaan_penunjang_radiologi()
  {

    $tgl = $_POST['tgl'];
    $id_pasien = $_POST['id'];

    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b', 'a.id_booking=b.id_booking');
    $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
    $this->db->join('rekam_medis d', 'a.id_booking=d.id_booking');
    $this->db->join('pemeriksaan_penunjang e', 'a.id_booking=e.id_booking');
    $this->db->where('a.id_pasien', $id_pasien);
    $this->db->where('e.id_pasien', $id_pasien);
    $this->db->where('d.id_pasien', $id_pasien);

    if ($tgl != 0) {
      $this->db->where('d.tanggal_periksa', $tgl);
    }

    $this->db->where('a.konfirmasi', 1);
    $this->db->order_by('d.tanggal_periksa', 'DESC');
    $this->db->limit(1);
    $data = $this->db->get('')->result();


    if (!empty($data)) {
      foreach ($data as $info) :
      ?>
        <div class="col-md-12">
          <div class="col-md-6">
            <form value="<?php echo $info->radiologi ?>">
              <br><input type="radio" value="" name="" readonly <?= $info->radiologi == 'Sefalometri' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Transcranial,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?>><span> Panoramik</span>
              <input type="radio" name="" value="" style="margin-left: 15px;" readonly <?= $info->radiologi == 'Panoramik' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Transcranial,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?>><span> Sefalometri</span>
              <input type="radio" name="" value="" style="margin-left: 15px;" readonly <?= $info->radiologi == 'Panoramik' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri,Dental Regio' ? 'disabled' : null ?> <?= $info->radiologi == 'Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?>><span> Trannscranial<span>
                  <input type="radio" name="" value="" style="margin-left: 15px;" readonly <?= $info->radiologi == 'Panoramik' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri' ? 'disabled' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Transcranial' ? 'disabled' : null ?> <?= $info->radiologi == 'Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Panoramik,Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Sefalometri,Transcranial,Dental Regio' ? 'checked' : null ?> <?= $info->radiologi == 'Transcranial,Dental Regio' ? 'checked' : null ?>><span> Dental, Regio<span>
            </form>
          </div>
          <div class="col-md-2">
            <br><textarea name="elemen_gigi" class="form-control" rows="1" readonly disabled><?php echo $info->gigi ?></textarea>
          </div>
        </div>

        <div class="col-md-8">
          <div class="form-group">
            <br><textarea name="keterangan" class="form-control" placeholder="Keterangan" readonly disabled><?php echo $info->keterangan_radiologi ?></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <br><a style="height: 35px; width: 150px; background-color: #f40049; color: white; border-radius: 5px;" class="btn btn-anim" href="<?php echo base_url(); ?>owner/download_informasi_penunjang_radiologi/<?php echo $info->id_pemeriksaan_penunjang; ?>"><b>&nbsp;&nbsp;Download Foto</b></a>
        </div>
      <?php
      endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_pemeriksaan_penunjang_laboratorium()
  {
    $tgl = $_POST['tgl'];
    $id_pasien = $_POST['id'];

    $this->db->select('*');
    $this->db->from('booking a');
    $this->db->join('rencana b', 'a.id_booking=b.id_booking');
    $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
    $this->db->join('rekam_medis d', 'a.id_booking=d.id_booking');
    $this->db->join('pemeriksaan_penunjang e', 'a.id_booking=e.id_booking');
    $this->db->where('a.id_pasien', $id_pasien);
    $this->db->where('e.id_pasien', $id_pasien);
    $this->db->where('d.id_pasien', $id_pasien);

    if ($tgl != 0) {
      $this->db->where('d.tanggal_periksa', $tgl);
    }

    $this->db->where('a.konfirmasi', 1);
    $this->db->order_by('d.tanggal_periksa', 'DESC');
    $this->db->limit(1);
    $data = $this->db->get('')->result();


    if (!empty($data)) {
      foreach ($data as $info) :
      ?>
        <div class="col-md-8">
          <div class="col-md-4">
            <form>
              <br><input type="radio" name="" <?= $info->laboratorium == 'Darah Rutin' ? 'checked' : null ?> <?= $info->laboratorium != 'Darah Rutin' ? 'disabled' : null ?> readonly><span> Darah Rutin</span>
              <input type="radio" name="" style="margin-left: 15px;" readonly <?= $info->laboratorium == 'Darah Rutin' ? 'disabled' : null ?> <?= $info->laboratorium != 'Darah Rutin' ? 'checked' : null ?>><span> Lainnya</span>
            </form>
          </div>
          <div class="col-md-4">
            <form>
              <br><input type="text" name="" class="form-control" readonly value="<?= $info->laboratorium != 'Darah Rutin' ? $info->laboratorium : null ?>">
            </form>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <br><textarea name="keterangan" class="form-control" placeholder="Keterangan" readonly><?php echo $info->keterangan_laboratorium ?></textarea>
          </div>
        </div>
        <div class="col-md-7">
          <br><a href="<?php echo base_url(); ?>owner/download_informasi_penunjang_laboratorium/<?php echo $info->id_pemeriksaan_penunjang; ?>" style="height: 35px; width: 150px; background-color: #f40049; color: white; border-radius: 5px;" class="btn btn-anim"><b>&nbsp;&nbsp;Download Foto</b></a>
        </div>
      <?php
      endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
    <?php
    }
  }
  // Datepicker Filter
  function filter_informasi_pasien()
  {

    $tgl = $_GET['tgl'];

    $konf = '1';
    $this->db->select('b.tanggal_rencana,b.jam_rencana,d.nama_dokter,c.nama_depan,c.nama_belakang,c.hubungan,f.id_rekam_medis,a.status,c.id_pasien,a.id_booking,c.id_user');
    $this->db->from('booking a');
    $this->db->join('rencana b', 'a.id_booking=b.id_booking');
    $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
    $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
    $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
    $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
    $this->db->join('login_session g', 'a.id_user=g.id_user');
    $this->db->where('a.konfirmasi', $konf);

    if ($tgl != 0) {
      $this->db->where('b.tanggal_rencana', $tgl);
    }

    $this->db->where_not_in('a.status', 3);
    $this->db->where_not_in('a.status', 2);
    $this->db->group_by('a.id_booking');
    $this->db->order_by('b.tanggal_rencana', 'desc');
    $data = $this->db->get('')->result();


    if (!empty($data)) {
    ?>
      <?php foreach ($data as $result) : ?>
        <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
        <h5><b><?php echo $tgl ?> </b></h5>
        <div class="col-md-12 d" style="margin: 2px;">
          <div class="col-md-6" style="text-align: left;">
            <h5 style="font-weight: bold;"><?php echo $result->jam_rencana ?></h5>
            <h6>Drg. <?php echo $result->nama_dokter ?></h6>
            <br>
            <?php if ($result->status == 0) { ?>
              <font style="background: #FFFF00; color: #000;" class="label label-warning">Menunggu <br> Pendaftaran</font>
            <?php } elseif ($result->status == 1) { ?>
              <h6 class="label label-success">Sudah Terdaftar</h6>
            <?php } ?>
          </div>
          <div class="col-md-6" style="padding-right: 10px;">
            <h6 style="font-weight: bold ;"><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></h6>
            <p style="font-size: 10px;">No. Rekam Medis <?php echo $result->id_rekam_medis ?></p>
            <p style="font-size: 10px;">
              <?php
              if ($result->hubungan == 'Anda') {
                echo "Atas nama sendiri ";
              } elseif ($result->hubungan == 'Anak') {
                echo $result->hubungan . " " . "<span id ='hubung_id'></span>";
              } elseif ($result->hubungan == 'Ibu') {
                echo $result->hubungan . " " . "<span id ='hubung_id2'></span>";
              } elseif ($result->hubungan == 'Ayah') {
                echo $result->hubungan . " " . "<span id ='hubung_id3'></span>";
              } elseif ($result->hubungan == 'Istri') {
                echo $result->hubungan . " " . "<span id ='hubung_id4'></span>";
              } elseif ($result->hubungan == 'Suami') {
                echo $result->hubungan . " " . "<span id ='hubung_id5'></span>";
              } elseif ($result->hubungan == 'Saudara') {
                echo $result->hubungan . " " . "<span id ='hubung_id6'></span>";
              }
              ?>
            </p>
            <select hidden name="id_user" id="id_user">
              <option value="0" selected></option>
            </select>
            <a href="<?php echo site_url('owner/detail_informasi_pasien/' . $result->id_pasien . '/' . $result->id_booking) ?>" class="btn btn-anim" style="height: 35px; width: 70px; background-color: #f40049; color: white; border-radius: 5px"><span> Lihat</span></a>
          </div>
        </div>
      <?php endforeach; ?>

      <script>
        $(document).ready(function() {
          hubungan_pasien();
          $('#id_user').change(function() {
            // let a = $(this).val();
            // console.log(a);
          });
        });

        function hubungan_pasien() {
          var id = $('#id_user').val();
          $.ajax({
            url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
              id: id
            },
            success: function(data) {
              // console.log(data);
              $('#hubung_id').html(data);
            }
          })
          $.ajax({
            url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
              id: id
            },
            success: function(data) {
              // console.log(data);
              $('#hubung_id2').html(data);
            }
          })
          $.ajax({
            url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
              id: id
            },
            success: function(data) {
              // console.log(data);
              $('#hubung_id3').html(data);
            }
          })
          $.ajax({
            url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
              id: id
            },
            success: function(data) {
              // console.log(data);
              $('#hubung_id4').html(data);
            }
          })
          $.ajax({
            url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
              id: id
            },
            success: function(data) {
              // console.log(data);
              $('#hubung_id5').html(data);
            }
          })
          $.ajax({
            url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
            data: {
              id: id
            },
            success: function(data) {
              // console.log(data);
              $('#hubung_id6').html(data);
            }
          });
        }
      </script>
    <?php
    } else {
    ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_tanggal()
  {
    $id_user = $this->session->userdata('id_user');
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $tgl = $_GET['tgl'];
    $id = $_GET['id'];
    if ($tgl == 0) {
      $stt0 = '0';
      $stt1 = '1';
      $konf = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
      $this->db->group_start();
      $this->db->where('a.konfirmasi', $konf);
      $this->db->where('a.status', $stt0);
      $this->db->or_where('a.status', $stt1);
      $this->db->group_end();
      $this->db->where('b.tanggal_rencana = CURDATE()');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      if ($id == 0) {
        $stt0 = '0';
        $stt1 = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->group_start();
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.status', $stt0);
        $this->db->or_where('a.status', $stt1);
        $this->db->group_end();
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      } else {
        $stt0 = '0';
        $stt1 = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('jadwal_dokter f', ' a.id_dokter=f.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('a.id_dokter', $id);
        $this->db->group_start();
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.status', $stt0);
        $this->db->or_where('a.status', $stt1);
        $this->db->group_end();
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php
        $jam = $result->jam_mulai . '-' . $result->jam_tutup;
        $a = 0;
        $b = 1;
        $a++;
        if ($result->jam_rencana == $jam) {
          if ($a <= $b) { ?>
            <div class="timeline">
              <div class="entry">
                <div class="title">
                  <font style="text-align: right;">
                    <h3><b><?php echo date('H:i', strtotime($result->jam_mulai)) ?> - <?php echo date('H:i', strtotime($result->jam_tutup)) ?></b></h3>
                    <p>Drg. <?php echo $result->nama_dokter  ?></p>
                  </font>
                </div>
                <div class="body">
                  <p style="font-size: 12px;"><i>
                      <?php
                      $awal  = strtotime($result->tanggal_rencana . $result->jam_mulai);
                      $akhir = time();
                      $diff  = $akhir - $awal;
                      $jam   = floor($diff / (60 * 60));
                      $menit = $diff - $jam * (60 * 60);
                      $sisa = $jam * -1;
                      if ($akhir > $awal) {
                        echo 'Terlambat: ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                      } else {
                        echo 'Waktu tersisa tinggal ' . $sisa .  ' jam, ' . floor($menit / 60) . ' menit';
                      }
                      ?>
                    </i></p>
                  <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                  <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                  <div class="form-group">

                    <?php if ($result->konfirmasi == '0'  && $result->status == '0') { ?>
                      <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                        Belum terkonfirmasi </font><br>
                      <font size="2px"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: #f40049; padding: 5px; margin-top: 10px; float: left;"> Ubah Rencana </a></font>
                    <?php } elseif ($result->konfirmasi == '1' && $result->status == '0') { ?>
                      <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                        Menunggu Pendaftaran</font><br>
                      <font size="2px"><a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: #f40049; padding: 5px; margin-top: 10px; float: left;">Lihat</a><a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: #f40049; padding: 5px; margin-top: 10px; float: left;">Daftar</a> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: #f40049; padding: 5px; margin-top: 10px; float: left;">Ubah Rencana</a></font>
                    <?php } elseif ($result->konfirmasi == '2') { ?>
                      <font style="background-color: red; color: black; padding: 5px" size="2px">
                        Booking Ditolak</font><br>
                      <font size="2px"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: #f40049; padding: 5px; margin-top: 10px; float: left;"> Ubah Rencana </a></font>
                    <?php } elseif ($result->konfirmasi == '1' && $result->status == '1') { ?>
                      <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                        Sudah Terdaftar</font><br>
                      <font size="2px"><a href="#" class="col-md-10 btn-bayar" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style="color: white; padding: 5px; margin-top: 10px;">Lihat</a></font>
                    <?php } ?>
                    <br>

                    <div id="myModal<?php echo $result->id_pasien ?>" class="modal" style="top: 50px;">
                      <form class="form-horizontal" action="<?php echo base_url('owner/update_rencana_h/'); ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="text-align: center;"><b>Janji yang akan datang</b></h4>
                            </div>
                            <div class="col-lg-12">

                              <div class="modal-body">
                                <h3 class="madal-body">
                                  <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
                                </h3>
                                <?php if ($result->konfirmasi == '0' || $result->konfirmasi == '1' || $result->konfirmasi == '2') { ?>
                                  <?php if ($result->status == '0') { ?>
                                    <?php if ($result->konfirmasi == '0') { ?>
                                      <font style="background-color: yellow; color: black; padding: 5px; float: right;">
                                        Belum terkonfirmasi </font>
                                    <?php } elseif ($result->konfirmasi == '1') { ?>
                                      <font style="background-color: yellow; color: black; padding: 5px; float: right;">
                                        Menunggu Pendaftaran </font>
                                    <?php } else { ?>
                                      <p>
                                        <center>alasan ditolak:</center>
                                      </p>
                                      <h5>
                                        <center><?php echo $result->alasan_tolak ?></center>
                                      </h5><br>
                                      <h6>
                                        <center>Silahkan menjadwalkan ulang di bawah ini</center>
                                      </h6><br>
                                      <font style="background-color: red; color: black; padding: 5px; float: right;">
                                        Booking Ditolak</font>
                                    <?php } ?>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Nama Dokter</label>
                                      <div class="col-lg-9">
                                        <select class="form-control" name="id_dokter" required data-required-msg="Address is required">
                                          <option value="<?php echo $result->id_dokter  ?>" disabled selected style="display: none;"><?php echo $result->nama_dokter  ?></option>
                                          <?php foreach ($dokter->result() as $result2) : ?>
                                            <option value="" disabled selected hidden>Pilih Dokter</option>
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
                                            <option value="" disabled selected hidden>Pilih Cabang</option>
                                            <option value="<?php echo $result2->id_cabang ?>"><?php echo $result2->nama_cabang  ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Tanggal</label>
                                      <div class="col-lg-3">
                                        <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                                        <input type="text" id="date" class="form-control" name="tanggal_rencana" value="<?php echo $tgl ?>" readonly>
                                      </div>
                                      <div class="col-lg-6">
                                        <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                                        <input type="date" id="date" class="form-control" name="tanggal_rencana" value="<?php echo $tgl ?>">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label">Waktu</label>
                                      <div class="col-lg-9">
                                        <select class="form-control" name="jam_rencana" required data-required-msg="Address is required">
                                          <option value="<?php echo $result->jam_rencana  ?>" disabled selected style="display: none;"><?php echo $result->jam_rencana  ?></option>
                                          <?php
                                          $query = $this->db->query('select * from jadwal_dokter where id_dokter="' . $result->id_dokter . '"');
                                          foreach ($query->result() as $hasil) :
                                          ?>
                                            <option value="" disabled selected hidden>Pilih Waktu</option>
                                            <option value="<?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?>"><?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>
                                    </div>

                                  <?php } else { ?>
                                    <h5>
                                      <center>dengan dokter <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></center>
                                    </h5>
                                    <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                                    <h5>
                                      <center>pada tanggal <?php echo $tgl  ?> jam <?php echo $result->jam_rencana  ?></center>
                                    </h5>
                                    <br>
                                    <center>
                                      <font style="background-color: lightgreen; color: black; padding: 5px;">
                                        Sudah Terdaftar</font>
                                    </center>
                                    <br>
                                    <p>
                                      <center>Kode Booking:</center>
                                    </p>
                                    <b>
                                      <h4 class="madal-title">
                                        <center><?php echo $result->id_booking ?></center>
                                      </h4>
                                    </b>
                                    <h6>
                                      <center>Tunjukkan kode booking ini pada saat registrasi di klinik kami</center>
                                    </h6>
                                    <h6>
                                      <center>Sampai Berjumpa</center>
                                    </h6>

                                    <br>
                                <?php }
                                } ?>
                              </div>

                              <input type="hidden" class="form-control" name="id_rcn" value="<?php echo $result->id_rcn ?>">
                              <input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
                              <hr>
                            </div>
                            <div class="modal-footer">
                              <?php if ($result->konfirmasi == '0' || $result->konfirmasi == '1' || $result->konfirmasi == '2') { ?>
                                <?php if ($result->status == '0') { ?>
                                  <button class="btn" style="background-color:salmon; color:white" type="submit"> Ubah&nbsp;</button>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                <?php } else { ?>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"> Kembali</button>
                              <?php }
                              } ?>
                            </div>

                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      <?php endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Pasien Saat ini</h4>
      </font>
      <?php
    }
  }

  function filter_profil_2()
  {
    $id_user = $this->session->userdata('id_user');
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $id = $_GET['id'];
    $tgl = $_GET['tgl'];
    if ($id == 0) {
      $konf = '1';
      $st = '2';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
      $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
      $this->db->where('a.konfirmasi', $konf);
      $this->db->where('a.status', $st);
      $this->db->where('f.status', $st);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      if ($tgl == 0) {
        $konf = '1';
        $st = '2';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', ' a.id_dokter=g.id_dokter');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.status', $st);
        $this->db->where('f.status', $st);
        $this->db->where('a.id_dokter', $id);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      } else {
        $konf = '1';
        $st = '2';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', ' a.id_dokter=g.id_dokter');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.status', $st);
        $this->db->where('f.status', $st);
        $this->db->where('a.id_dokter', $id);
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '1') { ?>
          <?php
          $jam = $result->jam_mulai . '-' . $result->jam_tutup;
          $a = 0;
          $b = 1;
          $a++;
          if ($result->jam_rencana == $jam) {
            if ($a <= $b) { ?>
              <div class="timeline">
                <div class="entry">
                  <div class="title">
                    <font style="text-align: right;">
                      <h3><b><?php echo date('H:i', strtotime($result->jam_mulai_periksa)); ?> - <?php echo date('H:i', strtotime($result->jam_selesai_periksa)); ?></b></h3>
                      <p>Drg. <?php echo $result->nama_dokter  ?></p>
                    </font>
                  </div>
                  <div class="body">
                    <p style="font-size: 12px;"><i>
                        <?php
                        $awal  = strtotime($result->tanggal_rencana . $result->jam_selesai_periksa);
                        $akhir = time();
                        $diff  = $akhir - $awal;
                        $jam   = floor($diff / (60 * 60));
                        $menit = $diff - $jam * (60 * 60);
                        $sisa = $jam * -1;
                        if ($akhir > $awal) {
                          echo $jam .  ' jam, ' . floor($menit / 60) . ' menit yang lalu';
                        } else {
                          echo 'Waktu tersisa tinggal ' . $sisa .  ' jam, ' . floor($menit / 60) . ' menit';
                        }
                        ?>
                      </i></p>
                    <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                    <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                    <div class="form-group">
                      <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                        Pemeriksaan Selesai</font><br><br>
                      <a href="<?php echo base_url() ?>owner/metode_bayar/<?php echo $result->id_booking ?>/<?php echo $result->id_rekam_medis ?>" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                    </div>
                  </div>
                </div>
              </div>
        <?php }
          }
        } ?>
      <?php endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_tanggal_2()
  {
    $id_user = $this->session->userdata('id_user');
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $tgl = $_GET['tgl'];
    $id = $_GET['id'];
    if ($tgl == 0) {
      $stat = '1';
      $st = '2';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
      $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
      $this->db->where('a.konfirmasi', $stat);
      $this->db->where('a.status', $st);
      $this->db->where('f.status', $st);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      if ($id == 0) {
        $stat = '1';
        $st = '2';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
        $this->db->where('a.konfirmasi', $stat);
        $this->db->where('a.status', $st);
        $this->db->where('f.status', $st);
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      } else {
        $stat = '1';
        $st = '2';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
        $this->db->where('a.konfirmasi', $stat);
        $this->db->where('a.status', $st);
        $this->db->where('f.status', $st);
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('a.id_dokter', $id);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '1') { ?>
          <?php
          $jam = $result->jam_mulai . '-' . $result->jam_tutup;
          $a = 0;
          $b = 1;
          $a++;
          if ($result->jam_rencana == $jam) {
            if ($a <= $b) { ?>
              <div class="timeline">
                <div class="entry">
                  <div class="title">
                    <font style="text-align: right;">
                      <h3><b><?php echo date('H:i', strtotime($result->jam_mulai_periksa)); ?> - <?php echo date('H:i', strtotime($result->jam_selesai_periksa)); ?></b></h3>
                      <p>Drg. <?php echo $result->nama_dokter  ?></p>
                    </font>
                  </div>
                  <div class="body">
                    <p style="font-size: 12px;"><i>
                        <?php
                        $awal  = strtotime($result->tanggal_rencana . $result->jam_selesai_periksa);
                        $akhir = time();
                        $diff  = $akhir - $awal;
                        $jam   = floor($diff / (60 * 60));
                        $menit = $diff - $jam * (60 * 60);
                        $sisa = $jam * -1;
                        if ($akhir > $awal) {
                          echo $jam .  ' jam, ' . floor($menit / 60) . ' menit yang lalu';
                        } else {
                          echo 'Waktu tersisa tinggal ' . $sisa .  ' jam, ' . floor($menit / 60) . ' menit';
                        }
                        ?>
                      </i></p>
                    <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                    <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                    <div class="form-group">
                      <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                        Pemeriksaan Selesai</font><br><br>
                      <a href="<?php echo base_url() ?>owner/metode_bayar/<?php echo $result->id_booking ?>/<?php echo $result->id_rekam_medis ?>" type="button" class="col-md-10 btn-bayar">Proses Bayar</a>
                    </div>
                  </div>
                </div>
              </div>
        <?php }
          }
        } ?>
      <?php endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
      <?php
    }
  }

  function filter_profil_3()
  {
    $id_user = $this->session->userdata('id_user');
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $id = $_GET['id'];
    $tgl = $_GET['tgl'];
    if ($id == 0) {
      $stt = '1';
      $konf = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
      $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
      $this->db->where('f.status', $stt);
      $this->db->where('a.status', $stt);
      $this->db->where('a.konfirmasi', $konf);
      $this->db->where('b.tanggal_rencana = CURDATE()');
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      if ($tgl == 0) {
        $stt = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
        $this->db->where('a.id_dokter', $id);
        $this->db->where('f.status', $stt);
        $this->db->where('a.status', $stt);
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('b.tanggal_rencana = CURDATE()');
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      } else {
        $stt = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
        $this->db->where('a.id_dokter', $id);
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('f.status', $stt);
        $this->db->where('a.status', $stt);
        $this->db->where('a.konfirmasi', $konf);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '1') { ?>
          <?php
          $jam = $result->jam_mulai . '-' . $result->jam_tutup;
          $a = 0;
          $b = 1;
          $a++;
          if ($result->jam_rencana == $jam) {
            if ($a <= $b) { ?>
              <div class="timeline">
                <div class="entry">
                  <div class="title">
                    <font style="text-align: right;">
                      <h3><b><?php echo date('H:i', strtotime($result->jam_mulai_periksa)) ?> - <?php echo date('H:i', strtotime($result->jam_tutup)) ?></b></h3>
                      <p>Drg. <?php echo $result->nama_dokter  ?></p>
                    </font>
                  </div>
                  <div class="body">
                    <p style="font-size: 12px;"><i>
                        <?php
                        $awal  = strtotime($result->tanggal_rencana . $result->jam_mulai);
                        $akhir = time();
                        $diff  = $akhir - $awal;
                        $jam   = floor($diff / (60 * 60));
                        $menit = $diff - $jam * (60 * 60);
                        $sisa = $jam * -1;
                        if ($akhir > $awal) {
                          echo 'Terlambat: ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                        } else {
                          echo 'Waktu tersisa tinggal ' . $sisa .  ' jam, ' . floor($menit / 60) . ' menit';
                        }
                        ?>
                      </i></p>
                    <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                    <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                    <div class="form-group">
                      <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                        Sedang Pemeriksaan</font>
                    </div>
                  </div>
                </div>
              </div>
        <?php }
          }
        } ?>
      <?php endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Belum Ada Pemeriksaan</h4>
      </font>
      <?php
    }
  }

  function filter_tanggal_3()
  {
    $id_user = $this->session->userdata('id_user');
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $tgl = $_GET['tgl'];
    $id = $_GET['id'];
    if ($tgl == 0) {
      $stt = '1';
      $konf = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
      $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
      $this->db->where('f.status', $stt);
      $this->db->where('a.status', $stt);
      $this->db->where('a.konfirmasi', $konf);
      $this->db->where('b.tanggal_rencana = CURDATE()');
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      if ($id == 0) {
        $stt = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('f.status', $stt);
        $this->db->where('a.status', $stt);
        $this->db->where('a.konfirmasi', $konf);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      } else {
        $stt = '1';
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
        $this->db->join('jadwal_dokter g', 'a.id_dokter=g.id_dokter');
        $this->db->where('b.tanggal_rencana', $tgl);
        $this->db->where('a.id_dokter', $id);
        $this->db->where('f.status', $stt);
        $this->db->where('a.status', $stt);
        $this->db->where('a.konfirmasi', $konf);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $data = $this->db->get('')->result();
      }
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '1') { ?>
          <?php
          $jam = $result->jam_mulai . '-' . $result->jam_tutup;
          $a = 0;
          $b = 1;
          $a++;
          if ($result->jam_rencana == $jam) {
            if ($a <= $b) { ?>
              <div class="timeline">
                <div class="entry">
                  <div class="title">
                    <font style="text-align: right;">
                      <h3><b><?php echo date('H:i', strtotime($result->jam_mulai_periksa)) ?> - <?php echo date('H:i', strtotime($result->jam_tutup)) ?></b></h3>
                      <p>Drg. <?php echo $result->nama_dokter  ?></p>
                    </font>
                  </div>
                  <div class="body">
                    <p style="font-size: 12px;"><i>
                        <?php
                        $awal  = strtotime($result->tanggal_rencana . $result->jam_mulai);
                        $akhir = time();
                        $diff  = $akhir - $awal;
                        $jam   = floor($diff / (60 * 60));
                        $menit = $diff - $jam * (60 * 60);
                        $sisa = $jam * -1;
                        if ($akhir > $awal) {
                          echo 'Terlambat: ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit';
                        } else {
                          echo 'Waktu tersisa tinggal ' . $sisa .  ' jam, ' . floor($menit / 60) . ' menit';
                        }
                        ?>
                      </i></p>
                    <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                    <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                    <div class="form-group">
                      <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                        Sedang Pemeriksaan</font>
                    </div>
                  </div>
                </div>
              </div>
        <?php }
          }
        } ?>
      <?php endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Belum Ada Pemeriksaan</h4>
      </font>
<?php
    }
  }
}

/* End of file owner.php */
/* Location: ./application/controllers/owner.php */ ?>
