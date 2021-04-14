<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="short icon" href="<?php echo base_url() ?>assets/images/logo.png" type="image/png" />
	<title>Escalade</title>

	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/bootstrap-table.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/dist/datepicker.min.css">
	<link href="<?php echo base_url() ?>assets/css/glider.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/style.css" rel="stylesheet">
	<!--Icons-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/linericon/style.css">
	<script src="<?php echo base_url() ?>assets/js/lumino.glyphs.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/datepicker/dist/datepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/js/glider.min.js"></script>

	<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>

	<style type="text/css">
		.fixed {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
		}

		.salmon {
			background-color: #f40049;
			color: white;
		}

		.salmon:hover {
			color: white;
		}

		.salmon {
			background-color: white;
			color: #f40049;
		}

		.navigasi-btn {
			background-color: white;
			color: black;
			width: 130px;
		}

		.navigasi-btn:hover {
			border: 1px solid black;
			color: black;
			box-shadow: 2px 2px #888888;
		}

		.anu {
			position: fixed;
			width: 100%;
			z-index: 9999;
		}

		.header img {
			width: 120px;
			height: 50px;
			margin: -0px -0px -15px -8px;
		}
	</style>
</head>

<body>
	<div class="anu">
		<div class="wrap fixed-top">
			<div class="header">
				<img src="<?php echo base_url() ?>assets/images/logo-escalade.png" alt="">
				<div class="icon1"><i class="lnr lnr-calendar-full"></i></div>
				<div class="text1"><b><?php echo date(' l,'); ?></b></div>
				<div class="text2"><?php echo date(' M j Y'); ?></div>
				<div class="icon2"><i class="lnr lnr-clock"></i></div>
				<div class="text3"><span id="clock"></span>
					<script type="text/javascript">
						function showTime() {
							var a_p = "";
							var today = new Date();
							var curr_hour = today.getHours();
							var curr_minute = today.getMinutes();
							var curr_second = today.getSeconds();
							// if (curr_hour < 12) {
							//     a_p = "AM";
							// } else {
							//     a_p = "PM";
							// }
							// if (curr_hour == 0) {
							//     curr_hour = 12;
							// }
							// if (curr_hour > 12) {
							//     curr_hour = curr_hour - 12;
							// }
							curr_hour = checkTime(curr_hour);
							curr_minute = checkTime(curr_minute);
							curr_second = checkTime(curr_second);
							document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
						}

						function checkTime(i) {
							if (i < 10) {
								i = "0" + i;
							}
							return i;
						}
						setInterval(showTime, 500);
					</script>
				</div>
				<div class="icon3"><i class="lnr lnr-map-marker"></i></div>
				<div class="text4"><b>Escalade Dental - Tebet</b></div>
				<div class="text5">
					<?php
					if ($this->session->userdata('level') == 'Owner') {
						echo "Owner";
					} elseif ($this->session->userdata('level') == 'Klinik') {
						echo "Frontliner";
					} elseif ($this->session->userdata('level') == 'Dokter') {
						echo $spesialis . " - Drg." . $nama_dokter;
					} else { ?>
						Jl.Tebet Dalam No.10
					<?php } ?>
				</div>

				<div class="border"></div>
				<div class="border2"></div>
				<ul>
					<li><a href="<?php echo base_url('Auth/logout') ?>"><i class="lnr lnr-user"></i></a></li>
					<li><a href="#"><i class="lnr lnr-question-circle"></i></a></li>
					<li><a href="#"><i class="lnr lnr-alarm"></i></a></li>

				</ul>
			</div>

			<div class="menu">
			</div>
		</div>
	</div>
	<!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="width: 100%; height: 23%; background: white;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img src="<?php echo base_url() ?>assets/images/logo-escalade.png" width="60%">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="mynavbar-content">
				<ul class="user-menu sidebar-collapse"> 
					<li class="pull-right" ><button class="navigasi-btn btn menu1" onclick="location.href='<?php echo base_url('Auth/logout') ?>';" style="margin-right: 10px"><i class="lnr lnr-user">Profil Saya</button></li>
					<li class="pull-right" <?php if (isset($_data_pasien)) echo 'class="active"'; ?>><button class="navigasi-btn btn menu2" onclick="location.href='<?php echo site_url('Pasien/info_klinik') ?>';" style="margin-right: 10px">	Informasi Klinik</button></li>
					<li class="pull-right" <?php if (isset($_data_pasien)) echo 'class="active"'; ?>><button class="navigasi-btn btn menu3" onclick="location.href='<?php echo site_url('Pasien/jadwal_dokter') ?>';" style="margin-right: 10px">Jadwal Dokter</button></li>
					<li class="pull-right" <?php if (isset($_data_pasien)) echo 'class="active"'; ?> ><button class="navigasi-btn btn menu4" onclick="location.href='<?php echo site_url('Pasien/beranda') ?>';" style="margin-right: 10px">	Beranda</button></li>
				</ul>
			</div>

		</div>/.container-fluid -->
	<!-- </nav> 
	-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>


	<?php
	if ($this->session->userdata('level') == 'Owner') {
		$this->load->view('sidebar_owner');
	} elseif ($this->session->userdata('level') == 'Dokter') {
		$this->load->view('sidebar_dokter2');
	} else {
		$this->load->view('sidebar_resepsionis');
	}
	?>

	<?php $this->load->view($content); ?>


	<script src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url() ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url() ?>assets/js/easypiechart-data.js"></script>
	<!-- <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script> -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap-table.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.17/jspdf.plugin.autotable.js"></script>
	<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
	<script>
		! function($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function() {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function() {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
		$('.numeric').on('input', function(event) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});

		function runningFormatter(value, row, index) {
			return index + 1;
		}

		function prosesRekamMedis(value) {
			return '<a href="<?php echo base_url(); ?>rekam_medis/create/' + value + '" class="btn btn-primary">Proses</a>';
		}

		function numberFormatter(value, row, index) {
			return index + 1;
		}

		function rupiah(angka) {
			var rupiah = '';
			var angkarev = angka.toString().split('').reverse().join('');
			for (var i = 0; i < angkarev.length; i++)
				if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
			return '' + rupiah.split('', rupiah.length - 1).reverse().join('');
		}

		function totalTextFormatter(data) {
			return 'Total';
		}

		function sumFormatter(data) {
			field = this.field;
			return rupiah2(data.reduce(function(sum, row) {
				return sum + (+row[field]);
			}, 0));
		}

		function waktu(value) {
			var d = Date.parse(value);
			d = new Date(d);
			var monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "OKt", "Nov", "Des"];
			var day = ("0" + d.getDate()).slice(-2); //("0" + this.getDate()).slice(-2)
			var year = d.getFullYear();
			var hour = ("0" + d.getHours()).slice(-2);
			var minutes = ("0" + d.getMinutes()).slice(-2);
			var second = ("0" + d.getSeconds()).slice(-2);
			//console.log(d);
			return day + " " + monthNames[d.getMonth()] + " " + year + " " + hour + ":" + minutes + ":" + second;
		}

		function waktu_non_tgl(value) {
			var d = Date.parse(value);
			d = new Date(d);
			var monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "OKt", "Nov", "Des"];
			var day = ("0" + d.getDate()).slice(-2); //("0" + this.getDate()).slice(-2)
			var year = d.getFullYear();
			var hour = ("0" + d.getHours()).slice(-2);
			var minutes = ("0" + d.getMinutes()).slice(-2);
			var second = ("0" + d.getSeconds()).slice(-2);
			//console.log(d);
			return day + " " + monthNames[d.getMonth()] + " " + year;
		}

		function tanggal(value) {
			var d = Date.parse(value);
			d = new Date(d);
			var monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "OKt", "Nov", "Des"];
			var day = ("0" + d.getUTCDate()).slice(-2); //("0" + this.getDate()).slice(-2)
			var year = d.getUTCFullYear();
			return day + " " + monthNames[d.getMonth()] + " " + year;
		}
	</script>
	<script>
		$(document).ready(function() {
			var date = new Date();
			var currentMonth = date.getMonth();
			var currentDate = date.getDate();
			var currentYear = date.getFullYear();

			$('#datepicker').datepicker({
				minDate: new Date(currentYear, currentMonth, currentDate),
				dateFormat: 'yy-mm-dd'
			});
		});


		$('#awal').datepicker({
			format: 'yyyy-mm-dd'
		});

		$('#akhir').datepicker({
			format: 'yyyy-mm-dd'
		});


		$('#tgl_plug').datepicker({
			format: 'yyyy-mm-dd'
		});


		function printContent(el, callback_) {
			$(".fixed-table-toolbar").hide();

			$("#letak_tgl").show();
			var $table = $('#table');
			$table.bootstrapTable('togglePagination');
			console.log("ooo");
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
			show_tbl(callback_);
		}

		function show_tbl(callback_) {
			$(".fixed-table-toolbar").show();
			$("#letak_tgl").hide();
			window.location.replace(callback_);
		}

		function printContent2(el, callback_) {
			$(".fixed-table-toolbar").hide();

			$("#letak_tgl").show();

			$("table[id^='table']").each(function(i) {
				$(this).attr('id', "table" + (i + 1));
				var $table = $('#table' + (i + 1));
				alert($(this).attr('id', "table" + (i + 1)).html());

				$table.bootstrapTable('togglePagination');
			});

			console.log("ooo");
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
			show_tbl2(callback_);
		}

		function show_tbl2(callback_) {
			$(".fixed-table-toolbar").show();
			$("#letak_tgl").hide();
			// window.location.replace(callback_);
		}


		function export_excel(fileType, nama_file) {
			var $table = $('#table');
			$table.bootstrapTable('togglePagination');

			$table.tableExport({
				type: fileType,
				fileName: nama_file,
				escape: false
			});
			// window.location.replace("<?php echo base_url('laporan/laporan_obat.html'); ?>");
			$table.bootstrapTable('togglePagination');
		}

		function rupiah2(angka) {
			var rupiah = '';
			var angkarev = angka.toString().split('').reverse().join('');
			for (var i = 0; i < angkarev.length; i++)
				if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
			return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
		}
		<?php
	$total = 0;
    foreach($harian->result() as $value) {
        $total += $value->money;
    }
	$rata_rata = $total/count($harian->result());
	$average ="Rp " .number_format((int)$rata_rata, 0, ",", ".");
	?>
	</script>
	<script type="text/javascript">
		var change = {
			0: 'Rp 0',
			10.000 : 'Rp. 10.000',
			100000 : 'Rp. 100.000',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('container', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			chart2: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'spline'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},


			},
			xAxis: {
				categories: [
					<?php foreach ($harian->result() as $result89) : ?> "<?php if ($result89->hari == 'Sunday') {
																				echo "Minggu";
																			} elseif ($result89->hari == 'Monday') {
																				echo "Senin";
																			} elseif ($result89->hari == 'Tuesday') {
																				echo "Selasa";
																			} elseif ($result89->hari == 'Wednesday') {
																				echo "Rabu";
																			} elseif ($result89->hari == 'Thursday') {
																				echo "Kamis";
																			} elseif ($result89->hari == 'Friday') {
																				echo "Jumat";
																			} elseif ($result89->hari == 'Saturday') {
																				echo "Sabtu";
																			} 
																			?><br><?php echo $result89->tgl ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
					type: 'column',
					name: '',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
					]

				},
				{
					marker: {
						enabled: false,
					},
					type: 'line',
					name: '',
					lineColor: 'blue',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php foreach ($harian->result() as $result89) : ?> {
								color: 'blue',
								y: <?php echo $result89->money ?>
							},
						<?php endforeach; ?>
					]

				}
			]
		});
	</script>

	<script type="text/javascript">
		var change = {
			0: '0',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('chart', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},


			},
			xAxis: {
				categories: [
					<?php foreach ($harian->result() as $result89) : ?> "<?php echo $result89->nama_dokter ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
				name: '',
				showInLegend: false,
				states: {
					hover: {
						color: '#f40049'
					}
				},
				data: [
					<?php foreach ($harian->result() as $result89) : ?> {
							color: '#f40049',
							y: <?php echo $result89->money ?>
						},
					<?php endforeach; ?>
				]

			}]
		});
	</script>
	<script type="text/javascript">
		var change = {
			0: 'Rp .0',
			100000: 'Rp. 100.000',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('pemeriksaan', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},
			},
			xAxis: {
				categories: [
					<?php foreach ($harian->result() as $result89) : ?> "<?php if ($result89->hari == 'Sunday') {
																				echo "Minggu";
																			} elseif ($result89->hari == 'Monday') {
																				echo "Senin";
																			} elseif ($result89->hari == 'Tuesday') {
																				echo "Selasa";
																			} elseif ($result89->hari == 'Wednesday') {
																				echo "Rabu";
																			} elseif ($result89->hari == 'Thursday') {
																				echo "Kamis";
																			} elseif ($result89->hari == 'Friday') {
																				echo "Jumat";
																			} elseif ($result89->hari == 'Saturday') {
																				echo "Sabtu";
																			} 
																			?><br><?php echo $result89->tgl ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
				name: '',
				showInLegend: false,
				states: {
					hover: {
						color: '#f40049'
					}
				},
				data: [
					<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
				]
			}]
		});
		
	</script>
	<script type="text/javascript">
		var change = {
			0: '0',
			100000: 'Rp. 100.000',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('pemeriksaan_m', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},
			},
			xAxis: {
				categories: [
					<?php $i = 1;
					foreach ($harian->result() as $result89) : ?> "<?php echo "Minggu ke- " . $i++ ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
				name: '',
				showInLegend: false,
				states: {
					hover: {
						color: '#f40049'
					}
				},
				data: [
					<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
				]

			}]
		}
		);
	</script>
		<script type="text/javascript">
		var change = {
			0: '0',
			100000: 'Rp. 100.000',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('pemeriksaan_m_owner', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},
			},
			xAxis: {
				categories: [
					<?php $i = 1;
					foreach ($harian->result() as $result89) : ?> "<?php echo "Minggu ke- " . $i++ ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
					type: 'column',
					name: '',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
					]

				},
				{
					marker: {
						enabled: false,
					},
					type: 'line',
					name: '',
					lineColor: 'blue',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php foreach ($harian->result() as $result89) : ?> {
								color: 'blue',
								y: <?php echo $result89->money ?>
							},
						<?php endforeach; ?>
					]

				}
			]
		});
	</script>
	<script type="text/javascript">
		var change = {
			0: '0',
			100000: 'Rp. 100.000',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('pemeriksaan_b', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},


			},
			xAxis: {
				categories: [
					<?php foreach ($harian->result() as $result89) : ?> "<?php if ($result89->bulan == 'Jan') {
																				echo "Januari";
																			} elseif ($result89->bulan == 'Feb') {
																				echo "Febuari";
																			} elseif ($result89->bulan == 'Mar') {
																				echo "Maret";
																			} elseif ($result89->bulan == 'Apr') {
																				echo "April";
																			} elseif ($result89->bulan == 'May') {
																				echo "Mei";
																			} elseif ($result89->bulan == 'Jun') {
																				echo "Juni";
																			} elseif ($result89->bulan == 'Jul') {
																				echo "Juli";
																			} elseif ($result89->bulan == 'Aug') {
																				echo "Agustus";
																			} elseif ($result89->bulan == 'Sep') {
																				echo "September";
																			} elseif ($result89->bulan == 'Oct') {
																				echo "Oktober";
																			} elseif ($result89->bulan == 'Nov') {
																				echo "November";
																			} elseif ($result89->bulan == 'Dec') {
																				echo "Desember";
																			}
																			?><br><?php echo $result89->year ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
				name: '',
				showInLegend: false,
				states: {
					hover: {
						color: '#f40049'
					}
				},
				data: [
					<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
				]

			}]
		});
	</script>
	<script type="text/javascript">
		var change = {
			0: '0',
			100000: 'Rp. 100.000',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('pemeriksaan_b_owner', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},


			},
			xAxis: {
				categories: [
					<?php foreach ($harian->result() as $result89) : ?> "<?php if ($result89->bulan == 'Jan') {
																				echo "Januari";
																			} elseif ($result89->bulan == 'Feb') {
																				echo "Febuari";
																			} elseif ($result89->bulan == 'Mar') {
																				echo "Maret";
																			} elseif ($result89->bulan == 'Apr') {
																				echo "April";
																			} elseif ($result89->bulan == 'May') {
																				echo "Mei";
																			} elseif ($result89->bulan == 'Jun') {
																				echo "Juni";
																			} elseif ($result89->bulan == 'Jul') {
																				echo "Juli";
																			} elseif ($result89->bulan == 'Aug') {
																				echo "Agustus";
																			} elseif ($result89->bulan == 'Sep') {
																				echo "September";
																			} elseif ($result89->bulan == 'Oct') {
																				echo "Oktober";
																			} elseif ($result89->bulan == 'Nov') {
																				echo "November";
																			} elseif ($result89->bulan == 'Dec') {
																				echo "Desember";
																			}
																			?><br><?php echo $result89->year ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
					type: 'column',
					name: '',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
					]

				},
				{
					marker: {
						enabled: false,
					},
					type: 'line',
					name: '',
					lineColor: 'blue',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php foreach ($harian->result() as $result89) : ?> {
								color: 'blue',
								y: <?php echo $result89->money ?>
							},
						<?php endforeach; ?>
					]

				}
			]
		});
	</script>

	<script type="text/javascript">
		var change = {
			0: '0',
			1000000: 'Rp. 1.000.000',
			2500000: 'Rp. 2.500.000',
			5000000: 'Rp. 5.000.000',
			7500000: 'Rp. 7.500.000',
			10000000: 'Rp. 10.500.000'
		};
		Highcharts.chart('pemeriksaan_t', {
			chart: {
				height: 500,
				borderRadius: 10,
				borderColor: '#969696',
				borderWidth: 1,
				backgroundColor: '#e7e6e6',
				type: 'column'
			},
			title: {
				text: 'Pendapatan',
				align: 'left',
				style: {
					color: '#f4004a',
					fontWeight: 'bold',
					fontSize: "15px"
				},
			},
			xAxis: {
				categories: [
					<?php foreach ($harian->result() as $result89) : ?> "<?php echo "Tahun " . $result89->tahun ?>",
					<?php endforeach; ?>
				],
				labels: {
					style: {
						color: 'black',
						fontWeight: 'bold'
					}
				},
				title: {
					enabled: true,
					text: '------ Rata2 pendapatan ------',
					style: {
						fontWeight: 'normal'
					}
				}
			},
			yAxis: {
				labels: {
					formatter: function() {
						var value = change[this.value];
						return value !== 'undefined' ? value : this.value;
					}
				},
				plotLines: [{
                    color: 'black',
                    value: <?php echo (int)$rata_rata?>,
                    width: '1',
                    zIndex: 2,
	                dashStyle: 'Dash', 
                label: {
                text: '<?php echo $average?>',
                textAlign: 'left',
				fontSize: '6px',
                 x: -82
                 }
                }]
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0,
					borderRadius: 10,
					pointWidth: 20
				}
			},
			series: [{
					type: 'column',
					name: '',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php
                    foreach($harian->result() as $key=>$value) :{  
                    $last = count($harian->result()) - 1;
                    echo '{y :';
                    echo $value->money;
                    if($key == $last){
                    echo ",color : '#f40049'},";
                    }else
	                echo ",color : '#6A5C59'},";
                    }
                    ?>
                    <?php endforeach ?>
					]

				},
				{
					marker: {
						enabled: false,
					},
					type: 'line',
					name: '',
					lineColor: 'blue',
					showInLegend: false,
					states: {
						hover: {
							color: '#f40049'
						}
					},
					data: [
						<?php foreach ($harian->result() as $result89) : ?> {
								color: 'blue',
								y: <?php echo $result89->money ?>
							},
						<?php endforeach; ?>
					]

				}
			]
		});
	</script>
</body>

</html>
