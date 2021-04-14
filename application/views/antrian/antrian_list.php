<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('antrian/index') ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Antrian Pasien</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Antrian Pasien</h1>
        </div>
    </div><!--/.row-->    
    
	<div class="row">
        <div class="col-lg-12   ">
            <div id="toolbar" class="btn-group">
                <a href="<?php echo site_url('antrian/pilih');?>" type="button" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah 
                </a>
			</div>
            <table id="all_data_json" data-toggle="table"
                   data-url="<?php echo base_url('antrian/get_json');?>"
                   data-show-refresh="true" data-show-toggle="true"
                   data-show-columns="true" data-search="true"
                   data-select-item-name="toolbar1" data-pagination="true"
                   data-sort-name="no_antrian" data-sort-order="asc" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-field="no_antrian" data-align="right">No</th>
                        <th data-field="nama" data-sortable="true">Nama Pasien</th>
                        <th data-field="keluhan_utama" data-sortable="true">Keluhan</th>
                        <th data-field="no_antrian" data-formatter="confirm_hapus" data-align="center">Action</th>
					</tr>
                </thead>
            </table>


            <!--<div class="row">
                <div class="col-md-6">
                    <p>Total Data : </p>
                </div>
            </div>-->
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

<script>
    function confirm_hapus(value){
        return '<a href="<?php echo base_url();?>antrian/delete/'+value+'" class="btn btn-danger" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')" >Hapus</a>';
    }
</script>