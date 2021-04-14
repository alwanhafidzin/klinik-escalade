<!-- <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> -->
<script type="text/javascript">

</script>
<script>
  $(document).ready(function() {
    function alignModal() {
      var modalDialog = $(this).find(".modal-dialog");

      // Applying the top margin on modal dialog to align it vertically center
      modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);

    // Align modal when user resize the window
    $(window).on("resize", function() {
      $(".modal:visible").each(alignModal);
    });
  });

  $(function() {
    $("#date").datepicker();
  });
</script>

<style type="text/css">
  .modal-admin {
    /* new custom width */
    width: 70%;
  }

  .red {
    background-color: #f40049;
    color: white;
  }

  .red:hover {
    color: white;
  }

  .red {
    background-color: white;
    color: #f40049;
  }

  .navigasi-btn {
    background-color: white;
    color: black;
    width: 130px;
  }

  .navigasi-btn:hover {
    border: 1px solid black;
    color: black;
    box-shadow: 2px 2px #888888;
  }

  .btn-white {
    background-color: white;
    color: #f40049;
  }

  .btn-white:hover {
    border: 1px solid darkgrey;
    color: #f40049;
  }

  @media only screen and (max-width: 800px) {
    .modal-footer {
      margin-top: -30px;
    }

    .container1 {
      padding: 10px;
    }

    .table tbody td {
      vertical-align: middle;
    }

    .tengah {
      vertical-align: middle;
    }

    .table-hover>thead>tr>th {
      border-bottom: 0px solid #f40049;
    }

    .table-hover>tbody>tr {
      border: 1px solid #dedede !important;
    }

    .table-hover>tbody>tr>td {
      vertical-align: middle;
    }

    .table-hover>tbody>tr:hover {
      border: 2px solid pink !important;
    }

    .red {
      background-color: #f40049;
      color: white;
    }

    .left-border {
      border-right: 2px solid black;
    }

    /**/
    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }

    .navbar.navbar-default {
      width: 100%;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
      border: 1px solid #e0e0e0;
      /*position: absolute;*/

    }

    .navbar-nav>li>.dropdown-menu {
      list-style-type: none;
    }

    .navbar-default .navbar-nav>li>a {
      width: 200px;
      color: #000;
    }

    .mega-dropdown {
      position: relative;
      /*width:100%;*/
    }

    .mega-dropdown-menu {
      padding-top: 20px;
      padding-bottom: 20px;
      padding-left: 0px;
      max-width: 100%;
      box-shadow: none;
      -webkit-box-shadow: none;
      margin: auto;
    }

    .mega-dropdown-menu>li>ul {
      padding: 0;
      margin: 0;
    }

    .mega-dropdown-menu>li>ul>li {
      list-style: none;
      list-style-type: none;
      border-bottom: 1px solid #e0e0e0;
      background-color: #f40049;
    }

    .mega-dropdown-menu>li>ul>li>a {
      display: block;
      padding: 3px 20px;
      clear: both;
      font-weight: normal;
      line-height: 1.428571429;
      color: #000;
      white-space: normal;
    }

    .mega-dropdown-menu>li ul>li>a:hover,
    .mega-dropdown-menu>li ul>li>a:focus {
      text-decoration: none;
      color: #444;
      background-color: #f5f5f5;
    }

    .mega-dropdown-menu .dropdown-header {
      color: #428bca;
      font-size: 18px;
      font-weight: bold;
    }

    .mega-dropdown-menu form {
      margin: 3px 20px;
    }

    .mega-dropdown-menu .form-group {
      margin-bottom: 3px;
    }

    .dropdown.mega-dropdown:hover>.dropdown-menu.mega-dropdown-menu.row {
      display: block;
    }

    .navbar-default .navbar-nav>li>a {
      color: #000;
      padding: 30px;
    }

    .navbar-default .navbar-nav>li>a:hover {
      color: #000;
      background: white;
      border: 1px solid #000;
      border-radius: 15px;
    }

    .dropdown-menu.mega-dropdown-menu.row li:hover {
      list-style-type: disc;
      list-style-position: inside;
      background: #fff;
    }

    .megamenu-headline {
      padding: 0 32px;
    }

    .timeline {
      width: 100%;
      padding-top: 10px;
      position: relative;
    }

    .timeline:hover {
      width: 100%;
      /*height: 100%;*/
      padding-top: 10px;
      position: relative;
      background-color: #f5f5f5;
      border-radius: 2%;
    }

    .timeline:before {
      content: '';
      position: absolute;
      top: 0px;
      left: calc(30% + 15px);
      bottom: 0px;
      width: 4px;
      background: #ddd;
    }

    .timeline:after {
      content: "";
      display: table;
      clear: both;
    }

    .entry {
      clear: both;
      text-align: left;
      position: relative;
    }

    .entry .title {
      margin-bottom: .5em;
      float: left;
      width: 33%;
      padding-right: 30px;
      text-align: right;
      position: relative;
    }

    .entry .title:before {
      content: '';
      position: absolute;
      width: 18px;
      height: 18px;
      border: 4px solid #f40049;
      background-color: #f40049;
      border-radius: 100%;
      top: 15%;
      right: -19px;
      z-index: 99;
    }

    .entry .title h3 {
      margin: 0;
      font-size: 120%;
    }

    .entry .title p {
      margin: 0;
      font-size: 100%;
    }

    .entry .body {
      margin: 0 0 3em;
      float: right;
      width: 66%;
      padding-left: 30px;
    }

    .entry .body p {
      line-height: 1.4em;
    }

    .entry .body p:first-child {
      margin-top: 0;
      font-weight: 400;
    }

    .entry .body ul {
      color: #aaa;
      padding-left: 0;
      list-style-type: none;
    }

    .entry .body ul li:before {
      content: "–";
      margin-right: .5em;
    }
  }

  @media only screen and (min-width: 900px) {
    .modal-footer {
      margin-top: -30px;
    }

    .container1 {
      padding: 10px;
    }

    .table tbody td {
      vertical-align: middle;
    }

    .tengah {
      vertical-align: middle;
    }

    .table-hover>thead>tr>th {
      border-bottom: 0px solid #f40049;
    }

    .table-hover>tbody>tr {
      border: 1px solid #dedede !important;
    }

    .table-hover>tbody>tr>td {
      vertical-align: middle;
    }

    .table-hover>tbody>tr:hover {
      border: 2px solid pink !important;
    }

    .red {
      background-color: #f40049;
      color: white;
    }

    .salmon {
      background-color: #f40049;
      color: white;
    }

    .left-border {
      border-right: 2px solid black;
    }

    /**/
    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }

    .navbar.navbar-default {
      width: 100%;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      /*box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
        border: 1px solid #e0e0e0;*/
      /*position: absolute;*/

    }

    .utama {
      width: 100%;
      margin: 0 auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
      border: 1px solid #e0e0e0;
      /*position: absolute;*/

    }

    .navbar-nav>li>.dropdown-menu {
      list-style-type: none;
    }

    .navbar-default .navbar-nav>li>a {
      width: 250px;
      color: #000;
    }

    .mega-dropdown {
      position: relative;
      /*width:100%;*/
    }

    .mega-dropdown-menu {
      padding-top: 20px;
      padding-bottom: 20px;
      padding-left: 0px;
      min-width: 200%;
      box-shadow: none;
      -webkit-box-shadow: none;
      margin: auto;
    }

    .mega-dropdown-menu>li>ul {
      padding: 0;
      margin: 0;
    }

    .mega-dropdown-menu>li>ul>li {
      list-style: none;
      list-style-type: none;
      border-bottom: 1px solid #e0e0e0;
      background-color: #f40049;
    }

    .mega-dropdown-menu>li>ul>li>a {
      display: block;
      padding: 3px 20px;
      clear: both;
      font-weight: normal;
      line-height: 1.428571429;
      color: #000;
      white-space: normal;
    }

    .mega-dropdown-menu>li ul>li>a:hover,
    .mega-dropdown-menu>li ul>li>a:focus {
      text-decoration: none;
      color: #444;
      background-color: #f5f5f5;
    }

    .mega-dropdown-menu .dropdown-header {
      color: #428bca;
      font-size: 18px;
      font-weight: bold;
    }

    .mega-dropdown-menu form {
      margin: 3px 20px;
    }

    .mega-dropdown-menu .form-group {
      margin-bottom: 3px;
    }

    .dropdown.mega-dropdown:hover>.dropdown-menu.mega-dropdown-menu.row {
      display: block;
    }

    .navbar-default .navbar-nav>li>a {
      color: #000;
      padding: 30px;
    }

    .navbar-default .navbar-nav>li>a:hover {
      color: #000;
      background: white;
      border: 1px solid #000;
      border-radius: 15px;
    }

    .dropdown-menu.mega-dropdown-menu.row li:hover {
      list-style-type: disc;
      list-style-position: inside;
      background: #fff;
    }

    .megamenu-headline {
      padding: 0 32px;
    }

    .timeline {
      width: 100%;
      padding-top: 10px;
      position: relative;
    }

    .timeline:hover {
      width: 100%;
      /*height: 100%;*/
      padding-top: 10px;
      position: relative;
      background-color: #f5f5f5;
      border-radius: 2%;
    }

    .timeline:before {
      content: '';
      position: absolute;
      top: 0px;
      left: calc(30% + 15px);
      bottom: 0px;
      width: 4px;
      background: #ddd;
    }

    .timeline:after {
      content: "";
      display: table;
      clear: both;
    }

    .entry {
      clear: both;
      text-align: left;
      position: relative;
    }

    .entry .title {
      margin-bottom: .5em;
      float: left;
      width: 33%;
      padding-right: 30px;
      text-align: right;
      position: relative;
    }

    .entry .title:before {
      content: '';
      position: absolute;
      width: 18px;
      height: 18px;
      border: 4px solid #f40049;
      background-color: #f40049;
      border-radius: 100%;
      top: 15%;
      right: -9px;
      z-index: 99;
    }

    .entry .title h3 {
      margin: 0;
      font-size: 120%;
    }

    .entry .title p {
      margin: 0;
      font-size: 100%;
    }

    .entry .body {
      margin: 0 0 3em;
      float: right;
      width: 66%;
      padding-left: 30px;
    }

    .entry .body p {
      line-height: 1.4em;
    }

    .entry .body p:first-child {
      margin-top: 0;
      font-weight: 400;
    }

    .entry .body ul {
      color: #aaa;
      padding-left: 0;
      list-style-type: none;
    }

    .entry .body ul li:before {
      content: "–";
      margin-right: .5em;
    }
  }
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

  <div class="row">
    <div class="col-lg-12">
    </div>
  </div>
  <!--/.row-->
  <br>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <nav class="navbar navbar-default">
              <div class="nav-collapse">
                <font style="font-weight: bold; font-size: 15px;">Buat Janji Pemeriksaan</font><br><br>
                <form action="<?php echo base_url('klinik/add_booking'); ?>" method="post">
                  <ul class="nav navbar-nav">
                    <li class="dropdown  mega-dropdown"> <a href="#" class="" data-toggle="" style="border-radius: 5px; padding: 7px; width: 200px; background-color:  #f40049; color: white">
                        <div id="id_user2">
                          <font style="margin-left: 10px;"> <?php foreach ($user->result() as $result3) : echo $result3->nama_depan_u; ?> <?php echo $result3->nama_belakang_u;
                                                                                                                                        endforeach; ?><span class="glyphicon glyphicon-search" style="color: white;margin-right: 10px;float: right;"></span></font>
                        </div>
                      </a>
                      <ul class="dropdown-menu mega-dropdown-menu row" style="padding: 30px;">
                        <table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('klinik/data_keluarga'); ?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
                          <thead>
                            <tr>
                              <th data-formatter="numberFormatter" data-field="id_user" data-align="right">No</th>
                              <th data-field="nama_depan_u" data-sortable="true">ID Akun Keluarga</th>
                              <th data-field="tanggal_lahir" data-formatter="true" data-align="center">Tanggal Lahir</th>
                              <th data-field="no_hp" data-sortable="true" data-align="left">Nomor HP</th>
                              <th data-field="email" data-sortable="true" data-align="left">Email</th>
                              <th data-field="id_user" data-formatter="stok" data-align="center">Action</th>
                            </tr>
                          </thead>
                        </table>
                      </ul>
                    </li>
                    <li>
                      <div class="form-group" style="">
                        <center><button class="btn btn-anim btn-white" style="width: 200px; border-radius: 5px" type="button" onclick="location.href ='<?php echo base_url('klinik/tambah_pasien'); ?>'"><span class="btn-text">Buat Akun Keluarga</span></button></center>
                        <input type="hidden" name="id_user" value="0">
                        <input type="hidden" name="status" value="0">
                      </div>
                    </li>
                  </ul>
                </form>
              </div>
            </nav>
          </div>
          <div class="col-md-12">
            <nav class="navbar navbar-default">
              <div class="nav-collapse">

                <form action="<?php echo base_url('klinik/add_booking'); ?>" method="post">
                  <ul class="nav navbar-nav">
                    <li class="dropdown mega-dropdown"> <a href="#" class="" data-toggle=""><b>Pilih Profil</b><br><br>
                        <font color="#90a4ae">
                          <div id="id_pasien2">Pilih Profil Calon Pasien<br><br><br><br></div>
                        </font><span class="glyphicon glyphicon-chevron-down pull-right"></span>
                      </a>
                      <ul class="dropdown-menu mega-dropdown-menu row">
                        <?php foreach ($pasien->result() as $result1) : ?>
                          <li class="col-sm-6" style="list-style-type: none;">
                            <div class="col-sm-6">
                              <?php echo $result1->nama_depan  ?> <?php echo $result1->nama_belakang  ?><br></b>
                              <?php echo $result1->alamat ?><br>
                            </div>
                            <button class="btn red col-sm-6" style="float: right; width: 100px" type="button" onclick="pilih_pasien('<?php echo $result1->id_pasien ?>')">Pilih</button>
                            <input type="hidden" name="id_pasien" value="<?php echo $result1->id_pasien ?>">
                            <div class="col-sm-12">
                              <hr>
                            </div>
                          </li>
                        <?php endforeach; ?>
                        <li class="col-sm-6" style="list-style-type: none;">
                          <div class="col-sm-6">
                            <b>Buat Profil Pasien Baru<br></b>
                            Pilih opsi ini apabila calon pasien belum terdaftar<br>
                          </div>
                          <button class="btn salmon col-sm-6" style="float: right; width: 100px" type="button" onclick="location.href ='<?php echo base_url() ?>klinik/tambah_pasien_k/<?php echo $result1->id_user ?>'">Pilih</button>
                          <!-- <a type="button" class="btn #e28a9d col-sm-4" style="float: right; width: 100px" href="<?php echo base_url('pasien/site5_addpasien'); ?>">Pilih</a> -->
                          <div class="col-sm-12">
                            <hr>
                          </div>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle=""><b>Pilih Cabang</b><br><br>
                        <font color="#90a4ae">
                          <div id="id_cabang2"> Ketik kota, daerah, atau cabang yang kamu tuju (Jakarta Selatan, Tebet Surabaya, dst)</div>
                        </font><span class="glyphicon glyphicon-chevron-down pull-right"></span>
                      </a>
                      <ul class="dropdown-menu mega-dropdown-menu row">
                        <h5><b style="margin-left: 30px">Jakarta Selatan</b></h5>
                        <hr>
                        <?php foreach ($cabang->result() as $result2) : ?>
                          <li class="col-sm-6" style="list-style-type: none;">
                            <div class="col-sm-6">
                              <b><?php echo $result2->nama_cabang  ?><br></b>
                              <?php echo $result2->alamat ?><br>
                            </div>
                            <button class="btn red col-sm-6" style="float: right; width: 100px" type="button" onclick="pilih_cabang('<?php echo $result2->id_cabang ?>')">Pilih</button>
                            <input type="hidden" name="id_cabang" value="<?php echo $result2->id_cabang ?>">
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                    <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle=""><b>Pilih Dokter</b><br><br><br>
                        <font color="#90a4ae">
                          <div id="id_dokter2"> Cari Spesialisasi (Umum, Konservasi Gigi, Gigi Anak) atau nama dokter (Alana)</div>
                        </font> <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                      </a>
                      <ul class="dropdown-menu mega-dropdown-menu row">

                        <?php foreach ($dokter->result() as $result3) : ?>
                          <li class="col-sm-6" style="list-style-type: none;">
                            <div class="col-sm-6">
                              <b><?php echo $result3->nama_dokter  ?><br></b>
                              <?php echo $result3->spesialis ?><br>
                            </div>
                            <button class="btn red col-sm-6" style="float: right; width: 100px" type="button" onclick="pilih_dokter('<?php echo $result3->id_dokter ?>')">Pilih</button>
                            <input type="hidden" name="id_dokter" value="<?php echo $result3->id_dokter ?>">
                            <div class="col-sm-12">
                              <hr>
                            </div>
                          </li>
                        <?php endforeach; ?>
                        <li class="col-sm-6" style="list-style-type: none;">
                          <div class="col-sm-6">
                            <b>Lihat Semua<br></b>
                            Pilih opsi ini apabila kamu ingin melihat seluruh opsi<br>
                          </div>
                          <button class="btn red col-sm-6" style="float: right; width: 100px; background-color:#f40049; color:white" type="button" onclick="location.href ='<?php echo base_url('Pasien/jadwal_dokter'); ?>'">Pilih</button>
                          <div class="col-sm-12">
                            <hr>
                          </div>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <div class="form-group" style="padding-top: 25%; padding-left: 15%">
                        <center><button class="btn btn-anim" style="height: 75px; width: 200px; background-color: #f40049; color: white; border-radius: 15px"><span class="btn-text">Cek Jadwal</span></button></center>
                        <input type="hidden" name="id_user" value="<?php foreach ($user->result() as $result3) : echo $result3->id_user;
                                                                    endforeach; ?>">
                        <input type="hidden" name="status" value="0">
                      </div>
                    </li>
                  </ul>
                </form>
              </div>

              <!-- /.nav-collapse -->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <!-- <h3 class="mb-20 weight-500">Jadwal yang akan datang</h3><br> -->
          </div>
          <div class="col-md-1"><b>Filter:</b></div>
          <div class="col-md-3">
            <div class="form-group">
              <select id="filter_t" class="form-control">
                <option value="" disabled selected style="display: none;">Filter Tanggal</option>
                <option>Perlihatkan Semua</option>
                <?php foreach ($rencana_sebelum->result() as $result) : ?>
                  <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                  <option value="<?php echo $result->tanggal_rencana ?>"><?php echo $tgl ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <select id="filter_p" class="form-control">
                <option value="" disabled selected style="display: none;">Filter Dokter</option>
                <option>Perlihatkan Semua</option>
                <?php foreach ($dokter->result() as $result) : ?>
                  <option value="<?php echo $result->id_dokter  ?>"><?php echo $result->nama_dokter ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <center>
              <font style="font-weight: bold; font-size: 17px;">Jadwal yang akan datang</font><br><br>
            </center>
          </div>
          <!-- 
        <div class="col-md-6">
          <div class="form-group">
            <select id="filter_p" class="form-control">
              <option value="" disabled selected style="display: none;" >Filter Profil Pasien</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($pasien->result() as $result) : ?>
                <option value="<?php echo $result->id_pasien  ?>"><?php echo $result->nama_depan ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select id="filter_t" class="form-control">
              <option value="" disabled selected style="display: none;" >Filter Tanggal</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($rencana_sebelum->result() as $result) : ?>
                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                <option value="<?php echo $result->tanggal_rencana ?>"><?php echo $tgl ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div> -->

          <div id="txtfilter" class="col-md-12" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

          </div>
        </div>
      </div>
    </div><!-- /.col-->
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <center>
              <font style="font-weight: bold; font-size: 17px;">Pemerikasaan Berjalan</font><br><br>
            </center>
          </div>
          <!-- <div class="col-md-6">
          <div class="form-group">
            <select id="filter_p" class="form-control">
              <option value="" disabled selected style="display: none;" >Filter Profil Pasien</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($pasien->result() as $result) : ?>
                <option value="<?php echo $result->id_pasien  ?>"><?php echo $result->nama_depan ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select id="filter_t" class="form-control">
              <option value="" disabled selected style="display: none;" >Filter Tanggal</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($rencana_sebelum->result() as $result) : ?>
                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                <option value="<?php echo $result->tanggal_rencana ?>"><?php echo $tgl ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div> -->

          <div id="txtfilter_3" class="col-md-12" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

          </div>
        </div>
      </div>
    </div><!-- /.col-->

    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12">
            <center>
              <font style="font-weight: bold; font-size: 17px;">Jadwal pemeriksaan sebelumnya</font><br><br>
            </center>
          </div>
          <!-- <div class="col-md-6">
          <div class="form-group">
            <select id="filter_p_2" class="form-control">
              <option value="" disabled selected style="display: none;" >Filter Profil Pasien</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($pasien->result() as $result) : ?>
                <option value="<?php echo $result->id_pasien  ?>"><?php echo $result->nama_depan ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select id="filter_t_2" class="form-control">
              <option value="" disabled selected style="display: none;" >Filter Tanggal</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($rencana_sebelum->result() as $result) : ?>
                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                <option value="<?php echo $result->tanggal_rencana ?>"><?php echo $tgl ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div> -->
          <div id="txtfilter_2" class="col-md-12" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

          </div>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

