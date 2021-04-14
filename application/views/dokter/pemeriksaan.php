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
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone1").on("click", function() {
			$(".stileone1").css("background", "#f40049");
			$(".stileone").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone2").on("click", function() {
			$(".stileone2").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone3").on("click", function() {
			$(".stileone3").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone4").on("click", function() {
			$(".stileone4").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stileone5").on("click", function() {
			$(".stileone5").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");


		});
		$(".stil").on("click", function() {
			$(".stileone").css("background-color", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil1").on("click", function() {
			$(".stileone1").css("background", "#f40049");
			$(".stileone").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil2").on("click", function() {
			$(".stileone1").css("background", "#f40049");
			$(".stileone2").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil3").on("click", function() {
			$(".stileone2").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil4").on("click", function() {
			$(".stileone3").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil5").on("click", function() {
			$(".stileone4").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone5").css("background", "transparent");
		});
	});
	$(window).load(function() {
		$(".stil6").on("click", function() {
			$(".stileone5").css("background", "#f40049");
			$(".stileone1").css("background", "transparent");
			$(".stileone2").css("background", "transparent");
			$(".stileone3").css("background", "transparent");
			$(".stileone").css("background", "transparent");
			$(".stileone4").css("background", "transparent");
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

	function sel1() {
		var x = document.getElementById("keluhan1");
		var y = document.getElementById("keluhan2");
		y.style.display = "block";
		x.style.display = "none";
	}

	function sel2() {
		var x = document.getElementById("keluhan2");
		var y = document.getElementById("keluhan3");
		y.style.display = "block";
		x.style.display = "none";
	}

	function sel3() {
		var x = document.getElementById("keluhan3");
		var y = document.getElementById("keluhan4");
		y.style.display = "block";
		x.style.display = "none";
	}

	function sel4() {
		var x = document.getElementById("keluhan4");
		var y = document.getElementById("keluhan5");
		y.style.display = "block";
		x.style.display = "none";
	}

	function sel5() {
		var x = document.getElementById("keluhan5");
		var y = document.getElementById("keluhan6");
		y.style.display = "block";
		x.style.display = "none";
	}

	function kem2() {
		var x = document.getElementById("keluhan2");
		var y = document.getElementById("keluhan1");
		y.style.display = "block";
		x.style.display = "none";
	}

	function kem3() {
		var x = document.getElementById("keluhan3");
		var y = document.getElementById("keluhan2");
		y.style.display = "block";
		x.style.display = "none";
	}

	function kem4() {
		var x = document.getElementById("keluhan4");
		var y = document.getElementById("keluhan3");
		y.style.display = "block";
		x.style.display = "none";
	}

	function kem5() {
		var x = document.getElementById("keluhan5");
		var y = document.getElementById("keluhan4");
		y.style.display = "block";
		x.style.display = "none";
	}

	function kem6() {
		var x = document.getElementById("keluhan6");
		var y = document.getElementById("keluhan5");
		y.style.display = "block";
		x.style.display = "none";
	}
</script>
<style type="text/css">
	@media only screen and (max-width: 800px) {
		.stileone {
			background-color: #f40049;
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
			margin: 20px 0 0 0;
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
			width: 300px;
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

		.salmon {
			float: right;
			margin-top: 20%;
			color: white;
			background-color: #f40049;
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
			background-color: #f40049;
		}

		.tab-content {
			height: 650px;
			width: 700px;
			z-index: 1;
			border-bottom: 1px solid black;
			border-left: 1px solid black;
			border-top: 1px solid black;
			padding-right: 50px;
		}

		.mt-4 {
			margin: 20px 0 0 0;
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
			margin: 0 60px 0 0;
			float: right;
			color: white;
			z-index: 2;
		}

		.box {
			height: 560px;
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
			width: 400px;
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
			color: white;
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

		.salmon {
			float: right;
			margin-top: 20%;
			color: white;
			background-color: #f40049;
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

	.disp-n {
		display: none;
	}

	.disp-b {
		display: block;
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
						<h3 class="mb-20 weight-500">Pemeriksaan
							<?php $a = 0;
							$b = 1;
							foreach ($pasien->result() as $result) {
								$a++;
								if ($a <= $b) { ?>
									<?php echo $result->nama_depan; ?>
									(<?php echo $result->id_rekam_medis; ?>)
							<?php }
							} ?>

						</h3><br>
					</div>
					<div class="kotak">
						<div class="col-xs-3 nav-gr">
							<div class="row box">
								<div class="box-gr mt-4 stileone">
									<div class="row boxx tablink" data-toggle="tab" href="#pilih_jadwal">
										<div class="box-gr-item bor-top">
											<div class="box-gr-header">Data Diri & Anamnesa</div>
											<div class="box-gr-graf">Lihat data diri dan anamnesa pasien</div>
										</div>
										<div class="box-gr-circle stileone">
											<div class="box-gr-count">1</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr stileone1">
									<div class="row boxx tablink" data-toggle="tab" href="#data_diri">
										<div class="box-gr-item">
											<div class="box-gr-header">Odontogram (Before)</div>
											<div class="box-gr-graf">Lengkapi odontogram pasien sebelum melakukan perawatan</div>
										</div>
										<div class="box-gr-circle stileone1">
											<div class="box-gr-count">2</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr stileone2">
									<div class="row boxx tablink" data-toggle="tab" href="#keluhan">
										<div class="box-gr-item">
											<div class="box-gr-header">Pemeriksaan Klinis & Penunjang</div>
											<div class="box-gr-graf">Lengkapi pemeriksaan klinis & pemeriksaan penunjang</div>
										</div>
										<div class="box-gr-circle stileone2">
											<div class="box-gr-count">3</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>

								</div>
								<div class="box-gr stileone3">
									<div class="row boxx tablink" data-toggle="tab" href="#metode_pembayaran">
										<div class="box-gr-item">
											<div class="box-gr-header">Diagnosa</div>
											<div class="box-gr-graf">Lengkapi diagnosa terhadap keluhan pasien</div>
										</div>
										<div class="box-gr-circle stileone3">
											<div class="box-gr-count">4</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr stileone4">
									<div class="row boxx tablink" data-toggle="tab" href="#konfirmasi_booking">
										<div class="box-gr-item">
											<div class="box-gr-header">Perawatan</div>
											<div class="box-gr-graf">Lengkapi Perawatan yang diberikan kepada pasien</div>
										</div>
										<div class="box-gr-circle stileone4">
											<div class="box-gr-count">5</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
								<div class="box-gr stileone5">
									<div class="row boxx tablink" data-toggle="tab" href="#odontogram_after">
										<div class="box-gr-item">
											<div class="box-gr-header">Odontogram (After)</div>
											<div class="box-gr-graf">Lengkapi odontogram pasien setelah melakukan perawatan</div>
										</div>
										<div class="box-gr-circle stileone5">
											<div class="box-gr-count">6</div>
										</div>
									</div>
									<div class="box-gr-circle cir-col"></div>
								</div>
							</div>
						</div>
						<br>
						<div class="tab-content col-md-8">
							<div id="pilih_jadwal" class="tab-pane fade in active">
								<form action="<?php echo base_url('doctor/create_action_periksa/'); ?>" method="post" enctype="multipart/form-data">
									<div id="data_diri1">
										<input type="hidden" name="id_booking" value="<?php echo $result->id_booking; ?>">
										<input type="hidden" name="id_pasien" value="<?php echo $result->id_pasien; ?>">
										<input type="hidden" name="id_rekam_medis" value="<?php echo $result->id_rekam_medis; ?>">
										<!-- <input type="hidden" name="id_layanan" value="<?php echo $result->id_layanan; ?>"> -->
										<div class="col-md-12">
											<h5 class="mb-20 weight-500" style="font-weight: bold">Informasi Umum</h5><br>
										</div>
										<?php foreach ($pasien->result() as $result) : ?>
											<div class="col-lg-2">
												Nama Depan <?php echo form_error('nama_depan') ?>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<input type="text" class="form-control" rows="3" name="nama_depan" id="nama_depan" value="<?php echo $result->nama_depan; ?>">
												</div>
											</div><br>
											<div class="col-lg-2">
												Nama Belakang <?php echo form_error('nama_belakang') ?>
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<input type="text" class="form-control" rows="3" name="nama_belakang" id="nama_belakang" value="<?php echo $result->nama_belakang; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												Tempat Lahir
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<select class="form-control" name="tempat_lahir" id="tempat_lahir">
														<option selected value="<?php echo $result->tempat_lahir; ?>" style="display: none;"><?= $result->tempat_lahir ?></option>
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
													<input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $result->tanggal_lahir; ?>">
												</div>
											</div>
											<div class="col-lg-2">
												Jenis kelamin
											</div>
											<div class="col-lg-4">
												<div class="form-group">
													<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
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
													<select class="form-control" name="status_nikah" id="status_nikah">
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
													<select class="form-control" name="pekerjaan" id="pekerjaan">
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
														<option value="<?php echo $result->pendidikan; ?>" selected style="display: none;"><?php echo $result->pendidikan; ?></option>
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
														<option value="<?php echo $result->jenis_id; ?>" selected style="display: none;"><?php echo $result->jenis_id; ?></option>
														<option value="VIP" id="VIP">VIP</option>
														<option value="Umum" id="Umum">Umum</option>
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
												<input type="text" class="form-control" rows="3" name="alamat" id="alamat" value="<?php echo $result->alamat; ?>">
											</div>
										</div>
										<div class="col-lg-2">
											Kota/Kab
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<select class="form-control" name="kota_kab" id="kota_kab">
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
												<select class="form-control" name="provinsi" id="provinsi">
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
												<input type="number" class="form-control" rows="3" name="kode_pos" id="kode_pos" value="<?php echo $result->kode_pos; ?>">
											</div>
										</div>
										<div class="col-lg-2">
											Email
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="email" class="form-control" rows="3" name="email" id="email" value="<?php echo $result->email; ?>">
											</div>
										</div>
										<div class="col-lg-2">
											No. HP
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" value="<?php echo $result->no_hp; ?>">
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
												<select class="form-control" name="gol_darah" id="gol_darah">
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
											Riwayat Penyakit
										</div>
										<div class="col-lg-10">
											<div class="form-group">
												<input type="text" class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit" value="<?php echo $result->riwayat_penyakit; ?>">
											</div>
										</div>
										<div class="col-lg-2">
											<b>Keadaan Umum Pasien</b>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<input type='radio' class="" rows="3" name="keadaan_umum" value="Baik"> Baik
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<input type='radio' class="" rows="3" name="keadaan_umum" value="Sedang"> Sedang
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group">
												<input type='radio' class="" rows="3" name="keadaan_umum" value="Buruk"> Buruk
											</div>
										</div>

										<div class="col-lg-12">
										</div>
									<?php endforeach; ?>

									<button onclick="prev2()" type="button" class="btn salmon" style="float: left;  margin-top: 5%;">Kembali</button>
									<button onclick="next2()" type="button" class="btn salmon" style="float: right;  margin-top: 5%;">Selanjutnya</button>
									</div>
									<div id="data_diri3" hidden>
										<div class="col-md-12">
											<h5 class="mb-20 weight-500" style="font-weight: bold">Keluhan (Anamnesa)</h5><br>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<textarea name="keluhan_utama" class="form-control" placeholder="Jelaskan secara detail keluhan" rows="10"><?= $result->keluhan; ?></textarea>
											</div>
										</div>
										<button onclick="prev3()" type="button" class="btn salmon" style="float: left;  margin-top: 25%;">Kembali</button>
										<button data-toggle="tab" href="#data_diri" type="button" class="btn salmon stil2" style="float: right;margin-top: 25%;">Selanjutnya</button>

									</div>
							</div>
							<div id="data_diri" class="tab-pane fade">
								<div class="col-md-12">
									<h5 class="mb-20 weight-500" style="font-weight: bold">Odontogram</h5><br>
								</div>
								<button data-toggle="tab" href="#pilih_jadwal" type="button" class="btn salmon stil" style="float: left;margin-top: 25%;">Kembali</button>
								<button data-toggle="tab" href="#keluhan" type="button" class="btn salmon stil3" style="float: right;margin-top: 25%;">Selanjutnya</button>
							</div>
							<div id="keluhan" class="tab-pane fade">
								<div id="keluhan1">
									<div class="col-md-12">
										<button data-toggle="tab" href="#" type="button" class="btn salmon" style="float: right;margin-top: 1%;"><i class="lnr lnr-calendar-full"></i> Filter Tanggal Pemeriksaan</button>
										<h5 class="mb-20 weight-500" style="font-weight: bold">Pemeriksaan Klinis Umum</h5><br>
									</div>
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Pemeriksaan Ekstra Oral</h5><br>
									</div>

									<div class="col-lg-2">
										<b>Wajah</b>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="wajah" value="Simetri"> Simetri
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group ">
											<input type='radio' class="" rows="3" name="wajah" value="Asimetri"> Asimetri
										</div>
									</div>

									<div class="col-lg-12"></div>

									<div class="col-lg-2">
										<b>Bibir</b>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="bibir1" value="Normal"> Normal
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="bibir1" value=""> Lainnya :
										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="bibir2">
										</div>
									</div>

									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Kelenjar Getah Bening</h5><br>
									</div>

									<div class="col-lg-2">
										<b>Submandibula kanan</b>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kanan1" value="Teraba"> Teraba
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="subkanan_kondisi" placeholder="Lunak/Kenyal/Keras">
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kanan1" value="Tidak Teraba"> Tidak Teraba
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kanan2" value="Sakit"> Sakit
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kanan2" value="Tidak Sakit"> Tidak Sakit
										</div>
									</div>

									<div class="col-lg-12"></div>

									<div class="col-lg-2">
										<b>Submandibula kiri</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kiri1" value="Teraba"> Teraba
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="subkiri_kondisi" placeholder="Lunak/Kenyal/Keras">
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kiri1" value="Tidak Teraba"> Tidak Teraba
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kiri2" value="Sakit"> Sakit
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="submandibula_kiri2" value="Tidak Sakit"> Tidak Sakit
										</div>
									</div>

									<div class="col-lg-12"></div>

									<div class="col-lg-2">Lainnya</div>

									<div class="col-lg-8">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="lainnya" value="">
										</div>
									</div>

									<div class="col-lg-12">
									</div>

									<button data-toggle="tab" href="#data_diri" type="button" class="btn salmon stil2" style="float: left;margin-top: 7%;">Kembali</button>
									<button onclick="sel1()" type="button" class="btn salmon" style="float: right; margin-top: 7%;">Selanjutnya</button>

								</div>
								<div id="keluhan2" hidden>
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Pemeriksaan Intra Oral</h5><br>
									</div>

									<div class="col-lg-2">
										<b>Gingiva</b>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="gingiva1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="gingiva1" value=""> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="gingiva2">
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Debris</b>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="debris1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="debris1" value="Lainnya"> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="debris2">
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Stain</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="stain" value="Ada"> Ada
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="stain" value="Tidak Ada"> Tidak Ada
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Kalkulus</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="kalkulus" value="Tidak Ada"> Tidak Ada
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="kalkulus" value="Subgingiva"> Subgingiva
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="kalkulus" value="Supragingiva"> Supragingiva
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Mukosa</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="mukosa1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="mukosa1" value="Lainnya"> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="mukosa2">
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Palatum</b>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="palatum1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="palatum1" value="Lainnya"> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="palatum2">
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Lidah</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="lidah1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="lidah1" value="Lainnya"> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="lidah2">
										</div>
									</div>

									<div class="col-md-12"></div>

									<button onclick="kem2()" type="button" class="btn salmon" style="float: left;  margin-top: 4%;">Kembali</button>
									<button onclick="sel2()" type="button" class="btn salmon" style="float: right;  margin-top: 4%;">Selanjutnya</button>
								</div>
								<div id="keluhan3" hidden>
									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Dasar Mulut</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="dasar_mulut1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="dasar_mulut1" value="Lainnya"> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="dasar_mulut2">
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-lg-2">
										<b>Hubungan Rahang</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="hubungan_rahang" value="Ortognati"> Ortognati
										</div>
									</div>
									<div class="col-lg-4 text-center">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="hubungan_rahang" value="Retrognati"> Retrognati
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="hubungan_rahang" value="Prognati"> Prognati
										</div>
									</div>
									<!-- kelainan gigi geligi foreach belum -->
									<div class="col-md-12" style="margin-top:10px"></div>
									<div class="col-lg-2">
										<b>Kelainan Gigi Geligi</b>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="kelainan_gigi_geligi1" value="Normal"> Normal
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="kelainan_gigi_geligi1" value="Lainnya"> Ada Kelainan :
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="kelainan_gigi_geligi2">
										</div>
									</div>
									<!-- lainnya foreach juga belum -->
									<div class="col-lg-12"></div>

									<div class="col-lg-2">Lainnya</div>

									<div class="col-lg-10">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="lainnya" value="">
										</div>
									</div>

									<div class="col-md-12"></div>
									<div class="col-md-12">
										<button data-toggle="tab" href="#" type="button" class="btn salmon" style="float: right;margin-top: 1%;"><i class="lnr lnr-calendar-full"></i> Filter Tanggal Pemeriksaan</button>
										<h5 class="mb-20 weight-500" style="font-weight: bold">Pemeriksaan Klinis Khusus</h5><br>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<textarea name="keterangan_khusus" class="form-control" placeholder="46 Only, vitalitas(+), perkusi(+), palpasi(-)." rows="10"></textarea>
										</div>
									</div>

									<button onclick="kem3()" type="button" class="btn salmon" style="float: left;  margin-top: 10%;">Kembali</button>
									<button onclick="sel3()" type="button" class="btn salmon" style="float: right;  margin-top: 10%;">Selanjutnya</button>
								</div>
								<div id="keluhan4" hidden>
									<div class="col-md-12">
										<h5 class="mb-20 weight-500" style="font-weight: bold">Pemeriksaan Penunjang</h5><br>
									</div>
									<div class="col-md-12">
										<button data-toggle="tab" href="#" type="button" class="btn salmon" style="float: right;margin-top: 1%;"><i class="lnr lnr-calendar-full"></i> Filter Tanggal Pemeriksaan</button>
										<h5 class="mb-20 weight-500" style="font-weight: bold">Radiologi</h5><br>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='checkbox' class="" rows="3" name="panoramik" value="Panoramik"> Panoramik
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='checkbox' class="" rows="3" name="sefalometri" value="Sefalometri"> Sefalometri
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='checkbox' class="" rows="3" name="transcranial" value="Transcranial"> Transcranial
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='checkbox' class="" rows="3" name="dental_regio" value="Dental Regio"> Dental,Regio
										</div>
									</div>
									<div class="col-lg-4" style="float: right;">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="gigi" value="" placeholder="46">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<textarea name="keterangan_radiologi" class="form-control" placeholder="Tampak gambaran radiopak ada oklusal gigi 46 hingga dentin dalam. Tampak gambaran radiolusensi berbatas diffuse pada apical seluas kurang lebih 4 mm." rows="5"></textarea>
										</div>
									</div>

									<div class="col-lg-12"> </div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="button" class="btn salmon " style="position: absolute; margin-top: 1%; cursor: default;" value="Upload Foto Baru">
											<input type="file" class="form-control" style="margin-left: 130px; margin-top: 1%; cursor: pointer;" name="foto_radiologi">
										</div>
									</div>
									<button data-toggle="tab" href="#" type="button" class="btn salmon " style="float: right;margin-top: 1%;">Download Foto Terupdate</button>
									<div class="col-lg-12"> </div>
									<button onclick="kem4()" type="button" class="btn salmon" style="float: left;  margin-top: 15%;">Kembali</button>
									<button onclick="sel4()" type="button" class="btn salmon" style="float: right;  margin-top: 15%;">Selanjutnya</button>
								</div>
								<div id="keluhan5" hidden>
									<div class="col-md-12">
										<button data-toggle="tab" href="#" type="button" class="btn salmon" style="float: right;margin-top: 1%;"><i class="lnr lnr-calendar-full"></i> Filter Tanggal Pemeriksaan</button>

										<h5 class="mb-20 weight-500" style="font-weight: bold">Laboratorium</h5><br>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="laboratorium1" value="Darah Rutin"> Darah Rutin
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<input type='radio' class="" rows="3" name="laboratorium1" value=""> Lainnya
										</div>
									</div>
									<div class="col-lg-8">
										<div class="form-group">
											<input type='text' class="form-control" rows="3" name="laboratorium2">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<textarea name="keterangan_laboratorium" class="form-control" placeholder="Tidak ada" rows="5"></textarea>
										</div>
									</div>

									<div class="col-lg-12"> </div>
									<div class="col-lg-4">
										<div class="form-group">
											<input type="button" class="btn salmon " style="position: absolute; margin-top: 1%; cursor: default;" value="Upload Foto Baru">
											<input type="file" class="form-control" style="margin-left: 130px; margin-top: 1%; cursor: pointer;" name="foto_laboratorium">
										</div>
									</div>
									<button data-toggle="tab" href="#" type="button" class="btn salmon " style="float: right;margin-top: 1%;">Download Foto Terupdate</button>

									<div class="col-lg-12"> </div>
									<button onclick="kem5()" type="button" class="btn salmon" style="float: left;  margin-top: 25%;">Kembali</button>
									<button data-toggle="tab" href="#metode_pembayaran" type="button" class="btn salmon stil4" style="float: right;margin-top: 25%;">Selanjutnya</button>
								</div>
							</div>
							<div id="metode_pembayaran" class="tab-pane fade">
								<div class="col-md-12">
									<h5 class="mb-20 weight-500" style="font-weight: bold">Diagnosa</h5><br>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="diagnosis" class="form-control" placeholder="Jelaskan secara detail diagnosa" rows="10"></textarea>
									</div>
								</div>
								<button data-toggle="tab" href="#keluhan" type="button" class="btn salmon stil3" style="float: left;margin-top: 25%;">Kembali</button>
								<button data-toggle="tab" href="#konfirmasi_booking" type="button" class="btn salmon stil5" style="float: right;margin-top: 25%;">Selanjutnya</button>
							</div>

							<div id="konfirmasi_booking" class="tab-pane fade">
								<div class="col-md-12">
									<h5 class="mb-20 weight-500" style="font-weight: bold">Perawatan / Tindakan</h5><br>
								</div>
								<table id="all_data_json" class="table">
									<thead>
										<tr>
											<th data-sortable="true">Elemen Gigi</th>
											<th data-sortable="true">Tindakan</th>
											<th data-sortable="true">Detail Tindakan</th>
											<th data-sortable="true">Jumlah</th>
											<th data-sortable="true">Harga Satuan</th>
											<th data-sortable="true">Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="text" class="form-control" name="elemen_gigi" id="elemen_gigi" style="width: 50px;"></td>
											<td>
												<select class="form-control" name="id_layanan" id="layanan">
													<option value="" disabled selected style="display: none;">-- Pilih Layanan --</option>
													<?php foreach ($layanan->result() as $key) : ?>
														<option value="<?= $key->id_layanan ?>"><?php echo $key->layanan ?></option>
													<?php endforeach ?>
												</select>
												<!-- <input type="hidden" name="id_layanan" value="<?php echo $key->id_layanan; ?>"> -->
											</td>
											<td><input type="text" class="form-control" rows="3" name="detail_layanan"></td>
											<td>

												<select class="form-control" name="jumlah" id="jumlah">
													<option value="0" disabled selected style="display: none;">-- Jumlah Treatment --</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
												</select>
											</td>
											<td id="txtlayanan"></td>
											<td id="txttotal"></td>

										</tr>
									</tbody>
								</table>
								<div class="col-lg-12" style="background: #ccc; color: #000; padding: 7px 0 6px 10px;">
									<b>TOTAL : <p style="float: right; color: #000; margin: 0 0px 0 0;">Rp. <input type="text" class="" rows="3" name="subtotal" id="txttot" style="float:right; color:#000; margin-left: 3px;  width: 65px; border: 0px; background: #ccc;"></p></b>
								</div>
								<div class="col-lg-2" style="margin :20px 0 10px 0;">
									Discount / Coupon :
								</div>
								<div class="col-lg-6" style="margin :20px 0 10px 0;">
									<div class="form-group">
										<select class="form-control" name="id_diskon" id="diskon">
											<option value="" disabled selected style="display: none;">-- Pilih Diskon --</option>
											<?php foreach ($diskon->result() as $disk) : ?>
												<option value="<?= $disk->id_diskon ?>"><?php echo $disk->nama_diskon ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-lg-12"></div>
								<div class="col-lg-12" style="background: #f40049; color: #fff; padding: 7px 0 7px 10px;">
									<b>GRAND TOTAL : <p style="float: right; color: #fff; margin: 0 0px 0 0;">Rp. <input type="text" class="" rows="3" name="grandtotal" id="txtgrand" style="float:right; color:#fff; margin-left: 3px;  width: 65px; border: 0px; background: #f40049;"></p></b>
								</div>
								<button data-toggle="tab" href="#metode_pembayaran" type="button" class="btn salmon stil4" style="float: left;margin-top: 25%;">Kembali</button>
								<button data-toggle="tab" href="#odontogram_after" type="button" class="btn salmon stil6" style="float: right;margin-top: 25%;">Selanjutnya</button>
							</div>
							<div id="odontogram_after" class="tab-pane fade">
								<div class="col-md-12">
									<h5 class="mb-20 weight-500" style="font-weight: bold">Odontogram After</h5><br>
								</div>
								<button data-toggle="tab" href="#konfirmasi_booking" type="button" class="btn salmon stil5" style="float: left;margin-top: 25%;">Kembali</button>
								<button type="submit" class="btn salmon" style="float: right;margin-top: 25%;">Kirim</button>
							</div>
							</form>
						</div>
					</div>

				</div>

			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

</div>
<!--/.main-->
<script>
	$(document).ready(function() {
		$('#layanan').change(function() {
			// let a = $(this).val();
			// console.log(a);
			pil_layanan();
		});
	});

	function pil_layanan() {
		var layanan = $('#layanan').val();
		var jumlah = $('#jumlah').val();
		var diskon = $('#diskon').val();
		$.ajax({
			url: "<?= base_url('doctor/show_price') ?>",
			data: {
				layanan: layanan
			},
			success: function(data) {
				// console.log(data);
				$('#txtlayanan').html(data);
			}
		})
		$.ajax({
			url: "<?= base_url('doctor/show_subtotal') ?>",
			data: {
				layanan: layanan,
				jumlah: jumlah
			},
			success: function(data) {
				// console.log(data);
				$('#txttotal').html(data);
				$('#txttot').val(data);
				$('#txtgrand').val(data);
			}
		})
		$.ajax({
			url: "<?= base_url('doctor/grandtotal') ?>",
			data: {
				layanan: layanan,
				jumlah: jumlah,
				diskon: diskon
			},
			success: function(data) {
				// console.log(data);
				$('#txtgrand').val(data);
			}
		});
	}

	$(document).ready(function() {
		$('#jumlah').change(function() {
			// let a = $(this).val();
			// console.log(a);
			subtotal();
		});
	});

	function subtotal() {
		var layanan = $('#layanan').val();
		var jumlah = $('#jumlah').val();
		var diskon = $('#diskon').val();
		$.ajax({
			url: "<?= base_url('doctor/show_subtotal') ?>",
			data: {
				layanan: layanan,
				jumlah: jumlah
			},
			success: function(data) {
				// console.log(data);
				$('#txttotal').html(data);
				$('#txttot').val(data);
				$('#txtgrand').val(data);
			}
		});
	}

	$(document).ready(function() {
		$('#diskon').change(function() {
			// let a = $(this).val();
			// console.log(a);
			grandtotal();
		});
	});

	function grandtotal() {
		var layanan = $('#layanan').val();
		var jumlah = $('#jumlah').val();
		var diskon = $('#diskon').val();
		$.ajax({
			url: "<?= base_url('doctor/grandtotal') ?>",
			data: {
				layanan: layanan,
				jumlah: jumlah,
				diskon: diskon
			},
			success: function(data) {
				// console.log(data);
				$('#txtgrand').val(data);
			}
		});
	}
</script>