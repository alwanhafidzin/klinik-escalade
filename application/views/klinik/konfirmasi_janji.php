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

	.salmon {
		background-color: #F40049;
		color: white;
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
					<font>Konfirmasi Janji</font><br><br>
					<table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('Resepsionis/data_booking'); ?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
						<thead>
							<tr>
								<th data-field="" data-formatter="runningFormatter" data-align="right">No.</th>
								<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
								<th data-field="nama_depan">Nama</th>
								<th data-field="tanggal_lahir">Tanggal Lahir</th>
								<th data-field="nama_dokter" data-sortable="true">Dokter Pilihan</th>
								<th data-field="tanggal_rencana" data-sortable="true">Tanggal Periksa</th>
								<th data-field="jam_rencana" data-sortable="true">Jam Periksa</th>

								<th>Activity</th>
							</tr>
						</thead>


						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($booking->result() as $result) : ?>
								<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
								<?php $tgl_lahir = date('d F Y', strtotime($result->tanggal_lahir)); ?>
								<tr>
									<td><?php echo $no++ ?></td>
									
									<td><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></td>
									<td><?php echo $tgl_lahir ?></td>
									<td><?php echo $result->nama_dokter  ?></td>
									<td><?php echo $tgl ?></td>
									<td><?php echo $result->jam_rencana  ?></td>

									<td>
										<a href="#" type="button" class="btn col-md-6" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: white; background-color: #00b050; border-radius: 0px;"> Terima </a>
										<a href="#" type="button" class="btn col-md-6" data-toggle="modal" data-target="#ModalTolak<?php echo $result->id_pasien ?>" style=" color: white; background-color: #c00000; border-radius: 0px;"> Tolak </a>
									</td>

									<div id="myModal<?php echo $result->id_pasien ?>" class="modal" style="top: 100px;">
										<form class="form-horizontal" action="<?php echo base_url('klinik/konfirmasi/'); ?>" method="post" enctype="multipart/form-data" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" style="text-align: center;"><b>Konfirmasi Janji</b></h4>
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
															<h5 style="text-align: center;">ID Booking:</h5>
															<h4 style="text-align: center;"><?php echo $result->id_booking ?></h4>
														</div>

														<input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
														<input type="hidden" class="form-control" name="id_pasien" value="<?php echo $result->id_pasien ?>">
														<input type="hidden" class="form-control" name="id_user" value="<?= $this->session->userdata("id_user") ?>">
														<input type="hidden" class="form-control" name="id_dokter" value="<?php echo $result->id_dokter ?>">
														<hr>
													</div>
													<div class="modal-footer">
														<button class="btn salmon" onclick="popUp()" type="submit"> Konfirmasi&nbsp;</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
													</div>

												</div>
											</div>
										</form>
									</div>

									<div id="ModalTolak<?php echo $result->id_pasien ?>" class="modal" style="top: 50px;">
										<form class="form-horizontal" action="<?php echo base_url('klinik/Konfirmasi_tolak/'); ?>" method="post" enctype="multipart/form-data" role="form">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" style="text-align: center;"><b>Janji Pasien Ditolak</b></h4>
													</div>
													<div class="col-lg-12">

														<div class="modal-body">
															<h5 class="madal-body">
																<center>Pasien atas nama <?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?> telah ditolak.</center>
															</h5>

															<h5>
																<center>Mohon agar dapat memberikan alasan penolakan,</center>
															</h5>
															<h5>
																<center>serta opsi jadwal atau dokter untuk pasien.</center>
															</h5>

															<br>
															<div class="col-lg-12">
																<div class="form-group">
																	<textarea name="alasan_tolak" class="form-control" placeholder="Ketik alasan penolakan serta opsi jadwal atau dokter (bila ada) untuk pasien disini" rows="10" required></textarea>
																</div>
															</div>
															<br>
															<h5>
																<center>Apakah Anda yakin akan menolak janji pasien?</center>
															</h5>
															<br>
															<h5>
																<center>Dengan menekan tombol dibawah, maka konfirmasi penolakan akan secara otomatis terkirim beserta pesan dari klinik.</center>
															</h5>

														</div>

														<input type="hidden" class="form-control" name="id_booking" value="<?php echo $result->id_booking ?>">
														<input type="hidden" class="form-control" name="id_pasien" value="<?php echo $result->id_pasien ?>">
														<input type="hidden" class="form-control" name="id_user" value="<?= $this->session->userdata("id_user") ?>">
														<input type="hidden" class="form-control" name="id_dokter" value="<?php echo $result->id_dokter ?>">
														<hr>
													</div>
													<div class="modal-footer">
														<center><button class="btn salmon remove" onclick="popUpBatalKonfirmasi()" type="submit"> Ya, Kirim Konfirmasi Penolakan</button></center>
														<!-- <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>  -->
													</div>

												</div>
											</div>
										</form>
									</div>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table><br><br>
					</div>
			</div>
		</div>
	</div><!-- /.row -->
</div>

<script>
	function runningFormatter(value, row, index) {
		return index + 1;
	}

	function proses(value) {
		return '<a href="#" onclick="prosesAntri(' + value + ')" class="btn btn-warning">Pilih</a>';
	}

	function prosesAntri(id) {
		$("#formProsesAntri").attr("action", "<?php echo base_url(); ?>antrian/create_action/" + id);
		$('#alertAntri').modal('show');
	}
</script>

<script type="text/javascript">
	// 			$('#closemodal').click(function() {
	//     $('#ModalTolak').modal('hide');
	// });
	$(".remove").click(function() {
		var id = $(this).parents("tr").attr("id");

		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: '/item-list/' + id,
						type: 'DELETE',
						error: function() {
							alert('Something is wrong');
						},
						success: function(data) {
							$("#" + id).remove();
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
						}
					});
				} else {
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			});

		// $('#ModalTolak').modal('hide');
	});
</script>
<script>
	function popUpBatalKonfirmasi() {
		swal("Terkirim!", "Konfirmasi Penolakan untuk Pasien berhasil terkirim", "success");
	}
</script>

<script>
	function popUp() {
		swal("Terkirim!", "Kode Verifikasi Pasien Anda Telah Berhasil Dikirimkan Kembali", "success");
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
