<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<br />
	<ul class="nav menu">
		<!--<li <?php if (isset($_antrian)) 	echo 'class="active"';?>><a href="<?php echo site_url('Antrian')?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Antrian</a></li>-->
		<li <?php if (isset($_booking)) 	echo 'class="active"';?>><a href="<?php echo site_url('booking/create')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Booking</a></li>
		<li <?php if (isset($_laporan_rekam_medis))   echo 'class="active"';?>><a href="<?php echo site_url('rekam_medis/laporan_rekam_medis')?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Schedule Booking Control</a></li>
		<li role="presentation" class="divider"></li>
		<li <?php if (isset($_rekam_medis)) echo 'class="active"';?>><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Riwayat Rekam Medis</a></li>
		<li role="presentation" class="divider"></li>
		

		<li <?php if (isset($_data_pasien)) echo 'class="active"';?>><a href="<?php echo site_url('data_pasien')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>News</a></li>
		<li role="presentation" class="divider"></li>
		<li <?php if (isset($_data_pasien)) echo 'class="active"';?>><a href="<?php echo site_url('data_pasien/site1')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>tata</a></li>
		<li role="presentation" class="divider"></li>
		<li <?php if (isset($_update_user)) 	  echo 'class="active"';?>><a href="<?php echo site_url('user')?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Update User</a></li>
    </ul>
</div><!--/.sidebar-->