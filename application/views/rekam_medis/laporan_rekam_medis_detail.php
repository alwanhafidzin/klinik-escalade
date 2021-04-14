	<style type="text/css">
		/* Style the Image Used to Trigger the Modal */
		#myImg {
		    border-radius: 5px;
		    cursor: pointer;
		    transition: 0.3s;
		}

		#myImg:hover {opacity: 0.7;}

		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 50px;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (Image) */
		.modal-content {
		    margin: auto;
		    display: block;
		    width: 50%;
		    max-width: 700px;
		}

		/* Caption of Modal Image (Image Text) - Same Width as the Image */
		#caption {
		    margin: auto;
		    display: block;
		    width: 80%;
		    max-width: 700px;
		    text-align: center;
		    color: #ccc;
		    padding: 10px 0;
		    height: 150px;
		}

		/* Add Animation - Zoom in the Modal */
		.modal-content, #caption { 
		    -webkit-animation-name: zoom;
		    -webkit-animation-duration: 0.6s;
		    animation-name: zoom;
		    animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
		    from {-webkit-transform:scale(0)} 
		    to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
		    from {transform:scale(0)} 
		    to {transform:scale(1)}
		}

		/* The Close Button */
		.close {
		    position: absolute;
		    top: 15px;
		    right: 35px;
		    color: #f1f1f1;
		    font-size: 40px;
		    font-weight: bold;
		    transition: 0.3s;
		}

		.close:hover,
		.close:focus {
		    color: #bbb;
		    text-decoration: none;
		    cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		    .modal-content {
		        width: 100%;
		    }
		}

	</style>


		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('antrian/index')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Laporan Rekam Medis Pasien</li>
				</ol>
			</div><!--/.row-->

			<div class="row"><div class="col-lg-12"><h1 class="page-header">Laporan Rekam Medis Pasien</h1></div></div><!--/.row-->
			
			<div class="row">
				<div class="col-xs-12">
					<h2><?php echo $nama;?></h2>
					<div class="modal-body">
								<form class="form-inline">
									<input type="date" class="form-control" id="awal" value="<?php echo $awal; ?>"/>
									s/d
									<input type="date" class="form-control" id="akhir" value="<?php echo $akhir; ?>"/>
									<button type="button" class="btn btn-default" id="filter">Filter</button>
								</form>
						<div id="tabel_filter">
						<table data-toggle="table" data-url="<?php echo base_url('rekam_medis/data_laporan_rekam_medis_detail/'.$id_pasien);?>" data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tanggal" data-sort-order="desc">
							<thead>
								<tr>
									<th data-formatter="runningFormatter" data-align="right">No.</th>
									<th data-field="tanggal"  data-formatter="waktu" data-sortable="true">Tanggal</th>
									<th data-field="keluhan_utama" data-sortable="true">Keluhan</th>
									<th data-field="diagnosis" data-sortable="true">Diagnosis</th>
									<th data-field="resep" data-sortable="true">Resep</th>
									<th data-field="foto" data-align="center" data-formatter="show_image"  >Foto</th>
									<th data-field="total_bayar" data-sortable="true">Harga</th>
									
								</tr>
							</thead>
						</table>
						</div>
					</div>
				</div>
			</div>
			
		</div><!-- /.row -->



				<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- The Close Button -->
		  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

		  <!-- Modal Content (The Image) -->
		  <img class="modal-content" id="img01">

		  <!-- Modal Caption (Image Text) -->
		  <div id="caption"></div>
		</div>

		<script>
			function runningFormatter(value, row, index) {
                return index+1;
            }
			function proses(value){
				return '<a href="#" onclick="prosesLihat('+value+')" class="btn btn-primary">Lihat</a>';
			}
			function prosesLihat(id){
                $("#formProsesAntri").attr("action", "<?php echo base_url(); ?>antrian/create_action/"+id);
                $('#alertAntri').modal('show');
			}

			function show_image(value){
				var ret="";
				if (value==null) {
					ret=value;
				}else{
					ret='<img id="myImg" onclick="modal_img(\'<?=base_url()?>camera/foto/'+value+'\')" src="<?=base_url()?>camera/foto/'+value+'" height="75px" >';
				}
				return ret;
			}

			function modal_img(foto){
				modal.style.display = "block";
			    modalImg.src = foto;
			    $("#sidebar-collapse").hide();
			   

			
			}


		</script>


<script>
$(document).ready(function(){
        $("#filter").click(function(){
            var awal   = $("#awal").val();
            var akhir  = $("#akhir").val();
            if (!awal){
                awal  = 0;
            }
            if (!akhir){
                akhir = 0;
            }
            console.log(awal+'/'+akhir);
            $("#tabel_filter").load("<?php echo base_url('rekam_medis/filter_rekam_medis');?>" + "/" + <?php echo $id_pasien;?> + "/" + awal + "/" + akhir);
            $("#tabel_filter_apotik").load("<?php echo base_url('laporan/filter_laporan_apotik');?>" + "/" + awal + "/" + akhir);
        });
        function tanggal(value){
				var d = new Date();
				return d;
			}
});
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    $("#sidebar-collapse").show();
}
</script>