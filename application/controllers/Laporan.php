<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pemasukan_model');
		$this->load->model('pengeluaran_model');
		$this->load->model('keuangan_model');
		$this->load->model('apotik_model');
		$this->load->model('rekam_medis_model');
		$this->load->model('transaksi_model');
		if ($this->session->userdata("username") == "") {
			redirect(base_url(''));
		}
	}

	/*function laporan_pemasukan(){
		$data['_laporan_pemasukan'] = 1;
		$data['content'] = 'laporan/pemasukan';
		$this->load->view('template',$data);
	}
	
	function data_laporan_pemasukan(){
		$this->pemasukan_model->tampil();
	}*/

	// Laporan transaksi -----------------------------------------------------------------------------------------------------
	function laporan_transaksi()
	{
		$data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$data['_laporan_transaksi'] = 1;
		$data['content'] = 'laporan/transaksi';
		$this->load->view('template', $data);
	}

	function filter_laporan_transaksi($awal = NULL, $akhir = NULL)
	{
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;
		$this->load->view('laporan/transaksi_filter', $viewbag);
	}

	function data_laporan_transaksi()
	{
		//$this->transaksi_model->tampil_laporan_transaksi();
		$awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$this->transaksi_model->filter_tampil($awal, $akhir);
	}

	function data_laporan_filter_transaksi($awal, $akhir)
	{
		$this->transaksi_model->filter_tampil($awal, $akhir);
	}

	function data_laporan_filter_awal_transaksi($awal = NULL)
	{
		$this->transaksi_model->filter_tampil_awal($awal);
	}

	function data_laporan_filter_akhir_transaksi($akhir = NULL)
	{
		$this->transaksi_model->filter_tampil_akhir($akhir);
	}
	// Laporan transaksi -----------------------------------------------------------------------------------------------------







	// Laporan Pemasukan -------------------------------------------------------------------------------------------------------
	function laporan_pemasukan()
	{
		$data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$data['_laporan_pemasukan'] = 1;
		$data['content'] = 'laporan/pemasukan';
		$this->load->view('template', $data);
	}

	function filter_laporan_pemasukan($awal = NULL, $akhir = NULL)
	{
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;

		$this->load->view('laporan/pemasukan_filter', $viewbag);
	}

	// Laporan Pemasukan -------------------------------------------------------------------------------------------------------







	// Laporan Apotik -----------------------------------------------------------------------------------------------
	function laporan_apotik()
	{
		$data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$data['_laporan_pemasukan_apotik'] = 1;
		$data['content'] = 'laporan/pemasukan';
		$this->load->view('template', $data);
	}

	function filter_laporan_apotik($awal = NULL, $akhir = NULL)
	{
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;

		$this->load->view('laporan/pemasukan_filter_apotik', $viewbag);
	}

	function data_laporan_apotik()
	{
		//$this->transaksi_model->tampil_laporan_transaksi();
		$awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$this->apotik_model->filter_tampil($awal, $akhir);
	}

	function data_laporan_filter_apotik($awal, $akhir)
	{
		$this->apotik_model->filter_tampil($awal, $akhir);
	}

	function data_laporan_filter_awal_apotik($awal = NULL)
	{
		$this->apotik_model->filter_tampil_awal($awal);
	}

	function data_laporan_filter_akhir_apotik($akhir = NULL)
	{
		$this->apotik_model->filter_tampil_akhir($akhir);
	}
	// Laporan Apotik -----------------------------------------------------------------------------------------------










	// Laporan pengeluaran ---------------------------------------------------------------------------------------------------
	function laporan_pengeluaran()
	{
		$data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$data['_laporan_pengeluaran'] = 1;
		$data['content'] = 'laporan/pengeluaran';
		$this->load->view('template', $data);
	}

	function filter_laporan_pengeluaran($awal = NULL, $akhir = NULL)
	{
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;

		$this->load->view('laporan/pengeluaran_filter', $viewbag);
	}

	function data_laporan_pengeluaran()
	{
		//$this->pengeluaran_model->tampil();
		$awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));;
		echo json_encode($this->pengeluaran_model->filter_tampil($awal, $akhir));
	}

	function data_laporan_filter_pengeluaran($awal, $akhir)
	{
		echo json_encode($this->pengeluaran_model->filter_tampil($awal, $akhir));
	}

	function data_laporan_filter_awal_pengeluaran($awal = NULL)
	{
		echo json_encode($this->pengeluaran_model->filter_tampil_awal($awal));
	}

	function data_laporan_filter_akhir_pengeluaran($akhir = NULL)
	{
		echo json_encode($this->pengeluaran_model->filter_tampil_akhir($akhir));
	}

	function harga_edit_pengeluaran()
	{
		$data['jumlah'] = $this->input->post('jumlah');
		$id = $this->input->post('id');
		$this->pengeluaran_model->harga_edit_pengeluaran($data, $id);
	}
	// Laporan pengeluaran ---------------------------------------------------------------------------------------------------










	// Laporan Keuangan ------------------------------------------------------------------------------------------------------
	function laporan_keuangan()
	{
		$data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
		$data['_laporan_keuangan'] = 1;
		$data['content'] = 'laporan/keuangan';
		$this->load->view('template', $data);
	}

	function filter_laporan_keuangan($awal = NULL, $akhir = NULL)
	{
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;

		$this->load->view('laporan/keuangan_filter', $viewbag);
	}

	function data_laporan_keuangan()
	{
		//$this->pengeluaran_model->tampil();
		$awal = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$akhir = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));;
		echo json_encode($this->keuangan_model->filter_tampil($awal, $akhir));
	}

	function data_laporan_filter_keuangan($awal, $akhir)
	{
		echo json_encode($this->keuangan_model->filter_tampil($awal, $akhir));
	}

	function data_laporan_filter_awal_keuangan($awal = NULL)
	{
		echo json_encode($this->keuangan_model->filter_tampil_awal($awal));
	}

	function data_laporan_filter_akhir_keuangan($akhir = NULL)
	{
		echo json_encode($this->keuangan_model->filter_tampil_akhir($akhir));
	}

	function total_akhir_keuangan($awal = null, $akhir = null)
	{
	}

	/*---------- LAPORAN PENJUALAN OBAT ------------------------------------------*/

	function laporan_obat()
	{
		$data['awal']  = date('Y-m-d');
		$data['akhir'] = date('Y-m-d');
		$data['_laporan_obat'] = 1;
		$data['content'] = 'laporan/penjualan_obat';
		$this->load->view('template', $data);
	}

	function filter_laporan_obat($awal = NULL, $akhir = NULL)
	{
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;

		$this->load->view('laporan/penjualan_obat_filter', $viewbag);
	}

	function data_laporan_obat($awal = null, $akhir = null)
	{
		if ($awal == null) $awal = 0;
		if ($akhir == null) $akhir = 0;
		$data = $this->apotik_model->laporan_obat($awal, $akhir);




		$date = str_replace("%20", " ", $akhir);

		$index = 0;
		foreach ($data as $key) {
			//echo $key['id_obat']."<br>";
			$sisa = 0;
			$this->db->where('tgl_transaksi <=', $date);
			$this->db->where('tgl_transaksi >=', $date);
			$this->db->where('id_obat', $key['id_obat']);
			$data_sisa = $this->db->get('detail_sisa_stok_obat')->result_array();
			if (empty($data_sisa)) {
				$i = 0;
				$conditional = 0;
				while ($conditional == 0) {


					if ($i < 100) {
						$newdate = strtotime("-$i day", strtotime($date));
						$newdate = date('Y-m-d H:i:s', $newdate);
						$newdate2 = explode($newdate, " ");

						$this->db->where('tgl_transaksi <=', $newdate);
						$this->db->where('tgl_transaksi >=', $newdate2[0] . " 00:00:00");
						$this->db->where('id_obat', $key['id_obat']);
						$this->db->order_by('id_detail_sisa_stok_obat', 'DESC');
						$data_sisa2 = $this->db->get('detail_sisa_stok_obat')->row();


						if (!empty($data_sisa2)) {
							$sisa = $data_sisa2->jumlah_sisa;


							$conditional = 1;
						} else {
							$sisa = 0;
						}
					}
					if ($i > 100) {
						break;
					}
					$i++;
				}
			}

			$data[$index]['sisa_obat_per'] = $sisa;
			$index++;
		}


		echo json_encode($data);
	}

	//tambahan//

	function laporan_pemasukan_filter($awal = null, $akhir = null)
	{
		echo json_encode($this->transaksi_model->filter_tampil_SUM_Pemasukan($awal, $akhir));
	}

	function laporan_apotik_filter($awal = null, $akhir = null)
	{
		echo json_encode($this->transaksi_model->filter_tampil_SUM_Apotik($awal, $akhir));
	}

	function laporan_keuangan_filter($awal = null, $akhir = null)
	{
		echo json_encode($this->transaksi_model->filter_tampil_SUM_Keuangan($awal, $akhir));
	}
}
