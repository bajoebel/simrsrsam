<style>
    div#pagination b{
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    div#pagination a{
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
    
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <!--div class="row"-->
    <?php //print_r($detail); ?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Nota Tagihan</h3>
            </div>
            <div class="box-body">
                <div class="">
                    <div class="row">
                        <?php if(!empty($detail)) { ?>
                        <!-- Panel Samping Kiri -->
                        
                        <div class="col-xs-3">         
                            <div class="box box-widget widget-user-2">                    
                                <div class="widget-user-header bg-aqua-active">
                                    <div class="widget-user-image">
                                        <?php if($detail->jns_kelamin == "1"): ?>
                                        <img class="img-circle" src="<?php echo base_url().'assets/images/male.png' ?>" alt="" id="imgMale">
                                        <?php else: ?>
                                        <img class="img-circle" src="<?php echo base_url().'assets/images/female.png' ?>" alt="" id="imgFemale">
                                        <?php endif; ?>
                                    </div>
                                    <?php 
                                    if($detail->jns_layanan=="RI") $kamar=" (".$detail->nama_kamar.")";
                                    else $kamar='';
                                    ?>
                                    <h4 class="widget-user-username"><?php echo $detail->nama_pasien  ?></h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <ul class="nav nav-stacked">
                                            <li><a><span><?php echo $detail->nama_ruang .$kamar ?></span></a></li>
                                            <li><a><span>No.MR : <?php echo $detail->nomr ?></span></a></li>
                                            <li><a><span>No.Reg RS : <?php echo $detail->id_daftar ?></span></a></li>
                                            <li><a><span>No.Reg Unit : <?php echo $detail->reg_unit ?></span></a></li>
                                            <li><a><span>Kelas Layanan : <?php echo ($detail->kelas_layanan=="") ? "Rawat Jalan" : "Kelas ".$detail->kelas_layanan ?></span></a></li>
                                            <li><a><span>Jaminan Layanan : <?php echo $detail->cara_bayar ?></span></a></li>
                                            <li><button class='btn btn-default btn sm btn-block' onclick="getTransaksi('<?= $detail->id_daftar ?>')"><span>Cek Status Transaksi</span></button></li>
                                        </ul>
                                    
                                    </div> 
                                </div>
                            </div>    
                        </div>
                        <!-- End Panel Samping Kiri -->
                        <div class="col-md-9">
                            <section class="content container-fluid">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab">Nota Tagihan</a></li>
                                        <li><a href="#tab_2" data-toggle="tab">Diagnosa Akhir</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <?php 
                                            if($cek_nota >0) {?>
                                                <form id="formkwitansi" class="form-horizontal" onsubmit="return false" action="<?= base_url() ."kasir.php/kwitansi/simpan_kwitansi" ?>" method="POST"  enctype="multipart/form-data">
                                                    <input type="hidden" name="start" id="start" value="0">
                                                    <input type="hidden" name="id_daftar" id="id_daftar" value="<?= $detail->id_daftar; ?>">
                                                    <input type="hidden" name="nomr" id="nomr" value="<?= $detail->nomr; ?>">
                                                    <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?= $detail->nama_pasien; ?>">
                                                    <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="<?= $detail->jns_kelamin; ?>">
                                                    <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="<?= $detail->tgl_lahir; ?>">
                                                    <input type="hidden" name="no_bpjs" id="no_bpjs" value="<?= $detail->no_bpjs; ?>">
                                                    <?php 
                                                    $lahir=new DateTime($detail->tgl_lahir);
                                                    $today =new DateTime();
                                                    
                                                    $umur=$today->diff($lahir);
                                                    ?>
                                                    <input type="hidden" name="umur" id="umur" value="<?= $umur->y ." Tahun " . $umur->m ." Bulan " . $umur->d ." Hari" ?>">
                                                    <fieldset>
                                                        <legend>
                                                            <div class="row"><div class='col-md-6'>Info Transaksi</div><div class="col-md-6 text-right"><button class="btn btn-primary btn-sm" type='button' onclick="simpanKwitansi()">Buat Kwitansi</button></div></div></legend>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>Tanggal Masuk / Pulang</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" name="tgl_masuk" id="tgl_masuk" class="form-control tanggal" value="<?= $tgl_masuk; ?>">
                                                                            <div class="input-group-btn input-group-sm" style="width: 50%">
                                                                                <input type="text" name="tgl_keluar" id="tgl_keluar" class="form-control tanggal" value="<?= date('Y-m-d') ?>">
                                                                            </div>
                                                                            <span class="text-error" id="err_tgl"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>DPJP</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <select class="form-control" name="dpjp" id="dpjp" onchange="getDPJP()">
                                                                        <option value="">Pilih dpjp</option>
                                                                        <?php 
                                                                        foreach ($dokter as $d) {
                                                                            ?>
                                                                            <option value="<?= $d->NRP; ?>" <?php if($d->NRP==$detail->dokterJaga) echo "selected"; ?>><?= $d->pgwNama; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </select>
                                                                        <input type="hidden" name="nama_dpjp" id="nama_dpjp" value="<?= $detail->dokterJaga ?>">
                                                                        <span class="text-error" id="err_dpjp"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>Cara Bayar</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <select class="form-control" name="id_cara_bayar" id="id_cara_bayar" onchange="getCaraBayar()">
                                                                            <option value="">Pilih Cara Bayar</option>
                                                                            <?php 
                                                                            foreach ($carabayar as $c) {
                                                                                ?>
                                                                                <option value="<?= $c->idx; ?>" <?php if($c->idx==$detail->id_cara_bayar) echo "selected"; ?>><?= $c->cara_bayar; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <span class="text-error" id="err_cara_bayar"></span>
                                                                        <input type="hidden" name="cara_bayar" id="cara_bayar" value="<?= $detail->cara_bayar ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>Grand Total</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <label id="labelgrandtotal" class="form-control"></label>
                                                                        <input type="hidden" class="form-control" name="total_tagihan" id="total_tagihan" readonly value="">
                                                                        <span class="text-error" id="err_grandtotal"></span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-md-6" id="bpjs">
                                                                
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>NO SEP</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <input type="text" name="no_sep" id="no_sep" class="form-control" value="<?= $detail->no_jaminan ?>">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>Tanggungan BPJS</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <input type="text" class="form-control" name="tarif_bpjs" id="tarif_bpjs" value="">
                                                                    </div>
                                                                </div>
                                                                <?php if($detail->jns_layanan=="RI") { ?>
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>Selisih Bayar</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <input type="text" class="form-control" name="tarif_selisih_bayar" id="tarif_selisih_bayar" value="">
                                                                    </div>
                                                                </div>
                                                                <?php } else{ ?>
                                                                    <input type="hidden" class="form-control" name="tarif_selisih_bayar" id="tarif_selisih_bayar" value="0">
                                                                <?php } ?>
                                                                <div class="form-group">
                                                                    <div class="col-xs-4 text-right">
                                                                        <label>&nbsp;</label>
                                                                    </div>
                                                                    <div class="col-xs-8">
                                                                        <input type="checkbox"  name="status_pembayaran" id="status_pembayaran" value="1"> <b>Status Bayar</b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <legend>List Tagihan</legend>
                                                        <div class="row">
                                                            
                                                            <div class="col-md-12">
                                                                <table class="table table-bordered">
                                                                    <thead class="bg-green">
                                                                        <tr>
                                                                            <td>NO</td>
                                                                            <td>ITEM TRANSAKSI</td>
                                                                            <td class="text-right">TARIF</td>
                                                                            <td class="text-right">JUMLAH</td>
                                                                            <td class="text-right">NILAI TRANSAKSI (RP)</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="nota_tagihan"></tbody>
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            <?php 
                                            } else { 
                                                if(!empty($kwitansi)) $no_kwitansi=$kwitansi->no_kwitansi;
                                                else $no_kwitansi = '';
                                                $jkn=0;
                                                
                                                if(!empty($no_kwitansi)){
                                                    $datajkn = $this->kwitansi_model->rowCarabayar($kwitansi->id_cara_bayar);
                                                    if(!empty($datajkn)) $jkn=$datajkn->jkn;
                                                    
                                                    ?>
                                                    <div class="row"> 
                                                        <?php 
                                                        if($detail->jns_layanan=="RI" AND $datajkn->jkn==1 ){ ?>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                            
                                                                <div class="info-box">
                                                                    <a href="<?= base_url() ."kasir.php/kwitansi/selisih_bayar/" . $no_kwitansi;  ?>" target="_blank">
                                                                    <span class="info-box-icon bg-green">
                                                                        <i class="fa fa-print"></i>
                                                                    </span>
                                                                    </a>
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text">
                                                                            Kwitansi Selisih Bayar
                                                                        </span>
                                                                        <span class="info-box-number"></span>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        <?php 
                                                        }
                                                        
                                                        if($datajkn->jkn==1){
                                                        ?>
                                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                                            
                                                            <div class="info-box">
                                                                <a href="<?= base_url() ."kasir.php/kwitansi/jkn/" .$no_kwitansi;  ?>" target='_blank'>
                                                                <span class="info-box-icon bg-red"><i class="fa fa-print"></i></span>
                                                                </a>
                                                                <div class="info-box-content">
                                                                    <span class="info-box-text">Kwitansi E-Klaim</span>
                                                                    <span class="info-box-number"></span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                                </div>
                                                                <!-- /.info-box -->
                                                            
                                                        </div>
                                                        <?php } ?>
                                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                                            
                                                            <div class="info-box">
                                                                <a href="<?= base_url() ."kasir.php/kwitansi/umum/" . $no_kwitansi;  ?>" target="_blank">
                                                                <span class="info-box-icon bg-yellow"><i class="fa fa-print"></i></span>
                                                                </a>
                                                                <div class="info-box-content">
                                                                    <span class="info-box-text">Kwitansi Tagihan </span>
                                                                    <span class="info-box-number">Sesuai Perda</span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                                </div>

                                                            <!-- /.info-box -->
                                                        </div>
                                                    </div>
                                                    <?php 
                                                }else{
                                                    ?>
                                                    <div class="alert alert-warning alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h4><i class="icon fa fa-info"></i> Informasi</h4>
                                                        Belum ada nota tagihan.
                                                    </div>
                                                    <?php
                                                }
                                            } 
                                            ?>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_2">
                                            <div class="row">
                                                <fieldset>
                                                    <legend>Diagnosa Akhir</legend>
                                                    <?php 
                                                    if(!empty($diagnosa_akhir)){
                                                        if($detail->jns_layanan=="RI"){
                                                        ?>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td class="bg-green" style="width: 300px"><h2>Diagnosa Utama</h2></td>
                                                                <td><h2><?= $diagnosa_akhir->diagnosa_utama ?></h2></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-green"><h2>Diagnosa Sekunder</h2></td>
                                                                <td>
                                                                <ol>
                                                                    <?php 
                                                                    $sekunder=explode(',',$diagnosa_akhir->diagnosa_sekunder);
                                                                    foreach ($sekunder as $s) {
                                                                        ?>
                                                                        <li><h5><?= $s ?></h5></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ol>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td class="bg-green" style="width: 300px"><h2>Diagnosa</h2></td>
                                                                <td><h2><?= $diagnosa_akhir->diagnosa ?></h2></td>
                                                            </tr>
                                                            <!--tr>
                                                                <td class="bg-green"><h2>Terapir</h2></td>
                                                                <td>
                                                                <ol>
                                                                    <?php 
                                                                    /*$sekunder=explode(',',$diagnosa_akhir->diagnosa_sekunder);
                                                                    foreach ($sekunder as $s) {
                                                                        ?>
                                                                        <li><h5><?= $s ?></h5></li>
                                                                        <?php
                                                                    }*/
                                                                    ?>
                                                                </ol>
                                                                </td>
                                                            </tr-->
                                                        </table>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.tab-content -->
                                  </div>
                            </section>
                        </div>
                        <?php 
                        }
                        else { 
                            ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Penting</h4>
                                    Maaf data kunjungan pasien tidak ditemukan
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
    <!--/div-->
<div class="modal fade" id="formTransaksi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Status Transaksi</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Informasi</h4>
                    Silahkan Kontak Admin Masing Masing Unit Untuk memastikan bahwa Semua Transaksi Pasien Di unit Tersebut sudah selesai 
                </div>
                <span class="btn btn-danger btn-xs"><span class="fa fa-remove"></span></span><b>Transaksi Belum Selesai</b> &nbsp;
                <span class="btn btn-success btn-xs"><span class="fa fa-check"></span></span><b>Transaksi Sudah Selesai</b> &nbsp;
                <span class="btn btn-warning btn-xs"><span class="fa fa-refresh"></span></span><b>Tidak ada resep</b>
                <hr>
                <table class="table table-bordered table-responsive">
                    <thead class="bg-green">
                        <tr>
                            <td>Reg Unit</td>
                            <td>Poliklinik / Ruangan</td>
                            <td>Tindakan</td>
                            <td>Farmasi</td>
                        </tr>
                    </thead>
                    <tbody id="list-transaksi"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</section>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    var base_url = "<?= base_url() ."kasir.php/" ?>";

</script>
<script src="<?php echo base_url() ?>js/kasir.js"></script>
<script type="text/javascript">
    $(document).ready(function () { 
        $('.tanggal').datepicker({
            autoclose : true,
            format    : "yyyy-mm-dd"
        });
        getNota("<?= $detail->id_daftar ?>");
        getCaraBayar();
    });
    
</script>