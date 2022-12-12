<style>
    em{font-size: 11px}
    i em {color: red}
    .input-group-addon{border: none;}
    .rightAlign{text-align: right;}
    .centerAlign{text-align: center;}
    .conversi{border: 1px solid #d2d6de}
    .w10{width: 10px;}
    .w20{width: 20px;}
    .w30{width: 30px;}
    .w40{width: 40px;}
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
    .modal-content {max-height: 600px;}
    .rataKanan{text-align: right;}
    .rataTengah{text-align: center;}
    .jasa_sarana_display,.tarif_cito_display,.jasa_pelayanan_display,.tarif_layanan_display{
        min-width: 150px;display: inline-table;text-align: right;
    }
</style>

<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="left span4">
                        <button type="button" id="btnKembali" class="btn btn-danger">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                        <button type="button" id="btnRefresh" class="btn btn-danger">
                            <i class="glyphicon glyphicon-refresh"></i> Segarkan</button>
                        <button type="button" id="simpan_kwitansi" class="btn btn-danger">
                            <i class="glyphicon glyphicon-print"></i> Simpan & Cetak Kwitansi</button>
                    </div>

                    <div class="input-group input-group-sm">
                        <input type="text" id="keywordText" name="keywordText" class="form-control pull-right" placeholder="Enter No Registrasi RS ..." style="width: 200px"/>
                        <div class="input-group-btn">
                            <button type="button" id="keywordButton" class="btn btn-primary">
                                <i class="fa fa-search"></i> Cari
                            </button>
                            
                            <button type="button" id="Inquery" class="btn btn-danger">
                                <i class="fa fa-search"></i> Inquery
                            </button>
                            <!--  -->
                        </div>
                    </div>
                </div>

                <div class="box-body">

                    <div id="mainTitle">
                        <div class="col-md-12">
                            <form id="form1" method="post">
                                <div class="widget-box">
                                    <table class="table table-striped transObat">
                                        <tr>
                                            <td width="170px">No.Reg RS/No MR</td>
                                            <td width="350px">
                                                <div class="input-group input-group-sm">
                                                    <input readonly type="text" name="id_daftar" id="id_daftar" class="form-control"/>
                                                    <div class="input-group-btn input-group-sm" style="width: 120px">
                                                        <input readonly type="text" name="nomr" id="nomr" class="form-control"/>
                                                    </div> 
                                                </div> 
                                            </td>
                                            <td width="150px">Total Tagihan</td>
                                            <td>
                                                <div class="input-group-sm">
                                                    <input readonly type="text" id="total_tagihan" name="total_tagihan" class="form-control inputmask rataKanan" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pasien/Kelamin</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input readonly type="text" id="psNama" class="form-control">
                                                    <div class="input-group-btn input-group-sm" style="width: 120px">
                                                        <input type="hidden" id="psJenkel">
                                                        <input readonly type="text" id="stringPsJenkel" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="180px">Biaya Lainnya</td>
                                            <td>
                                                <div class="input-group-sm">
                                                    <input type="text" name="biaya_lainnya" id="biaya_lainnya" class="form-control inputmask rataKanan" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Lahir/Umur</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input readonly="" type="text" id="psTglLhr" class="form-control"/>
                                                    <div class="input-group-btn input-group-sm" style="width: 170px">
                                                        <input readonly type="text" id="psUmur" class="form-control" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Grand Total Tagihan</td>
                                            <td>
                                                <div class="input-group-sm">
                                                    <input readonly type="text" name="grand_total" id="grand_total" class="form-control inputmask rataKanan" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Masuk/Tgl Pulang</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="tgl_masuk" id="tgl_masuk" class="form-control tanggal"/>
                                                    <div class="input-group-btn input-group-sm" style="width: 50%">
                                                        <input type="text" name="tgl_keluar" id="tgl_keluar" class="form-control tanggal"/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Cara Bayar</td>
                                            <td>
                                                <div class="input-group-sm">
                                                    <input type="hidden" name="id_cara_bayar" id="id_cara_bayar"/>
                                                    <input readonly type="text" name="cara_bayar" id="cara_bayar" class="form-control w220"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>DPJP</td>
                                            <td>
                                                <select name="dpjp" id="dpjp" class="form-control" style="width: 300px">
                                                    <option value=""></option>
                                                    <?php foreach($datDokter->result_array() as $z): ?>
                                                    <option value="<?php echo $z['NRP'] ?>"><?php echo $z['pgwNama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                No.Kartu/No.Jaminan *<br/>
                                                <i>(<em>Jika Pasien JKN</em>)</i>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="no_bpjs" id="no_bpjs" class="form-control"/>
                                                    <div class="input-group-btn input-group-sm" style="width: 60%">
                                                        <input type="text" name="no_sep" id="no_sep" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="input-group-sm">
                                                    <input type="checkbox" id="chkIsJaminan"/> Format SEP
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <div class="widget-content">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="120px">No.Transaksi</th>
                                                    <th>Rawat Jalan / Rawat Inap / Penunjang / Lainnya</th>
                                                    <th width="150px">Total Transaksi</th>
                                                    <th width="120px">#</th>
                                                </tr>
                                            </thead>
                                            <tbody id="getData"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
 
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari data pasien pulang dengan cara bayar Umum</h4>
            </div>
            <div class="modal-body">
                
                <form id="form1" role="form" class="form-horizontal" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Data Pasien</label>
                                <div class="input-group col-md-12">
                             
                                    <input type="text" name="sKeyword" id="sKeyword" class="form-control" placeholder="Enter No MR / Nama Pasien"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" onclick="cariPasien()">
                                            <i class="fa fa-search"></i> Cari Pasien</button>        
                                    </div>
                                </div>                        

                            </div>
                        </div>                           
                    </div>
                </form>

                <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                    <table class="table table-bordered" style="font-size: 1.0em">
                        <thead>
                            <tr>
                                <th width="100px">No.Reg RS</th>
                                <th width="100px">Tgl.Reg RS</th>
                                <th width="80px">No.MR</th>
                                <th>Nama Pasien</th>
                                <th width="120px">Jns Kelamin</th>
                                <th width="80px">DOB</th>
                                <th width="70px">#</th>
                            </tr>
                        </thead>
                        <tbody id="getDataPasienCari"></tbody>
                    </table>  
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".inputmask").inputmask();
    $('input').focus(function(){return $(this).select();});
    $('.tanggal').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('#no_bpjs').inputmask('9{13,24}');
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd/mm/yyyy"
    });

    var mask = "<?php echo KODERS_VC ?>9999V999999";
    if ($('#chkIsJaminan').is(':checked')) {
        $('#no_sep').inputmask(mask, { 'placeholder': '<?php echo KODERS_VC ?>____V______' });
    }else{
        $('#no_sep').inputmask('remove');
    }
    $('#chkIsJaminan').click(function(){
        if ($('#chkIsJaminan').is(':checked')) {
            $('#no_sep').inputmask(mask, { 'placeholder': '<?php echo KODERS_VC ?>____V______' });
        }else{
            $('#no_sep').inputmask('remove');
        }        
    });

    $('#btnRefresh').click(function(){
        $('#form1').find('input').val('');
        $('#grand_total').val("0");
        $('#getData').html("");
    });
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'kasir.php/kwitansi_jkn' ?>';
        window.location.href = url;    
    });
    $('#dpjp').select2({placeholder:'Pilih DPJP'}).val("").trigger('change');
    $('#tgl_masuk').val("");
    $('#tgl_keluar').val("");
    $('#getData').html("<tr><td colspan=4>Data Item masih kosong<td/></tr>");
    $('#total_tagihan').val("0");
    $('#biaya_lainnya').val("0");
    $('#grand_total').val("0");

    $('#biaya_lainnya').keyup(function(){
        hitungTotal(); 
    });

    $('#Inquery').click(function(){
        $('#sKeyword').val("");
        $('#getDataPasienCari').html("<tr><td colspan=7>Silahkan masukan keyword untuk menampilkan data pasien pulang<td/></tr>");
        $("#myModal").modal( "show" );
    });
    $('#simpan_kwitansi').click(function(){
        var items = $('input[name="items[]"]').map(function(){ 
            return this.value; 
        }).get();
        
        var formItems = {};
            formItems['id_daftar'] = $('#id_daftar').val();
            formItems['nomr'] = $('#nomr').val();
            formItems['psNama'] = $('#psNama').val();
            formItems['psJenkel'] = $('#psJenkel').val();
            formItems['psTglLhr'] = $('#psTglLhr').val();
            formItems['psUmur'] = $('#psUmur').val();
            formItems['tgl_masuk'] = $('#tgl_masuk').val();
            formItems['tgl_keluar'] = $('#tgl_keluar').val();
            formItems['total_tagihan'] = $('#total_tagihan').val();
            formItems['biaya_lainnya'] = $('#biaya_lainnya').val();
            formItems['grand_total'] = $('#grand_total').val();
            formItems['dpjp'] = $('#dpjp').val();
            formItems['nama_dpjp'] = $('#dpjp :selected').html();
            formItems['id_cara_bayar'] = $('#id_cara_bayar').val();
            formItems['cara_bayar'] = $('#cara_bayar').val();
            formItems['no_bpjs'] = $('#no_bpjs').val();
            formItems['no_sep'] = $('#no_sep').val();
            formItems['items'] = items;

        $.ajax({
            url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/simpan_kwitansi' ?>",
            type        : "POST",
            data        : formItems,
            dataType    : "JSON",
            beforeSend  : function(){
                $('#simpan_kwitansi').attr('disabled','disabled');
                $('#simpan_kwitansi').html('<i class="fa fa-spin fa-refresh"></i> Silahkan tunggu... Permintaan sedang diproses.');
            },
            success     : function(data){
                if(data.code==200){
                    $('#form1').find('input').val('');
                    $('#dpjp').val('').trigger('change');
                    $('#total_tagihan').val("0");
                    $('#biaya_lainnya').val("0");
                    $('#grand_total').val("0");
                    $('#tgl_masuk').val("");
                    $('#tgl_keluar').val("");
                    $('#getData').html("<tr><td colspan=4>Data Item masih kosong<td/></tr>");
                    window.open('<?php echo base_url().'kasir.php/kwitansi_jkn/cetak_kwitansi?kode=' ?>'+data.message);
                }else{
                    alert(data.message);
                }
                $('#simpan_kwitansi').removeAttr('disabled');
                $('#simpan_kwitansi').html('<i class="glyphicon glyphicon-print"></i> Simpan & Cetak Kwitansi');
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('#simpan_kwitansi').removeAttr('disabled');
                $('#simpan_kwitansi').html('<i class="glyphicon glyphicon-print"></i> Simpan & Cetak Kwitansi');
                console.log(jqXHR.responseText);
            }
        });
    });
    function getTabel(a){
        $.ajax({
            url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getkwitansi' ?>",
            type        : "POST",
            data        : {sText:a},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getData').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
    
    $('#sKeyword').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $('#sKeyword').val();
            $.ajax({
                url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getPasien' ?>",
                type        : "POST",
                data        : {keyword:a},
                beforeSend  : function(){
                    $('#getDataPasienCari').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('#getDataPasienCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });
        }
    });
    $('#keywordText').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#keywordButton').click();
        }
    });
    $('#keywordButton').click(function(){
        $('#form1').find('input').val('');
        $('#dpjp').val('').trigger('change');
        var a = $('#keywordText').val();
        if(a==""){
            alert("Ketik No.Reg RS");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getPasienDetail' ?>",
                type        : "POST",
                data        : {sText:a},
                dataType    : "JSON",
                success     : function(data){
                    if (data.code==200) {
                        $('#total_tagihan').val("0");
                        $('#biaya_lainnya').val("0");
                        $('#grand_total').val("0");
                        $('#id_daftar').val(data.response.id_daftar);
                        $('#nomr').val(data.response.nomr);
                        $('#psNama').val(data.response.nama_pasien);
                        $('#psJenkel').val(data.response.jns_kelamin);
                        if(data.response.jns_kelamin=="1"){
                            $('#stringPsJenkel').val("Laki-Laki");
                        }else if(data.response.jns_kelamin=="0"){
                            $('#stringPsJenkel').val("Perempuan");
                        }else{
                            $('#stringPsJenkel').val("");
                        }
                        $('#tgl_masuk').val(dateIndo(data.response.tgl_masuk));
                        $('#tgl_keluar').val(dateIndo(data.response.tgl_keluar));
                        $('#psTglLhr').val(dateIndo(data.response.tgl_lahir));
                        $('#psUmur').val(data.response.umur);
                        $('#id_cara_bayar').val(data.response.id_cara_bayar);
                        $('#cara_bayar').val(data.response.cara_bayar);
                        $('#no_bpjs').val(data.response.no_bpjs);
                        $('#no_sep').val(data.response.no_jaminan);
                        getTabel(a);
                        getTotalTagihan(a);
                    }else{
                        alert(data.response);
                    }
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });            
        }    
    });
});

