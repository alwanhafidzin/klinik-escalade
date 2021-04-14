<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<br />
	<ul class="nav menu">
		<!--<li <?php if (isset($_antrian)) 	echo 'class="active"';?>><a href="<?php echo site_url('Antrian')?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Antrian</a></li>-->
		<li <?php if (isset($_pembayaran)) 	echo 'class="active"';?>><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Pembayaran</a></li>
		<li role="presentation" class="divider"></li>
		<li <?php if (isset($_rekam_medis)) echo 'class="active"';?>><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Pasien</a></li>
		<li role="presentation" class="divider"></li>
		<li <?php if (isset($_laporan_rekam_medis))   echo 'class="active"';?>><a href="<?php echo site_url('rekam_medis/laporan_rekam_medis')?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Lap. Rekam Medis</a></li>

		<li <?php if (isset($_data_pasien)) echo 'class="active"';?>><a href="<?php echo site_url('data_pasien')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Data Pasien</a></li>
    </ul>
</div><!--/.sidebar-->