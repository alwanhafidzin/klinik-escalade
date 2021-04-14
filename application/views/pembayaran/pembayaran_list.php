		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pembayaran</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Pembayaran Klinik</h1>
				</div>
			</div><!--/.row-->    
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Pembayaran Klinik</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_pembayaran');?>" 
                                           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
                                           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
                                           data-pagination="true" data-sort-name="" data-sort-order="asc">
										<thead>
											<tr>
												<th data-formatter="runningFormatter" data-align="right">No.</th>
												<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
												<th data-field="tanggal" >Waktu Rekam Medis</th>
												<th data-field="Nama" data-sortable="true">Nama</th>
												<!--<th data-field="Alamat" data-sortable="true">Alamat</th>
												<th data-field="No_hp" data-sortable="true">No. Telepon</th>-->
												<th data-field="resep" data-sortable="true">Resep</th>
												<th data-field="diagnosis" data-sortable="true">Diagnosis</th>
												<th data-field="total_bayar" data-sortable="true" data-align="right">Total</th>
												<th data-field="id_rekam_medis" data-formatter="prosesPembayaran" data-align="center">Pembayaran</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

		<script>
			function prosesPembayaran(value){
				return '<a href="<?php echo base_url();?>pembayaran/create/'+value+'" class="btn btn-primary">Proses</a>';
			}
		</script>   