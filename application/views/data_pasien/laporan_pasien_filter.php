<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<?php if (($awal==0) and ($akhir==0)):?>
	<table data-toggle="table" data-url="<?php echo base_url('data_pasien/data_laporan_pasien');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table data-toggle="table" data-url="<?php echo base_url('data_pasien/data_laporan_filter_awal_pasien/'.$awal);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table data-toggle="table" data-url="<?php echo base_url('data_pasien/data_laporan_filter_akhir_pasien/'.$akhir);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc">
<?php else:?>
	<table data-toggle="table" data-url="<?php echo base_url('data_pasien/data_laporan_filter_pasien/'.$awal.'/'.$akhir);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc">
<?php endif;?>
		<thead>
			<tr>
				<th data-formatter="runningFormatter" data-align="right">No.</th>
				<th data-field="tanggal" data-sortable="true">Tanggal</th>
				<th data-field="Nama" data-sortable="true">Nama</th>
				<th data-field="Tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
				<th data-field="diagnosis" data-sortable="true">Diagnosis</th>
				<th data-field="total_bayar" data-sortable="true">Total</th>
			</tr>
		</thead>
	</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>