/**
|=====================================================|
|                                                     |
| Code : Javascript                                   |
|                                                     |
|=====================================================|
*/
function dateIndo(today) { 
    var date = today.substr(0,10); 
    var nDate = date.slice(8,10) + '/' + date.slice(5,7) + '/' + date.slice(0,4); 
    return nDate; 
} 
function dateEng(today) { 
    var date = today.substr(0,10); 
    var nDate = date.slice(6,10) + '-' + date.slice(3,5) + '-' + date.slice(0,2); 
    return nDate; 
} 
function hitungTotal(){
    var a = $('#total_tagihan').val().replace(',','').replace(',','').replace(',','');
    var b = $('#biaya_lainnya').val().replace(',','').replace(',','').replace(',','');
    
        a = (a=='' || isNaN(a)) ? 0 : a;
        b = (b=='' || isNaN(b)) ? 0 : b;
    var c = parseFloat(a) + parseFloat(b);
        c = (c=='' || isNaN(c)) ? 0 : c;
    
    $('#grand_total').val(c);
}
function getTabel(a){
    $.ajax({
        url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getKwitansi' ?>",
        type        : "POST",
        data        : {sText:a},
        beforeSend  : function(){
            $('tbody#getData').html("<tr><td colspan=4><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getData').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('#getData').html("<tr><td colspan=7>Data tidak ditemukan</td></tr>");
            console.log(jqXHR.responseText);
        }
    });
}
function getTotalTagihan(a){
    $.ajax({
        url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getTotalTagihan' ?>",
        type        : "POST",
        data        : {sText:a},
        beforeSend  : function(){
            $('#total_tagihan').val("<i class='fa fa-spin fa-refresh'></i> Loading... Please wait");
        },
        success     : function(data){
            $('#total_tagihan').val(data);
            $('#grand_total').val(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('#total_tagihan').val("0");
            $('#grand_total').val("0");
            console.log(jqXHR.responseText);
        }
    });
}
function cariPasien(){
    var a = $('#sKeyword').val();
    $.ajax({
        url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getPasien' ?>",
        type        : "POST",
        data        : {keyword:a},
        beforeSend  : function(){
            $('#getDataPasienCari').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('#getDataPasienCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            $('#getDataPasienCari').html("<tr><td colspan=7>Data tidak ditemukan</td></tr>");
            console.log(jqXHR.responseText);
        }
    });
}

function setPasien(a){
    $('#form1').find('input').val('');
    $('#dpjp').val('').trigger('change');
    if(a==""){
        alert("No.Reg RS masih kosong");
    }else{
        $.ajax({
            url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getPasienDetail' ?>",
            type        : "POST",
            data        : {sText:a},
            dataType    : "JSON",
            success     : function(data){
                if (data.code==200) {
                    $('#total_tagihan').val("0");
                    $('#biaya_lainnya').val("0");
                    $('#grand_total').val("0");
                    $('#id_daftar').val(data.response.id_daftar);
                    $('#nomr').val(data.response.nomr);
                    $('#psNama').val(data.response.nama_pasien);
                    $('#psJenkel').val(data.response.jns_kelamin);
                    if(data.response.jns_kelamin=="1"){
                        $('#stringPsJenkel').val("Laki-Laki");
                    }else if(data.response.jns_kelamin=="0"){
                        $('#stringPsJenkel').val("Perempuan");
                    }else{
                        $('#stringPsJenkel').val("");
                    }
                    $('#tgl_masuk').val(dateIndo(data.response.tgl_masuk));
                    $('#tgl_keluar').val(dateIndo(data.response.tgl_keluar));
                    $('#psTglLhr').val(dateIndo(data.response.tgl_lahir));
                    $('#psUmur').val(data.response.umur);
                    $('#id_cara_bayar').val(data.response.id_cara_bayar);
                    $('#cara_bayar').val(data.response.cara_bayar);
                    $('#no_bpjs').val(data.response.no_bpjs);
                    $('#no_sep').val(data.response.no_jaminan);
                    $('#myModal').modal('hide');
                    getTabel(a);
                    getTotalTagihan(a);
                }else{
                    alert(data.response);
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('#myModal').modal('hide');
                console.log(jqXHR.responseText);
            }
        });            
    }  
}

function urlencode(str) {
  str = (str + '').toString();
  return encodeURIComponent(str)
    .replace(/!/g, '%21')
    .replace(/'/g, '%27')
    .replace(/\(/g, '%28')
    .replace(/\)/g, '%29')
    .replace(/\*/g, '%2A')
    .replace(/%20/g, '+');
}
function urldecode(str) {
    return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function () {
          return '%25'
    }).replace(/\+/g, '%20'))
}
</script>
