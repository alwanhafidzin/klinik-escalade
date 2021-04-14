<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script>
	$(document).ready(function(){
		function alignModal(){
			var modalDialog = $(this).find(".modal-dialog");

        // Applying the top margin on modal dialog to align it vertically center
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
      }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);
    
    // Align modal when user resize the window
    $(window).on("resize", function(){
    	$(".modal:visible").each(alignModal);
    });   
  });
</script>
<style type="text/css">
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
   box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
   border: 1px solid #e0e0e0;

 }

 .navbar-nav>li>.dropdown-menu {
   list-style-type: none;
 }

 .navbar-default .navbar-nav>li>a {
   width: 283px;
   color: #000;
 }

.mega-dropdown { position: static !important;/*width:100%;*/ }

.mega-dropdown-menu {
  padding-top:20px;
  padding-bottom: 20px;
  padding-left: 0px;
  max-width: 100%;
  box-shadow: none;
  -webkit-box-shadow: none;
  margin: auto;
}

.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}

.mega-dropdown-menu > li > ul > li { 
  list-style: none; 
  list-style-type: none;
  border-bottom: 1px solid #e0e0e0;
  background-color: #e28a9d;
}

.mega-dropdown-menu > li > ul > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.428571429;
  color: #000;
  white-space: normal;
}

.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
  color: #444;
  background-color: #f5f5f5;
}

.mega-dropdown-menu .dropdown-header {
  color: #428bca;
  font-size: 18px;
  font-weight: bold;
}

.mega-dropdown-menu form { margin: 3px 20px; }

.mega-dropdown-menu .form-group { margin-bottom: 3px; }

.dropdown.mega-dropdown:hover > .dropdown-menu.mega-dropdown-menu.row { display: block; }

