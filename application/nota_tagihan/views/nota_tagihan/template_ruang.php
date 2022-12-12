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
    .btnLokasi{
        cursor: pointer;
    }
</style>       
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Silahkan pilih Poli / Ruang / Penunjang yang melakukan tindakan / layanan. <br/>
        Poli / Ruang / Penunjang yang tampil dibawah berdasarkan hak akses user.
    </div>            
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border"></div>

                <div class="box-body table-responsive">
                    <?php foreach ($getRuang->result_array() as $x): ?>
                        <div class="col-lg-3 col-xs-6 btnLokasi">
                            <div class="small-box bg-green" onclick="goLokasi('<?php echo $x['idx'] ?>')">

                                <div class="inner">
                                    <h3>Pilih</h3>
                                    <p><?php echo $x['ruang'] ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>      
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    $('#btnTambah').click(function(){
        var url = '<?php echo base_url().'nota_tagihan.php/nota_tagihan/tambah' ?>';
        window.location.href = url;
    });
});

function goLokasi(a){
    var url = '<?php echo base_url().'nota_tagihan.php/nota_tagihan/tambah?kLok=' ?>' + a;
    window.location.href = url;
} 
</script>
