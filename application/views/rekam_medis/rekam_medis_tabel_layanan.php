<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
	<div class="table-responsive">
		<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_cart_layanan');?>" 
			   data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
			<thead>
				<tr>
					<th data-formatter="runningFormatter" data-align="right">No.</th>
					<th data-field="name" data-sortable="true">Layanan</th>
					<th data-field="qty"s>Qty</th>
					<th data-field="subtotal" data-sortable="true" data-formatter="rupiah">Biaya</th>
					<th data-field="rowid" data-formatter="batal" data-align="center">Batalkan</th>
				</tr>
			</thead>
		</table>
	</div>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>
<script type="text/javascript">
	function runningFormatter(value, row, index) {
		return index+1;
	}
	function batal(value){
		return '<button type="button" onclick="updateCart(' + "'" +value+ "'" + ')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Batal</button>';
	}
	function updateCart(rowid){
		$("#tabel_daftar_layanan").load("<?php echo base_url('rekam_medis/hapus_layanan');?>" + "/" + rowid);
	}
</script>