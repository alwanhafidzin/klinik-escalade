<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Laporan Keuangan</li>
        </ol>
    </div><!--/.row-->

    <div class="row"><div class="col-lg-12"><h1 class="page-header">Laporan Keuangan</h1></div></div><!--/.row-->

    <div class="row">
        <div class="col-xs-12">
		
            <div class="modal-body">
                <form class="form-inline">
                    <input type="date" class="form-control" id="awal" value="<?php echo $awal ?>"/>
                    s/d
                    <input type="date" class="form-control" id="akhir" value="<?php echo $akhir ?>" />
                    <button type="button" class="btn btn-default" id="filter">Filter</button>
                </form>
				</br>
				<div class="panel panel-default">
                <div id="keuangan_filter_pemasukan">
                    <!--<div class="row">
                        <div class="col-md-11">
                            <p class="pull-right">Total Pengeluaran: <b>Rp 500,000</b></p>
                            <br />
                        </div>
                    </div>-->
					<?php echo "1. Pemasukan"; ?>
                    <table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_keuangan');?>" 
                           data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                           data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="waktu" 
                           data-sort-order="asc" data-show-footer="true">
                        <thead>
                            <tr>
                                <th data-formatter="runningFormatter" data-align="center" data-width="50" data-footer-formatter="totalTextFormatter">No.</th>
                                <th data-field="waktu" data-sortable="true" data-width="300" align="center">Waktu</th>
                                <th data-field="jumlah" data-sortable="true" data-width="150" data-align="center" data-footer-formatter="sumFormatter" data-formatter="rupiah">Jumlah</th>
                            </tr>
                        </thead>
                    </table>
					</br>
                </div>
				</div>
            
			
			<div class="panel panel-default">
                <div id="keuangan_filter_pengeluaran">
                    <!--<div class="row">
                        <div class="col-md-11">
                            <p class="pull-right">Total Pengeluaran: <b>Rp 500,000</b></p>
                            <br />
                        </div>
                    </div>-->
					<?php echo "2. Pengeluaran"; ?>
                    <table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_keuangan');?>" 
                           data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                           data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="waktu" 
                           data-sort-order="asc" data-show-footer="true">
                        <thead>
                            <tr>
                                <th data-formatter="runningFormatter" data-align="center" data-width="50" data-footer-formatter="totalTextFormatter">No.</th>
                                <th data-field="waktu" data-sortable="true" data-width="300" align="center">Waktu</th>
                                <th data-field="jumlah" data-sortable="true" data-width="150" data-align="center" data-footer-formatter="sumFormatter" data-formatter="rupiah">Jumlah</th>
                            </tr>
                        </thead>
                    </table>
					</br>
                </div>
				</div>
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
            $("#keuangan_filter_pengeluaran").load("<?php echo base_url('laporan/filter_laporan_keuangan');?>" + "/" + awal + "/" + akhir);
        });


    });
    
    console.log($(".th-inner:last").val());
</script>