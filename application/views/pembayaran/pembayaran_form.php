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
						<div class="panel-heading">Form Pembayaran</div>
						<div class="panel-body">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<!--<div class="form-group" id="resultget"></div>-->
										<!--<div class="table-responsive">
											<table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_pembayaran_detail/'.$id_rekam_medis);?>" data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
												<thead>
													<tr>
														<th data-formatter="runningFormatter" data-align="right">No.</th>
														<th data-field="Layanan" data-sortable="true">Layanan</th>
														<th data-field="Harga" data-sortable="true">Biaya</th>
													</tr>
												</thead>
											</table>
								        </div>-->
                                        <div class="table-responsive">
                                            <table data-toggle="table">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Item</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <?php $i=1;?>
                                                <tbody>
                                                    <?php $total_layanan=0;?>
                                                    <?php foreach($layanan_layanan as $layanan):?>
                                                    <tr>
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo $layanan->Layanan;?></td>
                                                        <td>1</td>
                                                        <td><?php echo $layanan->harga_layanan;?></td>
                                                        <td><?php echo $layanan->harga_layanan;?></td>
                                                        <?php $total_layanan = $total_layanan + $layanan->harga_layanan;?>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php $total_obat=0;?>
                                                    <?php foreach($obat_obat as $obat):?>
                                                    <tr>
                                                        <td><?php echo $i++;?></td>
                                                        <td><?php echo $obat->nama;?></td>
                                                        <td><?php echo $obat->jumlah;?></td>
                                                        <td><?php echo $obat->harga_satuan_obat;?></td>
                                                        <td><?php echo $obat->jumlah * $obat->harga_satuan_obat;?></td>
                                                        <?php $total_obat = $total_obat + ($obat->jumlah * $obat->harga_satuan_obat);?>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                                <?php $total = $total_layanan + $total_obat;?>
                                            </table>
                                            <!--<?php echo $total;?>-->
                                        </div>
									</div>
									<form action="<?php echo base_url('pembayaran/simpan_pembayaran/'.$id_rekam_medis.'/'.$total);?>" method="post" target = "_blank">
										<div class="col-md-6">

											<div class="form-group">
												<label class="col-sm-5 control-label" style="text-align:right">Tanggal</label>
												<div class="col-sm-7">
													<input type="text" id="tgl_plug" class="form-control" name="tgl_input" style="background-color: #fff; cursor:text" required="">
												</div>
											</div>
											<br />
											<br />
											<div class="form-group">
												<label class="col-sm-5 control-label" style="text-align:right">Total</label>
												<div class="col-sm-7">
													<div class="input-group">
														<div class="input-group-addon">Rp</div>
														<input class="form-control" type="text" id="total" placeholder="0" style="text-align:right;" value="<?php echo number_format($data_rev_bayar);?>" readonly name="total" />
													</div>
												</div>
											</div>
											<br />
											<br />
											<div class="form-group">
												<label class="col-sm-5 control-label" style="text-align:right">Metode Pembayaran</label>
												<div class="col-sm-7">
												<select name ="metode_pembayaran" id = "metode_pembayaran" class= "form-control select">	
												<?php foreach($metodebayar as $metode){?>
													<option value="<?php echo $metode['nama_metode'];?>" style="text-align:right"><?php echo $metode['nama_metode'];?></option>
												<?php }?>
												</select>
												</div>
											</div>
											<br />
											<br />
											<div class="form-group">
												<label class="col-sm-5 control-label" style="text-align:right">Pembayaran</label>
												<div class="col-sm-7">
													<div class="input-group">
														<div class="input-group-addon">Rp</div>
														<input class="form-control numeric" placeholder="0" id="pembayaran" style="text-align:right;" name="pembayaran" />
													</div>
												</div>
											</div>
											<br />
											<br />
											<br />
											<br />
											<div class="form-group">
												<label class="col-sm-5 control-label" style="text-align:right">Kembalian</label>
												<div class="col-sm-7">
													<div class="input-group">
														<div class="input-group-addon">Rp</div>
														<input class="form-control" type="text" placeholder="0" id="kembalian" style="text-align:right;" name="kembalian" readonly />
													</div>
												</div>
											</div>
											<br />
											<br />
											<br />
											<div class="btn-toolbar" role="toolbar">
												<button type="button" disabled class="btn btn-primary pull-right proses" id="btn_modal" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Proses</button>
											</div>
											<div class="modal fade" id="myModal">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">Transaksi</h4>
														</div>
														<div class="row">
															<div class="col-xs-12">
																<div class="modal-body">
																	<p>Apakah anda yakin akan memproses pembayaran ?</p>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button class="btn btn-primary" id="cetak">Cetak</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
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
			$(document).ready(function(){
				 $.ajax({
					url: "<?php echo site_url();?>rekam_medis/get_content_get",
					success: function(response){
						$("#resultget").html(response);
					}
				 });
			});
			$("#pembayaran").keyup(function(){
				var total 		= <?php echo $data_rev_bayar;?>;
				var pembayaran  = $("#pembayaran").val();
				var jumlah 	= <?php echo $i;?>;

				if ((pembayaran < total) || (jumlah <= 1)){
					$(".proses").attr('disabled', true);
				}
				else{
					$(".proses").attr('disabled', false);
				}

				var hasil = pembayaran - total;
                $('#kembalian').val((hasil + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
			});
			$("#cetak").click(function(){
				if ($("#tgl_plug").val()=="") {
					$("#myModal").modal('hide');
					alert("Tanggal tidak boleh kosong");
				}else{
					setTimeout(function() {
						window.location.href = '<?php echo base_url('antrian');?>';
					},1000);
				}
				
			});
			
			$('#metode_pembayaran').on('change', function(){
		if(this.value.toUpperCase() != "TUNAI"){
			var bayar = $('#total').val().replace(/,/g,'');
			$('input[name="pembayaran"]').val(bayar+"");
			$(".proses").attr('disabled', false);
			$('input[name="kembalian"]').val(0+"");
		}
		else{
			$('input[name="pembayaran"]').val(0+"");
			$(".proses").attr('disabled', true);
			$('input[name="kembalian"]').val(0+"");
		}
	
	});
		</script>
	</body>
</html>