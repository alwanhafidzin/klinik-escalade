<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Tambah Obat Baru</li>
        </ol>
    </div><!--/.row-->

    <div class="row"><div class="col-lg-12"><h1 class="page-header">Tambah Obat Baru</h1></div></div><!--/.row-->

    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">
                <div class="col-md-6">
                    <form action="<?php echo base_url('obat/simpan_obat');?>" method="POST">
                        <div class="form-group">
                            <?php echo form_error('nama_obat');?>
                            <label>Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" value="<?php echo $this->input->post('nama_obat');?>" />
                        </div>
                        <div class="form-group">
                            <?php echo form_error('kode_krim');?>
                            <label>Kode Krim</label>
                            <input type="text" class="form-control" name="kode_krim" placeholder="Kode Krim" value="<?php echo $this->input->post('kode_krim');?>" />
                        </div>
						<div class="form-group">
                            <label>Harga Satuan</label>
                            <?php echo form_error('harga_satuan');?>
							<div class="input-group">
								<div class="input-group-addon">Rp</div>
                            	<input class="form-control numeric" type="number" min="0" placeholder="0" maxlength="120" name="harga_satuan" id="jumlah" value="<?php echo $this->input->post('harga_satuan');?>" style="text-align:right;" />
							</div>
						</div>
                        <button class="btn btn-primary pull-right">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<script>
    $("#jumlah").keyup(function(){
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>