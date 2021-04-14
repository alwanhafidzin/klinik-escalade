<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('antrian')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Pembayaran Obat</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Pembayaran Obat</h1>
		</div>
	</div><!--/.row-->    
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Pembayaran Apotik</div>
				<div class="panel-body">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-7">
								<div id="tabel_daftar_obat">
									<div class="table-responsive">
										<table data-toggle="table" data-url="<?php echo base_url('pembayaran/data_cart_obat');?>" data-select-item-name="toolbar1" data-sort-name="" data-sort-order="desc">
											<thead>
												<tr>
													<th data-formatter="runningFormatter" data-align="right">No.</th>
													<th data-field="name" data-sortable="true">Obat</th>
													<th data-field="qty" data-align="center">Jumlah</th>
													<th data-field="price" data-sortable="true" data-formatter="rupiah">Harga satuan</th>
													<th data-field="subtotal" data-sortable="true" data-formatter="rupiah">Subtotal</th>
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
								</div>
							</div>
							<div class="col-xs-5">

								<div class="form-group">
									<label>Obat</label>
									<select class="form-control" name="obat" id="pilih_obat">
										<option stok="0">- Tidak -</option>
										<?php foreach($obat_obat as $obat):?>
										<option id_obat="<?php echo $obat['id'];?>" value="<?php echo $obat['id'];?>" harga_satuan="<?php echo $obat['harga_satuan'];?>" stok="<?php echo $obat['jumlah'];?>"><?php echo $obat['nama'];?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Harga Satuan Obat</label>
									<?php echo form_error('harga_satuan');?>
									<div class="input-group">
										<div class="input-group-addon">Rp</div>
										<input class="form-control numeric" placeholder="0" maxlength="120" name="harga_satuan" id="harga_satuan" style="text-align:right;" />
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control numeric" readonly id="stok" placeholder="0" style="text-align:right;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <?php echo form_error('jumlah');?>
                                            <input class="form-control numeric" placeholder="0" maxlength="120" name="jumlah" id="jumlah" style="text-align:right;" />
                                        </div>
                                    </div>
								<button type="button" disabled class="btn btn-primary pull-right" id="btn_tambah_obat">Tambahkan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.col-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Form Pembayaran</div>
				<div class="panel-body">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								
							</div>
							<form action="<?php echo base_url('pembayaran/simpan_pembayaran_obat/');?>" method="post" target="_blank">
								<div class="col-md-6">
								


									<div class="form-group">
										<label class="col-sm-5 control-label" style="text-align:right">Tanggal</label>
										<div class="col-sm-7">
											<input type="text" id="tgl_plug" class="form-control" name="tgl_input"  style="background-color: #fff; cursor:text" required=""  >
										</div>
									</div>
								
									<br />
									<br />
									
									<div class="form-group">
										<label class="col-sm-5 control-label" style="text-align:right">Total</label>
										<div class="col-sm-7">
											<div class="input-group">
												<div class="input-group-addon">Rp</div>
												<input class="form-control" readonly type="text" id="total" placeholder="0" style="text-align:right;"  name="total" />
											</div>
										</div>
									</div>
									<br />
									<br />
									<div class="form-group">
												<label class="col-sm-5 control-label" style="text-align:right">Metode Pembayaran</label>
												<div class="col-sm-7">
												<select name ="metode_pembayaran" id = "metode_pembayaran" class= "form-control select">	
												<?php foreach($metodebayar as $metode){?>
													<option value="<?php echo $metode['nama_metode'];?>" style="text-align:right"><?php echo $metode['nama_metode'];?></option>
												<?php }?>
												</select>
												</div>
									</div>									
									<br />
									<br />
									<div class="form-group">
										<label class="col-sm-5 control-label" style="text-align:right">Pembayaran</label>
										<div class="col-sm-7">
											<div class="input-group">
												<div class="input-group-addon">Rp</div>
												<input class="form-control numeric" placeholder="0" id="pembayaran" style="text-align:right;" name="pembayaran" />
											</div>
										</div>
									</div>
									<br />
									<br />
									<br />
									<br />
									<div class="form-group">
										<label class="col-sm-5 control-label" style="text-align:right">Kembalian</label>
										<div class="col-sm-7">
											<div class="input-group">
												<div class="input-group-addon">Rp</div>
												<input class="form-control" type="text" placeholder="0" id="kembalian" style="text-align:right;" name="kembalian" readonly />
											</div>
										</div>
									</div>
									<br />
									<br />
									<br />
									<div class="btn-toolbar" role="toolbar">
										<button type="button" disabled class="btn btn-primary pull-right proses" id="btn_modal" onclick="modal_konfirm()" data-backdrop="static" data-keyboard="false">Proses</button>
									</div>
									<div class="modal fade" id="myModal">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Transaksi</h4>
												</div>
												<div class="row">
													<div class="col-xs-12">
														<div class="modal-body">
															<p>Apakah anda yakin akan memproses pembayaran ?</p>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
													<button class="btn btn-primary" id="cetak">Cetak</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<br />
						<br />
					</div>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</div><!-- /.row -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#stok").val(0);
    });     
    function runningFormatter(value, row, index) {
        return index+1;
    }
    $("#pilih_obat").change(function () {
        var id 			 = $(this).find("option:selected").attr('id_obat');
        var hargaSatuan  = $(this).find("option:selected").attr('harga_satuan');
        var stok         = $(this).find("option:selected").attr('stok');
        $('#harga_satuan').val(hargaSatuan);
        $('#stok').val(stok);
        if (parseInt(stok) > 0){
            $("#jumlah").val(null);
        }
        else{
            $("#jumlah").val(null);
        }
        
        if (stok < 1){
            $("#btn_tambah_obat").attr('disabled', true);
        }
        else{
            $("#btn_tambah_obat").attr('disabled', false);
        }
    });
    $("#jumlah").keyup(function(){
        var jumlah = $("#jumlah").val();
        var stok   = $("#stok").val();
        console.log(stok + ' ' + jumlah);
        if (parseInt(stok) < parseInt(jumlah)){
            $("#jumlah").val(parseInt(stok));
        }
    });
    $("#btn_tambah_obat").click(function(){
        var id 			 = $("#pilih_obat").find("option:selected").attr("id_obat");
        var hargaSatuan  = $("#harga_satuan").val();
        var jumlah  	 = $("#jumlah").val();
        var stok         = $("#stok").val();
        console.log(jumlah)
        $("#stok").val(parseInt(stok - jumlah));
        $("#pilih_obat").find("option:selected").attr('stok',parseInt(stok - jumlah));
        if ((parseInt(jumlah) < 1) || (jumlah == '')){
            jumlah = 1;
            console.log(1)
            $("#stok").val(parseInt(stok - 1));
            $("#pilih_obat").find("option:selected").attr('stok',parseInt(stok - 1));
        }

        if (stok < 1){
            $("#btn_tambah_obat").attr('disabled', true);
        }
        else{
            $("#btn_tambah_obat").attr('disabled', false);
        }

        $("#jumlah").val('');

        if (id != null) $("#tabel_daftar_obat").load("<?php echo base_url('pembayaran/tambah_obat');?>" + "/" + id + "/" + hargaSatuan + "/" + jumlah);
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
	
	$('#metode_pembayaran').on('change', function(){
		if(this.value.toUpperCase() != "TUNAI"){
			var bayar = $('#total').val().replace(/,/g,'');
			$('input[name="pembayaran"]').val(bayar+"");
			$('input[name="pembayaran"]').attr('readonly',"");
			$(".proses").attr('disabled', false);
			$('input[name="kembalian"]').val(0+"");
		}
		else{
			$('input[name="pembayaran"]').val(0+"");
			$('input[name="pembayaran"]').removeAttr('readonly');
			$(".proses").attr('disabled', true);
			$('input[name="kembalian"]').val(0+"");
		}
	
	});

	function modal_konfirm(){
		var tgl_in=$("#tgl_plug").val();
		if (tgl_in=="") {

			alert("Tanggal tidak boleh kosong");
		}else{
			$("#myModal").modal('show');
		}
		
	}
	
</script>