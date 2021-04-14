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
      <h3><?php echo $data_obat[0]->nama; ?></h3>
		</div>
	</div><!--/.row-->

	<div class="row">
        <div class="col-lg-12">

            <table id="all_data_json" data-toggle="table"
                   data-url="<?php echo base_url('obat/get_data_detail_obat/'.$id_obat);?>"
                   data-show-refresh="true" data-show-toggle="true"
                   data-show-columns="true" data-search="true"
                   data-select-item-name="toolbar1" data-pagination="true"
                   data-sort-name="" data-sort-order="" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-field="no_antrian" data-align="right">No</th>
                        <th data-field="tanggal_expired" data-formatter="waktu_non_tgl">Tanggal Expired</th>

                        <th data-field="jumlah" data-sortable="true" data-align="right">Qty</th>
						            
                        <th data-field="id" data-formatter="stok" data-align="center">Stok</th>
					</tr>
                </thead>
            </table>
        </div>
    </div>
</div><!--/.main-->

<!-- Modal -->
<div class="modal fade" id="modal_tambah_obat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" action="<?=base_url('obat/tambah_stok_detail')?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Stok tanggal <span id="title_tanggal"></span></h4>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Obat</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="jumlah_obat" name="jumlah_obat" placeholder="0" required="">
                <input type="hidden" class="form-control" id="id_add_obat" name="id_add_obat" >
              </div>
            </div>
         
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit_stok_obat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" action="<?=base_url('obat/edit_stok_detail')?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Stok Obat</h4>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Obat</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="jumlah_edit_obat" name="jumlah_obat" placeholder="Jumlah Obat" required="">
                <input type="text" class="form-control" id="id_edit_obat" name="id_edit_obat" >
              </div>
            </div>
         
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" ></div>
        <div class="modal-body">
          Apakah anda yakin ingin menghapus?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a id="link_hapus" type="submit" class="btn btn-danger">Lanjutkan</a>
        </div>

     

    </div>
  </div>
</div>

<script>

  function add_stok(id,tgl){
    $("#id_add_obat").val(id);
    $("#title_tanggal").html(tgl);
    $("#modal_tambah_obat").modal('show');
  }
  
  function hapus_stok(id,jumlah){
    $("#id_edit_obat").val(id);
    $("#jumlah_edit_obat").val(jumlah);
    $("#modal_edit_stok_obat").modal('show');
  }

	function stok(value, row, index) {
        return '<div class="btn-group" role="group" aria-label="...">' + 
			   '<button onclick="add_stok('+row.id+',\''+row.tanggal_expired+'\')" class="btn btn-primary">Edit</button>' +
			   '<button onclick="save_hapus('+row.id+')" class="btn btn-warning">&nbsp;&nbsp; Hapus &nbsp;&nbsp;</button>' +
			   '</div>';
  }

  function save_hapus(value){
    $("#link_hapus").attr("href", "<?=base_url()?>obat/hapus_stok_detail/"+value);
    $("#modal_hapus").modal('show');
    

  }
</script>