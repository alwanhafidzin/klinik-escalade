<?php
 
class Informasi_pasien_model extends CI_Model
{
	
	function get_informasi($id_dokter){
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('rekam_medis c','a.id_booking=c.id_booking');
        $this->db->join('pasien d','a.id_pasien=d.id_pasien');
        $this->db->join('dokter e',' a.id_dokter=e.id_dokter');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.id_dokter', $id_dokter);
        $this->db->where_not_in('a.status', 3);
        $this->db->where_not_in('a.status', 2);
        $this->db->group_by('a.id_booking');
        $this->db->order_by('b.tanggal_rencana', 'desc');
        return $this->db->get();
	}

    function get_informasi_all(){
        $konf = '1';
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('rekam_medis c','a.id_booking=c.id_booking');
        $this->db->join('pasien d','a.id_pasien=d.id_pasien');
        $this->db->join('dokter e',' a.id_dokter=e.id_dokter');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where_not_in('a.status', 3);
        $this->db->where_not_in('a.status', 2);
        $this->db->group_by('a.id_booking');
        $this->db->order_by('b.tanggal_rencana', 'desc');
        return $this->db->get();
    }

    function get_laporan_pemeriksaan($id_dokter){
        $konf = '1';
        $this->db->select('b.tanggal_rencana,b.jam_rencana,d.nama_dokter,c.nama_depan,c.nama_belakang,c.hubungan,f.id_rekam_medis,a.status,c.id_pasien,a.id_booking,c.id_user');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e','a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
        $this->db->join('login_session g','a.id_user=g.id_user');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where('a.id_dokter', $id_dokter);
        $this->db->where_not_in('a.status', 3);
        $this->db->where_not_in('a.status', 2);
        return $this->db->get();
    }


    function get_laporan_pemeriksaan_all(){
        $konf = '1';
        $this->db->select('b.tanggal_rencana,b.jam_rencana,d.nama_dokter,c.nama_depan,c.nama_belakang,c.hubungan,f.id_rekam_medis,a.status,c.id_pasien,a.id_booking,c.id_user');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('dokter d',' a.id_dokter=d.id_dokter');
        $this->db->join('cabang e','a.id_cabang=e.id_cabang');
        $this->db->join('rekam_medis f','a.id_booking=f.id_booking');
        $this->db->join('login_session g','a.id_user=g.id_user');
        $this->db->where('a.konfirmasi', $konf);
        $this->db->where_not_in('a.status', 3);
        $this->db->where_not_in('a.status', 2);
        $this->db->order_by('b.tanggal_rencana', 'asc');
        return $this->db->get();
    }

    function get_rencana_sebelum(){
        $konf = '1';
        $this->db->select('a.tanggal_rencana');
        $this->db->distinct('a.tanggal_rencana');
        $this->db->from('rencana a');
        $this->db->join('booking b','a.id_booking=b.id_booking');
        $this->db->where('b.konfirmasi', $konf);
        $this->db->where_not_in('b.status', 3);
        $this->db->where_not_in('b.status', 2);
        $this->db->group_by('a.id_booking');
        $this->db->order_by('a.tanggal_rencana', 'desc');
        $query = $this->db->get();
        return $query;
    }

	public function show_informasi($id_pasien, $id_booking)
	{
		$this->db->select('c.no_hp,c.email,c.nama_depan,c.nama_belakang,c.jenis_kelamin,c.tanggal_lahir,c.hubungan,a.status,e.id_rekam_medis,b.tanggal_rencana,b.jam_rencana,d.nama_dokter')
            ->from('booking a')
            ->join('rencana b','a.id_booking=b.id_booking')
            ->join('pasien c','a.id_pasien=c.id_pasien')
            ->join('dokter d',' a.id_dokter=d.id_dokter')
            ->join('rekam_medis e','a.id_booking=e.id_booking')
            ->where('a.konfirmasi', 1)
            ->where('a.id_pasien' , $id_pasien)
            ->where('a.id_booking' , $id_booking)
            ->order_by('b.tanggal_rencana', 'DESC');

        return $this->db->get();

	}

	public function get_umum($id_pasien, $id_booking)
	{
		$this->db->select('*')
            ->from('booking a')
            ->join('pasien b','a.id_pasien=b.id_pasien')
            ->join('info_orang_terdekat c','a.id_pasien=c.id_pasien')
            // ->where('a.konfirmasi', 1)
            ->where('a.id_pasien' , $id_pasien)
            ->where('c.id_booking' , $id_booking)
            ->where('a.id_booking' , $id_booking);

        return $this->db->get();

	}

      function get_pasien_id($id_booking){
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('pasien b' ,'a.id_pasien=b.id_pasien','left outer');
        // $this->db->join('info_orang_terdekat c','a.id_booking=c.id_booking' ,'left outer');
        $this->db->where('a.id_booking',$id_booking);
        // $this->db->where('c.id_booking',$id_booking);
        return $this->db->get();
            // return $this->db->get_where('pasien', array('id_pasien' => $id));
    }    

    public function get_klinis($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_klinis_umum e','a.id_booking=e.id_booking');
        $this->db->join('pemeriksaan_klinis_khusus f','a.id_booking=f.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('f.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);
        return $this->db->get();

    }

    public function get_penunjang($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e','a.id_booking=e.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);

        return $this->db->get();

    }

     public function get_tanggal_pemeriksaan($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e','a.id_booking=e.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');

        return $this->db->get();

    }

    public function get_summary($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->join('pemeriksaan_penunjang e','a.id_booking=e.id_booking');
        $this->db->join('pemeriksaan_klinis_umum f','a.id_booking=f.id_booking');
        $this->db->join('pemeriksaan_klinis_khusus g','a.id_booking=g.id_booking');
        $this->db->join('dokter h','a.id_dokter=h.id_dokter');
        $this->db->join('pilih_layanan i','d.id_rekam_medis=i.id_rekam_medis');
        $this->db->join('layanan j','i.id_layanan=j.id_layanan');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('e.id_pasien', $id_pasien);
        $this->db->where('f.id_pasien', $id_pasien);
        $this->db->where('g.id_pasien', $id_pasien);
        $this->db->where('i.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        return $this->db->get();

    }    

    public function get_odontogram($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana b','a.id_booking=b.id_booking');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rekam_medis d','a.id_booking=d.id_booking');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('d.id_pasien', $id_pasien);
        $this->db->where('a.konfirmasi', 1);
        $this->db->order_by('d.tanggal_periksa', 'DESC');
        $this->db->limit(1);
        return $this->db->get();

    }

    public function get_asuransi($id_pasien, $id_booking)
    {
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('asuransi b','a.id_user=b.id_user');
        $this->db->join('pasien c','a.id_pasien=c.id_pasien');
        $this->db->join('rencana d','a.id_booking=d.id_booking');
        $this->db->join('metode_pembayaran e','e.id_metode = d.id_metode');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('a.id_booking', $id_booking);
        $this->db->where('a.konfirmasi', 1);
        return $this->db->get();

    }

    public function get_pembayaran($id_pasien, $id_booking){
        $this->db->select('*');
        $this->db->from('booking a');
        $this->db->join('rencana d','a.id_booking=d.id_booking');
        $this->db->join('metode_pembayaran e','e.id_metode = d.id_metode');
        $this->db->where('a.id_pasien', $id_pasien);
        $this->db->where('a.id_booking', $id_booking);
        $this->db->where('a.konfirmasi', 1);
        return $this->db->get();
    }
}
