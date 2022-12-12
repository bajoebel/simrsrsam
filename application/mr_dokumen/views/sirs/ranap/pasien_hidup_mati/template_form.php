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
    tr th{text-align: center;}
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
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pelayanan</th>
                                <th>Keluar Hidup<br/>Pria</th>
                                <th>Keluar Hidup<br/>Wanita</th>
                                <th>Keluar Mati<br/>< 48 Jam<br/>Pria</th>
                                <th>Keluar Mati<br/>< 48 Jam<br/>Wanita</th>
                                <th>Keluar Mati<br/>> 48 Jam<br/>Pria</th>
                                <th>Keluar Mati<br/>> 48 Jam<br/>Wanita</th>
                                <th>Jumlah</th>
                            </tr>        
                        </thead>
                        <tbody id="getdata">
                            <tr><td colspan="8">Data masih kosong</td></tr>
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
            url         : "<?php echo base_url().'mr_dokumen.php/sirs/ranap/pasien_hidup_mati/getReport' ?>",
            type        : "POST",
            data        : {Tahun:a},
            beforeSend  : function(){
                $('#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('#getdata').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('#getdata').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
                console.log(jqXHR.responseText);
            }
        });
    });
    $('#btnCetak').click(function(){
        a = $('#Tahun').val();
        var url = '<?php echo base_url().'mr_dokumen.php/sirs/ranap/pasien_hidup_mati/cetak?thn=' ?>'+a;
        openInNewTab(url);        
    });
});

function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
} 
</script>
