		<div class="col-md-12 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pasien e<?= $this->session->userdata("username") ?></li>
				</ol>
			</div><!--/.row-->

			<br><br>
			<div class="row"><div class="col-lg-12"><h2 class="page-header">Daftar Antrian Pasien Periksa</h2></div></div><!--/.row-->
			<button class="btn salmon col-sm-6" style="float: left; width: 140px;" type="button" onclick="location.href ='<?php echo base_url('Resepsionis/data_booking');?>'">Tambah Antrian</button>
			<div class="row">
				<div class="col-xs-12">
					<div class="modal-body">
						<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_pasien_rekam_medis');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="" data-sort-order="">
							<thead>
								<tr>
									<th data-field="no_antrian" data-formatter="runningFormatter" data-align="right">No.</th>
									<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
									<th data-field="id_booking" data-sortable="true">ID Booking</th>
									<th data-field="id_pasien" data-sortable="true">Nama</th>
								</tr>
							</thead>


							<tbody>
								<?php foreach ($antrian->result() as $result): ?>
									<tr>
										<td><?php echo $result->no_antrian  ?></td>
										<td><?php echo $result->id_booking  ?></td>
										<td><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></td>
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
				return index+1;
			}
			function prosesRekamMedis(value){
				return '<a href="<?php echo base_url();?>rekam_medis/create/'+value+'" class="btn btn-primary">Proses</a>';
			}
		</script>   
