<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<div class="table-responsive">
    <table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_cart_obat');?>" 
           data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
        <thead>
            <tr>
                <th data-formatter="runningFormatter" data-align="right">No.</th>
                <th data-field="name" data-sortable="true">Obat</th>
                <th data-field="qty"s>Jumlah</th>
                <th data-field="price" data-sortable="true" data-formatter="rupiah">Harga satuan</th>
                <th data-field="rowid" data-formatter="batalObat" data-align="center">Batalkan</th>
            </tr>
        </thead>
    </table>
</div>

<?php if (isset($jumlah_batal)):?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pilih_obat").val(<?php echo $id_batal;?>).change();
            
            var stok = parseInt($("#stok").val());
            var jumlahBatal = parseInt(<?php echo $jumlah_batal;?>);
            
            $("#stok").val(stok + jumlahBatal);
            $("#pilih_obat").find("option:selected").attr('stok',parseInt(stok + jumlahBatal));
            
            if (stok < 1){
                $("#btn_tambah_obat").attr('disabled', true);
            }
            else{
                $("#btn_tambah_obat").attr('disabled', false);
            }
        });
    </script>
<?php endif;?>


<script src="<?php echo base_url('assets/js/bootstrap-table.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
        var stok = $("#stok").val();
        if (stok < 1){
            $("#btn_tambah_obat").attr('disabled', true);
        }
        else{
            $("#btn_tambah_obat").attr('disabled', false);
        }
    });
    function runningFormatter(value, row, index) {
		return index+1;
	}
	function batalObat(value){
		return '<button type="button" onclick="updateCartObat(' + "'" +value+ "'" + ')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Batal</button>';
	}
	function updateCartObat(rowid){
		$("#tabel_daftar_obat").load("<?php echo base_url('rekam_medis/hapus_obat');?>" + "/" + rowid);
        
    }
</script>