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
    .modal-content {max-height: 600px;}
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
    .w300{width: 300px;}
    .w350{width: 350px;}
    .w400{width: 400px;}
    .w450{width: 450px;}
    input{border: none;}
    #convNilai{font-size: 20px}
    table#titleRekap tr td{padding: 2px}
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> </h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Data pengembalian berkas yang tampil pada tabel pencarian merupakan berkas yang telah dientrykan oleh petugas pemeriksaan KLPCM. Anda dapat mengedit data dengan menekan tombol <b>Edit</b> pada halaman utama. Jangan merefresh browser. Tindakan ini akan mengakibatkan system menggenerate kode rekap baru.    
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnKembali" class="btn btn-danger">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnRefresh" class="btn btn-success">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                        <a href="#" id="btnCetak" class="btn btn-danger">
                            <i class="glyphicon glyphicon-print"></i> Cetak Rekap</a>
                    </h3>
                </div>


                <div class="box-body table-responsive no-padding">
                    <form id="formItem" action="#" method="post" onsubmit="return false">
                    <div style="padding: 10px">
                        <h4>
                            <table id="titleRekap">
                                <tr>
                                    <td class="w120">Kode Rekap</td>
                                    <td class="w10">:</td>
                                    <td>
                <input readonly="" type="text" class="form-control" name="txtIdpengembalian_berkas" id="txtIdpengembalian_berkas" value="<?php echo $idx ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tgl.Rekap</td>
                                    <td>:</td>
                                    <td>
                <input readonly="" type="text" class="form-control" name="txtTglRekap" id="txtTglRekap" value="<?php echo $tanggal ?>">
                                    </td>
                                </tr>
                            </table>
                        </h4>
                    </div>

                    
                    <table class="table table-bordered">
                        <tr>
                            <th class="w120">
                                <input readonly="" type="text" class="form-control" name="txtNoRegRS" id="txtNoRegRS" placeholder="No.Reg RS">
                            </th>
                            <th class="w120">
                                <input readonly="" type="text" class="form-control" name="txtNoMR" id="txtNoMR" placeholder="No.MR">
                            </th>
                            <th>
                                <input type="text" class="form-control" name="txtNama" id="txtNama" placeholder="Enter No.Reg RS/No.MR/Nama">
                            </th>
                            <th class="w200">
                                <input type="hidden" name="txtIdRuang" id="txtIdRuang">
                                <input readonly="" type="text" class="form-control" id="txtViewRuang" placeholder="Tempat Layanan">
                            </th>
                            <th class="w120">
                                <input readonly="" type="text" class="form-control tanggal"name="txtTglProses" id="txtTglProses">
                            </th>
                            <th class="w220">
                                <input type="text" class="form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan">
                            </th>
                            <th class="w60">
                                <a href="#" onclick="simpanItemStatus()" class="btn btn-danger btn-block">
                                    <i class="fa fa-floppy-o"></i></a>
                            </th>
                        </tr>
                    </table>
                    </form>
                </div>

                <div class="box-body table-responsive no-padding">
                    <div id="divCariPasien" style="display: none;padding: 10px;border: 1px solid #c1c1c1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="5">
                                        <button class="btn btn-danger" id="closeDivCariPasien">Tutup</button>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="rataTengah w150">No. Reg RS</th>
                                    <th class="rataTengah w100">No. MR</th>
                                    <th class="">Nama Pasien</th>
                                    <th class="rataTengah w200">Tempat Layanan</th>
                                    <th class="rataTengah w250">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="getPasien"></tbody>
                        </table>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <div class="divDetailItem" style="display: block">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="rataTengah w60">#</th>
                                    <th class="rataTengah w100">No.Reg RS</th>
                                    <th class="rataTengah w100">No.MR</th>
                                    <th class="">Nama Pasien</th>
                                    <th class="w200">Tempat Layanan</th>
                                    <th class="rataTengah w100">Tgl.Proses</th>
                                    <th class="w250">Keterangan</th>
                                    <th class="rataTengah w60">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="getPengembalianStatus"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
        
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    var id_pengembalian_berkas = '<?php echo $idx ?>';
    getStatusKembali(id_pengembalian_berkas);

    $('input').focus(function(){return this.select();});    
    $('.tanggal').datepicker({
        autoclose : true,
        format    : "dd/mm/yyyy"
    });
    $('#txtTglProses').val('<?php echo date('d/m/Y') ?>');
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'mr_dokumen.php/pengembalian_berkas' ?>';
        window.location.href = url;    
    });
    $('#btnRefresh').click(function(){
        getStatusKembali(id_pengembalian_berkas);
    });
    $('#btnCetak').click(function(){
        var a = $('#txtIdpengembalian_berkas').val();
        if(a == ""){
            alert("Kode rekap tidak boleh kosong");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/cekRekap' ?>",
                type        : "POST",
                data        : {id_pengembalian_berkas:a},
                dataType    : "JSON",
                success : function(data){
                    if(data.error){
                        alert(data.message);
                    }else{
                        var url = '<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/cetak?kode=' ?>'+a;
                        window.open(url);  
                    }
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            }); 
        }
    });
    
    
    $('#txtTglProses').blur(function(){
        if($(this).val() == ""){
            $(this).val('<?php echo date('d/m/Y') ?>');
        }
    });
    $('#closeDivCariPasien').click(function(){
        $('#divCariPasien').hide();
    });
    $('#txtNama').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var a = $(this).val();
            if(a == ""){
                alert("Keyword masih kosong");
                $('#txtNama').focus();
            }else{
                $.ajax({
                    url         : "<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/getPasien' ?>",
                    type        : "POST",
                    data        : {sLike:a},
                    beforeSend  : function(){
                        $('tbody#getPasien').html("<tr><td colspan=10><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success : function(data){
                        $('tbody#getPasien').html(data);
                        $('#divCariPasien').show();
                    },
                    error : function(jqXHR,ajaxOption,errorThrown){
                        alert(jqXHR.responseText);
                    }
                }); 
            } 
        }
    });
    $('#txtKeterangan').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            simpanItemStatus();
        }
    });
    
});
function getStatusKembali(a){
    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/getPengembalianStatus' ?>",
        type        : "POST",
        data        : {id_pengembalian_berkas:a},
        beforeSend  : function(){
            $('tbody#getPengembalianStatus').html("<tr><td colspan=10><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getPengembalianStatus').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
        }
    });            
}
function pilihKunjungan(a,b,c,d,e){
    $('#txtNoRegRS').val(a);
    $('#txtNoMR').val(b);
    $('#txtNama').val(c);
    $('#txtIdRuang').val(d);
    $('#txtViewRuang').val(e);
    $('#txtTglProses').val('<?php echo date('d/m/Y') ?>');
    $('#txtKeterangan').focus();
}
function simpanItemStatus(){
    var postData = {}
        postData["id_pengembalian_berkas"] = $('#txtIdpengembalian_berkas').val();
        postData["id_daftar"] = $('#txtNoRegRS').val();
        postData["nomr"] = $('#txtNoMR').val();
        postData["nama_pasien"] = $('#txtNama').val();
        postData["id_ruang"] = $('#txtIdRuang').val();
        postData["nama_ruang"] = $('#txtViewRuang').val();
        postData["tgl_proses"] = $('#txtTglProses').val();
        postData["keterangan"] = $('#txtKeterangan').val();

    if(postData["id_pengembalian_berkas"]==""){
        alert('Ops. Kode rekap kosong. Tutup form dan coba ulangi kembali');
    }else if(postData["id_daftar"]==""){
        alert('Ops. No.Reg RS kosong. Pastikan No.Reg RS anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(postData["nomr"]==""){
        alert('Ops. No.MR kosong. Pastikan No.MR anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(postData["nama_pasien"]==""){
        alert('Ops. Nama kosong. Pastikan Nama anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(postData["id_ruang"]==""){
        alert('Ops. Kode lokasi kosong. Pastikan Kode lokasi anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(postData["nama_ruang"]==""){
        alert('Ops. Lokasi pelayanan kosong. Pastikan lokasi layanan tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(postData["tgl_proses"]==""){
        alert('Ops. Tanggal proses berkas kosong. Silahkan isi tanggal proses berkas.');
        $('#txtTglProses').focus();
    }else if(postData["keterangan"]==""){
        alert('Ops. Keterangan kosong. Silahkan isi keterangan.');
        $('#txtKeterangan').focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/simpanItem' ?>",
            type        : "POST",
            data        : postData,
            dataType    : "JSON",
            success     : function(data){
                $('#divCariPasien').hide();
                if(data.code==200){
                    getStatusKembali(postData["id_pengembalian_berkas"]);
                    $('#txtNoRegRS').val('');
                    $('#txtNoMR').val('');
                    $('#txtNama').val('');
                    $('#txtIdRuang').val('');
                    $('#txtViewRuang').val('');
                    $('#txtTglProses').val('<?php echo date('d/m/Y') ?>');
                    $('#txtKeterangan').val('');
                    $('#txtNama').focus();
                }else{
                    alert(data.message);
                }  
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
                alert(jqXHR.responseText);
            }
        });
    }
}  
function cetakNota(a){
    var url = '<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/cetak?kode=' ?>'+a;
    window.open(url);    
}
function hapusItem(a,b){
    var x = confirm("Apakah anda yakin akan menghapus item ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/pengembalian_berkas/hapusItem' ?>",
            type        : "POST",
            data        : {idx:a},
            dataType    : "JSON",
            success : function(data){
                if(data.code == 200){
                    getStatusKembali(b);
                }else{
                    alert(data.message);
                }
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        }); 
    }
} 
</script>