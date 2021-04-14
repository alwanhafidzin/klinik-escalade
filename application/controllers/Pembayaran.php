<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	public function __construct(){	
		parent::__construct();
		if($this->session->userdata("email") == ""){
			redirect(base_url(''));
		}
		$this->load->model('pembayaran_model');
		$this->load->model('Rekam_medis_model');
		$this->load->model('layanan_model');
		$this->load->model('Data_pasien_model');
		$this->load->model('transaksi_model');
		$this->load->model('pemasukan_model');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->model('obat_model');
        $this->load->model('apotik_model');
        $this->load->model('detail_apotik_model');
        $this->load->model('pendapatan_model');
        $this->load->model('detail_obat_model');
        $this->load->model('detail_stok_obat_model');
		$this->load->model('metode_model');
		//if ($this->session->userdata('logged_in') != 'Sudah Login') redirect(base_url(''));
	}
	
	
    
    // Pembayaran klinik -----------------------------------------------------------------------------------------
	public function index(){
		$this->cart->destroy();
		$data['_pembayaran'] = 1;
		if($this->session->userdata('username') == "resepsionis")
			$data['content'] 	 = 'pembayaran/pembayaran_list';
		else
			$data['content'] 	 = 'pembayaran/pasien_list';
        $this->load->view('template',$data);
	}
	
	
    
    function data_pembayaran(){
		$this->pembayaran_model->tampil_data_pasien();
	}
	
	
    
    public function create($id) {
        /*$rekam_medis = $this->Rekam_medis_model->get_id_last();
        foreach ($rekam_medis as $a) {
            $idr = $a['id_rekam_medis'];
        }*/

        $ip 	 = $this->Rekam_medis_model->get_by_id($id);
        $layanan = $this->layanan_model->get_all();
        $row 	 = $this->Data_pasien_model->get_by_id($ip->ID_pasien);
		
        if ($row) {
            $data = array(
				//'id_rekam_medis' 				=> $idr+1,
				'layanan' 						=> $layanan,
				'ID_pasien' 					=> $row->ID_pasien,
				// 'foto' 						=> $row->foto,
				'Nama' 							=> $row->Nama,
				'Alamat' 						=> $row->Alamat,
				'Tanggal_lahir' 				=> $row->Tanggal_lahir,
				'No_hp' 						=> $row->No_hp,
				'keluhan_utama' 				=> $row->keluhan_utama,
				'riwayat_penyakit' 				=> $row->riwayat_penyakit,
				'riwayat_alergi_obat' 			=> $row->riwayat_alergi_obat,
				'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya,
				'button' 						=> 'Tambah',
				'action'	 					=> site_url('rekam_medis/create_action'),
				'id_rekam_medis' 				=> set_value('id_rekam_medis'),
				'tanggal' 						=> set_value('tanggal'),
				'nama_pasien' 					=> set_value('nama_pasien'),
				'diagnosis' 					=> $ip->diagnosis,
				'tanggal_next_control' 			=> set_value('tanggal_next_control'),
				'data_rev_bayar'				=>	$ip->total_bayar
	       );
        }
		else{
            $data = array(
				//'id_rekam_medis' 					=> $idr+1,
				'layanan' 							=> $layanan,
				'ID_pasien' 						=> $row->ID_pasien,
				// 'foto' 							=> $row->foto,
				// 'Nama'		 					=> $row->Nama,
				// 'Alamat' 						=> $row->Alamat,
				// 'Tanggal_lahir' 					=> $row->Tanggal_lahir,
				// 'No_hp' 							=> $row->No_hp,
				// 'keluhan_utama' 					=> $row->keluhan_utama,
				// 'riwayat_penyakit' 				=> $row->riwayat_penyakit,
				// 'riwayat_alergi_obat' 			=> $row->riwayat_alergi_obat,
				// 'riwayat_pengobatan_sebelumnya' 	=> $row->riwayat_pengobatan_sebelumnya,
				'button' 							=> 'Tambah',
				'action' 							=> site_url('rekam_medis/create_action'),
				'id_rekam_medis' 					=> set_value('id_rekam_medis'),
				'tanggal' 							=> set_value('tanggal'),
				'nama_pasien' 						=> set_value('nama_pasien'),
				'diagnosis' 						=> set_value('diagnosis'),
				'tanggal_next_control' 				=> set_value('tanggal_next_control')
            );
        }
		
		//Hapus data caart sebelumnya
		$this->cart->destroy();
		
        
        $data['id_rekam_medis'] = $id;
		
        // Get layanan apa saja yang dipesan
        //$data_layanan = $this->pembayaran_model->data_pembayaran($id);
		//foreach ($data_layanan as $content) {
			/*$data_cart = array(
				'id'	=> $content->'l'.id_layanan,
				'name'	=> $content->Layanan,
				'qty'	=> 1,
				'price'	=> $content->Harga
			);
			$this->cart->insert($data_cart);*/
		//}
        
        // Get obat apa saja yang dipesan
        //$data_obat = $this->detail_obat_model->get_by_id_rekam_medis($id);
        /*foreach ($data_obat as $obat){
            
        }*/
        $data['layanan_layanan'] = $this->detail_obat_model->get_by_id_rekam_medis_layanan($id);
        //$data['layanan_layanan'] = $this->pembayaran_model->data_pembayaran($id);
        $data['obat_obat'] = $this->detail_obat_model->get_by_id_rekam_medis($id);
		$data['_pembayaran'] = 1;
		$data['metodebayar'] = $this->metode_model->get_all();
		$data['content'] = 'pembayaran/pembayaran_form';
		$this->load->view('template', $data);
    }
	
	public function lihat($id) {
        /*$rekam_medis = $this->Rekam_medis_model->get_id_last();
        foreach ($rekam_medis as $a) {
            $idr = $a['id_rekam_medis'];
        }*/

        $ip 	 = $this->Rekam_medis_model->get_by_id($id);
        $layanan = $this->layanan_model->get_all();
        $row 	 = $this->Data_pasien_model->get_by_id($ip->ID_pasien);
		
        if ($row) {
            $data = array(
				//'id_rekam_medis' 				=> $idr+1,
				'layanan' 						=> $layanan,
				'ID_pasien' 					=> $row->ID_pasien,
				// 'foto' 						=> $row->foto,
				'Nama' 							=> $row->Nama,
				'Alamat' 						=> $row->Alamat,
				'Tanggal_lahir' 				=> $row->Tanggal_lahir,
				'No_hp' 						=> $row->No_hp,
				'keluhan_utama' 				=> $row->keluhan_utama,
				'riwayat_penyakit' 				=> $row->riwayat_penyakit,
				'riwayat_alergi_obat' 			=> $row->riwayat_alergi_obat,
				'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya,
				'button' 						=> 'Tambah',
				'action'	 					=> site_url('rekam_medis/create_action'),
				'id_rekam_medis' 				=> set_value('id_rekam_medis'),
				'tanggal' 						=> set_value('tanggal'),
				'nama_pasien' 					=> set_value('nama_pasien'),
				'diagnosis' 					=> $ip->diagnosis,
				'tanggal_next_control' 			=> set_value('tanggal_next_control'),
	       );
        }
		else{
            $data = array(
				//'id_rekam_medis' 					=> $idr+1,
				'layanan' 							=> $layanan,
				'ID_pasien' 						=> $row->ID_pasien,
				'button' 							=> 'Tambah',
				'action' 							=> site_url('rekam_medis/create_action'),
				'id_rekam_medis' 					=> set_value('id_rekam_medis'),
				'tanggal' 							=> set_value('tanggal'),
				'nama_pasien' 						=> set_value('nama_pasien'),
				'diagnosis' 						=> set_value('diagnosis'),
				'tanggal_next_control' 				=> set_value('tanggal_next_control')
            );
        }
		
		//Hapus data caart sebelumnya
		$this->cart->destroy();
		
        
        $data['id_rekam_medis'] = $id;
		
        $data['layanan_layanan'] = $this->pembayaran_model->data_pembayaran($id);
        $data['obat_obat'] = $this->detail_obat_model->get_by_id_rekam_medis($id);
		$data['_pembayaran'] = 1;
		$data['metodebayar'] = $this->metode_model->get_all();
		$data['content'] = 'pembayaran/pasien_form';
		$this->load->view('template', $data);
    }
	
	function data_pembayaran_detail($id){
		$this->pembayaran_model->tampil_data_pembayaran($id);
	}
	
	function data_pembayaran_layanan($id){
		echo json_encode($this->pembayaran_model->tampil_data_layanan($id));
	}
	
	function data_pembayaran_obat($id){
		echo json_encode($this->pembayaran_model->tampil_data_obat($id));
	}
	
	function del_obat($rekam,$id){
		$viewbag['id_rekam_medis'] = $rekam;
		$this->pembayaran_model->delete_obat($id);
		redirect(site_url('pembayaran'));
	}

	
	function del_layanan($rekam,$id){
		$viewbag['id_rekam_medis'] = $rekam;
		$this->pembayaran_model->delete_layanan($id);
		$this->load->view('pembayaran/tabel_pembayaran',$viewbag);
	}
    
   function simpan_pembayaran($id_rekam_medis, $total){
		// isi status, total, dan saldo tabel transaksi
		//$data_transaksi_sebelumnya = $this->transaksi_model->get_id_last();
		$data_transaksi = array(
			'status' => 1,
			'waktu'  => $this->input->post("tgl_input")." ".date('H:i:s'),
			'total'	 => $total,
			'metode_bayar' => $this->input->post('metode_pembayaran')
			//'saldo'	 => $data_transaksi_sebelumnya->saldo + $total
		);
		$this->transaksi_model->update($id_rekam_medis,$data_transaksi);
		
		
		/*$pemasukan = $this->pemasukan_model->get_by_tanggal(date('Y-m-d'));
		if ($pemasukan){
			// update tabel pemasukan jika tanggal tersebut sudah terisi
			$data_pemasukan = array(
				'total' => $pemasukan->total + $total
			);
			$this->pemasukan_model->update($pemasukan->tanggal,$data_pemasukan);
		}
		else{
			// isi tabel pemasukan jika tanggal tersebut kosong
			$data_pemasukan = array(
				'tanggal'	=> date('Y-m-d'),
				'total'		=> $total
			);
			$this->pemasukan_model->insert($data_pemasukan);
		}*/
		
		$data_rekam_medis = $this->Rekam_medis_model->get_by_id($id_rekam_medis);
		$data_pasien = $this->Data_pasien_model->get_by_id($data_rekam_medis->ID_pasien);
		
		ob_start();
		//$viewbag['layanan_layanan'] = $this->pembayaran_model->data_pembayaran($id_rekam_medis);
        $viewbag['layanan_layanan'] = $this->detail_obat_model->get_by_id_rekam_medis_layanan($id_rekam_medis);
        $viewbag['obat_obat'] = $this->detail_obat_model->get_by_id_rekam_medis($id_rekam_medis);
        
		$viewbag['nama'] 				= $data_pasien->Nama;
		$viewbag['tanggal_transaksi'] 	= date("d/m/Y H:i:s");
		$viewbag['total'] 				= $total;
		$viewbag['pembayaran'] 			= $this->input->post('pembayaran');
		$viewbag['kembalian'] 			= $viewbag['pembayaran'] - $data_rekam_medis->total_bayar;
		$viewbag['data_rev_total']		=$data_rekam_medis->total_bayar;
		$this->load->view('pembayaran/cetak', $viewbag);
		
		
		require_once('./assets/html2pdf/html2pdf.class.php');

		//array($width_in_mm,$height_in_mm)
		$html = ob_get_contents();
		$pdf = new HTML2PDF('P',array(48.26,104.14),'en', true, 'UTF-8', array(0, 0, 0, 0));
		
		$pdf->WriteHTML($html);
		ob_end_clean();
		$pdf->Output('Transaksi_klinik'.date('Y/m/d H:i:s').'.pdf', 'I');

		//$this->cart->destroy();
		//redirect(base_url('pembayaran'));
	}
	// Pembayaran klinik -----------------------------------------------------------------------------------------
	
	
	
	// Pembayaran Obat -------------------------------------------------------------------------------------------
	function pembayaran_obat(){
		$this->cart->destroy();
        $data['obat_obat'] 		  = $this->obat_model->get_all();
		$data['_pembayaran_obat'] = 1;
		$data['metodebayar'] = $this->metode_model->get_all();
        $data['content'] 	 = 'pembayaran/pembayaran_obat';
        $this->load->view('template',$data);
	}
	
    
    
    function tambah_obat($id, $harga_satuan_obat, $jumlah=1) {
        $obat = $this->obat_model->get_by_id($id);
		
		$id_cart = 0;
		$hasil = array($this->cart->contents());
		foreach ($hasil as $content) {
		 	list($d['d1'], $d['d2']) = array_pad(explode('o',$content['id']),2,null);
			$id_cart =  $d['d1'] + 1;
		}
		
        $cart_layanan = array(
            'id' 	=> $id_cart.'o'.$obat->id,
            'qty' 	=> $jumlah,
            'price' => $harga_satuan_obat,
            'name' 	=> $obat->nama
        );
        $this->cart->insert($cart_layanan);

        $this->load->view('pembayaran/pembayaran_tabel_obat');
    }
    
    
    
    function hapus_obat($rowid) {
        $jumlah_batal = $this->cart->contents()[$rowid]['qty'];
        
        $tmp_id_obat=explode("o", $this->cart->contents()[$rowid]['id']);
        $id_batal = $tmp_id_obat[1];
        
        foreach ($this->cart->contents() as $content) {
            if ($content['rowid'] == $rowid) {
                $data_cart = array(
                    'rowid' => $rowid,
                    'qty' 	=> 0
                );
                $this->cart->update($data_cart);
            }
        }
        
        $viewbag['jumlah_batal'] = $jumlah_batal;
        $viewbag['id_batal']     = $id_batal;
        $this->load->view('pembayaran/pembayaran_tabel_obat',$viewbag);
    }
    
	
    
    function data_cart_obat() {
        foreach ($this->cart->contents() as $content) {
			if (substr($content['id'],0,1) !== 'l'){
				$cart = array(
					'rowid'    => $content['rowid'],
					'id' 	   => $content['id'],
					'name' 	   => $content['name'],
					'qty' 	   => $content['qty'],
					'price'    => $content['price'],
                    'subtotal' => $content['subtotal']
				);
				$carts[] = $cart;
			}
        }
        echo json_encode($carts);
    }
    
    
    
    function simpan_pembayaran_obat(){
        // Insert tabel apotik
        $data_tgl_saat=$this->input->post('tgl_input')." ".date('H:i:s');
        $data_apotik = array(
            'waktu' => $data_tgl_saat
        );
        $this->apotik_model->insert($data_apotik);
        
        
        // Insert tabel detail_apotik
        $apotik = $this->apotik_model->get_id_last();
        foreach ($this->cart->contents() as $content){
            $tmp_id_obat=explode("o", $content['id']);
            $data_detail_apotik = array(
                'id_apotik'     => $apotik->id,
                'id_obat'       => $tmp_id_obat[1],
                'jumlah'        => $content['qty'],
                'harga_satuan'  => $content['price'],
            );
            $this->detail_apotik_model->insert($data_detail_apotik);
            
            //tampung jumlah obat yang dipesan pada variabel $temp_jumlah
            $temp_jumlah = $content['qty'];

            //cek apakah masih ada permintaan jumlah obat terpenuhi
            while ($temp_jumlah >= 0) {
                //get stok obat yang memiliki tanggal first expired
                $data_stok_obat = $this->detail_stok_obat_model->get_by_first_expired($tmp_id_obat[1]);

                //cek apakah (jumlah obat <= $data_stok_obat->jumlah)
                if ($temp_jumlah <= $data_stok_obat->jumlah){
                    //update (kurangi) stok obat pada tanggal expired tersebut
                    $data_update_detail_stok_obat = array(
                        'jumlah' => ($data_stok_obat->jumlah - $temp_jumlah)
                    );
                    $this->detail_stok_obat_model->update($data_stok_obat->id,$data_update_detail_stok_obat);

                    break;
                }
                else{
                    $temp_jumlah = $temp_jumlah - $data_stok_obat->jumlah;

                    //hapus baris dengan tanggal first expired tersebut ($data_stok_obat->id)
                    if ($temp_jumlah >= 0) $this->detail_stok_obat_model->delete($data_stok_obat->id);
                }
            }
            
            //perbaharui total stok obat tersebut pada tabel obat
            $jumlah=0;
            $detail_obat_obat = $this->detail_stok_obat_model->get_all_id_obat($tmp_id_obat[1]);
            foreach ($detail_obat_obat as $detail_obat) {
                    $jumlah = $jumlah + $detail_obat->jumlah;
            }

                // update jumlah stok obat pada tabel obat
                $data_obat = array(
                    'jumlah' => $jumlah
            );
            $this->obat_model->update($tmp_id_obat[1],$data_obat);
            $this->db->insert('detail_sisa_stok_obat', array(
            	'tgl_transaksi'=> $data_tgl_saat,
            	'id_obat'	=> $tmp_id_obat[1],
            	'jumlah_sisa'=> $jumlah,
            	'id_apotik'	=>$apotik->id
            ));
        }
        
        // Insert tabel pendapatan
        $data_pendapatan = array(
            'id_rekam_medis' => 0,
            'id_apotik'      => $apotik->id,
            'jumlah'         => $this->cart->total(),
			'metode_bayar' 	 => $this->input->post('metode_pembayaran')
        );
        $this->pendapatan_model->insert($data_pendapatan);
        
        // Cetak struk
        ob_start();
		$viewbag['tanggal_transaksi'] 	= date("d/m/Y H:i:s");
		$viewbag['total'] 				= $this->cart->total();
		$viewbag['pembayaran'] 			= $this->input->post('pembayaran');
		$viewbag['kembalian'] 			= $this->input->post('kembalian');
		$this->load->view('pembayaran/cetak_apotik', $viewbag);
		
		$html = ob_get_contents();
		ob_end_clean();

		require_once('./assets/html2pdf/html2pdf.class.php');

		//array($width_in_mm,$height_in_mm)
		$pdf = new HTML2PDF('P',array(48.26,104.14),'en', true, 'UTF-8', array(0, 0, 0, 0));
		$pdf->WriteHTML($html);
		$pdf->Output('Transaksi_apotik'.date('Y/m/d H:i:s').'.pdf', 'I');
    }
	// Pembayaran Obat -------------------------------------------------------------------------------------------
}