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
        Pasien yang tampil secara default adalah pasien yang dikirim atas permintaan layanan penunjang pada hari ini. 
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

                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 80px">Tgl.Minta</th>
                                <th style="width: 100px">No.Reg RS</th>
                                <th style="width: 120px">Unit Pengirim</th>
                                <th style="width: 120px">Dokter Pengirim</th>
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
<div class="modal fade" id="persetujuanRegistrasi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Persetujuan Penunjang</h4>
            </div>
            <div class="modal-body">
                
                <form id="formPenunjang" role="form" action="<?= base_url() ."nota_tagihan.php/permintaan_penunjang/registrasiPasien" ?>" method="POST">
                    <div class="box-body">
                        <div class="row">
                        <div class="row">
                            <input type="hidden" name="no_permintaan" id="no_permintaan">
                            <input type="hidden" name="id_ruang" id="id_ruang" value="<?php echo $ruangID ?>">
                            <input type="hidden" name="jmldata" id="jmldata" value="">
                            <div class="form-group">
                                <div class="col-md-12"><label style="width: 100%">Pilih Dokter / Petugas</label></div>
                                <div class="col-md-12">
                                    <select name="dokterJaga" id="dokterJaga" class="form-control">
                                        <?php 
                                        foreach ($getDokter->result() as $res) {
                                            ?>
                                            <option value="<?= $res->NRP; ?>"><?= $res->pgwNama ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>   
                            <div class="form-group">
                                <div class="col-md-12"><label>Permintaan Tindakan</label> </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead class="bg-blue" >
                                            <th>No</th>
                                            <th>Layanan</th>
                                            <!--th>Jasa sarana</th-->
                                            <th>Jadwal Layanan</th>
                                            <th>Tarif Layanan</th>
                                            <th>Langsung Dilayani</th>
                                        </thead>
                                        <tbody id="permintaan-tindakan"></tbody>
                                    </table>
                                </div>
                            </div>       
                        </div>  
                        </div>                         
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-primary" onclick="registrasiPasien()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'nota_tagihan.php/permintaan_penunjang' ?>';
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
                url         : "<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/getView' ?>",
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
            url         : "<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/getView' ?>",
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
        url         : "<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/getView' ?>",
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

function persetujuanRegistrasi(a){
    $('#no_permintaan').val(a);
    $('#ruangid').val('<?php echo $ruangID ?>');
    permintaanTindakan(a);
    $('#persetujuanRegistrasi').modal('show');
}
function permintaanTindakan(a){
    var url = "<?= base_url() ."nota_tagihan.php/permintaan_penunjang/tindakan/" ?>"+a;
    console.log(url);
    $.ajax({
            url     : url,
            type    : "GET",
            dataType: "json",
            data    : {get_param : 'value'},
            success : function(data){
                //menghitung jumlah data
                //console.clear();
                $('#jmldata').val(data["row_count"]);
                //alert(data["row_count"]);

                if(data["status"]==true){
                    var tindakan    = data["data"];
                    console.log(tindakan);
                    var jmlData=tindakan.length;
                    var tabel   = "";
                    var start=0;
                    //Create Tabel
                    for(var i=0; i<jmlData;i++){
                        start++;
                        tabel+='<tr >';
                        tabel+="<td>"+start+"</td>";
                        tabel+="<td>"+tindakan[i]["layanan"]+"</td>";
                        tabel+="<td>"+tindakan[i]["jadwal_tindakan"]+"</td>";
                        tabel+="<td>"+tindakan[i]["tarif_layanan"]+"</td>";
                        tabel+="<td><input type='checkbox' value='1' id='status_dilayani_"+tindakan[i]["idx"]+"' name='status_dilayani_"+tindakan[i]["idx"]+"' class='status_dilayani' ></td>";
                        tabel+="</tr>";
                    }
                    $('#permintaan-tindakan').html(tabel);
                    
                }
            }
    });
}
function registrasiPasien(){
    var a= $('#no_permintaan').val();
    var xRuang = '<?php echo getRuangByID($ruangID) ?>';
    var b = '<?php echo $ruangID ?>';
    var c=$('#dokterJaga').val();
    var d=$('#dokterJaga :selected').html();
    var e="";
    //alert(a);
    var jmlData=$('#jmldata').val();
    for(var i=1; i<=parseInt(jmlData);i++){
        if ($('#status_dilayani_'+i).is(':checked')) {
            if(i==parseInt(jmlData)) e+="1";
            else e+="1,";
        }else{
            if(i==parseInt(jmlData)) e+="0";
            else e+="0,";
        }
    }
    var x = confirm("Apakah anda yakin akan meregistrasikan pasien ini di " + xRuang + "?");
    if(x){
        if(a==""){
            alert('Ops. Id permintaan penunjang tidak ditemukan. coba ulangi lagi');
        }else if(b==""){
            alert('Ops. Kode ruang tidak ditemukan. coba ulangi lagi');
        }else{
            /*var postData = {}
            postData["no_permintaan"] = a;
            postData["id_ruang"] = b;
            postData["dokterJaga"] = c;
            postData["namaDokterJaga"] = d;
            postData["status_dilayani"] = e;*/

            var formData = new FormData($('#formPenunjang')[0]);
            $.ajax({
                url : "<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/registrasiPasien' ?>",
                type: "POST",
                data : formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success : function(data){
                    if(data.code == 200){
                        console.clear();
                        console.log(data);
                        var url = '<?php echo base_url().'nota_tagihan.php/permintaan_penunjang/reg_success_penunjang?uid=' ?>' + data.url;
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
    }
}
</script>
