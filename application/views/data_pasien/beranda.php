<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
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
  /* @media only screen and (max-width: 576px){
  .modal-footer{ margin-top: -30px;}
  .container1{
    padding: 10px;      
  }
  .table tbody td{
    vertical-align: middle;
  }
  .tengah{
    vertical-align: middle;
  }
  .table-hover > thead > tr >th {
    border-bottom: 0px solid #e28a9d;
  }
  .table-hover > tbody > tr {
    border: 1px solid #dedede !important;
  }
  .table-hover > tbody > tr > td{
    vertical-align: middle;
  }
  .table-hover > tbody > tr:hover {
    border: 2px solid pink !important;
  }
  .left-border {
    border-right:2px solid black;       
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
    width: 100px;
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
    background-color: #e28a9d;
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
    /* height: 100%;*/
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
    border: 4px solid #e28a9d;
    background-color: #e28a9d;
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
      border-bottom: 0px solid #e28a9d;
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
      width: 300px;
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
      background-color: #e28a9d;
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
      width: 100px;
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
      /* height: 100%;*/
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
      border: 4px solid #e28a9d;
      background-color: #e28a9d;
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
      border-bottom: 0px solid #e28a9d;
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
      width: 300px;
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
      background-color: #e28a9d;
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
      border: 4px solid #e28a9d;
      background-color: #e28a9d;
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

    .salmon {
      background-color: #e28a9d;
      color: white;
    }

    .box2 select {
      background-color: white;
      color: none;
      width: 180px;
      font-size: 15px;
      -webkit-appearance: button;
      appearance: button;
      outline: none;
      text-align: left;

    }

    .box2::before {
      content: "\f358";
      font-family: "Font Awesome 5 free";
      position: absolute;
      /* background-color: blue; */
      top: 0;
      right: 15px;
      width: 15%;
      height: 34px;
      text-align: center;
      font-size: 22px;
      line-height: 34px;
      color: rgba(255, 255, 255);
      background-color: #e28a9d;
      pointer-events: none;
      border-radius: 0 20% 20% 0;
    }

    .box2:hover::before {
      color: rgba(255, 255, 255, 0.6);
      background-color: #ffb6c1;
    }

    .box2 select option {
      padding: 30px;
    }
  }
