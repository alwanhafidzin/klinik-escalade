<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Data Obat</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Obat</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
        <div class="col-lg-12">
			<div id="toolbar" class="btn-group">
                <a href="<?php echo site_url('obat/tambah_obat_baru');?>" type="button" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Obat Baru
                </a>
			</div>
            <table id="all_data_json" data-toggle="table"
                   data-url="<?php echo base_url('obat/data_obat');?>"
                   data-show-refresh="true" data-show-toggle="true"
                   data-show-columns="true" data-search="true"
                   data-select-item-name="toolbar1" data-pagination="true"
                   data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-field="no_antrian" data-align="right">No</th>
                        <th data-field="nama" data-sortable="true">Nama Obat</th>
						<th data-field="id" data-formatter="editObat" data-align="center">Edit Obat</th>
                        <th data-field="kode_krim" data-sortable="true" data-align="right">Kode Krim</th>
                        <th data-field="jumlah" data-sortable="true" data-align="right">Qty</th>
						<th data-field="harga_satuan" data-sortable="true" data-align="right">Harga Satuan</th>
                        <th data-field="id" data-formatter="stok" data-align="center">Stok</th>
					</tr>
                </thead>
            </table>
        </div>
    </div>
</div><!--/.main-->

<script>
    function editObat(value) {
        return '<a href="<?php echo base_url();?>obat/edit_obat/'+value+'" class="btn btn-warning">Edit</a>';
    }
	function stok(value) {
        return '<div class="btn-group" role="group" aria-label="...">' + 
			   '<a href="<?php echo base_url();?>obat/tambah_stok/'+value+'" class="btn btn-primary">Tambah</a>' +
			   '<a href="<?php echo base_url();?>obat/detail_stok_obat/'+value+'" class="btn btn-warning">&nbsp;&nbsp; Lihat &nbsp;&nbsp;</a>' +
			   '</div>';
    }
</script>