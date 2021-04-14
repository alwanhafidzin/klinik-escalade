    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Rekam Medis</li>
                <li class="active">Detail</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail Rekam Medis</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
				<table class="table">
					<tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
					<tr><td>Nama Pasien</td><td><?php echo $nama_pasien; ?></td></tr>
					<tr><td>Diagnosis</td><td><?php echo $diagnosis; ?></td></tr>
					<tr><td>Tanggal Next Control</td><td><?php echo $tanggal_next_control; ?></td></tr>
					<tr><td></td><td><a href="<?php echo site_url('rekam_medis') ?>" class="btn btn-default">Kembali</a></td></tr>
				</table>
			</div>
		</div>
	</div>