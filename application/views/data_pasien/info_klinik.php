<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('#media').carousel({
      pause: false,
      interval: false,
    });
  });
</script>
<script type="text/javascript">
  new Glider(document.querySelector('.glider'), {
    slidesToShow: 3,
    draggable: true,
    arrows: {
      next: '.glider-next'
    },
  });
</script>
<script type="text/javascript">
  new Glider(document.querySelector('.dots'), {
    slidesToShow: 3,
    draggable: true,
    arrows: {
      next: '.glider-next.dots'
    },
  });
</script>
<style type="text/css">
  /* carousel */
  .media-carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
    margin-top: 30px;
  }

  /* Previous button  */
  .media-carousel .carousel-control.left {
    left: -12px;
    background-image: none;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    height: 40px;
    width: 40px;
    margin-top: 30px
  }

  /* Next button  */
  .media-carousel .carousel-control.right {
    right: -12px !important;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    height: 40px;
    width: 40px;
    margin-top: 30px;
  }

  /* Changes the position of the indicators */
  .media-carousel .carousel-indicators {
    right: 50%;
    top: auto;
    bottom: 0px;
    margin-right: -19px;
  }

  /* Changes the colour of the indicators */
  .media-carousel .carousel-indicators li {
    background: #c0c0c0;
  }

  .media-carousel .carousel-indicators .active {
    background: #333333;
  }

  .media-carousel img {
    width: 250px;
    height: auto;
  }

  /* End carousel */
  /*huhu
.selectCF{
  margin:0;
  padding:0;
  display:inline-block;
  position:relative;

    height: 40px;
}
.selectCF li{
  list-style:none;
  cursor: pointer;
  perspective: 900px;
  -webkit-perspective: 900px;
  text-align: left;
}
.selectCF > li{
  position:relative;
  font-size:0;
}
.selectCF span{
  display:inline-block;
  height:45px;
  line-height:45px;
  color:#FFF;
}
.selectCF .arrowCF{
  width:25px;
  text-align:center;
  vertical-align: top;
  font-size:10px;
  height: 40px;

  border-bottom-left-radius: 5px;
  border-top-left-radius: 5px;
}
.selectCF .titleCF{
  padding: 0 10px 0 10px;
  border: 1px solid #e0e0e0;
  font-size:14px;
  font-weight:400;
  overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.selectCF .searchCF{
  padding: 0 10px 0 20px;
  border-left: dotted 1px rgba(244,244,244,.5);
  position: absolute;
  top:0;
  right:0;
  z-index:-1;
}

.searchActive .searchCF{
  z-index:0;
  animation: searchActive 0.3s alternate 1;
  -moz-animation: searchActive 0.3s alternate 1;
  -webkit-animation: searchActive 0.3s alternate 1;
}
.searchActive .titleCF{
  opacity:0;
}
.selectCF .searchCF input{
  line-height:25px;
  border:none;
  margin-left: 20px;
  width:100%;
  height:100%;
  background:#e28a9d;
  font-size:14px;
}
.selectCF .searchCF input:active, .selectCF .searchCF input:focus{
  box-shadow:none;
  border:none;
  outline: none;
}
.selectCF li ul{  
  display:none;
  list-style: none;
  top:100%;
  left:0;
  margin: 0;
  padding: 0 !important;
  width:100%;
  max-height: 100px;
  background: #FFF;
    overflow-y: auto;
  transition: .2s;
  -webkit-transition: .2s;
  z-index:9999 !important;
  background-color: white;
  border: 1px solid #e0e0e0; 
}
.selectCF li ul li{
  padding:9px 0 9px 20px;
  border-bottom: 1px solid rgba(240,240,240,.9);
  font-weight:normal;
  font-size:14px;
  transition: .2s;
  -webkit-transition: .2s;
  overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.selectCF li ul li:hover{
  background: #e28a9d;
  color:#FFF;
}
.selectCF .selected{
  background: #e28a9d;
  color:#FFF;
}
.selectCF li ul li:last-child{
  border-bottom: none;
}

.onCF li ul{
  display: block;
  }*/

  /*huhu*/
  .modal-footer {
    margin-top: -30px;
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

  figure {
    background: #e7e6e6 !important;
    display: block;
    margin-left: 4.5em;
    margin-right: 4.5em;
    padding: 2em;
  }

  blockquote {
    padding: .5em;
    font-size: 1.3em;
    text-align: center;
    border: none;
    margin-bottom: auto;
    font-weight: bold;
    color: black;
  }

  .glider-contain {
    width: 80% !important;
    margin-top: 20%;
    margin-bottom: 5%;
  }

  @media only screen and (max-width: 800px) {
    .glider-next {
      right: -90px;
      top: 35%;
    }

    .glider-next.dots {
      right: -90px;
      top: 40%;
    }
  }

  @media only screen and (min-width: 900px) {
    .glider-next {
      right: -130px;
      top: 35%;
    }

    .glider-next.dots {
      right: -130px;
      top: 40%;
    }
  }

  .figure-2 {
    background: white !important;
    display: block;
    margin-left: 4.5em;
    margin-right: 4.5em;
    padding: 2em;
  }

  .blockquote-2 {
    padding-left: 0%;
    font-size: 1.3em;
    text-align: left;
    border: none;
    margin-bottom: auto;
    color: black;
  }
</style>

<div class="col-sm-12 col-lg-12 main" style="margin-top: 6%">
  <div class="row">
    <div class="col-lg-12">
    </div>
  </div>
  <br>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-12" style="padding: 15px;">
        <h3 style="color: black;"><b>Informasi tentang Klinik Kami</b></h3>
        <br>
      </div>
      <div class="col-md-12">
        <div class="col-md-3" style="padding-left: 40px">
          <img src="<?php echo base_url() ?>assets/images/logo.png" width="50%">
        </div>
        <br>
        <div class="col-md-9">
          <p>
            Kehadiran spesialis perawatan gigi escalade disajikan secara eksklusif untuk memenuhi semua
            kebutuhan Anda dalam masalah kesehatan gigi dan kecantikan dengan layanan yang lebih
            menyenangkan & pribadi. Seluruh paket yang datang dengan harga yang pantas memberikan Anda
            perawatan gigi dengan solusi dan fasilitas yang komprehensif, lingkungan yang nyaman serta
            teknologi canggih dengan peralatan yang aman dan mensterilkan. Karena kami percaya bahwa
            senyum yang indah membuat perbedaan, layanan gigi yang lengkap disediakan.
          </p>
          <button class="btn col-sm-4" style="width: 180px; background-color: #e48a9e; color: white; margin-top: 40px">Kunjungi <br>Website Kami</button>
        </div>
      </div>
      <br><br><br><br>
      <div class="glider-contain multiple" style="margin-left: 18px;">
        <h3 style="color: #e48a9e;"><b>Layanan Kami</b></h3>
        <br>
        <div class="glider">
          <?php foreach ($layanan->result() as $result) : ?>
            <figure>
              <blockquote><?php echo $result->layanan; ?></blockquote>
            </figure>
          <?php endforeach; ?>

        </div>
        <button class=glider-next>
          <img src="<?php echo base_url() ?>assets/images/next.png" width="50%">
        </button>
      </div>

      <div class="glider-contain multipled" style="margin-left: 18px; margin-top: 5%">
        <h3 style="color: #e48a9e;"><b>Lokasi Kami</b></h3>
        <br>
        <div class="dots">
          <?php foreach ($cabang->result() as $result) : ?>
            <figure class="figure-2">
              <blockquote class="blockquote-2"><?php echo $result->nama_cabang; ?></blockquote>
              <p> <?php echo $result->alamat ?>
              </p>
              <div>
                <button href="#" class="btn btn-primary btn-sm btn-block" style="background-color: #e48a9e; border: none; width: 10em;">
                  Temukan kami di<br>Google Maps
                </button>
              </div>
            </figure>
          <?php endforeach; ?>
        </div>
        <button class="glider-next dots">
          <img src="<?php echo base_url() ?>assets/images/next.png" width="50%">
        </button>
      </div>
    </div>
  </div>
</div>