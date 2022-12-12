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
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Tambah Data PRB</a></li>
                    <li><a data-toggle="tab" href="#menu1" onclick="cariPRB()">List Data PRB (Pasien Rujuk Balik)</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <br>
                        <form class="form-horizontal" id="form" action="#">
                            <fieldset>
                                <div class="col-md-6">
                                <legend>Data SEP</legend>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">No Sep:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" name="noSep" id="noSep" class="form-control input-sm" value="">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="cariSep()">Search</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">No Kartu:</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="noKartu" id="noKartu" class="form-control input-sm" readonly value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Nama Pasien:</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="namaPasien" id="namaPasien" class="form-control input-sm" readonly value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Alamat:</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="alamat" id="alamat" class="form-control input-sm" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email :</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="email" id="email" class="form-control input-sm" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Program PRB :</label>
                                        <div class="col-sm-10">
                                            <select name="programPRB" id="programPRB" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">DPJP :</label>
                                        <div class="col-sm-10">
                                            <select name="kodeDPJP" id="kodeDPJP" class="form-control"></select>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Keterangan :</label>
                                        <div class="col-sm-10">
                                            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Saran :</label>
                                        <div class="col-sm-10">
                                            <textarea name="saran" id="saran" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <legend>Data Obat</legend>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Cari Obat:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" name="keywordObat" id="keywordObat" class="form-control input-sm" value="">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            </div>
                                            <div class="text-error" id='err_obat' style="color:#c40808;"></div>
                                        </div>
                                    </div>
                                    <div id="listobat">
                                        <input type="hidden" name="jmldata" id="jmldata" value="0">
                                        <table class="table">
                                            <thead class='bg-green'>
                                                <tr>
                                                    <td rowspan="2">Kode</td>
                                                    <td rowspan="2">Nama Obat</td>
                                                    <td colspan="2" style="text-align:center">Signa</td>
                                                    <td rowspan="2" style="width:100px">Jml Obat</td>
                                                    <td rowspan="2" style="width:100px">Hapus</td>
                                                </tr>
                                                <tr>
                                                    <td style="width:100px">Signa 1</td>
                                                    <td style="width:100px" >Signa 2</td>
                                                </tr>
                                            </thead>
                                            <tbody id="dataobat"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <button type="button" class="btn btn-success" onclick="simpanPRB()">Simpan Data PRB</button>
                                    </div>
                                </div>
                            </div>
                                    
                        </form>
                            
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="noKartu">Dari</label>
                                <input type="text" name="tglMulai" id="tglMulai" class="form-control input-sm datepicker" value="<?= date('Y-m')."-01" ?>">
                            </div>
                            
                            <div class="col-md-3">
                                <label for="noKartu">Sampai</label>
                                <div class="input-group">
                                <input type="text" name="tglSelesai" id="tglSelesai" class="form-control input-sm datepicker" value="<?= date('Y-m-d') ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-sm" onclick="cariPRB()">Search</button>
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 text-right">
                                <label for="">&nbsp;<br></label><br>
                                <button class="btn btn-primary" onclick="addPrb()"><span class="fa fa-plus"></span> Tambah Pasien PRB</button>
                            </div> -->
                        </div>
                        <hr>
                        <div class="table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan='2'>No SEP</th>
                                        <th rowspan='2'>No SRB</th>
                                        <th colspan='5' style="text-align:center">Peserta</th>
                                        <th rowspan='2'>Program PRB</th>
                                        <th rowspan='2'>Keterangan</th>
                                        <th rowspan='2'>Saran</th>
                                        <th rowspan='2'>Tgl SRB</th>
                                        <th rowspan='2'>DPJP</th>
                                    </tr>
                                    <tr>
                                        <th>No Kartu</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                    </tr>
                                </thead>
                                <tbody id="getdata">
                                    <tr>
                                        <td colspan="12">Silahkan Enter Range Tanggal untuk mencari pasien</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

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
    });
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
</script>