</div>
<!--/.main-->
<script type="text/javascript">
  var linke = "<?php echo base_url() ?>";

  function pilih_pasien(id) {

    // console.log("---------", id)
    // $.ajax({
    //    url : linke+"pasien/ajax_get_pasien/"+id,
    //    type: "GET",
    //    dataType: "JSON",
    //    success: function(result) {  
    //        $('#id_pasien2').html(result.nama_depan+result.nama_belakang);
    //    //  $('[name="fc_docno2"]').val(result.no_nota);

    //    }, error: function (jqXHR, textStatus, errorThrown) {
    //        alert('Error get data from ajax');
    //    }
    // });
    $.get(linke + "Pasien/ajax_get_pasien/" + id, $(this).serialize())
      .done(function(data) {
        $('#id_pasien2').html(data);
      });

  }

  function pilih_cabang(id) {
    $.get(linke + "Pasien/ajax_get_cabang/" + id, $(this).serialize())
      .done(function(data) {
        $('#id_cabang2').html(data);
      })
  }

  function pilih_dokter(id) {
    $.get(linke + "Pasien/ajax_get_dokter/" + id, $(this).serialize())
      .done(function(data) {
        $('#id_dokter2').html(data);
      })
  }

  function pilih_user(id) {
    $.get(linke + "klinik/ajax_get_user/" + id, $(this).serialize())
      .done(function(data) {
        $('#id_user2').html(data);
      })
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    profil();
    $('#filter_p').change(function() {
      // let a = $(this).val();
      // console.log(a);
      profil();
    });
  });

  function profil() {
    var id = $('#filter_p').val();
    var tgl = $('#filter_t').val();
    $.ajax({
      url: "<?= base_url('klinik/filter_profil') ?>",
      data: {
        id: id,
        tgl: tgl
      },
      success: function(data) {
        $('#txtfilter').html(data);
      }
    })
    $.ajax({
      url: "<?= base_url('klinik/filter_profil_2') ?>",
      data: {
        id: id,
        tgl: tgl
      },
      success: function(data) {
        $('#txtfilter_2').html(data);
      }
    })
    $.ajax({
      url: "<?= base_url('klinik/filter_profil_3') ?>",
      data: {
        id: id,
        tgl: tgl
      },
      success: function(data) {
        $('#txtfilter_3').html(data);
      }
    });
  }

  $(document).ready(function() {
    tgl();
    $('#filter_t').change(function() {
      // let a = $(this).val();
      // console.log(a);
      tgl();
    });
  });

  function tgl() {
    var tgl = $('#filter_t').val();
    var id = $('#filter_p').val();
    $.ajax({
      url: "<?= base_url('klinik/filter_tanggal') ?>",
      data: {
        tgl: tgl,
        id: id
      },
      success: function(data) {
        $('#txtfilter').html(data);
      }
    })
    $.ajax({
      url: "<?= base_url('klinik/filter_tanggal_2') ?>",
      data: {
        tgl: tgl,
        id: id
      },
      success: function(data) {
        $('#txtfilter_2').html(data);
      }
    })
    $.ajax({
      url: "<?= base_url('klinik/filter_tanggal_3') ?>",
      data: {
        tgl: tgl,
        id: id
      },
      success: function(data) {
        $('#txtfilter_3').html(data);
      }
    });
  }

  function stok(value) {
    return '<div class="btn-group" role="group" aria-label="...">' +
      // '<button class="btn red col-sm-6" style="float: right; width: 100px" type="button" href="<?php echo base_url(); ?>klinik/home_keluarga/'+value+'">Pilih</button>'+
      '<a href="<?php echo base_url(); ?>klinik/home_keluarga/' + value + '" class="btn red" style="background-color:#f40049; color:white">&nbsp;&nbsp; Pilih &nbsp;&nbsp;</a>' +
      '</div>';
    // onclick="pilih_user('+value+')"
  }
</script>
</script>