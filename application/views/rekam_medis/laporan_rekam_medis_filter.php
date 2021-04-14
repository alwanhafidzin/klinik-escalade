<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">

<?php if (($awal==0) and ($akhir==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_rekam_medis_detail/'.$id_pasien);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_filter_awal/'.$awal.$id_pasien);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_filter_akhir/'.$akhir.$id_pasien);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php else:?>
	<table id="table" data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_filter/'.$awal.$akhir.$id_pasien);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php endif;?>
		<thead>
			<tr>
				<th data-formatter="runningFormatter" data-align="right">No.</th>
									<th data-field="tanggal"  data-formatter="waktu" data-sortable="true">Tanggal</th>
									<th data-field="keluhan_utama" data-sortable="true">Keluhan</th>
									<th data-field="diagnosis" data-sortable="true">Diagnosis</th>
									<th data-field="resep" data-sortable="true">Resep</th>
									<th data-field="foto" data-align="center" data-formatter="show_image"  >Foto</th>
				<th data-field="total_bayar" data-sortable="true">Harga</th>
			</tr>
		</thead>
	</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>