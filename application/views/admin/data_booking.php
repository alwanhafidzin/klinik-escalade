		<div class="col-md-12 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pasien e<?= $this->session->userdata("username") ?></li>
				</ol>
			</div><!--/.row-->

			<br><br>
			<div class="row"><div class="col-lg-12"><h2 class="page-header">Daftar Data Booking Pasien</h2></div></div><!--/.row-->

			<div class="row">
				<div class="col-xs-12">
					<div class="modal-body">	
						<table data-toggle="table" data-url="<?php echo base_url('Resepsionis/data_booking');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="" data-sort-order="">
							<thead>
								<tr>
									<th data-field="" data-formatter="runningFormatter" data-align="right">No.</th>
									<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
									<th data-field="id_booking">ID Booking</th>
									<th data-field="nama_depan">Nama</th>
									<th data-field="tanggal_rencana" data-sortable="true">Tanggal</th>
									<th data-field="jam_rencana" data-sortable="true">Jam</th>
									<th data-field="nama_dokter" data-sortable="true">Nama Dokter</th>
									<th>Aksi</th>
								</tr>
							</thead>


							<tbody>
								<?php $no = 1;?>
								<?php foreach ($booking->result() as $result): ?>
									<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $result->id_booking ?></td>
										<td><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></td>
										<td><?php echo $tgl ?></td>
										<td><?php echo $result->jam_rencana  ?></td>
										<td><?php echo $result->nama_dokter  ?></td>
										<td><a href="#" type="button" class="btn salmon col-md-12" data-toggle="modal" data-target="#myModal<?php echo $result->id_pasien ?>" style=" color: white; padding: 5px;"> Pilih </a></td>

										<div id="myModal<?php echo $result->id_pasien?>" class="modal">
											<form class="form-horizontal" action="<?php echo base_url('Booking/Konfirmasi/');?>" method="post" enctype="multipart/form-data" role="form">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" style="text-align: center;"><b>Konfirmasi Booking</b></h4>
														</div>
														<div class="col-lg-12">

															<div class="modal-body">
																<h3 class="madal-body"> <center><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></center></h3>
																
																<h5><center>dengan dokter <?php echo $result->nama_dokter  ?> di <?php echo $result->nama_cabang  ?></center></h5>
																<?php $tgl = date('d F Y', strtotime($result->tanggal_rencana));?>
																<h5><center>pada tanggal <?php echo $tgl  ?> jam <?php echo $result->jam_rencana  ?></center></h5>
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
															<button class="btn salmon" type="submit"> Konfirmasi&nbsp;</button>
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

		</div><!-- /.row -->

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
