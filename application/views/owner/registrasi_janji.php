<style type="text/css">
	font {
		font-weight: bold;
		font-size: 20px;
	}

	.periksa {
		margin-left: 15px;
		text-align: center;
		color: white;
		background-color: #F40049;
		border-radius: 5px;
	}

	.daftar1 {
		text-align: center;
		padding: 7px 0 7px 0;
		margin-left: 15px;
		color: #000;
		background-color: #FFFF00;
		border-radius: 5px;
	}

	.daftar2 {
		text-align: center;
		padding: 7px 0 7px 0;
		margin-left: 15px;
		color: #fff;
		background-color: #00b050;
		border-radius: 5px;
	}

	thead {
		text-align: center;
	}

	@media only screen and (max-width: 1024px) {
		font {
			font-size: 18px;
		}

		table {
			font-size: 13px;
		}
	}

	@media only screen and (max-width: 425px) {
		.col-lg-12 {
			width: 90%;
			top: -44px;
			margin-left: 33px;
		}

		font {
			font-size: 17px;
		}

		table {
			font-size: 12px;
		}
	}

	@media only screen and (max-width: 375px) {
		.col-lg-12 {
			width: 92%;
			top: -44px;
			margin-left: 33px;
		}
	}

	@media only screen and (max-width: 320px) {
		font {
			font-size: 13px;
		}
	}
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<font>Registrasi / Ubah Janji</font><br><br>
					<table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_pasien_rekam_medis'); ?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
						<thead>
							<tr>
								<th data-field="no_antrian" data-formatter="runningFormatter" data-align="right">No.</th>
								<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
								<th data-field="id_booking" data-sortable="true">Kode Booking</th>
								<th data-field="nama_depan" data-sortable="true">Nama Pasien</th>
								<th data-field="tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
								<th data-field="id_rekam_medis" data-sortable="true">No. Rekam Medis</th>
								<th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
								<th data-field="tanggal_rencana" data-sortable="true">Tanggal Periksa</th>
								<th data-field="jam_rencana" data-sortable="true">Jam Periksa Pasien</th>
								<th>Activity / Actions</th>
							</tr>
						</thead>


						<tbody>
							<?php foreach ($janji->result() as $result) : ?>
								<?php $tgl_rencana = date('d F Y', strtotime($result->tanggal_rencana)); ?>
								<?php $tgl_lahir = date('d F Y', strtotime($result->tanggal_lahir)); ?>
								<tr>
									<?php $no = 1; ?>
									<td><?php echo $no++  ?></td>
									<td><?php echo $result->id_booking ?></td>
									<td><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></td>
									<td><?php echo $tgl_lahir ?></td>
									<td><?php echo $result->id_rekam_medis ?></td>
									<td><?php echo $result->nama_dokter ?></td>
									<td><?php echo $tgl_rencana ?></td>
									<td><?php echo $result->jam_rencana ?></td>
									<td>
										<a href="#" type="button" class="btn col-md-6" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style="text-align: center; color: white; background-color: #00b050; border-radius: 0px;">Daftar</a>
										<a href="#" type="button" class="btn col-md-6" data-toggle="modal" data-target="#ModalUbah<?php echo $result->id_pasien ?>" style="text-align: center; color: white; background-color: #c00000; border-radius: 0px;">Ubah</a>
									</td>

									<div id="myModal<?php echo $result->id_pasien ?>" class="modal" style="top: 100px;">
										<form class="form-horizontal" action="<?php echo base_url('owner/update_janji/'); ?>" method="post" enctype="multipart/form-data" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" style="text-align: center;"><b>Registrasi</b></h4>
													</div>
													<div class="col-lg-12">

														<div class="modal-body">
															<h3 class="madal-body">
																<center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
															</h3>

															<h5>
																<center>dengan dokter <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></center>
															</h5>
															<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
															<h5>
																<center>pada tanggal <?php echo $tgl  ?> jam <?php echo $result->jam_rencana  ?></center>
															</h5>
															<br>
														</div>

														<input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
														<input type="hidden" class="form-control" name="id_rekam_medis" value="<?php echo $result->id_rekam_medis ?>">
														<input type="hidden" class="form-control" name="id_pasien" value="<?php echo $result->id_pasien ?>">
														<input type="hidden" class="form-control" name="id_dokter" value="<?php echo $result->id_dokter ?>">
														<hr>
													</div>
													<div class="modal-footer">
														<button class="btn salmon" onclick="popUp()" style="background-color:#F40049; color:white" type="submit"> Daftar&nbsp;</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
													</div>

												</div>
											</div>
										</form>
									</div>

									<div id="ModalUbah<?php echo $result->id_pasien ?>" class="modal" style="top: 100px;">
										<form class="form-horizontal" action="<?php echo base_url('owner/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" style="text-align: center;"><b>Ubah Jadwal Pemeriksaan</b></h4>
													</div>
													<div class="col-lg-12">

														<div class="modal-body">
															<h3 class="madal-body">
																<center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
															</h3>
															<br>
															<div class="form-group">
																<label class="col-lg-3 col-sm-3 control-label">Tanggal</label>
																<div class="col-lg-3">
																	<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
																	<input type="text" id="date" class="form-control" name="tanggal_rencana" value="<?php echo $tgl ?>" readonly>
																</div>
																<div class="col-lg-6">
																	<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
																	<input type="date" id="date" class="form-control" name="tanggal_rencana" value="<?php echo $tgl ?>" required>
																</div>
															</div>
															<br><br>
															<div class="form-group">
																<label class="col-lg-3 col-sm-3 control-label">Waktu</label>
																<div class="col-lg-9">
																	<select class="form-control" name="jam_rencana" required data-required-msg="Address is required">
																		<option value="<?php echo $result->jam_rencana  ?>" style="display: none;"><?php echo $result->jam_rencana  ?></option>
																		<?php
																		$query = $this->db->query('select * from jadwal_dokter where id_dokter="' . $result->id_dokter . '"');
																		foreach ($query->result() as $hasil) :
																		?>
																			<option value="<?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?>"><?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>
														</div>

														<input type="hidden" class="form-control" name="id_rcn" value="<?php echo $result->id_rcn ?>">
														<input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
														<hr>
													</div>
													<div class="modal-footer">

														<button class="btn salmon" onclick="popUpBatalKonfirmasi()" style="background-color:#F40049; color:white" type="submit"> Ubah&nbsp;</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>


													</div>

												</div>
											</div>
										</form>
									</div>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table><br><br>

					<font>Registrasi / Ubah Janji Terlambat</font><br>
					<table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_pasien_rekam_medis'); ?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
						<thead>
							<tr>
								<th data-field="no_antrian" data-formatter="runningFormatter" data-align="right">No.</th>
								<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
								<th data-field="id_booking" data-sortable="true">Kode Booking</th>
								<th data-field="nama_depan" data-sortable="true">Nama Pasien</th>
								<th data-field="tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
								<th data-field="id_rekam_medis" data-sortable="true">No. Rekam Medis</th>
								<th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
								<th data-field="tanggal_rencana" data-sortable="true">Tanggal Periksa</th>
								<th data-field="jam_rencana" data-sortable="true">Jam Periksa Pasien</th>
								<th>Activity / Actions</th>
							</tr>
						</thead>


						<tbody>
							<?php foreach ($terlambat_janji->result() as $result) : ?>
								<?php $tgl_rencana = date('d F Y', strtotime($result->tanggal_rencana)); ?>
								<?php $tgl_lahir = date('d F Y', strtotime($result->tanggal_lahir)); ?>
								<tr>
									<?php $no = 1; ?>
									<td><?php echo $no++  ?></td>
									<td><?php echo $result->id_booking ?></td>
									<td><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></td>
									<td><?php echo $tgl_lahir ?></td>
									<td><?php echo $result->id_rekam_medis ?></td>
									<td><?php echo $result->nama_dokter ?></td>
									<td><?php echo $tgl_rencana ?></td>
									<td><?php echo $result->jam_rencana ?></td>
									<td>
										<a href="#" type="button" class="btn col-md-12" data-toggle="modal" data-target="#ModalUbah<?php echo $result->id_pasien ?>" style="text-align: center; color: white; background-color: #c00000; border-radius: 0px;">Ubah</a>
									</td>

									<div id="myModal<?php echo $result->id_pasien ?>" class="modal" style="top: 100px;">
										<form class="form-horizontal" action="<?php echo base_url('owner/update_janji/'); ?>" method="post" enctype="multipart/form-data" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" style="text-align: center;"><b>Registrasi</b></h4>
													</div>
													<div class="col-lg-12">

														<div class="modal-body">
															<h3 class="madal-body">
																<center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
															</h3>

															<h5>
																<center>dengan dokter <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></center>
															</h5>
															<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
															<h5>
																<center>pada tanggal <?php echo $tgl  ?> jam <?php echo $result->jam_rencana  ?></center>
															</h5>
															<br>
														</div>

														<input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
														<input type="hidden" class="form-control" name="id_rekam_medis" value="<?php echo $result->id_rekam_medis ?>">
														<input type="hidden" class="form-control" name="id_pasien" value="<?php echo $result->id_pasien ?>">
														<input type="hidden" class="form-control" name="id_dokter" value="<?php echo $result->id_dokter ?>">
														<hr>
													</div>
													<div class="modal-footer">
														<button class="btn salmon" onclick="popUp()" style="background-color:#F40049; color:white" type="submit"> Daftar&nbsp;</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
													</div>

												</div>
											</div>
										</form>
									</div>

									<div id="ModalUbah<?php echo $result->id_pasien ?>" class="modal" style="top: 100px;">
										<form class="form-horizontal" action="<?php echo base_url('owner/update_rencana/'); ?>" method="post" enctype="multipart/form-data" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" style="text-align: center;"><b>Ubah Jadwal Pemeriksaan</b></h4>
													</div>
													<div class="col-lg-12">

														<div class="modal-body">
															<h3 class="madal-body">
																<center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center>
															</h3>
															<br>
															<div class="form-group">
																<label class="col-lg-3 col-sm-3 control-label">Tanggal</label>
																<div class="col-lg-3">
																	<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
																	<input type="text" id="date" class="form-control" name="tanggal_rencana" value="<?php echo $tgl ?>" readonly>
																</div>
																<div class="col-lg-6">
																	<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
																	<input type="date" id="date" class="form-control" name="tanggal_rencana" value="<?php echo $tgl ?>" required>
																</div>
															</div>
															<br><br>
															<div class="form-group">
																<label class="col-lg-3 col-sm-3 control-label">Waktu</label>
																<div class="col-lg-9">
																	<select class="form-control" name="jam_rencana" required data-required-msg="Address is required">
																		<option value="<?php echo $result->jam_rencana  ?>" style="display: none;"><?php echo $result->jam_rencana  ?></option>
																		<?php
																		$query = $this->db->query('select * from jadwal_dokter where id_dokter="' . $result->id_dokter . '"');
																		foreach ($query->result() as $hasil) :
																		?>
																			<option value="<?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?>"><?php echo $hasil->jam_mulai  ?>-<?php echo $hasil->jam_tutup  ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>
														</div>

														<input type="hidden" class="form-control" name="id_rcn" value="<?php echo $result->id_rcn ?>">
														<input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
														<hr>
													</div>
													<div class="modal-footer">

														<button class="btn salmon" onclick="popUpBatalKonfirmasi()" style="background-color:#F40049; color:white" type="submit"> Ubah&nbsp;</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>


													</div>

												</div>
											</div>
										</form>
									</div>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function runningFormatter(value, row, index) {
		return index + 1;
	}

	function prosesRekamMedis(value) {
		return '<a href="<?php echo base_url(); ?>rekam_medis/create/' + value + '" class="btn btn-primary">Proses</a>';
	}
</script>

<script>
	function popUpBatalKonfirmasi() {
		swal("Terkirim!", "Perubahan jadwal pemeriksaan pasien telah berhasil dilakukan", "success");
	}
</script>

<script>
	function popUp() {
		swal("Berhasil!", "Pasien telah terdaftar. Pasien dapat segera dipersilahkan masuk ke ruang pemeriksaan", "success");
		// swal({
		// 		title: "Are you sure?",
		// 		text: "Once deleted, you will not be able to recover this imaginary file!",
		// 		icon: "warning",
		// 		buttons: true,
		// 		dangerMode: true,
		// 	})
		// 	.then((willDelete) => {
		// 		if (willDelete) {
		// 			swal("Poof! Your imaginary file has been deleted!", {
		// 				icon: "success",
		// 			});
		// 		} else {
		// 			swal("Your imaginary file is safe!");
		// 		}
		// 	});
	}
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>