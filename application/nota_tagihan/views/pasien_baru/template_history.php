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
                                    <span class="fa fa-list"></span> Informasi Pasien
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div id="divHistori" class="list-group">
                                    <a href="#" class="list-group-item"> 
                                        <h4 class="list-group-item-heading"><b>No MR [ <?php echo $nomr; ?> ]</b></h4> 
                                        <p class="list-group-item-text"><small>&nbsp;</small></p>
                                        
                                        <h5 class="list-group-item-heading"><b>No KTP (NIK / Passport)</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $no_ktp ?></h5> 

                                        <h5 class="list-group-item-heading"><b>No BPJS (<em style="font-size: 10px">Jika Peserta BPJS </em>)</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $no_bpjs ?></h5> 
                                        
                                        <h5 class="list-group-item-heading"><b>Tempat Lahir</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $tempat_lahir ?></h5> 

                                        <h5 class="list-group-item-heading"><b>Tanggal Lahir</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $tgl_lahir ?></h5> 
                                        
                                        <h5 class="list-group-item-heading"><b>Jenis Kelamin</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo ($jns_kelamin=="1") ? "Laki-Laki" : "Perempuan" ?></h5> 

                                        <h5 class="list-group-item-heading"><b>Alamat Tempat Tinggal</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $alamat ?></h5> 

                                        <h5 class="list-group-item-heading"><b>Pekerjaan</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $pekerjaan ?></h5>

                                        <h5 class="list-group-item-heading"><b>Agama</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $agama ?></h5>

                                        <h5 class="list-group-item-heading"><b>Suku</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $suku ?></h5>

                                        <h5 class="list-group-item-heading"><b>Bahasa Daerah</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $bahasa ?></h5>

                                        <h5 class="list-group-item-heading"><b>No.HP Pasien</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $no_telpon ?></h5>

                                        <h5 class="list-group-item-heading"><b>Penanggung Jawab</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $penanggung_jawab ?></h5>

                                        <h5 class="list-group-item-heading"><b>No.HP Penanggung Jawab</b></h5> 
                                        <h5 class="list-group-item-heading"><?php echo $no_penanggung_jawab ?></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-header with-border">
                    <a href="Javascript:print_kartu_berobat()" class="btn btn-danger">
                        <i class="fa fa-print"></i> <b>Cetak Kartu Berobat</b></a>
                    <a href="Javascript:print_stiker()" class="btn btn-danger">
                        <i class="fa fa-print"></i> <b>Cetak Stiker</b></a>
                    <a href="Javascript:edit_pasien()" class="btn btn-danger">
                        <i class="fa fa-edit"></i> <b>Edit Data Pasien</b></a>
                    <a href="Javascript:data_pasien()" class="btn btn-danger">
                        <i class="fa fa-search"></i> <b>Cari Pasien Lainnya</b></a>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 100px">No.Reg RS</th>
                                <th style="width: 120px">No.Reg Unit</th>
                                <th>Jenis Layanan</th>
                                <th>Tujuan Layanan</th>
                                <th style="width: 120px">Tgl.Masuk</th>
                                <th style="width: 120px">Cara Bayar</th>
                            </tr>        
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                foreach ($getHistory->result_array() as $x): 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $x['id_daftar']; ?></td>
                                <td><?php echo $x['reg_unit']; ?></td>
                                <td>
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
                                </td>
                                <td><?php echo $x['ruang']; ?></td>
                                <td><?php echo date('d-m-Y H:i',strtotime($x['tgl_masuk'])); ?></td>
                                <td><?php echo ($x['id_cara_bayar']=="1") ? "UMUM" : "JKN"; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
function data_pasien(){
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru' ?>';
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
