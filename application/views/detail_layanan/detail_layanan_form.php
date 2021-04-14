<!DOCTYPE html>
<html>
	<head><title></title></head>
	<body>
		<form action="<?php echo site_url('detail_layanan/tambah_data') ?>" method="post">       
			<input type="hidden" name="id_rekam_medis" value="4">           
			<div class="form-group">
				<label for="varchar">Layanan</label><br>
				<select name="id_layanan" id="layanan" class="form-control" placeholder="Layanan">
					<?php foreach ($layanan as $l):?>
						<option value="<?php echo $l['id_layanan']; ?>"><?php echo $l['Layanan'];?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label for="varchar">Harga Layanan</label>
				<input type="text" class="form-control" name="harga_layanan" id="harga_layanan" placeholder="Harga Layanan" />
			</div>
			<div class="form-group" align="right"><input type="submit" name="submit" value="+" class="btn btn-success"></div>
		</form> 
	</body>
</html>