<style>
    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }
    .control[readonly]{
        background: #3c8dbc;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Penting</h4>
        Klik Buat Nota Tagihan jika ingin entry nota langsung.
    </div>
    <div class="row">
        <div class="col-md-3">       
            <div class="box box-widget widget-user-2">                    
                <div class="widget-user-header bg-aqua-active">
                    <div class="widget-user-image">
                        <?php if($jns_kelamin == "1"): ?>
                        <img class="img-circle" src="<?php echo base_url().'assets/images/male.png' ?>" alt="" id="imgMale">
                        <?php else: ?>
                        <img class="img-circle" src="<?php echo base_url().'assets/images/female.png' ?>" alt="" id="imgFemale">
                        <?php endif; ?>
                    </div>
                    <h4 class="widget-user-username"><?php echo $nama_pasien ?></h4>
                    
                </div>
                <div class="box-body">
                    <div style="font-size: 23px;text-align: center;">
                        <span>No.MR : <?php echo $nomr ?></span>
                    </div>
                </div>
            </div>          
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 150px">No Registrasi RS</th>
                            <th style="font-size: 20px"><?php echo $id_daftar ?></th>
                        </tr>
                        <tr>
                            <th>Jenis Layanan</th>
                            <th style="font-size: 20px"><?php echo $jns_layanan ?></th>
                        </tr>
                        <tr>
                            <th>No Registrasi Unit</th>
                            <th style="font-size: 20px"><?php echo $reg_unit ?></th>
                        </tr>
                        <tr>
                            <th>Tempat/Tgl.Lahir</th>
                            <th><?php echo $tempat_lahir . ', ' . $tgl_lahir ?></th>
                        </tr>
                        
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th><?php echo ($jns_kelamin=="1") ? "Laki-Laki" : "Perempuan" ?></th>
                        </tr>
                        <tr>
                            <th>Tujuan Layanan</th>
                            <th><?php echo $nama_ruang ?></th>
                        </tr>
                        <tr>
                            <th>Jaminan Layanan</th>
                            <th><?php echo $cara_bayar ?></th>
                        </tr>
                        <tr>
                            <th>No Jaminan Layanan</th>
                            <th><?php echo $no_jaminan ?></th>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-success">
                <div class="box-body">           
                    <a href="#" onclick="kembali()" class="btn btn-danger btn-block">
                        <i class="fa fa-share-alt"></i> <b>Registrasikan Pasien Lainnya</b></a>
                    <a href="#" onclick="print_reg()" class="btn btn-success btn-block">
                        <i class="fa fa-print"></i> <b>Cetak Registrasi Penunjang</b></a>
                    <a href="#" onclick="buat_nota()" class="btn btn-primary btn-block">
                        <i class="fa fa-edit"></i> <b>Buat Nota Tagihan</b></a>
                </div>
            </div>
        </div>
    </div>      
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
function kembali(){
    var a = '<?php echo $id_ruang ?>';
    var url = '<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/tambah?kLok=' ?>' + a;
    window.location.href = url;
}
function print_reg(){
    var reg_unit = '<?php echo encrypt_decrypt('encrypt',$reg_unit,true) ?>';
    var url = '<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/cetakReg?kode=' ?>' + reg_unit;
    openInNewTab(url);
}
function buat_nota(){
    var a = '<?php echo $idx ?>';
    var b = '<?php echo $id_ruang ?>';
    var url = '<?php echo base_url().'nota_tagihan.php/nota_tagihan/entry_nota?idx=' ?>' + a + '&kLok=' + b;
    window.location.href = url;
}
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
}  
  
</script>