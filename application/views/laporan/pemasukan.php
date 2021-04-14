		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Laporan Pemasukan Apotik</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Laporan Pemasukan Apotik</h1>
				</div>
			</div><!--/.row-->    
					<div class="row">
						<div class="col-xs-12">
							<div class="modal-body">
								<form class="form-inline">
									<input type="text" class="form-control" id="awal" value="<?php echo $awal; ?>"/>
									s/d
									<input type="text" class="form-control" id="akhir" value="<?php echo $akhir; ?>"/>
									<button type="button" class="btn btn-default" id="filter">Filter</button>
									<div class="btn-group pull-right" role="group" aria-label="...">
									  <button type="button" class="btn btn-primary "  onclick="printContent('tabel_filter_apotik','<?php echo base_url('laporan/laporan_pemasukan.html'); ?>')" >Print</button>
                                    

                                     <div class="btn-group pull-right" role="group">
								        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          Export
								          <span class="caret"></span>
								        </button>
								        <ul class="dropdown-menu">
								          <li><a href="#" onclick="export_excel('excel','Laporan Pemasukan Apotik')">EXCEL</a></li>
								          <li><a href="#" onclick="export_excel('pdf','Laporan Pemasukan Apotik')">PDF</a></li>
								        </ul>
								      </div>
									</div>
								</form>
								<!--</br>-->
								
								<!--<div class="panel panel-default">
								<div class="modal-body">
								<div class="panel-heading">1. Laporan Pemasukan Klinik</div>
								<div id="tabel_filter">
									<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_transaksi');?>"
									data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
									data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal"
									data-sort-order="desc">
										<thead>
											<tr>
												<th data-formatter="runningFormatter" data-align="right" data-width="100">No.</th>
												<th data-field="Nama" data-sortable="true" data-align="left" data-width="300">Nama Pasien</th>
												<th data-field="waktu" data-sortable="true" data-align="right" data-width="200">Tanggal</th>
												<th data-field="total" data-sortable="true" data-align="right" data-width="150">Jumlah</th>
											</tr>
										</thead>
									</table>
								</div>
								</div>
								
								</div>-->
								<!--</br>-->
								
								<!--<div class="panel panel-default">-->
								<!--<div class="modal-body">-->
								<!--<div class="panel-heading">2. Laporan Pemasukan Apotik</div>-->
								
								<div id="tabel_filter_apotik">
								<div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Laporan Pemasukan Apotik Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
                                    </h3>
                                </div>
									<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_apotik');?>"
									data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
									data-search="true" data-select-item-name="toolbar2" data-pagination="true" data-sort-name=""
									data-sort-order="" data-show-footer="true">
										<thead>
											<tr>
												<th data-formatter="runningFormatter" data-align="right" data-width="30" >No.</th>
												<th data-field="waktu" data-align="left" data-formatter="waktu" data-width="100">Waktu</th>
												<th data-field="metode_bayar" data-width="150" data-align="right">Metode Bayar</th>
												<th data-field="jumlah" data-sortable="true" data-align="right" data-width="150" data-formatter="rupiah2" data-footer-formatter="sumFormatterPemasukan">Jumlah</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<td>Total</td>
												<td></td>
												<td></td>
												<td id="total_pemasukanred" style="text-align: right;" >Total</td>

											</tr>
										</tfoot>
									</table>
								</div>
								<!--</div>-->
								<!--</div>-->
								</br>
                            </div>
							</div>
						</div>
			</div><!-- /.col-->
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
            $("#tabel_filter").load("<?php echo base_url('laporan/filter_laporan_pemasukan');?>" + "/" + awal + "/" + akhir);
            $("#tabel_filter_apotik").load("<?php echo base_url('laporan/filter_laporan_apotik');?>" + "/" + awal + "/" + akhir);
        });


        // hitung total pemasukan
        var json = (function () {
            var json = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': '<?php echo base_url('laporan/data_laporan_transaksi');?>',
                'dataType': "json",
                'success': function (data) {
                    json = data;
                }
            });
            return json;
        })(); 
        console.log(json);
        var totalPemasukan = 0;
        for (var key in json) {
            if (json.hasOwnProperty(key)) {
                console.log(key + " -> " + json[key].total);
                totalPemasukan = parseInt(totalPemasukan) + parseInt(json[key].total);
                console.log(totalPemasukan);
            }
        }
        
        
        // hitung total pengeluaran
        var json = (function () {
            var json = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': '<?php echo base_url('laporan/data_laporan_transaksi');?>',
                'dataType': "json",
                'success': function (data) {
                    json = data;
                }
            });
            return json;
        })(); 
        console.log(json);
        var totalPemasukan = 0;
        for (var key in json) {
            if (json.hasOwnProperty(key)) {
                console.log(key + " -> " + json[key].total);
                totalPemasukan = parseInt(totalPemasukan) + parseInt(json[key].total);
                console.log(totalPemasukan);
            }
        }
    });

    function sumFormatterPemasukan(data){
                field = this.field;
                

                var total_sum = data.reduce(function (sum, row) {
		            console.log(sum);
		            return (sum) + (parseInt(row[field]) || 0);
		        }, 0);
		         $("#total_pemasukanred").html(rupiah2(total_sum));
            }
    
    //console.log($(".th-inner:last").val());
</script>