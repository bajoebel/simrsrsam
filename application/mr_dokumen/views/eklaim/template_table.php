<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<style>
    .rataTengah{text-align: center;}
    .rataKanan{text-align: right;}
    .f15{font-size: 15px;}
    .f20{font-size: 20px;}
    .f20{font-size: 20px;}
    .w10{width: 10px;}
    .w50{width: 50px;}
    .w60{width: 60px;}
    .w70{width: 70px;}
    .w80{width: 80px;}
    .w90{width: 90px;}
    .w100{width: 100px;}
    .w110{width: 110px;}
    .w120{width: 120px;}
    .w130{width: 130px;}
    .w140{width: 140px;}
    .w150{width: 150px;}
    .w160{width: 160px;}
    .w170{width: 170px;}
    .w180{width: 180px;}
    .w190{width: 190px;}
    .w200{width: 200px;}
    .w210{width: 210px;}
    .w220{width: 220px;}
    .w230{width: 230px;}
    .w240{width: 240px;}
    .w250{width: 250px;}
    div.loading{
        display: none;
        margin: 0 15px;
        padding: 5px 15px;
        width: 100% - 30px;
        text-align: center;
        border:1px solid #e1e1e1;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Data pengembalian status pasien
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Cari No. RM / No. SEP / Nama" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="loading">
                    <i class="fa fa-spin fa-refresh"></i> Silahkan tunggu... Permintaan sedang diproses!  
                </div>
                
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="w120">No.Kwitansi</th>
                                <th class="w120">No.Reg RS</th>
                                <th class="w120">No.Kartu</th>
                                <th class="w120">No.SEP</th>
                                <th class="w60">No.MR</th>
                                <th class="">Nama Pasien</th>
                                <th class="w120">Tgl.Lahir</th>
                                <th class="w120">Jenis Kelamin</th>
                                <th class="w70">Action</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata">
                            <tr><td colspan="9">Enter untuk menampilkan data transaksi pasien</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script> 
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
$(document).ready(function () { 
    $('input').focus(function(){
        return $(this).select();
    });

    $('#btnRefresh').click(function(){
        $('#getdata').hide('slow').html("<tr><td colspan=9>Enter untuk menampilkan data transaksi pasien</td></tr>").show('slow');
    });

    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var a = $('#keyword').val();
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/eklaim/getKunjungan' ?>",
                type        : "POST",
                data        : {keyword:a},
                beforeSend  : function(){
                    $('#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    $('#getdata').html("<tr><td colspan=9>Enter untuk menampilkan data transaksi pasien</td></tr>");
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        var a = $('#keyword').val();
        if(a == ""){
            alert("Keyword masih kosong");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/eklaim/getKunjungan' ?>",
                type        : "POST",
                data        : {keyword:a},
                beforeSend  : function(){
                    $('#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    $('#getdata').html("<tr><td colspan=9>Enter untuk menampilkan data transaksi pasien</td></tr>");
                    console.log(jqXHR.responseText);
                }
            });
        }            
    });
    
});

function pilih(a){
    var url = '<?php echo base_url().'mr_dokumen.php/eklaim/tambah/' ?>'+a;
    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/eklaim/cekSEP' ?>",
        type        : "POST",
        data        : {nosep:a},
        dataType    : "JSON",
        success     : function(data){
            alert(data.message);    
            if(data.code==200){
                window.location.href = url;
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });
}

