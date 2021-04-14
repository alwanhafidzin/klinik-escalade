		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('antrian/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Laporan Transaksi</li>
				</ol>
			</div><!--/.row-->

			<div class="row"><div class="col-lg-12"><h1 class="page-header">Laporan Transaksi</h1></div></div><!--/.row-->
			
			<div class="row">
				<div class="col-xs-12">
					<div class="modal-body">
						<form class="form-inline">
							<input type="text" class="form-control" id="awal" value="<?php echo $awal;?>" />
							s/d
							<input type="text" class="form-control" id="akhir" value="<?php echo $akhir;?>" />
							<button type="button" class="btn btn-default" id="filter">Filter</button>
							
							<div class="btn-group pull-right" role="group" aria-label="...">
									  <button type="button" class="btn btn-primary "  onclick="printContent('tabel_filter','<?php echo base_url('laporan/laporan_transaksi.html') ?>')" >Print</button>
                                    

                                     <div class="btn-group pull-right" role="group">
								        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          Export
								          <span class="caret"></span>
								        </button>
								        <ul class="dropdown-menu">
								          <li><a href="#" onclick="export_excel('excel','Laporan Pemasukan Klinik')">EXCEL</a></li>
								          <li><a href="#" onclick="export_excel('pdf','Laporan Pemasukan Klinik')">PDF</a></li>
								        </ul>
								      </div>
									</div>


						</form>
						<div id="tabel_filter">
						
						<div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Laporan Pemasukan Klinik Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
                                    </h3>
                                </div>
							<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_transaksi');?>" 
                                   data-striped="true" data-show-refresh="true" data-show-toggle="true" 
                                   data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
                                   data-pagination="true" data-sort-name="waktu" data-sort-order="desc"
                                   data-show-footer="true">
								<thead>
									<tr>
										<th data-formatter="runningFormatter" data-align="right" >No.</th>
										<th data-field="waktu" data-width="170" data-formatter="waktu">Waktu</th>
										<th data-field="Nama" data-sortable="true">Nama</th>
										<!--<th data-field="Alamat" data-sortable="true">Alamat</th>
										<th data-field="diagnosis" data-sortable="true">Diagnosis</th>-->
										<th data-field="total_bayar" data-sortable="true" data-width="170"  data-formatter="rupiah2" data-footer-formatter="sumFormatterPemasukan" data-align="right;" >Total</th>
										<th data-field="metode_bayar" data-width="150" data-align="right">Metode Bayar</th>
									</tr>
								</thead>

								 <tfoot>
			                      <tr>
			                        <td style="text-align: right;" >Total</td>
			                        <td></td>
			                        <td></td>
			                        <td id="total_pemasukanred" style="text-align: right;" >Total</td>
			                        <td></td>
			                        

			                      </tr>
			                    </tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->

	   <script>
			$(document).ready(function(){
				$("#filter").click(function(){
					var awal   = $("#awal").val();
					var akhir  = $("#akhir").val();
					if (!awal){
						awal  = 0;
					}
					if (!akhir){
						akhir = 0;
					}
					console.log(awal+'/'+akhir);
					$("#tabel_filter").load("<?php echo base_url('laporan/filter_laporan_transaksi');?>" + "/" + awal + "/" + akhir);
				});
			});


			function waktu(value){
				var d = new Date();
				return d;
			}

			function sumFormatterPemasukan(data){
                field = this.field;
                

                var total_sum = data.reduce(function (sum, row) {
		            console.log(sum);
		            return (sum) + (parseInt(row[field]) || 0);
		        }, 0);
		         $("#total_pemasukanred").html(rupiah2(total_sum));
            }
		</script>