    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('rekam_medis/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Metode Pembayaran</li>
                <li class="active">Tambah</li>
            </ol>
        </div><!--/.row-->
        
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Metode Pembayaran</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Metode Pembayaran</div>
                    <div class="panel-body">
                        <div class="col-md-6">
							<form action="<?php echo base_url('metodebayar/create_action/');?>" method="post">
								<div class="form-group">
									<label for="varchar">Nama Metode Pembayaran <?php echo form_error('nama_metode') ?></label>
									<input type="text" class="form-control" name="nama_metode" id="nama_metode" placeholder="Metode Pembayaran" value="<?php echo $nama_metode; ?>" />
								</div>
								<input type="hidden" name="id_metode" value="<?php echo $id_metode; ?>" /> 
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
								<a href="<?php echo site_url('metodebayar') ?>" class="btn btn-default">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->