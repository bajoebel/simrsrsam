<style>
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
    .kotak{
        padding:10px;
        width:100%;
        border:1px #ccc solid;
        border-collapse:collapse;
        
    }
    .text-center{
        text-align:center;
    }
    .font60{
        font-size : 120pt;
    }
    .font10{
        font-size:10pt;
    }
    .font11{
        font-size:11pt;
    }
    .font12{
        font-size:12pt;
    }
    .font13{
        font-size:13pt;
    }

    .font14{
        font-size:14pt;
    }
    .font20{
        font-size:20pt;
    }
    .top10{
        margin-top:10px;
    }
    .top20{
        margin-top:20px;
    }
    .panel{
        border-radius:0px;
    }
    .panel-success{
        border-color:#1ABC9C;
    }
    .panel-success .panel-heading {
        background-color: #1ABC9C;
        color: #fff;
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
            kemudian tekan enter atau klik tombol Cari Pasien
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="ruang_id" id="ruang_id" value="<?= $this->session->userdata('kdlokasi'); ?>">
                <input type="hidden" name="nama_ruang" id="nama_ruang" value="<?= getRuangByID($this->session->userdata('kdlokasi')); ?>">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php 
                        if($ruang->grid==1){
                            ?>
                            <li class="active"><a href="#tab_3" data-toggle="tab">Antrean Pasien</a></li>
                            <li><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
                            <?php
                        }else{
                            ?>
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
                            <?php
                        }
                        ?>
                        
                        <li><a href="#tab_2" data-toggle="tab" onclick="getPermintaan(1)"><?php if ($ruang->grid == 1) echo "Permintaan Rujuk Internal<span class='pull-right badge bg-aqua'>" . $notif . "</span>";
                                                                                            elseif ($ruang->grid == 2) echo "Permintaan Pindah Kamar<span class='pull-right badge bg-aqua'>" . $notif . "</span>";
                                                                                            elseif ($ruang->grid == 3) echo "Permintaan Penunjang<span class='pull-right badge bg-aqua'>" . $notif . "</span>" ?></a></li>
                        <?php
                        if ($ruang->grid == 2) {
                        ?>
                            <li><a href="#tab_3" data-toggle="tab" onclick="riwayatPindah(1)">Riwayat Pemindahan Pasien</a></li>
                            <li><a href="#tab_4" data-toggle="tab" onclick="riwayatPulang(1)">Riwayat Pemulangan Pasien</a></li>
                        <?php
                        }
                        ?>
                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane <?php if($ruang->grid!=1) echo "active" ?>" id="tab_1">
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
                                                        <button type="button" id="btnKeyword" class="btn btn-primary">
                                                            <i class="fa fa-search"></i> Cari</button>
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
                                                <th style="width: 100px">No.Reg RS</th>
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
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="input-group input-group-sm">
                                        <input type="hidden" id="start" name="start" value="1">
                                        <input type="text" name="q1" id="q1" class="form-control pull-right" value="" placeholder="Search" onkeyup="getPermintaan(1)">
                                        <input type="hidden" value="param1">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <select name="limit1" id="limit1" class="form-control input-sm" onchange="getPermintaan(1)" style="width: 100%;">
                                        <option value="10">10</option>
                                        <option value="20" selected>20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <?php
                            if ($ruang->grid == 1) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>

                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data1"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" id="pagination1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } elseif ($ruang->grid == 2) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data1"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" id="pagination1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                                //echo "Permintaan Pindah Kamar<span class='pull-right badge bg-aqua'>" . $notif . "</span>";
                            } elseif ($ruang->grid == 3) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>

                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data1"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" id="pagination1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } ?>
                        </div>
                        <?php
                        if ($ruang->grid == 2) {
                        ?>
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="">
                                        <div class="col-md-11">
                                            <form action="#" method="get">
                                                <div class="input-group input-group-sm">
                                                    <input type="hidden" id="start2" name="start1" value="1">
                                                    <input type="text" name="q2" id="q2" class="form-control pull-right" value="" onkeyup="riwayatPindah(1)" placeholder="Search">
                                                    <input type="hidden" value="param2">
                                                    <div class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="limit2" id="limit2" class="form-control input-sm" onchange="riwayatPindah(1)">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Tujuan</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th>Response</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data2"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="15" id="pagination2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <div class="row">
                                    <div class="">
                                        <div class="col-md-11">
                                            <form action="#" method="get">
                                                <div class="input-group input-group-sm">
                                                    <input type="hidden" id="start3" name="start1" value="1">
                                                    <input type="text" name="q3" id="q3" class="form-control pull-right" value="" onkeyup="riwayatPulang(1)" placeholder="Search">
                                                    <input type="hidden" value="param3">
                                                    <div class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="limit3" id="limit3" class="form-control input-sm" onchange="riwayatPulang(1)">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Keluar</th>
                                                    <th>Lama Rawat</th>
                                                    <th style="width: 60px">No MR</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Ruangan</th>
                                                    <th>Cara Keluar</th>
                                                    <th>Keadaan Keluar</th>

                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data3"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="15" id="pagination3"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }else if($ruang->grid==1){
                            ?>
                            <div class="tab-pane active" id="tab_3">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-success">
                                            <div class="panel-heading text-center">NOMOR ANTREAN</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="kotak font60 text-center" id="v-nomorAntri">
                                                            <?php if(!empty($lastantrean)) {
                                                                if(empty($lastantrean->labelantrean)) echo $lastantrean->no_antrian_poly;
                                                                else echo $lastantrean->labelantrean.".".$lastantrean->no_antrian_poly; 
                                                            }else {
                                                                echo "Kosong"; 
                                                            }    
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Dokter</b></div>
                                                            <div class="font14" id="v-namadokter"><?php if(!empty($antreandokter)) echo $antreandokter[0]->namaDokterJaga ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Poli Tujuan</b></div>
                                                            <div class="font14"><?= getPoliByID($ruangID) ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>No Rekam Medis</b></div>
                                                            <div class="font14" id="v-nomr"><?php if(!empty($lastantrean)) echo $lastantrean->nomr; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Waktu Daftar</b></div>
                                                            <div class="font14" id="v-waktudaftar"><?php if(!empty($lastantrean)) echo $lastantrean->tgl_masuk; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Waktu Panggil</b></div>
                                                            <div class="font14" id='v-waktupanggil'><?= date('Y-m-d H:i:s') ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>NIK</b></div>
                                                            <div class="font14" id="v-nik"><?php if(!empty($lastantrean)) echo $lastantrean->no_ktp; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Nama</b></div>
                                                            <div class="font14" id="v-nama"><?php if(!empty($lastantrean)) echo $lastantrean->nama_pasien; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 table-responsive">
                                        <audio id="bell" src="<?= base_url() ."assets/sound/Airport_Bell.mp3"; ?>"  ></audio>
                                        <audio id="suarabelnomorurut" src="<?= base_url() ."assets/sound/noantri.mp3"; ?>"  ></audio>
                                        <audio id="suarabelsuarabelloket" src="<?= base_url() ."assets/sound/diloket.mp3"; ?>"  ></audio>
                                        <audio id="belas" src="<?= base_url() ."assets/sound/belas.mp3"; ?>"  ></audio>
                                        <audio id="sebelas" src="<?= base_url() ."assets/sound/sebelas.mp3"; ?>"  ></audio>
                                        <audio id="puluh" src="<?= base_url() ."assets/sound/puluh.mp3"; ?>"  ></audio>
                                        <audio id="sepuluh" src="<?= base_url() ."assets/sound/sepuluh.mp3"; ?>"  ></audio>
                                        <audio id="ratus" src="<?= base_url() ."assets/sound/ratus.mp3"; ?>"  ></audio>
                                        <audio id="seratus" src="<?= base_url() ."assets/sound/seratus.mp3"; ?>"  ></audio>
                                        <audio id="angka0" src="<?= base_url() ."assets/sound/g0.mp3"; ?>"  ></audio>
                                        <audio id="angka1" src="<?= base_url() ."assets/sound/g1.mp3"; ?>"  ></audio>
                                        <audio id="angka2" src="<?= base_url() ."assets/sound/g2.mp3"; ?>"  ></audio>
                                        <audio id="angka3" src="<?= base_url() ."assets/sound/g3.mp3"; ?>"  ></audio>
                                        <audio id="angka4" src="<?= base_url() ."assets/sound/g4.mp3"; ?>"  ></audio>
                                        <audio id="angka5" src="<?= base_url() ."assets/sound/g5.mp3"; ?>"  ></audio>
                                        <audio id="angka6" src="<?= base_url() ."assets/sound/g6.mp3"; ?>"  ></audio>
                                        <audio id="angka7" src="<?= base_url() ."assets/sound/g7.mp3"; ?>"  ></audio>
                                        <audio id="angka8" src="<?= base_url() ."assets/sound/g8.mp3"; ?>"  ></audio>
                                        <audio id="angka9" src="<?= base_url() ."assets/sound/g9.mp3"; ?>"  ></audio>
                                        <audio id="puluhan0" src="<?= base_url() ."assets/sound/g0.mp3"; ?>"  ></audio>
                                        <audio id="puluhan1" src="<?= base_url() ."assets/sound/g1.mp3"; ?>"  ></audio>
                                        <audio id="puluhan2" src="<?= base_url() ."assets/sound/g2.mp3"; ?>"  ></audio>
                                        <audio id="puluhan3" src="<?= base_url() ."assets/sound/g3.mp3"; ?>"  ></audio>
                                        <audio id="puluhan4" src="<?= base_url() ."assets/sound/g4.mp3"; ?>"  ></audio>
                                        <audio id="puluhan5" src="<?= base_url() ."assets/sound/g5.mp3"; ?>"  ></audio>
                                        <audio id="puluhan6" src="<?= base_url() ."assets/sound/g6.mp3"; ?>"  ></audio>
                                        <audio id="puluhan7" src="<?= base_url() ."assets/sound/g7.mp3"; ?>"  ></audio>
                                        <audio id="puluhan8" src="<?= base_url() ."assets/sound/g8.mp3"; ?>"  ></audio>
                                        <audio id="puluhan9" src="<?= base_url() ."assets/sound/g9.mp3"; ?>"  ></audio>
                                        <audio id="ratusan0" src="<?= base_url() ."assets/sound/g0.mp3"; ?>"  ></audio>
                                        <audio id="ratusan1" src="<?= base_url() ."assets/sound/g1.mp3"; ?>"  ></audio>
                                        <audio id="ratusan2" src="<?= base_url() ."assets/sound/g2.mp3"; ?>"  ></audio>
                                        <audio id="ratusan3" src="<?= base_url() ."assets/sound/g3.mp3"; ?>"  ></audio>
                                        <audio id="ratusan4" src="<?= base_url() ."assets/sound/g4.mp3"; ?>"  ></audio>
                                        <audio id="ratusan5" src="<?= base_url() ."assets/sound/g5.mp3"; ?>"  ></audio>
                                        <audio id="ratusan6" src="<?= base_url() ."assets/sound/g6.mp3"; ?>"  ></audio>
                                        <audio id="ratusan7" src="<?= base_url() ."assets/sound/g7.mp3"; ?>"  ></audio>
                                        <audio id="ratusan8" src="<?= base_url() ."assets/sound/g8.mp3"; ?>"  ></audio>
                                        <audio id="A" src="<?= base_url() ."assets/sound/abjad/A.mp3"; ?>"  ></audio>
                                        <audio id="B" src="<?= base_url() ."assets/sound/abjad/B.mp3"; ?>"  ></audio>
                                        <audio id="C" src="<?= base_url() ."assets/sound/abjad/C.mp3"; ?>"  ></audio>
                                        <audio id="D" src="<?= base_url() ."assets/sound/abjad/D.mp3"; ?>"  ></audio>
                                        <audio id="E" src="<?= base_url() ."assets/sound/abjad/E.mp3"; ?>"  ></audio>
                                        <audio id="F" src="<?= base_url() ."assets/sound/abjad/F.mp3"; ?>"  ></audio>
                                        <audio id="G" src="<?= base_url() ."assets/sound/abjad/G.mp3"; ?>"  ></audio>
                                        <audio id="H" src="<?= base_url() ."assets/sound/abjad/H.mp3"; ?>"  ></audio>
                                        <audio id="I" src="<?= base_url() ."assets/sound/abjad/I.mp3"; ?>"  ></audio>
                                        <audio id="J" src="<?= base_url() ."assets/sound/abjad/J.mp3"; ?>"  ></audio>
                                        <audio id="K" src="<?= base_url() ."assets/sound/abjad/K.mp3"; ?>"  ></audio>
                                        <audio id="L" src="<?= base_url() ."assets/sound/abjad/L.mp3"; ?>"  ></audio>
                                        <audio id="M" src="<?= base_url() ."assets/sound/abjad/M.mp3"; ?>"  ></audio>
                                        <audio id="N" src="<?= base_url() ."assets/sound/abjad/M.mp3"; ?>"  ></audio>
                                        <audio id="O" src="<?= base_url() ."assets/sound/abjad/O.mp3"; ?>"  ></audio>
                                        <audio id="P" src="<?= base_url() ."assets/sound/abjad/P.mp3"; ?>"  ></audio>
                                        <audio id="Q" src="<?= base_url() ."assets/sound/abjad/Q.mp3"; ?>"  ></audio>
                                        <audio id="R" src="<?= base_url() ."assets/sound/abjad/R.mp3"; ?>"  ></audio>
                                        <audio id="S" src="<?= base_url() ."assets/sound/abjad/S.mp3"; ?>"  ></audio>
                                        <audio id="T" src="<?= base_url() ."assets/sound/abjad/T.mp3"; ?>"  ></audio>
                                        <audio id="U" src="<?= base_url() ."assets/sound/abjad/U.mp3"; ?>"  ></audio>
                                        <audio id="V" src="<?= base_url() ."assets/sound/abjad/V.mp3"; ?>"  ></audio>
                                        <audio id="W" src="<?= base_url() ."assets/sound/abjad/W.mp3"; ?>"  ></audio>
                                        <audio id="X" src="<?= base_url() ."assets/sound/abjad/X.mp3"; ?>"  ></audio>
                                        <audio id="Y" src="<?= base_url() ."assets/sound/abjad/Y.mp3"; ?>"  ></audio>
                                        <audio id="Z" src="<?= base_url() ."assets/sound/abjad/Z.mp3"; ?>"  ></audio>
                                        <audio id="poliklinik" src="<?= base_url() ."assets/sound/poliklinik.mp3"; ?>"  ></audio>
                                        <audio id="ruang" src="<?= base_url() ."assets/sound/p".$this->session->userdata('kdlokasi').".mp3"; ?>"  ></audio>
                                        <form class="form-horizontal kotak" name="kotak" id="form" action="#">
                                            <input type="hidden" name="id_daftar" id="id_daftar" value="<?php if(!empty($lastantrean)) echo $lastantrean->id_daftar ?>">
                                            <input type="hidden" name="kodebooking" id="kodebooking" value="<?php if(!empty($lastantrean)) echo $lastantrean->kodebooking ?>">
                                            <input type="hidden" name="reg_unit" id="reg_unit" value="<?php if(!empty($lastantrean)) echo $lastantrean->reg_unit ?>">
                                            <input type="hidden" name="labelantrean" id="labelantrean" value="<?php if(!empty($lastantrean)) echo $lastantrean->labelantrean ?>">
                                            <input type="hidden" name="taskid" id="taskid" value="4">
                                            <input type="hidden" name="idxdaftar" id="idx_daftar" value="<?php if(!empty($lastantrean)) echo $lastantrean->idx_daftar ?>">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Antrean:</label>
                                                <div class="col-sm-10">
                                                <input type="radio" id="normal" name="antrean" checked value="1" onclick="getLastAntrean()"> Normal
                                                <input type="radio" id="prioritas" name="antrean" value="2" onclick="getLastAntrean()"> Prioritas
                                                <input type="radio" id="lewati" name="antrean" value="3" onclick="getLastAntrean()"> Lewati
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Poli:</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pwd" placeholder="Enter Poly" value="<?php echo getPoliByID($ruangID) ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Dokter:</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                    if(count($antreandokter)==1){
                                                        ?>
                                                        <input type="hidden" name="dokter" id="dokterJaga" value="<?= $antreandokter[0]->dokterJaga?>">
                                                        <input type="text" class="form-control" id="pwd" name="namaDokterJaga" placeholder="Enter Dokter" value="<?= $antreandokter[0]->namaDokterJaga ?>" readonly>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <select name="dokterJaga" style="width:100%" id="dokterJaga" class="form-control" onchange="getLastAntrean()">
                                                            <?php 
                                                            foreach ($antreandokter as $a ) {
                                                                ?>
                                                                <option value="<?= $a->dokterJaga ?>"><?= $a->namaDokterJaga ?></option>
                                                                <?php
                                                            }?>
                                                        </select>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <div id="v-nomorantrean">
                                            <input type="hidden" name="nomorantri" id="nomorantri" class="form-control pull-right" value="<?php if(!empty($lastantrean)) echo $lastantrean->no_antrian_poly; else echo "0"; ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="control-label col-sm-2" for="pwd">Nomor Antrian:</label>
                                                <div class="col-sm-10">
                                                    <select name="nomorantri" id="nomorantri" class="form-control">
                                                        <option value="">Pilih Nomor Antrian</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10" id="btnpanggil">
                                                    <?php 
                                                    if(!empty($lastantrean)){
                                                        if($lastantrean->status_panggil==1){
                                                            if($lastantrean->taskid==4){
                                                                ?>
                                                                <button type="button" class="btn btn-danger btn-sm btn-block" id="btnPanggil" disabled><span class="fa fa-ticket" id="iconPanggil" ></span> Pasien Sedang Dilayani</button>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <button type="button" class="btn btn-warning btn-sm btn-block" onclick="panggil()" id="btnPanggil"><span class="fa fa-ticket" id="iconPanggil"></span> Panggil Ulang</button>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                            
                                                            <div class="row top10">
                                                                <div class="col-md-6">
                                                                <button type="button" class="btn btn-success btn-sm btn-block" onclick="mulaiLayan()" id="btnMulailayan"><span id="iconMulaiLayan" class="fa fa-check"></span> Mulai Layani</button>
                                                                </div>
                                                                <div class="col-md-6"><button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()" <?php if($lastantrean->taskid==4) echo "disabled"; ?>><span class="fa fa-arrow-right " ></span> Skip</button></div>
                                                            
                                                            </div> 
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="panggil()"><span class="fa fa-ticket"></span> Panggil Berikutnya</button>
                                                            <div class="row top10">
                                                                
                                                                <div class="col-md-6"><button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()" <?php if($lastantrean->taskid==4) echo "disabled"; ?>><span class="fa fa-arrow-right " ></span> Lewati</button></div>
                                                                <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger btn-sm btn-block" onclick="batalAntrean()"><span id="iconbatak" class="fa fa-remove"></span> Batal</button>
                                                                </div>
                                                            </div> 
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-danger btn-sm btn-block" disabled><span class="fa fa-ticket"></span> Antrean Habis</button>
                                                        <?php
                                                    }
                                                    ?>
                                                
                                                </div>
                                            </div>
                                        </form> 

                                        <div class="kotak top20">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="font20">
                                                        <?= getPoliByID($ruangID) ?>
                                                    </div>
                                                    <div class="font10" id="v-dokterjuga">
                                                        <?php if(!empty($antreandokter)) echo $antreandokter[0]->namaDokterJaga ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- <?php print_r($jadwal)?> -->
                                                    <div class="font20">
                                                        <?= $jadwal->jadwal_jam_mulai ." - ". $jadwal->jadwal_jam_selesai ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="<?= base_url()."nota_tagihan.php/display" ?>" target="_blank" class='btn btn-primary btn-block' >Buka Display Antrean</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
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