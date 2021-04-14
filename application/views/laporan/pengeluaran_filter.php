<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<!--<div class="row">
    <div class="col-md-11">
        <p class="pull-right">Total Pengeluaran: <b>Rp 600,000</b></p>
        <br />
    </div>
</div>-->
 <div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Laporan Pengeluaran  Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
                                    </h3>
                                </div>
<?php if (($awal==0) and ($akhir==0)):?>
	<table  id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_pengeluaran');?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
		   data-sort-order="" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table  id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_awal_pengeluaran/'.$awal);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
		   data-sort-order="" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table  id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_akhir_pengeluaran/'.$akhir);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
		   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
		   data-sort-order="" data-show-footer="true">
<?php else:?>
	<table  id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_pengeluaran/'.$awal.'/'.$akhir);?>" 
		   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" 
		   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php endif;?>
    <thead>
        <tr>
            <th data-formatter="runningFormatter" data-align="right" data-width="100" >No.</th>
            <th data-field="waktu" data-formatter="waktu" data-align="right" data-width="200">Waktu</th>
            <th data-field="keterangan" data-sortable="true" data-align="left" data-width="200">Keterangan</th>
            <th data-field="pengambil" data-sortable="true" data-align="left" data-width="100">Pengambil</th>
            <th data-field="jumlah" data-sortable="true" data-align="right" data-width="150" data-footer-formatter="sumFormatterPemasukan" data-formatter="rupiah2">Jumlah</th>
                                <th data-field="id|waktu|jumlah|keterangan|pengambil" data-formatter="editpengeluaran" data-width="50">Action</th>
        </tr>
    </thead>
    <tfoot>
                                  <tr>
                                    <td style="text-align: right;" >Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td id="total_pemasukanred" style="text-align: right;" >Total</td>
                                    <td></td>
                                    

                                  </tr>
                                </tfoot>
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