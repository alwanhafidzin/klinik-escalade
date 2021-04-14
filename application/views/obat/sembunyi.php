<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Laporan Edit Obat</li>
        </ol>
    </div><!--/.row-->

    <div class="row"><div class="col-lg-12"><h1 class="page-header">Laporan Edit Transaksi Sisa Obat</h1></div></div><!--/.row-->

    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">
                <form class="form-inline">
                    <input type="text" class="form-control" id="awal"  />
                   
                  
                    <button type="button" class="btn btn-default" id="filter">Filter</button>

                    <div class="btn-group pull-right" role="group" aria-label="...">
                                      <button type="button" class="btn btn-primary "  onclick="printContent('pengeluaran_filter','<?php echo base_url('laporan/laporan_pengeluaran.html') ?>')" >Print</button>
                                    

                                     <div class="btn-group pull-right" role="group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Export
                                          <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#" onclick="export_excel('excel','Laporan Pengeluaran')">EXCEL</a></li>
                                          <li><a href="#" onclick="export_excel('pdf','Laporan Pengeluaran')">PDF</a></li>
                                        </ul>
                                      </div>
                                    </div>
                </form>
                <div id="pengeluaran_filter">
                <div id="letak_tgl" style="display: none;">
                                    <h3>
                                        Laporan Pengeluaran  Tanggal  <?php echo $awal; ?> - <?php echo $akhir; ?>
                                    </h3>
                                </div>
                    <!--<div class="row">
                        <div class="col-md-11">
                            <p class="pull-right">Total Pengeluaran: <b>Rp 500,000</b></p>
                            <br />
                        </div>
                    </div>-->
                    <table 
                    id="table"
                    data-toggle="table" data-url="<?php echo base_url('obat/data_obat_sisa');?>" 
                           data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                           data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
                           data-sort-order="" data-show-footer="true">
                        <thead>
                            <tr>
                                <th data-formatter="runningFormatter" data-align="right" data-width="100">No.</th>
                                <th data-field="tgl_transaksi" data-align="left"  data-width="200">Waktu</th>
                                <th data-field="nama" data-sortable="true" data-align="left" data-width="200">Nama Obat</th>
                                <th data-field="tgl_transaksi" data-formatter="label_keterangan" data-sortable="true" data-align="left" data-width="200">Keterangan</th>
                                <th data-field="jumlah_sisa" data-sortable="true" data-align="left" data-width="100">Sisa</th>
                                <th data-field="id_detail_sisa_stok_obat" data-formatter="edit_sisa" data-sortable="true" >fdv</th>
                               
                            </tr>
                        </thead>

                     
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->


<!-- Modal -->
<div class="modal fade" id="myModal_edit_sisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" action="<?php echo base_url('obat/edit_sisa_obat'); ?>" >
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit</h4>
	      </div>
	      <div class="modal-body">
	        
			  <div class="form-group">
			    <label for="exampleInputEmail1">Id Detail Sisa</label>
			    <input type="text" class="form-control" name="id_detail_sisa_stok_obat" id="id_detail_sisa_stok_obat" readonly="">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama Obat</label>
			    <input type="text" class="form-control" id="nama_obat" >
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Jumlah Sisa</label>
			    <input type="text" class="form-control" id="jumlah_sisa" name="jumlah_sisa" >
			  </div>
			  
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $("#filter").click(function(){
            var awal   = $("#awal").val();
            var akhir  = $("#akhir").val();
            if (!awal){
                awal  = 0;
            }
            if (!akhir){
                akhir = 0;
            }
            console.log(awal+'/'+akhir);
            $("#pengeluaran_filter").load("<?php echo base_url('laporan/filter_laporan_pengeluaran');?>" + "/" + awal + "/" + akhir);
        });


    });
    
    console.log($(".th-inner:last").val());


    function sumFormatterPemasukan(data){
                field = this.field;
                

                var total_sum = data.reduce(function (sum, row) {
                    console.log(sum);
                    return (sum) + (parseInt(row[field]) || 0);
                }, 0);
                 $("#total_pemasukanred").html(rupiah2(total_sum));
            }

    function label_keterangan(value){
    	var str = value;
		var res = str.split(" ");
		var data="";
		if (res[1]=="00:00:00") {
			data='<span class="label label-primary">Obat Masuk</span>';
		}else{
			data='<span class="label label-success">Obat Keluar</span>';
		}
		return data;
    }

    function edit_sisa(value ,row, index){
    	console.log(row);
    	return '<button class="btn btn-success" onclick="show_edit_sisa(\''+row.nama+'\',\''+row.id_detail_sisa_stok_obat+'\',\''+row.jumlah_sisa+'\')" >Edit</button>';
    }

    function show_edit_sisa(nama_obat,id_detail_sisa_stok_obat,jumlah_sisa){
    	$("#nama_obat").val(nama_obat);
    	$("#id_detail_sisa_stok_obat").val(id_detail_sisa_stok_obat);
    	$("#jumlah_sisa").val(jumlah_sisa);
    	$("#myModal_edit_sisa").modal('show');

    }
</script>