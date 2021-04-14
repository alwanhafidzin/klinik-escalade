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
						<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_pasien_rekam_medis');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="">
							<thead>
								<tr>
									<th data-field="id_rekam_medis" data-formatter="runningFormatter" data-align="right">No.</th>
									<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
									<th data-field="nama" >Nama</th>
									<th data-field="keluhan_utama" data-sortable="true">Keluhan</th>
									<th data-field="id_booking" data-formatter="prosesRekamMedis" data-align="center"></th>
								</tr>
							</thead>
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
