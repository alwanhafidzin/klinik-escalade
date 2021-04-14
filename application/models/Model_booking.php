<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_booking extends CI_Model
{

    public $table = 'booking';
    public $id = 'id_booking';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_jadwal_dokter()
    {
        $this->db->select('id_dokter');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(1, 0);
        return $this->db->get($this->table)->row();
    }

    function tampil()
    {
        $this->db->select('id_booking');
        $this->db->select('nama');
        $this->db->select('keluhan_utama');
        $this->db->select('riwayat_penyakit');
        $this->db->select('riwayat_alergi_obat');
        $this->db->select('riwayat_pengobatan_sebelumnya');
        $this->db->select('tanggal');
        $this->db->select('jam');
        echo json_encode($this->db->get($this->table)->result());
    }

    function tampil_antri()
    {
        $this->db->select('id_booking');
        $this->db->select('nama');
        $this->db->select('tanggal');
        $this->db->select('status');
        $this->db->where('status', '0');
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
        $this->db->where('data_pasien.ID_pasien', $id);
        $this->db->join('rekam_medis', 'data_pasien.ID_pasien=rekam_medis.ID_pasien');
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
        $this->db->like('id_booking', $q);
        // $this->db->or_like('foto', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('keluhan_utama', $q);
        $this->db->or_like('riwayat_penyakit', $q);
        $this->db->or_like('riwayat_alergi_obat', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('jam', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_booking', $q);
        // $this->db->or_like('foto', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('keluhan_utama', $q);
        $this->db->or_like('riwayat_penyakit', $q);
        $this->db->or_like('riwayat_alergi_obat', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('jam', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $query = $this->db->insert("booking", $data);

        if ($query) {
            return true;
        } else {
            echo "<script>alert('Pastikan data terisi semua!');history.go(-1);</script>";
        }
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

    function insert_rencana($data)
    {
        $query = $this->db->insert("rencana", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function update_pasien($id, $data)
    {
        $this->db->where("id_pasien", $id);
        $this->db->update("pasien", $data);
    }

    function update_booking($id, $data)
    {
        $this->db->where("id_booking", $id);
        $this->db->update("booking", $data);
    }

    function update_rencana($id, $data)
    {
        $this->db->where("id_rcn", $id);
        $this->db->update("rencana", $data);
    }

    function insert_orang_terdekat($data)
    {
        $query = $this->db->insert("info_orang_terdekat", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function insert_survey($data)
    {
        $query = $this->db->insert("survey", $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    // update data
    function update($id)
    {
        $query = $this->db->where("id_booking", $id)
            ->get("booking");

        if ($query) {
            return $query->row();
        } else {
            return false;
        }
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Data_pasien_model.php */
/* Location: ./application/models/Data_pasien_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-21 10:42:39 */
/* http://harviacode.com */