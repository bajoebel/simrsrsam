<style>
    em{font-size: 10px}
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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">

<form id="form1" role="form" onsubmit="return false">
    <table class="table table-striped">
        <tr>
            <td class="w120">Tujuan Mutasi</td>
            <td class="w250">
                <select name="LOKASI_TUJUAN" id="LOKASI_TUJUAN" class="form-control w250">
                    <option value=""></option>
                    <?php foreach($datlokasi->result_array() as $x): ?>
                        <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td class="w120">Keterangan</td>
            <td rowspan="2">
                <textarea class="form-control" name="KETMT" id="KETMT" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Tanggal Mutasi</td>
            <td>
                <input type="text" name="TGL_MUTASI" id="TGL_MUTASI" class="form-control tanggal w120"/>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="5">
                <button type="button" id="kembali" class="btn btn-danger">
                    <i class="fa fa-external-link"></i> Kembali</button>                                                 
                <button type="button" id="simpan" class="btn btn-danger">
                    <i class="fa fa-floppy-o"></i> Simpan</button>   
            </td>
        </tr>
    </table>
</form> 
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

<table class="table table-bordered table-striped">
    <thead>
        <form id="form2" action="#" method="post" onsubmit="return false">
            <tr>
                <th>
                    <div class="input-group input-group-sm">
                        <input type="hidden" name="KDBRG" id="KDBRG"/>
                        <input readonly type="text" name="NMBRG" id="NMBRG" class="form-control"/>
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button" id="ADDBARANG">
                                <i class="fa fa-search"></i></button>
                        </div>  
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input readonly type="text" name="NMSATUAN" id="NMSATUAN" class="form-control" />
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input readonly type="text" name="JSTOK" id="JSTOK" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input type="text" name="JMLMT" id="JMLMT" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <button id="simpanTemp" type="button" class="btn btn-danger">
                            <i class="fa fa-add"></i> Tambah</button>
                    </div>
                </th>
            </tr>
        </form>
        <tr>
            <th>Nama Obat / Alkes</th>
            <th width="200px">Satuan</th>
            <th width="140px">Stok</th>
            <th width="140px">Jml Mutasi</th>
            <th width="80px">#</th>
        </tr>
    </thead>
    
    <tbody id="getTemp"></tbody>
</table>


                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari Obat / Alat Kesehatan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" method="get" class="form-horizontal" onsubmit="return false">
                                <div class="control-group">
                                    <label class="control-label">Pencarian Data Obat / Alat Kesehatan</label>
<div class="input-group input-group-sm">
    <input type="text" name="keywordCariObat" id="keywordCariObat" class="form-control"/>
    <div class="input-group-btn">
        <button class="btn btn-danger" type="button" id="btnKeywordCariObat">
            <i class="fa fa-search"></i> Cari Kode / Nama Obat</button>
    </div>  
