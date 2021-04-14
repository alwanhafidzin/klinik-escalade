<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- <script type="text/javascript">
    $(window).load(function(){
    $(".stileone").on("click", function() {
      $(".stileone").css("color", "#f40049");
      $(".stileone").css("border-bottom", "3px solid #F6336D");
      $(".stileone1").css("color", "#000");
      $(".stileone1").css("border-bottom", "none");
    }); 
  });
  $(window).load(function(){
    $(".stileone1").on("click", function() {
      $(".stileone1").css("color", "#f40049");
      $(".stileone1").css("border-bottom", "3px solid #F6336D");
      $(".stileone").css("color", "#000");
      $(".stileone").css("border-bottom", "none");
    }); 
  });
</script> -->
<script type="text/javascript">
   $(window).load(function(){
    $(".stileone").on("click", function() {
      $(".stileone").css("color", "#f40049");
      $(".stileone").css("border-bottom", "3px solid #F6336D");
      $(".stileone1").css("color", "#000");
      $(".stileone1").css("border-bottom", "none");
      $(".stileone2").css("color", "#000");
      $(".stileone2").css("border-bottom", "none");
      $(".stileone3").css("color", "#000");
      $(".stileone3").css("border-bottom", "none");
      $(".stileone4").css("color", "#000");
      $(".stileone4").css("border-bottom", "none");
      $(".stileone5").css("color", "#000");
      $(".stileone5").css("border-bottom", "none");
  }); 
});
   $(window).load(function(){
    $(".stileone1").on("click", function() {
      $(".stileone1").css("color", "#f40049");
      $(".stileone1").css("border-bottom", "3px solid #F6336D");
      // $(".tablink:hover").css("border-bottom", "none");
      $(".stileone").css("color", "#000");
      $(".stileone").css("border-bottom", "none");
      $(".stileone2").css("color", "#000");
      $(".stileone2").css("border-bottom", "none");
      $(".stileone3").css("color", "#000");
      $(".stileone3").css("border-bottom", "none");
      $(".stileone4").css("color", "#000");
      $(".stileone4").css("border-bottom", "none");
      $(".stileone5").css("color", "#000");
      $(".stileone5").css("border-bottom", "none");
  }); 
});
</script>
<style type="text/css">
    .RightCol {
        float: right;
        position: fixed;
        width: 300px;
        overflow-y: scroll;
        overflow-x: hidden;
        top: 0;
        bottom: 0;
    }

    .content {
        position: relative;
        margin-left: 150px;
    }

    .outer {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .row {
        display: flex;
        /* equal height of the children */
    }

    .col {
        flex: 1;
        /* additionally, equal width */

        padding: 1em;
        background-color: #e7e6e6;
        text-align: left;
    }

    .d:hover {
        background-color: #e7e6e6;
        border-radius: 15px;
    }

    .label-success {
        background-color: #00ff00;
        color: black;
    }

    .myscrl::-webkit-scrollbar {
        width: 1em;
    }

    .myscrl::-webkit-scrollbar-track {
        background-color: #a6a6a6;
        border-radius: 20px;
    }

    .myscrl::-webkit-scrollbar-thumb {
        background-color: #767171;
        border-radius: 20px;
    }
    .nav-menu-lap ul{
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .nav-menu-lap ul li{
        float: left;
    }
    .nav-menu-lap ul li{
        display: block;
        padding: 8px;
        cursor: pointer;
        text-decoration: none;
        background: #fff;
    }
    .nav-menu-lap ul li:hover{
        color: #f40049;
    }
    .border-lap:hover{
        /*border-bottom: 3px solid #f40049;*/
    }
    .lap-mb{
        background: #fff; 
        display: block; 
        margin: 20px 0 0 0; 
        text-align: center; 
        float: right;
        border:2px solid #ccc;
        text-decoration: none; 
        cursor: pointer;        
    }
    .lap-mb.active{
        background: #f40049; 
        display: block; 
        margin: 20px 0 0 0; 
        text-align: center; 
        float: right;
        border:2px solid #f40049;
        text-decoration: none; 
        cursor: pointer;        
    }
    .lap-mb.active a{
        color:#fff;
    }
    .lap-mb:hover{
        background: #f40049; 
        display: block; 
        margin: 20px 0 0 0; 
        text-align: center; 
        float: right;
        border:2px solid #f40049;
        text-decoration: none; 
        cursor: pointer;        
    }
    .lap-mb a:hover{
        color: #fff;
    }
    .stileone {
      color: #f40049;
      border-bottom:3px solid #f40049;
  }
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="">     
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="col-md-12">
                        <font style="font-weight: bold; font-size: 20px;" >Laporan Pemeriksaan</font>
                        <a href="<?php echo base_url('doctor/export_pemeriksaan_m') ?>" class="btn" style="margin-top: 45px; background-color: #e7e6e6; border: none; color:#f40049; font-weight:bold; float: right;">
                            <img src="<?php echo base_url() ?>assets/images/download.png" height="30px">
                            Download
                        </a>
                    </div>
                    <div class="col-md-12" style="border: 1px solid #e0e0e0; margin-top: 15px;">
                        <div style="float: left">
                            <div class="col-lg-12 nav-menu-lap">
                                <ul>
                                    <li class="border-lap stileone">
                                        <div data-toggle="tab" href="#total_t">
                                            <center>
                                              <font>Total Transaksi</font>
                                          </center>
                                      </div>
                                  </li>

                                  <li class="border-lap stileone1">
                                    <div data-toggle="tab" href="#sharing_f">
                                        <center>
                                          <font>Personal Sharing Fee</font>
                                      </center>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-lg-12">
                <div class="col-lg-2 lap-mb">
                    <a href="<?php echo site_url('doctor/laporan_pemeriksaan_b')?>" type="button" class="btn col-md-12">Bulanan</a>
                </div>
                <div class="col-lg-2 lap-mb active">
                    <a href="<?php echo site_url('doctor/laporan_pemeriksaan_m')?>" type="button" class="btn col-md-12">Mingguan</a>
                </div>
                <div class="col-lg-2 lap-mb">
                    <a href="<?php echo site_url('doctor/laporan_pemeriksaan')?>" type="button" class="btn col-md-12">Harian</a>
                </div>
            </div>
            <div id="total_t" class="col-md-12 tab-pane fade in active" style="margin-top: 20px;">
                <div id="pemeriksaan_m"></div>
            </div>
            <div class="row">
                <div class="col" style="margin: 30px;border:1px solid #969696;border-radius:10px">
                    <div class="col-md-12">
                        <h5 style="color: #f40049; font-weight:bold">Conversion Rate</h5>
                        <div class="col-md-12 outer" style="text-align:left">
                            <h1 id="txtconv" style="color:black;font-weight:bold;"></h1>
                        </div>
                        <select hidden name="convrate" id="convrate">
                            <option value="0" selected></option>
                        </select>
                        <div class="col-md-12">
                            <p align="center">
                                Dari seluruh pasien yang memiliki janji telah selesai dilakukan pemeriksaan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col" style="margin-top: 30px;margin-bottom: 30px;border:1px solid #969696;border-radius:10px">
                    <div class="col-md-12">
                        <h5 style="color: #f40049; font-weight:bold">E-Rekam Medis</h5>
                        <div class="col-md-12 outer" style="text-align:left">
                            <h1 id="txterkm" style="color:black;font-weight:bold;"></h1>
                        </div>
                        <div class="col-md-12">
                            <p align="center">
                                E-Rekam Medis dari seluruh pasien yang melakukan pemeriksaan telah terisi lengkap
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col" style="margin: 30px;border:1px solid #969696;border-radius:10px">
                    <div class="col-md-12">
                        <h5 style="color: #f40049; font-weight:bold">Rata2 Kepuasan</h5>
                        <div class="col-md-12 outer" style="text-align:left">
                            <h1 id="txtpuas" style="color:black;font-weight:bold">4.5</h1>
                        </div>
                        <div class="col-md-12">
                            <p align="center">
                                Nilai kepuasan rata2 dari seluruh pasien yang telah selesai dilakukan pemeriksaan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sharing_f" class="col-md-12 tab-pane fade" style="top:-800px;">
                <div>
                    <table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('Resepsionis/data_booking');?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
                        <thead >
                            <tr>
                                <th data-sortable="true" data-field="" data-formatter="runningFormatter" data-align="center" >No.</th>
                                <th data-sortable="true" data-align="left">Tanggal Pemeriksaan</th>
                                <th data-sortable="true" data-align="left">Total Pendapatan</th>
                                <th data-sortable="true" data-align="left">Persentase Fee</th>
                                <th data-sortable="true" data-align="left">Total Pendapatan Fee</th>
                            </tr>
                        </thead>

                        <tbody>
                            <td>1</td>
                            <td>2020/07/17</td>
                            <td>Rp. 100000</td>
                            <td>60%</td>
                            <td>Rp. 60000</td>
                        </tbody>
                    </table>                            
                </div>
            </div>
        </div>
        <div class="col-md-3" style="background-color:  #f2f2f2; padding:0px;height: 1100px;">
            <div class="col-md-12" style="padding-right: 0px;">
                <center><h4 style=" color: black;"><b>Detail Pemeriksaan</b></h4></center>
                <a href="<?php echo base_url('doctor/export_detail') ?>" class="btn" style="background-color: #e7e6e6; border: none; color:#f40049; font-weight:bold; float: right;margin-right:20px">
                    <img src="<?php echo base_url() ?>assets/images/download.png" height="30px">
                    Download
                </a>
                <div style="width: 100%; height: 700px; overflow-y: scroll; overflow-x: hidden; margin-top:80px">
                    <?php foreach ($laporan->result() as $result) : ?>
                        <div class="col-md-12 d" style="margin: 2px;">
                            <div class="col-md-5" style="text-align: left;">
                                <h5 style="font-weight: bold;"><?php echo $result->jam_rencana ?></h5>
                                <h6><?php echo $result->nama_dokter ?></h6>
                                <br>
                                <h6 class="label label-success">Telah Terbayar</h6>
                                <br><br>
                            </div>
                            <div class="col-md-7" style="padding-right: 10px;">
                                <h6 style="font-weight: bold ;"><?php echo $result->nama_depan ?> <?php echo $result->nama_belakang ?></h6>
                                <p style="font-size: 10px ;">No. Rekam Medis <?php echo $result->id_rekam_medis ?></p>
                                <p style="font-size: 12px;"><?php 
                                if ($result->hubungan == 'Anda') {
                                    echo "Atas nama sendiri ";
                                }
                                elseif($result->hubungan == 'Anak'){
                                    echo $result->hubungan." "."<span id ='hubung_id'></span>";
                                }
                                elseif($result->hubungan == 'Ibu'){
                                    echo $result->hubungan." "."<span id ='hubung_id2'></span>";
                                }
                                elseif($result->hubungan == 'Ayah'){
                                    echo $result->hubungan." "."<span id ='hubung_id3'></span>";
                                }
                                elseif($result->hubungan == 'Istri'){
                                    echo $result->hubungan." "."<span id ='hubung_id4'></span>";
                                }
                                elseif($result->hubungan == 'Suami'){
                                    echo $result->hubungan." "."<span id ='hubung_id5'></span>";
                                }
                                elseif($result->hubungan == 'Saudara'){
                                    echo $result->hubungan." "."<span id ='hubung_id6'></span>";
                                }
                                ?></p>
                                <select hidden name="id_user" id="id_user">
                                   <option value="0" selected></option>
                               </select>
                           </div>
                       </div>
                   <?php endforeach; ?>
               </div>
           </div>
       </div>
   </div>
</div>
</div>

<script>
    $(document).ready(function(){
        hubungan_pasien();
        $('#id_user').change(function(){
    // let a = $(this).val();
    // console.log(a);
});
    });

    function hubungan_pasien(){
      var id = $('#id_user').val();
      $.ajax({
        url : "<?= base_url('doctor/get_hubungan_pasien/'.$result->id_user)?>",
        data : {id:id},
        success:function(data){
        // console.log(data);
        $('#hubung_id').html(data);
    }
})
      $.ajax({
        url : "<?= base_url('doctor/get_hubungan_pasien/'.$result->id_user)?>",
        data : {id:id},
        success:function(data){
        // console.log(data);
        $('#hubung_id2').html(data);
    }
})
      $.ajax({
        url : "<?= base_url('doctor/get_hubungan_pasien/'.$result->id_user)?>",
        data : {id:id},
        success:function(data){
        // console.log(data);
        $('#hubung_id3').html(data);
    }
})
      $.ajax({
        url : "<?= base_url('doctor/get_hubungan_pasien/'.$result->id_user)?>",
        data : {id:id},
        success:function(data){
        // console.log(data);
        $('#hubung_id4').html(data);
    }
})
      $.ajax({
        url : "<?= base_url('doctor/get_hubungan_pasien/'.$result->id_user)?>",
        data : {id:id},
        success:function(data){
        // console.log(data);
        $('#hubung_id5').html(data);
    }
})
      $.ajax({
        url : "<?= base_url('doctor/get_hubungan_pasien/'.$result->id_user)?>",
        data : {id:id},
        success:function(data){
        // console.log(data);
        $('#hubung_id6').html(data);
    }
});
  }

  $(document).ready(function(){
    conversion_rate();
    $('#convrate').change(function(){
    // let a = $(this).val();
    // console.log(a);
});
});

  function conversion_rate(){
      var cr = $('#convrate').val();
      $.ajax({
        url : "<?= base_url('doctor/get_conversion_rate/'.$id_dokter)?>",
        data : {cr:cr},
        success:function(data){
        // console.log(data);
        $('#txtconv').html(data);
    }
})
      $.ajax({
        url : "<?= base_url('doctor/get_e_rekam_medis/'.$id_dokter)?>",
        data : {cr:cr},
        success:function(data){
        // console.log(data);
        $('#txterkm').html(data);
    }
})
  // $.ajax({
  //   url : "<?= base_url('doctor/get_conversion_rate/')?>",
  //   data : {cr:cr},
  //   success:function(data){
  //       // console.log(data);
  //     $('#txtconv').html(data);
  //   }
  // });
}
</script>
    <!-- <div class="RightCol" style="margin-top: 15%;">

    <a href="#" class="btn" style="background-color: #e7e6e6; border: none; width: 300px; height: 70px ">A</a><br />
   
</div> -->