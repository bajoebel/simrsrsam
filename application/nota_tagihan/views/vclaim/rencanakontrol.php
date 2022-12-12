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

    .modal-lg {
        min-width: 1200px;
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

<section class="content container-fluid">
    
    <div class="row">
        <div class="col-md-12">
        <div class="box box-success">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-10"><h3 class="box-title"><?= $contentTitle ?></h3></div>
                        <div class="col-md-2" style="text-align:right">
                            <button class="btn btn-primary" onclick="addKontrol()">Buat Surat Kontrol</button>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <!-- <div class="row">
                        <div class="col-md-3">
                            <label for="noKartu">Dari</label>
                            <input type="text" name="tglMulai" id="tglMulai" class="form-control input-sm datepicker">
                        </div>
                        <div class="col-md-3">
                            <label for="noKartu">Sampai</label>
                            <input type="text" name="tglSelesai" id="tglSelesai" class="form-control input-sm datepicker">
                        </div>
                        
                        <div class="col-md-3">
                            <label for="noKartu">No Kartu</label>
                            <div class="input-group">
                            <input type="text" name="noKartu" id="noKartu" class="form-control input-sm">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm" onclick="cariSep()">Search</button>
                                </span>
                            </div>
                            
                        </div>
                    </div> -->
                    <div class="row">
                        
                        <div class="col-md-3">
                            <label for="noKartu">Parameter</label>
                            <select name="parameter" id="parameter" class="form-control">
                                <option value="1" selected >Tanggal Entry</option>
                                <option value="2">Tanggal Rencana Kontrol</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <label for="noKartu">Dari</label>
                        <input type="text" name="tgl" id="tgl" class="form-control input-sm datepicker" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="noKartu">Tanggal</label>
                            <div class="input-group">
                            <input type="text" name="tgl1" id="tgl1" class="form-control input-sm datepicker" value="<?= date('Y-m-d') ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm"  id="btn" onclick="riwayatKontrol()"><span class="fa fa-search" id="icon"></span> Search</button>
                                </span>
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="noKartu">No Surat Kontrol / SKDP</label>
                            <div class="input-group">
                            <input type="text" name="editSurat" id="editSurat" class="form-control input-sm" value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm"  id="btn1" onclick="editSurat()"><span class="fa fa-pencil" id="icon1"> Edit Surat</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive no-padding">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="input-group input-group-sm">
                                <input type="text" id="txtKeyword" class="form-control" placeholder="Enter nama pasien">
                                <div class="input-group-btn">
                                    <button type="button" id="btnKeywordSearch" onclick="cariList()" class="btn btn-danger">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>No Kartu</th>
                                    <th>No Surat Kontrol</th>
                                    <th>Jenis Pelayanan</th>
                                    <th>Jenis Kontrol</th>
                                    <th>Tgl Rencana kontrol</th>
                                    <th>Tgl Terbit</th>
                                    <th>Sep Asal</th>
                                    <th>Poli Asal</th>
                                    <th>Poli Tujuan</th>
                                    <th>Tgl SEP</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama</th>
                                    <th>Terbit SEP</th>
                                    <th style="width:200px">Action</th>
                                </tr>    
                            </thead>
                            <tbody id="getdata">
                                <tr>
                                    <td colspan="11">Silahkan Enter No Kartu Dan Range Tanggal untuk mencari pasien</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Surat Kontrol</h4>
            </div>
            <div class="modal-body">

                <form id="form1" role="form" class="form-horizontal" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <input type="hidden" id="u_jnsKontrol" name="jnsKontrol" >
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Surat Kontrol <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control ui-autocomplete-input" name="noSuratKontrol" id="u_noSuratKontrol" readonly="">
                                        
                                    <span class="text-error"></span>
                                </div>
                            </div>
                            <div class="form-group" id='sepkontrol'>
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="nomor">No Sep <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control ui-autocomplete-input" name="noSep" id="u_noSep" readonly="">
                                    <span class="text-error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal Rencana Kontrol <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control datepicker" name="tglRencanaKontrol" id="u_tglRencanaKontrol" onchange="u_caripoliKontrol()">
                                    <span class="text-error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Poli Kontrol <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="poliKontrol" id="u_poliKontrol" class="form-control" onchange="u_dokterKontrol()"></select>    
                                <span class="text-error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="kodeDokter" id="u_kodeDokter" class="form-control"></select>    
                                <span class="text-error"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-danger" onclick="updateSuratKontrol()">Update Surat Kontrol</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="formKontrol" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buat Surat Kontrol</h4>
            </div>
            <div class="modal-body">

                <form id="form1" role="form" class="form-horizontal" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <input type="hidden" id="jnsKontrol" name="jnsKontrol" >
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Surat Kontrol <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control ui-autocomplete-input" name="noSuratKontrol" id="noSuratKontrol" readonly="">
                                        
                                    <span class="text-error"></span>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Sep <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control ui-autocomplete-input" name="noSep" id="noSep" readonly="">
                                    <span class="text-error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal Rencana Kontrol <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control datepicker" name="tglRencanaKontrol" id="tglRencanaKontrol" onchange="caripoliKontrol()">
                                    <span class="text-error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Poli Kontrol <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="poliKontrol" id="poliKontrol" class="form-control" onchange="dokterKontrol()"></select>    
                                <span class="text-error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="kodeDokter" id="kodeDokter" class="form-control"></select>    
                                <span class="text-error"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-danger" onclick="updateSuratKontrol()">Update Surat Kontrol</button>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="form-list-kontrol" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Surat Kontrol</h3>
            </div>
            <div class="modal-body">
                <div class="step" id="jns_kontrol">
                    <div class="row">
                        <form action="#"  class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Jenis Kontrol:</label>
                                <div class="col-sm-6">
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="1">SPRI (Surat Perintah Rawat Inap)</option>
                                        <option value="2">Surat Kontrol</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">No Kartu:</label>
                                <div class="col-sm-6">
                                    <input type="text" name="no_bpjs" id="no_bpjs" class="form-control input-sm" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">&nbsp;</label>
                                <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" onclick="cekKontrol()"> <span class="fa fa-search"></span> Next</button>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                    
                </div>
                <div class='step' id="riwayat" style="display:none;">
                    <div class="row">
                        
                        <div class="col-md-3">
                            <label for="Dari">Dari</label>
                            <input type="text" name="dari" id="dari" class="form-control datepicker" value="<?= date('Y-m')."-01" ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="Dari">Sampai</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="sampai" id="sampai" class="form-control datepicker" value="<?= date('Y-m-d') ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" onclick="riwayatKunjungan()"> <span class="fa fa-search"></span> Cari SEP</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tgl SEP</td>
                                        <td>No Rujukan</td>
                                        <td>No SEP</td>
                                        <td>Poli</td>
                                        <td>PPK Pelayan</td>
                                        <td>Diagnosa</td>
                                    </tr>
                                </thead>
                                <tbody id="datariwayat"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="step" id="formsuratkontrol" style="display:none;">
                    <form action="#"  class="form-horizontal" id="formkontrol">
                        <input type="hidden" name="jnsKontrol" id="jnsKontrol" value="2">
                        <input type="hidden" name="ktglRujukan" id="ktglRujukan" value="">
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Jenis Kontrol:</label>
                            <div class="col-sm-6">
                            <input type="radio" name="jnsKontrol" id="kontrol" value="2" checked> Surat Kontrol
                            <input type="radio" name="jnsKontrol" id="spri" value="1"> SPRI (Surat Perintah Rawat Inap)
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">No SEP:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="noSEP" name='noSEP' placeholder="Masukkan No SEP" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Tanggal Rencana Kontrol:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control datepicker" id="tglRencanaKontrol" placeholder="Masukkan rencana kontrol" onkeyup="caripoliKontrol()" onchange="caripoliKontrol()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Poliklinik:</label>
                            <div class="col-sm-6">
                            <select name="poliKontrol" id="poliKontrol" class="form-control" onchange="dokterKontrol()" style="width:100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Dokter:</label>
                            <div class="col-sm-6">
                            <select name="kodeDokter" id="kodeDokter" class="form-control" style="width:100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" class="btn btn-primary" onclick='buatSuratKontrol()'>Buat Surat Kontrol</button>
                            <button type="button" class="btn btn-danger" onclick="resetFormKontrol()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    var Base64 = {
        _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
        encode: function(e) {
            var t = "";
            var n, r, i, s, o, u, a;
            var f = 0;
            e = Base64._utf8_encode(e);
            while (f < e.length) {
                n = e.charCodeAt(f++);
                r = e.charCodeAt(f++);
                i = e.charCodeAt(f++);
                s = n >> 2;
                o = (n & 3) << 4 | r >> 4;
                u = (r & 15) << 2 | i >> 6;
                a = i & 63;
                if (isNaN(r)) {
                    u = a = 64
                } else if (isNaN(i)) {
                    a = 64
                }
                t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
            }
            return t
        },
        decode: function(e) {
            var t = "";
            var n, r, i;
            var s, o, u, a;
            var f = 0;
            e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            while (f < e.length) {
                s = this._keyStr.indexOf(e.charAt(f++));
                o = this._keyStr.indexOf(e.charAt(f++));
                u = this._keyStr.indexOf(e.charAt(f++));
                a = this._keyStr.indexOf(e.charAt(f++));
                n = s << 2 | o >> 4;
                r = (o & 15) << 4 | u >> 2;
                i = (u & 3) << 6 | a;
                t = t + String.fromCharCode(n);
                if (u != 64) {
                    t = t + String.fromCharCode(r)
                }
                if (a != 64) {
                    t = t + String.fromCharCode(i)
                }
            }
            t = Base64._utf8_decode(t);
            return t
        },
        _utf8_encode: function(e) {
            e = e.replace(/\r\n/g, "\n");
            var t = "";
            for (var n = 0; n < e.length; n++) {
                var r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r)
                } else if (r > 127 && r < 2048) {
                    t += String.fromCharCode(r >> 6 | 192);
                    t += String.fromCharCode(r & 63 | 128)
                } else {
                    t += String.fromCharCode(r >> 12 | 224);
                    t += String.fromCharCode(r >> 6 & 63 | 128);
                    t += String.fromCharCode(r & 63 | 128)
                }
            }
            return t
        },
        _utf8_decode: function(e) {
            var t = "";
            var n = 0;
            var r = c1 = c2 = 0;
            while (n < e.length) {
                r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r);
                    n++
                } else if (r > 191 && r < 224) {
                    c2 = e.charCodeAt(n + 1);
                    t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                    n += 2
                } else {
                    c2 = e.charCodeAt(n + 1);
                    c3 = e.charCodeAt(n + 2);
                    t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                    n += 3
                }
            }
            return t
        }
    }

    $(document).ready(function() {
        let searching = []
        $('#txtKeyword').keyup(function (ev) {
            console.clear();
            var txtKeyword = $(this).val().toLowerCase();
            let j = 0;
            var searching = [];
            let obj = listItem.filter((o, k) => {
                if (o.nama.toLowerCase().includes(txtKeyword)) {
                    searching[j++] = {
                        noSuratKontrol: o.noSuratKontrol,
                        jnsPelayanan: o.jnsPelayanan,
                        jnsKontrol: o.jnsKontrol,
                        namaJnsKontrol: o.namaJnsKontrol,
                        tglRencanaKontrol: o.tglRencanaKontrol,
                        tglTerbitKontrol: o.tglTerbitKontrol,
                        noSepAsalKontrol: o.noSepAsalKontrol,
                        poliAsal: o.poliAsal,
                        namaPoliAsal: o.namaPoliAsal,
                        poliTujuan: o.poliTujuan,
                        namaPoliTujuan: o.namaPoliTujuan,
                        tglSEP: o.tglSEP,
                        kodeDokter: o.kodeDokter,
                        namaDokter: o.namaDokter,
                        noKartu: o.noKartu,
                        nama: o.nama,
                        terbitSEP: o.terbitSEP
                    };
                }
            })
            var histori = searching;
            var jmlData = searching.length;
            var table = "";
            for (var i = 0; i < jmlData; i++) {
                console.log(histori[i].nama);
                let terbitSEP = (histori[i].terbitSEP=='Sudah') ? '<span class="btn btn-success btn-xs">Sudah</span>' : '<span class="btn btn-danger btn-xs">Belum</span>'; 
                table += 
                    '<tr>' +
                    '<td>' + histori[i].noKartu + '</td>' +
                    '<td>' + histori[i].noSuratKontrol + '</td>' +
                    '<td>' + histori[i].jnsPelayanan + '</td>' +
                    '<td>' + histori[i].namaJnsKontrol + '</td>' +
                    '<td>' + histori[i].tglRencanaKontrol + '</td>' +
                    '<td>' + histori[i].tglTerbitKontrol + '</td>' +
                    '<td>' + histori[i].noSepAsalKontrol + '</td>' +
                    '<td>' + histori[i].namaPoliAsal + '</td>' +
                    '<td>' + histori[i].namaPoliTujuan + '</td>' +
                    '<td>' + histori[i].tglSEP + '</td>' +
                    '<td>' + histori[i].namaDokter + '</td>' +
                    '<td>' + histori[i].nama + '</td>' +
                    '<td>' + terbitSEP + '</td>' +
                    '<td>' + 
                    '<a href="'+ url_call_back + '/vclaim/rencanakontrol/cetak/'+histori[i].noSuratKontrol+'" class="btn btn-default btn-xs" target="_blank"> <span class="fa fa-print"></span> Cetak</a>' + 
                    '<button class="btn btn-warning btn-xs" type="button" onclick="editSurat(\''+histori[i].noSuratKontrol+'\',\''+histori[i].noKartu+'\')"> <span class="fa fa-pencil"></span> Edit</button>' + 
                    '<button class="btn btn-danger btn-xs" type="button" onclick="hapusSurat(\''+histori[i].noSuratKontrol+'\')"> <span class="fa fa-remove"></span> Hapus</button>' + 
                    '</td>' +
                    '</tr>';
            }
            console.log(histori);
            $('tbody#getdata').html(table);
        });
    });
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
</script>