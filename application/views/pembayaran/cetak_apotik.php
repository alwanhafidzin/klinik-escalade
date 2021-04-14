<html>
<body onload ="window.print()">
<h4>Elecomp Clinic</h4>

<p style='font-size: 9px; margin-top: -10px;'>Jalan Danau Bratan, Malang </p>
<p style='font-size: 9px; margin-top: -10px;'>Telp. 0821-3122-2331</p>
<p style='font-size: 9px; margin-top: -10px;'><?php echo $tanggal_transaksi;?></p>
<br />

<table style='font-size: 9px;'>
	<tr>
		<td align="center">Item</td>
		<td align="center">qty</td>
		<td align="center">price</td>
		<td align="center">subtotal</td>
	</tr>
	<tr>
		<td colspan="4">===============================</td>
	</tr>
	<?php $i=1;?>
	<?php foreach($this->cart->contents() as $items):?>
		<tr>
			<td valign="top"><?php echo $items['name'];?></td>
			<td valign="top" align="right"><?php echo number_format($items['qty']);?>&nbsp;&nbsp;</td>
			<td valign="top" align="right"><?php echo number_format($items['price']);?>&nbsp;&nbsp;</td>
			<td valign="top" align="right"><?php echo number_format($items['subtotal']);?></td>
		</tr>
		<?php $i++;?>
	<?php endforeach;?>
</table>
<br />

<table style='font-size: 9px;'>
	<tr>
		<td colspan="4">===============================</td>
	</tr>
	<tr>
		<td>Total</td>
		<td>&nbsp; :</td>
		<td>Rp&nbsp;</td>
		<td align="right"><?php echo number_format($total);?></td>
	</tr>
	<tr>
		<td>Pembayaran</td>
		<td>&nbsp; :</td>
		<td>Rp</td>
		<td align="right"><?php echo number_format($pembayaran);?></td>
	</tr>
	<tr>
		<td>Kembalian</td>
		<td>&nbsp; :</td>
		<td>Rp</td>
		<td align="right"><?php echo $kembalian;?></td>
	</tr>
</table>
</body>
</html>