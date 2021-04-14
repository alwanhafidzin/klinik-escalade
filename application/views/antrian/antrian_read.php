<<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Antrian</title>

<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url()?>assets/js/lumino.glyphs.js"></script>

</head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Klinik</span>Kecantikan</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata('level');?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('auth/logout')?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
             <li class="active"><a href="<?php echo site_url('data_pasien/index')?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Data Pasien</a></li>
            <li><a href="<?php echo site_url('Antrian')?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Antrian</a></li>
            <li><a href="<?php echo site_url('data_pasien/rekam')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Rekam Medis</a></li>
            <li><a href="<?php echo site_url('Layanan')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Layanan</a></li>
            <li><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Pembayaran</a></li>
            <li role="presentation" class="divider"></li>
			<li><a href="<?php echo site_url('rekam_medis/laporan_rekam_medis')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Rekam Medis</a></li>
			<li><a href="<?php echo site_url('data_pasien/laporan_pasien')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Transaksi</a></li>
			<li><a href="<?php echo site_url('laporan/laporan_pemasukan')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Pemasukan</a></li>
        </ul>

    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Antrian</li>
                <li class="active">Detail</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail Antrian</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                        <table class="table">
        <tr><td>Nama Pasien</td><td><?php echo $nama; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('antrian') ?>" class="btn btn-default">Kembali</a></td></tr>
    </table>
    </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

    <script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/chart-data.js"></script>
    <script src="<?php echo base_url()?>assets/js/easypiechart.js"></script>
    <script src="<?php echo base_url()?>assets/js/easypiechart-data.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
    <script>
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){        
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>   
        </body>
</html>