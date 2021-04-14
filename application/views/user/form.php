<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('user')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Update User</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Update User</h1>
				</div>
			</div><!--/.row-->    
					<div class="row">
						<div class="col-xs-12">
							<div class="modal-body">
								<form action="<?php echo base_url('user/update');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="form-group">
									<label for="username">Username</label><?php echo form_error('username');?>
									<input type="text" class="form-control" name="username" <?php if(isset($username)) echo "readonly";?> value= "<?php if(isset($username)){echo $username;} ?>" placeholder = "Username" >
								</div>
								
									<label for="password">Password Baru:</label><?php echo form_error('password');?>
									<input type="password" class="form-control" name="password" value= "" placeholder = "Password">
								</div>
								<div class="input-group">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
								<!--</div>-->
								<!--</div>-->
								</br>
                            </div>
							</div>
						</div>
			</div><!-- /.col-->
		</div><!-- /.row -->