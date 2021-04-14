
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('rekam_medis/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pasien Periksa</li>
					<li class="active">Tambah Rekam Medis</li>
				</ol>
			</div><!--/.row-->
        
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Tambah Rekam Medis Baru</h1>
				</div>
			</div><!--/.row-->
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-heading">Data Pasien</div>
							<div class="panel-body">
								<table class="table">
									<tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
									<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
									<tr><td>Tanggal Lahir</td><td id="tgl_lhr"><?php echo $tanggal_lahir; ?></td></tr>
									<tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
									<tr><td>Riwayat Penyakit</td><td><?php echo $riwayat_penyakit; ?></td></tr>
									<tr><td>Riwayat Alergi Obat</td><td><?php echo $riwayat_alergi_obat; ?></td></tr>
									<tr><td>Riwayat Pengobatan Sebelumnya</td><td><?php echo $riwayat_pengobatan_sebelumnya; ?></label></td></tr>
								</table>
								<br />
								<br />
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-heading">Data Rekam Medis</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="modal-body">
											<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_rekam_medis_detail/'.$id_booking);?>" 
												   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" 
												   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal" data-sort-order="desc">
												<thead>
													<tr>
														<th data-formatter="runningFormatter" data-align="right">No.</th>
														<th data-field="tanggal" data-formatter="waktu" data-sortable="true">Tanggal</th>
														<th data-field="keluhan_utama" data-sortable="true">Keluhan</th>
														<th data-field="diagnosis" data-sortable="true">Diagnosis</th>
														<th data-field="resep" data-sortable="true">Resep</th>
														<th data-field="foto" data-align="center" data-formatter="show_image"  >Foto</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<form action="<?php echo base_url('rekam_medis/simpan_rekam_medis/'.$id_booking.'/'.$id_rekam_medis);?>" method="post">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="panel-heading">Form Rekam Medis</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<?php echo form_error('keluhan_utama');?>
												<label>Keluhan</label>
												<input type="text" class="form-control" name="keluhan_utama" value="<?php if ($this->input->post('keluhan_utama') !== null) echo $this->input->post('keluhan_utama'); else echo $keluhan_utama;?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Diagnosa</label>
												<?php echo form_error('diagnosa');?>
												<input type="text" required=""class="form-control" name="diagnosa"  value="<?php echo $this->input->post('diagnosa');?>" />
											</div>
											<div class="form-group">
												<label for="varchar">Resep</label>
												<?php echo form_error('resep');?>
												<textarea required="" class="form-control" name="resep" rows="3"><?php echo $this->input->post('resep');?></textarea>
											</div>
											<div class="form-group">
												<label for="varchar">Tanggal kontrol selanjutyna</label>
												<?php echo form_error('tanggal_kontrol_selanjutnya');?>
												<input type="text" id="tgl_plug" class="form-control" name="tanggal_kontrol_selanjutnya" value="<?php echo $this->input->post('tanggal_kontrol_selanjutnya');?>" />
											</div>
										</div>
										<div class="col-md-6">
											<script src="<?php echo base_url('camera/js/webcam.js');?>"></script>
											<script language="JavaScript">
												webcam.set_swf_url( '<?php echo base_url();?>camera/webcam.swf' );
												webcam.set_api_url( '<?php echo base_url();?>camera/capture.php' );
												webcam.set_quality( 100 ); // JPEG quality (1 - 100)
												webcam.set_shutter_sound( true ); // play shutter click sound
											</script>
											<!-- Next, write the movie to the page at 320x240 -->
											<center>
												<script language="JavaScript">
													document.write( webcam.get_html(220,300) );
												</script>

												<!-- Some buttons for controlling things -->
												<br/>
												<form>
													<br>
													<input type="button" class="btn btn-default" value="Konfigurasi" onClick="webcam.configure()">
													&nbsp;&nbsp;
													<input type="button" class="btn btn-primary" id="ambil_photo" value="Ambil Foto" onClick="take_snapshot()">
													</form>
											</center>

											<script language="JavaScript">
												webcam.set_hook( 'onComplete', 'my_completion_handler' );
												function take_snapshot() {
														// take snapshot and upload to server
													document.getElementById('upload_results').innerHTML = '<p>Menyimpan foto ...</p>';
													webcam.snap();
												}

												function my_completion_handler(msg) {
													// extract URL out of PHP output
													if (msg.match(/(http\:\/\/\S+)/)) {
														var image_url = RegExp.$1;
														// show JPEG image in page

														document.getElementById('upload_results').innerHTML = 
															'<img src="' + image_url + '" border="5">'+
															'<input type="hidden" name="foto" id="foto" value="'+image_url+'" size="65" readonly="readonly">'+
															'</br>'+image_url;
														// reset camera for another shot
														webcam.reset();
													}
													else alert("PHP Error: " + image_url);
												}
											</script>
											<br>
											<div class="form-group" align="center">
												<div id="upload_results"></div>
												<div id="print_area"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="panel-body">
									<div class="row">
										<br />
										<div class="col-xs-6">
											<div class="form-group">
												<label>Layanan</label>
												<select class="form-control" name="layanan" id="pilih_layanan">
													<option>- Tidak -</option>
													<?php foreach($layanan_layanan as $layanan):?>
													<option value="<?php echo $layanan['id_layanan'];?>" biaya="<?php echo $layanan['Harga'];?>"><?php echo $layanan['Layanan'];?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="form-group">
												<label>Biaya Layanan</label>
												<?php echo form_error('Biaya_layanan');?>
												<div class="input-group">
													<div class="input-group-addon">Rp</div>
													<input  class="form-control numeric" placeholder="0" maxlength="120" name="biaya_layanan" id="biaya_layanan" style="text-align:right;" />
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="form-group">
												<label>Obat</label>
												<select class="form-control" name="obat" id="pilih_obat">
													<option stok="0">- Tidak -</option>
													<?php foreach($obat_obat as $obat):?>
													<option id_obat="<?php echo $obat['id'];?>" value="<?php echo $obat['id'];?>" harga_satuan="<?php echo $obat['harga_satuan'];?>" stok="<?php echo $obat['jumlah'];?>"><?php echo $obat['nama'];?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="form-group">
												<label>Harga Satuan Obat</label>
												<?php echo form_error('harga_satuan');?>
												<div class="input-group">
													<div class="input-group-addon">Rp</div>
													<input  class="form-control numeric" placeholder="0" maxlength="120" name="harga_satuan" id="harga_satuan" style="text-align:right;" />
												</div>
											</div>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="form-group">
                                                        <label>Stok</label>
                                                        <div id="text_stok">
                                                            <input class="form-control numeric" readonly id="stok" placeholder="0" style="text-align:right;" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-8">
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <?php echo form_error('jumlah');?>
                                                        <input class="form-control numeric" placeholder="0" maxlength="120" name="jumlah" id="jumlah" style="text-align:right;" />
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</div>

									<br />

									<div class="row">
										<div class="col-xs-6">
										<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_layanan_dokter">
  Data Layanan
</button>
											<button type="button" class="btn btn-primary pull-right" id="btn_tambah_layanan">Tambahkan</button>
											<br />
											<br />
											<br />
											<div id="tabel_daftar_layanan">
												<div class="table-responsive">
													<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_cart_layanan');?>" data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
														<thead>
															<tr>
																<th data-formatter="runningFormatter" data-align="right">No.</th>
																<th data-field="name" data-sortable="true">Layanan</th>
																<th data-field="qty"s>Qty</th>
																<th data-field="subtotal" data-sortable="true" data-formatter="rupiah">Biaya</th>
																<th data-field="rowid" data-formatter="batal" data-align="center">Batalkan</th>
															</tr>
														</thead>
													</table>
													
												</div>
											</div>
										</div>
										<div class="col-xs-6">
											<button type="button" disabled class="btn btn-primary pull-right" id="btn_tambah_obat">Tambahkan</button>




<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1234">
  Data Obat
</button>












											<br />
											<br />
											<br />
											<div id="tabel_daftar_obat">
												<div class="table-responsive">
													<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_cart_obat');?>" data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
														<thead>
															<tr>
																<th data-formatter="runningFormatter" data-align="right">No.</th>
																<th data-field="name" data-sortable="true">Obat</th>
																<th data-field="qty">Jumlah</th>
																<th data-field="price" data-sortable="true" data-formatter="rupiah">Harga satuan</th>
																<th data-field="rowid" data-formatter="batalObat" data-align="center">Batalkan</th>
															</tr>
														</thead>
													</table>
													
												</div>
											</div>
										</div>
									</div>

									<br />
									<br />
									<br />
									<div class="col-xs-12">
									<div class="col-md-6 pull-right" >
										<label>Tanggal</label>
										<input type="text" id="tgl_saat" class="form-control" name="tgl_saat" style="background-color: #fff; cursor:text" required="" >
										<br>
										<button type="submit" class="btn btn-danger pull-right" id="cetak">Selesai dan Simpan</button>
									</div>
									</div>
									<br />
									<br />
									<br />
								</div>
							</div>
						</div>
					</div><!-- /.col-->
				</div><!-- /.row -->
			</form>
		</div><!--/.main-->












				<style type="text/css">
			/* Style the Image Used to Trigger the Modal */
			#myImg {
			    border-radius: 5px;
			    cursor: pointer;
			    transition: 0.3s;
			}

			

		</style>



	


		<!-- Modal -->
