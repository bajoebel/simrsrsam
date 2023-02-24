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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="date" class="form-control input-sm" name="tgl" id="tgl" placeholder="Tanggal" onchange="cari_pasien(0)" value="2023-02-24">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-sm"> <span class="fa fa-calendar"></span></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="input-group input-group-sm">
                                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Masukkan Keyword"/>
                                <div class="input-group-btn">
                                    <button type="button" id="btnCari" class="btn btn-default" onclick="listBooking()"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="simple-table" class="table table-bordered table-hover" style='color:#000000;'>
                                <thead class="bg-blue">
                                    <tr>
                                    <th>No</th>
                                    <th>Kode Booking</th>
                                    <th>Nomr</th>
                                    <th>NIK</th>
                                    <th>No Kartu</th>
                                    <th>Nama Pasien</th>
                                    <th>Poli Tujuan</th>
                                    <th>Dokter</th>
                                    <th>Nomor Antrean</th>
                                    <th>Status Checkin</th>
                                    <th style="width: 150px;">#</th>
                                    </tr>
                                    
                                </thead>
                                <tbody id="data">

                                </tbody>
                                <tfoot >
                                    <tr>
                                        <td colspan="10" id="pagination"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <!-- <div class="row">
                        <div class="col-md-4">
                        <input type="text" id="kodebookingv2" name="kodebookingv2" class="form-control" placeholder="Masukkan Kode Booking"/>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan Alasan Batal"/>
                                <div class="input-group-btn">
                                    <button type="button" id="btnBatal" class="btn btn-danger" onclick="batalkanAntreanv2()"><i class="fa fa-remove"></i>Batalkan Booking</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    
    $(document).ready(function() {
        $('#example1').DataTable()
        // getDokter();
    });
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
</script>