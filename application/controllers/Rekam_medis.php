<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekam_medis extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata("email") == ""){
			redirect(base_url(''));
		}
        $this->load->model('antrian_model');
        $this->load->model('admin');
        $this->load->model('model_booking');
        $this->load->model('layanan_model');
        $this->load->model('detail_layanan_model');
        $this->load->model('Data_pasien_model');
        $this->load->model('Rekam_medis_model');
        $this->load->model('transaksi_model');
        $this->load->model('pembayaran_model');
		$this->load->model('obat_model');
        $this->load->model('detail_obat_model');
        $this->load->model('detail_stok_obat_model');
        $this->load->library('form_validation');

        $this->load->model('data_admin_model');
        // if ($this->session->userdata('logged_in') != 'Sudah Login')
        //     redirect(base_url(''));
        // if($this->session->userdata("username") == ""){
		// 	redirect(base_url(''));
		// }
    }

    public function index() {
        $data['survey'] = $this->data_admin_model->get_survey(); // ambil data dari model
        $data['_rekam_medis'] = 1;
        $data['content'] = 'rekam_medis/rekam_medis_pilih';
        $this->load->view('template_dokter', $data);
    }

    function data_pasien_rekam_medis() {
        $this->Rekam_medis_model->tampil_pasien();
    }

    public function read($id) {
        $row = $this->Rekam_medis_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_rekam_medis' => $row->id_rekam_medis,
                'tanggal' => $row->tanggal,
                'nama_pasien' => $row->nama_pasien,
                'diagnosis' => $row->diagnosis,
                'tanggal_next_control' => $row->tanggal_next_control,
            );
            $data['_rekam_medis'] = 1;
            $data['content'] = 'rekam_medis/rekam_medis_read';
            $this->load->view('template_dokter', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekam_medis'));
        }
    }

    function coba() {
        //$antrian = $this->antrian_model->get_by_id(4);
        //echo $antrian->id_rekam_medis;
        //echo date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
        //echo '<br />'.date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
        //echo $this->pembayaran_model->tampil_data_pembayaran(11);
        //echo $this->detail_obat_model->get_by_id_rekam_medis(28);
        //echo json_encode($this->detail_stok_obat_model->get_by_first_expired(6));
        echo json_encode($this->cart->contents());
    }

    // Tambah layanan -----------------------------------------------------------------------------------------
    function tambah_layanan($id, $biaya_layanan) {
        $layanan = $this->layanan_model->get_by_id($id);

        $cart_layanan = array(
            'id' 	=> 'l'.$layanan->id_layanan,
            'qty' 	=> 1,
            'price' => $biaya_layanan,
            'name' 	=> $layanan->Layanan
        );
        $this->cart->insert($cart_layanan);

        if ($this->cart->contents() != NULL) {
            foreach ($this->cart->contents() as $content) {
				//cek apakah cart tersebut cart layanan
				// if .... {
					$data_cart = array(
						'rowid' => $content['rowid'],
						'qty' 	=> 1
					);
					$this->cart->update($data_cart);
				//}
            }
        }

        $this->load->view('rekam_medis/rekam_medis_tabel_layanan');
    }

    function hapus_layanan($rowid) {
        foreach ($this->cart->contents() as $content) {
            if ($content['rowid'] == $rowid) {
                $data_cart = array(
                    'rowid' => $rowid,
                    'qty' 	=> 0
                );
                $this->cart->update($data_cart);
            }
        }

        $this->load->view('rekam_medis/rekam_medis_tabel_layanan');
    }
	function data_cart_layanan() {
        foreach ($this->cart->contents() as $content) {
			if (substr($content['id'],0,1) == 'l'){
				$cart = array(
					'rowid'    => $content['rowid'],
					'id' 	   => $content['id'],
					'name' 	   => $content['name'],
					'qty' 	   => $content['qty'],
					'subtotal' => $content['subtotal']
				);
				$carts[] = $cart;
			}
        }
        echo json_encode($carts);
    }
	// Tambah layanan -----------------------------------------------------------------------------------------
	
	
	// Tambah obat --------------------------------------------------------------------------------------------
	function tambah_obat($id, $harga_satuan_obat, $jumlah=1) {
        $obat = $this->obat_model->get_by_id($id);
		
		$id_cart = 1;
        $hasil = array($this->cart->contents());
		foreach ($hasil as $content) {
			$posisi=strpos($content['id_user'],"o");
			if($posisi){
				list($d['d1'], $d['d2']) = explode("o",$content['id']);
				$id_cart =  $d['d1'] + 1;
			}
		}
			
		$cart_layanan = array(
			'id' 	=> $id_cart.'o'.$obat->id,
			'qty' 	=> $jumlah,
			'price' => $harga_satuan_obat,
			'name' 	=> $obat->nama
		);
			
		$this->cart->insert($cart_layanan);

        /*if ($this->cart->contents() != NULL) {
            foreach ($this->cart->contents() as $content) {
                $data_cart = array(
                    'rowid' => $content['rowid'],
                    'qty' 	=> 1
                );
                $this->cart->update($data_cart);
            }
        }*/

        $this->load->view('rekam_medis/rekam_medis_tabel_obat');
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
        //echo $jumlah_batal;
        /*echo '<script>
                $(document).ready(function(){
                    var stok = $("$stok").val('.$jumlah_batal.');
                });
              </script>';*/
        $viewbag['jumlah_batal'] = $jumlah_batal;
        $viewbag['id_batal']     = $id_batal;
        $this->load->view('rekam_medis/rekam_medis_tabel_obat',$viewbag);
        //$this->set_output($show);
    }
    
    
	function data_cart_obat() {
        foreach ($this->cart->contents() as $content) {
			if (substr($content['id'],0,1) !== 'l'){
				$cart = array(
					'rowid'    => $content['rowid'],
					'id' 	   => $content['id'],
					'name' 	   => $content['name'],
					'qty' 	   => $content['qty'],
					'price'    => $content['price']
				);
				$carts[] = $cart;
			}
        }
        echo json_encode($carts);
    }
	// Tambah obat --------------------------------------------------------------------------------------------
	

    function simpan_rekam_medis($id, $id_rekam_medis) {
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $layanan = $this->layanan_model->get_all();
            $row     = $this->model_booking->get_by_id($id);
            $row2     = $this->admin->get_by_id($id);

            if ($row) {
                $data = array(
                    'layanan'                       => $layanan,
                    'id_booking'                     => $row->id_booking,
                    'id_user'                     => $row->id_user,
                    // 'foto' => $row->foto,
                    'nama'                          => $row->nama,
                    'alamat'                        => $row2->alamat,
                    'tanggal_lahir'                 => $row2->tanggal_lahir,
                    'no_hp'                         => $row2->no_hp,
                    'keluhan_utama'                 => $row->keluhan_utama,
                    'riwayat_penyakit'              => $row->riwayat_penyakit,
                    'riwayat_alergi_obat'           => $row->riwayat_alergi_obat,
                    'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya
                );
            }

            $rekam_medis = $this->Rekam_medis_model->get_by_id($id_rekam_medis);
            
            $data['layanan_layanan'] = $this->layanan_model->get_all();
            $data['id_booking']       = $id;
            $data['id_rekam_medis']  = $id_rekam_medis;
            $data['keluhan_utama']   = $rekam_medis->keluhan_utama;
            $data['obat_obat']       = $this->obat_model->get_all();
            
            $data['_rekam_medis']    = 1;
            $data['content'] = 'rekam_medis/rekam_medis_form';
            $this->load->view('template_dokter', $data);
        } 
        else {
            list($d['d1'], $d['d2'], $d['d3'], $d['d4'], $d['d5'], $d['d6'], $d['d7']) = explode("/", $this->input->post('foto'));
            $jml_ft_ex=count(explode("/", $this->input->post('foto')));
            $data_untuk_foto=explode("/", $this->input->post('foto'));
            $index_foto=$jml_ft_ex-1;
            $url_foto=$data_untuk_foto[$index_foto];

            //$url_foto = $d['d7'];
            //update tabel rekam_medis
            $data_rekam_medis = array(
                'id_booking'            => $id,
                'id_user'            => $this->id_user,
                'tanggal'              => $this->input->post('tgl_saat')." ".date('H:i:s'),
                'foto'                 => $url_foto,
                'keluhan_utama'        => $this->input->post('keluhan_utama'),
                'diagnosis'            => $this->input->post('diagnosa'),
                'resep'                => $this->input->post('resep'),
                'tanggal_next_control' => $this->input->post('tanggal_kontrol_selanjutnya'),
                'total_bayar'          => $this->cart->total()
            );
            $this->Rekam_medis_model->update($id_rekam_medis, $data_rekam_medis);

            //insert tabel detail_layanan
            foreach ($this->cart->contents() as $content) {
                if (substr($content['id'],0,1) == 'l'){
                    $data_detail_layanan = array(
                        'id_rekam_medis' => $id_rekam_medis,
                        'id_layanan'     => substr($content['id'],1),
                        'harga_layanan'  => $content['subtotal']
                    );
                    $this->detail_layanan_model->insert($data_detail_layanan);
                }
            }



            //Insert tabel detail_obat
            foreach ($this->cart->contents() as $content) {
                if (substr($content['id'],0,1) !== 'l'){
                    $tmp_id_obat=explode("o", $content['id']);
                    $data_detail_obat = array(
                        'id_rekam_medis'        => $id_rekam_medis,
                        'id_obat'               => $tmp_id_obat[1],
                        'harga_satuan_obat'     => $content['price'],
                        'jumlah'                => $content['qty'],
                    );
                    $this->detail_obat_model->insert($data_detail_obat);
            
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
                        'tgl_transaksi'=> $this->input->post('tgl_saat')." ".date('H:i:s'),
                        'id_obat'   => $tmp_id_obat[1],
                        'jumlah_sisa'=> $jumlah,
                     
                    ));
                }
            }
            
            
            
            
            //insert tabel transaksi
            $data_transaksi = array(
                'id_rekam_medis' => $id_rekam_medis,
                'status'         => 0
            );
            $this->transaksi_model->insert($data_transaksi);

            //delete antrian berdasarkan id pasien
            $this->model_booking->delete($id);

            $this->cart->destroy();
            redirect(base_url('rekam_medis'));
        }
    }
    public function create($id) {
        $this->cart->destroy();

        
        /* $id_rekam_medis = $this->Rekam_medis_model->get_id_last();

          foreach ($id_rekam_medis as $a) {
          $idr = $a['id_rekam_medis'];
          } */
        $layanan = $this->layanan_model->get_all();
        $row 	 = $this->model_booking->get_by_id($id);
        $row2     = $this->admin->get_by_id($row->id_user);

        if ($row) {
            $data = array(
                //'id_rekam_medis' 				=> $idr+1,
                'layanan' 						=> $layanan,
                'id_booking' 					=> $row->id_user,
                // 'foto' => $row->foto,
                'nama' 							=> $row->nama,
                'alamat' 						=> $row2->alamat,
                'tanggal_lahir' 				=> $row2->tanggal_lahir,
                'email'                         => $row2->email,
                'no_hp' 						=> $row2->no_hp,
                'keluhan_utama' 				=> $row->keluhan_utama,
                'riwayat_penyakit' 				=> $row->riwayat_penyakit,
                'riwayat_alergi_obat' 			=> $row->riwayat_alergi_obat,
                'riwayat_pengobatan_sebelumnya' => $row->riwayat_pengobatan_sebelumnya/* ,
                      'button' 						=> 'Tambah',
                      //'action' 						=> site_url('rekam_medis/create_action'),
                      'id_rekam_medis' 				=> set_value('id_rekam_medis'),
                      'tanggal' 						=> set_value('tanggal'),
                      'nama_pasien' 					=> set_value('nama_pasien'),
                      'diagnosis' 					=> set_value('diagnosis'),
                      'tanggal_next_control' 			=> set_value('tanggal_next_control'), */
            );
        }

        $antrian = $this->antrian_model->get_by_id_pasien($id);
        $rekam_medis = $this->Rekam_medis_model->get_by_id($antrian->id_rekam_medis);

        $data['for_dokter_obat']=$this->obat_model->tampil_result();

		$data['id_booking']		 = $id;
        $data['id_rekam_medis']  = $antrian->id_rekam_medis;
        $data['keluhan_utama']   = $rekam_medis->keluhan_utama;
        $data['layanan_layanan'] = $this->layanan_model->get_all();
        $data['obat_obat'] 		 = $this->obat_model->get_all();
        

        $data['_rekam_medis'] = 1;
        $data['content'] 	  = 'rekam_medis/rekam_medis_form';
        $this->load->view('template_dokter', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal', TRUE),
                'nama_pasien' => $this->input->post('nama_pasien', TRUE),
                'diagnosis' => $this->input->post('diagnosis', TRUE),
                'tanggal_next_control' => $this->input->post('tanggal_next_control', TRUE),
            );

            $this->Rekam_medis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rekam_medis'));
        }
    }

    public function update($id) {
        $row = $this->Rekam_medis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('rekam_medis/update_action'),
                'id_rekam_medis' => set_value('id_rekam_medis', $row->id_rekam_medis),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
                'diagnosis' => set_value('diagnosis', $row->diagnosis),
                'tanggal_next_control' => set_value('tanggal_next_control', $row->tanggal_next_control),
            );

            $data['_rekam_medis'] = 1;
            $data['content'] = 'rekam_medis/rekam_medis_form';
            $this->load->view('template_dokter', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekam_medis'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rekam_medis', TRUE));
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal', TRUE),
                'nama_pasien' => $this->input->post('nama_pasien', TRUE),
                'diagnosis' => $this->input->post('diagnosis', TRUE),
                'tanggal_next_control' => $this->input->post('tanggal_next_control', TRUE),
            );

            $this->Rekam_medis_model->update($this->input->post('id_rekam_medis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rekam_medis'));
        }
    }

    public function delete($id) {
        $row = $this->Rekam_medis_model->get_by_id($id);

        if ($row) {
            $this->Rekam_medis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rekam_medis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekam_medis'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
        $this->form_validation->set_rules('diagnosis', 'diagnosis', 'trim|required');
        $this->form_validation->set_rules('tanggal_next_control', 'tanggal next control', 'trim|required');
        $this->form_validation->set_rules('id_rekam_medis', 'id_rekam_medis', 'trim');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function insert_detail_layanan($value = '') {
        # code...
    }

    public function get_layanan() {
        // $id_rekam_medis = $this->Rekam_medis_model->get_id_last();
        // foreach ($id_rekam_medis as $a) {
        //     $id = $a;
        // }
        $layanan = $this->layanan_model->get_all();
        // echo json_encode($data);
        $row = array('layanan' => $layanan);
        $this->load->view('detail_layanan/detail_layanan_form', $row);
    }

    public function get_content_get() {
        // $id_rekam_medis = $this->Rekam_medis_model->get_id_last();
        // foreach ($id_rekam_medis as $a) {
        //     $id = $a;
        // }
        $detail_layanan = $this->detail_layanan_model->getshow(3);
        // echo json_encode($data);
        $row = array('detail_layanan' => $detail_layanan);
        $this->load->view('rekam_medis/hasil_detail_layanan', $row);
    }

    public function get_harga() {
        $ajax = $this->input->get("keyword");
        $data = $this->layanan_model->getharga($ajax);
        //echo json_encode($data);

        $row = array('data' => $data);
        foreach ($row as $r) {
            echo $r['Harga'];
        }
        // $this->load->view('mhs/hasil_ajax',$row);
    }

    // Laporan rekam medis -----------------------------------------------------------------------------------
    function laporan_rekam_medis() {
        $data['_laporan_rekam_medis'] = 1;
        $data['content'] = 'rekam_medis/laporan_rekam_medis';		
        $this->load->view('template_dokter', $data);
    }

    function data_laporan_rekam_medis() {
        $this->Data_pasien_model->tampil_laporan_pasien();
    }

    function laporan_rekam_medis_detail($id) {
        $data_pasien = $this->model_booking->get_by_id($id);
		$data['awal']  = date('Y-m-d', strtotime('+0 days', strtotime(date('Y-m'))));
		$data['akhir'] = date('Y-m-d', strtotime('+1 months -1 days', strtotime(date('Y-m'))));
        $data['nama'] = $data_pasien->Nama;
        $data['id_user'] = $id;
        $data['_laporan_rekam_medis'] = 1;
        $data['content'] = 'rekam_medis/laporan_rekam_medis_detail';
        $this->load->view('template_dokter', $data);
    }
	
	function filter_rekam_medis($id_pasien,$awal=NULL,$akhir=NULL){
		$viewbag['awal']  = $awal;
		$viewbag['akhir'] = $akhir;
		$viewbag['id_pasien'] = $id_pasien;
		$this->load->view('rekam_medis/laporan_rekam_medis_filter',$viewbag);
	}

    function data_laporan_rekam_medis_detail($id) {
        $this->Data_pasien_model->tampil_laporan_pasien_detail($id);
    }
	
	function data_laporan_filter_awal($awal=NULL,$id_pasien){
		$this->Data_pasien_model->tampil_laporan_pasien_awal($id_pasien,$awal);
	}
	
	function data_laporan_filter_akhir($akhir=NULL,$id_pasien){
		$this->Data_pasien_model->tampil_laporan_pasien_akhir($id_pasien,$akhir);
	}
	
	function data_laporan_filter($awal,$akhir,$id_pasien){
		$this->Data_pasien_model->tampil_laporan_pasien_filter($id_pasien,$awal,$akhir);
	}

    // Laporan rekam medis -----------------------------------------------------------------------------------
}

/* End of file Rekam_medis.php */
/* Location: ./application/controllers/Rekam_medis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-07-29 06:09:49 */
/* http://harviacode.com */