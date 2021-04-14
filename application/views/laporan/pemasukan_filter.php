<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<?php if (($awal==0) and ($akhir==0)):?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_transaksi');?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_awal_transaksi/'.$awal);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_akhir_transaksi/'.$akhir);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php else:?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_transaksi/'.$awal.'/'.$akhir);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php endif;?>
		<thead>
			<tr>
				<th data-formatter="runningFormatter" data-align="right" data-width="50" data-footer-formatter="totalTextFormatter">No.</th>
				<th data-field="Nama" data-align="left" data-width="100" >Nama Pasien</th>
				<th data-field="waktu"   data-formatter="waktu" data-sortable="true" data-align="right" data-width="200">Waktu</th>
				<!--<th data-field="Alamat" data-sortable="true">Alamat</th>
				<th data-field="diagnosis" data-sortable="true">Diagnosis</th>-->
				<th data-field="total_bayar" data-formatter = "rupiah" data-sortable="true" data-align="right" data-width="150" data-footer-formatter="sumFormatter">Total</th>
				<th data-field="metode_bayar" data-width="150" data-align="right">Metode Bayar</th>
			</tr>
		</thead>
	</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>
<script>
     $(document).ready(function(){
         var link = $("#table").attr("data-url");
         console.log(link);
         
         var json = (function () {
            var json = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': link,
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
                console.log(key + " -> " + json[key].total_bayar);
                totalPemasukan = parseInt(totalPemasukan) + parseInt(json[key].total_bayar);
                console.log(totalPemasukan);
            }
        }
         
         $("#hasil_klinik").val(totalPemasukan);
     });
</script>