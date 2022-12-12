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
    table#tabelCariKunjungan tr td {padding: 2px}
    .w10{width: 10px}
    .w50{width: 50px}
    .w100{width: 100px}
    .w150{width: 150px}
    .w200{width: 200px}
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="input-group input-group-sm">
                        <div class="input-group-btn"></div>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm"></div>
                    </div>
                </div>

                <div class="box-body">
                    <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                        <table id="tabelCariKunjungan">
                            <tr>
                                <td class="w150">Periode Kunjungan</td>
                                <td class="w10">:</td>
                                <td class="w150">
                                    <input type="text" readonly="" class="form-control tanggal" name="tglAwal" id="tglAwal" placeholder="____-__-__">
                                </td>
                                <td class="w10">&nbsp;</td>
                                <td class="w150">
                                    <input type="text" readonly="" class="form-control tanggal" name="tglAkhir" id="tglAkhir" placeholder="____-__-__">
                                </td>
                            </tr>
                            <tr>
                                <td>Filter Berdasarkan Cara Bayar</td>
                                <td>:</td>
                                <td colspan="3">
                                    <select class="form-control" name="cmbCaraBayar" id="cmbCaraBayar">
                                        <option value="ALL">Semua Cara Bayar</option>
                                        <?php foreach ($getCaraBayar->result_array() as $x): ?>
                                        <option value="<?php echo $x['idx'] ?>"><?php echo $x['cara_bayar'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="4">
                                    <button type="button" id="btnCariKwitansi" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Cari</button>
                                    <button type="button" id="btnCetak" class="btn btn-danger">
                                        <i class="fa fa-print"></i> Cetak</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 100px">No Kwitansi</th>
                                <th style="width: 100px">Tgl. Kwitansi</th>
                                <th style="width: 100px">No Reg RS</th>
                                <th style="width: 80px">No MR</th>
                                <th>Nama Pasien</th>
                                <th style="width: 100px">Cara Bayar</th>
                                <th>DPJP</th>
                                <th style="width: 100px">Grand Total</th>
                            </tr>    
                        </thead>
                        <tbody id="getHistory">
                            <tr>
                                <td colspan="9">Data masih kosong</td>
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
    //Date picker
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "yyyy-mm-dd"
    })
    $('select').select2({placeholder:'Pilih Semua'})
    $('#btnCariKwitansi').click(function(){
        var a = $('#tglAwal').val();
        var b = $('#tglAkhir').val();
        if(a == '' || b == ''){
            alert('Periode tanggal tidak boleh kosong');
        }else{
            $.ajax({
                url     : "<?php echo base_url().'kasir.php/laporan/cari_kwitansi' ?>",
                type    : "POST",
                data    : $('#form1').serialize(),
                success : function(data){
                    $('#getHistory').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });               
        }
    }); 
    $('#btnCetak').click(function(){
        var a = $('#tglAwal').val();
        var b = $('#tglAkhir').val();
        var c = $('#cmbCaraBayar').val();

        if(a == '' || b == ''){
            alert('Periode tanggal tidak boleh kosong');
        }else{
            var url = '<?php echo base_url().'kasir.php/laporan/cetak_kwitansi?tAwal=' ?>'+a+'&tAkhir='+b+'&cara_bayar='+c;
            window.open(url);
        }
    }); 
});  
</script>