<div class="modal fade" id="myModal_for_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <center>
  	<img  id="img01" class="img-responsive" style="width:100%">
  </center>
  
    
  </div>
</div>




		<script>
			$(function() {
				$( "#tgl_lhr" ).datepicker();
			});
			$(document).ready(function(){
				$("#upload_results").hide();
				$("#simpan").hide();

				$("#ambil_photo").click(function(){
					$("#upload_results").show(500);
					$("#simpan").show(500);
					$("#print_area").hide();
				});   

				$("#tgl_lhr").html(tanggal('<?php echo $Tanggal_lahir; ?>'));
                $("#stok").val(0);
			});     
		</script>   
		<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script> -->
		<!-- detail layanan -->

		<script type="text/javascript">
            function runningFormatter(value, row, index) {
                return index+1;
            }
			function batal(value){
                return '<button type="button" onclick="updateCart(' + "'" +value+ "'" + ')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Batal</button>';
            }
			function updateCart(rowid){
                $("#tabel_daftar_layanan").load("<?php echo base_url('rekam_medis/hapus_layanan');?>" + "/" + rowid);
			}
            function batalObat(value){
                return '<button type="button" onclick="updateCartObat(' + "'" +value+ "'" + ')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Batal</button>';
            }
            function updateCartObat(rowid){
                $("#tabel_daftar_obat").load("<?php echo base_url('rekam_medis/hapus_obat');?>" +  "/" + rowid);
            }
			$("#pilih_layanan").change(function () {
				var id 			 = $(this).find("option:selected").attr('value');
				var biayaLayanan = $(this).find("option:selected").attr('biaya');
				$('#biaya_layanan').val(biayaLayanan);
			});
			$("#pilih_obat").change(function () {
				var id 			 = $(this).find("option:selected").attr('id_obat');
				var hargaSatuan  = $(this).find("option:selected").attr('harga_satuan');
				var stok         = $(this).find("option:selected").attr('stok');
				$('#harga_satuan').val(hargaSatuan);
				$('#stok').val(stok);
                if (parseInt(stok) > 0){
                    $("#jumlah").val(null);
                }
                else{
                    $("#jumlah").val(null);
                }
                
                if (stok < 1){
                    $("#btn_tambah_obat").attr('disabled', true);
                }
                else{
                    $("#btn_tambah_obat").attr('disabled', false);
                }
			});
            $("#jumlah").keyup(function(){
                var jumlah = $("#jumlah").val();
                var stok   = $("#stok").val();
                console.log(stok + ' ' + jumlah);
                if (parseInt(stok) < parseInt(jumlah)){
                    $("#jumlah").val(parseInt(stok));
                    //console.log(parseInt(stok - jumlah));
                    //$("#stok").val(parseInt(stok - jumlah));
                }
            });
			$("#btn_tambah_layanan").click(function(){
				var id 			 = $("#pilih_layanan").find("option:selected").attr("value");
				var biayaLayanan = $("#biaya_layanan").val();
				if (id != null) $("#tabel_daftar_layanan").load("<?php echo base_url('rekam_medis/tambah_layanan');?>" + "/" + id + "/" + biayaLayanan);
			});
			$("#btn_tambah_obat").click(function(){
				var id 			 = $("#pilih_obat").find("option:selected").attr("id_obat");
				var hargaSatuan  = $("#harga_satuan").val();
				var jumlah  	 = $("#jumlah").val();
                var stok         = $("#stok").val();
                console.log(jumlah)
				$("#stok").val(parseInt(stok - jumlah));
                $("#pilih_obat").find("option:selected").attr('stok',parseInt(stok - jumlah));
                if ((parseInt(jumlah) < 1) || (jumlah == '')){
                    jumlah = 1;
                    console.log(1)
                    $("#stok").val(parseInt(stok - 1));
                    $("#pilih_obat").find("option:selected").attr('stok',parseInt(stok - 1));
                }
                
                if (stok < 1){
                    $("#btn_tambah_obat").attr('disabled', true);
                }
                else{
                    $("#btn_tambah_obat").attr('disabled', false);
                }
                
                $("#jumlah").val('');
                
				if (id != null) $("#tabel_daftar_obat").load("<?php echo base_url('rekam_medis/tambah_obat');?>" + "/" + id + "/" + hargaSatuan + "/" + jumlah);
			});
            
			function show_image(value){
				var ret="";
				if (value==null) {
					ret=value;
				}else{
					ret='<img id="myImg" onclick="modal_img(\'<?php echo base_url()?>camera/foto/'+value+'\')" src="<?=base_url()?>camera/foto/'+value+'" height="75px" >';
				}
				return ret;
			}

			function modal_img(foto){
				
			    modalImg.src = foto;
			    $("#myModal_for_image").modal('show');
			    //$("#sidebar-collapse").hide();
			}
		</script>

		<script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the image and insert it inside the modal - use its "alt" text as a caption
			var img = document.getElementById('myImg');
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");


			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			    $("#sidebar-collapse").show();
			}
		</script>


		<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal1234" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Obat</h4>
      </div>
      <div class="modal-body"  style="overflow: scroll;
  height: 500px;" >
        <div id="toolbar" class="btn-group">
                <a data-toggle="modal" data-target="#myModal_tambah_tambah_obat_dokter" type="button" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Obat Baru
                </a>
			</div>
            <table id="all_data_json" data-toggle="table"
                  
                  	data-pagination="true"
                   data-search="true"
                   data-sort-order="asc" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-field="no_antrian" data-align="right">No</th>
                        <th data-field="nama" data-sortable="true">Nama Obat</th>
						<th >Edit Obat</th>
                        <th data-field="kode_krim" data-sortable="true" data-align="right">Kode Krim</th>
                        <th data-field="jumlah" data-sortable="true" data-align="right">Qty</th>
						<th data-field="harga_satuan" data-sortable="true" data-align="right">Harga Satuan</th>
                        <th data-field="id" data-align="center">Stok</th>
					</tr>

					<tbody>
						<?php
						$noq1=1;
							foreach ($for_dokter_obat as $key) {
								?>
								<tr>
									<td><?php echo $noq1 ?></td>
									<td><?php echo $key->nama ?></td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_edit_obat<?php echo $noq1 ?>">
								  Edit
								</button></td>
								<td><?php echo $key->kode_krim ?></td>
								<td><?php echo $key->jumlah ?></td>
								<td><?php echo $key->harga_satuan ?></td>
								<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_tambah_stok_obat<?php echo $noq1; ?>">
  Tambah Stok
</button></td>
								</tr>
















<div class="modal fade" id="myModal_tambah_stok_obat<?php echo $noq1; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url('obat'); ?>/simpan_stok_obat_dokter/<?php echo $key->id.'/'.$id_booking ?>" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Stok Obat</h4>
      </div>
      <div class="modal-body">
        
                        <div class="form-group">
                            <h4>Nama obat : <b><?php echo $key->nama; ?></b></h4>
                        </div>
						<br>
						<div class="form-group">
                            <label>Jumlah</label>
                                                        <input class="form-control numeric" type="number" min="0" placeholder="0" maxlength="120" name="jumlah" id="jumlah" value="" style="text-align:right;">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Obat Masuk</label>
                        
                            <input id="tgl_plug_ob<?php echo $noq1; ?>" type="text" class="form-control" name="tgl_masuk" value="<?php echo date('Y-m-d'); ?>">
                            <script>
                            	$(document).ready(function () {
	
									$('#tgl_plug_ob<?php echo $noq1; ?>').datepicker(
								            {
											  format: 'yyyy-mm-dd'
											}
								    );
								});
                            </script>
                        </div>
						<div class="form-group">
                            <label>Tanggal expired</label>
                            							<input type="text" id="tgl_plug<?php echo $noq1; ?>" class="form-control" name="tanggal_expired" value="">
                        </div>
                     
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="close_modal_edit_obat('myModal_tambah_stok_obat<?php echo $noq1 ?>')">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>

$(document).ready(function () {
	
	$('#tgl_plug<?php echo $noq1; ?>').datepicker(
            {
			  format: 'yyyy-mm-dd'
			}
            );
});
</script>


								<!-- Modal -->
<div class="modal fade" id="myModal_edit_obat<?php echo $noq1 ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url('obat'); ?>/simpan_edit_dokter/<?php echo $id_booking.'/'.$key->id; ?>" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Obat</h4>
      </div>
      <div class="modal-body" >
      
                        <div class="form-group">
                                                        <label>Kode Krim</label>
                            <input type="text" class="form-control" name="kode_krim" placeholder="Kode Krim" value="<?php echo $key->kode_krim ?>">
                        </div>
                        <div class="form-group">
                                                        <label>Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="<?php echo $key->nama ?>">
                        </div>

						<div class="form-group">
                            <label>Harga Satuan</label>
                            							<div class="input-group">
								<div class="input-group-addon">Rp</div>
                            	<input class="form-control numeric" type="number" min="0" placeholder="0" maxlength="120" name="harga_satuan" id="jumlah" value="<?php echo $key->harga_satuan ?>" style="text-align:right;">
							</div>
						</div>
                        
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="close_modal_edit_obat('myModal_edit_obat<?php echo $noq1 ?>')">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
        </form>
    </div>
  </div>
								<?php
								$noq1++;
							}
						?>
					</tbody>
                </thead>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
       
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	
	function close_modal_edit_obat(vare){

		$("#"+vare).modal('hide');
	}
