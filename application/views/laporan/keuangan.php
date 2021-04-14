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
                <div class="panel panel-default">
					<div class="modal-body">
                        <form class="form-inline">
                            <input type="text" class="form-control" id="awal" value="<?php echo $awal ?>"/>
                            s/d
                            <input type="text" class="form-control" id="akhir" value="<?php echo $akhir ?>" />
                            <button type="button" class="btn btn-default" id="filter">Filter</button>
                            <a href="javascript:void(0)" class="btn btn-primary pull-right" id="print_klik" >Print</a>
                        </form>
                        <br />
                        <!--<p class="pull-right">Balance : Rp <div id="balance"></div></p>-->
                        
                        <br />
                    </div>
                </div>
				</br>
				<div class="panel panel-default">
					<div class="modal-body">
					<div class="panel-heading">1.1. Laporan Pemasukan Klinik  </div>
					<div id="tabel_filter">
						<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_transaksi');?>"
						data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
						data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name=""
						data-sort-order="" data-show-footer="true">
							<thead>
								<tr>
									<th data-formatter="runningFormatter" data-align="right" data-width="100" data-footer-formatter="totalTextFormatter">No.</th>
									
                                    <th data-field="Nama" data-sortable="true" data-align="left" data-width="300">Nama Pasien</th>
									<th data-field="waktu" data-formatter="waktu" data-align="left" data-width="200">Tanggal</th>
                                    <th data-field="total" data-sortable="true" data-align="right" data-width="150" data-formatter="rupiah" data-footer-formatter="sumFormatter">Total</th>
                                    <th data-field="metode_bayar" data-width="150" data-align="right">Metode Bayar</th>
								</tr>
							</thead>
						</table>
					</div>
					</div>
					
					</div>
					</br>
					
					<div class="panel panel-default">
					<div class="modal-body">
					<div class="panel-heading">1.2. Laporan Pemasukan Apotik</div>
					
					<div id="tabel_filter_apotik">
						<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_apotik');?>"
						data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
						data-search="true" data-select-item-name="toolbar2" data-pagination="true" data-sort-name=""
						data-sort-order="" data-show-footer="true">
							<thead>
								<tr>
									<th data-formatter="runningFormatter" data-align="right" data-width="100" data-footer-formatter="totalTextFormatter">No.</th>
									<th data-field="waktu" data-formatter="waktu" data-align="left" data-width="500">Waktu</th>
									<th data-field="jumlah" data-sortable="true" data-align="right" data-width="150" data-footer-formatter="sumFormatter" data-formatter="rupiah">Jumlah</th>
								</tr>
							</thead>
						</table>
					</div>
					</div>
					</div>
					</br>
            
			
			<div class="panel panel-default">
			
					
					<div class="panel-heading">2. Pengeluaran</div>
					<div class="modal-body">
                <div id="keuangan_filter_pengeluaran">
                    <!--<div class="row">
                        <div class="col-md-11">
                            <p class="pull-right">Total Pengeluaran: <b>Rp 500,000</b></p>
                            <br />
                        </div>
                    </div>-->
                    <table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_keuangan');?>" 
                           data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                           data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
                           data-sort-order="" data-show-footer="true">
                        <thead>
                            <tr>
                                <th data-formatter="runningFormatter" data-align="right" data-width="100" data-footer-formatter="totalTextFormatter">No.</th>
                                <th data-field="waktu" data-formatter="waktu" data-width="500" data-align="left">Waktu</th>
                                <th data-field="jumlah" data-sortable="true" data-width="150" data-align="right" data-footer-formatter="sumFormatter" data-formatter="rupiah">Jumlah</th>
                            </tr>
                        </thead>
                    </table>
					</br>
                </div>
				</div>
				</div>
				<div class="panel panel-default">
				<div class="modal-body">
				<form class="form-inline pull-right">
                            <p id="text_loading" >Loading ...</p>
                            <label>Balance:</label>
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="hidden" class="form-control" style="text-align:right;" id="balance" readonly />
                                <input type="hidden" id="hasil_klinik" value="" />
                                <input type="hidden" id="hasil_apotik" value="" />
                                <input type="hidden" id="hasil_pengeluaran" value="" />
                                <input type="text" class="form-control" style="text-align:right;" id="cek_balance" readonly />
                                <input type="hidden" id="cek_hasil_klinik" value="0">
                                <input type="hidden" id="cek_hasil_apotik" value="0">
                                <input type="hidden" id="cek_hasil_pengeluaran" value="0">
                            </div>
                        </form>
                        <br />
						<br />
						<br />
				</div>
				</div>
            </div>
			</div>
        </div>
    </div>
