		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pembayaran</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Pembayaran</h1>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Data Pasien</div>
						<div class="panel-body">
							<div class="panel-body">
							<table class="table">
								<tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
								<tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
								<tr><td>Tanggal Lahir</td><td><?php echo $Tanggal_lahir; ?></td></tr>
								<tr><td>No Hp</td><td><?php echo $No_hp; ?></td></tr>
								<tr><td>Keluhan Utama</td><td><?php echo $keluhan_utama; ?></td></tr>
								<tr><td>Riwayat Penyakit</td><td><?php echo $riwayat_penyakit; ?></td></tr>
								<tr><td>Riwayat Alergi Obat</td><td><?php echo $riwayat_alergi_obat; ?></td></tr>
								<tr><td>Riwayat Pengobatan Sebelumnya</td><td><?php echo $riwayat_pengobatan_sebelumnya; ?></td></tr>
								<tr><td>Diagnosis</td><td><?php echo $diagnosis; ?></td></tr>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Detail Layanan & Obat</div>
						<div class="panel-body">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
                                        <div id="table_pembayaran">
                                            <table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_pembayaran_layanan/'.$id_rekam_medis);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal" data-sort-order="desc">
											<thead>
											<tr>
											<th data-formatter="runningFormatter" data-align="right">No.</th>
											<th data-field="nama" data-sortable="true">Nama Layanan</th>
											<th data-field="harga" data-sortable="true">Harga Layanan</th>
											</tr>
											</thead>
											</table>
											
											<table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_pembayaran_obat/'.$id_rekam_medis);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal" data-sort-order="desc">
											<thead>
											<tr>
											<th data-formatter="runningFormatter" data-align="right">No.</th>
											<th data-field="nama" data-sortable="true">Nama Obat</th>
											<th data-field="harga" data-sortable="true">Harga Satuan</th>
											<th data-field="total" data-sortable="true">Total Harga</th>
											<th data-field="id" data-formatter="hapusPembayaran" data-align="center">Action</th>
											</tr>
											</thead>
											</table>
                                        </div>
									</div>
								</div>
								<br />
								<br />
							</div>
						</div>
					</div>
				</div><!-- /.col-->
			</div><!-- /.row -->
		</div><!--/.main-->
		<script type="text/javascript">
			function runningFormatter(value, row, index) {
                return index+1;
            }
			function hapusPembayaran(value){
				return '<a href="<?php echo base_url();?>pembayaran/del_obat/'+ <?php echo $id_rekam_medis?> + '/' +value+'" class="btn btn-danger">Hapus</a>';
			}
			$(document).ready(function(){
				 $.ajax({
					url: "<?php echo site_url();?>rekam_medis/get_content_get",
					success: function(response){
						$("#resultget").html(response);
					}
				 });
			});
			function deletePembayaran(value){
				
			}
		</script>
	</body>
</html>