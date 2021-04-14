<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/kode_tel/build/css/intlTelInput.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/kode_tel/build/css/demo.css"> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
	.input {
		margin-top: 50px;
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
					<font style="font-weight: bold; font-size: 15px; padding-left: 27px">Buat Janji Pemeriksaan <i class="fa fa-chevron-right" aria-hidden="true"></i> Buat Akun Keluarga</font><br><br>
					<!-- <form action="<?php echo base_url('klinik/add_pasien/'); ?>" method="post"> -->
						<div class="form-group">
							<form action="<?php echo base_url('klinik/send_email/'); ?>" method="post">
								<div class="col-md-12">
								<div class="col-lg-12" style="margin-bottom: 15px"><b>Informasi Umum</b></div><br>
								<div class="col-lg-2">
									Nama Depan
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<input type="text" class="form-control" rows="3" name="nama_depan" id="nama_depan" required="required">
									</div>
								</div><br>
								<div class="col-lg-2">
									Nama Belakang
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<input type="text" class="form-control" rows="3" name="nama_belakang" id="nama_belakang" required="required">
									</div>
								</div>

								<div class="col-lg-2">
									Tanggal lahir
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" required="required">
									</div>
								</div>
								<div class="col-lg-2">
									Jenis kelamin
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required">
											<option value="" disabled selected style="display: none;">-- Pilih Jenis Kelamin --</option>
											<option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan" id="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12" style="margin-bottom: 15px; margin-top: 20px;"><b>Kontak yang dapat dihubungi</b></div><br>

								<div class="col-lg-2">
									Email
								</div>
								<div class="col-lg-4" style="margin-right: 50%">
									<div class="form-group">
										<input type="email" class="form-control" rows="3" name="email" id="email" required="required">
									</div>
								</div>

								<!-- <div class="col-lg-2"></div>
								<div class="col-lg-4"></div> -->

								<div class="col-lg-2">
									No. HP
								</div>
								<div class="col-lg-6">
									<!-- <div class="form-group">
										<input id="mobile-number" type="tel" placeholder=""> 
									</div> -->
									<div class="form-group">
										<input type="tel" class="form-control" id="phone" name="no_hp" placeholder="" required="required" style="width: 305px;">
										<!-- <select class="form-control" name="kode_negara" id="kode_negara" required="required">
											<option value="" disabled selected style="display: none;">Kode Negara --</option>
											<option value="Laki-Laki" id="Laki-Laki">Indonesia (+62)</option>
											<option value="Perempuan" id="Perempuan">India (+31)</option>
										</select> -->
									</div>

								</div>
								<!-- <div class="col-lg-3">
									<div class="form-group">
										<input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required">
									</div>
								</div> -->
								<div class="col-lg-3" style="margin-left: 178px;">
									<div class="form-group">
										<!-- <a href="<?php echo base_url().'Klinik/send_email'?>" class="btn btn-anim" style="height: 50px; width: 200px; background-color: #f40049; color: white; border-radius: 15px; margin-top:10px"><span class="btn-text">Kirim Kode Verifikasi </span></a> -->
										<input type="submit" class="btn btn-anim" name="kirim" style="height: 50px; width: 200px; background-color: #f40049; color: white; border-radius: 15px; margin-top:10px" value="Kirim Kode Verifikasi"></input>
									</div>
								</div>
								<div class="col-lg-4" style="margin-top:5px; margin-right:50px">
									Kami telah mengirimkan kode verifikasi melalui SMS dan aplikasi WhatsApp kamu. Mohon dapat ditunggu dalam waktu maksimal 1 menit kedepan
								</div><br>
								</div>
							</form>						
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
<!--/.main-->
<script>
	function kirimVer() {
		swal("Terkirim!", "Kode Verifikasi Pasien Anda Telah Berhasil Dikirimkan Kembali", "success");
	}
</script>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php echo base_url()?>assets/kode_tel/build/js/intlTelInput.js"></script>
<script>
    $("#mobile-number").intlTelInput();
</script> -->


<style>
	.swal-text {
		background-color: #FEFAE3;
		padding: 17px;
		border: 1px solid black;
		display: block;
		margin: 22px;
		text-align: center;
		color: #61534e;
	}

	.swal-button {
		padding: 7px 19px;
		border-radius: 1px;
		background-color: #f40049;
		font-size: 12px;
		border: 2px solid black;
	}
</style>