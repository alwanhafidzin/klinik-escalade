    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('rekam_medis/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Layanan  / Obat</li>
                <li class="active">Edit</li>
            </ol>
        </div><!--/.row-->
        
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Layanan / Obat Baru</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Layanan / Obat</div>
                    <div class="panel-body">
                        <div class="col-md-6">
							<form action="<?php echo $action; ?>" method="post">
								<div class="form-group">
									<label for="varchar">Layanan / Obat <?php echo form_error('Layanan') ?></label>
									<input type="text" class="form-control" name="Layanan" id="Layanan" placeholder="Layanan / Obat" value="<?php echo $Layanan; ?>" />
								</div>
								<div class="form-group">
									<label for="int">Harga <?php echo form_error('Harga') ?></label>
									<input type="text" class="form-control" name="Harga" id="Harga" placeholder="Harga" value="<?php echo $Harga; ?>" />
								</div>
								<input type="hidden" name="id_layanan" value="<?php echo $id_layanan; ?>" /> 
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
								<a href="<?php echo site_url('layanan') ?>" class="btn btn-default">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->