<?php
class Home_model extends CI_Model
{
	public $table = 'login_session';
	public $id = 'id';


	function __construct()
	{
		parent::__construct();
	}
	//ambil data mahasiswa dari database
	function get_pasien()
	{
		$query = $this->db->get('pasien');
		return $query;
	}
	function tampil()
	{
		$level = 'Pasien';
		echo json_encode($this->db->get_where('login_session', ['level' => $level])->result());
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
	function insert_login($data)
	{
		$query = $this->db->insert("login_session", $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	function get_iduser($nama_d, $tgl, $nama_b)
	{
		$this->db->where('nama_depan', $nama_d);
		$this->db->where('tanggal_lahir', $tgl);
		$this->db->where('nama_belakang', $nama_b);
		return $this->db->get('login_session')->row();
	}
	function ajax_get_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('login_session')->row();
	}

	function get_rencana_sebelum()
	{
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
		$this->db->order_by('b.tanggal_rencana', 'asc');
		$this->db->order_by('b.jam_rencana', 'asc');
		$query = $this->db->get();
		return $query;
	}
	function get_booking()
	{
		$konf = '0';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
		$this->db->where('a.konfirmasi', $konf);
		return $this->db->get();
	}

	function get_medis($id_dokter)
	{
		$konf = '1';
		$this->db->select('a.id_booking ,d.nama_depan, d.nama_belakang, b.jam_rencana, b.tanggal_rencana, d.tanggal_lahir, c.id_rekam_medis, a.status, d.id_pasien, e.nama_dokter');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('rekam_medis c', 'a.id_booking=c.id_booking');
		$this->db->join('pasien d', 'a.id_pasien=d.id_pasien');
		$this->db->join('dokter e', ' a.id_dokter=e.id_dokter');
		$this->db->where('a.konfirmasi', $konf);
		$this->db->where('a.id_dokter', $id_dokter);
		$this->db->order_by('d.id_pasien', 'DESC');
		return $this->db->get();
	}

	public function periksa_edit_status($id_pasien, $id_rekam_medis, $data)
	{
		$this->db->where('id_pasien', $id_pasien);
		$this->db->where('id_rekam_medis', $id_rekam_medis);
		$this->db->update('rekam_medis', $data);
	}

	public function add_rekam_medis($data)
	{

		$query = $this->db->insert("rekam_medis", $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	function update_booking($id, $data)
	{
		$this->db->where("id_booking", $id);
		$this->db->update("booking", $data);
	}

	function get_data_janji()
	{
		$status = '0';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
		// $this->db->join('metode_pembayaran f','b.id_metode=f.id_metode');
		$this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
		$this->db->where('e.status', $status);
		return $this->db->get();
	}

	function update_rekam_medis($id, $data)
	{
		$this->db->where("id_booking", $id);
		$this->db->update("rekam_medis", $data);
	}

	public function add_antrian($data)
	{
		$query = $this->db->insert("antrian", $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	function update_rencana($id, $data)
	{
		$this->db->where("id_rcn", $id);
		$this->db->update("rencana", $data);
	}

	function update_rencana_bayar($id, $data)
	{
		$this->db->where("id_booking", $id);
		$this->db->update("rencana", $data);
	}

	function get_data_bayar()
	{
		$status = '2';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
		// $this->db->join('metode_pembayaran f','b.id_metode=f.id_metode');
		$this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
		$this->db->where('e.status', $status);
		return $this->db->get();
	}

	public function edit_pembayaran($id_booking)
	{

		$query = $this->db->where("id_booking", $id_booking)
			->get("rencana");
		$query2 = $this->db->where("id_booking", $id_booking)
			->get("rekam_medis");

		if ($query && $query2) {
			return $query->row();
			return $query2->row();
		} else {
			return false;
		}
	}

	public function edit_pasien($id_user)
	{

		$query = $this->db->where("id_user", $id_user)
			->get("pasien");

		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}

	function get_proses_bayar($id_booking)
	{
		$status = '2';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('cabang g', 'a.id_cabang=g.id_cabang');
		$this->db->join('rekam_medis e', 'a.id_booking=e.id_booking');
		$this->db->join('metode_pembayaran f', 'b.id_metode=f.id_metode');
		$this->db->where('a.id_booking', $id_booking);
		$this->db->where('e.status', $status);
		return $this->db->get();
	}

	function get_data_user($id_user)
	{
		$this->db->select('*');
		$this->db->from('login_session');
		$this->db->where('id_user', $id_user);
		return $this->db->get();
	}

	function get_layanan($id_booking)
	{
		$status = '1';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rekam_medis b', 'a.id_booking=b.id_booking');
		$this->db->join('pilih_layanan c', 'b.id_rekam_medis=c.id_rekam_medis');
		$this->db->join('layanan d', 'c.id_layanan=d.id_layanan');
		// $this->db->where('e.status', $status);
		$this->db->where('a.id_booking', $id_booking);
		return $this->db->get();
	}

	function get_diskon()
	{
		$this->db->order_by('id_diskon', 'DESC');
		return $this->db->get('diskon')->result_array();
	}

	function get_laporan_pemeriksaan($id_dokter)
	{
		$stat1 = '3';
		$stat2 = '3';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
		$this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
		$this->db->join('login_session g', 'a.id_user=g.id_user');
		$this->db->where('a.status', $stat1);
		$this->db->where('f.status', $stat2);
		$this->db->where('a.id_dokter', $id_dokter);
		return $this->db->get();
	}

	function get_laporan_pendapatan($id_dokter = ''){
		return $this->db->query('SELECT
		tgl,IFNULL(SUM(u.grandtotal),0)AS money,nama_dokter,spesialis,DAYNAME(tgl) as hari,tanggal_periksa
	FROM
		(
		SELECT
			ADDDATE(
				(
				SELECT
					MIN(DATE(NOW() - INTERVAL 6 DAY))
				FROM
					rekam_medis
			),
			ROW -1
			) AS tgl
		FROM
			(
			SELECT
				@row := @row + 1 AS ROW
			FROM
				(
				SELECT
					0
				UNION ALL
			SELECT
				1
			UNION ALL
		SELECT
			3
		UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
			) t,
			(
			SELECT
				0
			UNION ALL
		SELECT
			1
		UNION ALL
	SELECT
		3
	UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
		) t2,
		(
	SELECT
		@row := 0
	) r
		) n
	WHERE
		n.row <=(
		SELECT
			DATEDIFF(
				MAX(DATE(NOW())),
				MIN(DATE(NOW() - INTERVAL 6 DAY))
			)
		FROM
			rekam_medis
	) + 1
	) dr
	LEFT JOIN 
	(rekam_medis u INNER JOIN rencana r ON u.id_booking=r.id_booking
	 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 AND b.id_dokter='.$id_dokter.')
	 ON
		dr.tgl = DATE(u.tanggal_periksa)
	GROUP BY
		dr.tgl
   ');
		// $this->db->select('tanggal_periksa, nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money, DAYNAME(tanggal_rencana) as hari');
		// $this->db->from('rencana');
		// $this->db->join('rekam_medis','rencana.id_booking= rekam_medis.id_booking');
		// $this->db->join('booking','booking.id_booking= rencana.id_booking');
		// $this->db->join('dokter','dokter.id_dokter= booking.id_dokter');
		// $this->db->where('rekam_medis.status',3);
		// $this->db->where('booking.status',3);
		// $this->db->group_by('rencana.tanggal_rencana');

		// if ($id_dokter){
        //     $this->db->where('booking.id_dokter', $id_dokter);
        // }

		// return $this->db->get();
	}

	function get_laporan_pendapatan_m($id_dokter = ''){
		return $this->db->query('SELECT
		tgl as startDate,IFNULL(SUM(u.grandtotal),0)AS money,DAYNAME(tgl) as hari,(tgl+INTERVAL 6 DAY) as endDate,DAYNAME(tgl+INTERVAL 6 DAY) as hari2
	FROM
		(
		SELECT
			ADDDATE(
				(
				SELECT
					MIN(CURDATE() - INTERVAL 8 WEEK)
				FROM
					rekam_medis
			),
			ROW -1
			) AS tgl
		FROM
			(
			SELECT
				@row := @row + 1 AS ROW
			FROM
				(
				SELECT
					0
				UNION ALL
			SELECT
				1
			UNION ALL
		SELECT
			3
		UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
			) t,
			(
			SELECT
				0
			UNION ALL
		SELECT
			1
		UNION ALL
	SELECT
		3
	UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
		) t2,
		(
	SELECT
		@row := 0
	) r
		) n
	WHERE
		n.row <=(
		SELECT
			DATEDIFF(
				MAX(CURDATE()),
				MIN(CURDATE() - INTERVAL 8 WEEK)
			)
		FROM
			rekam_medis
	) + 1
	) dr
	LEFT JOIN 
	(rekam_medis u INNER JOIN rencana r ON u.id_booking=r.id_booking
	 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 AND b.id_dokter='.$id_dokter.')
	 ON
		dr.tgl = DATE(u.tanggal_periksa)
	GROUP BY
		YEARWEEK(dr.tgl,1)
ORDER BY tgl ASC LIMIT 8 OFFSET 1');

		// $this->db->select('tanggal_periksa, nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money, DAYNAME(tanggal_rencana) as hari');
		// $this->db->from('rencana');
		// $this->db->join('rekam_medis','rencana.id_booking= rekam_medis.id_booking');
		// $this->db->join('booking','booking.id_booking= rencana.id_booking');
		// $this->db->join('dokter','dokter.id_dokter= booking.id_dokter');
		// $this->db->where('rekam_medis.status',3);
		// $this->db->where('booking.status',3);
		// $this->db->group_by('YEARWEEK(tanggal_periksa)');
		// // $this->db->group_by('rencana.tanggal_rencana');
		// $this->db->order_by('rencana.tanggal_rencana','ASC');
		// $this->db->limit(7);

		// if ($id_dokter){
        //     $this->db->where('booking.id_dokter', $id_dokter);
        // }

		// return $this->db->get();
	}

	function get_laporan_pendapatan_b($id_dokter = ''){
		return $this->db->query('SELECT
		t1.month as bulan,
		t1.md,t1.year as year,
		coalesce(SUM(t1.amount+t2.amount), 0) AS money
		from
		(
		  select DATE_FORMAT(a.Date,"%b") as month,
		  DATE_FORMAT(a.Date, "%Y-%m") as md,
		  0 as  amount,YEAR(a.Date) as year
		  from (
			select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
			from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		  ) a
		  where a.Date <= NOW() and a.Date >= Date_add(Now(),interval - 12 month)
		  group by md
		)t1
		left join
		(
		  SELECT DATE_FORMAT(tanggal_periksa, "%b") AS month, SUM(grandtotal) as amount ,DATE_FORMAT(tanggal_periksa, "%Y-%m") as md
		  FROM rekam_medis u
			INNER JOIN rencana r ON u.id_booking=r.id_booking
			 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 AND b.id_dokter='.$id_dokter.'
		  and tanggal_periksa <= NOW() and tanggal_periksa >= Date_add(Now(),interval - 12 month)
		  GROUP BY md
		)t2
		on t2.md = t1.md 
		group by t1.md
		order by t1.md LIMIT 12 OFFSET 1');
		// $this->db->select('MONTH(tanggal_periksa) AS bulan,tanggal_periksa, nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money, DAYNAME(tanggal_rencana) as hari');
		// $this->db->from('rencana');
		// $this->db->join('rekam_medis','rencana.id_booking= rekam_medis.id_booking');
		// $this->db->join('booking','booking.id_booking= rencana.id_booking');
		// $this->db->join('dokter','dokter.id_dokter= booking.id_dokter');
		// $this->db->where('rekam_medis.status',3);
		// $this->db->where('booking.status',3);
		// $this->db->group_by('MONTH(tanggal_periksa)');
		// // $this->db->group_by('rencana.tanggal_rencana');
		// $this->db->order_by('rencana.tanggal_rencana','ASC');
		// $this->db->limit(30);

		// if ($id_dokter){
        //     $this->db->where('booking.id_dokter', $id_dokter);
        // }

		// return $this->db->get();
	}	

	function get_laporan_pendapatan_t(){
		return $this->db->query('SELECT
		t1.year as tahun,
		t1.md,
		coalesce(SUM(t1.amount+t2.amount), 0) AS money
		from
		(
		  select DATE_FORMAT(a.Date,"%Y") as year,
		  DATE_FORMAT(a.Date, "%Y") as md,
		  0 as  amount
		  from (
			select curdate() - INTERVAL (12*(a.a + (10 * b.a) + (100 * c.a))) DAY as Date
			from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		  ) a
		  where a.Date <= NOW() and a.Date >= Date_add(Now(),interval - 12 year)
		  group by md
		)t1
		left join
		(
		  SELECT DATE_FORMAT(tanggal_periksa, "%Y") AS year, SUM(grandtotal) as amount ,DATE_FORMAT(tanggal_periksa, "%Y") as md
		  FROM rekam_medis u
			INNER JOIN rencana r ON u.id_booking=r.id_booking
			 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3
		  and tanggal_periksa <= NOW() and tanggal_periksa >= Date_add(Now(),interval - 12 year)
		  GROUP BY md
		)t2
		on t2.md = t1.md 
		group by t1.md
		order by t1.md LIMIT 12 OFFSET 1');
	}
	function get_laporan($id_dokter = '')
	{
		$stat1 = '1';
		$stat2 = '3';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
		$this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
		$this->db->join('login_session g', 'a.id_user=g.id_user');
		$this->db->where('a.status', $stat1);
		$this->db->where('f.status', $stat2);

		if ($id_dokter) {
			$this->db->where('a.id_dokter', $id_dokter);
		}

		return $this->db->get();
	}
	function get_harian()
	{
		$this->db->select('tanggal_rencana, SUM(rekam_medis.grandtotal) AS money');
		$this->db->from('rencana');
		$this->db->join('rekam_medis', 'rencana.id_booking= rekam_medis.id_booking');
		$this->db->where('rekam_medis.status', 3);
		$this->db->group_by('tanggal_rencana');
		return $this->db->query("select *,SUM(rekam_medis.grandtotal) AS money,DAYNAME(tanggal_rencana) as hari FROM rencana join rekam_medis on rencana.id_booking= rekam_medis.id_booking where rekam_medis.status = 3 GROUP BY tanggal_rencana");
	}
	function get_perdokter()
	{
		return $this->db->query("select nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money FROM rencana join rekam_medis on rencana.id_booking= rekam_medis.id_booking JOIN booking on booking.id_booking=rencana.id_booking join dokter on dokter.id_dokter = booking.id_dokter where rekam_medis.status = 3  GROUP by booking.id_dokter");
	}
}

