<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">

<div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Laporan Pemasukan Apotik Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
                                    </h3>
                                </div>
<?php if (($awal==0) and ($akhir==0)):?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_apotik');?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal!==0) and ($akhir==0)):?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_awal_apotik/'.$awal);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php elseif (($awal==0) and ($akhir!==0)):?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_akhir_apotik/'.$akhir);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php else:?>
	<table id = "table" data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_filter_apotik/'.$awal.'/'.$akhir);?>" 
           data-striped="true" data-show-refresh="true" data-show-toggle="true" 
           data-show-columns="true" data-search="true" data-select-item-name="toolbar1" 
           data-pagination="true" data-sort-name="" data-sort-order="" data-show-footer="true">
<?php endif;?>
		<thead>
			<tr>
				<th data-formatter="runningFormatter" data-width="100" data-align="right">No.</th>
				<th data-field="waktu"   data-formatter="waktu" data-sortable="true" data-width="500" data-align="right">Waktu</th>
				<!--<th data-field="Alamat" data-sortable="true">Alamat</th>
				<th data-field="diagnosis" data-sortable="true">Diagnosis</th>-->
				<th data-field="metode_bayar" data-width="150" data-align="right">Metode Bayar</th>
				<th data-field="jumlah" data-sortable="true" data-width="150" data-align="right"  data-formatter = "rupiah2" data-footer-formatter="sumFormatterPemasukan">Total</th>
			</tr>
		</thead>
    <tfoot>
                      <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td id="total_pemasukanred" style="text-align: right;" >Total</td>

                      </tr>
                    </tfoot>
	</table>
<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>
<script>
function sumFormatterPemasukan(data){
                field = this.field;
                

                var total_sum = data.reduce(function (sum, row) {
                console.log(sum);
                return (sum) + (parseInt(row[field]) || 0);
            }, 0);
             $("#total_pemasukanred").html(rupiah2(total_sum));
            }
     $(document).ready(function(){
         var link = $("#table").attr("data-url");
         console.log(link);
         
          var jsonApotik = (function () {
            var jsonApotik = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': link,
                'dataType': "json",
                'success': function (data) {
                    jsonApotik = data;
                }
            });
            return jsonApotik;
        })(); 
        console.log(jsonApotik);
        var totalPemasukanApotik = 0;
        for (var key in jsonApotik) {
            if (jsonApotik.hasOwnProperty(key)) {
                console.log(key + " -> " + jsonApotik[key].jumlah);
                totalPemasukanApotik = parseInt(totalPemasukanApotik) + parseInt(jsonApotik[key].jumlah);
                console.log(totalPemasukanApotik);
            }
        }
         
         $("#hasil_apotik").val(totalPemasukanApotik);
     });
</script>