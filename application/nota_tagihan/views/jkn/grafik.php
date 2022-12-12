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
    .kotak {
        margin-bottom:10px;
        display:grid;
        clear:both;
        border:1px solid #ccc;border-collapse:collapse;
    }
    .grafik{
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 5px 5px #888888;
    }
    .progress {
            background-color: #e4c465;
            animation: progressBar 1s ease-in-out;
            animation-fill-mode:both; 
        }

        @keyframes progressBar {
        0% { width: 0; }
        100% { width: 100%; }
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
                    <h3 class="box-title">Waktu Tunggu</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Harian</a></li>
                            <li><a data-toggle="tab" href="#menu1" onclick="perbulan()">Bulanan</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="server" id="server" class="form-control" onchange="pertanggal()">
                                            <option value="rs">Rumah Sakit</option>
                                            <option value="server">BPJS Kesehatan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="tgl" id="tgl" value="<?= date('Y-m-d') ?>" onchange="pertanggal()">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        
                                    </div>
                                        
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class='grafik' id="pertanggal"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                            <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="server" id="server1" class="form-control" onchange="perbulan()">
                                            <option value="rs">Rumah Sakit</option>
                                            <option value="server">BPJS Kesehatan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <?php 
                                        $bulan=date('m');
                                        $tahun=date('Y');
                                        ?>
                                        <select name="bulan" id="bulan" class="form-control" onchange="perbulan()">
                                            <option value="01" <?php if($bulan=='01') echo "selected"; ?>>Januari</option>
                                            <option value="02" <?php if($bulan=='02') echo "selected"; ?>>Februari</option>
                                            <option value="03" <?php if($bulan=='03') echo "selected"; ?>>Maret</option>
                                            <option value="04" <?php if($bulan=='04') echo "selected"; ?>>April</option>
                                            <option value="05" <?php if($bulan=='05') echo "selected"; ?>>Mei</option>
                                            <option value="06" <?php if($bulan=='06') echo "selected"; ?>>Juni</option>
                                            <option value="07" <?php if($bulan=='07') echo "selected"; ?>>Juli</option>
                                            <option value="08" <?php if($bulan=='08') echo "selected"; ?>>Agustus</option>
                                            <option value="09" <?php if($bulan=='09') echo "selected"; ?>>September</option>
                                            <option value="10" <?php if($bulan=='10') echo "selected"; ?>>Oktober</option>
                                            <option value="11" <?php if($bulan=='11') echo "selected"; ?>>November</option>
                                            <option value="12" <?php if($bulan=='12') echo "selected"; ?>>Desember</option>
                                        </select>
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <select name="tahun" id="tahun" class="form-control" onchange="perbulan()">
                                            <?php 
                                            for ($i=2020; $i <= $tahun; $i++) { 
                                                ?>
                                                <option value="<?= $i ?>" <?php if($i==$tahun) echo "selected"; ?>><?= $i ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="grafik" id="perbulan"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
</script>