	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Data Layanan</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Layanan</h1>
            </div>
        </div><!--/.row-->

       

        <div id="toolbar" class="btn-group">
                <a href="<?=base_url('layanan/create.html')?>" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Layanan
                </a>
            </div>

        <table id="all_data_json" data-toggle="table"
                   data-url="<?=base_url()?>layanan/get_json_layanan"
                   data-show-refresh="true" data-show-toggle="true"
                   data-show-columns="true" data-search="true"
                   data-select-item-name="toolbar1" data-pagination="true"
                   data-sort-name="nama" data-sort-order="asc" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-field="no_antrian" data-align="right">No</th>
                        <th data-field="Layanan" data-sortable="true">Layanan</th>
                        <th data-field="Harga"   data-formatter="rupiah" data-align="right" >Harga</th>
                   
                        <th data-field="id_layanan" data-formatter="action_layanan" data-align="center">Action</th>
                    </tr>
                </thead>
        </table>

       <!--  <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Layanan</th>
        		<th>Harga</th>
        		<th>Action</th>
            </tr>
			<?php
				foreach ($layanan_data as $layanan)
				{
					?>
					<tr>
						<td width="80px"><?php echo ++$start ?></td>
						<td><?php echo $layanan->Layanan ?></td>
						<td><?php echo $layanan->Harga ?></td>
						<td style="text-align:center" width="200px">
							<?php 
								echo anchor(site_url('layanan/read/'.$layanan->id_layanan),'Read'); 
								echo ' | '; 
								echo anchor(site_url('layanan/update/'.$layanan->id_layanan),'Update'); 
								echo ' | '; 
								echo anchor(site_url('layanan/delete/'.$layanan->id_layanan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
							?>
						</td>
					</tr>
					<?php
				}
            ?>
        </table> -->
     <!--    <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->
        
    </div><!--/.main-->

<script>
    function action_layanan(value) {
        var url='<?=base_url('layanan/') ?>';
        return '<div class="btn-group" role="group" aria-label="..."><a type="button" href="'+url+'/read/'+value+'" class="btn btn-warning">Lihat</a>  <a href="'+url+'/update/'+value+'" type="button" class="btn btn-primary">Edit</a></div>'
    }
</script>