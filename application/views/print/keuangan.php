<!DOCTYPE html>
<html>
<head>
	<title>Laporan Keuangan Tanggal <?php echo $awal." - ".$akhir; ?></title>
	<style type="text/css">
		body{
				margin:0;
			}

			*{
				box-sizing: border-box;
				margin:0;
				padding: 5px;
			}

			table, td, th{
				border:solid 1px black;
				    border-collapse: collapse;
			}

			.a1-1{
				width: 100%;
				/*padding: 20px 25%;*/
			}

			.a1-2{
				width: 100%;
				/*padding: 20px 25%;*/
			}

			.a-2{
				width: 100%;
				/*padding: 20px 25%;*/
			}




	</style>
</head>
<body>
	<div class=a1-1>
		<h3 style="padding-bottom: 5px;">1.1 Laporan Pemasukan Klinik</h3>
		<table style="width: 100%; border:0;  ">
			<tr class="a">
				<th>No.</th>
				<th>Nama Pasien</th>
				<th>Tanggal/Waktu</th>
				<th>Metode Bayar</th>
				<th>Total</th>
			</tr>
			<?php
				$jumlah_total_pemasukan=0;
				$jumlah_total_pemasukan_apotik=0;
				$jumlah_total_pengeluaran=0;
			?>
			<?php foreach ($pemasukan_klinik as $key => $value) { ?>
				
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value->Nama; ?></td>
					<td><?php echo $value->waktu; ?></td>
					<td><?php echo $value->metode_bayar; ?></td>
					<td><?php $jadi = "Rp " . number_format($value->total,2,',','.'); echo $jadi;?></td>
				</tr>
			<?php 
				$jumlah_total_pemasukan=$jumlah_total_pemasukan+$value->total;

			} ?>
			
			<tr>
				<td colspan="4">Total</td>
				<td><?php $juml_text="Rp " . number_format($jumlah_total_pemasukan,2,',','.');echo $juml_text; ?></td>
			</tr>
		</table>
	</div>

	<div class="a1-2">
		<h3 style="padding-bottom: 5px;">1.2 Laporan Pemasukan Apotik</h3>
		<table style="width: 100%;">
			<tr class="b">
				<th>No.</th>
				<th>Waktu</th>
				<th>Jumlah</th>
			</tr>

			<?php foreach ($pemasukan_apotik as $key => $value) {
				?>

				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value->waktu ?></td>
					<td><?php $apotik = "Rp " . number_format($value->jumlah,2,',','.'); echo $apotik;?></td>
				</tr>

				<?php
				$jumlah_total_pemasukan_apotik=$jumlah_total_pemasukan_apotik+$value->jumlah;
			} ?>

			
			
			<tr>
				<td colspan="2">Total</td>
				<td ><?php $apotik_jumlah_total = "Rp " . number_format($jumlah_total_pemasukan_apotik,2,',','.'); echo $apotik_jumlah_total;?></td>
			</tr>
		</table>
	</div>

	<tr></tr><tr></tr><tr></tr>

	<div class="a-2">
	<h3 style="padding-bottom: 5px;">2. Pengeluaran</h3>
		<table style="width: 100%;">
			<tr class="c">
				<th>No.</th>
				<th>Waktu</th>
				<th>Jumlah</th>
			</tr>
			<?php foreach ($pengeluaran as $key => $value) {
				?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value->waktu ?></td>
				<td><?php $pengeluaran_text = "Rp " . number_format($value->jumlah,2,',','.'); echo $pengeluaran_text;?></td>
			</tr>
			

				<?php
				$jumlah_total_pengeluaran=$jumlah_total_pengeluaran+$value->jumlah;
			} ?>
			
			<tr>
				<td colspan="2">Total</td>
				<td><?php $pengeluaran_jumlah_total = "Rp " . number_format($jumlah_total_pengeluaran,2,',','.'); echo $pengeluaran_jumlah_total;?></td>
			</tr>
			<tr>
				<td colspan="2">Balanced</td>
				<td><?php $balanced=$jumlah_total_pemasukan+$jumlah_total_pemasukan_apotik-$jumlah_total_pengeluaran; $balanced_text = "Rp " . number_format($balanced,2,',','.'); echo $balanced_text; ?></td>
			</tr>
		</table>
	</div>

	<div style="width: auto; float: left;">
		<h3>Balanced:  <a style="border: solid 1px; padding:0;"><?php $balanced=$jumlah_total_pemasukan+$jumlah_total_pemasukan_apotik-$jumlah_total_pengeluaran; $balanced_text = "Rp " . number_format($balanced,2,',','.'); echo $balanced_text; ?>  </a></h3>
	</div>

</body>
</html>