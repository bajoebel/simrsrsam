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
</style>       
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-widget widget-report">                    
                <div class="widget-user-header bg-aqua-active">
                    <h3><?php echo $contentTitle ?></h3>
                </div>

                <div class="box-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="input-group-sm btn-block">
                            <label>Periode Awal</label>
                            <input type="text" name="tglAwal" id="tglAwal" class="form-control tanggal" placeholder="dd/mm/yyyy"/>
                        </div> 
                        <div class="input-group-sm btn-block">
                            <label>Periode Akhir</label>
                            <input type="text" name="tglAkhir" id="tglAkhir" class="form-control tanggal" placeholder="dd/mm/yyyy"/>
                        </div> 
                        <div class="input-group-sm btn-block">
                            <label>Lokasi Stok</label>
                            <select id="KDLOKASI" class="form-control">
                                <option value=""></option>
                                <?php foreach ($datLokasi->result_array() as $x): ?>
                                <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> 
                        <hr>
                        <div class="input-group-sm btn-block">
                            <label>Keywords</label>
                            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter keywords"/>
                        </div>
                        <div class="input-group-sm btn-block">
                            <label>Maksimal view record : 100</label>
                        </div>
                    </form>
                    
                    <button type="button" id="btnKeyword" class="btn btn-danger btn-block">
                        <i class="fa fa-search"></i> <b>Tampilkan Data</b></button>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th style="width: 60px">Kode</th>
                                <th>Nama Obat / Alkes</th>
                                <th style="width: 120px">Satuan</th>
                                <th style="width: 120px">Kategori</th>
                                <th style="width: 120px">Jenis</th>
                                <th style="width: 60px">#</th>
                            </tr>        
                        </thead>
                        <tbody id="getdata">
                            <tr><td colspan="7">Data masih kosong</td></tr>
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
    $('select').select2({placeholder:"Pilih Lokasi Obat"});
    $('#tglAwal').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#tglAkhir').focus();
        }
    });
    $('#tglAkhir').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KDLOKASI').focus();
        }
    });
    $('#keywords').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#btnKeyword').click();
        }
    });
    $('#btnKeyword').click(function(){
        a = $('#keywords').val();
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/lap_kartu_stok/getObat' ?>",
            type        : "POST",
            data        : {keywords:a},
            beforeSend  : function(){
                $('#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('#getdata').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('#getdata').html('<tr><td colspan=7>Data tidak ditemukan</td></tr>');
                console.log(jqXHR.responseText);
            }
        });
    });
});

function cetak(a){
    b = $('#tglAwal').val();
    c = $('#tglAkhir').val();
    d = $('#KDLOKASI').val();

    if (b==""){
        alert('Periode awal harus diisi');
        $('#tglAwal').focus();
    }else if(c==""){
        alert('Periode akhir harus diisi');
        $('#tglAkhir').focus();
    }else if(d==""){
        alert('Lokasi belum dipilih');
        $('#KDLOKASI').focus();
    }else{
        var url = '<?php echo base_url().'farmasi.php/lap_kartu_stok/cetak?kode=' ?>'+a+'&tAwal='+b+'&tAkhir='+c+'&kLok='+d;
        openInNewTab(url);
    }    
}
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
} 
</script>
