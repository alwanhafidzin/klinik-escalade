<style type="text/css">
	font{
		font-weight: bold; 
		font-size: 20px;
	}
	.periksa{
		margin-left: 15px; 
		text-align: center;
		color: white; 
		background-color: #F40049; 
		border-radius: 5px;
	}
	.daftar1{
		text-align:center; 
		padding:9px 6px 9px 6px; 
		font-size: 13px;
		margin-left: 15px; 
		color: #000; 
		background-color: #FFFF00; 
		border-radius: 5px;
	}
	.daftar2{
		text-align:center; 
		padding:9px 6px 9px 6px; 
		font-size: 13px;
		margin-left: 15px; 
		color: #fff; 
		background-color: #00b050; 
		border-radius: 5px;
	}
	thead{
		text-align: center;
	}
	@media only screen and (max-width: 1024px) {
		.daftar2{
			margin-left: 8px;
			font-size: 12px;
			padding:  0 10px 0 10px;
		}
		.daftar1{
			margin-left: 8px;
			font-size: 12px;
			padding:  0 10px 0 10px;
		}
		.periksa{
			margin-left: 15px;
			text-align: center;	
			padding-right: 23px;
			font-size: 12px;
		}
		font{
			font-size: 18px;
		}
		table{
			font-size: 13px;
		}
	}
	@media only screen and (max-width: 768px) {
		.daftar2{
			margin-left: 0px;
			font-size: 12px;
			padding:  0 10px 0 10px;
		}
		.daftar1{
			margin-left: 0px;
			font-size: 12px;
			padding:  0 10px 0 10px;
		}
		.periksa{
			margin-left: 0px;
			text-align: center;	
			padding-right: 10px;
		}
	}
	@media only screen and (max-width: 425px) {
		.col-lg-12{
			width: 90%;
			top: -44px;
			margin-left: 33px;
		}
		font{
			font-size: 17px;
		}
		table{
			font-size: 12px;
		}
	}
	@media only screen and (max-width: 375px) {
		.col-lg-12{
			width: 92%;
			top: -44px;
			margin-left: 33px;
		}
	}
	@media only screen and (max-width: 320px) {
		.daftar1 ,.daftar2{
			font-size: 10px;
			padding: 2px 0 2px 0;
		}
		font{
			font-size: 13px;
		}
	}
	.dis-cur{
		cursor: no-drop;
	}
</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 20px;">     
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<font>Jadwal Pemeriksaan Hari Ini</font><br><br>
						<table id="all_data_json" data-toggle="table" data-url="<?php echo base_url('Resepsionis/data_booking');?>" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
							<thead >
								<tr>
									<th data-sortable="true" data-field="" data-formatter="runningFormatter" data-align="center" >No.</th>
									<th data-sortable="true" data-align="center">Jam Periksa</th>
									<th data-sortable="true" data-align="center">Nama</th>
									<th data-sortable="true" data-align="center">Tanggal Lahir</th>
									<th data-sortable="true" data-align="center">No Rekam Medis</th>
									<th data-sortable="true" data-align="center">Status</th>
									<th data-align="center">Activity</th>
								</tr>
							</thead>


							<tbody>
								<?php $no = 1;?>
								<?php foreach ($medis->result() as $result): ?>
									<?php $tgl_lahir = date('d F Y', strtotime($result->tanggal_lahir));?>
									<?php if ($result->status == 0 || $result->status == 1) {?>
										<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $result->jam_rencana?></td>
										<td><?php echo $result->nama_depan?> <?php echo $result->nama_belakang ?></td>
										<td><?php echo $tgl_lahir ?></td>
										<td><?php echo $result->id_rekam_medis?></td>
										<td>
											<?php if ($result->status == 0) {?>
												<div class="col-md-10 daftar1" data-toggle="modal"> Menunggu Pendaftaran</div>
											<?php }
											elseif ($result->status == 1) {?>
											 	<div class="col-md-10 daftar2" data-toggle="modal"> Sudah Terdaftar</div>
											 <?php } ?>

										</td>
										<td>
											<?php if ($result->status == 0) {?>
												<a href="#" type="button" class="btn col-md-10" data-toggle="modal" style="margin-left: 20px; color: white; background-color: #F40049; border-radius: 5px; cursor: no-drop;"> Mulai Pemeriksaan</a>
											<?php }
											else{?>
												<a href="<?= site_url('doctor/get_periksa/'.$result->id_pasien.'/'.$result->id_rekam_medis) ?>" type="button" class="btn col-md-10" data-toggle="modal" style="margin-left: 20px; color: white; background-color: #F40049; border-radius: 5px; cursor: pointer;"> Mulai Pemeriksaan</a>
												<?php } ?>
											<!-- <a href="<?= site_url('doctor/get_periksa/'.$result->id_pasien.'/'.$result->id_rekam_medis) ?>" type="button" class="btn col-md-10 periksa" data-toggle="modal"> Mulai Pemeriksaan</a> -->
										</td>
									<?php } ?>
									</tr>
								<?php endforeach; ?> 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>

	<script>
		function runningFormatter(value, row, index) {
			return index + 1;
		}
		function proses(value) {
			return '<a href="#" onclick="prosesAntri(' + value + ')" class="btn btn-warning">Pilih</a>';
		}
		function prosesAntri(id) {
			$("#formProsesAntri").attr("action", "<?php echo base_url(); ?>antrian/create_action/" + id);
			$('#alertAntri').modal('show');
		}
	</script>

	<script type="text/javascript">
// 			$('#closemodal').click(function() {
//     $('#ModalTolak').modal('hide');
// });
$(".remove").click(function(){
	var id = $(this).parents("tr").attr("id");

	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				url: '/item-list/'+id,
				type: 'DELETE',
				error: function() {
					alert('Something is wrong');
				},
				success: function(data) {
					$("#"+id).remove();
					swal("Deleted!", "Your imaginary file has been deleted.", "success");
				}
			});
		} else {
			swal("Cancelled", "Your imaginary file is safe :)", "error");
		}
	});

        // $('#ModalTolak').modal('hide');
       });

      </script>
      	<!-- <script>
			var tm = new Date();
			var timst = tm.toLocaleTimeString();
			$.ajax({
			    url : "<?= base_url('doctor/get_periksa') ?>",
			    data : {jam_mulai:timst},
			    success:function(data){
			    	// console.log(data);
			      $('#txtgrand').html(data);
			    }
			  });
		</script> -->
