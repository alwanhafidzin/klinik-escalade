    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('rekam_medis/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Antrian</li>
                <li class="active">Tambah</li>
            </ol>
        </div><!--/.row-->
        
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Antrian Baru</h1>
			</div>
		</div><!--/.row-->
        
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Antrian</div>
                    <div class="panel-body">
                        <div class="col-md-6">
							<form action="<?php echo $action; ?>" method="post">
								<div class="form-group">
									<label for="varchar">Nama <?php echo form_error('nama') ?></label>
									<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
								</div>
								<input type="hidden" name="no_antrian" value="<?php echo $no_antrian; ?>" /> 
								<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
								<a href="<?php echo site_url('antrian') ?>" class="btn btn-default">Cancel</a>
							</form>
						</div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
	</div><!--/.main-->