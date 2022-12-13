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
    /*.modal-content {
        max-height: 600px;
        overflow: scroll;
    }*/
</style>       
<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getPoliByID($ruangID) ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Silahkan cari pasien yang melakukan tindakan / layanan di <?php echo getPoliByID($ruangID) ?>. 
        Pasien yang tampil secara default adalah pasien yang dikirim atas rujukan internal pada hari ini. 
        Untuk mencari pasien yang terdaftar pada hari lainnya, 
        silahkan masukan No Registrasi RS / No Registrasi Unit <?php echo getPoliByID($ruangID) ?> / No MR Pasien 
        kemudian tekan enter atau klik tombol Cari Pasien
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnKembali" class="btn btn-default">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh Untuk Lihat Kunjungan Hari Ini</a>
                    </h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No Registrasi RS / No MR" style="width: 350px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i> Cari Pasien</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 80px">Tgl.Minta</th>
                                <th style="width: 100px">No.Reg RS</th>
                                <th style="width: 120px">Unit Pengirim</th>
                                <th>Dokter Pengirim</th>
                                <th style="width: 60px">No MR</th>
                                <th>Nama Pasien</th>
                                <th>Keterangan</th>
                                <th style="width: 100px">Action</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Modal-->
    <div class="modal fade" id="modal_rujukan_internal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Daftarkan Pasien</h3>
                </div>

                <div class="modal-body form">
                    <form class="form-horizontal" method="POST" id="form" action="#" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="no_permintaan" id="no_permintaan" value="">
                            <input type="hidden" name="id_daftar" id="id_daftar" value="">
                            <input type="hidden" name="rag_unit" id="reg_unit" value="">
                            <input type="hidden" name="nomr" id="nomr" value="">
                            <input type="hidden" name="nama_pasien" id="nama_pasien" value="">
                            <input type="hidden" name="ruang_pengirim" id="ruang_pengirim" value="">
                            <input type="hidden" name="nama_ruang_pengirim" id="nama_ruang_pengirim" value="">
                            <input type="hidden" name="id_poli" id="id_poli" value="">
                            <input type="hidden" name="nama_poli" id="nama_poli" value="">
                            <input type="hidden" name="dokter_pengirim" id="dokter_pengirim" value="">
                            <input type="hidden" name="nama_dokter_pengirim" id="nama_dokter_pengirim" value="">
                            <input type="hidden" name="keterangan" id="keterangan" value="">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Dokter Jaga</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="dokterJaga" name="dokterJaga">
                                        <option value="">Pilih</option>
                                        <?php 
                                        foreach ($getDokter->result() as $d) {
                                            ?>
                                            <option value="<?= $d->NRP ?>"><?= $d->pgwNama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class ext-error" id="err_dokterJaga"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="daftarkanPasien()" class="btn btn-success">Daftarkan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'nota_tagihan.php/rujuk_internal' ?>';
        window.location.href = url;
    });
    $('#btnRefresh').click(function(){
        $('#keyword').val('');
        window.location.reload();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        var a = '<?php echo $ruangID ?>';
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'nota_tagihan.php/rujuk_internal/getView' ?>",
                type        : "POST",
                data        : {ruangID:a,sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        var a = '<?php echo $ruangID ?>';
        $.ajax({
            url         : "<?php echo base_url().'nota_tagihan.php/rujuk_internal/getView' ?>",
            type        : "POST",
            data        : {ruangID:a,sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    });
    
});

// Function
function getTable(){
    var a = '<?php echo $ruangID ?>';
    $.ajax({
        url         : "<?php echo base_url().'nota_tagihan.php/rujuk_internal/getView' ?>",
        type        : "POST",
        data        : {ruangID:a},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}

function registrasiPasien(a){
    var xRuang = '<?php echo getRuangByID($ruangID) ?>';
    var b = '<?php echo $ruangID ?>';
    var x = confirm("Apakah anda yakin akan meregistrasikan pasien ini di " + xRuang + "?");
    if(x){
        if(a==""){
            alert('Ops. Id rujukan internal tidak ditemukan. coba ulangi lagi');
        }else if(b==""){
            alert('Ops. Kode ruang tidak ditemukan. coba ulangi lagi');
        }else{
            var url="<?= base_url() ."nota_tagihan.php/rujuk_internal/detail_rujukan/" ?>"+a;
            console.log(url);
            $.ajax({
                url : url,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('#modal_rujukan_internal').modal('show');
                    $('#no_permintaan').val(data["idx"]); 
                    $('#id_daftar').val(data["id_daftar"]);
                    $('#reg_unit').val(data["reg_unit"]);
                    $('#nomr').val(data["nomr"]);
                    $('#nama_pasien').val(data["nama_pasien"]);
                    $('#ruang_pengirim').val(data["ruang_pengirim"]);
                    $('#nama_ruang_pengirim').val(data["nama_ruang_pengirim"]);
                    $('#id_poli').val(data["id_poli"]);
                    $('#nama_poli').val(data["nama_poli"]);
                    $('#dokter_pengirim').val(data["dokter_pengirim"]);
                    $('#nama_dokter_pengirim').val(data["nama_dokter_pengirim"]);
                    $('#keterangan').val(data["keterangan"]);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("Gagal Saat Pengambilan data");
                }
            });
            /*var postData = {}
            postData["no_permintaan"] = a;
            postData["id_ruang"] = b;            
            $.ajax({
                url     : "<?php echo base_url().'nota_tagihan.php/rujuk_internal/registrasiPasien' ?>",
                type    : "POST",
                data    : postData,
                dataType: "JSON",
                success : function(data){
                    if(data.code == 200){
                        var url = '<?php echo base_url().'nota_tagihan.php/rujuk_internal/reg_success?uid=' ?>' + data.url;
                        window.location.href = url;
                    }else{
                        alert(data.message)
                    }
                },
                error   : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });*/
        }
    }
    
}

function daftarkanPasien(){
        var a=$('#no_permintaan').val();
        var b = '<?php echo $ruangID ?>';
        var c = $('#dokterJaga').val();
        var d = $('#dokterJaga :selected').html();
        var postData = {}
            postData["no_permintaan"] = a;
            postData["id_ruang"] = b;
            postData["dokterJaga"] = c; 
            postData["namaDokterJaga"] = d;            
            $.ajax({
                url     : "<?php echo base_url().'nota_tagihan.php/rujuk_internal/registrasiPasien' ?>",
                type    : "POST",
                data    : postData,
                dataType: "JSON",
                success : function(data){
                    if(data.code == 200){
                        var url = '<?php echo base_url().'nota_tagihan.php/rujuk_internal/reg_success?uid=' ?>' + data.url;
                        window.location.href = url;
                    }else{
                        alert(data.message)
                    }
                },
                error   : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });
    }
</script>
