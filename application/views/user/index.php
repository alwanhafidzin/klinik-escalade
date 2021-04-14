		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url('user')?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active"> Atur User</li>
				</ol>
			</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"> Atur User</h1>
				</div>
			</div><!--/.row-->    
					<div class="row">
						<div class="col-xs-12">
							<div class="modal-body">
								<table data-toggle="table" data-url="<?php echo base_url('user/get_json_user');?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>						        
						        <th data-field="username" data-sortable="true">Username</th>
						        <th data-field="username" data-formatter="actionUser">Action</th>
						    </tr>
						    </thead>
						</table>
								<!--</div>-->
								<!--</div>-->
								</br>
                            </div>
							</div>
						</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
<div class="modal fade" id="alertDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
        Apakah yakin ingin menghapus user?
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Batal</button>
        <a  href="#" id="buttonConfirmDelete" type="button" class="btn btn-danger">Lanjutkan</a>
      </div>
    </div>
	</div>
   
<script>
function actionUser(value){
                return '<a href="<?php echo base_url(); ?>user/detail_user/'+value+'" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>';
            }
</script>
