<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">

<div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Laporan Transaksi Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
                                    </h3>
                                </div>
<?php if (($awal==0) and ($akhir==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_transaksi');?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_awal_transaksi/'.$awal);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_akhir_transaksi/'.$akhir);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php else:?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_transaksi/'.$awal.'/'.$akhir);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php endif;?>
		<thead>
			<tr>
				<th data-formatter="runningFormatter" data-align="right" >No.</th>
				<th data-field="waktu" data-width="170" data-formatter="waktu">Waktu</th>
				<th data-field="Nama" data-sortable="true">Nama</th>
				<!--<th data-field="Alamat" data-sortable="true">Alamat</th>
				<th data-field="diagnosis" data-sortable="true">Diagnosis</th>-->
				<th data-field="total_bayar" data-sortable="true" data-width="170" data-formatter="rupiah2" data-footer-formatter="sumFormatterPemasukan"  data-align="right">Total</th>
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
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>