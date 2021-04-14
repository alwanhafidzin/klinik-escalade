<html>
<body onload ="window.print()">
<h4>Elecomp Clinic</h4>

<p style='font-size: 9px; margin-top: -10px;'>Jalan Danau Bratan, Malang </p>
<p style='font-size: 9px; margin-top: -10px;'>Telp. 0821-3122-2331</p>
<p style='font-size: 9px; margin-top: -10px;'><?php echo $tanggal_transaksi;?></p>
<p style='font-size: 9px;'><?php echo $tanggal_transaksi.' - '.$nama;?></p>
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
	<?php if (is_array($i)||is_object($i)){
	 foreach($this->cart->contents() as $items):?>
		<tr>
			<td valign="top"><?php echo $items['name'];?></td>
			<td valign="top" align="right"><?php echo number_format($items['qty']);?>&nbsp;&nbsp;</td>
			<td valign="top" align="right"><?php echo number_format($items['price']);?>&nbsp;&nbsp;</td>
			<td valign="top" align="right"><?php echo number_format($items['subtotal']);?></td>
		</tr>
		<?php $i++;?>
	<?php endforeach; }?>
    
    
    <?php $i=1;?>
    <?php $total_layanan=0;?>
    <?php foreach($layanan_layanan as $layanan):?>
    <tr>
        <td valign="top"><?php echo $layanan->Layanan;?></td>
        <td valign="top" align="right">1</td>
        <td valign="top" align="right"><?php echo $layanan->harga_layanan;?></td>
        <td valign="top" align="right"><?php echo $layanan->harga_layanan;?></td>
    </tr>
    <?php endforeach;?>
    <?php foreach($obat_obat as $obat):?>
    <tr>
        <td valign="top"><?php echo $obat->nama;?></td>
        <td valign="top" align="right"><?php echo $obat->jumlah;?></td>
        <td valign="top" align="right"><?php echo $obat->harga_satuan_obat;?></td>
        <td valign="top" align="right"><?php echo $obat->jumlah * $obat->harga_satuan_obat;?></td>
    </tr>
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
		<td align="right"><?php echo number_format($data_rev_total);?></td>
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
		<td align="right"><?php echo number_format($kembalian);?></td>
	</tr>
</table>
</body>
</html>