</script>


<!-- Modal -->
<div class="modal fade" id="myModal_tambah_tambah_obat_dokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url('obat'); ?>/simpan_tambah_dokter/<?php echo $id_booking ?>" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Obat</h4>
      </div>
      <div class="modal-body">
        
                        <div class="form-group">
                                                        <label>Nama Obat</label>
                            <input type="text" required="" class="form-control" name="nama_obat" placeholder="Nama Obat" value="">
                        </div>
                        <div class="form-group">
                                                        <label>Kode Krim</label>
                            <input type="text" required="" class="form-control" name="kode_krim" placeholder="Kode Krim" value="">
                        </div>
						<div class="form-group">
                            <label>Harga Satuan</label>
                            							<div class="input-group">
								<div class="input-group-addon">Rp</div>
                            	<input required="" class="form-control numeric" type="number" min="0" placeholder="0" maxlength="120" name="harga_satuan" id="jumlah" value="" style="text-align:right;">
							</div>
						</div>
                        
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal layanan -->
<div class="modal fade" id="myModal_layanan_dokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Layanan</h4>
      </div>
      <div class="modal-body">
        <div id="toolbar1213" class="btn-group">
                <a data-toggle="modal" data-target="#myModal_tamabah_layanan_dokter" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Layanan
                </a>
            </div>

        <table id="all_data_json" data-toggle="table"
                   data-url="<?=base_url()?>layanan/get_json_layanan"
                   data-show-refresh="true" data-show-toggle="true"
                   data-show-columns="true" data-search="true"
                   data-select-item-name="toolbar1" data-pagination="true"
                   data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar1213">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-field="no_antrian" data-align="right">No</th>
                        <th data-field="Layanan" data-sortable="true">Layanan</th>
                        <th data-field="Harga"   data-formatter="rupiah" data-align="right" >Harga</th>
                   
                        <th data-field="id_layanan | Layanan | Harga" data-formatter="action_layanan_dokter" data-align="center">Action</th>
                    </tr>
                </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
       
      </div>
    </div>
  </div>
