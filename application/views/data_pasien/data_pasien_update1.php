    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Data Pasien</li>
                <li class="active">Detail</li>
            </ol>
        </div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Pasien</div>
					<div class="panel-body">
						<div class="col-md-6">
								<!-- <h2 style="margin-top:0px">Data_pasien <?php echo $button ?></h2> -->
							<form action="<?php echo $action; ?>" method="post">
								<!--<div class="form-group">
									<label for="blob">Foto <?php echo form_error('foto') ?></label>
									<input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php if (isset($foto)) echo $foto; ?>" />
								</div>-->
								<div class="form-group">
									<label for="varchar">Nama <?php echo form_error('Nama') ?></label>
									<input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">Alamat <?php echo form_error('Alamat') ?></label>
									<input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat" value="<?php echo $Alamat; ?>" />
								</div>
								<div class="form-group">
									<label for="date">Tanggal Lahir <?php echo form_error('Tanggal_lahir') ?></label>
									<input type="date" class="form-control" name="Tanggal_lahir" id="Tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $Tanggal_lahir; ?>" />
								</div>
								<div class="form-group">
									<label for="varchar">No Hp <?php echo form_error('No_hp') ?></label>
									<input type="text" class="form-control" name="No_hp" id="No_hp" placeholder="No Hp" value="<?php echo $No_hp; ?>" />
								</div>
								<!--<div class="form-group">
									<label for="keluhan_utama">Keluhan Utama <?php echo form_error('keluhan_utama') ?></label>
									<textarea class="form-control" rows="3" name="keluhan_utama" id="keluhan_utama" placeholder="Keluhan Utama"><?php echo $keluhan_utama; ?></textarea>
								</div>-->
								<div class="form-group">
									<label for="riwayat_penyakit">Riwayat Penyakit <?php echo form_error('riwayat_penyakit') ?></label>
									<textarea class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit" placeholder="Riwayat Penyakit"><?php echo $riwayat_penyakit; ?></textarea>
								</div>
								<div class="form-group">
									<label for="riwayat_alergi_obat">Riwayat Alergi Obat <?php echo form_error('riwayat_alergi_obat') ?></label>
									<textarea class="form-control" rows="3" name="riwayat_alergi_obat" id="riwayat_alergi_obat" placeholder="Riwayat Alergi Obat"><?php echo $riwayat_alergi_obat; ?></textarea>
								</div>
								<div class="form-group">
									<label for="riwayat_pengobatan_sebelumnya">Riwayat Pengobatan Sebelumnya <?php echo form_error('riwayat_pengobatan_sebelumnya') ?></label>
									<textarea class="form-control" rows="3" name="riwayat_pengobatan_sebelumnya" id="riwayat_pengobatan_sebelumnya" placeholder="Riwayat Pengobatan Sebelumnya"><?php echo $riwayat_pengobatan_sebelumnya; ?></textarea>
								</div>
								<input type="hidden" name="ID_pasien" value="<?php echo $ID_pasien; ?>" /> 
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
								<a href="<?php echo site_url('data_pasien') ?>" class="btn btn-default">Cancel</a>
							</form>
							<!-- <form role="form">
							
								<div class="form-group">
									<label>Nama Pasien</label>
									<input type="text" name ="nama_pasien" class="form-control" placeholder="Nama">
								</div>
																
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" name ="alamat_pasien"  class="form-control" placeholder="Alamat">
								</div>

								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name ="tgl_lahir"  class="form-control" placeholder="Tanggal Lahir">
								</div>

								<div class="form-group">
									<label>Nomor HP</label>
									<input type="text" name ="hp_pasien"  class="form-control" placeholder="Nomor HP">
								</div>

								<div class="form-group">
									<label>Keluhan</label>
									<textarea name ="keluhan" class="form-control" rows="5"></textarea>
								</div>

								<div class="form-group">
									<label>Riwayat</label>
									<textarea name ="keluhan" class="form-control" rows="5"></textarea>
								</div>
								
								
							</div>
							<div class="col-md-6"> -->
							
								<!-- <div class="form-group">
									<label>Checkboxes</label>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 1
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 2
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 3
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">Checkbox 4
										</label>
									</div>
								</div> -->
								
								<!-- <div class="form-group">
									<label>Radio Buttons</label>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio Button 1
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Button 2
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
										</label>
									</div>
								</div> -->
								
								<!-- <div class="form-group">
									<label>Selects</label>
									<select class="form-control">
										<option>Option 1</option>
										<option>Option 2</option>
										<option>Option 3</option>
										<option>Option 4</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Multiple Selects</label>
									<select multiple class="form-control">
										<option>Option 1</option>
										<option>Option 2</option>
										<option>Option 3</option>
										<option>Option 4</option>
									</select>
								</div> -->
								
								<!-- <button type="submit" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button> -->
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->