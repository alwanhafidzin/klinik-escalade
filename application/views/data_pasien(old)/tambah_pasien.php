<style type="text/css">
	.input{
		margin-top: 50px;
	}
	.salmon{
		background-color : #e28a9d;
		color:white;
	}
</style>
	<div class="col-sm-12 col-lg-12 main" style="margin-top: 6%">					
		
		<div class="row">
			<div class="col-lg-12">
			</div>
		</div><!--/.row-->
			<br>	
		

		<div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					   
				<form action="<?php echo base_url('pasien/add_pasien/');?>" method="post">

						
						<div class="form-group">																				
							<div class="col-md-12">
							<h3 class="mb-20 weight-500">Tambah Data Profil Pasien</h3><br></div>
								<div class="col-lg-2">	
								Nama Depan 
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
								<input type="text" class="form-control" rows="3" name="nama_depan" id="nama_depan" required="required">
							</div>
								</div><br>
								<div class="col-lg-2">	 
									Nama Belakang
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
								<input type="text" class="form-control" rows="3" name="nama_belakang" id="nama_belakang" required="required">
								</div></div>
								
								<div class="col-lg-2">	 
								Tanggal lahir
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
								<input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" required="required">
								</div></div>
								<div class="col-lg-2">	 
								Jenis kelamin
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
									<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required">
										<option value="" disabled selected style="display: none;">-- Pilih Jenis Kelamin --</option>
									<option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan" id="Perempuan">Perempuan</option>
									</select>
								</div></div>
								<div class="col-lg-2">	 
								Hubungan Pasien dengan Anda
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
									<select class="form-control" name="hubungan" id="hubungan" required="required">
										<option value="" disabled selected style="display: none;">-- Pilih Hubungan --</option>
									<option value="Istri" id="Istri">Istri</option>
									<option value="Suami" id="Suami">Suami</option>
									<option value="Anak" id="Anak">Anak</option>
									<option value="Ayah" id="Ayah">Ayah</option>
									<option value="Ibu" id="Ibu">Ibu</option>
									<option value="Saudara" id="Saudara">Saudara</option>
									</select>
								</div></div>
								<div class="col-lg-2">	 
								Nama Jalan
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
								<input type="text" class="form-control" rows="3" name="alamat" id="alamat" required="required">
								</div></div>
								<div class="col-lg-2">	 
								Email
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
								<input type="email" class="form-control" rows="3" name="email" id="email" required="required">
								</div></div>
								<div class="col-lg-2">	 
								No. HP
								</div>
								<div class="col-lg-4">	
								<div class="form-group">	
								<input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required">
								</div>

								<div class="form-group">	
									<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
							 <button class="btn salmon" style="float: right; height: 50px; width: 100px;" type="submit">Simpan</button> 
							 </div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->