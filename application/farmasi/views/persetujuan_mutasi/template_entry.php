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

    .popup-pencarian
    {
        position: relative;
    }
    .content-pencarian {
        display: inherit;
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 5;
        width:100%;
        /*min-height: 200px;*/
        /*max-height: 500px;*/
        /*min-width: 800px;*/
        /*padding:15px;*/
        background:#fefefe;
        font-size:.875em;
        border-radius:5px;
        box-shadow:0 1px 3px #ccc;
        border:1px solid #ddd;
        /*overflow:hidden;*/
        /*overflow-y: scroll;*/
        background-color:#fefefe;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-4">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">

                    <form id="form1" role="form" onsubmit="return false">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>Tujuan Mutasi <span style="color: red"> * </span></label></div>
                                <div class="col-xs-8">
                                    <select name="LOKASI_TUJUAN" id="LOKASI_TUJUAN" class="form-control">
                                        <option value=""></option>
                                        <?php foreach($datlokasi->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>Tanggal Mutasi <span style="color: red"> * </span></label></div>
                                <div class="col-xs-8">
                                    <input type="text" name="TGL_MUTASI" id="TGL_MUTASI" class="form-control tanggal" value="<?=  date('d/m/Y') ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>Keterangan </label></div>
                                <div class="col-xs-8">
                                    <textarea class="form-control" name="KETMT" id="KETMT" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--table class="table table-striped">
                            <tr>
                                <td class="w120">Tujuan Mutasi</td>
                                <td class="w250">
                                    
                                </td>
                                <td class="w120">Keterangan</td>
                                <td rowspan="2">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Mutasi</td>
                                <td>
                                    
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
                        </table-->
                    </form> 
                    
                </div>
            </div>
        </div>

        <div class="col-xs-8">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">
                    <div class="form-group">
                            <div class="row">
                                <!--div class="col-xs-2"><label>Barang <span style="color: red"> * </span></label></div-->
                                <div class="col-xs-12">
                                    <div class="input-group input-group-sm col-sm-4">
                                        <input type="hidden" name="jmldata" id="jmldata" value="" />
                                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Barang" onkeyup="getBarang(0,'<?= $kLok; ?>')" onkeydown="enter_keyword(event)" />
                                        <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="ADDBARANG1" onclick="cariBarang(0,'<?= $kLok; ?>')">
                                            <i class="fa fa-search"></i></button>

                                        </div>  
                                    </div>  
                                    <!--button id="ADDBARANG">ADD</button-->
                                    <div id="barang" class="popup-pencarian" style="display: none;">
                                        <div class="content-pencarian">
                                            <input type="hidden" name="show_barang" id="show_barang" value="0">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead class="bg-green">
                                                    <tr>
                                                        <td>Kode Obat</td>
                                                        <td>Nama Obat / Alkes</td>
                                                        <td>Satuan</td>
                                                        <td>STOK</td>
                                                        <td>#</td>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="padding: 0px;"><input type="text" name="qkode" id="qkode" class="form-control input-sm" onkeyup="getBarang(0','<?= $kLok; ?>')" onkeydown="enter_kode(event)" placeholder="Masukkan Kode"></td>
                                                        <td style="padding: 0px;"><input type="text" name="qnama" id="qnama" class="form-control input-sm" onkeyup="getBarang(0,'<?= $kLok; ?>')" onkeydown="enter_nama(event)" placeholder="Masukan Nama Barang"></td>
                                                        <td style="padding: 0px;"><input type="text" name="qsatuan" id="qsatuan" class="form-control input-sm" onkeyup="getBarang(0,'<?= $kLok; ?>')" onkeydown="enter_satuan(event)" placeholder="Masukkan satuan"></td>
                                                        <td style="padding: 0px;" colspan="2"><input type="text" name="qkategori" id="qkategori" class="form-control input-sm" onkeyup="getBarang(0,'<?= $kLok; ?>')" onkeydown="enter_kategori(event)" placeholder="Masukkan Kategori"></td>
                                                    </tr>
                                                </tbody>
                                                <tbody id="data-barang"></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5" style="text-align: right;"><div id="pagination"></div></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <!--form id="form2" action="#" method="post" onsubmit="return false">
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
                                </form-->
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
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>&nbsp; </label></div>
                                <div class="col-xs-8 text-right">
                                    <button type="button" id="kembali" class="btn btn-danger">
                                        <i class="fa fa-external-link"></i> Kembali</button>                                                 
                                    <button type="button" id="simpan" class="btn btn-success">
                                        <i class="fa fa-floppy-o"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!--div class="row">
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
    </div-->
</section>



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
        $('#keyword').val('');
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
                        var masih = confirm("Apakah Masih ada data?");
                        if (masih == true) {
                          $('#keyword').focus();
                          $('#barang').show();
                        } else {
                          $('#simpan').focus();
                          $('#barang').hide();
                        } 
                        kosongkanObjTemp();
                        $("#modal_transaksi").modal("hide");
                        //$('#ADDBARANG').click();
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

var base_url="<?php echo base_url() ."farmasi.php/" ?>";

</script>

<script src="<?php echo base_url() ?>js/farmasi.js"></script>