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
    .rataTengah{text-align: center;}
    .w10 {width: 30px;}
    .w100 {width: 100px;}
    .w150 {width: 170px;}
    .w200 {width: 200px;}
    th {padding-bottom: 5px}
</style>       
<section class="content-header">
    <h1><?php echo $contentTitle ?> IGD</h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3>Maksimal Pencarian 20 Record</h3>
                    
                </div>

                <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                    <input type="hidden" name="ruangID" id="ruangID" value="IGD" />
                    <div class="box-body">
                        <table style="margin-left: 60px;width: 600px">
                            <tr>
                                <th class="w100">Filter</th>
                                <th class="w150">
                                    <select name="cmbFilter" id="cmbFilter" class="form-control w60">
                                        <option value="">Tampilkan Semua</option>
                                        <option value="id_daftar">By No.Reg RS</option>
                                        <option value="reg_unit">By No.Reg Unit</option>
                                        <option value="nomr">By No.MR</option>
                                    </select>
                                </th>
                                <th class="rataTengah w10">s/d</th>
                                <th colspan="2" class="w150">
                                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Enter filter">
                                </th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th colspan="3">
                                    <button type="button" id="btnCari" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-search"></i> Cari</button>
                                    <button type="button" id="btnKembali" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                </th>
                            </tr>
                        </table>
                    </div>
                </form>
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 100px">No.MR</th>
                                <th>Nama Pasien</th>
                                <th style="width: 100px">No.Reg RS</th>
                                <th style="width: 120px">No.Reg Unit</th>
                                <th>Unit Layanan</th>
                                <th style="width: 120px">Total</th>
                                <th style="width: 80px">Aksi</th>
                            </tr>    
                        </thead>
                        <tbody id="getHistory">
                            <tr>
                                <td colspan="10">Data masih kosong</td>
                            </tr>
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
    $('input').focus(function(){
        return this.select();
    });
    $('input').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'nota_tagihan.php/list_nota_tagihan' ?>';
        window.location.href = url;
    });
    $('#btnCari').click(function(){
        var formdata = {}
            formdata['ruangID'] = $('#ruangID').val();
            formdata['cmbFilter'] = $('#cmbFilter').val();
            formdata['keyword'] = $('#keyword').val();
        if(formdata['ruangID'] == ''){
            alert('Kode lokasi tidak boleh kosong');
        }else if(formdata['cmbFilter'] != '' && formdata['cmbFilter'] == ''){
            alert('Kata kunci filter tidak boleh kosong');
        }else{
            $.ajax({
                url     : "<?php echo base_url().'nota_tagihan.php/list_nota_tagihan/cari_nota' ?>",
                type    : "POST",
                data    : formdata,
                beforeSend : function(){
                    $('#getHistory').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('#getHistory').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    $('#getHistory').html("<tr><td colspan=8>Data tidak ditemukan</td></tr>");
                    console.log(jqXHR.responseText);
                }
            });               
        }
    }); 
});  
function cetak(a){
    var url = '<?php echo base_url().'nota_tagihan.php/nota_tagihan/cetak?kode=' ?>'+a;
    window.open(url);
}
</script>