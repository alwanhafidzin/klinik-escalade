    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">List</li>
                <li class="active">Layanan / Obat</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Layanan / Obat</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
				<table class="table">
					<tr><td>Layanan / Obat</td><td><?php echo $Layanan; ?></td></tr>
					<tr><td>Harga</td><td><?php echo $Harga; ?></td></tr>
					<tr><td></td><td><a href="<?php echo site_url('layanan') ?>" class="btn btn-default">Batal</a></td></tr>
				</table>
			</div>
		</div>
	</div>