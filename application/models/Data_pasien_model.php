<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pasien_model extends CI_Model
{

    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_pasien($id_user)
    {
        return $this->db->get_where('pasien', array('id_user' => $id_user));
    }

    function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('login_session');
        $this->db->where('id_user', $id);
        $this->db->group_by('id_user');
        return $this->db->get();
    }

    function get_pasien_id($id_booking)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('pasien b', 'a.id_pasien=b.id_pasien', 'left outer');
        $this->db->where('a.id_booking', $id_booking);
        return $this->db->get();
    }

    function get_medis_id($id_rekam_medis)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rekam_medis b', 'a.id_booking=b.id_booking', 'left outer');
        $this->db->where('b.id_rekam_medis', $id_rekam_medis);
        return $this->db->get();
        // return $this->db->get_where('pasien', array('id_pasien' => $id));
    }

    function get_medis_pasien($id_rekam_medis, $id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('pasien b', 'a.id_pasien=b.id_pasien');
        $this->db->join('rekam_medis c', 'a.id_booking=c.id_booking', 'a.id_booking=c.id_booking');
        $this->db->join('rencana d', 'a.id_booking=d.id_booking');
        $this->db->where('c.id_rekam_medis', $id_rekam_medis);
        $this->db->where('a.id_pasien', $id_pasien);
        return $this->db->get();
        // return $this->db->get_where('pasien', array('id_pasien' => $id));
    }

    function get_cabang()
    {
        return $this->db->get('cabang');
    }

    function get_layanan()
    {
        return $this->db->get('layanan');
    }

    function get_bayar()
    {
        return $this->db->get('metode_pembayaran');
    }

    function get_cabang_dokter($id)
    {
        return $this->db->get_where('cabang', array('id_dokter' => $id));
    }

    function get_kuota($id_dokter, $hari)
    {
        return $this->db->get_where('jadwal_dokter', array('id_dokter' => $id_dokter) and array('hari' => $hari));
    }
    function get_cabang2($id_dokter)
    {
        $this->db->select('b.id_cabang,c.nama_cabang');
        $this->db->from('dokter a');
        $this->db->join('cabang_dokter b', 'a.id_dokter=b.id_dokter', 'left outer');
        $this->db->join('cabang c', 'b.id_cabang=c.id_cabang', 'left outer');
        $this->db->where('b.id_dokter', $id_dokter);
        return $this->db->get();
    }

    function get_id_last()
    {
        $this->db->select($this->id);
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(1, 0);
        return $this->db->get($this->table)->row();
    }

    function get_dokter_id($id)
    {
        $this->db->select('*');
        $this->db->from(' jadwal_dokter a');
        $this->db->join('booking b', 'a.id_dokter=b.id_dokter');
        $this->db->where('b.id_booking', $id);
        $query = $this->db->get();
        return $query;
    }

    function get_dokter_id2($id)
    {
        $this->db->select('*');
        $this->db->from('booking b', 'cabang c', 'dokter d');
        $this->db->join('dokter d', 'd.id_dokter=b.id_dokter');
        $this->db->join('cabang c', 'c.id_cabang=b.id_cabang');
        $this->db->where('b.id_booking', $id);
        $query = $this->db->get();
        return $query;
    }
    //Model untuk mendapatkan jam praktek dokter sesuai hari dan id_dokter
      function get_jam_praktek($hari,$id_dokter){
        $this->db->select('*');
        $this->db->from('jadwal_dokter');
        $this->db->where('id_dokter', $id_dokter);
        $this->db->where('hari',$hari);
        $query = $this->db->get();
        return $query;
    }
    function get_dokter_filter(){
        $this->db->select('*');
        $this->db->from('dokter');
        $query = $this->db->get();
        return $query;
    }

    public function cariOrang()
    {
        $cari = $this->input->GET('cari', TRUE);
        $c_spesialisasi = $this->input->GET('c_spesialisasi', TRUE);
        $c_cabang = $this->input->GET('c_cabang', TRUE);
        $c_hari = $this->input->GET('c_hari', TRUE);
        $c_jam = $this->input->GET('c_jam', TRUE);

        if ($c_spesialisasi == "" and $c_cabang == "" and $c_hari == "" and $c_spesialisasi == "" and $c_jam == "") {
            $data = $this->db->query("SELECT * from dokter where nama_dokter like '%$cari%'");
        } else {
            $data = $this->db->query("SELECT * FROM dokter a JOIN jadwal_dokter b on a.id_dokter = b.id_dokter JOIN cabang_dokter c ON a.id_dokter = c.id_dokter JOIN cabang d ON c.id_cabang = d.id_cabang WHERE a.nama_dokter LIKE '%$cari%' AND a.spesialis = '$c_spesialisasi' AND b.hari = '$c_hari' AND b.jam_mulai = '$c_jam' AND d.id_cabang ='$c_cabang'");
        }

        return $data->result();
    }

    function get_jadwal()
    {
        return $this->db->get('jadwal_dokter');
    }
    function get_jadwal_dokter($id_dokter)
    {
        return $this->db->get_where('jadwal_dokter', array('id_dokter' => $id_dokter));
    }

    function get_dokter()
    {
        return $this->db->get('dokter');
    }

    function get_booking($id)
    {

        $this->db->where('id_booking', $id);
        return $this->db->get('booking');
    }

    function ajax_get_pasien($id)
    {
        $this->db->where('id_pasien', $id);
        return $this->db->get('pasien')->row();
    }

    function ajax_get_cabang($id)
    {
        $this->db->where('id_cabang', $id);
        return $this->db->get('cabang')->row();
    }

    function ajax_get_dokter($id)
    {
        $this->db->where('id_dokter', $id);
        return $this->db->get('dokter')->row();
    }

    function get_rencana_sebelum($id)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b', 'a.id_booking=b.id_booking');
        $this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
        $this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
        $this->db->where('a.id_user', $id);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        $this->db->order_by('b.jam_rencana', 'asc');
        $query = $this->db->get();
        return $query;
    }

    function tampil()
    {
        $this->db->select('ID_pasien');
        $this->db->select('Nama');
        $this->db->select('Alamat');
        echo json_encode($this->db->get($this->table)->result());
    }

    function tampil_laporan_pasien()
    {
        $this->db->select('ID_pasien');
        $this->db->select('Nama');
        $this->db->select('Alamat');
        $this->db->select('Tanggal_lahir');
        $this->db->select('No_hp');
        $this->db->order_by('Nama', 'asc');
        echo json_encode($this->db->get($this->table)->result());
    }

    function tampil_laporan_pasien_detail($id)
    {
        $this->db->where('login_session.id_user', $id);
        $this->db->join('rekam_medis', 'login_session.id_user=rekam_medis.id_user');
        echo json_encode($this->db->get($this->table)->result());
    }

    function tampil_laporan_pasien_awal($awal, $id_pasien)
    {
        $this->db->where('tanggal >=', $awal);
        $this->db->where('ID_pasien', $id_pasien);
        //$this->db->join('rekam_medis', 'data_pasien.ID_pasien=rekam_medis.ID_pasien');
        echo json_encode($this->db->get('rekam_medis')->result());
    }

    function tampil_laporan_pasien_akhir($akhir, $id_pasien)
    {
        $this->db->where('tanggal <=', $akhir);
        $this->db->where('ID_pasien', $id_pasien);
        //$this->db->join('rekam_medis', 'data_pasien.ID_pasien=rekam_medis.ID_pasien');
        echo json_encode($this->db->get('rekam_medis')->result());
    }

    function tampil_laporan_pasien_filter($awal, $akhir, $id_pasien)
    {
        if ($akhir == 0) $akhir = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
        $this->db->where("tanggal >= '$awal' AND tanggal <= '$akhir' AND ID_pasien = $id_pasien");
        //$this->db->where('ID_pasien', $id);
        //$this->db->join('rekam_medis', 'data_pasien.ID_pasien=rekam_medis.ID_pasien');
        //echo json_encode($this->db->get('rekam_medis')->result());
        $result = $this->db->get('rekam_medis')->result();
        foreach ($result as $row) {
        }
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('ID_pasien', $q);
        // $this->db->or_like('foto', $q);
        $this->db->or_like('Nama', $q);
        $this->db->or_like('Alamat', $q);
        $this->db->or_like('Tanggal_lahir', $q);
        $this->db->or_like('No_hp', $q);
        $this->db->or_like('keluhan_utama', $q);
        $this->db->or_like('riwayat_penyakit', $q);
        $this->db->or_like('riwayat_alergi_obat', $q);
        $this->db->or_like('riwayat_pengobatan_sebelumnya', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_pasien', $q);
        // $this->db->or_like('foto', $q);
        $this->db->or_like('Nama', $q);
        $this->db->or_like('Alamat', $q);
        $this->db->or_like('Tanggal_lahir', $q);
        $this->db->or_like('No_hp', $q);
        $this->db->or_like('keluhan_utama', $q);
        $this->db->or_like('riwayat_penyakit', $q);
        $this->db->or_like('riwayat_alergi_obat', $q);
        $this->db->or_like('riwayat_pengobatan_sebelumnya', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $query = $this->db->insert("pasien", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function insert_pasien($data)
    {
        $query = $this->db->insert("pasien", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
