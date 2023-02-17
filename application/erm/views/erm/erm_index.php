<style>
    .jkn {
        display: none;
    }

    .adarujukan {
        display: none;
    }

    .kontrolulang {
        display: none;
    }

    .faskesperujuk {
        display: none;
    }

    .jp {
        display: none;
    }

    div#pagination b {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    div#pagination a {
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }

    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .kotak {
        padding: 10px;
        width: 100%;
        border: 1px #ccc solid;
        border-collapse: collapse;

    }

    .text-center {
        text-align: center;
    }

    .font60 {
        font-size: 120pt;
    }

    .font10 {
        font-size: 10pt;
    }

    .font11 {
        font-size: 11pt;
    }

    .font12 {
        font-size: 12pt;
    }

    .font13 {
        font-size: 13pt;
    }

    .font14 {
        font-size: 14pt;
    }

    .font20 {
        font-size: 20pt;
    }

    .top10 {
        margin-top: 10px;
    }

    .top20 {
        margin-top: 20px;
    }

    .panel {
        border-radius: 0px;
    }

    .panel-success {
        border-color: #1ABC9C;
    }

    .panel-success .panel-heading {
        background-color: #1ABC9C;
        color: #fff;
    }

    body {
        background: #F1F3FA;
    }

    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 0px 0;
        background: #fff;
        border: 1px solid #367fa9;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 35%;
        height: 35%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 0px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        /* padding: 20px; */
        background: #fff;
        min-height: 460px;
        /* border:1px solid #5b9bd1; */
    }

    .batas {
        margin-left: -5px;
        margin-right: -10px;
        height: 30px;
        width: 103%;
        background: #367fa9;
    }

    .text-error {
        color: #dd4b39;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getPoliByID($ruangID) ?></h1>
</section>
<?php if (!empty($ruang)) {
    if ($ruang->grid == 1) $jns_layanan = 'RJ';
    elseif ($ruang->grid == 2) $jns_layanan = 'RI';
    elseif ($ruang->grid == 3) $jns_layanan = 'PJ';
    else $jns_layanan = 'GD';

    $grLokasi = $this->session->userdata('grlokasi');
?>
    <input type="hidden" name="jns_layanan" id="jns_layanan" value="<?= $jns_layanan ?>">
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Silahkan cari pasien yang melakukan tindakan / layanan di <?php echo getPoliByID($ruangID) ?>.
            Pasien yang tampil secara default adalah pasien yang terdaftar pada hari ini.
            <br />
            Untuk mencari pasien yang terdaftar pada hari lainnya,
            silahkan masukan No Registrasi RS / No Registrasi Unit <?php echo getPoliByID($ruangID) ?> / No MR Pasien
            <br />
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="ruang_id" id="ruang_id" value="<?= $this->session->userdata('kdlokasi'); ?>">
                <input type="hidden" name="nama_ruang" id="nama_ruang" value="<?= getRuangByID($this->session->userdata('kdlokasi')); ?>">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php if($grLokasi==1 or $grLokasi==2 or $grLokasi==3) {?>
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
                            <?php } ?>
                            <?php if($grLokasi==3) {?>
                            <li><a href="#tab_2" data-toggle="tab">List Permintaan</a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <?php if($grLokasi==1 or $grLokasi==2 or $grLokasi==3) {?>
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="">
                                    <?php if ($ruang->grid == 2) { ?>
                                        <div class="col-md-11">
                                            <div class="input-group input-group-sm">
                                                <input type="hidden" id="start" name="start" value="1">
                                                <input type="text" name="q" id="q" class="form-control pull-right" value="" placeholder="Search" onkeyup="getPasienSaatini(1)">
                                                <input type="hidden" value="param">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="limit" id="limit" class="form-control input-sm" onchange="getPasienSaatini(1)">
                                                <option value="10">10</option>
                                                <option value="20" selected>20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    <?php } else { ?>
                                        <form id="form1" onsubmit="return false" method="POST">
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-2 col-xs-12 control-label text-right">Periode</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <span class="input-group-btn">
                                                        <input type="text" class="form-control tanggal" name="tglAwal" id="tglAwal" value="<?= date('Y-m-d') ?>" onkeyup="getPasienSaatini(1)" placeholder="____-__-__" onchange="getPasienSaatini(1)">
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <input disabled="" type="text" class="form-control" value="s/d" style="text-align: center;border: none;">
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <input type="text" class="form-control tanggal" name="tglAkhir" value="<?= date('Y-m-d') ?>" id="tglAkhir" onkeyup="getPasienSaatini(1)" placeholder="____-__-__" onchange="getPasienSaatini(1)">
                                                    </span>

                                                    <span class="input-group-btn">
                                                        <input type="text" class="form-control" name="q" value="" id="q" placeholder="Keyword" onkeyup="getPasienSaatini(1)">
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <!-- <button type="button" id="btnKeyword" class="btn btn-primary">
                                                            <i class="fa fa-search"></i> Cari</button> -->
                                                    </span>
                                                </div>

                                                <div class="col-md-1">
                                                    <select name="limit" id="limit" class="form-control input-sm" onchange="getData(1)">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="30">30</option>
                                                        <option value="40">40</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-green">
                                            <tr>
                                                <th style="width: 60px">#</th>
                                                <th style="width: 60px">No.Reg RS</th>
                                                <th style="width: 120px">No.Reg Unit</th>
                                                <th style="width: 80px">Tgl.Masuk</th>
                                                <th style="width: 60px">No MR</th>
                                                <th>Nama Pasien</th>
                                                <th style="width: 80px">Tgl.Lahir</th>
                                                <th style="width: 80px">Jns.Kelamin</th>
                                                <th>Nama Dokter Jaga</th>
                                                <?php if ($ruang->grid == 2) echo "<th>Ruang / Kamar</th><th>Kelas</th>";
                                                else echo "<th>Poli</th>" ?>
                                                <th style="width: 100px">Mode Bayar</th>
                                                <th>Status</th>
                                                <th>Status RME</th>
                                                <th style="width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="14" id="pagination"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($grLokasi==3) {?>
                        <div class="tab-pane" id="tab_2">
                            <div class="row" style="margin-bottom:15px">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-1 text-right">
                                            <span>Periode</span>
                                        </div>
                                        <div class="col-md-11 col-sm-9 col-xs-12">
                                            <span class="input-group-btn">
                                                <input type="text" class="form-control tanggal" name="ptglAwal" id="ptglAwal" value="<?= date('Y-m-d') ?>" placeholder="____-__-__" >
                                            </span>
                                            <span class="input-group-btn">
                                                <input disabled="" type="text" class="form-control" value="s/d" style="text-align: center;border: none;">
                                            </span>
                                            <span class="input-group-btn">
                                                <input type="text" class="form-control tanggal" name="ptglAkhir" value="<?= date('Y-m-d') ?>" id="ptglAkhir"  placeholder="____-__-__" onchange="getPasienSaatini(1)">
                                            </span>
                                            <span class="input-group-btn">
                                                <input type="text" class="form-control" name="psearch" value="" id="psearch"  placeholder="enter keyword" onchange="getPasienSaatini(1)">
                                            </span>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered" id="permintaanTable">
                                        <thead class="bg-green">
                                            <tr>
                                                <th style="width: 60px">#</th>
                                                <th style="width: 100px">No.Reg RS</th>
                                                <th style="width: 120px">No.Reg Unit</th>
                                                <th style="width: 80px">Tgl.Minta</th>
                                                <th style="width: 60px">No MR</th>
                                                <th style="width: 100px">Nama Pasien</th>
                                                <th>Ringkasan Permintaan</th>
                                                <th style="width: 80px">Ruang Pengirim</th>
                                                <th style="width: 80px">Dokter Pengirim</th>
                                                <th style="width: 50px">Status</th>
                                                <th style="width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataPermintaan"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
    </section>
    <?php
} else { ?>
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Maaf ruangan tidak ada
        </div>
    </section>
<?php } ?>

<script>
    $(document).ready(function () {
        var table = $("#permintaanTable").DataTable({
            bAutoWidth: false,
            processing: true,
            serverSide: true,
            ajax : {
                url: base_url+"erm/get_permintaan_json",
                type: "POST",
                data: function (d) {
                    d.cari = $("#psearch").val();
                    d.tglAwal = $("#ptglAwal").val()
                    d.tglAkhir = $("#ptglAkhir").val()
                    // etc
                }
            },
            searching: false,
            columns: [
                {"data": "id"},
                {"data": "id_daftar"},
                {"data": "reg_unit"},
                {"data": "created_at"},
                {"data": "nomr"},
                {"data": "nama"},
                {"data": "ringkasan_tindakan"},
                {"data": "group_name"},
                {"data": "dpjp_name"},
                {"data": "status_form",render:function(data,type,row){
                    switch (data) {
                        case "1":
                            return "<span class='badge bg-default'>Diajukan</span>"
                            break;
                        case "2":
                            return "<span class='badge bg-yellow'>Diproses</badge>"
                            break;
                        case "3":
                            return "<span class='badge bg-green'>Selesai<badge>"
                            break;
                        default:
                            return "-"
                            break;
                    }
                }},
                {"data": "view"}
            ],
            order: [[3, 'desc']]
        });

        $("#psearch").keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                table.ajax.reload()
            }
        })
        $("#ptglAwal,#ptglAkhir").on("change",function(){
             table.ajax.reload();
        })

    });
    
    function detailPermintaan(idx,id)
    {
        window.location.href = base_url+"erm/detail_permintaan?idx="+idx+"&id="+id;
    }    
</script>