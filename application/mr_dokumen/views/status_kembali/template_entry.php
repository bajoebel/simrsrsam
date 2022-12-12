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
        Data pengembalian status kembali yang tampil pada tabel pencarian merupakan pasien yang telah dipulangkan oleh petugas terakhir tempat pasien dirawat dan dokumen statusnya diserahkan oleh petugas ruangan ke petugas pengolah data. Anda dapat mengedit data pengembalian status dengan menekan tombol <b>Edit</b> pada halaman utama pengembalian status. Jangan merefresh browser. Tindakan ini akan mengakibatkan system menggenerate kode rekap baru.
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
                    <form id="formItem" method="post" onsubmit="return false">
                        <div style="padding: 10px">
                            <h4>
                                <table id="titleRekap">
                                    <tr>
                                        <td class="w120">Kode Rekap</td>
                                        <td class="w10">:</td>
                                        <td>
                                            <input readonly type="text" class="form-control" name="txtIdKembali" id="txtIdKembali" value="<?php echo $idx ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl.Rekap</td>
                                        <td>:</td>
                                        <td>
                                            <input readonly type="text" class="form-control" name="txtTglRekap" id="txtTglRekap" value="<?php echo $tgl_kembali ?>">
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
                                    <input readonly="" type="text" class="form-control" id="txtViewIdRuang" placeholder="Lokasi Pelayanan">
                                </th>
                                <th class="w120">
                                    <input readonly="" type="text" class="form-control tanggal"name="txtTglKembali" id="txtTglKembali">
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
                                    <th class="rataTengah w100">No. Urut</th>
                                    <th class="rataTengah w150">No. Reg RS</th>
                                    <th class="rataTengah w100">No. MR</th>
                                    <th class="">Nama Pasien</th>
                                    <th class="">Lokasi pelayanan</th>
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
    $('#txtTglKembali').val('<?php echo date('d/m/Y') ?>');
    var id_kembali = '<?php echo $idx ?>';
    $('select').select2({placeholder:'Pilih Lokasi Layanan'});
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'mr_dokumen.php/status_kembali' ?>';
        window.location.href = url;    
    });
    $('#btnRefresh').click(function(){
        window.location.reload();    
    });
    $('#btnCetak').click(function(){
        var a = $('#txtIdKembali').val();
        if(a == ""){
            alert("Kode rekap tidak boleh kosong");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/cekRekap' ?>",
                type        : "POST",
                data        : {id_kembali:a},
                dataType    : "JSON",
                success : function(data){
                    if(data.error){
                        alert(data.message);
                    }else{
                        var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/cetak?kode=' ?>'+a;
                        window.open(url);  
                    }
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            }); 
        }
    });
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd/mm/yyyy"
    })
    getStatusKembali(id_kembali);
    $('input').focus(function(){
        return this.select();
    });
    $('#txtTglKembali').blur(function(){
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
                    url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/getPasien' ?>",
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
        url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/getPengembalianStatus' ?>",
        type        : "POST",
        data        : {id_kembali:a},
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
    $('#txtViewIdRuang').val(e);
    $('#txtTglKembali').val('<?php echo date('d/m/Y') ?>');
    $('#txtKeterangan').focus();
}
function simpanItemStatus(){
    var postData = {}
        postData["id_kembali"] = $('#txtIdKembali').val();
        postData["id_daftar"] = $('#txtNoRegRS').val();
        postData["nomr"] = $('#txtNoMR').val();
        postData["nama_pasien"] = $('#txtNama').val();
        postData["id_ruang"] = $('#txtIdRuang').val();
        postData["nama_ruang"] = $('#txtViewIdRuang').val();
        postData["tgl_kembali"] = $('#txtTglKembali').val();
        postData["keterangan"] = $('#txtKeterangan').val();

    
    if(postData["id_kembali"]==""){
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
        alert('Ops. Lokasi pelayanan kosong. Pastikan Lokasi pelayanan tampil. atau pilih dokumen pasien kembali.');
    }else if(postData["tgl_kembali"]==""){
        alert('Ops. Tanggal pengembalian berkas kosong. Silahkan isi tanggal pengembalian berkas.');
        $('#txtTglKembali').focus();
    }else if(postData["keterangan"]==""){
        alert('Ops. Keterangan kosong. Silahkan isi keterangan.');
        $('#txtKeterangan').focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/simpanItem' ?>",
            type        : "POST",
            data        : postData,
            dataType    : "JSON",
            success     : function(data){
                $('#divCariPasien').hide();
                if(data.code==200){
                    getStatusKembali(postData["id_kembali"]);
                    $('#txtNoRegRS').val('');
                    $('#txtNoMR').val('');
                    $('#txtNama').val('');
                    $('#txtIdRuang').val('');
                    $('#txtViewIdRuang').val('');
                    $('#txtTglKembali').val('<?php echo date('d/m/Y') ?>');
                    $('#txtKeterangan').val('');
                    $('#txtNama').focus();
                }else{
                    alert(data.message);
                }  
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
            }
        });
    }
}  
function cetakNota(a){
    var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/cetak?kode=' ?>'+a;
    window.open(url);    
}
function hapusItem(a,b){
    var x = confirm("Apakah anda yakin akan menghapus item ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/hapusItem' ?>",
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
