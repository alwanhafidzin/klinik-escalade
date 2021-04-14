<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<br />
	<ul class="nav menu">
		<li <?php if (isset($_rekam_medis))           echo 'class="active"';?>><a href="<?php echo site_url('Resepsionis')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Survey</a></li>



		<!-- <li role="presentation" class="divider"></li>
		<li <?php if (isset($_rekam_medis))           echo 'class="active"';?>><a href="<?php echo site_url('rekam_medis')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Pasien Periksa</a></li>
		<li <?php if (isset($_pembayaran)) 		  echo 'class="active"';?>><a href="<?php echo site_url('pembayaran')?>"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"/></svg> Pembayaran</a></li>
		<li <?php if (isset($_laporan_rekam_medis))   echo 'class="active"';?>><a href="<?php echo site_url('rekam_medis/laporan_rekam_medis')?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Lap. Rekam Medis</a></li>        
		<li role="presentation" class="divider"></li>		
		
		<li <?php if (isset($_layanan)) 	          echo 'class="active"';?>><a href="<?php echo site_url('layanan')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Data Layanan</a></li>
		<li <?php if (isset($_obat))       	          echo 'class="active"';?>><a href="<?php echo site_url('obat')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Data Obat</a></li>
		<li <?php if (isset($_pengeluaran)) 	      echo 'class="active"';?>><a href="<?php echo site_url('pengeluaran')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Pengeluaran</a></li>
        <li <?php if (isset($_metodebayar)) 	      echo 'class="active"';?>><a href="<?php echo site_url('metodebayar')?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Metode Pembayaran</a></li>
		<li role="presentation" class="divider"></li>	
		
			
		
		<li <?php if (isset($_laporan_transaksi)) 	  echo 'class="active"';?>><a href="<?php echo site_url('laporan/laporan_transaksi')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Pemasukan Klinik</a></li>
		<li <?php if (isset($_laporan_obat)) 	  echo 'class="active"';?>><a href="<?php echo site_url('laporan/laporan_obat')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Penjualan Obat</a></li>
		<li <?php if (isset($_laporan_pemasukan))     echo 'class="active"';?>><a href="<?php echo site_url('laporan/laporan_pemasukan')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Pemasukan Apotik</a></li>
		<li <?php if (isset($_laporan_pengeluaran))   echo 'class="active"';?>><a href="<?php echo site_url('laporan/laporan_pengeluaran')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Pengeluaran</a></li>
		<li <?php if (isset($_laporan_keuangan))      echo 'class="active"';?>><a href="<?php echo site_url('laporan/laporan_keuangan')?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Lap. Keuangan</a></li>
        <li role="presentation" class="divider"></li>
		
		<li <?php if (isset($_update_user)) 	  echo 'class="active"';?>><a href="<?php echo site_url('user')?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Update User</a></li> -->
    </ul>
</div><!--/.sidebar-->