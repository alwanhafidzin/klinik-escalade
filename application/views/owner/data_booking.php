<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type='text/javascript'>
	$(window).load(function() {
		$("#jenis_pembayaran").change(function() {
			console.log($("#jenis_pembayaran option:selected").val());
			if ($("#jenis_pembayaran option:selected").val() == '3') {
				$('#asuransiku').prop('hidden', false);
			} else {
				$('#asuransiku').prop('hidden', 'true');
			}
		});
	});
	$(window).load(function() {
		$(".stileone").on("click", function() {
			$(".stileone").css("background-color", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone1").on("click", function() {
			$(".stileone1").css("background", "#f40049");
			$(".stileone").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone2").on("click", function() {
			$(".stileone2").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone3").on("click", function() {
			$(".stileone3").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone4").on("click", function() {
			$(".stileone4").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
		});

		$(".stil").on("click", function() {
			$(".stileone").css("background-color", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil1").on("click", function() {
			$(".stileone1").css("background", "#f40049");
			$(".stileone").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil2").on("click", function() {
			$(".stileone2").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil3").on("click", function() {
			$(".stileone3").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil4").on("click", function() {
			$(".stileone4").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
		});
	});



	function next1() {
		var x = document.getElementById("data_diri1");
		var y = document.getElementById("data_diri2");
		y.style.display = "block";
		x.style.display = "none";
	}

	function next2() {
		var x = document.getElementById("data_diri2");
		var y = document.getElementById("data_diri3");
		y.style.display = "block";
		x.style.display = "none";
	}

	function next3() {
		var x = document.getElementById("data_diri3");
		var y = document.getElementById("data_diri4");
		y.style.display = "block";
		x.style.display = "none";
	}

	function prev2() {
		var x = document.getElementById("data_diri2");
		var y = document.getElementById("data_diri1");
		y.style.display = "block";
		x.style.display = "none";
	}

	function prev3() {
		var x = document.getElementById("data_diri3");
		var y = document.getElementById("data_diri2");
		y.style.display = "block";
		x.style.display = "none";
	}

	function prev4() {
		var x = document.getElementById("data_diri4");
		var y = document.getElementById("data_diri3");
		y.style.display = "block";
		x.style.display = "none";
	}
</script>
<style type="text/css">
	@media only screen and (max-width: 800px) {
		.stileone {
			background-color: #f40049;
		}

		.row.box {
			display: block;
		}

		.tab-content {
			height: auto;
			width: auto;
			top: 10px;
			bottom: 500px;
			z-index: 1;
			/*border-bottom: 1px solid black;
		border-left: 1px solid black;
		border-top: 1px solid black;
		border-right: 1px solid black;*/
			/*padding-right: 50px;*/
		}

		.mt-4 {
			margin: 40px 0 0 0;
		}

		.mt-5 {
			padding: 25px 150px 0;
		}

		.mt-5 a {
			padding: 10px;
			font-size: 15px;
			border-radius: 5px;
		}

		a.mt-6 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 150px;
			font-size: 15px;
			margin: 50px 0 0 0;
		}

		a.mt-7 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 150px;
			font-size: 15px;
			cursor: pointer;
			margin: 50px 0 0 50px;
		}

		a.mt-8 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 170px;
			font-size: 15px;
			cursor: pointer;
			margin: 235px 0 0 0px;
		}

		a.mt-9 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 170px;
			font-size: 15px;
			cursor: pointer;
			margin: 170px 0 0 0px;
		}

		.mt-f {
			float: right;
		}

		.bor-top {
			border-top: 2px solid #fff;
		}

		/*.nav-gr{
		height: auto;
		width: auto;
		background-color: transparent;
		margin: 0 0px 0 0;
		float: right;
		color: white;
		z-index: 2;
	}

	.box{
		height: auto;
		width: auto;
		background-color: #424242;
		display: block;
		z-index: 2;
	}*/

		.box-gr {
			height: 85px;
			width: auto;
			float: left;
			border-radius: 45px 0 0 45px;
			z-index: 2;
		}

		.box-gr-item {
			height: 85px;
			width: 300px;
			float: left;
			border-radius: 45px 0 0 45px;
			border-bottom: 2px solid #fff;
			z-index: 2;
		}

		.boxx {
			margin-left: 0px;
			border-radius: 45px 0 0 45px;
			float: left;
			color: #000;
		}

		.row.boxx.active {
			background-color: #f40049;
			color: #fff;
		}

		.box-gr-header {
			height: 40px;
			width: 300px;
			font-size: 18px;
			padding: 10px 0 0 110px;
			font-weight: bold;
			color: white;
		}

		.box-gr-graf {
			height: 35px;
			width: auto;
			font-size: 12px;
			padding: 0 0 0 110px;
			color: white;
		}

		.row.boxx:hover {
			background-color: #f40049;
			cursor: pointer;
			color: #fff;
		}

		.box-gr-circle {
			height: 85px;
			width: 85px;
			text-align: center;
			border-radius: 100%;
			border: 3px solid #E6E6E6;
			background-color: #f40049;
		}

		.box-gr-count {
			font-size: 29px;
			position: absolute;
			margin: 20px 0 0 31px;
			font-weight: bold;
		}

		.cir-col {
			background-color: #A9A9A9;
		}

		.nav-eta {
			margin: 20px 0 0 0px;
			/*background-color: red;*/
		}

		.mr-1 {
			margin: 80px 0 0 70px;
		}

		.mr-2 {
			margin: 5px 0 0 10px;
		}

		.box-eta td+td {
			padding-left: 50px;
		}

		.box-eta td {
			color: #797979;
			font-size: 15px;
		}

		.box-eta td.title-f {
			font-weight: bold;
			/*text-transform: capitalize;*/
		}

		.box-eta input {
			border: 1px solid #DCDCDC;
			box-shadow: none;
			border-radius: 3px;
			float: right;
			margin: 10px 0 0 0;
			width: 267px;
		}

		.box-eta textarea {
			width: 520px;
			margin: 15px 0 0 0;
			border: 1px solid #DCDCDC;
		}

		.box-eta-title {
			margin: 30px 0 0 10px;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
		}

		.title-header {
			margin: 30px 0 0 10px;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
		}

		.title-content {
			margin: 20px 0 0 10px;
			font-size: 15px;
			line-height: 1.5em;
		}

		.title-content-x {
			margin: 5px 0 0 10px;
			font-size: 15px;
			line-height: 1.5em;
		}

		.box-dat-title {
			margin: 30px 0 0 10px;
			font-size: 15px;
			font-weight: bold;
			text-transform: uppercase;
			/*background-color: pink;*/
		}

		.box-dat td {
			color: #797979;
			font-size: 15px;
			/*background-color: red;*/
		}

		.box-dat td+td {
			padding-left: 20px;
		}

		.box-dat input {
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			box-shadow: none;
		}

		.in-1 {
			width: 20px;
		}

		.in-1 select {
			width: 70px;
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			box-shadow: none;
		}

		.label-c {
			color: #797979;
			padding: 10px 0 0 0;
			font-size: 15px;
		}

		.in-2 {
			width: 170px;
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			box-shadow: none;
		}

		label.control-t {
			font-weight: normal;
		}

		.noid {
			margin-top: 500px;
			padding-right: 200px;
		}

		.alt td {
			color: #797979;
			font-size: 15px;
			padding: 0 0 0 10px;
			/*background-color: red;*/
		}

		.alt td+td {
			padding-left: 35px;
		}

		.alt input {
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			padding: 0 370px 0 0;
			box-shadow: none;
		}

		.custom-select {
			position: relative;
			font-family: Arial;
			padding: 0 0 0 50px;
			color: #000;
		}

		.custom-select select {
			display: none;
			/*hide original SELECT element:*/
		}

		.select-selected {
			width: 170px;
			background-color: #fff;
			border-radius: 5px;
		}

		/*style the arrow inside the select element:*/
		.select-selected:after {
			float: right;
			margin: 7px 0 0 0;
			content: "";
			top: 14px;
			right: 10px;
			width: 0;
			height: 0;
			border: 6px solid transparent;
			border-color: #778899 transparent transparent transparent;
		}

		/*point the arrow upwards when the select box is open (active):*/
		.select-selected.select-arrow-active:after {
			background-color: white;
			top: 7px;
			margin: 2px 0 0 0;
		}

		/*style the items (options), including the selected item:*/
		.select-items div,
		.select-selected {
			color: #778899;
			padding: 8px 16px;
			width: 170px;
			border: 1px solid #eee;
			box-shadow: none;
			cursor: pointer;
			user-select: none;
		}

		/*style items (options):*/
		.select-items {
			background-color: #eee;
			width: 170px;
			top: 100%;
			left: 0;
			right: 0;
			z-index: 99;
		}

		/*hide the items when the select box is closed:*/
		.select-hide {
			display: none;
		}

		.select-items div:hover,
		.same-as-selected {
			background-color: #30a5ff;
			color: #fff;
		}

	}



	@media only screen and (min-width: 1287px) {
		.row.box {
			display: block;
		}

		.stileone {
			background-color: #f40049;
		}

		.tab-content {
			height: 525px;
			width: 699px;
			z-index: 1;
			border-bottom: 1px solid black;
			border-left: 1px solid black;
			border-top: 1px solid black;
			padding-right: 50px;
		}

		.mt-4 {
			margin: 40px 0 0 0;
		}

		.mt-5 {
			padding: 25px 150px 0;
		}

		.mt-5 a {
			padding: 10px;
			font-size: 15px;
			border-radius: 5px;
		}

		a.mt-6 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 150px;
			font-size: 15px;
			margin: 50px 0 0 0;
		}

		a.mt-7 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 150px;
			font-size: 15px;
			cursor: pointer;
			margin: 50px 0 0 50px;
		}

		a.mt-8 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 170px;
			font-size: 15px;
			cursor: pointer;
			margin: 235px 0 0 0px;
		}

		a.mt-9 {
			padding: 25px 150px 0;
			padding: 10px;
			width: 170px;
			font-size: 15px;
			cursor: pointer;
			margin: 170px 0 0 0px;
		}

		.mt-f {
			float: right;
		}

		.bor-top {
			border-top: 2px solid #fff;
		}

		.nav-gr {
			background-color: transparent;
			display: block;
			margin: 0 60px 0 0;
			float: right;
			color: white;
			z-index: 2;
		}

		.box {
			height: 525px;
			width: 310px;
			background-color: #424242;
			display: block;
			z-index: 2;
		}

		.box-gr {
			height: 85px;
			width: 350px;
			float: right;
			border-radius: 45px 0 0 45px;
			z-index: 2;
		}

		.box-gr-item {
			height: 85px;
			width: 350px;
			float: left;
			border-radius: 45px 0 0 45px;
			border-bottom: 2px solid #fff;
			z-index: 2;
		}

		.boxx {
			margin-left: 0px;
			border-radius: 45px 0 0 45px;
			float: left;
			color: #000;
		}

		.row.boxx.active {
			background-color: #f40049;
			color: #fff;
		}

		.box-gr-header {
			height: 40px;
			width: 400px;
			font-size: 18px;
			padding: 10px 0 0 110px;
			font-weight: bold;
			color: white;
		}

		.box-gr-graf {
			height: 35px;
			width: auto;
			font-size: 13px;
			padding: 0 0 0 110px;
			color: white;
		}

		.row.boxx:hover {
			background-color: #f40049;
			cursor: pointer;
			color: #fff;
		}

		.box-gr-circle {
			height: 85px;
			width: 85px;
			text-align: center;
			border-radius: 100%;
			border: 3px solid #E6E6E6;
		}

		.box-gr-count {
			font-size: 29px;
			position: absolute;
			margin: 20px 0 0 31px;
			font-weight: bold;
		}

		.cir-col {
			background-color: none;
		}

		.cir-col {
			background-color: #A9A9A9;
		}

		.nav-eta {
			margin: 20px 0 0 0px;
			/*background-color: red;*/
		}

		.mr-1 {
			margin: 80px 0 0 70px;
		}

		.mr-2 {
			margin: 5px 0 0 10px;
		}

		.box-eta td+td {
			padding-left: 50px;
		}

		.box-eta td {
			color: #797979;
			font-size: 15px;
		}

		.box-eta td.title-f {
			font-weight: bold;
			/*text-transform: capitalize;*/
		}

		.box-eta input {
			border: 1px solid #DCDCDC;
			box-shadow: none;
			border-radius: 3px;
			float: right;
			margin: 10px 0 0 0;
			width: 267px;
		}

		.box-eta textarea {
			width: 520px;
			margin: 15px 0 0 0;
			border: 1px solid #DCDCDC;
		}

		.box-eta-title {
			margin: 30px 0 0 10px;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
		}

		.title-header {
			margin: 30px 0 0 10px;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
		}

		.title-content {
			margin: 20px 0 0 10px;
			font-size: 15px;
			line-height: 1.5em;
		}

		.title-content-x {
			margin: 5px 0 0 10px;
			font-size: 15px;
			line-height: 1.5em;
		}

		.box-dat-title {
			margin: 30px 0 0 10px;
			font-size: 15px;
			font-weight: bold;
			text-transform: uppercase;
			/*background-color: pink;*/
		}

		.box-dat td {
			color: #797979;
			font-size: 15px;
			/*background-color: red;*/
		}

		.box-dat td+td {
			padding-left: 20px;
		}

		.box-dat input {
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			box-shadow: none;
		}

		.in-1 {
			width: 20px;
		}

		.in-1 select {
			width: 70px;
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			box-shadow: none;
		}

		.label-c {
			color: #797979;
			padding: 10px 0 0 0;
			font-size: 15px;
		}

		.in-2 {
			width: 170px;
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			box-shadow: none;
		}

		label.control-t {
			font-weight: normal;
		}

		.noid {
			margin-top: 500px;
			padding-right: 200px;
		}

		.alt td {
			color: #797979;
			font-size: 15px;
			padding: 0 0 0 10px;
			/*background-color: red;*/
		}

		.alt td+td {
			padding-left: 35px;
		}

		.alt input {
			margin: 10px 0 0 0;
			border: 1px solid #DCDCDC;
			padding: 0 370px 0 0;
			box-shadow: none;
		}

		.custom-select {
			position: relative;
			font-family: Arial;
			padding: 0 0 0 50px;
			color: #000;
		}

		.custom-select select {
			display: none;
			/*hide original SELECT element:*/
		}

		.select-selected {
			width: 170px;
			background-color: #fff;
			border-radius: 5px;
		}

		.red {
			background-color: #F40049;
		}

		.box2 {
			position: absolute;
			top: 20px;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.box2 select {
			background-color: white;
			color: black;
			width: 150px;
			border: none;
			font-size: 16px;
			-webkit-appearance: button;
			appearance: button;
			outline: none;
		}

		.box2::before {
			content: "\f13a";
			font-family: FontAwesome;
			position: absolute;
			background-color: #0563af;
			top: 0;
			right: 0;
			width: 15%;
			height: 100%;
			text-align: center;
			font-size: 23px;
			line-height: 38px;
			color: rgba(255, 255, 255);
			background-color: #F40049;
			pointer-events: none;
		}

		.box2:hover::before {
			color: rgba(255, 255, 255, 0.6);
			background-color: #F40049;
		}

		.box2 select option {
			padding: 30px;
		}

		/*style the arrow inside the select element:*/
		.select-selected:after {
			float: right;
			margin: 7px 0 0 0;
			content: "";
			top: 14px;
			right: 10px;
			width: 0;
			height: 0;
			border: 6px solid transparent;
			border-color: #778899 transparent transparent transparent;
		}

		/*point the arrow upwards when the select box is open (active):*/
		.select-selected.select-arrow-active:after {
			background-color: white;
			top: 7px;
			margin: 2px 0 0 0;
		}

		/*style the items (options), including the selected item:*/
		.select-items div,
		.select-selected {
			color: #778899;
			padding: 8px 16px;
			width: 170px;
			border: 1px solid #eee;
			box-shadow: none;
			cursor: pointer;
			user-select: none;
		}

		/*style items (options):*/
		.select-items {
			background-color: #eee;
			width: 170px;
			top: 100%;
			left: 0;
			right: 0;
			z-index: 99;
		}

		/*hide the items when the select box is closed:*/
		.select-hide {
			display: none;
		}

		.select-items div:hover,
		.same-as-selected {
			background-color: #30a5ff;
			color: #fff;
		}
	}

	@media only screen and (max-width: 1286px) {
		.nav-gr {
			display: none;
		}
	}

	@media only screen and (max-width: 768px) {
		.nav-gr {
			display: none;
		}

		.tab-content {
			margin-top: 10px;
		}

		.row.box {
			display: block;
		}


	}

	@media only screen and (max-width: 480px) {
		.nav-gr {
			display: none;
		}
	}
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="row">
		<div class="col-lg-12">
		</div>
	</div>
	<!--/.row-->
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-12">
						<h3 class="mb-20 weight-500">Rencana Pemeriksaan
							<?php foreach ($pasien->result() as $result) : ?>
								<?php echo $result->nama_depan; ?>
								<?php echo $result->nama_belakang; ?>
							<?php endforeach; ?>
						</h3><br>
					</div>
					<div class="kotak">
						<div class="col-xs-3 nav-gr">
							<div class="row box">
								<div class="box-gr mt-4">
									<div class="row boxx tablink" data-toggle="tab" href="#pilih_jadwal">
										<div class="box-gr-item bor-top">
											<div class="box-gr-header">Pilih Jadwal</div>
											<div class="box-gr-graf">Pilih jadwal yang sesuai</div>
										</div>
										<div class="box-gr-circle">
											<div class="box-gr-count">1</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr ">
									<div class="row boxx tablink" data-toggle="tab" href="#data_diri">
										<div class="box-gr-item">
											<div class="box-gr-header">Data Diri</div>
											<div class="box-gr-graf">Lengkapi data dirimu untuk memenuhi keperluan medis</div>
										</div>
										<div class="box-gr-circle">
											<div class="box-gr-count">2</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr">
									<div class="row boxx tablink" data-toggle="tab" href="#keluhan">
										<div class="box-gr-item">
											<div class="box-gr-header">Keluhan</div>
											<div class="box-gr-graf">Jelaskan keluhanmu sedetail mungkin</div>
										</div>
										<div class="box-gr-circle">
											<div class="box-gr-count">3</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>

								</div>
								<div class="box-gr">
									<div class="row boxx tablink" data-toggle="tab" href="#metode_pembayaran">
										<div class="box-gr-item">
											<div class="box-gr-header">Metode Pembayaran</div>
											<div class="box-gr-graf">Pilih metode pembayaran yang akan kamu gunakan</div>
										</div>
										<div class="box-gr-circle">
											<div class="box-gr-count">4</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr red ">
									<div class="row boxx tablink" data-toggle="tab" href="#konfirmasi_booking">
										<div class="box-gr-item">
											<div class="box-gr-header">Konfirmasi booking</div>
											<div class="box-gr-graf">Tunggu konfirmasi booking dari kami</div>
										</div>
										<div class="box-gr-circle red">
											<div class="box-gr-count">5</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
							</div>
						</div>
						<br>
						<div class="tab-content col-md-8">
							<div id="pilih_jadwal" class="tab-pane fade">
								<form action="<?php echo base_url('owner/create_action/'); ?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id_booking" value="<?php echo $result->id_booking; ?>">
									<div class="form-group">
										<div class="col-lg-4">
											Pilih Tanggal yang sesuai<?php echo form_error('tanggal_lahir') ?>
										</div>
										<div class="col-lg-8">
											<div class="form-group">

												<!-- <input type="hidden" name="id_dokter" value="<?php echo $result->id_dokter; ?>"> -->
												<select class="form-control" name="hari" id="hari">
													<?php foreach ($dokter->result() as $result) : ?>
														<option value="" disabled selected style="display: none;">--- Pilih Hari ---</option>
														<option value="<?php echo $result->hari; ?>"><?php echo $result->hari; ?></option>
													<?php endforeach; ?>
												</select>

											</div>
											<div class="form-group">
												<input type="date" class="form-control" rows="3" name="tanggal_rencana" id="tanggal_rencana">
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										Pilih Waktu yang sesuai<?php echo form_error('tanggal_lahir') ?>
									</div>
									<div class="col-lg-8">
										<div class="form-group">

											<input type="hidden" name="id_dokter" value="<?php echo $result->id_dokter; ?>">
											<select class="form-control" name="jam_rencana" id="jam_rencana">
												<?php foreach ($dokter->result() as $result) : ?>
													<option value="" disabled selected style="display: none;">--- Pilih Waktu ---</option>
													<option value="<?php echo $result->jam_mulai; ?>-<?php echo $result->jam_tutup; ?>"><?php echo $result->jam_mulai; ?>-<?php echo $result->jam_tutup; ?></option>
												<?php endforeach; ?>
											</select>

										</div>
									</div>

									<button data-toggle="tab" href="#data_diri" type="button" class="btn salmon stil1" style="float: right;margin-top: 37%;">Selanjutnya</button>
							</div>
							<div id="data_diri" class="tab-pane fade">

								<div id="data_diri1">
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Informasi Umum</h5><br>
									</div>
									<?php foreach ($pasien->result() as $result) : ?>
										<div class="col-lg-2">
											Nama Depan <?php echo form_error('nama_depan') ?>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" class="form-control" rows="3" name="nama_depan" id="nama_depan" value="<?php echo $result->nama_depan; ?>" required>
											</div>
										</div><br>
										<div class="col-lg-2">
											Nama Belakang <?php echo form_error('nama_belakang') ?>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" class="form-control" rows="3" name="nama_belakang" id="nama_belakang" value="<?php echo $result->nama_belakang; ?>" required>
											</div>
										</div>
										<div class="col-lg-2">
											Tempat Lahir
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<select class="form-control" name="tempat_lahir" id="tempat_lahir" required>
													<option value="<?php echo $result->tempat_lahir; ?>" selected style="display: none;"><?php echo $result->tempat_lahir; ?></option>
													<option value="Malang" id="Malang">Malang</option>
													<option value="Surabaya" id="Surabaya">Surabaya</option>
													<option value="Semarang" id="Semarang">Semarang</option>
													<option value="Medan" id="Medan">Medan</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											Tanggal lahir
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $result->tanggal_lahir; ?>" required>
											</div>
										</div>
										<div class="col-lg-2">
											Jenis kelamin
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
													<option value="<?php echo $result->jenis_kelamin; ?>" selected style="display: none;"><?php echo $result->jenis_kelamin; ?></option>
													<option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan" id="Perempuan">Perempuan</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											Status Pernikahan
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<select class="form-control" name="status_nikah" id="status_nikah" required>
													<option value="<?php echo $result->status_nikah; ?>" selected style="display: none;"><?php echo $result->status_nikah; ?></option>
													<option value="Menikah" id="Menikah">Menikah</option>
													<option value="Belum Menikah" id="Belum Menikah">Belum Menikah</option>
													<option value="Duda" id="Duda">Duda</option>
													<option value="Janda" id="Janda">Janda</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											Pekerjaan
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<select class="form-control" name="pekerjaan" id="pekerjaan" required>
													<option value="<?php echo $result->pekerjaan; ?>" selected style="display: none;"><?php echo $result->pekerjaan; ?></option>
													<option value="Pegawai Negeri Sipil" id="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
													<option value="Swasta" id="Swasta">Swasta</option>
													<option value="Tidak Bekerja" id="Tidak Bekerja">Tidak Bekerja</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											Pendidikan
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<select class="form-control" name="pendidikan" id="pendidikan">
													<option value="<?php echo $result->pendidikan; ?>" selected style="display: none;" required><?php echo $result->pendidikan; ?></option>
													<option value="S1/S2/S3" id="S1/S2/S3">S1/S2/S3</option>
													<option value="SMA/setaranya" id="SMA/setaranya">SMA/setaranya</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											Jenis ID
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<select class="form-control" name="jenis_id" id="jenis_id">
													<option value="<?php echo $result->jenis_id; ?>" selected style="display: none;" required><?php echo $result->jenis_id; ?></option>
													<option value="KTP" id="KTP">KTP</option>
													<option value="SIM" id="SIM">SIM</option>
													<option value="Paspor" id="Paspor">Paspor</option>
												</select>
											</div>
										</div>
										<div class="col-lg-2">
											Nomer ID
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" class="form-control" rows="3" name="no_id" id="no_id" value="<?php echo $result->no_id; ?>">
											</div>
										</div>
										<button data-toggle="tab" href="#pilih_jadwal" type="button" class="btn salmon stil" style="float: left; margin-top: 20%;">Kembali</button>
										<button onclick="next1()" type="button" class="btn salmon" style="float: right; margin-top: 20%;">Selanjutnya</button>
								</div>
								<div id="data_diri2" hidden>
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Alamat dan kontak yang bisa dihubungi</h5><br>
									</div>
									<div class="col-lg-2">
										Nama Jalan
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="alamat" id="alamat" value="<?php echo $result->alamat; ?>" required>
										</div>
									</div>
									<div class="col-lg-2">
										Kota/Kab
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<select class="form-control" name="kota_kab" id="kota_kab" required>
												<option value="<?php echo $result->kota_kab; ?>" selected style="display: none;"><?php echo $result->kota_kab; ?></option>
												<option value="Malang" id="Malang">Malang</option>
												<option value="Surabaya" id="Surabaya">Surabaya</option>
												<option value="Semarang" id="Semarang">Semarang</option>
												<option value="Medan" id="Medan">Medan</option>
											</select>
										</div>
									</div>
									<div class="col-lg-1">
										Provinsi
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<select class="form-control" name="provinsi" id="provinsi" required>
												<option value="<?php echo $result->provinsi; ?>" selected style="display: none;"><?php echo $result->provinsi; ?></option>
												<option value="Jawa Timur" id="Jawa Timur">Jawa Timur</option>
												<option value="Jawa Barat" id="Jawa Barat">Jawa Barat</option>
												<option value="Jawa Tengah" id="Jawa Tengah">Jawa Tengah</option>
												<option value="Sumatera Utara" id="Sumatera Utara">Sumatera Utara</option>
											</select>
										</div>
									</div>
									<div class="col-lg-1">
										KodePos
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type="number" class="form-control" rows="3" name="kode_pos" id="kode_pos" value="<?php echo $result->kode_pos; ?>" required>
										</div>
									</div>
									<div class="col-lg-2">
										Email
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="email" class="form-control" rows="3" name="email" id="email" value="<?php echo $result->email; ?>" required>
										</div>
									</div>
									<div class="col-lg-2">
										No. HP
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" value="<?php echo $result->no_hp; ?>" required>
										</div>
									</div>


									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Kondisi Kesehatan Umum</h5><br>
									</div>
									<div class="col-lg-2">
										Golongan Darah
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<select class="form-control" name="gol_darah" id="gol_darah" required>
												<option value="<?php echo $result->gol_darah; ?>"><?php echo $result->gol_darah; ?></option>
												<option value="A" id="A">A</option>
												<option value="B" id="B">B</option>
												<option value="AB" id="AB">AB</option>
												<option value="O" id="O">O</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Alergi (Bila Ada)
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="alergi" id="alergi" value="<?php echo $result->alergi; ?>">
										</div>
									</div>
									<div class="col-lg-2">
										Riwayat Penyakit Umum
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit" value="<?php echo $result->riwayat_penyakit; ?>" required>
										</div>
									</div>
								<?php endforeach; ?>

								<button onclick="prev2()" type="button" class="btn salmon" style="float: left;  margin-top: 13%;">Kembali</button>
								<button onclick="next2()" type="button" class="btn salmon" style="float: right;  margin-top: 13%;">Selanjutnya</button>
								</div>
								<div id="data_diri3" hidden>
									<div class="col-md-12">

										<h5 class="mb-20 weight-500" style="font-weight: bold">Informasi Orang terdekat</h5><br>
									</div>
									<div class="col-lg-2">
										Nama Depan
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="nama_depan_dekat" id="nama_depan_dekat" required>
										</div>
									</div>
									<div class="col-lg-2">
										Nama Belakang
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="nama_belakang_dekat" id="nama_belakang_dekat" required>
										</div>
									</div>
									<div class="col-lg-2">
										Tempat Lahir
									</div>
									<div class="col-lg-4">
										<div class="form-group box2">
											<select class="form-control" name="tempat_lahir_dekat" id="tempat_lahir_dekat" required>
												<option value="Malang" id="Malang">Malang</option>
												<option value="Surabaya" id="Surabaya">Surabaya</option>
												<option value="Semarang" id="Semarang">Semarang</option>
												<option value="Medan" id="Medan">Medan</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Tanggal Lahir
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="date" class="form-control" rows="3" name="tanggal_lahir_dekat" id="tanggal_lahir_dekat" required>
										</div>
									</div>
									<div class="col-lg-2">
										Jenis Kelamin
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<select class="form-control" name="jenis_kelamin_dekat" id="jenis_kelamin_dekat" required>
												<option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
												<option value="Perempuan" id="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Hubungan dengan pasien
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<select class="form-control" name="hubungan_dekat" id="hubungan_dekat" required>
												<option value="suami" id="suami">Suami</option>
												<option value="istri" id="istri">Istri</option>
												<option value="ayah" id="ayah">Ayah</option>
												<option value="ibu" id="ibu">Ibu</option>
												<option value="anak" id="anak">Anak</option>
												<option value="saudara" id="saudara">Saudara</option>
												<option value="lainnya" id="lainnya">Lainnya</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Jenis ID
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<select class="form-control" name="jenis_id_dekat" id="jenis_id_dekat" required>
												<option value="KTP" id="KTP">KTP</option>
												<option value="SIM" id="SIM">SIM</option>
												<option value="Paspor" id="Paspor">Paspor</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Nomer ID
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="no_id_dekat" id="no_id_dekat" required>
										</div>
									</div>



									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Alamat dan kontak orang terdekat yang bisa dihubungi </h5><br>
									</div>
									<div class="col-lg-2">
										Nama Jalan
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="alamat_dekat" id="alamat_dekat" required>
										</div>
									</div>
									<div class="col-lg-2">
										Kota/Kab
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<select class="form-control" name="kota_kab_dekat" id="kota_kab_dekat" required>
												<option value="Malang" id="Malang">Malang</option>
												<option value="Surabaya" id="Surabaya">Surabaya</option>
												<option value="Semarang" id="Semarang">Semarang</option>
												<option value="Medan" id="Medan">Medan</option>
											</select>
											</select>
										</div>
									</div>
									<div class="col-lg-1">
										Provinsi
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<select class="form-control" name="provinsi_dekat" id="provinsi_dekat" required>
												<option value="Jawa Timur" id="Jawa Timur">Jawa Timur</option>
												<option value="Jawa Barat" id="Jawa Barat">Jawa Barat</option>
												<option value="Jawa Tengah" id="Jawa Tengah">Jawa Tengah</option>
												<option value="Sumatera Utara" id="Sumatera Utara">Sumatera Utara</option>
											</select>
										</div>
									</div>
									<div class="col-lg-1">
										KodePos
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type="number" class="form-control" rows="3" name="kode_pos_dekat" id="kode_pos_dekat" required>
										</div>
									</div>
									<div class="col-lg-2">
										Email
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="email" class="form-control" rows="3" name="email_dekat" id="email_dekat" required>
										</div>
									</div>
									<div class="col-lg-2">
										No.HP
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="no_hp_dekat" id="no_hp_dekat" required>
										</div>
									</div>

									<button onclick="prev3()" type="button" class="btn salmon" style="float: left; margin-top: 1%;">Kembali</button>
									<button onclick="next3()" type="button" class="btn salmon" style="float: right; margin-top: 1%;">Selanjutnya</button>
								</div>
								<div id="data_diri4" hidden>
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Survey Pasien</h5><br>
									</div>
									<div class="col-lg-6">
										Seberapa sering kamu mengunjungi dokter gigi?
									</div>
									<div class="col-lg-6">
										<div class="form-group" required>
											<select class="form-control" name="kunjungan" id="kunjungan">
												<option value="1" id="1">1</option>
												<option value="3" id="3">3</option>
												<option value="5" id="5">5</option>
												<option value="7" id="7">7</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										Darimanakah kamu mengetahui klinik kami?
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<select class="form-control" name="market" id="market" required>
												<option value="Sosial Media" id="Sosial Media">Sosial Media</option>
												<option value="Rekomendasi Teman" id="Rekomendasi Teman">Rekomendasi Teman</option>
												<option value="Rekomendasi Saudara" id="Rekomendasi Saudara">Rekomendasi Saudara</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-6">
											Pilih jalur komunikasi yang paling nyaman untuk kami, hubungi kami<span style="color: grey"> (Reminder jadwal, Konfirmasi keluhan, dsb)</span>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<select class="form-control" name="komunikasi" id="komunikasi" required>
													<option value="Whatsapp" id="Whatsapp">Whatsapp</option>
													<option value="SMS" id="SMS">SMS</option>
													<option value="Telegram" id="Telegram">Telegram</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-6">
											Apakah kamu bersedia untuk mendapatkan data informasi terupdate dari klinik kami?
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<select class="form-control" name="informasi_update" id="informasi_update" required>
													<option value="Ya" id="Ya">Ya</option>
													<option value="Tidak" id="Tidak">Tidak</option>
												</select>
											</div>
										</div>
									</div>
									<button onclick="prev4()" type="button" class="btn salmon" style="float: left;  margin-top: 25%;">Kembali</button>
									<button data-toggle="tab" href="#keluhan" type="button" class="btn salmon stil2" style="float: right;margin-top: 25%;">Selanjutnya</button>
								</div>

							</div>
							<div id="keluhan" class="tab-pane fade">
								<div class="col-md-12">
									<h5 class="mb-20 weight-500" style="font-weight: bold">Keluhan yang dialami</h5><br>
								</div>
								<div class="col-lg-4">
									Keluhan dialami sejak tanggal
								</div>
								<div class="col-lg-8">
									<div class="form-group">
										<input type="date" class="form-control" rows="3" name="tanggal_keluhan" id="tanggal_keluhan" required>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="keluhan" class="form-control" placeholder="Jelaskan secara detail keluhan" rows="10" required></textarea>
									</div>
									<button data-toggle="tab" href="#data_diri" type="button" class="btn salmon stil2" style="float: left;margin-top: 17%;">Kembali</button>
									<button data-toggle="tab" href="#metode_pembayaran" type="button" class="btn salmon stil3" style="float: right;margin-top: 17%;">Selanjutnya</button>
								</div>
							</div>
							<div id="metode_pembayaran" class="tab-pane fade">
								<div class="col-md-12">
									<h5 class="mb-20 weight-500" style="font-weight: bold">Metode pembayaran</h5><br>
								</div>
								<div class="col-lg-2">
									Jenis Pembayaran
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" required>
											<option value="" disabled selected style="display: none;">-- Pilih Pembayaran --</option>
											<?php foreach ($metodebayar as $metode) { ?>
												<option value="<?php echo $metode['id_metode']; ?>" id="<?php echo $metode['id_metode']; ?>" style="text-align:right"><?php echo $metode['nama_metode']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div id="asuransiku" hidden>
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Detail Asuransi</h5><br>
									</div>
									<div class="col-lg-2">
										Provider Asuransi
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<select class="form-control" name="provider" id="provider" hidden />
											<option value="" disabled selected style="display: none;">-- Pilih Provider --</option>
											<option value="Provider Allianz" id="Provider Allianz">Provider Allianz</option>
											<option value="Provider Astra-Admedika" id="Provider Astra-Admedika">Provider Astra-Admedika</option>
											<option value="Provider Prudential" id="Provider Prudential">Provider Prudential</option>
											<option value="Provider MAG" id="Provider MAG">Provider MAG</option>
											<option value="Provider Cigna" id="Provider Cigna">Provider Cigna</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Kategori Asuransi
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<select class="form-control" name="kasuransi" id="kasuransi" hidden />
											<option value="" disabled selected style="display: none;">-- Pilih Jenis Asuransi --</option>
											<option value="Asuransi Jiwa" id="Asuransi Jiwa">Asuransi Jiwa</option>
											<option value="Asuransi Kesehatan" id="Asuransi Kesehatan">Asuransi Kesehatan</option>
											<option value="Asuransi Bisnis" id="Asuransi Bisnis">Asuransi Bisnis</option>
											<option value="Asuransi Umum" id="Asuransi Umum">Asuransi Umum</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2">
										Nomor Kartu Asuransi
									</div>
									<div class="col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" rows="3" name="no_asuransi" id="no_asuransi" value="" hidden />
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-2">
											Upload Foto Kartu Asuransi
										</div>
										<div class="col-lg-10">
											<div class="form-group">
												<input type="file" class="form-control" rows="3" name="foto_asuransi" id="foto_asuransi" hidden />
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<input type="hidden" name="id_pasien" value="<?php echo $result->id_pasien; ?>">
										<input type="hidden" name="id_user" value="<?php echo $result->id_user; ?>">
										<button class="btn salmon col-sm-4 " style="float: right; height: 50px; width: 100%" type="submit">Simpan</button>
									</div>
								</div>
								</form>
							</div>
							<div id="konfirmasi_booking" class="tab-pane fade in active">
								<div class="title-header">
									Rencana Pemeriksaan telah berhasil dibuat!
								</div>
								<div class="row col-lg-11">
									<div class="title-content">
										Kode Booking:
										<?php if ($booking == null) {
											echo 'Kode Booking tidak tersedia';
										} else {
											foreach ($booking->result() as $result) :
												echo $result->id_booking;
											endforeach;
										} ?>
									</div>
									<div class="title-content">
										Informasikan kode booking kepada Pasien Anda. Selanjutnya, kode booking ini diperlukan saat pasien Anda melakukan registrasi di jadwal pemeriksaan yang telah ditentukan.
									</div>
									<!-- <div class="title-content">
									Untuk melanjutkan ke tahap registrasi Klik Disini.
									</div> -->
								</div>
								<div class="row col-lg-5 mt-f">
									<a href="<?php echo base_url('owner/'); ?>" class="btn salmon stil2" data-formatter="lanjut" style="margin: 250px 0 0 0; float: right; background-color:#f40049; color:white" data-align="center">Kembali ke Beranda</a>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

</div>
<!--/.main-->