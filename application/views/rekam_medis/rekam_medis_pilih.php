		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pasien e<?= $this->session->userdata("username") ?></li>
				</ol>
			</div><!--/.row-->

			<div class="row"><div class="col-lg-12"><h1 class="page-header">Daftar Antrian Pasien Periksa</h1></div></div><!--/.row-->
			
			<div class="row">
				<div class="col-xs-12">
					<div class="modal-body">
						<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_pasien_rekam_medis');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="" data-sort-order="">
							<thead>
								<tr>
									<th data-field="id_survey" data-formatter="runningFormatter" data-align="right">No.</th>
									<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
									<th data-field="id_pasien">ID Pasien</th>
									<th data-field="survey1" data-sortable="true">Survey1</th>
									<th data-field="survey2" data-sortable="true">Survey2</th>
									<th data-field="survey3" data-sortable="true">Survey3</th>
									<th data-field="survey4" data-sortable="true">Survey4</th>
								</tr>
							</thead>

								<?php foreach ($survey->result() as $result): ?>
							<tbody>
									<td><?php echo $result->id_survey  ?></td>
									<td><?php echo $result->id_pasien  ?></td>
									<td><?php echo $result->survey1  ?></td>
									<td><?php echo $result->survey2  ?></td>
									<td><?php echo $result->survey3  ?></td>
									<td><?php echo $result->survey4  ?></td>
							</tbody>

								<?php endforeach; ?>
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
