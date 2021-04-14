		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Laporan Penjualan Obat</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Laporan Penjualan Obat</h1>
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
									  <button type="button" class="btn btn-primary "  onclick="printContent('tabel_filter','<?php echo base_url('laporan/laporan_obat.html'); ?>')" >Print</button>
                                    

                                     <div class="btn-group pull-right" role="group">
								        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          Export
								          <span class="caret"></span>
								        </button>
								        <ul class="dropdown-menu">
								          <li><a href="#" onclick="export_excel('excel','Laporan Penjualan Obat')">EXCEL</a></li>
								          <li><a href="#" onclick="export_excel('pdf','Laporan Penjualan Obat')">PDF</a></li>
								        </ul>
								      </div>
									</div>
                                    
								</form>
								<div id="tabel_filter">

                                <div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Penjualan Obat Tanggal  <?php echo date('Y-m-d'); ?> - <?php echo date('Y-m-d'); ?>
                                    </h3>
                                </div>
								
									<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_obat/'.date('Y-m-d 00:00:00').'/'.date('Y-m-d 23:59:59'));?>"
									data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
									data-search="true" data-select-item-name="toolbar2" data-pagination="true" data-sort-name=""
									data-sort-order="" data-show-footer="true"


                                    >
										<thead>
											<tr>
											<th data-formatter="runningFormatter" data-align="right" data-width="50" >No.</th>
											<th data-field="nama" data-sortable="true" data-align="left" data-width="200" >Nama Obat</th>
											<th data-field="kode_krim" data-sortable="true" data-align="left" data-width="200" >Kode Krim</th>
											<th data-field="sisa_obat_per"   data-sortable="true" data-align="right" data-width="100">Sisa Stock</th>
											
                                             <th data-field="jumlah" data-footer-formatter="jumlah_stok"   data-sortable="true" data-align="right" data-width="100">Terjual</th>
											
											</tr>
										</thead>
                                        <tfoot>
                                        <tr style="background-color: #f9f9f9;">
                                            <td><b>Total</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td  id="total_penjualan_obat"
                                                style="
                                                    text-align: right;
                                                    border-left: 2px solid #f5f5f5;
                                                "
                                                ><b>3</b></td>
                                            
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
            console.log("<?php echo base_url('laporan/filter_laporan_obat');?>" + "/" + awal + "/" + akhir);
            $("#tabel_filter").load("<?php echo base_url('laporan/filter_laporan_obat');?>" + "/" + awal + "/" + akhir);
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

function jumlah_stok(data) {
        var field = this.field;

        var total_sum = data.reduce(function (sum, row) {
            console.log(sum);
            return (sum) + (parseInt(row[field]) || 0);
        }, 0);
        $("#total_penjualan_obat").html(total_sum);
        
        return "";
    }

//     function printContent(el){
//                $(".fixed-table-toolbar").hide();
//                                $(".fixed-table-footer").hide();
//                $("#letak_tgl").show();
//                                var $table = $('#table');
//                                $table.bootstrapTable('togglePagination');
//                                console.log("ooo");
//                var restorepage = document.body.innerHTML;
//                var printcontent = document.getElementById(el).innerHTML;
//                document.body.innerHTML = printcontent;
//                window.print();
//                document.body.innerHTML = restorepage;
//                show_tbl();
//            }
//
//            function export_excel(fileType){
//                var $table = $('#table');
//                $table.bootstrapTable('togglePagination');
//
//                $table.tableExport({
//                  type: fileType,
//                  fileName:'Laporan Penjualan Obat',
//                  escape: false
//                });
//               // window.location.replace("<?php echo base_url('laporan/laporan_obat.html'); ?>");
//                $table.bootstrapTable('togglePagination');
//            }
//            function show_tbl() {
//                $(".fixed-table-toolbar").show();
//                $("#letak_tgl").hide();
//                window.location.replace("<?php echo base_url('laporan/laporan_obat.html'); ?>");
//            }

    
    //console.log($(".th-inner:last").val());
</script>