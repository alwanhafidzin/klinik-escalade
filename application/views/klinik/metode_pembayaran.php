<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
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
</script>
<script type="text/javascript">
	function addText() {
		var w = document.getElementById("subtotal");
		var x = document.getElementById("cmb");
		var y = document.getElementById("txt");
		var z = document.getElementById("hasil");
		gra = w.value * (x.value / 100);
		gra_tot = w.value - gra;
		getCmb = x.value;
		y.value = gra;
		z.value = gra_tot;
	}
</script>

<script type="text/javascript">
	function addText() {
		var x = document.getElementById("pilih_diskon");
		var y = document.getElementById("biaya_layanan");
		getcmb = x.value;
		y.value = getcmb;
	}

	$(document).ready(function) {
		var c = $("pilih_diskon").option

		$("biaya_layanan").val(c);

		$("#benih").onchange(function() {
			var lama = $("#benih option:selected").attr("lama");
			var berat = $("#benih option:selected").attr("berat");
			var harga = $("#benih option:selected").attr("harga");

			$("#lama-tanam").val(lama);
			$("#berat").val(berat);
			$("#harga").val(harga);

		});
	}

	$(window).load(function() {
		$(".stileone").on("click", function() {
			$(".stileone").css("background-color", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone1").on("click", function() {
			$(".stileone1").css("background", "#e28a9d");
			$(".stileone").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone2").on("click", function() {
			$(".stileone2").css("background", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone3").on("click", function() {
			$(".stileone3").css("background", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone4").on("click", function() {
			$(".stileone4").css("background", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
		});

		$(".stil").on("click", function() {
			$(".stileone").css("background-color", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil1").on("click", function() {
			$(".stileone1").css("background", "#e28a9d");
			$(".stileone").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil2").on("click", function() {
			$(".stileone2").css("background", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil3").on("click", function() {
			$(".stileone3").css("background", "#e28a9d");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil4").on("click", function() {
			$(".stileone4").css("background", "#e28a9d");
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
			background-color: #e28a9d;
		}

		.tab-content {
			height: auto;
			width: auto;
			top: 10px;
			bottom: 500px;
			z-index: 1;
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
			height: auto;
			width: auto;
			background-color: transparent;
			margin: 0 0px 0 0;
			float: right;
			color: white;
			z-index: 2;
		}

		.box {
			height: auto;
			width: auto;
			background-color: #424242;
			display: block;
			z-index: 2;
		}

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
			background-color: #e28a9d;
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
			width: 300px;
			font-size: 12px;
			padding: 0 0 0 110px;
			color: white;
		}

		.row.boxx:hover {
			background-color: #e28a9d;
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

		.box6 select {
			background-color: white;
			color: none;
			width: 460px;
			font-size: 15px;
			-webkit-appearance: button;
			appearance: button;
			outline: none;
			text-align: left;

		}

		.box6::before {
			content: "\f13a";
			font-family: FontAwesome;
			position: absolute;
			background-color: #0563af;
			top: 0;
			right: 0;
			width: 30px;
			height: 34px;
			text-align: center;
			font-size: 19px;
			line-height: 36px;
			color: rgba(255, 255, 255);
			background-color: #F40049;
			pointer-events: none;
			border-radius: 0 20% 20% 0;
		}

		.box6:hover::before {
			color: rgba(255, 255, 255, 0.6);
			background-color: #F40049;
		}

		.box6 select option {
			padding: 30px;
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

		.kotak {}
	}



	@media only screen and (min-width: 900px) {
		.stileone {
			background-color: #e28a9d;
		}

		.tab-content {
			/*height: 525px;*/
			border: 1px solid #e0e0e0;
			width: 97%;
			z-index: 1;
			margin-left: 15px;
			margin-right: -15px;
			padding-left: 10px;
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
			margin: 0 70px 0 0;
			float: right;
			color: white;
			z-index: 2;
		}

		.box {
			height: 525px;
			width: 360px;
			background-color: #424242;
			display: block;
			z-index: 2;
		}

		.box-gr {
			height: 85px;
			width: 400px;
			float: right;
			border-radius: 45px 0 0 45px;
			z-index: 2;
		}

		.box-gr-item {
			height: 85px;
			width: 400px;
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
			background-color: #e28a9d;
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
			width: 400px;
			font-size: 13px;
			padding: 0 0 0 110px;
			color: white;
		}

		.row.boxx:hover {
			background-color: #e28a9d;
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

		.box6 select {
			background-color: white;
			color: none;
			width: 320px;
			font-size: 15px;
			-webkit-appearance: button;
			appearance: button;
			outline: none;
			text-align: left;

		}

		.box6::before {
			content: "\f13a";
			font-family: FontAwesome;
			position: absolute;
			background-color: #0563af;
			top: 0;
			right: 0;
			width: 30px;
			height: 34px;
			text-align: center;
			font-size: 19px;
			line-height: 36px;
			color: rgba(255, 255, 255);
			background-color: #F40049;
			pointer-events: none;
			border-radius: 0 20% 20% 0;
		}

		.box6:hover::before {
			color: rgba(255, 255, 255, 0.6);
			background-color: #F40049;
		}

		.box6 select option {
			padding: 30px;
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

		.kotak {}

		.box-rencana {
			box-shadow: 2px #888888;
			border: 1px solid #e0e0e0;
			padding-left: 20px;
			margin-bottom: 20px;
			yy
		}

		input[type="text"]:disabled {
			background: white;
		}

		input[type="text"]:readonly {
			background: white;
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
						<font style="font-weight: bold; font-size: 15px;">Pembayaran <i class="fa fa-chevron-right" aria-hidden="true"></i> Proses Pembayaran</font><br><br>
						<div class="box-rencana">
							<h3 class="mb-20 weight-500"><b>Rencana Pemeriksaan
									<?php foreach ($bayar->result() as $result) : ?>
										<?php echo $result->nama_depan; ?> <?php echo $result->nama_belakang; ?> </b>
							<?php endforeach; ?>
							</h3><br>
							<p><?php echo $result->nama_cabang; ?> &nbsp; | &nbsp; <?php echo $result->nama_dokter; ?></p>
						</div>
					</div>
					<div class="kotak">

						<br>
						<div class="tab-content col-md-8">
							<?php foreach ($bayar->result() as $result) : ?>
								<div id="metode_pembayaran" class="tab-pane fade in active">
									<form action="<?php echo base_url('klinik/update_bayar/'); ?>" method="post" enctype="multipart/form-data" id="form1">
										<input type="hidden" name="id_booking" value="<?php echo $result->id_booking; ?>">

										<div class="col-md-12">
											<h5 class="mb-20 weight-500" style="font-weight: bold">Metode pembayaran</h5><br>
										</div>
										<div class="col-lg-2">
											Jenis Pembayaran
										</div>
										<div class="col-lg-4">
											<div class="form-group box6">
												<select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" required>
													<option value="<?php echo $result->id_metode; ?>" id="<?php echo $result->id_metode; ?>" style="text-align:right"><?php echo $result->nama_metode; ?></option>
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
												<div class="form-group box6">
													<select class="form-control" name="provider" id="provider" hidden />
													<option value="<?php echo $result->provider; ?>" disabled selected style="display: none;"><?php echo $result->provider; ?></option>
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
												<div class="form-group box6">
													<select class="form-control" name="kasuransi" id="kasuransi" hidden />
													<option value="<?php echo $result->kategori_asuransi; ?>" disabled selected style="display: none;"><?php echo $result->kategori_asuransi; ?></option>
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
													<input type="text" class="form-control" rows="3" name="no_asuransi" id="no_asuransi" value="<?php echo $result->nomor_asuransi; ?>" hidden />
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-2">
													Upload Foto Kartu Asuransi
												</div>
												<div class="col-lg-10">
													<img src="<?php echo base_url('images/'); ?>asuransi/<?php echo $result->foto_asuransi ?>" width="300px">
													<div class="form-group">
														<input type="file" class="form-control" rows="3" name="foto_asuransi" id="foto_asuransi" hidden />
													</div>
												</div>
											</div>
										</div>

										<button data-toggle="tab" href="#proses_bayar" type="button" class="btn salmon stil1" style="float: right;margin-top: 18%; background-color:#F40049; color:white">Selanjutnya</button>
								</div>



								<div id="proses_bayar" class="tab-pane fade" style="margin-left: -20px">
									<div class="col-md-12">
										<div class="col-lg-4">
											<b>Diagnosa Dokter</b>
										</div>
										<div class="col-lg-8">
											<div class="form-group">
												<textarea name="diagnosa" class="form-control" style="resize:none;width:600px;height:200px;" rows="10" required readonly><?php echo $result->diagnosis; ?></textarea>
											</div>
										</div>
										<div class="col-lg-10">
											<table id="all_data_json" class="table">
												<thead>
													<tr>
														<th data-sortable="true">Elemen Gigi</th>
														<th data-sortable="true">Tindakan</th>
														<th data-sortable="true">Jumlah</th>
														<th data-sortable="true">Harga Satuan</th>
														<th data-sortable="true">Subtotal</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>46</td>
														<?php foreach ($layanan->result() as $key) : ?>
															<td><?php echo $key->layanan ?></td>
															<td><?php echo $key->jumlah ?>X</td>
															<td>Rp. <?php echo $key->harga ?></td>
															<td>Rp. <?= $key->subtotal ?></td>

													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-lg-10" style="background: #ccc; color: #000; padding: 7px 0 6px 10px;">
											<b>TOTAL : <p id="txttot" style="float: right; color: #000; margin: 0 20px 0 0;">Rp. <?= $key->subtotal ?></p></b>
										</div>
										<div class="col-lg-12"></div>
										<div class="col-lg-2" style="margin: 30px 0 10px 0;">
											Discount / Coupon :
										</div>
										<div class="col-lg-4" style="margin: 20px 0 10px 0;">
											<div class="form-group">
												<select class="form-control" name="diskon" id="diskon">
													<?php foreach ($diskon_pil->result() as $diskp) : ?>
														<option value="" disabled selected style="display: none;"><?= $diskp->nama_diskon  ?></option>
													<?php endforeach; ?>
													<?php foreach ($diskon->result() as $disk) : ?>
														<option value="<?= $disk->id_diskon ?>"><?= $disk->nama_diskon ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="col-lg-12"></div>
										<div class="col-lg-10" style="background: #f40049; color: #fff; padding: 7px 0 6px 10px;">
											<b style="padding: 5px 0 5px 0;"> GRAND TOTAL :
												<p style="float: right; color: #fff; margin-bottom: 0;">Rp. <input type="text" value="" name="grandtotal" id="grandtotal" style="float:right; color:#fff; margin-left: 3px;  width: 65px; border: 0px; background: #f40049;"></p></b>
											<input type="hidden" name="id_rekam_medis" value="$result->id_rekam_medis">
										</div>
									<?php endforeach; ?>

									<div class="col-lg-12">
										<button data-toggle="tab" href="#metode_pembayaran" type="button" class="btn salmon stil2" style="float: left;margin-top: 3%; background-color:#F40049; color:white">Kembali</button>
										<button type="submit" class="btn salmon stil3" style="float: right;margin-top: 3%; background-color:#F40049; color:white">Proses</button>
									</div>

									</div>

								</div>
						</div>

					</div>
					</form>
				<?php endforeach; ?>

				</div>

			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

</div>
<!--/.main-->

<script type="text/javascript">
	window.onload = function() {
		var tot = parseInt(document.getElementById('subtotal').value);
		var x = parseInt(document.getElementById('cmb').value);
		var disk = parseInt(document.getElementById('txt').value);
		var hitung = (disk * tot) / 100;
		var jumlah = tot - hitung;

		// document.getElementById('grand').value = jumlah;
		if (!isNaN(jumlah)) {
			document.getElementById("hasil").innerHTML = jumlah;
		}
	}
</script>

<script type="text/javascript">
	window.onload = function() {
		var hasil;
		hasil = 1 + 3 + 5 + 7 + 9;
		document.getElementById("tempat_hasil").innerHTML = hasil;
	}
</script>
<script>
	$(document).ready(function() {
		grandtotal();
		$('#diskon').change(function() {
			// let a = $(this).val();
			// console.log(a);
			grandtotal();
		});
	});

	function grandtotal() {
		var diskon = $('#diskon').val();
		$.ajax({
			url: "<?= base_url('klinik/grandtotal/' . $result->id_rekam_medis) ?>",
			data: {
				diskon: diskon
			},
			success: function(data) {
				// console.log(data);
				$('#grandtotal').val(data);
			}
		});
	}
</script>