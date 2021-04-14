<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Pasien extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Data_pasien_model');
    $this->load->model('Metode_model');
    $this->load->model('Model_booking');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $id_user = $this->session->userdata('id_user');
    $pasien = $this->Data_pasien_model->get_pasien($id_user);
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $pasien;

    $rencana_sebelum = $this->Data_pasien_model->get_rencana_sebelum($id_user);
    $data['rencana_sebelum'] = $rencana_sebelum;

    $data['_data_pasien'] = 1;
    $data['content'] = 'data_pasien/beranda';
    $this->load->view('template', $data);
  }

  function beranda()
  {

    $id_user = $this->session->userdata('id_user');
    $pasien = $this->Data_pasien_model->get_pasien($id_user);
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $pasien;
    $rencana_sebelum = $this->Data_pasien_model->get_rencana_sebelum($id_user);
    $data['rencana_sebelum'] = $rencana_sebelum;

    $bayar = $this->Data_pasien_model->get_bayar();
    $data['metodebayar'] = $bayar;

    $data['_data_pasien'] = 1;
    $data['content'] = 'data_pasien/beranda';
    $this->load->view('template', $data);
  }

  function data_booking($id_pasien, $id_booking)
  {
    $id_user = $this->session->userdata('id_user');
    $booking1 = $this->Data_pasien_model->get_booking($id_booking);
    $data['booking'] = $booking1;

    $pasien1 = $this->Data_pasien_model->get_pasien_id($id_booking);
    $data['pasien'] = $pasien1;

    //echo $id_booking;
    $dokter = $this->Data_pasien_model->get_dokter_id($id_booking);
    $data['dokter'] = $dokter;

    $dokter2 = $this->Data_pasien_model->get_dokter_id2($id_booking);
    $data['dokter2'] = $dokter2;

    $cabang2 = $this->Data_pasien_model->get_dokter_id2($id_booking);
    $data['cabang2'] = $cabang2;

    $bayar = $this->Metode_model->get_all();
    $data['metodebayar'] = $bayar;
    $data['_data_pasien'] = 1;
    $data['content'] = 'data_pasien/data_booking';
    $this->load->view('template', $data);
  }

  function jadwal_dokter()
  {
    $data['cari'] = $this->Data_pasien_model->cariOrang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $data['dokter'] = $dokter;
    $dokter2 = $this->Data_pasien_model->get_dokter()->row();
    $id_user = $this->session->userdata('id_user');
    $pasien = $this->Data_pasien_model->get_pasien($id_user);
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $jadwal = $this->Data_pasien_model->get_jadwal();
    $data['cabang'] = $cabang;
    $data['dokter'] = $dokter;
    $data['pasien'] = $pasien;
    $data['jadwal'] = $jadwal;
    $rencana_sebelum = $this->Data_pasien_model->get_rencana_sebelum($id_user);
    //$cabang = $this->Data_pasien_model->get_cabang2($dokter2->id_dokter);
    //print_r($this->db->last_query());
    //$data['cabang'] = $cabang;
    $cabang_dokter = $this->Data_pasien_model->get_jadwal();
    $data['cabang_dokter'] = $cabang_dokter;


    $data['_data_pasien'] = 1;
    $data['content'] = 'data_pasien/jadwal_dokter';
    $this->load->view('template', $data);
  }

  function info_klinik()
  {
    $layanan = $this->Data_pasien_model->get_layanan();
    $cabang = $this->Data_pasien_model->get_cabang();
    $data['layanan'] = $layanan;
    $data['cabang'] = $cabang;
    $data['_data_pasien'] = 1;
    $data['content'] = 'data_pasien/info_klinik';
    $this->load->view('template', $data);
  }

  function tambah_pasien()
  {
    $data['_data_pasien'] = 1;
    $data['content'] = 'data_pasien/tambah_pasien';
    $this->load->view('template', $data);
  }


  function ajax_get_pasien($id)
  {

    //  echo json_encode();
    $data = $this->Data_pasien_model->ajax_get_pasien($id);
    echo $data->nama_depan . " " . $data->nama_belakang . "<br />";
    echo $data->alamat . "<br />";
    echo "<input type='hidden' name='id_pasien2' value='" . $data->id_pasien . "'>";
  }

  function ajax_get_cabang($id)
  {

    //  echo json_encode();
    $data = $this->Data_pasien_model->ajax_get_cabang($id);
    echo $data->nama_cabang . "<br />";
    echo $data->alamat;
    echo "<input type='hidden' name='id_cabang2' value='" . $data->id_cabang . "'>";
  }

  function ajax_get_dokter($id)
  {

    //  echo json_encode();
    $data = $this->Data_pasien_model->ajax_get_dokter($id);
    echo $data->nama_dokter . "<br />";
    echo $data->spesialis;
    echo "<input type='hidden' name='id_dokter2' value='" . $data->id_dokter . "'>";
  }

  function filter_profil()
  {
    $id_user = $this->session->userdata("id_user");
    $cabang = $this->Data_pasien_model->get_cabang();
    $dokter = $this->Data_pasien_model->get_dokter();
    $id = $_GET['id'];
    if ($id == 0) {
      $stt = '0';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      $stt = '0';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('a.id_pasien', $id);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '0' && $result->status == '0') { ?>
          <div class="timeline">
            <div class="entry">
              <div class="title">
                <font style="text-align: right;">
                  <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                  <?php
                  switch ($namahari) {
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
                  <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                  <h3><b><?php echo $tgl ?></b></h3>
                  <p><?php echo $result->jam_rencana  ?></p>
                </font>
              </div>
              <div class="body">
                <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                <div class="form-group">

                  <?php if ($result->konfirmasi == '0') { ?>
                    <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                      Belum terkonfirmasi </font>
                  <?php } else { ?>
                    <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                      Sudah terkonfirmasi</font>
                  <?php } ?>
                  <font size="2px"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font>

                  <div id="myModal<?php echo $result->id_pasien ?>" class="modal">
                    <form class="form-horizontal" action="<?php echo base_url('Booking/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" style="text-align: center;"><b>Jadwal yang akan datang</b></h4>
                          </div>
                          <div class="col-lg-12">

                            <div class="modal-body">
                              <h3 class="madal-body">
                                <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
                              </h3>
                              <?php if ($result->konfirmasi == '0') { ?>
                                <font style="background-color: yellow; color: black; padding: 5px; float: right;">
                                  Belum terkonfirmasi </font>
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
                                    Sudah terkonfirmasi</font>
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
                              <?php } ?>
                            </div>

                            <input type="hidden" class="form-control" name="id_rcn" value="<?php echo $result->id_rcn ?>">
                            <input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
                            <hr>
                          </div>
                          <div class="modal-footer">
                            <?php if ($result->konfirmasi == '0') { ?>
                              <button class="btn salmon" type="submit"> Ubah&nbsp;</button>
                              <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                            <?php } else { ?>
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
        <?php } elseif ($result->konfirmasi == '1' && $result->status == '0') { ?>
          <div class="timeline">
            <div class="entry">
              <div class="title">
                <font style="text-align: right;">
                  <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                  <?php
                  switch ($namahari) {
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
                  <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                  <h3><b><?php echo $tgl ?></b></h3>
                  <p><?php echo $result->jam_rencana  ?></p>
                </font>
              </div>
              <div class="body">
                <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                <div class="form-group">

                  <?php if ($result->konfirmasi == '0') { ?>
                    <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                      Belum terkonfirmasi </font>
                  <?php } else { ?>
                    <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                      Sudah terkonfirmasi</font>
                  <?php } ?>
                  <font size="2px"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font>

                  <div id="myModal<?php echo $result->id_pasien ?>" class="modal">
                    <form class="form-horizontal" action="<?php echo base_url('Booking/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" style="text-align: center;"><b>Jadwal yang akan datang</b></h4>
                          </div>
                          <div class="col-lg-12">

                            <div class="modal-body">
                              <h3 class="madal-body">
                                <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
                              </h3>
                              <?php if ($result->konfirmasi == '0') { ?>
                                <font style="background-color: yellow; color: black; padding: 5px; float: right;">
                                  Belum terkonfirmasi </font>
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
                                    Sudah terkonfirmasi</font>
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
                              <?php } ?>
                            </div>

                            <input type="hidden" class="form-control" name="id_rcn" value="<?php echo $result->id_rcn ?>">
                            <input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
                            <hr>
                          </div>
                          <div class="modal-footer">
                            <?php if ($result->konfirmasi == '0') { ?>
                              <button class="btn salmon" type="submit"> Ubah&nbsp;</button>
                              <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                            <?php } else { ?>
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
        <?php } else { ?>
          <font style="text-align: center;">
            <h4>-</h4>
          </font>
        <?php } ?>


      <?php endforeach;
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
    if ($tgl == 0) {
      $stt = '0';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      $stt = '0';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('b.tanggal_rencana', $tgl);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <div class="timeline">
          <div class="entry">
            <div class="title">
              <font style="text-align: right;">
                <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                <?php
                switch ($namahari) {
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
                <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                <h3><b><?php echo $tgl ?></b></h3>
                <p><?php echo $result->jam_rencana  ?></p>
              </font>
            </div>
            <div class="body">
              <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
              <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
              <div class="form-group">

                <?php if ($result->konfirmasi == '0') { ?>
                  <font style="background-color: yellow; color: black; padding: 5px" size="2px">
                    Belum terkonfirmasi </font>
                <?php } else { ?>
                  <font style="background-color: lightgreen; color: black; padding: 5px" size="2px">
                    Sudah terkonfirmasi</font>
                <?php } ?>
                <font size="2px"> <a href="#" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font>

                <div id="myModal<?php echo $result->id_pasien ?>" class="modal">
                  <form class="form-horizontal" action="<?php echo base_url('Booking/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" style="text-align: center;"><b>Jadwal yang akan datang</b></h4>
                        </div>
                        <div class="col-lg-12">

                          <div class="modal-body">
                            <h3 class="madal-body">
                              <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
                            </h3>
                            <?php if ($result->konfirmasi == '0') { ?>
                              <font style="background-color: yellow; color: black; padding: 5px; float: right;">
                                Belum terkonfirmasi </font>
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
                                  Sudah terkonfirmasi</font>
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
                            <?php } ?>
                          </div>

                          <input type="hidden" class="form-control" name="id_rcn" value="<?php echo $result->id_rcn ?>">
                          <input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
                          <hr>
                        </div>
                        <div class="modal-footer">
                          <?php if ($result->konfirmasi == '0') { ?>
                            <button class="btn salmon" type="submit"> Ubah&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                          <?php } else { ?>
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
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
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
    if ($id == 0) {
      $stt = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      $stt = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('a.id_pasien', $id);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '1' && $result->status == '1') { ?>
          <div class="timeline">
            <div class="entry">
              <div class="title">
                <font style="text-align: right;">
                  <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                  <?php
                  switch ($namahari) {
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
                  <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                  <h3><b><?php echo $tgl ?></b></h3>
                  <p><?php echo $result->jam_rencana  ?></p>
                </font>
              </div>
              <div class="body">
                <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                <div class="form-group">


                  <font size="2px"> <a href="#" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font>


                </div>
              </div>
            </div>
          </div>
        <?php } ?>
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
    if ($tgl == 0) {
      $stt = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    } else {
      $stt = '1';
      $this->db->select('*');
      $this->db->from('booking a');
      $this->db->join('rencana b', 'a.id_booking=b.id_booking');
      $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
      $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
      $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
      $this->db->where('a.id_user', $id_user);
      $this->db->where('b.tanggal_rencana', $tgl);
      $this->db->where('a.status', $stt);
      $this->db->order_by('b.tanggal_rencana', 'asc');
      $this->db->order_by('b.jam_rencana', 'asc');
      $data = $this->db->get('')->result();
    }
    if (!empty($data)) {
      foreach ($data as $result) : ?>
        <?php if ($result->konfirmasi == '1' && $result->status == '1') { ?>
          <div class="timeline">
            <div class="entry">
              <div class="title">
                <font style="text-align: right;">
                  <?php $namahari = date('l', strtotime($result->tanggal_rencana)); ?>
                  <?php
                  switch ($namahari) {
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
                  <?php $tgl = date('d M', strtotime($result->tanggal_rencana)); ?>
                  <h3><b><?php echo $tgl ?></b></h3>
                  <p><?php echo $result->jam_rencana  ?></p>
                </font>
              </div>
              <div class="body">
                <p><b><?php echo $result->nama_depan  ?> <?php echo $result->nama_belakang  ?> - <?php echo $result->hubungan  ?></b></p>
                <p>Pemeriksaan dengan <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></p>
                <div class="form-group">
                  <font size="2px"> <a href="#" style=" color: salmon; padding: 5px; float: right;"> Lihat/Ubah Rencana </a></font>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php endforeach;
    } else {
      ?>
      <font style="text-align: center;">
        <h4>Tidak Ada Data</h4>
      </font>
<?php
    }
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

      redirect(base_url('Pasien/data_booking/' . $id_pasien . '/' . $id_booking));
    }
  }

  public function add_pasien()
  {
    $data_pasien = array(
      'id_user' => $this->input->post('id_user'),
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
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Data Mahasiswa berhasil ditambah.
  </div>');

    redirect(site_url('Pasien/beranda'));
  }
}
