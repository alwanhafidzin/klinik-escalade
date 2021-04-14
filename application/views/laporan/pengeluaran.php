<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Laporan Pengeluaran</li>
        </ol>
    </div><!--/.row-->

    <div class="row"><div class="col-lg-12"><h1 class="page-header">Laporan Pengeluaran</h1></div></div><!--/.row-->

    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">
                <form class="form-inline">
                    <input type="text" class="form-control" id="awal" value="<?php echo $awal;?>" />
                    s/d
                    <input type="text" class="form-control" id="akhir" value="<?php echo $akhir;?>" />
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
                    data-toggle="table" data-url="<?php echo base_url('laporan/data_laporan_pengeluaran');?>" 
                           data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                           data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" 
                           data-sort-order="" data-show-footer="true">
                        <thead>
                            <tr>
                                <th data-formatter="runningFormatter" data-align="right" data-width="100">No.</th>
                                <th data-field="waktu" data-align="left" data-formatter="waktu" data-width="150">Waktu</th>
                                <th data-field="keterangan" data-sortable="true" data-align="left" data-width="200">Keterangan</th>
                                <th data-field="pengambil" data-sortable="true" data-align="left" data-width="100">Pengambil</th>
                                <th data-field="jumlah" data-sortable="true" data-align="right" data-width="150" data-footer-formatter="sumFormatterPemasukan" data-formatter="rupiah2">Jumlah</th>
                                <th data-field="id|waktu|jumlah|keterangan|pengambil" data-formatter="editpengeluaran" data-width="50">Action</th>
                            </tr>
                        </thead>

                        <tfoot>
                                  <tr>
                                    <td style="text-align: right;" >Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td id="total_pemasukanred" style="text-align: right;" >Total</td>
                                    <td></td>

                                  </tr>
                                </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ubah Harga</h4>
            </div>
            <div class="modal-body" style="overflow:auto;">
            <form id="form_updatebarang" action="<?php echo base_url('laporan/harga_edit_pengeluaran');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        Waktu
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control">
                            <input autocomplete="off" type="text" name="waktu" id="waktu" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        Keterangan
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <input autocomplete="off" type="text" name="ket" id="ket" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        Pengambilan
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control">
                            <input autocomplete="off" type="text" name="pengambil" id="pengambil" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        Jumlah
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control">
                            <input autocomplete="off" type="text" name="jumlah" id="jumlah" class="form-control" autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
     </div>
</div>
<script>
    function editpengeluaran(value, row, index){
        return '<div class="btn-group" role="group" aria-label="..."><a href="#" onclick="editdata(\''+row.id+'\',\''+row.waktu+'\',\''+row.keterangan+'\',\''+row.pengambil+'\',\''+row.jumlah+'\')" type="button" class="btn btn-primary"><span aria-hidden="true"></span>Edit</a></div>';
    }

    function editdata(id, waktu, ket, pengambil, jumlah){
        $('[name="id"]').val(id);
        $('[name="waktu"]').val(waktu);
        $('[name="ket"]').val(ket);
        $('[name="pengambil"]').val(pengambil);
        $('[name="jumlah"]').val(jumlah);
        $('#modal-1').modal('show');
        $('.modal').on('shown.bs.modal', function() {
          $(this).find('[autofocus]').focus();
        });
    }

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

    var $table_perubhan = $('#table');
    $(document).ready(function () {


        //submit bos
        $("#form_updatebarang").on("submit", function (event) {
            event.preventDefault();
            //$("#loading").modal('show');
            console.log($(this).serialize()); //serialize form on client side oke 
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('laporan/harga_edit_pengeluaran'); ?>',
                data: $('#form_updatebarang').serialize(),
                success: function (data) {
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
                    $("#modal-1").modal('hide');
                },
                error: function () {
                    alert("Error!!!");
                }
            });
        });
    });
</script>