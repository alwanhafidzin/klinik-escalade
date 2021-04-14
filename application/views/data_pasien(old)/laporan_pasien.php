<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Rekam Medis</title>

		<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/css/datepicker3.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/css/bootstrap-table.css" rel="stylesheet">

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
				<li><a href="<?php echo site_url('data_pasien/rekam')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Rekam Medis</a></li>
				<li><a href="<?php echo site_url('Layanan')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Layanan</a></li>
				<li><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Pembayaran</a></li>
				<li role="presentation" class="divider"></li>
				<li><a href="<?php echo site_url('rekam_medis/laporan_rekam_medis')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Rekam Medis</a></li>
				<li class="active"><a href="<?php echo site_url('data_pasien/laporan_pasien')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Transaksi</a></li>
				<li><a href="<?php echo site_url('laporan/laporan_pemasukan')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Pemasukan</a></li>
			</ul>

		</div><!--/.sidebar-->

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('antrian/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Laporan Transaksi</li>
				</ol>
			</div><!--/.row-->

			<div class="row"><div class="col-lg-12"><h1 class="page-header">Laporan Transaksi</h1></div></div><!--/.row-->
			
			<div class="row">
				<div class="col-xs-12">
					<div class="modal-body">
						<form class="form-inline">
							<input type="date" class="form-control" id="awal" />
							s/d
							<input type="date" class="form-control" id="akhir" />
							<button type="button" class="btn btn-default" id="filter">Filter</button>
						</form>
						<div id="tabel_filter">
							<table data-toggle="table" data-url="<?php echo base_url('data_pasien/data_laporan_pasien');?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="asc">
								<thead>
									<tr>
										<th data-formatter="runningFormatter" data-align="right">No.</th>
										<!--<th data-field="no_antrian"  data-sortable="true" data-align="right">No. Antrian</th>-->
										<th data-field="tanggal" data-sortable="true">Tanggal</th>
										<th data-field="Nama" data-sortable="true">Nama</th>
										<th data-field="Tanggal_lahir" data-sortable="true">Tanggal Lahir</th>
										<th data-field="diagnosis" data-sortable="true">Diagnosis</th>
										<th data-field="total_bayar" data-sortable="true">Total</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->

		<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/chart-data.js"></script>
		<script src="<?php echo base_url()?>assets/js/easypiechart.js"></script>
		<script src="<?php echo base_url()?>assets/js/easypiechart-data.js"></script>
		<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url()?>assets/js/bootstrap-table.js"></script>
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
			function runningFormatter(value, row, index) {
                return index+1;
            }
			function prosesRekamMedis(value){
				return '<a href="<?php echo base_url();?>rekam_medis/create/'+value+'" class="btn btn-primary">Proses</a>';
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
					$("#tabel_filter").load("<?php echo base_url('data_pasien/filter_laporan_pasien');?>" + "/" + awal + "/" + akhir);
				});
			});
		</script>   
	</body>
</html>