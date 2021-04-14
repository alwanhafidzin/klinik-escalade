<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_pembayaran_layanan/'.$id_rekam_medis);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal" data-sort-order="desc">
	<thead>
		<tr>
			<th data-formatter="runningFormatter" data-align="right">No.</th>
			<th data-field="nama" data-sortable="true">Nama Layanan</th>
			<th data-field="harga" data-sortable="true">Harga Layanan</th>
		</tr>
	</thead>
</table>
											
<table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_pembayaran_obat/'.$id_rekam_medis);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal" data-sort-order="desc">
	<thead>
		<tr>
			<th data-formatter="runningFormatter" data-align="right">No.</th>
			<th data-field="nama" data-sortable="true">Nama Obat</th>
			<th data-field="harga" data-sortable="true">Harga Satuan</th>
			<th data-field="total" data-sortable="true">Total Harga</th>
			<th data-field="id" data-formatter="hapusPembayaran" data-align="center">Action</th>
		</tr>
	</thead>
</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>