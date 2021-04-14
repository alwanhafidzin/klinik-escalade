    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Data Pasien</li>
                <li class="active">Detail</li>
            </ol>
        </div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Data Pasien</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
					<tr>
						<td width="400px">Foto</td>
						<td><?php if (isset($foto)) echo $foto; ?></td>
					</tr>
					<tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
					<tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
					<tr><td>Tanggal Lahir</td><td><?php echo $Tanggal_lahir; ?></td></tr>
					<tr><td>No Hp</td><td><?php echo $No_hp; ?></td></tr>
					<!--<tr><td>Keluhan Utama</td><td><?php echo $keluhan_utama; ?></td></tr>-->
					<tr><td>Riwayat Penyakit</td><td><?php echo $riwayat_penyakit; ?></td></tr>
					<tr><td>Riwayat Alergi Obat</td><td><?php echo $riwayat_alergi_obat; ?></td></tr>
					<tr><td>Riwayat Pengobatan Sebelumnya</td><td><?php echo $riwayat_pengobatan_sebelumnya; ?></td></tr>
					<tr>
						<td></td>
						<td align="right"><a href="<?php echo site_url('data_pasien') ?>" class="btn btn-primary">Kembali</a></td>                   
					</tr>
				</table>
			</div>
		</div>
	</div>