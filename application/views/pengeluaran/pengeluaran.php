<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Pengeluaran</li>
        </ol>
    </div><!--/.row-->

    <div class="row"><div class="col-lg-12"><h1 class="page-header">Pengeluaran</h1></div></div><!--/.row-->

    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">
                <div class="col-md-6">
                    <form action="<?php echo base_url('pengeluaran/simpan_pengeluaran');?>" method="POST">
                        <div class="form-group">
                        
                            <label>Tgl</label>
                            <input type="text" class="form-control" id="akhir" name="waktu" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group">
                            <?php echo form_error('keterangan');?>
                            <label>Keterangan</label>
                            <textarea class="form-control" required="" name="keterangan" placeholder="Keterangan" rows="2"><?php echo $this->input->post('keterangan');?></textarea>
                        </div>
                        <div class="form-group">
                            <?php echo form_error('pengambil');?>
                            <label>Pengambil</label>
                            <input type="text" class="form-control" required="" name="pengambil" placeholder="Pengambil" value="<?php echo $this->input->post('pengambil');?>" />
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <?php echo form_error('jumlah');?>
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input class="form-control numeric" required="" type="number" min="0" placeholder="0" maxlength="120" name="jumlah" id="jumlah" value="<?php echo $this->input->post('jumlah');?>" style="text-align:right;" />
                            </div>
                        </div>
                        <button class="btn btn-primary pull-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<script>
    $("#jumlah").keyup(function(){
        
    });
</script>