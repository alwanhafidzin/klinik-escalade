<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Tambah Stok Obat</li>
        </ol>
    </div><!--/.row-->

    <div class="row"><div class="col-lg-12"><h1 class="page-header">Tambah Stok Obat</h1></div></div><!--/.row-->

    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">
                <div class="col-md-6">
                    <form action="<?php echo base_url('obat/simpan_stok/'.$id);?>" method="POST">
                        <div class="form-group">
                            <h4>Nama obat : <b><?php echo $nama_obat;?></b></h4>
                        </div>
						<br />
						<div class="form-group">
                            <label>Jumlah</label>
                            <?php echo form_error('jumlah');?>
                            <input class="form-control numeric" type="number" min="0" placeholder="0" maxlength="120" name="jumlah" id="jumlah" value="<?php echo $this->input->post('jumlah');?>" style="text-align:right;" />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Obat Masuk</label>
                        
                            <input id="awal" type="text" class="form-control" required="" name="tgl_masuk" value="" />
                        </div>
						<div class="form-group">
                            <label>Tanggal expired</label>
                            <?php echo form_error('pengambil');?>
							<input id="akhir" type="text" class="form-control" required="" name="tanggal_expired" value="" />
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