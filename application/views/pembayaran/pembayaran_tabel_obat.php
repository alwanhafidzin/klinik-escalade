<link href="<?php echo base_url('assets/css/bootstrap-table.css');?>" rel="stylesheet">
<div class="table-responsive">
    <table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_cart_obat');?>" 
           data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
        <thead>
            <tr>
                <th data-formatter="runningFormatter" data-align="right">No.</th>
                <th data-field="name" data-sortable="true">Obat</th>
                <th data-field="qty" data-align="center">Jumlah</th>
                <th data-field="price" data-sortable="true" data-formatter="rupiah" data-align="right">Harga satuan</th>
                <th data-field="subtotal" data-sortable="true" data-formatter="rupiah" data-align="right">Subtotal</th>
                <th data-field="rowid" data-formatter="batal" data-align="center">Batalkan</th>
            </tr>
        </thead>
    </table>
    <?php $i=1;?>
    <?php foreach($this->cart->contents() as $items):?>
        <?php $i++;?>
    <?php endforeach;?>
    <p id="jumlah-cart" hidden="hidden"><?php echo $i;?></p>
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
	function runningFormatter(value, row, index) {
		return index+1;
	}
	function batal(value){
		return '<button type="button" onclick="updateCart(' + "'" +value+ "'" + ')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Batal</button>';
	}
	function updateCart(rowid){
		$("#tabel_daftar_obat").load("<?php echo base_url('pembayaran/hapus_obat');?>" + "/" + rowid);
	}
    $( document ).ready(function() {
        //pembayaran
        $('#total').val('<?php echo number_format($this->cart->total());?>');
        
        var total 		= <?php echo $this->cart->total();?>;
        var pembayaran  = $("#pembayaran").val();
        var jumlahCart 	= $('#jumlah-cart').text();

        if ((pembayaran < total) || (jumlahCart <= 1)){
            $(".proses").attr('disabled', true);
        }
        else{
            $(".proses").attr('disabled', false);
        }

        var hasil = pembayaran - total;
        console.log(pembayaran);
        console.log(total);
        $('#kembalian').val((hasil + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
    });
    $("#pembayaran").keyup(function(){
        var total 		= <?php echo $this->cart->total();?>;
        var pembayaran  = $("#pembayaran").val();
        var jumlahCart 	= $('#jumlah-cart').text();

        if ((pembayaran < total) || (jumlahCart <= 1)){
            $(".proses").attr('disabled', true);
        }
        else{
            $(".proses").attr('disabled', false);
        }

        var hasil = pembayaran - total;
        console.log(pembayaran);
        console.log(total);
        $('#kembalian').val((hasil + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
    });
    $("#cetak").click(function(){
        setTimeout(function() {
            window.location.href = '<?php echo base_url('antrian');?>';
        },1000);
    });
</script>