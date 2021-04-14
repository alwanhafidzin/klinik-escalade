<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
	.input {
		margin-top: 50px;
	}

	.box {
		position: absolute;
		top: 20px;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	.box select {
		background-color: white;
		color: black;
		width: 150px;
		border: none;
		font-size: 16px;
		box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
		-webkit-appearance: button;
		appearance: button;
		outline: none;
	}

	.box::before {
		content: "\f13a";
		font-family: FontAwesome;
		position: absolute;
		background-color: #0563af;
		top: 0;
		right: 0;
		width: 15%;
		height: 100%;
		text-align: center;
		font-size: 18px;
		line-height: 38px;
		color: rgba(255, 255, 255);
		background-color: #F40049;
		pointer-events: none;
	}

	.box:hover::before {
		color: rgba(255, 255, 255, 0.6);
		background-color: #F40049;
	}

	.box select option {
		padding: 30px;
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
		width: 200px;
		border: none;
		font-size: 16px;
		box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
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
</style>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="row">
		<div class="col-lg-12">
		</div>
	</div>
	<!--/.row-->
	<br>


	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<font style="font-weight: bold; font-size: 15px; padding-left: 27px">Buat Janji Pemeriksaan <i class="fa fa-chevron-right" aria-hidden="true"></i> Buat Akun Keluarga</font><br><br>
				<form action="<?php echo base_url('owner/add_pasien/'); ?>" method="post">
					<div class="form-group">
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
								<div class="form-group box2">
									<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required">
										<option value="" disabled selected style="display: none;">Pilih Jenis Kelamin -</option>
										<option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan" id="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12" style="margin-bottom: 15px; margin-top: 20px;"><b>Kontak yang dapat dihubungi</b></div><br>

							<div class="col-lg-2">
								Email
							</div>
							<div class="col-lg-5" style="margin-right: 30%">
								<div class="form-group">
									<input type="email" class="form-control" rows="3" name="email" id="email" required="required">
								</div>
							</div>
							<div class="col-lg-2">
								No. HP
							</div>
							<div class="col-lg-2">
								<div class="form-group box">
									<select class="form-control" name="kode_negara" id="kode_negara" required="required">
										<option value="" disabled selected style="display: none;">Kode Negara --</option>
										<option value="62">Indonesia (+62)</option>
										<option value="31">India (+31)</option>
									</select>
								</div>

							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required">
								</div>
							</div>
							<div class="col-lg-3" style="margin-left: 178px;">
								<div class="form-group">
									<button class="btn btn-anim" style="height: 50px; width: 200px; background-color: #f40049; color: white; border-radius: 15px; margin-top:10px"><span class="btn-text">Kirim Kode Verifikasi </span></button>
								</div>
							</div>
							<div class="col-lg-4" style="margin-top:5px; margin-right:50px">
								Kami telah mengirimkan kode verifikasi melalui SMS dan aplikasi WhatsApp kamu. Mohon dapat ditunggu dalam waktu maksimal 1 menit kedepan
							</div><br>
						</div>
						<div>
							<div class="col-lg-2" style="margin-left:18px; margin-top:20px">
								Kode Verifikasi
							</div>
							<div class="col-lg-4" style="margin-left:-8px; margin-top:20px;margin-right:42%">
								<div class="form-group">
									<input type="text" class="form-control" rows="3" name="kode_verifikasi" id="kode_verifikasi" required="required">
								</div>
							</div>
							<div class="col-lg-2" style="margin-left:-460px; margin-top:27px; color:Lime">
								Kode telah terverifikasi
							</div>
						</div>
						<div>
							<div class="col-lg-3" style="margin-left:192px;">
								<a onclick="kirimVer()" id="kirim-verif" style="color:red" href="#">Klik Disini</a>
								Apabila Anda belum menerima kode verifikasi
							</div>
						</div>
						<div class="col-lg-12" style="margin-bottom: 20px; margin-top: 20px; margin-left: 80px">Dengan menekan tombol dibawah, maka pastikan pasien Anda telah menyetujui <a style="color:red" href="#"> Perjanjian User</a>,<a style="color:red" href="#">Kebijakan Privasi</a> dan <a style="color:red" href="#"> Kebijakan Cookie</a>
						</div>
						<div class="form-group">
							<button class="btn salmon col-sm-4" style="float: center; height: 50px; width: 30%; background-color: #f40049; color: white; border-radius: 15px; margin-left:35%" type="submit">Buat Akun Keluarga</button>
						</div>
					</div>
				</form>
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