</div><!-- /.row -->
<script>
    $(document).ready(function(){

        // hitung total pemasukan klinik
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
        
        
        // hitung total pemasukan apotik
        var jsonApotik = (function () {
            var jsonApotik = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': '<?php echo base_url('laporan/data_laporan_apotik');?>',
                'dataType': "json",
                'success': function (data) {
                    jsonApotik = data;
                }
            });
            return jsonApotik;
        })(); 
        console.log(jsonApotik);
        var totalPemasukanApotik = 0;
        for (var key in jsonApotik) {
            if (jsonApotik.hasOwnProperty(key)) {
                console.log(key + " -> " + jsonApotik[key].jumlah);
                totalPemasukanApotik = parseInt(totalPemasukanApotik) + parseInt(jsonApotik[key].jumlah);
                console.log(totalPemasukanApotik);
            }
        }
        
        
        
        // hitung total pengeluaran
        var jsonPengeluaran = (function () {
            var jsonPengeluaran = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': '<?php echo base_url('laporan/data_laporan_keuangan');?>',
                'dataType': "json",
                'success': function (data) {
                    jsonPengeluaran = data;
                }
            });
            return jsonPengeluaran;
        })(); 
        console.log(jsonPengeluaran);
        var totalPengeluaran = 0;
        for (var key in jsonPengeluaran) {
            if (jsonPengeluaran.hasOwnProperty(key)) {
                console.log(key + " -> " + jsonPengeluaran[key].jumlah);
                totalPengeluaran = parseInt(totalPengeluaran) + parseInt(jsonPengeluaran[key].jumlah);
                console.log(totalPengeluaran);
            }
        }
        
        var balance = totalPemasukan + totalPemasukanApotik - totalPengeluaran;
        $("#balance").val(rupiah(balance));
        var awal   = $("#awal").val();
        var akhir  = $("#akhir").val();
        
        if (!awal){
            awal  = 0;
        }
        if (!akhir){
            akhir = 0;
        }

        $.ajax({
            url : "<?php echo base_url('laporan/laporan_pemasukan_filter/')?>/"+ awal + "/" + akhir,
            type: "GET",
            dataType: "JSON",
            success: function(dataef)
            {
                var a = 0;
                if(dataef.jumlah!=null){
                    a=dataef.jumlah;
                }
                document.getElementById('cek_hasil_klinik').value = a;
            },
                error: function (jqXHR, textStatus, errorThrown)
            {
                document.getElementById('cek_hasil_klinik').value = 0;
            }
         });

        $.ajax({
            url : "<?php echo base_url('laporan/laporan_apotik_filter/')?>/"+ awal + "/" + akhir,
            type: "GET",
            dataType: "JSON",
            success: function(dataefg)
            {
                var b = 0;
                if(dataefg.jumlah!=null){
                    b=dataefg.jumlah;
                }
                document.getElementById('cek_hasil_apotik').value = b;
            },
                error: function (jqXHR, textStatus, errorThrown)
            {
                document.getElementById('cek_hasil_apotik').value = 0;
            }
         });

        $.ajax({
            url : "<?php echo base_url('laporan/laporan_keuangan_filter/')?>/"+ awal + "/" + akhir,
            type: "GET",
            dataType: "JSON",
            success: function(dataefh)
            {
                var c = 0;
                if(dataefh.jumlah!=null){
                    c =dataefh.jumlah;
                }
                document.getElementById('cek_hasil_pengeluaran').value = c;
            },
                error: function (jqXHR, textStatus, errorThrown)
            {
                document.getElementById('cek_hasil_pengeluaran').value = 0;
            }
         });

        setTimeout(function(){
            var totalPemasukan       = parseInt($("#cek_hasil_klinik").val());
            var totalPemasukanApotik = parseInt($("#cek_hasil_apotik").val());
            var totalPengeluaran     = parseInt($("#cek_hasil_pengeluaran").val());
            //alert(totalPemasukan);
            console.log(totalPemasukan);
            console.log(totalPemasukanApotik);
            console.log(totalPengeluaran);
            var hasilBalance = totalPemasukan + totalPemasukanApotik - totalPengeluaran;
            console.log(hasilBalance);
            $("#cek_balance").val(rupiah(hasilBalance));
            $("#text_loading").hide();
        },5000);
    });
    
    $("#filter").click(function(){
        $("#text_loading").show();
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
        $("#keuangan_filter_pengeluaran").load("<?php echo base_url('laporan/filter_laporan_keuangan');?>" + "/" + awal + "/" + akhir);

        $.ajax({
            url : "<?php echo base_url('laporan/laporan_pemasukan_filter/')?>/" + "/" + awal + "/" + akhir,
            type: "GET",
            dataType: "JSON",
            success: function(dataef)
            {
                var a = 0;
                if(dataef.jumlah!=null){
                    a=dataef.jumlah;
                }
                document.getElementById('cek_hasil_klinik').value = a;
            },
                error: function (jqXHR, textStatus, errorThrown)
            {
                document.getElementById('cek_hasil_klinik').value = 0;
            }
         });

        $.ajax({
            url : "<?php echo base_url('laporan/laporan_apotik_filter/')?>/" + "/" + awal + "/" + akhir,
            type: "GET",
            dataType: "JSON",
            success: function(dataefg)
            {
                var b = 0;
                if(dataefg.jumlah!=null){
                    b=dataefg.jumlah;
                }
                document.getElementById('cek_hasil_apotik').value = b;
            },
                error: function (jqXHR, textStatus, errorThrown)
            {
                document.getElementById('cek_hasil_apotik').value = 0;
            }
         });

        $.ajax({
            url : "<?php echo base_url('laporan/laporan_keuangan_filter/')?>/" + "/" + awal + "/" + akhir,
            type: "GET",
            dataType: "JSON",
            success: function(dataefh)
            {
                var c = 0;
                if(dataefh.jumlah!=null){
                    c =dataefh.jumlah;
                }
                document.getElementById('cek_hasil_pengeluaran').value = c;
            },
                error: function (jqXHR, textStatus, errorThrown)
            {
                document.getElementById('cek_hasil_pengeluaran').value = 0;
            }
         });

        setTimeout(function(){
            var totalPemasukan       = parseInt($("#cek_hasil_klinik").val());
            var totalPemasukanApotik = parseInt($("#cek_hasil_apotik").val());
            var totalPengeluaran     = parseInt($("#cek_hasil_pengeluaran").val());
            console.log(totalPemasukan);
            console.log(totalPemasukanApotik);
            console.log(totalPengeluaran);
            var hasilBalance = totalPemasukan + totalPemasukanApotik - totalPengeluaran;
			console.log(hasilBalance);
            $("#cek_balance").val(rupiah(hasilBalance));
            $("#text_loading").hide();
        },5000);
    });
    /*$("#hasil_klinik").on('input',function(e){
        $("#balance").val('123');
    });*/
    
    //console.log($(".th-inner:last").val());
</script>


<div id="area-1" style="display: none;" ></div>
<!-- print -->
<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">

    $("#print_klik").click(function(){
        init_print();
    });
    
    function init_print(){
       var $val1=$("#awal").val();
       var $val2=$("#akhir").val();
        $('#area-1').load('<?php echo base_url('print_data/index/'); ?>/'+$val1+'/'+$val2, function() {
          print_semua('area-1');
          
            
        });
     
    }

    function print_semua(elementId) {
        $('#'+elementId).show();
        var a = document.getElementById('printing-css').value;
        var b = document.getElementById(elementId).innerHTML;
        window.frames["print_frame"].document.title = document.title;
        window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
        $('#'+elementId).html('');
        $('#'+elementId).hide();
    }

</script>