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
    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }
    a.disabled {
      pointer-events: none;
      cursor: default;
    }    
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> Gawat Darurat</h1>
</section>
<?php //if(!empty($ruang)) { ?>
<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Silahkan cari pasien yang melakukan tindakan / layanan di IGD. 
        Pasien yang tampil secara default adalah pasien yang terdaftar pada hari ini. 
        <br/>
        Untuk mencari pasien yang terdaftar pada hari lainnya, 
        silahkan masukan No Registrasi RS / No Registrasi Unit Gawat Darurat / No MR Pasien 
        <br/>
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
                            <i class="glyphicon glyphicon-refresh"></i> Refresh Untuk Lihat Kunjungan Hari Ini </a>
                        
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No Registrasi RS / No Registrasi Unit / No MR" style="width: 350px"/>
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
                                <th style="width: 100px">No.Reg RS</th>
                                <th style="width: 120px">No.Reg Unit</th>
                                <th style="width: 80px">Tgl.Masuk</th>
                                <th style="width: 60px">No MR</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter Jaga</th>
                                <th>Ruangan</th>
                               <th style="width: 80px">Tgl.Lahir</th>
                                <th style="width: 80px">Jns.Kelamin</th>
                                <th style="width: 100px">Mode Bayar</th>
                                
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

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('input').focus(function(){return $(this).select();});
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'nota_tagihan.php/nota_tagihan' ?>';
        window.location.href = url;
    });
    $('#btnRefresh').click(function(){
        getTable();
        $('input').val('');
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        var a = 'GD';
        var formdata = {
            jnsLayanan : a,
            sLike   : $('#keyword').val()
        }
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'nota_tagihan.php/nota_tagihan/getViewigd' ?>",
                type        : "POST",
                data        : formdata,
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    $('tbody#getdata').html('<tr><td colspan=10>Data tidak ditemukan<td></tr>');
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        var a = 'GD';
        var formdata = {
            jnsLayanan : a,
            sLike   : $('#keyword').val()
        }
        $.ajax({
            url         : "<?php echo base_url().'nota_tagihan.php/nota_tagihan/getViewigd' ?>",
            type        : "POST",
            data        : formdata,
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getdata').html('<tr><td colspan=10>Data tidak ditemukan<td></tr>');
                console.log(jqXHR.responseText);
            }
        });            
    });
    
});

// Function
function getTable(){
    var a = 'GD';
    $.ajax({
        url         : "<?php echo base_url().'nota_tagihan.php/nota_tagihan/getViewigd' ?>",
        type        : "POST",
        data        : {jnsLayanan:a},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getdata').html('<tr><td colspan=10>Data tidak ditemukan<td></tr>');
            console.log(jqXHR.responseText);
        }
    });            
}

function pilihPasien(a,b){
    //alert(a + b);
    var url = '<?php echo base_url().'nota_tagihan.php/nota_tagihan/entry_nota?idx=' ?>' + a + '&kLok=' + b;
    window.location.href = url;
}
</script>