function cekSEP(a,b,c,d){
    var pesan = "";
    var formdata = {
        'param1' : a
    }
    if (a=="") {
        alert('No Jaminan atau No BPJS (Untuk Layanan BPJS) tidak boleh kosong');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/eklaim/cariSEP' ?>",
            type        : "POST",
            data        : formdata,
            dataType    : "JSON",
            beforeSend  : function(){
                $('.btn').addClass('disabled');
                $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Pengecekan SEP pada Server VClaim ');
                $('div.loading').show('slow');
            },
            success     : function(data){
                console.log(data);
                $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> SEP ditemukan');
                if (data.metaData.code == 200) {
                    var formdata = {};
                        formdata['no_kwitansi'] = d;
                        formdata['noSep'] = data.response.noSep;
                        formdata['noMr'] = data.response.peserta.noMr;
                        formdata['nama'] = data.response.peserta.nama;
                        formdata['noKartu'] = data.response.peserta.noKartu;
                        formdata['tglLahir'] = data.response.peserta.tglLahir;
                        formdata['gender'] = data.response.peserta.kelamin;                    

                    if (b==formdata['noKartu'] && c==formdata['noMr']) {
                        $.ajax({
                            url         : "<?php echo base_url().'mr_dokumen.php/eklaim/new_claim_post' ?>",
                            type        : "POST",
                            data        : formdata,
                            dataType    : "JSON",
                            beforeSend  : function(){
                                $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Sedang membuat data klaim');
                            },
                            success     : function(data){
                                $('.btn').removeClass('disabled');
                                $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Data klaim telah dibuat');
                                $('div.loading').hide('slow');
                                if (data.metadata.code == 200) {
                                    var url='<?php echo base_url().'mr_dokumen.php/eklaim/createClaim?'; ?>'+$.param(formdata);
                                    window.location.href=url;
                                }else{
                                    var iCount = data.duplicate.length;
                                    var sDup = '';
                                    for (var i = 0; i < iCount; i++) {
                                        sDup = '\nNama Pasien : ' + data.duplicate[i].nama_pasien;
                                        sDup += '\nNama RM : ' + data.duplicate[i].nomor_rm;
                                    }
                                    var pesan = data.metadata.message + '\n';
                                        pesan += data.metadata.error_no + '\n';
                                        pesan += sDup;
                                    alert(pesan);
                                }
                            },
                            error       : function(jqXHR,ajaxOption,errorThrown){
                                $('.btn').removeClass('disabled');
                                $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Data klaim gagal digenerate');                                
                                $('div.loading').hide('slow');
                                console.log(jqXHR.responseText);    
                            }
                        });
                    }else{
                        titleNotif = "Data not correctly!";            
                        pesan = "No Kartu atau No MR tidak sama dengan data BPJS\n";            
                        pesan += "Data BPJS\n";            
                        pesan += "No SEP : "+a+"\n";            
                        pesan += "No Kartu : "+formdata['noKartu']+"\n";            
                        pesan += "No MR : "+formdata['nomr']+"\n";         
                        pesan += "Nama Pasien : "+formdata['nama']+"\n";         
                        pesan += "Silahkan perbaiki data terlebih dahulu.";            

                        tampilkanPesan('error',pesan,titleNotif);
                        $('.btn').removeClass('disabled');
                        $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Data klaim gagal digenerate');                                
                        $('div.loading').hide('slow');
                    }
                    // window.location.href = url;   
                    // window.open(url);              
                }else if(data.metaData.code == 201){
                    titleNotif = 'SEP';
                    pesan = data.metaData.message;            
                    tampilkanPesan('error',pesan,titleNotif);
                    $('.btn').removeClass('disabled');
                    $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Data klaim gagal digenerate');                                
                    $('div.loading').hide('slow');
                }else{
                    titleNotif = 'SEP ';
                    pesan = data.metaData.message;            
                    tampilkanPesan('error',pesan,titleNotif);
                    $('.btn').removeClass('disabled');
                    $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Data klaim gagal digenerate');                                
                    $('div.loading').hide('slow');
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('.btn').removeClass('disabled');
                $('div.loading').html('<i class="fa fa-spin fa-refresh"></i> Pengecekan SEP gagal');
                $('div.loading').hide('slow');
                console.log(jqXHR.responseText);    
            }
        });        
    }
}

function tampilkanPesan(a,b,c=""){
    if (a=='error') {        
        swal({
            title: c,
            text: b,
            type: "error",
            confirmButtonColor: "#f00",
            confirmButtonText: "OK"
        });
    }else if(a=='success'){
        swal({
            title: "Data SEP ditemukan",
            text: b,
            type: "success",
            confirmButtonColor: "#034a03",
            confirmButtonText: "OK"
        });
    }else{
        alert(b);
    }
}

</script>
