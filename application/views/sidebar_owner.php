<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.sidebar ul.nav .active a,
	.sidebar ul.nav li.parent a.active,
	.sidebar ul.nav .active>a:hover,
	.sidebar ul.nav li.parent a.active:hover,
	.sidebar ul.nav .active>a:focus,
	.sidebar ul.nav li.parent a.active:focus {
		color: #fff;
		background-color: #f40049;
		border-radius: 8px;
	}

	a,
	a:hover,
	a:focus {
		color: #3b3838;
	}

	a {
		border-bottom: 1px solid white;
	}

	.menu-collapse {
		display: none;
	}

	.sideHide {
		display: block;
	}

	@media only screen and (max-width:767px) {
		#sidebar-collapse {
			width: 60px;
			transition: 1.5s;
		}

		#popup {
			width: 50%;
		}

		.sideHide {
			display: block;
		}

		.menu-collapse {
			display: block;
		}

		#popup {
			width: 45%;
			height: 100%;
			position: fixed;
			transition: 0.5s;
			background: #f2f2f2;
			top: 10;
			left: 0;
			z-index: 9999;
		}

		#popup:target {
			visibility: visible;
		}

		#button a {
			vertical-align: middle;
			color: #000;
			text-decoration: none;
			padding: 10px 15px;
		}

		#popup {
			visibility: hidden;
		}

		/* Button Close */
		.close-button {
			width: 6%;
			display: block;
			text-align: center;
			color: #000;
			text-decoration: none;
			position: absolute;
			top: -25px;
			left: 170px;
		}
	}

	@media only screen and (max-width:767px) {
		.sidebar {
			display: block;
		}
	}

	@media only screen and (max-width:425px) {
		#sidebar-collapse {
			width: 60px;
			transition: 1.5s;
		}

		#popup {
			width: 50%;
		}

		.sideHide {
			display: none;
		}

		.menu-collapse {
			display: block;
		}

		#popup {
			width: 45%;
			height: 100%;
			position: fixed;
			transition: 0.5s;
			background: #f2f2f2;
			top: 10;
			left: 0;
			z-index: 9999;
		}

		#popup:target {
			visibility: visible;
		}

		#button a {
			vertical-align: middle;
			color: #000;
			text-decoration: none;
			padding: 10px 15px;
		}

		#popup {
			visibility: hidden;
		}

		/* Button Close */
		.close-button {
			width: 6%;
			display: block;
			text-align: center;
			color: #000;
			text-decoration: none;
			position: absolute;
			top: -25px;
			left: 170px;
		}
	}

	@media only screen and (max-width:375px) {
		#sidebar-collapse {
			width: 60px;
			transition: 1.5s;
			/*position: absolute;*/
		}

		#popup {
			width: 50%;
		}

		.sideHide {
			display: none;
		}

		.menu-collapse {
			display: block;
		}

		#popup {
			width: 50%;
			height: 100%;
			position: fixed;
			transition: 0.5s;
			background: #f2f2f2;
			top: 10;
			left: 0;
			z-index: 9999;
		}

		#popup:target {
			visibility: visible;
		}

		#button a {
			vertical-align: middle;
			color: #000;
			text-decoration: none;
			padding: 10px 15px;
		}

		#popup {
			visibility: hidden;
		}

		/* Button Close */
		.close-button {
			width: 6%;
			display: block;
			text-align: center;
			color: #000;
			text-decoration: none;
			position: absolute;
			top: -25px;
			left: 170px;
		}
	}

	@media only screen and (max-width:320px) {
		#sidebar-collapse {
			width: 60px;
			transition: 1.5s;
			/*position: absolute;*/
		}

		#popup {
			width: 50%;
		}

		.sideHide {
			display: none;
		}

		.menu-collapse {
			display: block;
		}

		#popup {
			width: 58%;
			height: 100%;
			position: fixed;
			transition: 0.5s;
			background: #f2f2f2;
			top: 10;
			left: 0;
			z-index: 9999;
		}

		#popup:target {
			visibility: visible;
		}
	}

	#button a {
		vertical-align: middle;
		color: #000;
		text-decoration: none;
		padding: 10px 15px;
	}

	#popup {
		visibility: hidden;
	}

	/* Button Close */
	.close-button {
		width: 6%;
		display: block;
		text-align: center;
		color: #000;
		text-decoration: none;
		position: absolute;
		top: -25px;
		left: 170px;
	}

	/* Memunculkan Jendela Pop Up*/
</style>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar show-sidebar" style="background-color: #f2f2f2;">
	<br />

	<div id="button" class="menu-collapse"><a href="#popup"><i id="menu-btn" class="menu-hide fa fa-bars" aria-hidden="true" style="position: absolute;"></i></a></div>


	<ul class="nav menu sideHide">
		<li <?php if (isset($_antrian)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/home') ?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Home</a></li>
		<li <?php if (isset($_konfirmasi)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/Konfirmasi_janji') ?>"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; Konfirmasi Janji</a></li>
		<li <?php if (isset($_registrasi)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/registrasi_janji') ?>"><i class="fa fa-check-circle-o" aria-hidden="true"></i> &nbsp; Registrasi / Ubah Janji</a></li>
		<li <?php if (isset($_pembayaran)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/pembayaran') ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp; Pembayaran</a></li>
		<li <?php if (isset($_informasi_pasien)) echo 'class="active"'; ?>><a href="<?php echo site_url('owner/informasi_pasien') ?>"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Informasi Pasien</a></li>
		<li <?php if (isset($_laporan_transaksi)) echo 'class="active"'; ?>><a href="<?php echo site_url('owner/laporan_pemeriksaan') ?>"><i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp; Laporan Pemeriksaan</a></li>
		<li role="presentation" class="divider"></li>
	</ul>

	<ul id="popup" class="nav menu sidelayout">
		<li <?php if (isset($_antrian)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/home') ?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Home</a></li>
		<li <?php if (isset($_konfirmasi)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/Konfirmasi_janji') ?>"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; Konfirmasi Janji</a></li>
		<li <?php if (isset($_registrasi)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/registrasi_janji') ?>"><i class="fa fa-check-circle-o" aria-hidden="true"></i> &nbsp; Registrasi / Ubah Janji</a></li>
		<li <?php if (isset($_pembayaran)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('owner/pembayaran') ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp; Pembayaran</a></li>
		<li <?php if (isset($_informasi_pasien)) echo 'class="active"'; ?>><a href="<?php echo site_url('owner/informasi_pasien') ?>"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Informasi Pasien</a></li>
		<li <?php if (isset($_laporan_transaksi)) echo 'class="active"'; ?>><a href="<?php echo site_url('owner/laporan_pemeriksaan') ?>"><i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp; Laporan Pemeriksaan</a></li>
		<a href="#" class="close-button"><i class="fa fa-close" aria-hidden="true"></i></a>
		<li role="presentation" class="divider"></li>
	</ul>
</div>
<!--/.sidebar-->