</div>


	
	<script>
    function action_layanan(value) {
        var url='<?=base_url('layanan/') ?>';
        return '<div class="btn-group" role="group" aria-label="..."><a type="button" href="'+url+'/read/'+value+'" class="btn btn-warning">Lihat</a>  <a href="'+url+'/update/'+value+'" type="button" class="btn btn-primary">Edit</a></div>'
    }
</script>


<!-- Modal -->
<div class="modal fade" id="myModal_tamabah_layanan_dokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url(); ?>/layanan/create_action_dokter/<?php echo $id_booking; ?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Layanan</h4>
      </div>
      <div class="modal-body">
        
        
        
								<div class="form-group">
									<label for="varchar">Layanan / Obat </label>
									<input type="text" class="form-control" name="Layanan" id="Layanan" required="" placeholder="Layanan / Obat" value="">
								</div>
								<div class="form-group">
									<label for="int">Harga </label>
									<input type="number" class="form-control" name="Harga" required="" id="Harga" placeholder="Harga" value="">
								</div>
								<input type="hidden" name="id_layanan" value=""> 
								
						
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      	</form>
    </div>
  </div>
</div>


<script type="text/javascript">
	

	function action_layanan_dokter(row, value, index){
		console.log(value);

		var data='<button class="btn btn-primary" onclick="show_edit_layanan(\''+value.id_layanan+'\',\''+value.Layanan+'\',\''+value.Harga+'\');" >Edit</button>';


		data+='<a href="<?php echo base_url('layanan/delete_dokter/'.$id_booking); ?>/'+value.id_layanan+'" onclick="return confirm(\'Apakah anda yakin akan menghapus layanan ini?\')" class="btn btn-danger">Hapus</a>';
		return data;
	}


	function show_edit_layanan(id_layanan,layanan,harga) {
		console.log(id_layanan+layanan,harga);
		$("#nama_layanan").val(layanan);
		$("#harga_layanan").val(harga);
		$("#id_layanan").val(id_layanan);

		$("#myModal_edit_layanan").modal('show');
	}
</script>


<!-- Modal -->
<div class="modal" id="myModal_edit_layanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form action="<?php echo base_url('layanan/update_action_dokter/'.$id_booking); ?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Layanan</h4>
      </div>
      <div class="modal-body">
     	<div class="form-group">
			<label for="varchar">Layanan / Obat </label>
				<input type="text" class="form-control" name="Layanan" id="nama_layanan" placeholder="Layanan / Obat" value="Maskerisasi 2" required="">
		</div>
		<div class="form-group">
			<label for="int">Harga </label>
			<input type="text" class="form-control" name="Harga" id="harga_layanan" placeholder="Harga" value="23000" required="" >
		</div>
		<input type="hidden" name="id_layanan" id="id_layanan" value=""> 
							
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>

$(document).ready(function () {
	
	$('#tgl_saat').datepicker(
            {
			  format: 'yyyy-mm-dd'
			}
            );
});
</script>