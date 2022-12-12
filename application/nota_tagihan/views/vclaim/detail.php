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
    .nav-justified active{
        background:#390;
        color:#fff;
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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<!-- <?= print_r($data) ?> -->
<section class="content container-fluid">
    <div class="row">
        <!-- <div> -->
            <div class="col-md-3 col-xs-12">
                <div class="box box-widget widget-user-2" style="border-radius:15px 15px">
                    <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 15px">
                        <h4 id="lblnama"><?= $data->peserta->nama ?></h4>
                        <p id="lblnoka"><?= $data->peserta->noKartu ?></p>
                    </div>

                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a title="Profile Peserta" href="#tab_1" data-toggle="tab"><span class="fa fa-user"></span></a></li>
                                <!-- <li><a href="#tab_2" title="COB" data-toggle="tab"><span class="fa fa-building"></span></a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table">
                                        <tr>
                                            <th colspan=2><b>Info Peserta</b></th>
                                        </tr>
                                        
                                        <tr>
                                            <td>NIK</td>
                                            <td>: <?= $data->peserta->noKartu ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Lahir</td>
                                            <td>: <?= longDate($data->peserta->tglLahir) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jns Kelamin</td>
                                            <td>: <?= $data->peserta->kelamin ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Peserta</td>
                                            <td>: <?= $data->peserta->jnsPeserta ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan=2><b>Info Layanan</b></th>
                                        </tr>
                                        <tr>
                                            <td>No SEP</td>
                                            <td>: <?= $data->noSep ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl SEP</td>
                                            <td>: <?= $data->tglSep ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jns Pelayanan</td>
                                            <td>: <?= $data->jnsPelayanan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas Rawat</td>
                                            <td>: <?= $data->kelasRawat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Diagnosa</td>
                                            <td>: <?= $data->diagnosa ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Rujukan</td>
                                            <td>: <?= $data->noRujukan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Poliklinik</td>
                                            <td>: <?= $data->poli ?></td>
                                        </tr>
                                        <tr>
                                            <td>DPJP</td>
                                            <td>: <?= $data->dpjp->nmDPJP ?></td>
                                        </tr>
                                        <?php 
                                        if($data->kontrol->noSurat!="" || $data->kontrol->noSurat!=null){
                                            ?>
                                        <tr>
                                            <td>No Surat</td>
                                            <td>: <?= $data->kontrol->noSurat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Dokter</td>
                                            <td>: <?= $data->kontrol->nmDokter ?></td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td colspan='2'>
                                                <button class="btn btn-danger btn-block" type="button" onclick="batalkanSep('<?= $data->noSep; ?>')">Batalkan SEP</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <span class="fa fa-sort-numeric-asc"></span> <a title="NIK" class="pull-right-container" id="lblnik">1306121407830001</a>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-credit-card"></span> <a title="No.Kartu Bapel JKK" class="pull-right-container" id="lblnokartubapel"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-calendar"></span> <a title="Tanggal Lahir" class="pull-right-container" id="lbltgllahir">1983-07-14</a>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-user"></span> <a title="PISA" class="pull-right-container" id="lblpisa">1</a>
                                        </li>

                                        <li class="list-group-item">
                                            <span class="fa fa-hospital-o"></span> <a title="Hak Kelas Rawat" class="pull-right-container" id="lblhakkelas">Kelas 3</a>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-stethoscope"></span> <a title="Faskes Tingkat 1" class="pull-right-container" id="lblfktp">null-null</a>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-calendar"></span> <a title="TMT dan TAT Peserta" class="pull-right-container" id="lbltmt_tat">2009-02-01-2041-07-14</a>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-calendar"></span> <a title="Jenis Peserta" class="pull-right-container" id="lblpeserta">PNS DAERAH</a>

                                        </li>

                                    </ul> -->
                                </div>
                                <!-- /.tab-pane -->
                                <!-- <div class="tab-pane" id="tab_2">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <span class="fa fa-sort-numeric-asc"></span> <a title="No. Asuransi" class="pull-right-container" id="lblnoasu"></a>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-windows"></span> <a title="Nama Asuransi" class="pull-right-container" id="lblnmasu"></a>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-calendar"></span> <a title="TMT dan TAT Asuransi" class="pull-right-container" id="lbltmt_tatasu">null s/d null</a>

                                        </li>
                                        <li class="list-group-item">
                                            <span class="fa fa-bank"></span> <a title="Nama Badan Usaha" class="pull-right-container" id="lblnamabu"></a>

                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <div id="divriwayatKK" style="display: none;">
                            <button type="button" id="btnRiwayatKK" class="btn btn-danger btn-block"><span class="fa fa-th-list"></span> Pasien Memiliki Riwayat KLL/KK/PAK <br><i>(klik lihat data)</i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xs-12">
                
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#home" >Update Tgl Pulang</a></li>
                    <li><a data-toggle="tab" href="#menu1" onclick="editSep('<?= $data->noSep ?>')" >Edit SEP</a></li>
                    <li><a data-toggle="tab" href="#menu2" onclick="sepInternal('<?= $data->noSep ?>')">SEP Internal</a></li>
                    <!-- <li><a data-toggle="tab" href="#menu3">Buat Surat Kontrol</a></li> -->
                    <li><a data-toggle="tab" href="#menu4">Buat Rujukan</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="box">
                            <div class="box-body">
                                <?php 
                                // echo $data->jnsPelayanan;
                                if($data->jnsPelayanan=="Rawat Inap"){
                                    $row=$this->vclaim_model->getSepLokal($data->noSep);
                                    // print_r($row);exit;
                                    if(!empty($row)){
                                        $statusPulang=$row->statusPulang;
                                        $noSuratMeninggal=$row->noSuratMeninggal;
                                        $tglMeninggal=$row->tglMeninggal;
                                        $tglPulang=$row->tglPulang;
                                        $noLPManual=$row->noLPManual;
                                    }else{
                                        $statusPulang='';
                                        $noSuratMeninggal='';
                                        $tglMeninggal='';
                                        $tglPulang='';
                                        $noLPManual='';
                                    }
                                    ?>
                                <div>
                                    <label style="color:red;font-size:small">* Wajib Diisi</label>
                                </div>
                                <form class="form-horizontal" id="updatetglpulang" style="font-size:12px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Sep <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control ui-autocomplete-input" name="noSep" id="u-noSep" value="<?= $data->noSep ?>" readonly>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status Pulang <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="statusPulang" id="u-statusPulang" class="form-control" onchange="pilihStatusPulang()">
                                                        <option value="">Pilih Status Pulang</option>
                                                        <option value="1" <?php if($statusPulang==1) echo "selected"; ?>>Atas Persetujuan Dokter</option>
                                                        <option value="3" <?php if($statusPulang==3) echo "selected"; ?>>Atas Permintaan Sendiri</option>
                                                        <option value="4" <?php if($statusPulang==4) echo "selected"; ?>>Meninggal</option>
                                                        <option value="5" <?php if($statusPulang==5) echo "selected"; ?>>Lain - Lain</option>
                                                    </select>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                            <div id="meninggal" style="display:none">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Surat Meninggal <label style="color:red;font-size:small">*</label></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" name="noSuratMeninggal" id="u-noSuratMeninggal" class="form-control" value="<?= $noSuratMeninggal ?>">
                                                        <span class="text-error"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tgl Meninggal <label style="color:red;font-size:small">*</label></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" name="tglMeninggal" id="u-tglMeninggal" class="form-control datepicker" value="<?= $tglMeninggal ?>" readonly>
                                                        <span class="text-error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tgl Pulang <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control datepicker" name="tglPulang" id="u-tglPulang" value="<?= $tglPulang?>" readonly>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                            <?php 
                                            if($data->nmstatusKecelakaan!="Bukan Kecelakaan"){
                                                ?>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Lap Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" class="form-control" name="noLPManual" id="u-noLPManual" value="<?= $noLPManual ?>">
                                                        <span class="text-error"></span>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">&nbsp;</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <button type="button" style="margin-left:10px;" id="u-btnSimpan" class="btn btn-success pull-right" onclick="updateTglPulang()"><i class="fa fa-save"></i> Update Tgl Pulang</button>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                                <?php }else{?>
                                    <div class="alert alert-warning">
                                    <strong>Warning!</strong> Tidak dapat update tgl pulang dikarenakan, jenis pelayanan SEP <?= $data->noSep ?> adalah rawat jalan
                                    </div>
                                <?php } ?>
                            </div>
                            
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="box">
                            <form class="form-horizontal" id="theform" style="font-size:12px">
                                <div class="row">
                                    
                                    <div class="col-md-12 col-xs-12">
                                        <!-- <input type="hidden" name="idx" id="e-idx" value="<?= $idx ?>"> -->
                                        <input type="hidden" name="noKartu" id="e-noKartu" value="">
                                        
                                        <input type="hidden" name="ppkPelayanan" id="e-ppkPelayanan" value="0306R001">
                                        <input type="hidden" name="jnsPelayanan" id="e-jnsPelayanan" value="2">
                                        <!-- Baru -->
                                        <input type="hidden" name="klsRawatHak" id="e-klsRawatHak" value="">
                                        <!-- <input type="hidden" name="klsRawatNaik" id="e-klsRawatNaik" value="">
                                        <input type="hidden" name="pembiayaan" id="e-pembiayaan" value="">
                                        <input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value=""> -->
                                        <!--input type="hidden" name="noMR" id="noMR" value=""-->
                                        <input type="hidden" name="asalRujukan" id="e-asalRujukan" value="">
                                        <input type="hidden" name="tglRujukan" id="e-tglRujukan" value="">
                                        <input type="hidden" name="noRujukan" id="e-noRujukan" value="">
                                        <input type="hidden" name="ppkRujukan" id="e-ppkRujukan" value="">


                                        <div class="box-body">
                                            <div>
                                                <label style="color:red;font-size:small">* Wajib Diisi</label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Sep <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control ui-autocomplete-input" name="noSep" id="e-noSep" value="<?= $data->noSep ?>" readonly>
                                                    
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group" id="divPoli">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <label><input type="checkbox" id="e-eksekutif" value="1"> Eksekutif</label>
                                                        </span>
                                                        <input type="text" class="form-control ui-autocomplete-input" id="e-txtnmpoli" maxlength="10" placeholder="ketik kode atau nama Spesialis/Subspesialis min 3 karakter">
                                                        <input type="hidden" class="form-control tujuan" id="e-tujuan" name='tujuan' value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter Yang Menangani <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <!--input type="text" class="form-control ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                                    <input type="hidden" id="kodeDokter" value=""-->
                                                    <select name="dpjpLayan" id="e-dpjpLayan" class="form-control dpjpLayan" style="width: 100%;"></select>
                                                    <span class="text-error"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. MR <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="e-noMR" name='noMR' placeholder="ketik nomor MR" maxlength="10">
                                                        <span class="input-group-addon">
                                                            <label><input type="checkbox" id="e-cob" name="cob" value='1'> Peserta COB</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group" id="divkelasrawat" style="display: none;">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Rawat</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select class="form-control" id="e-cbKelas">
                                                        <option value="3">Kelas 3</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group divKelasRawat" id="divkelasrawat">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Hak Kelas</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    
                                                    <div class="input-group">
                                                        <!-- <input type="hidden" name="klsRawat" id="e-klsRawatHak" class="form-control" value=""> -->
                                                        <input type="text" name="klsRawatKet" id="e-klsRawatKet" class="form-control" readonly value="">
                                                        <span class="input-group-addon">
                                                            <label><input type="checkbox" id="e-naikKelas" name="naikKelas" value="1" onclick="e_naik()"> Naik Kelas</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divKelasRawat" id="e-divnaikkelas" style="display:none">
                                                <input type="hidden" name="klsRawatNaik" id="e-klsRawatNaik" value="">
                                                <input type="hidden" name="pembiayaan" id="e-pembiayaan" value="">
                                                <input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" id="e-txtnmdiagnosa" maxlength="10" placeholder="ketik kode atau nama diagnosa min 3 karakter">
                                                    <label id="lblDxSpesialistik" style="color: red; display: none;"></label>
                                                    <input type="hidden" name="diagAwal" id="e-diagAwal" value="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" id="e-noTelp" placeholder="ketik nomor telepon yang dapat dihubungi" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="15">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <textarea class="form-control" id="e-catatan" rows="2" placeholder="ketik catatan apabila ada"></textarea>
                                                </div>
                                            </div>
                                            <!--  katarak-->
                                            <div class="form-group" id="e-divkatarak">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label"> </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="checkbox" id="e-chkkatarak" value="1"> Katarak (Centang Katarak <i class="fa fa-check"></i>, Jika Peserta Tersebut Mendapatkan Surat Perintah Operasi katarak)

                                                </div>
                                            </div>

                                            <!--  lakalantas-->
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select class="form-control " id="e-lakaLantas" onchange="e_lakalantas()">
                                                        <option value="-">-- Silahkan Pilih --</option>
                                                        <option value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja" selected>Bukan Kecelakaan</option>
                                                        <option value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                                        <option value="2" title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                                        <option value="3" title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div id="divJaminanHistori" class="text-muted well well-sm no-shadow col-md-12 col-sm-12 col-xs-12" style="display: none;">
                                                <input type="hidden" id="e-txtkasuslaka" value="0">
                                                <input type="hidden" id="e-txtnosepjaminanhistori">
                                                <input type="hidden" id="e-txtnosepjaminanhistori2">
                                                <input type="hidden" id="e-txtkasuskejadian2">
                                                <input type="hidden" id="e-txtstatusdijamin">
                                                <p style="margin-top: 10px;" id="pketerangan"></p>
                                            </div>
                                            <div id="e-divJaminan" class="text-muted well well-sm no-shadow" style="display: none;">
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Penjamin</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="penjamin" id="e-penjamin" style="width:100%">
                                                            <option value="1">Jasa raharja PT</option>
                                                            <option value="2">BPJS Ketenagakerjaan</option>
                                                            <option value="3">TASPEN PT</option>
                                                            <option value="4">ASABRI PT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal Kejadian</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control datepicker" id="e-txtTglKejadian" placeholder="yyyy-MM-dd" maxlength="10">
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Suplesi</label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <label><input type="checkbox" id="e-suplesi" name="suplesi" value="1" onclick="e_cekSuplesi()"></label>
                                                            </span>
                                                            <input type="text" class="form-control" id="e-noSepSuplesi" name="noSepSuplesi" readonly placeholder="ketik nomor SEP Suplesi">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Lokasi Kejadian</label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">

                                                        <select class="form-control" id="e-cbprovinsi" name="cbprovinsi" onchange="getKabupaten('e-cbkabupaten','e-cbprovinsi')">
                                                            <option value="">-- Silahkan Pilih Propinsi --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <select class="form-control" id="e-cbkabupaten" onchange="getKecamatan('e-cbkecamatan','e-cbkabupaten')"></select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <select class="form-control" id="e-cbkecamatan"></select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Keterangan Kejadian</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <textarea class="form-control" id="e-txtketkejadian" rows="2" placeholder="ketik keterangan kejadian"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end lakalantas-->

                                        </div>
                                        <div class="box-footer">
                                            <div id="divSimpan" style="display: block;">
                                                <button type="button" style="margin-left:10px;" id="e-btnSimpan" class="btn btn-success pull-right" onclick="updateSEP()"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                            <button type="button" id="e-btnBatal" class="btn btn-danger pull-right">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="box">
                            <table class="table">
                                <tr>
                                    <td>No Sep</td>
                                    <td>Sep Referensi</td>
                                    <td>No Surat</td>
                                    <td>Tgl Rujuk Internal</td>
                                    <td>Poli Asal</td>
                                    <td>Tujuan Rujuk</td>
                                    <td>Tgl SEP</td>
                                    <td>Diagnosa</td>
                                </tr>
                                <tbody id="datarujukinteral"></tbody>
                            </table>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div class="box">
                            Surat Kontrol
                        </div>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <div class="box">
                        <?php 
                            if(empty($rujukanonline)){
                                ?>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="#">
                                            <input type="hidden" name="id_daftar" id="id_daftar" value="">
                                            <input type="hidden" name="reg_unit" id="reg_unit" value="">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">No SEP:</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="r-noSep" name="r-noSep" placeholder="No SEP" value="<?= $data->noSep ?>" <?php if(!empty($data->noSep)) echo "readonly" ?>>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Tgl Rujukan:</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control datepicker" id="r-tglRujukan" name="r-tglRujukan" value="<?= $data->tglSep ?>" placeholder="Masukkan Tgl Rujukan" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Tgl Rencana Kunjungan:</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control datepicker" id="r-tglRencanaKunjungan" name="r-tglRencanaKunjungan" placeholder="Masukkan Tgl Rencana Kunjungan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Tipe Rujukan:</label>
                                                <div class="col-sm-10">
                                                    <select name="r-tipeRujukan" id="r-tipeRujukan" class="form-control" onchange="pilihTipeRujukan()">
                                                        <option value="0">Penuh</option>
                                                        <option value="1">Partial</option>
                                                        <option value="2">Balik (PRB)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Faskes:</label>
                                                <div class="col-sm-10">
                                                    <select name="r-faskes" id="r-faskes" class="form-control" >
                                                        <option value="1">Faskes Tingkat 1</option>
                                                        <option value="2" selected>Faskes Tingkat 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">PPK Dirujuk:</label>
                                                
                                                <input type="hidden" id="ppkDirujuk" name="ppkDirujuk"><div class="col-sm-10">
                                                <input type="text" class="form-control" id="r-ppkDirujuk" name="r-ppkDirujuk" placeholder="Masukkan PPK Dirujuk">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Jns Pelayanan:</label>
                                                <div class="col-sm-10">
                                                <input type="radio" name="jnsPelayanan" id="rj" value="2">R. Jalan
                                                <input type="radio" name="jnsPelayanan" id="gd" value="1">R. Inap
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Catatan:</label>
                                                <div class="col-sm-10">
                                                <textarea name="r-catatan" id="r-catatan" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Diagnosa Rujukan:</label>
                                                <div class="col-sm-10">
                                                <input type="hidden" class="form-control" id="diagRujukan" name="diagRujukan">
                                                <input type="text" class="form-control" id="r-diagRujukan" name="r-diagRujukan" placeholder="Masukkan Diagnosa">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group inputPoli">
                                                <label class="control-label col-sm-2" for="pwd">Poli Rujukan:</label>
                                                <div class="col-sm-10">
                                                <select name="r-poliRujukan" id="r-poliRujukan" class="form-control">
                                                    <option value="">Pilih Poli</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" class="btn btn-primary" onclick="createRujukan()">Buat Rujukan</button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                                
                                
                                <?php
                            }else{
                                ?>
                                <!-- <input type="hidden" name="r-ppkDirujuk" id="r-ppkDirujuk">
                                <input type="hidden" name="r-diagRujukan" id="r-diagRujukan">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 150px">No Registrasi RS</th>
                                            <th style="font-size: 20px"><?php echo $rujukanonline->id_daftar ?></th>
                                        </tr>
                                        
                                        <tr>
                                            <th>No Registrasi Unit</th>
                                            <th style="font-size: 20px"><?php echo $rujukanonline->reg_unit ?></th>
                                        </tr>
                                        <tr>
                                            <th>No Rujukan</th>
                                            <th style="font-size: 20px"><?php echo $rujukanonline->noRujukan ?></th>
                                        </tr>
                                        <tr>
                                            <th>RS Tujuan</th>
                                            <th><?php echo $rujukanonline->namatujuanRujukan ?></th>
                                        </tr>

                                        <tr>
                                            <th>Poliklinik Tujuan</th>
                                            <th><?= $rujukanonline->namapoliTujuan ?></th>
                                        </tr>
                                        <tr>
                                            <th>Diagnosa</th>
                                            <th><?php echo $rujukanonline->diagnosanama ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jenis Layanan</th>
                                            <th><?php if($rujukanonline->jnsPelayanan==2) echo "R. Jalan"; else echo "R.Inap"; ?></th>
                                        </tr>
                                        </tr>
                                    </table> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <?php print_r($rujukanonline) ?> -->
                                            <br>
                                            <form class="form-horizontal" action="#">
                                                <input type="hidden" name="id_daftar" id="id_daftar" value="<?= $rujukanonline->id_daftar ?>">
                                                <input type="hidden" name="reg_unit" id="reg_unit" value="<?= $rujukanonline->reg_unit ?>">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email">No Rujukan:</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="r-noRujukan" name="r-noRujukan" placeholder="No SEP" value="<?= $rujukanonline->noRujukan ?>" <?php if(!empty($data->noSep)) echo "readonly" ?>>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Tgl Rujukan:</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control datepicker" id="r-tglRujukan" name="r-tglRujukan" value="<?= $rujukanonline->tglRujukan ?>" placeholder="Masukkan Tgl Rujukan" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Tgl Rencana Kunjungan:</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control datepicker" id="r-tglRencanaKunjungan" name="r-tglRencanaKunjungan" value="<?= $rujukanonline->tglRencanaKunjungan ?>" placeholder="Masukkan Tgl Rencana Kunjungan">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Tipe Rujukan:</label>
                                                    <div class="col-sm-10">
                                                        <select name="r-tipeRujukan" id="r-tipeRujukan" class="form-control" onchange="pilihTipeRujukan()">
                                                            <option value="0" <?php if($rujukanonline->tipeRujukan==0) echo "selected"; ?>>Penuh</option>
                                                            <option value="1" <?php if($rujukanonline->tipeRujukan==1) echo "selected"; ?>>Partial</option>
                                                            <option value="2" <?php if($rujukanonline->tipeRujukan==2) echo "selected"; ?>>Balik (PRB)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Faskes:</label>
                                                    <div class="col-sm-10">
                                                        <select name="r-faskes" id="r-faskes" class="form-control" >
                                                            <option value="1">Faskes Tingkat 1</option>
                                                            <option value="2" selected>Faskes Tingkat 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">PPK Dirujuk:</label>
                                                    
                                                    <input type="hidden" id="ppkDirujuk" name="ppkDirujuk" value="<?= $rujukanonline->ppkDirujuk ?>" ><div class="col-sm-10">
                                                    <input type="text" class="form-control" id="r-ppkDirujuk" name="r-ppkDirujuk" value="<?= $rujukanonline->namatujuanRujukan ?>" placeholder="Masukkan PPK Dirujuk">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Jns Pelayanan:</label>
                                                    <div class="col-sm-10">
                                                    <input type="radio" name="jnsPelayanan" id="rj" value="2" <?php if($rujukanonline->jnsPelayanan==2) echo "checked" ?>>R. Jalan
                                                    <input type="radio" name="jnsPelayanan" id="gd" value="1"  <?php if($rujukanonline->jnsPelayanan==1) echo "checked" ?>>R. Inap
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Catatan:</label>
                                                    <div class="col-sm-10">
                                                    <textarea name="r-catatan" id="r-catatan" cols="30" rows="5" class="form-control"><?= $rujukanonline->catatan ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="pwd">Diagnosa Rujukan:</label>
                                                    <div class="col-sm-10">
                                                    <input type="hidden" class="form-control" id="diagRujukan" name="diagRujukan" value="<?= $rujukanonline->diagRujukan ?>">
                                                    <input type="text" class="form-control" id="r-diagRujukan" name="r-diagRujukan" placeholder="Masukkan Diagnosa" value="<?= $rujukanonline->diagnosanama ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group inputPoli">
                                                    <label class="control-label col-sm-2" for="pwd">Poli Rujukan:</label>
                                                    <div class="col-sm-10">
                                                    <select name="r-poliRujukan" id="r-poliRujukan" class="form-control">
                                                        <option value="<?= $rujukanonline->kodepoliTujuan ?>"><?= $rujukanonline->namapoliTujuan ?></option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        
                                                        <button type="button" class="btn btn-primary" onclick="updateRujukan()">Update Rujukan</button>
                                                        <button class="btn btn-danger" type="button" onclick="hapusRujukan()">Hapus Rujukan</button>
                                                        <a href="<?= base_url() ."mr_registrasi.php/registrasi/rujukan/".$rujukanonline->noRujukan ?>" target="_blank" class="btn btn-warning"><span class="fa fa-print"></span> Cetak Rujukan</a>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
           
            </div>
        <!-- </div> -->
    </div>
</div>