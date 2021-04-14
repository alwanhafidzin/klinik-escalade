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

	@media only screen and (max-width: 800px) {
		#sidebar-collapse {
			width: 50px;
			transition: 1.5s;
		}

		ul.menu-collapse i.close-hide {
			display: none;
		}

		ul.menu-collapse i.menu-hide {
			display: block;
		}

		.nav.menu {
			display: none;
		}

		.menu-collapse {
			display: block;
			list-style-type: none;
			padding: 10px 15px;
		}
	}
</style>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar show-sidebar" style="background-color: #f2f2f2;">
	<br />
	<ul class="menu-collapse">
		<li>
			<a onclick="sideShow('Show','sidebar-collapse','close-btn','menu-btn')"><i id="menu-btn" class="menu-hide fa fa-bars" aria-hidden="true" style="position: absolute;"></i></a>
			<a onclick="sideHide('Show','sidebar-collapse','close-btn','menu-btn')"><i id="close-btn" class="close-hide fa fa-bars" aria-hidden="true"></i></a>
		</li>
	</ul>
	<ul id="Show" class="nav menu sidelayout">
		<li <?php if (isset($_antrian)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('klinik/home') ?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Home</a></li>
		<li <?php if (isset($_konfirmasi)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('klinik/Konfirmasi_janji') ?>"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; Konfirmasi Janji</a></li>
		<li <?php if (isset($_registrasi)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('klinik/registrasi_janji') ?>"><i class="fa fa-check-circle-o" aria-hidden="true"></i> &nbsp; Registrasi / Ubah Janji</a></li>
		<li <?php if (isset($_pembayaran)) 		  echo 'class="active"'; ?>><a href="<?php echo site_url('klinik/pembayaran') ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp; Pembayaran</a></li>
		<li <?php if (isset($_informasi_pasien)) echo 'class="active"'; ?>><a href="<?php echo site_url('klinik/informasi_pasien') ?>"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Informasi Pasien</a></li>
		<li <?php if (isset($_laporan_transaksi)) echo 'class="active"'; ?>><a href="<?php echo site_url('klinik/laporan_harian') ?>"><i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp; Laporan Harian</a></li>
		<li role="presentation" class="divider"></li>
	</ul>
</div>
<!--/.sidebar-->

<script>
	function sideShow(sideName, sideWidth, closeShow, menuHide) {
		var i = 0,
			j = 0,
			k = 0,
			l = 0,
			w, x, y, z;
		x = document.getElementsByClassName("sidelayout");
		y = document.getElementsByClassName("show-sidebar");
		z = document.getElementsByClassName("close-hide");
		w = document.getElementsByClassName("menu-hide");
		x[i].style.display = "none"
		y[j].style.width = "50px"
		z[k].style.display = "none"
		w[l].style.display = "block"
		document.getElementById(sideName).style.display = "block";
		document.getElementById(sideWidth).style.width = "170px";
		document.getElementById(closeShow).style.display = "block";
		document.getElementById(menuHide).style.display = "none";
	}

	function sideHide(sideCall, sideSize, closeHide, menuShow) {
		var i = 0,
			j = 0,
			k = 0,
			l = 0,
			w, x, y, z;
		x = document.getElementsByClassName("sidelayout");
		y = document.getElementsByClassName("show-sidebar");
		z = document.getElementsByClassName("close-hide");
		w = document.getElementsByClassName("menu-hide");
		x[i].style.display = "block"
		y[j].style.width = "170px"
		w[l].style.display = "none"
		document.getElementById(sideCall).style.display = "none";
		document.getElementById(sideSize).style.width = "50px";
		document.getElementById(closeHide).style.display = "none";
		document.getElementById(menuShow).style.display = "block";
	}
</script>