<!DOCTYPE html>
<html>
	<head><title></title></head>
	<body>
		<table class="table table-bordered" style="margin-bottom: 10px">
			<tr>
				<th>No</th>
				<th>Layanan</th>
				<th>Harga</th>
				<th width="50px">Hapus</th>
			</tr>
			<?php $total= 0;?>
			<?php foreach ($detail_layanan as $dl):?>
				<tr>
					<td width="80px">1</td>
					<td><?php echo $dl['id_layanan'];?></td>
					<td><?php echo $dl['harga_layanan'];?></td>
					<td style="text-align:center"><a href="#" class='btn btn-danger'>X</a></td>
				</tr>
				<?php $total = $total + $dl['harga_layanan'];?>
     		<?php endforeach;?>
		</table>
    	<div align="right">Total Bayar : Rp. <?php echo $total; ?></div>
	</body>
</html>