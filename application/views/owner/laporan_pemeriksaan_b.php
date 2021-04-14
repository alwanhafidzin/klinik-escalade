<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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

    .nav-menu-lap ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .nav-menu-lap ul li {
        float: left;
    }

    .nav-menu-lap ul li a {
        display: block;
        padding: 8px;
        cursor: pointer;
        text-decoration: none;
        background: #fff;
    }

    .nav-menu-lap ul li a:hover {
        color: #f40049;
    }

    .nav-menu-lap ul li a.active {
        color: #f40049;
    }

    .border-lap a.active {
        border-bottom: 3px solid #f40049;
    }

    .border-lap:hover {
        border-bottom: 3px solid #f40049;
    }

    .lap-mb {
        background: #fff;
        display: block;
        margin: 20px 0 0 0;
        text-align: center;
        float: right;
        border: 2px solid #ccc;
        text-decoration: none;
        cursor: pointer;
    }

    .lap-mb.active {
        background: #f40049;
        display: block;
        margin: 20px 0 0 0;
        text-align: center;
        float: right;
        border: 2px solid #f40049;
        text-decoration: none;
        cursor: pointer;
    }

    .lap-mb.active a {
        color: #fff;
    }

    .lap-mb:hover {
        background: #f40049;
        display: block;
        margin: 20px 0 0 0;
        text-align: center;
        float: right;
        border: 2px solid #f40049;
        text-decoration: none;
        cursor: pointer;
    }

    .lap-mb a:hover {
        color: #fff;
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
                        <font style="font-weight: bold; font-size: 20px;">Laporan Bulanan</font>
                        <a href="<?php echo base_url('owner/export_pemeriksaan_b') ?>" class="btn" style="margin-top: 45px; background-color: #e7e6e6; border: none; color:#f40049; font-weight:bold; float: right;">
                            <img src="<?php echo base_url() ?>assets/images/download.png" height="30px">
                            Download
                        </a>
                    </div>
                    <div class="col-md-12" style="border: 1px solid #e0e0e0; margin-top: 15px;">
                        <div style="float: left">
                            <a>
                                <div href="#" class="btn" style="background-color: #e7e6e6; border: none; color:black; font-weight:bold;">
                                <select id="f_dokter" class="form-control form-control-sm">
                                <option value="" disabled selected style="display: none;">Filter Dokter</option>
                                <option value="b.id_dokter">Perlihatkan Semua</option>
                                <?php foreach ($dokter->result() as $result) : ?>
                               <option value="<?php echo $result->id_dokter  ?>"><?php echo $result->nama_dokter ?></option>
                               <?php endforeach; ?>
                                </select>
                                </div>
                            </a>
                            <span style="color: black; "><b>Periode :</b></span>
                            <div href="#" class="btn" style="border: none; color:black; font-weight:bold;">
                                <div class="col-md-2 outer" style="text-align: left; display: table-cell;vertical-align:middle; padding-right:0px">
                                   <input autocomplete="off" id="from" name='from'> </input>
                                </div>
                            </div>
                            <span style="color: black; background-color: #e7e6e6;"><b>To</b></span>
                            <div href="#" class="btn" style="border: none; color:black; font-weight:bold;">
                                <div class="col-md-2" style="text-align: left; display: table-cell;vertical-align:middle; padding-right:0px">
                                  <input id="to"  autocomplete="off" disabled='disabled'> </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-2 lap-mb">
                            <a href="<?php echo site_url('owner/laporan_pemeriksaan_t') ?>" type="button" class="btn col-md-12">Tahunan</a>
                        </div>
                        <div class="col-lg-2 lap-mb active">
                            <a href="<?php echo site_url('owner/laporan_pemeriksaan_b') ?>" type="button" class="btn col-md-12">Bulanan</a>
                        </div>
                        <div class="col-lg-2 lap-mb">
                            <a href="<?php echo site_url('owner/laporan_pemeriksaan_m') ?>" type="button" class="btn col-md-12">Mingguan</a>
                        </div>
                        <div class="col-lg-2 lap-mb">
                            <a href="<?php echo site_url('owner/laporan_pemeriksaan') ?>" type="button" class="btn col-md-12">Harian</a>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div id="pemeriksaan_b_owner"></div>
                        <div id="container2"></div>
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
                </div>
                <div class="col-md-3" style="background-color:  #f2f2f2; padding:0px;height: 1100px;">
                    <div class="col-md-12" style="padding-right: 0px;">
                        <center>
                            <h4 style=" color: black;"><b>Detail Pemeriksaan</b></h4>
                        </center>
                        <a href="<?php echo base_url('owner/export_detail') ?>" class="btn" style="background-color: #e7e6e6; border: none; color:#f40049; font-weight:bold; float: right;margin-right:20px">
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
                                                                    } elseif ($result->hubungan == 'Anak') {
                                                                        echo $result->hubungan . " " . "<span id ='hubung_id'></span>";
                                                                    } elseif ($result->hubungan == 'Ibu') {
                                                                        echo $result->hubungan . " " . "<span id ='hubung_id2'></span>";
                                                                    } elseif ($result->hubungan == 'Ayah') {
                                                                        echo $result->hubungan . " " . "<span id ='hubung_id3'></span>";
                                                                    } elseif ($result->hubungan == 'Istri') {
                                                                        echo $result->hubungan . " " . "<span id ='hubung_id4'></span>";
                                                                    } elseif ($result->hubungan == 'Suami') {
                                                                        echo $result->hubungan . " " . "<span id ='hubung_id5'></span>";
                                                                    } elseif ($result->hubungan == 'Saudara') {
                                                                        echo $result->hubungan . " " . "<span id ='hubung_id6'></span>";
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
        $(document).ready(function() {
            hubungan_pasien();
            $('#id_user').change(function() {
                // let a = $(this).val();
                // console.log(a);
            });
        });

        function hubungan_pasien() {
            var id = $('#id_user').val();
            $.ajax({
                url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#hubung_id').html(data);
                }
            })
            $.ajax({
                url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#hubung_id2').html(data);
                }
            })
            $.ajax({
                url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#hubung_id3').html(data);
                }
            })
            $.ajax({
                url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#hubung_id4').html(data);
                }
            })
            $.ajax({
                url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#hubung_id5').html(data);
                }
            })
            $.ajax({
                url: "<?= base_url('owner/get_hubungan_pasien/' . $result->id_user) ?>",
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#hubung_id6').html(data);
                }
            });
        }

        $(document).ready(function() {
            conversion_rate();
            $('#convrate').change(function() {
                // let a = $(this).val();
                // console.log(a);
            });
        });

        function conversion_rate() {
            var cr = $('#convrate').val();
            $.ajax({
                url: "<?= base_url('owner/get_conversion_rate/') ?>",
                data: {
                    cr: cr
                },
                success: function(data) {
                    // console.log(data);
                    $('#txtconv').html(data);
                }
            })
            $.ajax({
                url: "<?= base_url('owner/get_e_rekam_medis/') ?>",
                data: {
                    cr: cr
                },
                success: function(data) {
                    // console.log(data);
                    $('#txterkm').html(data);
                }
            })
            // $.ajax({
            //   url : "<?= base_url('owner/get_conversion_rate/') ?>",
            //   data : {cr:cr},
            //   success:function(data){
            //       // console.log(data);
            //     $('#txtconv').html(data);
            //   }
            // });
        }
    </script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  //Script ini digunakan untuk filter
    $(document).ready(function() {
        $('#f_dokter').change(function() {
        filter_dokter();
       });
      });
    function filter_dokter() {
    var id_dokter = $('#f_dokter').val();
    var startDate = $('#from').val();
    var endDate = $('#to').val();
    //Mendapatkan Interval Hari untuk filter periode
    date1 = startDate.split('-');
    date2 = endDate.split('-');
    date1 = new Date(date1[0], date1[1], date1[2]);
    date2 = new Date(date2[0], date2[1], date2[2]);
    date1_unixtime = parseInt(date1.getTime() / 1000);
    date2_unixtime = parseInt(date2.getTime() / 1000);
    var timeDifference = date2_unixtime - date1_unixtime;
    var timeDifferenceInHours = timeDifference / 60 / 60;
    var timeDifferenceInDays = timeDifferenceInHours  / 24;
    var interval =timeDifferenceInDays;
    $.ajax({
      url: "<?= base_url('owner/filter_laporan_pemeriksaan_b') ?>",
      data: {
        id_dokter : id_dokter,
        interval : interval,
        endDate : endDate,
        startDate :startDate
      },
      success: function(data) {
        $('#pemeriksaan_b_owner').empty();
        $('#container2').html(data);
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
  }
    function enableEnd(){
        var date = new Date(this.value);
        date.setDate(date.getDate()+364);
        var id_dokter = $('#f_dokter').val();
        var startDate = $('#from').val();
        var endDate = $('#to').val();
        //Mendapatkan Interval Hari untuk filter periode
        date1 = startDate.split('-');
        date2 = endDate.split('-');
        date1 = new Date(date1[0], date1[1], date1[2]);
        date2 = new Date(date2[0], date2[1], date2[2]);
        date1_unixtime = parseInt(date1.getTime() / 1000);
        date2_unixtime = parseInt(date2.getTime() / 1000);
        var timeDifference = date2_unixtime - date1_unixtime;
        var timeDifferenceInHours = timeDifference / 60 / 60;
        var timeDifferenceInDays = timeDifferenceInHours  / 24;
        var interval =timeDifferenceInDays;
        $.ajax({
        url: "<?= base_url('owner/filter_laporan_pemeriksaan_b') ?>",
        data: {
        id_dokter : id_dokter,
        interval : interval,
        startDate : startDate,
        endDate : endDate
      },
      success: function(data) {
        $('#pemeriksaan_b_owner').empty();
        $('#container2').html(data);
      },
      error: function (request, status, error) {
        alert(request.responseText);
    }
    });
        end.attr('disabled', !this.value.length).
        datepicker('option', 
        {
        minDate:this.value,
        changeMonth: true,
        changeYear: true,
        dateFormat:'yy-mm-dd',
        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],
        dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        maxDate: date,
        onSelect : function (dateText){
        var id_dokter = $('#f_dokter').val();
        var startDate = $('#from').val();
        var endDate = $('#to').val();
        //Mendapatkan Interval Hari untuk filter periode
        date1 = startDate.split('-');
        date2 = endDate.split('-');
        date1 = new Date(date1[0], date1[1], date1[2]);
        date2 = new Date(date2[0], date2[1], date2[2]);
        date1_unixtime = parseInt(date1.getTime() / 1000);
        date2_unixtime = parseInt(date2.getTime() / 1000);
        var timeDifference = date2_unixtime - date1_unixtime;
        var timeDifferenceInHours = timeDifference / 60 / 60;
        var timeDifferenceInDays = timeDifferenceInHours  / 24;
        var interval =timeDifferenceInDays;
        $.ajax({
        url: "<?= base_url('owner/filter_laporan_pemeriksaan_b') ?>",
        data: {
        id_dokter : id_dokter,
        interval : interval,
        endDate : endDate,
        starDate : startDate
      },
      success: function(data) {
        $('#pemeriksaan_b_owner').empty();
        $('#container2').html(data);
      },
      error: function (request, status, error) {
        alert(request.responseText);
    },
    });
        },
        onClose:function( selectedDate ) {
            var date = new Date(selectedDate);
            date.setDate(date.getDate()-364);
            $("#from").datepicker('option',{
                minDate: date,
                maxDate: selectedDate
            });
        }
        });
    }
    var end = $('#to').datepicker();
    $('#from').datepicker({
        onSelect : enableEnd,
        changeMonth: true,
        changeYear: true,
        defaultDate: 0,
        dateFormat: 'yy-mm-dd',
        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Ka', 'Jum', 'Sab'],
        dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
    }).bind('input', enableEnd);
  </script>
    <!-- <div class="RightCol" style="margin-top: 15%;">

    <a href="#" class="btn" style="background-color: #e7e6e6; border: none; width: 300px; height: 70px ">A</a><br />
   
</div> -->