<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Daftar Data Pasien</title>

<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url()?>assets/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

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
             			<li ><a href="<?php echo site_url('data_pasien/index')?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Data Pasien</a></li>
			<li><a href="<?php echo site_url('Antrian')?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Antrian</a></li>
			<li class="active"><a href="<?php echo site_url('data_pasien/rekam')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Rekam Medis</a></li>
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
				<li><a href="<?php echo site_url('rekam_medis/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Rekam Medis</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Rekam Medis Pasien</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('rekam_medis/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('rekam_medis/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('rekam_medis'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal Periksa</th>
		<th>Nama Pasien</th>
		<th>Diagnosis</th>
		<th>Tanggal Next Control</th>
		<th>Action</th>
            </tr><?php
            foreach ($rekam_medis_data as $rekam_medis)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php $text = $rekam_medis->tanggal;
			 $newtext = wordwrap($text, 40, "<br />\n",true);
				echo $newtext; ?></td>
			<td><?php $text = $rekam_medis->nama_pasien;
			 $newtext = wordwrap($text, 40, "<br />\n",true);
				echo $newtext; ?></td>
			<td><?php $text = $rekam_medis->diagnosis;
			 $newtext = wordwrap($text, 40, "<br />\n",true);
				echo $newtext; ?></td>
			<td><?php $text = $rekam_medis->tanggal_next_control;
			 $newtext = wordwrap($text, 40, "<br />\n",true);
				echo $newtext; ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('rekam_medis/read/'.$rekam_medis->id_rekam_medis),'Detail'); 
				echo ' | '; 
				echo anchor(site_url('rekam_medis/update/'.$rekam_medis->id_rekam_medis),'Edit'); 
				echo ' | '; 
				echo anchor(site_url('rekam_medis/delete/'.$rekam_medis->id_rekam_medis),'Hapus','onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
							
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
