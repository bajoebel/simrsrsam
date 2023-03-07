<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
<style>
    /*.modal-content {
        max-height: 600px;
    }*/
    @media only screen and (max-width: 1360px) {
        .modal-content {
            overflow-y: scroll;
            overflow-x: hidden;
            height: 600px;
            white-space: nowrap
        }
    }

    .modal-content {

        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 800px;
        white-space: nowrap
    }

    .control[readonly] {
        background: #3c8dbc;
    }

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete-input {
        border: none;
        font-size: 14px;
        border: 1px solid #DDD !important;
        /*z-index: 1511;*/
        position: relative;
    }

    .ui-menu .ui-menu-item a {
        font-size: 12px;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        width: 160px;
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }

    .ui-menu-item>a.ui-corner-all {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;
    }

    .ui-state-hover,
    .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #0088cc;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
    }
    .dataTables_filter{
        text-align:right;
    }
    .dataTables_paginate{
        text-align:right;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    
    <div class="row">
        <div class="col-md-12">
        <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><button class="btn btn-success" type="button" onclick="tambahJadwal()">Tambah Jadwal</button></h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="has-feedback">
                                <input type="hidden" id="start" name="start" value="1">
                                <input type="hidden" id="param" name="param" value="1">
                                <input type="text" class="form-control input-sm" id='q' name="q" onkeyup="getData(1)" placeholder="Cari Berita">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="pull-right">
                                <select name="limit" id="limit" class='form-control' onchange="getData(1)">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive no-padding">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Dokter RS</th>
                                    <th>Kode Dokter JKN</th>
                                    <th>Nama Dokter</th>
                                    <th>Poliklinik</th>
                                    <th>Rincian Jadwal</th>
                                    <th>Action</th>
                                </tr>    
                            </thead>
                            <tbody id="data">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" id="pagination"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<div id="modaljadwal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Jadwal Dokter Poliklinik <span id="poliklinik"></span></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                <form class="form-horizontal" method="POST" id="jadwalform" action="#">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Poliklinik:</label>
                        <div class="col-sm-10">
                        <select name="kodepolirs" id="kodepolirs" class="form-control select2" onchange="getDokter()" style="width: 100%;">
                            <option value="">Pilih Poliklinik</option>
                            <?php 
                            foreach ($ruang as $r ) {
                                ?>
                                <option value="<?= $r->idx ?>"><?= $r->ruang ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="kodepolijkn" id="kodepolijkn">
                        <input type="hidden" name="subspesialis" id="subspesialis">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Dokter:</label>
                        <div class="col-sm-10">
                            <!-- <?php print_r($dokter) ?> -->
                        <select name="kodedokterrs" id="kodedokterrs" class="form-control select2" onchange="getJadwalDokter()" style="width: 100%;">
                            <option value="">Pilih Dokter</option>
                            <?php 
                            foreach ($dokter as $d ) {
                                ?>
                                <option value="<?= $d->NRP ?>"><?= $d->pgwNama?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="kodedokterjkn" id="kodedokterjkn">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Senin:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="seninaktif" id="seninaktif" value="1" onclick="setaktif(1)"></span>
                            <input type="text" class="form-control" id="seninbuka" name="seninbuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="senintutup" name="senintutup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Selasa:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="selasaaktif" id="selasaaktif" value="2" onclick="setaktif(2)"></span>
                            <input type="text" class="form-control" id="selasabuka" name="selasabuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="selasatutup" name="selasatutup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Rabu:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="rabuaktif" id="rabuaktif" value="3" onclick="setaktif(3)"></span>
                            <input type="text" class="form-control" id="rabubuka" name="rabubuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="rabututup" name="rabututup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Kamis:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="kamisaktif" id="kamisaktif" value="4" onclick="setaktif(4)"></span>
                            <input type="text" class="form-control" id="kamisbuka" name="kamisbuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="kamistutup" name="kamistutup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Jumat:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="jumataktif" id="jumataktif" value="5" onclick="setaktif(5)"></span>
                            <input type="text" class="form-control" id="jumatbuka" name="jumatbuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="jumattutup" name="jumattutup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Sabtu:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="sabtuaktif" id="sabtuaktif" value="6" onclick="setaktif(6)"></span>
                            <input type="text" class="form-control" id="sabtubuka" name="sabtubuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="sabtututup" name="sabtututup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Minggu:</label>
                        <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" name="mingguaktif" id="mingguaktif" value="7" onclick="setaktif(7)"></span>
                            <input type="text" class="form-control" id="minggubuka" name="minggubuka" placeholder="Jam Buka" readonly>
                        </div>
                        
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="minggututup" name="minggututup" placeholder="Jam Buka" readonly>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div> -->
                </form> 
                </div>
                
            </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick="simpanJadwal()">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
        // getPoli();
        $('.select2').select2();
        // $('#example1').DataTable()
        
        // $('#example1').DataTable({
        //     'paging'      : true,
        //     'lengthChange': false,
        //     'searching'   : false,
        //     'ordering'    : true,
        //     'info'        : true,
        //     'autoWidth'   : false
        // })
    });
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
</script>