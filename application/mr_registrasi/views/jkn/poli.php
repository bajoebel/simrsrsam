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
                    <h3 class="box-title"><?= $contentTitle ?></h3>
                </div>

                <div class="box-body">
                    
                    <div class="table-responsive no-padding">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Poli</th>
                                    <th>Nama Poli</th>
                                    <th>Kode Sub Spesialis</th>
                                    <th>Nama Sub Spesialis</th>
                                    <th>Action</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <?php 
                                $no=0;
                                $table="";
                                foreach ($poli as $p ) {
                                    $no++;
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $p->kdpoli ?></td>
                                        <td><?= $p->nmpoli ?></td>
                                        <td><?= $p->kdsubspesialis ?></td>
                                        <td><?= $p->nmsubspesialis ?></td>
                                        <td><button class='btn btn-primary btn-sm' onclick="lihatJadwal('<?= $p->kdpoli ?>','<?= $p->kdsubspesialis ?>')"><span class='fa fa-search'></span> Lihat Jadwal</button></td>
                                    </tr> 
                                    
                                    <?php
                                }
                                ?>
                                
                                

                                <!-- <tr>
                                    <td colspan="6">Silahkan Enter No Kartu Dan Range Tanggal untuk mencari pasien</td>
                                </tr> -->
                            </tbody>
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
            <h4 class="modal-title">Jadwal Dokter Poliklini <span id="poliklinik"></span></h4>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#senin" onclick="getJadwal('2022-04-18',1)" >Senin</a></li>
                <li><a data-toggle="tab" href="#selasa" onclick="getJadwal('2022-04-19',2)">Selasa</a></li>
                <li><a data-toggle="tab" href="#rabu" onclick="getJadwal('2022-04-20',3)">Rabu</a></li>
                <li><a data-toggle="tab" href="#kamis" onclick="getJadwal('2022-04-21',4)">Kamis</a></li>
                <li><a data-toggle="tab" href="#jumat" onclick="getJadwal('2022-04-22',5)">Jumat</a></li>
                <li><a data-toggle="tab" href="#sabtu" onclick="getJadwal('2022-04-23',6)">Sabtu</a></li>
                <li><a data-toggle="tab" href="#minggu" onclick="getJadwal('2022-04-17',7)">Minggu</a></li>
                <li><a data-toggle="tab" href="#jadwal" onclick="editJadwal()">Jadwal</a></li>
            </ul>
            <div class="tab-content">
                <input type="hidden" name="kdpoli" id="kdpoli">
                <input type="hidden" name="kdsubspesialis" id="kdsubspesialis">
                <div id="senin" class="tab-pane fade in active">
                    <table class="table">
                        <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                        <tbody id="detailjadwal1"></tbody>
                    </table>
                </div>
                <div id="selasa" class="tab-pane fade">
                    <table class="table">
                        <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                        <tbody id="detailjadwal2"></tbody>
                    </table>
                </div>
                <div id="rabu" class="tab-pane fade">
                    <table class="table">
                        <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                        <tbody id="detailjadwal3"></tbody>
                    </table>
                </div>
                <div id="kamis" class="tab-pane fade">
                    <table class="table">
                    <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                    <tbody id="detailjadwal4"></tbody>
                    </table>
                </div>
                <div id="jumat" class="tab-pane fade">
                    <table class="table">
                    <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                    <tbody id="detailjadwal5"></tbody>
                    </table>
                </div>
                <div id="sabtu" class="tab-pane fade">
                    <table class="table">
                    <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                    <tbody id="detailjadwal6"></tbody>
                    </table>
                </div>
                <div id="minggu" class="tab-pane fade">
                    <table class="table">
                    <thead class="bg-blue"><tr><td>Nama Dokter</td><td>Jam</td><td>Quota</td><td>Libur</td></tr></thead>
                    <tbody id="detailjadwal7"></tbody>
                    </table>
                </div>
                <div id="jadwal" class="tab-pane fade">
                    <table class="table">
                        <thead class="bg-blue">
                            <tr>
                                <td>Ruang</td>
                                <td>Dokter</td>
                                <td>Jadwal</td>
                            </tr>
                        </thead>
                    </table>
                    <div id="listjadwal"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
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
        $('#example1').DataTable();
    });
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
</script>