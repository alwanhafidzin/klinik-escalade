		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('antrian/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Rekam Medis</li>
				</ol>
			</div><!--/.row-->

			<div class="row"><div class="col-lg-12"><h1 class="page-header">Rekam Medis</h1></div></div><!--/.row-->
			
			<div class="row">
				<div class="col-xs-12">
					<div class="modal-body">
						<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_rekam_medis');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="">
							<thead>
								<tr>
									<th data-formatter="runningFormatter" data-align="right">No.</th>
									<th data-field="Nama" >Nama</th>
									<th data-field="Alamat" data-sortable="true">Alamat</th>
									<th data-field="Tanggal_lahir" data-formatter="waktu" >Tanggal Lahir</th>
									<th data-field="No_hp" data-sortable="true">Telepon</th>
									<th data-field="ID_pasien" data-formatter="pilihRekamMedis" data-align="center">Rekam Medis</th>
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
			function pilihRekamMedis(value){
				return '<a href="<?php echo base_url();?>rekam_medis/laporan_rekam_medis_detail/'+value+'" class="btn btn-primary">Lihat</a>';
			}
		</script>