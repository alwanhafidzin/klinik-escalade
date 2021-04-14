<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Data Pasien</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Data Pasien</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="panel panel-default">
                    <div class="panel-heading">Form Pasien</div>
                    <div class="panel-body"> -->
            <!-- 	<div class="col-md-6">
                    <h2 style="margin-top:0px">Data_pasien List</h2> -->
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                   
                </div>
            </div>

            <div id="toolbar11" ><a href="<?php echo base_url('data_pasien/create.html') ?>" class="btn btn-primary" >Tambah Pasien</a></div>

            <table id="all_data_json" data-toggle="table"
                   data-url="<?php echo base_url('data_pasien/get_data_pasien') ?>"
                   data-show-refresh="true" data-show-toggle="true"
                   data-show-columns="true" data-search="true"
                   data-select-item-name="toolbar1" data-pagination="true"
                   data-sort-name="no_antrian" data-sort-order="asc" data-toolbar="#toolbar11">
                <thead>
                    <tr>
                        <th data-formatter="numberFormatter" data-align="right">No</th>
                        <th data-field="Nama" data-sortable="true">Nama Pasien</th>
                        <th data-field="Alamat" data-sortable="true">Alamat</th>
                        <th data-field="ID_pasien" data-formatter="action" data-align="center">Action</th>
					</tr>
                </thead>
            </table>


        
            <!--<div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>

                </div>
            </div>-->
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

<script>
    function action(value, row, index) {
        return '<div class="btn-group" role="group" aria-label="..."><a type="button" href="<?php echo base_url('data_pasien/read/') ?>/'+value+'.html" class="btn btn-primary">Lihat</a>  <a type="button" href="<?php echo base_url('data_pasien/update/') ?>/'+value+'.html" class="btn btn-warning">Edit</a> </div>';
    }

</script>