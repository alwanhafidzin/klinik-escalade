<link href="<?php echo base_url('assets/css/bootstrap-table.css'); ?>" rel="stylesheet">

<div id="letak_tgl" style="display: none;">
    <h3>
        Penjualan Obat Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
    </h3>
</div>
<table id="table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_obat/' . $awal . ' 00:00:00/' . $akhir . ' 23:59:59'); ?>" 
       data-striped="true" data-show-refresh="true" data-show-toggle="true" 
       data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
       data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">

    <thead>
        <tr>
            <th data-formatter="runningFormatter" data-align="right" data-width="50" >No.</th>
            <th data-field="nama" data-sortable="true" data-align="left" data-width="200" >Nama Obat</th>
            <th data-field="kode_krim" data-sortable="true" data-align="left" data-width="200" >Kode Krim</th>
            <th data-field="sisa_obat_per"   data-sortable="true" data-align="right" data-width="100">Sisa Stock</th>
            <th data-field="jumlah"  data-footer-formatter="jumlah_stok"   data-sortable="true" data-align="right" data-width="100">Terjual</th>
    </thead>
    <tfoot>
        <tr style="background-color: #f9f9f9;">
            <td><b>Total</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td  id="total_penjualan_obat"
                 style="
                 text-align: right;
                 border-left: 2px solid #f5f5f5;
                 "
                 ><b>3</b></td>

        </tr>

    </tfoot>
</table>


<script src="<?php echo base_url('assets/js/bootstrap-table.js') ?>"></script>