<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<!--<div class="row">
    <div class="col-md-11">
        <p class="pull-right">Total Pengeluaran: <b>Rp 600,000</b></p>
        <br />
    </div>
</div>-->

<?php if (($awal==0) and ($akhir==0)):?>
	<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_keuangan');?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="waktu" 
		   data-sort-order="desc" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_awal_keuangan/'.$awal);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="waktu" 
		   data-sort-order="desc" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_akhir_keuangan/'.$akhir);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="waktu" 
		   data-sort-order="desc" data-show-footer="true">
<?php else:?>
	<table data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_keuangan/'.$awal.'/'.$akhir);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" 
		   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="waktu" data-sort-order="desc" data-show-footer="true">
<?php endif;?>
    <thead>
        <tr>
            <th data-formatter="runningFormatter" data-align="right" data-footer-formatter="totalTextFormatter">No.</th>
            <th data-field="waktu" data-sortable="true" data-width="400">Waktu</th>
            <th data-field="jumlah" data-sortable="true" data-align="right" data-width="200" data-footer-formatter="sumFormatter" data-formatter="rupiah">Jumlah</th>
        </tr>
    </thead>
</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>
<!--<script>
    function totalTextFormatter(data){
        return 'Total';
    }
    function sumFormatter(data){
        field = this.field;
        return data.reduce(function(sum, row){
            return sum + (+row[field]);
        },0);
    }
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
            $("#pengeluaran_filter").load("<?php echo base_url('laporan/filter_laporan_pengeluaran');?>" + "/" + awal + "/" + akhir);
        });
    });
</script>-->