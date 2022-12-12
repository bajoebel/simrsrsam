<style>
    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }
    .widget-report .widget-user-header{
        padding: 5px 10px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    tr.item td:not(.desk){
        text-align: right;
    }
    table{
        border-collapse: collapse;
        table-layout: fixed;
        width: 8.5in;
    }
    th{
        text-align: center;
    }
    td,th{
        word-wrap:break-word;
    }
    th{vertical-align: middle;}
    td{vertical-align: top;}
</style>  
<?php
    $bulan = array(
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
?>    
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section> 
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-success">                    
                <div class="box-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="input-group-sm btn-block">
                            <label>Tahun</label>
                            <select id="Tahun" class="form-control">
                                <option value=""></option>
                                <?php for($i=2019;$i <= date('Y');$i++ ): ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <hr>
                    </form>
                    
                    <button type="button" id="btnKeyword" class="btn btn-danger btn-block">
                        <i class="fa fa-search"></i> <b>Lihatlah Data</b></button>
                    <button type="button" id="btnCetak" class="btn btn-danger btn-block">
                        <i class="fa fa-print"></i> <b>Cetak</b></button>

                    <hr>
                    <div class="input-group-sm btn-block">
                        <label class="btn-block">Keterangan Tabel</label>
                    </div>
                    <hr>
                    <div class="input-group-sm btn-block">
                        <label class="btn-block">NDT</label>
                        <span>No.Daftar terperinci</span>
                    </div>
                    <div class="input-group-sm btn-block">
                        <label class="btn-block">GSP</label>
                        <span>Golongan sebab penyakit</span>
                    </div>
                    <div class="input-group-sm btn-block">
                        <label class="btn-block">PKHM-JK</label>
                        <span>Pasien Keluar (Hidup & Mati) Menurut Jenis Kelamin</span>
                    </div>
                    <div class="input-group-sm btn-block">
                        <label class="btn-block">JPKH</label>
                        <span>Jumlah Pasien Keluar Hidup</span>
                    </div>
                    <div class="input-group-sm btn-block">
                        <label class="btn-block">JPKM</label>
                        <span>Jumlah Pasien Keluar Mati</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="3" width="50px">No.DTD</th>
                                <th rowspan="3" width="100px">NDT</th>
                                <th rowspan="3" width="100px">GSP</th>
                                <th colspan="18">Jumlah Pasien Hidup dan Mati menurut Golongan Umur & Jenis Kelamin</th>
                                <th colspan="2" rowspan="2" width="70px">PKHM-JK</th>
                                <th rowspan="3" width="70px">JPKH</th>
                                <th rowspan="3" width="70px">JPKM</th>
                            </tr>
                            <tr>
                                <th colspan="2" style="width: 80px">0-6H</th>
                                <th colspan="2" style="width: 80px">6-28H</th>
                                <th colspan="2" style="width: 80px">28H-1T</th>
                                <th colspan="2" style="width: 80px">1T-4T</th>
                                <th colspan="2" style="width: 80px">4T-14T</th>
                                <th colspan="2" style="width: 80px">14T-24T</th>
                                <th colspan="2" style="width: 80px">24T-44T</th>
                                <th colspan="2" style="width: 80px">44T-64T</th>
                                <th colspan="2" style="width: 80px">>64T</th>
                            </tr>
                            <tr>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>L</th>
                                <th>P</th>
                                <th>LK</th>
                                <th>PR</th>
                            </tr>        
                        </thead>
                        <tbody id="getdata">
                            <tr><td colspan="25">Data masih kosong</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>      
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    $('input,textarea').focus(function(){return $(this).select();});
    $('.tanggal').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('.tanggal').datepicker({
        autoclose : true,
        format    : "dd/mm/yyyy"
    });   
    $('select').select2({placeholder:"Pilih option"});
    $('#btnKeyword').click(function(){
        a = $('#Tahun').val();
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/sirs/ranap/morbodotas/getReport' ?>",
            type        : "POST",
            data        : {Tahun:a},
            beforeSend  : function(){
                $('#getdata').html("<tr><td colspan=13><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('#getdata').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('#getdata').html('<tr><td colspan=13>Data tidak ditemukan</td></tr>');
                console.log(jqXHR.responseText);
            }
        });
    });
    $('#btnCetak').click(function(){
        a = $('#Tahun').val();
        var url = '<?php echo base_url().'mr_dokumen.php/sirs/ranap/morbodotas/cetak?thn=' ?>'+a;
        openInNewTab(url);        
    });
});

function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
} 
</script>
