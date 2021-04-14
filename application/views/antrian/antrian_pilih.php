<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Data Booking Pasien</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Data Booking Pasien</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="panel panel-default">
                    <div class="panel-heading">Form Pasien</div>
                    <div class="panel-body"> -->
            <!--    <div class="col-md-6">
                    <h2 style="margin-top:0px">Data_pasien List</h2> -->
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4" id="toolbar">
                    <a href="<?php echo site_url('data_pasien/create');?>" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registrasi Pasien
                </a>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                        <!--<form action="<?php echo site_url('data_pasien/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                        ?>
                                                            <a href="<?php echo site_url('data_pasien'); ?>" class="btn btn-default">Reset</a>
                        <?php
                    }
                    ?>
                                                <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                </div>
                        </form>-->
                </div>
            </div>
            <!--<form method="post">
                    <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                            </tr>
            <?php
            foreach ($data_pasien_data as $data_pasien) {
                ?>
                                <tr>
                                        <td width="80px"><?php echo ++$start ?></td>
                                        <input type='hidden' name='ID_pasien' id='ID_pasien' value='<?php echo $data_pasien->ID_pasien; ?>'>
                                        <td>
    <?php
    $text = $data_pasien->Nama;
    $newtext = wordwrap($text, 40, "<br />\n", true);
    echo $newtext;
    ?>
                                        </td>
                                        <td>
                <?php
                $text = $data_pasien->Alamat;
                $newtext = wordwrap($text, 40, "<br />\n", true);
                echo $newtext;
                ?>
                                        </td>
                                        <td style="text-align:center" width="200px">
                                                <a href="<?php echo site_url('antrian/create_action/' . $data_pasien->ID_pasien); ?>"> Antri</a>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Antri</button>
                                        </td>
                                </tr>
                <?php
            }
            ?>
                    </table>
            </form>
            <div class="row">
                    <div class="col-md-6">
                            <p>Total Record : <?php echo $total_rows ?></p>
                    </div>
            </div>-->

            <table data-toggle="table" data-url="<?php echo base_url('antrian/data_antrian_pilih'); ?>" 
                   data-striped="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" 
                   data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="Nama" 
                   data-sort-order="asc" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th data-formatter="runningFormatter" data-align="right">No.</th>
                        <th data-field="nama" data-sortable="true">Nama</th>
                        <th data-field="tanggal" data-sortable="true">Tanggal</th>
                        <th data-field="id_booking" data-formatter="proses" data-align="center"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<div class="modal fade" id="alertAntri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo site_url('antrian/create_action/'); ?>" method="post" id="formProsesAntri">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Keluhan utama</h4>
                </div>
                <div class="modal-body">
                    <label for="keluhan_utama">Keluhan Utama <?php echo form_error('keluhan_utama') ?></label>
                    <textarea class="form-control" rows="3" name="keluhan_utama" id="keluhan_utama" placeholder="..."></textarea>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <!--<a href="#" class="btn btn-primary" id="buttonConfirmAntri">Antri</a>-->
                    <button type="submit" class="btn btn-primary" id="buttonConfirmAntri">Antri</button>
                </div>
            </form>
        </div>
    </div>
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