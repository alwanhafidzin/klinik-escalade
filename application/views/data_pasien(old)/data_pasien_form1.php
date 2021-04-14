	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Data Pasien</li>
				<li class="active">Tambah</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pasien Baru</h1>
			</div>
		</div><!--/.row-->

		<!-- Form Foto
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Ambil Foto</div>
		    		<div id="main" style="height:350px; width:100%">
		        		<div id="content" style="float:left; width:500px; margin-left:50px; margin-top:20px;" align="center">
							<script type="text/javascript" src="<?php echo base_url();?>assets/js/cam/webcam.js"></script>
		            		<script language="JavaScript">
		                	document.write(webcam.get_html(440, 240));
		            		</script>
	           	 			<form>
			                <br />
			                <input type=button value="Configure settings" onClick="webcam.configure()" class="shiva"> &nbsp;&nbsp;
			                <input type=button value="snap" onClick="take_snapshot()" class="shiva">
			            	</form>
       			 		</div>

					        <script type="text/javascript">
					            webcam.set_api_url('<?php echo base_url();?>camera/saveImage');
					            webcam.set_quality(90);
					            webcam.set_shutter_sound(true);
					            webcam.set_hook('onComplete', 'my_completion_handler');

					            function take_snapshot() {
					                document.getElementById('img').innerHTML = '<h1>Uploading...</h1>';
					                webcam.snap();
					            }

					            function my_completion_handler(msg) {
					                if (msg.match(/(http\:\/\/\S+)/)) {
					                    document.getElementById('img').innerHTML = '<h3>Upload Successfuly done</h3>' + msg;

					                    document.getElementById('img').innerHTML = "<img src=" + msg + " class=\"img\">";
					                    webcam.reset();
					                } else {
					                    alert("Error occured we are trying to fix now: " + msg);
					                }
					            }
					        </script>
					</div>


				</div>
			</div>
		</div> -->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Pasien</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php echo form_open('booking/create_action') ?>
								<!-- Field Foto
								<div class="form-group">
									<label for="blob">Foto <?php echo form_error('foto') ?></label>
									<input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
								</div> -->
								<div class="form-group">
									<label for="varchar">Nama <?php echo form_error('Nama') ?></label>
									<input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $Nama; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">Alamat <?php echo form_error('Alamat') ?></label>
									<input type="text" class="form-control" name="Alamat" id="Alamat" value="<?php echo $Alamat; ?>" />
								</div>
								<div class="form-group">
									<label for="date">Tanggal Lahir <?php echo form_error('Tanggal_lahir') ?></label>
									<input type="date" class="form-control" name="Tanggal_lahir" id="Tanggal_lahir" value="<?php echo $Tanggal_lahir; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">No Hp <?php echo form_error('No_hp') ?></label>
									<input type="text" class="form-control" name="No_hp" id="No_hp" value="<?php echo $No_hp; ?>" />
								</div>
								<!--<div class="form-group">
									<label for="keluhan_utama">Keluhan Utama <?php echo form_error('keluhan_utama') ?></label>
									<textarea class="form-control" rows="3" name="keluhan_utama" id="keluhan_utama" placeholder="Keluhan Utama"><?php echo $keluhan_utama; ?></textarea>
								</div>-->
								<div class="form-group">
									<label for="riwayat_penyakit">Riwayat Penyakit <?php echo form_error('riwayat_penyakit') ?></label>
									<textarea class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit"><?php echo $riwayat_penyakit; ?></textarea>
								</div>
								<div class="form-group">
									<label for="riwayat_alergi_obat">Riwayat Alergi Obat <?php echo form_error('riwayat_alergi_obat') ?></label>
									<textarea class="form-control" rows="3" name="riwayat_alergi_obat" id="riwayat_alergi_obat"><?php echo $riwayat_alergi_obat; ?></textarea>
								</div>
								<div class="form-group">
									<label for="riwayat_pengobatan_sebelumnya">Riwayat Pengobatan Sebelumnya <?php echo form_error('riwayat_pengobatan_sebelumnya') ?></label>
									<textarea class="form-control" rows="3" name="riwayat_pengobatan_sebelumnya" id="riwayat_pengobatan_sebelumnya"><?php echo $riwayat_pengobatan_sebelumnya; ?></textarea>
								</div>
								<input type="hidden" name="ID_pasien" value="<?php echo $ID_pasien; ?>" /> 
								<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_keluhan" >Simpan</button> 
								<!--<a href="<?php echo site_url('data_pasien') ?>" class="btn btn-default">Cancel</a>-->
							

								<!-- Modal -->
								<div class="modal fade" id="modal_keluhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Keluhan</h4>
								      </div>
								      <div class="modal-body">
								        <textarea class="form-control" rows="3" name="keluhan_utama" id="keluhan_utama" placeholder="Keluhan Utama"></textarea>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
								        <button type="submit" class="btn btn-primary">Simpan data pasien dan masuk antrian</button>
								      </div>
								    </div>
								  </div>
								</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->