.navbar-default .navbar-nav>li>a { color: #000; 
  padding: 30px;}

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

 .megamenu-headline { padding: 0 32px; }

 .timeline {
   width: 100%;
   padding-top: 10px;
   position: relative;
 }
 .timeline:hover {
   width: 100%;
   height: 100%;
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
 /*.modal-footer{ margin-top: -30px;}*/
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
 .salmon{
   background-color : #e28a9d;
   color:white;
 }
</style>
<div class="col-sm-12 col-sm-offset-12 col-lg-12 col-lg-offset-0 main">					

  <div class="row">
   <div class="col-lg-12">
   </div>
 </div><!--/.row-->
 <br><br><br><br><br>	
 <div class="row">
   <div class="col-md-12">	
    <div class="panel panel-default">
     <div class="panel-body">
      <div class="col-md-12" style="padding-bottom: 30px;">
       <h3 class="mb-20 weight-500"><b>Cek Jadwal Dokter Favorit Kamu</b></h3>
       <font>Kamu dapat melihat jadwal dokter pilihan kamu lalu membuat rencana pemeriksaan</font>
     </div>
     <form action="<?php echo base_url('Pasien/jadwal_dokter')?>" action="GET">
       <table>
         <div class="form-group">
          <tr>
           <td  style="padding-right: 20px; padding-left: 20px"><font>Cari nama dokter</font></td>
           <td >									
            <input type="text" class="form-control" rows="3" name="cari" id="cari">															
          </td>
          <td style="padding-left: 20px; ">
            <button type="submit" class="btn salmon" style="float: right; height: 35px; width: 100px;"><i class="icon-rocket"></i><span class="btn-text">Cari</span></button>													
          </td>
        </tr>
      </div>
    </table>
  </form>
  <div class="container1">
   <div class="">
    <div class="panel-wrapper collapse in">
     <div class="panel-body row">
      <div class="table-wrap">

       <div class="table-responsive" style="display: inline-block">
        <table id="datable_1" class="table  display table-hover border-none" >
         <thead>
          <tr>
           <th style="text-align: center;" class="left-border" width="15%">Nama Dokter</th>
           <th style="text-align: center;" class="left-border" width="15%">Spesialis</th>
           <th style="text-align: center;" class="left-border" width="15%">Cabang</th>
           <th style="text-align: center;" class="left-border" width="15%">Pengalaman Kerja</th>
           <th style="text-align: center;" width="15%">Jadwal Dokter</th>
           <th style="text-align: center;" width="10%">
            <a href="#myModal" class="btn salmon" data-toggle="modal" style="width: 100px">Filter</a>
          </th>
          <!-- Modal HTML -->
          <div id="myModal" class="modal">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" style="text-align: center;"><b>Filter</b></h4>
             </div>
             <form action="<?php echo base_url('Pasien/jadwal_dokter')?>" action="GET">
               <div class="modal-body">
                 <div class="col-lg-4">	 
                  Cabang Klinik
                </div>
                <div class="col-lg-8">	
                  <div class="form-group">
                   <select class="form-control" name="c_cabang">
                    <?php foreach ($cabang->result() as $result2) : ?>
                      <option value="<?php echo $result2->id_cabang  ?>"><?php echo $result2->nama_cabang  ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">	 
                Spesialisasi
              </div>
              <div class="col-lg-8">	
                <div class="form-group">
                 <select class="form-control" name="c_spesialisasi">
                  <option value="Gigi"> Gigi</option>
                  <!-- <option value="Paru-paru">Paru-paru</option> -->
                </select>
              </div>
            </div>
            <div class="col-lg-4">	 
              Hari Praktek
            </div>
            <div class="col-lg-8">	
              <div class="form-group">
               <select class="form-control" name="c_hari">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">	 
            Jam Praktek
          </div>
          <div class="col-lg-8">	
            <div class="form-group">
             <select class="form-control" name="c_jam">
              <option value="04:00:00">04:00:00-06:00:00</option>
              <option value="07:00:00">07:00:00-09:00:00</option>
              <option value="10:00:00">10:00:00-11:00:00</option>
              <option value="12:00:00">12:00:00-15:00:00</option>
            </select>
          </div>
        </div>
        <label>&nbsp;</label>
      </div>

      <div class="modal-footer">
       <button type="submit" class="btn salmon center-block" style="width: 125px">Cari</button>
     </div>
   </form>
 </div>
</div>
</div>    
</tr>
</thead>
<tbody>
  <?php
  if(count($cari)>0)
  {
    foreach ($cari as $data) {
      ?>

      <tr style="border: 1px solid #dedede" >
       <input type="hidden" name="id_dokter" id="id_dokter" value="<?php echo $data->id_dokter ?>">
       <td align="center" width="15%">
        <img src="<?php echo base_url()?>images/<?php echo $data->foto ?>" alt="iMac" width="100" height="100" class="img-circle" ><br><?php echo $data->nama_dokter ?></td>
        <td class="txt-dark" align="center" width="15%"><b>Spesialis <?php echo $data->spesialis ?></b></td>
        <td class="txt-dark"align="center" width="15%">
          <?php 
          $query=$this->db->query('select b.id_cabang,c.nama_cabang from dokter a 
           left outer join cabang_dokter b on a.id_dokter=b.id_dokter
           left outer join cabang c on b.id_cabang=c.id_cabang
           where b.id_dokter="'.$data->id_dokter.'"');
          foreach ($query->result() as $value) :
           ?>
           <label><?php echo $value->nama_cabang ?></label><br>
           <?php endforeach; ?></td>
           <td class="txt-dark"align="center" width="15%"><b><?php echo $data->pengalaman ?> tahun Pengalaman</b></td>
           <td class="txt-dark"align="center" width="15%">
            <?php 
            $query=$this->db->query('select b.id_jadwal,b.hari, b.jam_mulai,b.jam_tutup from dokter a 
             left outer join jadwal_dokter b on a.id_dokter=b.id_dokter
             where a.id_dokter="'.$data->id_dokter.'"');
            foreach ($query->result() as $value) :
             ?>
             <label><?php echo $value->hari?> (<?php echo $value->jam_mulai?>-<?php echo $value->jam_tutup?>)</label><br>
             <?php endforeach; ?></td>
             <td class="txt-dark"align="center" width="10%">
              <button type="button" class="btn salmon" style="width: 100px"><span class="btn-text" data-toggle="modal" data-target="#cek2<?php echo $data->id_dokter ?>">Pilih</span></button>
              <!-- Modal -->

            </td>
          </tr>

          <div id="cek2<?php echo $data->id_dokter ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo $data->nama_dokter?></h4>
                </div>

                <!-- //form -->
                <form action="<?php echo base_url('Pasien/add_booking');?>" method="post">
                  <div class="modal-body">
                    <nav class="navbar navbar-default">
                      <div class="nav-collapse">
                        <input type="hidden" name="id_dokter2" value="<?php echo $data->id_dokter?>">
                        <ul class="nav navbar-nav">
                          <li class="dropdown mega-dropdown">
                            <a href="#" class="" data-toggle="">
                              <b>Pilih Profil</b><br><br>
                              <font color="#90a4ae">
                                <div id="id_pasien2<?php echo $data->id_dokter ?>">Pilih Profil Pasien</div>
                                <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                              </font>
                            </a>
                            <ul class="dropdown-menu mega-dropdown-menu row">
                              <?php foreach ($pasien->result() as $result2) : ?>
                                <li class="col-sm-12" style="list-style-type: none;">
                                  <div class="col-sm-8">
                                    <b><?php echo $result2->nama_depan ?></b><br>
                                    <?php echo $result2->alamat ?><br>
                                  </div>
                                  <button class="btn salmon col-sm-4" style="float: right; width: 100px" type="button" onclick="pilih_pasien('<?php echo $result2->id_pasien ?>','<?php echo $data->id_dokter ?>')">Pilih</button>
                                  <input type="hidden" name="id_pasien" value="<?php echo $result2->id_pasien ?>">
                                  <div class="col-sm-12"> <hr> </div>
                                </li>
                              <?php endforeach; ?>
                              <li class="col-sm-12" style="list-style-type: none;">
                                <div class="col-sm-8">          
                                 <b>Buat Profil Pasien Baru<br></b>
                                 Pilih opsi ini apabila calon pasien belum terdaftar<br>
                               </div>
                               <button class="btn salmon col-sm-4" style="float: right; width: 100px" type="button" onclick="location.href ='<?php echo base_url('pasien/site5_addpasien');?>'">Pilih</button>
                               <!-- <a type="button" class="btn salmon col-sm-4" style="float: right; width: 100px" href="<?php echo base_url('pasien/site5_addpasien');?>">Pilih</a>        -->     
                               <div class="col-sm-12"> <hr> </div>
                             </li>
                           </ul>
                         </li>

                         <li class="dropdown mega-dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="">
                            <b>Pilih Cabang</b><br><br><font color="#90a4ae">
                              <div id="id_cabang2<?php echo $data->id_dokter ?>"> Pilih cabang yang akan Anda tuju</div>
                            </font><span class="glyphicon glyphicon-chevron-down pull-right"></span>
                          </a>
                          <ul class="dropdown-menu mega-dropdown-menu row">
                            <div class="megamenu-headline">
                              <center><h4><b>Jakarta Selatan</b></h4></center>
                            </div>
                            <hr>
                            <?php foreach ($cabang->result() as $result3) : ?>
                              <li class="col-sm-12" style="list-style-type: none; height: 70px; ">
                                <div class="col-sm-8">          
                                  <b><?php echo $result3->nama_cabang  ?></b><br>
                                  <?php echo $result3->alamat ?><br>
                                </div>
                                <button class="btn salmon col-sm-4" style="float: right; width: 100px" type="button" onclick="pilih_cabang('<?php echo $result3->id_cabang ?>','<?php echo $data->id_dokter ?>')">Pilih</button>
                                <input type="hidden" name="id_cabang" value="<?php echo $result3->id_cabang ?>">
                              </li>

                            <?php endforeach; ?>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>

                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
                <input type="hidden" name="status" value="0">
                <div class="modal-footer">
                  <button class="btn salmon" type="submit"> Cek Jadwal</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>

                </div>
              </form>
            </div>
          </div>

        </div>

        <?php
      }
    }
    else
    {
      echo "Data tidak ditemukan";
    }

    ?>
  </tbody>
</table>




<!-- <script src="<?php //echo base_url()?>assets/js/dropdown.js"></script> -->
<script type="text/javascript">
  var linke="<?php echo base_url() ?>";
  function pilih_pasien(id, id2){ 
   $.get(linke+"pasien/ajax_get_pasien/"+id,$(this).serialize())
   .done(function(data){
    $('#id_pasien2'+id2).html(data);
  });

 }   
 function pilih_cabang(id, id2){ 
   $.get(linke+"pasien/ajax_get_cabang/"+id,$(this).serialize())
   .done(function(data){
    $('#id_cabang2'+id2).html(data);
  })
 } 
</script>