</style>
<div class="col-sm-12 col-lg-12 main" style="margin-top: 6%">

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
          <div class="col-md-12" style="padding: 15px;">
            <h3 class="mb-20 weight-500"><b>Halo, Selamat Datang <?php echo $this->session->userdata('nama_depan'); ?>!</b></h3><br>
          </div>
          <div class="col-md-12">
            <nav class="navbar navbar-default">
              <div class="nav-collapse">

                <form action="<?php echo base_url('Pasien/add_booking'); ?>" method="post">
                  <ul class="nav navbar-nav">
                    <li class="button"> <a href="#" class="button" data-toggle="modal" data-target="#ModalProfil"><b>Pilih Profil</b><br><br>
                        <font color="#90a4ae">
                          <div id="id_pasien2">Pilih Profil Pasien<br><br><br></div>
                        </font><span class="glyphicon glyphicon-chevron-down pull-right"></span>
                      </a>
                    </li>
                    <div id="ModalProfil" class="modal" style="top: 50px;">
                      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="text-align:center;"><b>Pilih Profil Pasien</b></h4>
                            </div>
                            <div class="col-lg-12">

                              <div class="modal-body">
                                <h5 class="madal-body">
                                  <center>Pilih Pasien yang ingin diperiksa</center>
                                </h5><br><br><br>
                                <h5>
                                  <?php foreach ($pasien->result() as $result1) : ?>
                                    <li class="col-sm-6" style="list-style-type: none; width:50%">
                                      <div class="col-sm-6">
                                        <b><?php echo $result1->nama_depan  ?> <?php echo $result1->nama_belakang ?> - <?php echo $result1->hubungan ?></b>
                                        <br><br>
                                      </div>

                                      <button class="btn salmon" style="float: right; width: 100px;" type="button" onclick="pilih_pasien('<?php echo $result1->id_pasien ?>')">Pilih</button>
                                      <div class="col-sm-12"> </div>
                                      <input type="hidden" name="id_pasien" value="<?php echo $result1->id_pasien ?>">

                                    </li>
                                  <?php endforeach; ?>
                                  <li class="col-sm-6" style="list-style-type: none;">
                                    <div class="col-sm-6">
                                      <b>Buat Profil Pasien Baru<br></b>
                                      Pilih opsi ini apabila calon pasien belum terdaftar<br>
                                    </div>
                                    <button class="btn salmon" style="float: right; width: 100px;" type="button" onclick="location.href ='<?php echo base_url('Pasien/tambah_pasien'); ?>'">Pilih</button>

                                    <!-- <div class="col-sm-12"> <hr> </div> -->
                                  </li>
                                </h5>
                              </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                    </li>
                    <li class="button"> <a href="#" class="button" data-toggle="modal" data-target="#ModalCabang"><b>Pilih Cabang</b><br><br>
                        <font color="#90a4ae">
                          <div id="id_cabang2"> Ketik kota, daerah, atau cabang yang kamu tuju (Jakarta Selatan, Tebet Surabaya, dst)</div>
                        </font><span class="glyphicon glyphicon-chevron-down pull-right"></span>
                      </a>
                      <div id="ModalCabang" class="modal" style="top: 50px;">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" style="text-align: center;"><b>Pilih Cabang Klinik</b></h4>
                              </div>
                              <div class="col-lg-12">

                                <div class="modal-body">
                                  <h5 class="madal-body">
                                    <center>Ketik kota, daerah, atau cabang yang kamu pilih <br>(Jakarta Selatan, Tebet Surabaya, dst)</center>
                                  </h5><br><br><br>
                                  <h5>
                                    <?php foreach ($cabang->result() as $result2) : ?>
                    <li class="col-sm-12" style="list-style-type: none;"><br><br>
                      <div class="col-sm-6">
                        <b><?php echo $result2->nama_cabang  ?><br></b>
                        <?php echo $result2->alamat ?><br>
                      </div>
                      <button class="btn red col-sm-6" style="float: right; width: 100px; background-color:#f40049; color:white" type="button" onclick="pilih_cabang('<?php echo $result2->id_cabang ?>')">Pilih</button>
                      <input type="hidden" name="id_cabang" value="<?php echo $result2->id_cabang ?>">
                    </li>
                  <?php endforeach; ?>
                  </h5>
              </div>
          </div>
          <div class="modal-footer">
            <center><button class="btn salmon remove hidden" onclick="popUpBatalKonfirmasi()" type="submit" style="background-color:#F40049; color:white; margin-top:50px"> Ya, Kirim Konfirmasi Penolakan</button></center>
            <!-- <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>  -->
          </div>
        </div>
      </div>
      </form>
    </div>
    </li>
    <li class="button"> <a href="#" class="button" data-toggle="modal" data-target="#ModalDokter"><b>Pilih Dokter</b><br><br>
        <font color="#90a4ae">
          <div id="id_dokter2"> Cari Spesialisasi (Umum, Konservasi Gigi, Gigi Anak) atau nama dokter (Alana)</div>
        </font> <span class="glyphicon glyphicon-chevron-down pull-right"></span>
      </a>
    </li>
    <div id="ModalDokter" class="modal" style="top: 50px;">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="text-align: center;"><b>Pilih Dokter Klinik</b></h4>
            </div>
            <div class="col-lg-12">

              <div class="modal-body">
                <h5 class="madal-body">
                  <center> Cari Spesialisasi (Umum, Konservasi Gigi, Gigi Anak) <br>atau nama dokter (Alana) </center>
                </h5><br><br><br>
                <h5>
                  <?php foreach ($dokter->result() as $result3) : ?>
                    <li class="col-sm-6" style="list-style-type: none;">
                      <div class="col-sm-6">
                        <b><?php echo $result3->nama_dokter  ?><br></b>
                        <?php echo $result3->spesialis ?> &nbsp;&nbsp;<br>
                        <span class="glyphicon glyphicon-briefcase" style="color: grey;"></span> <span class="float: right;"><?php echo $result3->pengalaman ?> tahun</span>
                      </div>
                      <button class="btn salmon" style="float: right; width: 100px;" type="button" onclick="pilih_dokter('<?php echo $result3->id_dokter ?>')">Pilih</button>

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
                    <button class="btn salmon" style="float: right; width: 100px;" type="button" onclick="location.href ='<?php echo base_url('Pasien/jadwal_dokter'); ?>'">Pilih</button>
                    <!-- <div class="col-sm-12"> <hr> </div> -->
                  </li>
                </h5>
              </div>
            </div>
            <div class="modal-footer">
              <center><button class="btn salmon remove hidden" onclick="popUpBatalKonfirmasi()" type="submit" style="background-color:#F40049; color:white; margin-top:50px"> Ya, Kirim Konfirmasi Penolakan</button></center>
              <!-- <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>  -->
            </div>
          </div>
        </div>
      </form>
    </div>
    </li>
    <li>
      <div class="form-group" style="padding-top: 25%; padding-left: 15%">
        <center><button class="btn btn-anim" style="height: 75px; width: 200px; background-color: #e28a9d; color: white; border-radius: 15px"><span class="btn-text">Cek Jadwal</span></button></center>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
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
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12">
          <h3 class="mb-20 weight-500">Jadwal yang akan datang</h3><br>
        </div>
        <div class="col-md-6">
          <div class="form-group box2">
            <select id="filter_p" class="form-control" style="width: 100%;">
              <option value="" disabled selected style="display: none;">Filter Profil Pasien</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($pasien->result() as $result) : ?>
                <option value="<?php echo $result->id_pasien  ?>"><?php echo $result->nama_depan ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group box2">
            <select id="filter_t" class="form-control" style="width: 100%;">
              <option value="" disabled selected style="display: none;">Filter Tanggal</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($rencana_sebelum->result() as $result) : ?>
                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                <option value="<?php echo $result->tanggal_rencana ?>"><?php echo $tgl ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div id="txtfilter" class="col-md-12" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">

        </div>
      </div>
    </div>
  </div><!-- /.col-->

  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-12">
          <h3 class="mb-20 weight-500">Jadwal pemeriksaan sebelumnya</h3><br>

        </div>
        <div class="col-md-6">
          <div class="form-group box2">
            <select id="filter_p_2" class="form-control" style="width: 100%;">
              <option value="" disabled selected style="display: none;">Filter Profil Pasien</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($pasien->result() as $result) : ?>
                <option value="<?php echo $result->id_pasien  ?>"><?php echo $result->nama_depan ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group box2">
            <select id="filter_t_2" class="form-control" style="width:100%">
              <option value="" disabled selected style="display: none;">Filter Tanggal</option>
              <option>Perlihatkan Semua</option>
              <?php foreach ($rencana_sebelum->result() as $result) : ?>
                <?php $tgl = date('d F Y', strtotime($result->tanggal_rencana)); ?>
                <option value="<?php echo $result->tanggal_rencana ?>"><?php echo $tgl ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
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
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    $.ajax({
      url: "<?= base_url('Pasien/filter_profil') ?>",
      data: "id=" + id,
      success: function(data) {
        $('#txtfilter').html(data);
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
    $.ajax({
      url: "<?= base_url('Pasien/filter_tanggal') ?>",
      data: "tgl=" + tgl,
      success: function(data) {
        $('#txtfilter').html(data);
      }
    });
  }

  $(document).ready(function() {
    profil_2();
    $('#filter_p_2').change(function() {
      // let a = $(this).val();
      // console.log(a);
      profil_2();
    });
  });

  function profil_2() {
    var id = $('#filter_p_2').val();
    $.ajax({
      url: "<?= base_url('Pasien/filter_profil_2') ?>",
      data: "id=" + id,
      success: function(data) {
        $('#txtfilter_2').html(data);
      }
    });
  }

  $(document).ready(function() {
    tgl_2();
    $('#filter_t_2').change(function() {
      // let a = $(this).val();
      // console.log(a);
      tgl_2();
    });
  });

  function tgl_2() {
    var tgl = $('#filter_t_2').val();
    $.ajax({
      url: "<?= base_url('Pasien/filter_tanggal_2') ?>",
      data: "tgl=" + tgl,
      success: function(data) {
        $('#txtfilter_2').html(data);
      }
    });
  }
</script>