</div> 
                                </div>
                            </form>
                            <hr/>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="80px">Kode</th>
                                            <th>Nama Obat / Alkes</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th width="70px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getDataObatCari"></tbody>
                                </table>  
                            </div>

                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    $(".inputmask").inputmask();
    $('input,textarea').focus(function(){return $(this).select();});
    $('#LOKASI_TUJUAN').select2({placeholder:"Pilih option"});
    $('.tanggal').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('.tanggal').datepicker({
        autoclose : true,
        format    : "dd/mm/yyyy"
    });   
    $('#kembali').click(function(){
        var a = "<?php echo $kLok ?>";
        window.location.href = "<?php echo base_url().'farmasi.php/trans_mutasi/goForm?kLok=' ?>"+a;
    });      
    function kosongkanObjEntry(){
        $('#LOKASI_TUJUAN').val('').trigger('change');
        $('#TGL_MUTASI').val('');
        $('#KETMT').val('');
    }
    function kosongkanObjTemp(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#NMSATUAN').val('');
        $('#JSTOK').val('0');
        $('#JMLMT').val('0');
    }
    kosongkanObjEntry();
    kosongkanObjTemp();
    getTemp();
    emptyTemp();

    $('#TGL_MUTASI').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KETMT').focus();
        }
    });
    $('#JMLMT').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#simpanTemp').click();
        }
    });
    $('#ADDBARANG').click(function(){
        kosongkanObjTemp();
        $('#keywordCariObat').val("");
        $('#getDataObatCari').html("<tr><td colspan=5>Klik atau Enter Pada textbox pencarian untuk menampilkan data</td></tr>");
        $("#formModal").modal("show");            
    });

    $('#btnKeywordCariObat').click(function(){
        var a = $('#keywordCariObat').val();
        var b = "<?php echo $kLok ?>";
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/trans_mutasi/getObat' ?>",
            type        : "POST",
            data        : {keyword:a,KDLOKASI:b},
            beforeSend  : function(){
                $('tbody#getDataObatCari').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('#getDataObatCari').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getDataObatCari').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
                console.log(errorThrown);
            }
        });
    });
    
    $('#keywordCariObat').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $('#keywordCariObat').val();
            var b = "<?php echo $kLok ?>";
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_mutasi/getObat' ?>",
                type        : "POST",
                data        : {keyword:a,KDLOKASI:b},
                beforeSend  : function(){
                    $('tbody#getDataObatCari').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success     : function(data){
                    $('tbody#getDataObatCari').html(data);
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    $('tbody#getDataObatCari').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
                    console.log(errorThrown);
                }
            });
        }
    });
    
    
    $("#simpanTemp").click(function(){
        var formItems = {};
            formItems['KDBRG'] = $('#KDBRG').val();
            formItems['NMBRG'] = $('#NMBRG').val();
            formItems['NMSATUAN'] = $('#NMSATUAN').val();
            formItems['JSTOK'] = $('#JSTOK').val();
            formItems['JMLMT'] = $('#JMLMT').val();

        if(formItems['KDBRG']==""){
            $('#ADDBARANG').click();
        }else if(formItems['JSTOK']=="" || formItems['JSTOK']=="0"){
            alert("Stok tidak boleh kosong");
        }else if(formItems['JMLMT']=="" || formItems['JMLMT']=="0"){
            alert("Jumlah mutasi masih kosong");
            $('#JMLMT').focus();
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_mutasi/simpanTemp' ?>",
                type        : "POST",
                data        : formItems,
                dataType    : "JSON",
                success     : function(data){
                    getTemp();
                    if(data.code==200){
                        kosongkanObjTemp();
                        $('#ADDBARANG').click();
                    }else{
                        alert(data.message);
                    }
                },
                error       : function(xhr, ajaxOption, thrownError){
                    console.log('Response : ' + thrownError);
                }
            }); 
        }
    }); 

    $('#simpan').click(function(){
        var formdata = {}
            formdata['LOKASI_TUJUAN'] = $('#LOKASI_TUJUAN').val();
            formdata['NAMA_LOKASI_TUJUAN'] = $('#LOKASI_TUJUAN :selected').html();
            formdata['TGL_MUTASI'] = $('#TGL_MUTASI').val();
            formdata['LOKASI_ASAL'] = "<?php echo $kLok; ?>";
            formdata['NAMA_LOKASI_ASAL'] = "<?php echo getLokasiById($kLok); ?>";
            formdata['KETMT'] = $('#KETMT').val();
        
        if(formdata['LOKASI_TUJUAN']==""){
            alert("Lokasi tujuan mutasi harus dipilih");
            $('#LOKASI_TUJUAN').focus();
        }else if(formdata['TGL_MUTASI']==""){
            alert("Tanggal Mutasi tidak boleh kosong");
            $('#TGL_MUTASI').focus();
        }else if(formdata['KDLOKASI']==""){
            alert("Lokasi Asal barang tidak ditemukan. Silahkan refresh browser anda.");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_mutasi/simpan' ?>",
                type        : "POST",
                data        : formdata,
                dataType    : "JSON",
                success     : function(data){
                    alert(data.message);
                    if(data.code==200){
                        kosongkanObjEntry();
                        kosongkanObjTemp();
                        getTemp();
                    }
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });
        }
    });
});

function getTemp(){
    $.ajax({
        url : "<?php echo base_url().'farmasi.php/trans_mutasi/getTemp' ?>",
        beforeSend  : function(){
            $('tbody#getTemp').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getTemp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getTemp').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
            console.log(jqXHR,responseText);
        }
    });
}
function emptyTemp(){
    $.ajax({
        url     : "<?php echo base_url().'farmasi.php/trans_mutasi/emptyTemp' ?>",
        success : function(data){
            getTemp(); 
        },
        error : function(xhr, ajaxOption, thrownError){
            console.log('Response : ' + thrownError);
        }
    });                     
}
function pilihObat(a,b,c,d){
    $('#KDBRG').val(a);
    $('#NMBRG').val(urldecode(b));
    $('#NMSATUAN').val(c);
    $('#JSTOK').val(d);
    $('#JMLMT').val("0");
    $('#formModal').modal('hide');
    $('#JMLMT').focus();
}

function hapusTemp(a){
    var x = confirm("Apakah anda yakin akan menghapus data ini?");
    if(x){
        $.ajax({
            url     : "<?php echo base_url().'farmasi.php/trans_mutasi/hapusTemp' ?>",
            type    : "POST",
            data    : {IDX:a},
            dataType: "JSON",
            success : function(data){
                alert(data.message);
                getTemp();
            },
            error   : function(jqXHR,ajaxOption,errorThrown){
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