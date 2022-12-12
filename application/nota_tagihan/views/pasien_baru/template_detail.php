<style>
    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }
</style>       
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">

            <div class="box box-widget widget-user-2">                    
                <div class="widget-user-header bg-aqua-active">
                    <div class="widget-user-image">
                        <?php if ($jns_kelamin=="1") { ?>
                        <img class="img-circle" src="<?php echo base_url().'assets/images/male.png' ?>" alt="" id="imgMale">
                        <?php }else{ ?>
                        <img class="img-circle" src="<?php echo base_url().'assets/images/female.png' ?>" alt="" id="imgFemale">
                        <?php } ?>
                    </div>
                    <h4 class="widget-user-username" id="lblnama"><?php echo $nama ?></h4>
                </div>

                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" title="Histori" data-toggle="tab" id="tabHistori">
                                    <span class="fa fa-list"></span> Riwayat Kunjungan
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div id="divHistori" class="list-group">
                                    <?php foreach ($getHistory->result_array() as $x): ?>
                                    <a href="#" class="list-group-item"> 
                                        <h5 class="list-group-item-heading"><b><u><?php echo $x['id_daftar']; ?></u></b></h5>  
                                        <h5 class="list-group-item-heading"><b><u><?php echo $x['reg_unit']; ?></u></b></h5>  
                                        <small>
                                        <?php 
                                            if($x['jns_layanan']=="RJ"){
                                                echo "RAWAT JALAN";
                                            }elseif($x['jns_layanan']=="RI"){
                                                echo "RAWAT INAP";
                                            }elseif($x['jns_layanan']=="PG"){
                                                echo "PENUNJANG MEDIS";
                                            }elseif($x['jns_layanan']=="GD"){
                                                echo "INSTALASI GAWAT DARURAT";
                                            } 
                                        ?>
                                        </small>

                                        <p class="list-group-item-text"><small></small></p>
                                        <p class="list-group-item-text"><small> Tujuan Layanan</small></p>
                                        <p class="list-group-item-text"><small> <?php echo $x['nama_ruang']; ?></small></p>
                                        <p class="list-group-item-text"><small> Tgl.Masuk [ <?php echo date('d-m-Y H:i',strtotime($x['tgl_masuk'])); ?> ]</small></p>
                                        <p class="list-group-item-text"><small> Cara Bayar [ <?php echo ($x['id_cara_bayar']=="1") ? "UMUM" : "JKN"; ?> ]</small></p>
                                    </a>

                                    <?php endforeach; ?>
                                </div>                
                                                    
                                <div>
                                    <button type="button" id="btnHistori" class="btn btn-xs btn-default btn-block">
                                        <span class="fa fa-history"></span> Lihat Semua Riwayat
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body table-responsive no-padding">

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 250px">No MR</th>
                            <th style="font-size: 16px"><?php echo $nomr ?></th>
                        </tr>
                        <tr>
                            <th>No KTP (NIK / Passport)</th>
                            <th><?php echo $no_ktp ?></th>
                        </tr>
                        <tr>
                            <th>No BPJS (<em style="font-size: 10px">Jika Pasien Peserta BPJS Kesehatan</em>)</th>
                            <th><?php echo $no_bpjs ?></th>
                        </tr>
                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <th><?php echo $tempat_lahir.', '.$tgl_lahir ?></th>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th><?php echo ($jns_kelamin=="1" || $jns_kelamin=="L") ? "Laki-Laki" : "Perempuan" ?></th>
                        </tr>
                        <tr>
                            <th>Kewarganegaraan</th>
                            <th><?php echo $kewarganegaraan ?></th>
                        </tr>
                        <tr>
                            <th>Negara</th>
                            <th><?php echo ($nama_negara==0) ? "Indonesia" : $nama_negara ?></th>
                        </tr>
                        <tr class="groupKewarganegaraan">
                            <th>Provinsi</th>
                            <th><?php echo $nama_provinsi ?></th>
                        </tr>
                        <tr class="groupKewarganegaraan">
                            <th>Kabupaten / Kota</th>
                            <th><?php echo $nama_kab_kota ?></th>
                        </tr>
                        <tr class="groupKewarganegaraan">
                            <th>Kecamatan</th>
                            <th><?php echo $nama_kecamatan ?></th>
                        </tr>
                        <tr class="groupKewarganegaraan">
                            <th>Kelurahan</th>
                            <th><?php echo $nama_kelurahan ?></th>
                        </tr>
                        <tr>
                            <th>Alamat Tempat Tinggal</th>
                            <th><?php echo $alamat ?></th>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <th><?php echo $pekerjaan ?></th>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <th><?php echo $agama ?></th>
                        </tr>
                        <tr>
                            <th>Suku</th>
                            <th><?php echo $suku ?></th>
                        </tr>
                        <tr>
                            <th>Bahasa Daerah</th>
                            <th><?php echo $bahasa ?></th>
                        </tr>
                        <tr>
                            <th>No HP / Telp Pasien</th>
                            <th><?php echo $no_telpon ?></th>
                        </tr>
                        <tr>
                            <th>Penanggung Jawab</th>
                            <th><?php echo $penanggung_jawab ?></th>
                        </tr>
                        <tr>
                            <th>No HP / Telp Penanggung Jawab</th>
                            <th><?php echo $no_penanggung_jawab ?></th>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-success">
                <form role="form" method="post" action="#" onsubmit="return false">
                    <div class="box-body">                          
                        <a href="Javascript:print_kartu_berobat()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Kartu Berobat</b></a>
                        <a href="Javascript:print_stiker()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Stiker</b></a>
                        <a href="Javascript:edit_pasien()" class="btn btn-success btn-block">
                            <i class="fa fa-edit"></i> <b>Edit Data Pasien</b></a>
                        <a href="Javascript:reg_rawatjalan()" class="btn btn-primary btn-block">
                            <i class="fa fa-user"></i> <b>Registrasi Rawat Jalan</b></a>
                        <a href="Javascript:reg_gawatdarurat()" class="btn btn-danger btn-block">
                            <i class="fa fa-user"></i> <b>Registrasi Gawat Darurat</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>      
</section>


<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    var xKewarganegaraan = '<?php echo $kewarganegaraan ?>';
    if(xKewarganegaraan == ''){
        $('.groupKewarganegaraan').hide();
    }else if(xKewarganegaraan == 'WNI'){
        $('.groupKewarganegaraan').show();
    }else{
        $('.groupKewarganegaraan').hide();
    }
    $('#btnHistori').click(function(){
        var a = '<?php echo $nomr ?>';
        var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/history/' ?>' + a;
        window.location.href = url;
    });
});

function edit_pasien(){
    var idx = '<?php echo $idx ?>';
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/tambah/' ?>' + idx;
    window.location.href = url;
}

function reg_rawatjalan(){
    var nomr = '<?php echo $nomr ?>';
    var url = '<?php echo base_url().'mr_registrasi.php/registrasi/daftar_rawat_jalan/' ?>' + nomr;
    window.location.href = url;
}

function reg_gawatdarurat(){
    var nomr = '<?php echo $nomr ?>';
    var url = '<?php echo base_url().'mr_registrasi.php/registrasi/daftar_igd/' ?>' + nomr;
    window.location.href = url;
}

function print_kartu_berobat(){
    var nomr = '<?php echo $nomr ?>';
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/cetakKartu?kode=' ?>' + nomr;
    openInNewTab(url);
}
function print_stiker(){
    var nomr = '<?php echo $nomr ?>';
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/cetakStiker?kode=' ?>' + nomr;
    openInNewTab(url);
}
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
} 
</script>
