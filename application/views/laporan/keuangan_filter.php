<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<!--<div class="row">
    <div class="col-md-11">
        <p class="pull-right">Total Pengeluaran: <b>Rp 600,000</b></p>
        <br />
    </div>
</div>-->

<?php if (($awal==0) and ($akhir==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_keuangan');?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
		   data-sort-order="" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_awal_keuangan/'.$awal);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
		   data-sort-order="" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_akhir_keuangan/'.$akhir);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
		   data-sort-order="" data-show-footer="true">
<?php else:?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_keuangan/'.$awal.'/'.$akhir);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" 
		   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php endif;?>
    <thead>
        <tr>
            <th data-formatter="runningFormatter" data-align="right" data-width="50" data-footer-formatter="totalTextFormatter">No.</th>
            <th data-field="waktu"  data-formatter="waktu" data-sortable="true" data-width="200" data-align="left">Waktu</th>
            <th data-field="jumlah" data-sortable="true" data-align="right" data-width="150" data-footer-formatter="sumFormatter" >Jumlah</th>
        </tr>
    </thead>
</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>
<script>
     $(document).ready(function(){
         var link = $("#table").attr("data-url");
         console.log(link);
         
         var jsonPengeluaran = (function () {
            var jsonPengeluaran = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': link,
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
         
         $("#hasil_pengeluaran").val(totalPengeluaran);
     });
</script>