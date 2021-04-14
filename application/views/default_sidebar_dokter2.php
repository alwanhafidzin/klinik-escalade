<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.sidebar ul.nav .active a, .sidebar ul.nav li.parent a.active,
.sidebar ul.nav .active > a:hover, .sidebar ul.nav li.parent a.active:hover,
.sidebar ul.nav .active > a:focus, .sidebar ul.nav li.parent a.active:focus {
	color: #fff;
	background-color: #3b3838;
	border-radius: 8px;
}
a, a:hover, a:focus {
	color: #3b3838;
}
a{
	border-bottom: 1px solid white;
}
</style>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color: #f2f2f2;">
	<br />
	<ul class="nav menu">
		<li <?php if (isset($_jadwal_pemeriksaan)) echo 'class="active"';?>><a href="<?php echo site_url('superdokter/index')?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;  Jadwal Pemeriksaan</a></li>
		<li <?php if (isset($_informasi_pasien)) echo 'class="active"';?>><a href="<?php echo site_url('superdokter/informasi_pasien')?>"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Informasi Pasien</a></li>
		<li <?php if (isset($_laporan_pemeriksaan)) echo 'class="active"';?>><a href="<?php echo site_url('superdokter/laporan_harian')?>"><i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp;  Laporan Pemeriksaan</a></li>
		<li role="presentation" class="divider"></li>
    </ul>
</div><!--/.sidebar-->