<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Booking</li>
				<li class="active">Tambah</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Booking</h1>
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
					<div class="panel-heading">Rencana Pemeriksaan <?php echo $this->session->userdata('nama_depan');?> <?php echo $this->session->userdata('nama_belakang');?></div>
					<div class="panel-body">
													<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
						<form action="<?php echo base_url('booking/create_action/');?>" method="post">

							<div class="form-group">
									<label for="tanggal">Pilih Tanggal yang sesuai<?php echo form_error('tanggal_lahir') ?></label>
									<input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir">
								</div>
								<div class="form-group">
									<label for="tanggal">Pilih Waktu yang sesuai<?php echo form_error('tanggal_ahir') ?></label>
									<input type="time" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir">
								</div>

							<h4>Informasi Umum</h4>
						<div class="col-md-6">
								<div class="form-group">
									<label for="tanggal">Nama Depan <?php echo form_error('nama_depan') ?></label>
									<input type="text" class="form-control" rows="3" name="nama_depan" id="nama_depan">
								</div>

								<div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
					                 <select class="form-control" name="tempat_lahir" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Tempat Lahir</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					            <div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
					                 <select class="form-control" name="jenis_kelamin" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Jenis Kelamin</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					            <div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
					                 <select class="form-control" name="pekerjaan" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Pekerjaan</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					           <div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Jenis ID <?php echo form_error('jenis_id') ?></label>
					                 <select class="form-control" name="jenis_id" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Jenis ID</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>
						</div>
						<div class="col-md-6">
								<div class="form-group">
									<label for="tanggal">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
									<input type="text" class="form-control" rows="3" name="nama_belakang" id="nama_belakang">
								</div>

								<div class="form-group">
									<label for="tanggal">Tanggal Lahir<?php echo form_error('tanggal_ahir') ?></label>
									<input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir">
								</div>

								<div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Status Pernikahan <?php echo form_error('status_nikah') ?></label>
					                 <select class="form-control" name="status_nikah" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Status Pernikahan</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					            <div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Pendidikan <?php echo form_error('pendidikan') ?></label>
					                 <select class="form-control" name="pendidikan" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Pendidikan</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					             <div class="form-group">
									<label for="tanggal">No ID <?php echo form_error('no_id') ?></label>
									<input type="text" class="form-control" rows="3" name="no_id" id="no_id">
								</div>
								<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>" />
								<input type="hidden" name="nama" value="<?php echo $this->session->userdata('nama');?>" />
								<input type="hidden" name="status" value="0" /> 
								
						</div>
						<br><br>
						<h4>Alamat & Kontak yang Dapat Dihubungi</h4>
						<div class="col-md-12">
							<div class="form-group">
									<label for="alamat">Nama Jalan <?php echo form_error('alamat') ?></label>
									<input type="text" class="form-control" rows="3" name="alamat" id="alamat">
								</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Kab/Kota <?php echo form_error('kota_kab') ?></label>
					                 <select class="form-control" name="kota_kab" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Kab/Kota</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
					              <div class="input-group">
					              	<label for="provinsi">Provinsi <?php echo form_error('provinsi') ?></label>
					                 <select class="form-control" name="provinsi" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Provinsi</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
									<label for="alamat">Kode Pos <?php echo form_error('kode_pos') ?></label>
									<input type="text" class="form-control" rows="3" name="kode_pos" id="kode_pos">
								</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
									<label for="alamat">Email <?php echo form_error('email') ?></label>
									<input type="email" class="form-control" rows="3" name="email" id="email">
								</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
									<label for="no_hp">No HP <?php echo form_error('no_hp') ?></label>
									<input type="text" class="form-control" rows="3" name="no_hp" id="no_hp">
								</div>
						</div>

						<br><br>
						<h4>Kondisi Kesehatan Umum</h4>
						<div class="col-md-4">
							<div class="form-group">
									<label for="gol_darah">Gol Darah <?php echo form_error('gol_darah') ?></label>
									<input type="text" class="form-control" rows="3" name="gol_darah" id="gol_darah">
								</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
									<label for="alergi">Alergi <?php echo form_error('alergi') ?></label>
									<input type="text" class="form-control" rows="3" name="alergi" id="alergi">
								</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
									<label for="riwayat_penyakit">Riwayat Penyakit Umum <?php echo form_error('riwayat_penyakit') ?></label>
									<input type="text" class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit">
								</div>
						</div>

						<br><br>
						<h4>Informasi Orang Terdekat</h4>
						<div class="col-md-6">
								<div class="form-group">
									<label for="tanggal">Nama Depan <?php echo form_error('nama_depan_dekat') ?></label>
									<input type="text" class="form-control" rows="3" name="nama_depan_dekat" id="nama_depan_dekat">
								</div>

								<div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Tempat Lahir <?php echo form_error('tempat_lahir_dekat') ?></label>
					                 <select class="form-control" name="tempat_lahir_dekat" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Tempat Lahir</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					            <div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Jenis Kelamin <?php echo form_error('jenis_kelamin_dekat') ?></label>
					                 <select class="form-control" name="jenis_kelamin_dekat" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Jenis Kelamin</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					           <div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Jenis ID <?php echo form_error('jenis_id_dekat') ?></label>
					                 <select class="form-control" name="jenis_id_dekat" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Jenis ID</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>
					
								<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>" />
								<input type="hidden" name="nama" value="<?php echo $this->session->userdata('nama');?>" />
								<input type="hidden" name="status" value="0" /> 
						</div>
						<div class="col-md-6">
								<div class="form-group">
									<label for="tanggal">Nama Belakang <?php echo form_error('nama_belakang_dekat') ?></label>
									<input type="text" class="form-control" rows="3" name="nama_belakang_dekat" id="nama_belakang_dekat">
								</div>

								<div class="form-group">
									<label for="tanggal">Tanggal Lahir<?php echo form_error('tanggal_ahir_dekat') ?></label>
									<input type="date" class="form-control" rows="3" name="tanggal_lahir_dekat" id="tanggal_lahir_dekat">
								</div>

								<div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Hubungan dengan Pasien <?php echo form_error('hubungan_dekat') ?></label>
					                 <select class="form-control" name="hubungan_dekat" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Status Pernikahan</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>

					             <div class="form-group">
									<label for="tanggal">No ID <?php echo form_error('no_id_dekat') ?></label>
									<input type="text" class="form-control" rows="3" name="no_id_dekat" id="no_id_dekat">
								</div>
								<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>" />
								<input type="hidden" name="nama" value="<?php echo $this->session->userdata('nama');?>" />
								<input type="hidden" name="status" value="0" /> 
								
						</div>

						<br><br>
						<h4>Alamat & Kontak orang terdekat yang Dapat Dihubungi</h4>
						<div class="col-md-12">
							<div class="form-group">
									<label for="alamat">Nama Jalan <?php echo form_error('alamat_dekat') ?></label>
									<input type="text" class="form-control" rows="3" name="alamat_dekat" id="alamat_dekat">
								</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
					              <div class="input-group">
					              	<label for="tanggal">Kab/Kota <?php echo form_error('kota_kab_dekat') ?></label>
					                 <select class="form-control" name="kota_kab_dekat" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Kab/Kota</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
					              <div class="input-group">
					              	<label for="provinsi">Provinsi <?php echo form_error('provinsi_dekat') ?></label>
					                 <select class="form-control" name="provinsi_dekat" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;">Provinsi</option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					            </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
									<label for="alamat">Kode Pos <?php echo form_error('kode_pos_dekat') ?></label>
									<input type="text" class="form-control" rows="3" name="kode_pos_dekat" id="kode_pos_dekat">
								</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
									<label for="alamat">Email <?php echo form_error('email_dekat') ?></label>
									<input type="email" class="form-control" rows="3" name="email_dekat" id="email_dekat">
								</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
									<label for="no_hp">No HP <?php echo form_error('no_hp_dekat') ?></label>
									<input type="text" class="form-control" rows="3" name="no_hp_dekat" id="no_hp_dekat">
								</div>
						</div>

						<br><br>
						<h4>Survey Pasien</h4>
						<div class="form-group">
					              <div class="input-group">
					              	<label for="kunjungan">Seberapa sering kamu mengunjungi dokter gigi? <?php echo form_error('kunjungan') ?></label>
					                 <select class="form-control" name="kunjungan" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;"></option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					    </div>
					    <div class="form-group">
					              <div class="input-group">
					              	<label for="market">Darimanakah kamu mengetahui klinik kami? <?php echo form_error('market') ?></label>
					                 <select class="form-control" name="market" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;"></option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					    </div>
					    <div class="form-group">
					              <div class="input-group">
					              	<label for="komunikasi">Pilih jalur komunikasi yang paling nyaman untuk kami hubungi (reminder jadwal, konfirmasi keluhan, dsb) <?php echo form_error('komunikasi') ?></label>
					                 <select class="form-control" name="komunikasi" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;"></option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					    </div>
					    <div class="form-group">
					              <div class="input-group">
					              	<label for="informasi_update">Apakah kamu bersedia untuk mendapat informasi terupdate dari klinik kami? <?php echo form_error('informasi_update') ?></label>
					                 <select class="form-control" name="informasi_update" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;"></option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					    </div>
					    <div class="form-group">
									<label for="tanggal_keluhan">Keluhan Dialami Sejak Tanggal<?php echo form_error('tanggal_keluhan') ?></label>
									<input type="date" class="form-control" rows="3" name="tanggal_keluhan" id="tanggal_keluhan">
						</div>
						<div class="form-group">
									<textarea class="form-control" rows="3" name="keluhan" id="keluhan" placeholder="Jelaskan secara detail keluhan kamu disini"></textarea>
						</div>

						<br><br>
						<h4>Metode Pembayaran</h4>
						<div class="form-group">
					              <div class="input-group">
					              	<label for="informasi_update">Jenis Pembayaran <?php echo form_error('informasi_update') ?></label>
					                 <select class="form-control" name="informasi_update" required data-required-msg="Address is required">
					                    <option value="" disabled selected style="display: none;"></option>
					                      <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
					                      <option value="Perempuan" id="Perempuan">Perempuan</option>
					                 </select>
					                <span data-for="status" class="k-invalid-msg"></span>
					                </div>                                         
					    </div>
						<button type="submit" class="btn btn-primary">Lanjutkan</button> 
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->