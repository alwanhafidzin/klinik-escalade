<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_booking');
        $this->load->model('Antrian_model');
        $this->load->model('Data_pasien_model');
        // $this->load->model('Data_klinik_model');
        $this->load->model('Rekam_medis_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'booking/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'booking/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'booking/index.html';
            $config['first_url'] = base_url() . 'booking/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Model_booking->total_rows($q);
        $booking = $this->Model_booking->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'booking_data' => $booking,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $data['_booking'] = 1;
        $data['content'] = 'booking/booking';
        $this->load->view('template', $data);
    }

    function get_data_booking() {
        echo $this->Model_booking->tampil();
    }

    public function read($id) {
        $row = $this->Data_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID_pasien' => $row->ID_pasien,
                // 'foto'                       => $row->foto,
                'Nama' => $row->Nama,
                'Alamat' => $row->Alamat,
                'Tanggal_lahir' => $row->Tanggal_lahir,
                'No_hp' => $row->No_hp,
                //'keluhan_utama'               => $row->keluhan_utama,
                'riwayat_penyakit' => $row->riwayat_penyakit,
                'riwayat_alergi_obat' => $row->riwayat_alergi_obat,
                'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya,
            );

            $data['_data_pasien'] = 1;
            $data['content'] = 'data_pasien/data_pasien_read1';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Data_pasien'));
        }
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
        
        if (!$this->upload->do_upload('foto_asuransi')) {
            $error=array('error'=>$this->upload->display_errors());
            //return $this->upload->data("file_name");
            // $this->load->view('pasien/site4',$error);
            echo $error;
        }
        else{
            return $this->upload->data("file_name");
        }
        
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('booking/create_action'),
            'id_booking' => set_value('id_booking'),
            'id_profile' => set_value('id_profile'),
            'id_pasien' => set_value('id_pasien'),
            'id_dokter' => set_value('id_dokter'),
            'id_metode' => set_value('id_metode'),
            // 'foto'                       => set_value('foto'),
            'id_user' => set_value('id_user'),
            'nama_depan' => set_value('nama_depan'),
            'nama_belakang' => set_value('nama_belakang'),
            'tempat_lahir' => set_value('tempat_lahir'),
            'tanggal_lahir' => set_value('tanggal_lahir'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'status_nikah' => set_value('status_nikah'),
            'pekerjaan' => set_value('pekerjaan'),
            'pendidikan' => set_value('pendidikan'),
            'jenis_id' => set_value('jenis_id'),
            'no_id' => set_value('no_id'),
            'alamat' => set_value('alamat'),
            'kota_kab' => set_value('kota_kab'),
            'provinsi' => set_value('provinsi'),
            'kode_pos' => set_value('kode_pos'),
            'email' => set_value('email'),
            'no_hp' => set_value('no_hp'),
            'gol_darah' => set_value('gol_darah'),
            'alergi' => set_value('alergi'),
            'riwayat_penyakit' => set_value('riwayat_penyakit'),

            'nama_depan_dekat' => set_value('nama_depan_dekat'),
            'nama_belakang_dekat' => set_value('nama_belakang_dekat'),
            'tempat_lahir_dekat' => set_value('tempat_lahir_dekat'),
            'tanggal_lahir_dekat' => set_value('tanggal_lahir_dekat'),
            'jenis_kelamin_dekat' => set_value('jenis_kelamin_dekat'),
            'hubungan_dekat' => set_value('hubungan_dekat'),
            'jenis_id_dekat' => set_value('jenis_id_dekat'),
            'no_id_dekat' => set_value('no_id_dekat'),
            'alamat_dekat' => set_value('alamat_dekat'),
            'kota_kab_dekat' => set_value('kota_kab_dekat'),
            'provinsi_dekat' => set_value('provinsi_dekat'),
            'kode_pos_dekat' => set_value('kode_pos_dekat'),
            'email_dekat' => set_value('email_dekat'),
            'no_hp_dekat' => set_value('no_hp_dekat'),

            'kunjungan' => set_value('kunjungan'),
            'market' => set_value('market'),
            'komunikasi' => set_value('komunikasi'),
            'informasi_update' => set_value('informasi_update'),

            'tanggal_keluhan' => set_value('tanggal_keluhan'),
            'keluhan' => set_value('keluhan'),
        );

        $data['_booking'] = 1;
        $data['content'] = 'booking/tambah_booking';
        $this->load->view('template', $data);
    }

    public function create_action() {
        
        // $this->load->view('pasien/site4',array('error'=>''));

        $data_rencana = array(
            'id_booking' => $this->input->post('id_booking'),
            'tanggal_rencana' => $this->input->post('tanggal_rencana'),
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
        $this->Model_booking->update_pasien($this->input->post('id_pasien'),$data_pasien);

        $kuota = $this->Data_pasien_model->get_kuota($this->input->post('id_dokter'), $this->input->post('hari'));
        $kurang = 1;
        $hasil=0;
        foreach ($kuota->result() as $qty) {
            $hasil = $qty->kuota - $kurang;
        }
        
        //$hasil = $kuota - $kurang;
        $this->db->set('kuota', $hasil);
        $this->db->where('id_dokter', $this->input->post('id_dokter'));
        $this->db->where('hari', $this->input->post('hari'));
        $this->db->update('jadwal_dokter');

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
            </div>');

        //redirect
        redirect(site_url('Pasien/beranda'));
    }

    public function create_action2() {
        
        // $this->load->view('pasien/site4',array('error'=>''));

        $data_rencana = array(
            'id_booking' => $this->input->post('id_booking'),
            'tanggal_rencana' => $this->input->post('tanggal_rencana'),
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
        $this->Model_booking->update_pasien($this->input->post('id_pasien'),$data_pasien);

        $kuota = $this->Data_pasien_model->get_kuota($this->input->post('id_dokter'), $this->input->post('hari'));
        $kurang = 1;
        $hasil=0;
        foreach ($kuota->result() as $qty) {
            $hasil = $qty->kuota - $kurang;
        }
        
        //$hasil = $kuota - $kurang;
        $this->db->set('kuota', $hasil);
        $this->db->where('id_dokter', $this->input->post('id_dokter'));
        $this->db->where('hari', $this->input->post('hari'));
        $this->db->update('jadwal_dokter');

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
            </div>');

        //redirect
        redirect(site_url('Superdokter/home'));
    }

        public function create_action3() {
        
        // $this->load->view('pasien/site4',array('error'=>''));

        $data_rencana = array(
            'id_booking' => $this->input->post('id_booking'),
            'tanggal_rencana' => $this->input->post('tanggal_rencana'),
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
        $this->Model_booking->update_pasien($this->input->post('id_pasien'),$data_pasien);

        $kuota = $this->Data_pasien_model->get_kuota($this->input->post('id_dokter'), $this->input->post('hari'));
        $kurang = 1;
        $hasil=0;
        foreach ($kuota->result() as $qty) {
            $hasil = $qty->kuota - $kurang;
        }
        
        //$hasil = $kuota - $kurang;
        $this->db->set('kuota', $hasil);
        $this->db->where('id_dokter', $this->input->post('id_dokter'));
        $this->db->where('hari', $this->input->post('hari'));
        $this->db->update('jadwal_dokter');

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
            </div>');

        //redirect
        redirect(site_url('owner/home'));
    }


    public function update_rencana() {
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

       $this->Model_booking->update_booking($this->input->post('id_booking'),$data_booking);
       $this->Model_booking->update_rencana($this->input->post('id_rcn'),$data_rencana);

       $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
        </div>');

        //redirect
       redirect(site_url('Pasien/beranda'));
   }

   //  public function konfirmasi(){
   //      $konfirmasi = '1';
   //      $data_booking = array(
   //          'konfirmasi' => $konfirmasi,
   //      );

   //      $data_rekam_medis = array(
   //          'id_booking' => $this->input->post('id_booking'),
   //          'id_pasien' => $this->input->post('id_pasien'),
   //      );

   //      $this->Data_klinik_model->add_rekam_medis($data_rekam_medis);
   //      $this->Model_booking->update_booking($this->input->post('id_booking'), $data_booking);

   //      $id_rekam_medis = $this->Data_admin_model->get_id_last();

   //      $data_antrian = array(
   //          'id_booking' => $this->input->post('id_booking'),
   //          'id_pasien' => $this->input->post('id_pasien'),
   //          'id_user' => $this->input->post('id_user'),
   //          'id_dokter' => $this->input->post('id_dokter'),
   //          'id_rekam_medis' => $id_rekam_medis->id_rekam_medis,
   //      );
   //      $this->Data_klinik_model->add_antrian($data_antrian);

   //      redirect(site_url('Resepsionis'));
   // }
}