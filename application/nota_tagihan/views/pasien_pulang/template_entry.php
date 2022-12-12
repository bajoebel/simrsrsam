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
    .modal-content {max-height: 600px;}
    .rataTengah{text-align: center;}
    .rataKanan{text-align: right;}
    .f20{font-size: 20px;}
    .w10{width: 10px;}
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
    input{border: none;}
    #convNilai{font-size: 20px}

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }
    .ui-autocomplete {
        position: absolute;
        z-index: 1000;
        cursor: default;
        padding: 0;
        margin-top: 2px;
        list-style: none;
        background-color: #ffffff;
        border: 1px solid #ccc;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
    .ui-autocomplete > li {
        padding: 3px 10px;
    }
    .ui-autocomplete > li.ui-state-focus {
        background-color: #3399FF;
        color:#ffffff;
    }
    .ui-helper-hidden-accessible {
        display: none;
    }
    tr.autocomplete td{border: 1px solid #f1f1f1;padding: 3px}
    table{
        border-collapse: collapse;
        table-layout: fixed;
    }
    td {
      white-space: normal !important; 
      word-wrap: break-word;  
    }
</style>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">

<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getRuangByID($ruangID) ?></h1>
</section>
<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Penting</h4>
        Menyegerakan entry data pasien pulang sesaat pasien pulang dapat menghindari system menolak pembuatan kwitansi tagihan pasien dan proses lainnya yang membutuhkan informasi pasien pulang.
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border"> 
                    <div class="box-body">
                        <!-- Form Pencarian Pasien -->
                        <div id="divCariPasien">
                            <form id="formCariPasien" class="form-horizontal" role="form" onsubmit="return false">
                                <input type="hidden" name="txtRuangID" id="txtRuangID" value="<?php echo $ruangID ?>" />
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nomor</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="txtNomor" id="txtNomor">
                                            <span class="input-group-addon">
                                                <label>
                                                    <input type="radio" name="rbnomor" value="nomr" id="rbNoMR" checked=""> No.MR</label>
                                                &nbsp;
                                                <label>
                                                    <input type="radio" name="rbnomor" value="reg_rs" id="rbRegRS"> No.Reg RS</label>
                                                &nbsp;
                                            </span>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-danger" id="btnKembali"> 
                                                <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                            <button type="button" id="cariPasien" class="btn btn-primary">
                                               <i class="glyphicon glyphicon-search"></i> Cari</button>
                                        </div>
                                    </div>
                                </div>    
                            </form> 
                        </div>

                        <!-- Tabel Pencarian Pendaftaran Pasien -->
                        <div id="divTabelPendaftaranPasien" style="display: none;padding: 10px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w100">No.Reg RS</th>
                                        <th class="w120">No.Reg Unit</th>
                                        <th class="w100">Tgl.Masuk</th>
                                        <th class="w100">No.MR</th>
                                        <th class="">Nama Pasien</th>
                                        <th class="w100">Tgl.Lahir</th>
                                        <th class="w100">Jenis Kelamin</th>
                                        <th class="rataTengah w100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="getDataKunjunganPasien"></tbody>
                            </table>
                        </div>
                        
                        <!-- Form Hasil Pencarian Pasien -->
                        <div id="divDataPasien" style="display: none;">
                            <form id="form1" role="form" onsubmit="return false">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Registrasi RS/No.Registrasi Unit <span style="color: red"> * </span></label>
                                        <div class="input-group">
                                            <input readonly="" type="text" class="form-control" name="id_daftar" id="id_daftar">
                                            <div class="input-group-btn" style="width: 50%">
                                                <input readonly="" type="text" class="form-control" name="reg_unit" id="reg_unit">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label>No MR / Nama Pasien <span style="color: red"> * </span></label> 
                                        <div class="input-group">
                                            <input readonly="" type="text" class="form-control" name="nomr" id="nomr">
                                            <div class="input-group-btn" style="width: 70%">
                                    <input readonly="" type="text" class="form-control" name="nama_pasien" id="nama_pasien">  
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="input-group col-md-6">
                                            <input readonly="" type="text" class="form-control" name="jns_kelamin" id="jns_kelamin">
                                            <div class="input-group-btn" style="width: 75%">
                                                <input readonly="" type="text" class="form-control" id="v_jns_kelamin" >
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label>Tanggal Lahir/Umur <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-10">
                                            <input readonly="" type="text" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                            <div class="input-group-btn" style="width: 75%">
                                                <input readonly="" type="text" class="form-control" name="umur" id="umur" >
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ruang <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-12">
                                            <input readonly="" type="text" class="form-control" name="id_ruang" id="id_ruang">
                                            <div class="input-group-btn" style="width: 75%">
                                                <input readonly="" type="text" class="form-control" name="nama_ruang" id="nama_ruang" >
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label>Kelas Layanan <span style="color: red"> * </span> [<em>Rawat Inap</em>]</label>
                                        <div class="input-group col-md-12">
                                            <input readonly="" type="text" class="form-control" name="id_kelas" id="id_kelas">
                                            <div class="input-group-btn" style="width: 75%">
                                                <input readonly="" type="text" class="form-control" name="kelas_layanan" id="kelas_layanan" >
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label>Tanggal Masuk / Tanggal Pulang <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <input readonly="" type="text" class="form-control" name="tgl_masuk" id="tgl_masuk">
                                            <div class="input-group-btn" style="width: 50%">
                                                <input readonly="" type="text" class="form-control tanggal" name="tgl_keluar" id="tgl_keluar" placeholder="__-__-____">
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label>LOS (Hari) / Jenis Layanan</label>
                                        <div class="input-group col-md-6">
                                            <input type="text" class="form-control" name="los" id="los">
                                            <div class="input-group-btn" style="width: 50%">
                                                <input readonly="" type="text" class="form-control" name="jns_layanan" id="jns_layanan" >
                                            </div>
                                        </div>
                                    </div>  

                                </div>

                                <div class="col-md-6">  

                                    <div class="form-group">
                                        <label>Jenis Kunjungan <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <select name="jns_kunjungan" id="jns_kunjungan" class="form-control" style="width: 300px">
                                                <option value="0">Pasien Baru</option>
                                                <option value="1">Pasien Lama</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Kasus Penyakit <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <select name="kasus_penyakit" id="kasus_penyakit" class="form-control" style="width: 300px">
                                                <option value="0">Kasus Baru</option>
                                                <option value="1">Kasus Lama</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Cara Bayar <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <select name="id_cara_bayar" id="id_cara_bayar" class="form-control" style="width: 300px">
                                                <?php foreach ($getCaraBayar->result_array() as $xCB): ?>
                                                <option value="<?php echo $xCB['idx'] ?>"><?php echo $xCB['cara_bayar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>No Kartu / No.Jaminan <span style="color: red"> * </span> [<em>Jika Cara Bayar Bukan Umum</em>]</label>
                                        <div class="input-group col-md-12">
                                            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs">
                                            <div class="input-group-btn" style="width: 60%">
                                                <input type="text" class="form-control" name="no_jaminan" id="no_jaminan" >
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label>Dokter Penanggung Jawab <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <select name="dpjp" id="dpjp" class="form-control" style="width: 300px">
                                                <option value=""></option>
                                                <?php foreach ($getDokter->result_array() as $xD): ?>
                                                <option value="<?php echo $xD['NRP'] ?>"><?php echo $xD['pgwNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tindakan Pelayanan <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <select name="id_tindakan_pelayanan" id="id_tindakan_pelayanan" class="form-control" style="width: 300px">
                                                <option value=""></option>
                                                <?php foreach ($getJenisPelayanan->result_array() as $xJP): ?>
                                                <option value="<?php echo $xJP['idx'] ?>"><?php echo $xJP['jenis_pelayanan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Cara Keluar <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-6">
                                            <select name="id_cara_keluar" id="id_cara_keluar" class="form-control" style="width: 300px">
                                                <?php foreach ($getCaraKeluar->result_array() as $xCP): ?>
                                                <option value="<?php echo $xCP['idx'] ?>"><?php echo $xCP['cara_keluar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Keadaan Keluar <span style="color: red"> * </span></label>
                                        <div class="input-group col-md-8">
                                            <select name="id_keadaan_keluar" id="id_keadaan_keluar" class="form-control" style="width: 300px">
                                                <?php foreach ($getKeadaanKeluar->result_array() as $xKK): ?>
                                                <option value="<?php echo $xKK['idx'] ?>"><?php echo $xKK['keadaan_keluar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <div class="input-group" id="btnExec">
                                            <button type="button" class="btn btn-primary" id="btnBatal"> 
                                                <i class="glyphicon glyphicon-new-window"></i> Batal</button>
                                            <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                                                <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                            <button type="button" class="btn btn-primary" id="btnCariPasienLainnya"> 
                                                <i class="glyphicon glyphicon-search"></i> Cari Pasien Lainnya</button>
                                        </div>
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

<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
<script type="text/javascript">

$(document).ready(function () { 
    var id_ruang = '<?php echo $ruangID ?>';
    $('#dpjp,#id_tindakan_pelayanan').select2({placeholder:'Pilih Option'});
    $('.tanggal').datepicker({
        autoclose : true,
        format    : "dd-mm-yyyy"
    });
    $('input').focus(function(){
        return this.select();
    });
    $('#btnKembali').click(function(){
        var a = '<?php echo $ruangID ?>';
        var url = '<?php echo base_url().'nota_tagihan.php/pasien_pulang/data_pasien_pulang?kLok=' ?>'+a;
        window.location.href = url;  
    });
    $('#btnBatal').click(function(){
        var a = '<?php echo $ruangID ?>';
        var url = '<?php echo base_url().'nota_tagihan.php/pasien_pulang/data_pasien_pulang?kLok=' ?>'+a;
        window.location.href = url;  
    });
    $('#btnCariPasienLainnya').click(function(){
        $('#txtNomor').val('');
        $('#divCariPasien').show();
        $('#divTabelPendaftaranPasien').hide();
        $('#divDataPasien').hide();
        $('#txtNomor').focus();
    });

    $('#cariPasien').click(function(){
        var a = '<?php echo $ruangID ?>';
        var b = $('#txtNomor').val();
        if(a == ""){
            alert("Kode ruang tidak ditemukan. Silahkan pilih ruang yang akan memulangkan pasien");
        }else if(b == ""){
            alert("Nomor yang akan di cari masih kosong");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'nota_tagihan.php/pasien_pulang/getViewDataKunjunganPasien' ?>",
                type        : "POST",
                data        : $('#formCariPasien').serialize(),
                beforeSend  : function(){
                    $('tbody#getDataKunjunganPasien').html("<tr><td colspan=7>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getDataKunjunganPasien').html(data);
                    $('#divTabelPendaftaranPasien').show();
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });  
        }        
    });

    $('#txtNomor').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var a = '<?php echo $ruangID ?>';
            var b = $('#txtNomor').val();
            if(a == ""){
                alert("Kode ruang tidak ditemukan. Silahkan pilih ruang yang akan memulangkan pasien");
            }else if(b == ""){
                alert("Nomor yang akan di cari masih kosong");
            }else{
                $.ajax({
                    url         : "<?php echo base_url().'nota_tagihan.php/pasien_pulang/getViewDataKunjunganPasien' ?>",
                    type        : "POST",
                    data        : $('#formCariPasien').serialize(),
                    beforeSend  : function(){
                        $('tbody#getDataKunjunganPasien').html("<tr><td colspan=7>Loading... Please wait</td></tr>");
                    },
                    success : function(data){
                        $('tbody#getDataKunjunganPasien').html(data);
                        $('#divTabelPendaftaranPasien').show();
                    },
                    error : function(jqXHR,ajaxOption,errorThrown){
                        console.log(jqXHR.responseText);
                    }
                });  
            }  
        }
    });    
});

function dateIndo(today) { 
    var date = today.substr(0,10); 
    var nDate = date.slice(8,10) + '-' + date.slice(5,7) + '-' + date.slice(0,4); 
    return nDate; 
} 
function dateEng(today) { 
    var date = today.substr(0,10); 
    var nDate = date.slice(6,10) + '-' + date.slice(3,5) + '-' + date.slice(0,2); 
    return nDate; 
} 
function pilihPasien(a){
    $.ajax({
        url         : "<?php echo base_url().'nota_tagihan.php/pasien_pulang/getDataKunjunganPasien' ?>",
        type        : "POST",
        data        : {reg_unit:a},
        dataType    : "JSON",
        success     : function(data){
            console.log(data);
            $('#id_daftar').val(data.id_daftar);
            $('#reg_unit').val(data.reg_unit);
            $('#nomr').val(data.nomr);
            $('#nama_pasien').val(data.nama_pasien);
            var jenkel = (data.jns_kelamin=='1') ? 'Laki-Laki' : 'Perempuan';
            $('#jns_kelamin').val(data.jns_kelamin);
            $('#v_jns_kelamin').val(jenkel);
            var tglLahir = dateIndo(data.tgl_lahir);
            $('#tgl_lahir').val(tglLahir);
            $('#id_ruang').val(data.id_ruang);
            $('#nama_ruang').val(data.nama_ruang);
            
            $('#jns_layanan').val(data.jns_layanan);
            $('#los').val((data.jns_layanan=='RJ') ? 0 : '');
            $('#id_kelas').val(data.id_kelas);
            $('#kelas_layanan').val(data.kelas_layanan);

            $('#umur').val(data.umur);
            var tglMasuk = dateIndo(data.tgl_masuk);
            $('#tgl_masuk').val(tglMasuk);
            $('#tgl_keluar').val((data.jns_layanan=='RJ') ? tglMasuk : '');

            $('#id_cara_bayar').val(data.id_cara_bayar);
            
            $('#no_bpjs').val(data.no_bpjs);
            $('#no_jaminan').val(data.no_jaminan);

            $('#dpjp').val(data.dokterJaga).trigger('change');
            if(data.tgl_masuk < data.tgl_daftar) $('#jns_kunjungan').val("0"); else $('#jns_kunjungan').val("1");
            $('#tgl_keluar').val("<?= date('d-m-Y') ?>").trigger('change');;
            $('#divTabelPendaftaranPasien').hide();
            $('#divCariPasien').hide();
            $('#divDataPasien').show();
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });  

    $('#tgl_masuk, #tgl_keluar').on('change textInput input', function () {
        if ( ($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date(dateEng($("#tgl_masuk").val()));
            var secondDate = new Date(dateEng($("#tgl_keluar").val()));
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            if (diffDays < 0) {
                $("#los").val('');
                $("#tgl_keluar").val('');
                alert('Tanggal keluar tidak boleh lebih rendah dari tanggal masuk');
            }else{
                $("#los").val(diffDays+1);
            }
        }
    });

}
function simpan(){
    var formData = {};
        formData['id_daftar'] = $('#id_daftar').val();
        formData['reg_unit'] = $('#reg_unit').val();
        formData['nomr'] = $('#nomr').val();
        formData['nama_pasien'] = $('#nama_pasien').val();
        formData['jns_kelamin'] = $('#jns_kelamin').val();
        formData['tgl_lahir'] = $('#tgl_lahir').val();
        formData['umur'] = $('#umur').val();
        formData['id_ruang'] = $('#id_ruang').val();
        formData['nama_ruang'] = $('#nama_ruang').val();
        formData['los'] = $('#los').val();
        formData['id_kelas'] = $('#id_kelas').val();
        formData['kelas_layanan'] = $('#kelas_layanan').val();
        formData['tgl_masuk'] = $('#tgl_masuk').val();
        formData['tgl_keluar'] = $('#tgl_keluar').val();
        formData['id_cara_keluar'] = $('#id_cara_keluar').val();
        formData['cara_keluar'] = $('#id_cara_keluar :selected').html();
        formData['dpjp'] = $('#dpjp').val();
        formData['nama_dpjp'] = $('#dpjp :selected').html();
        formData['id_keadaan_keluar'] = $('#id_keadaan_keluar').val();
        formData['keadaan_keluar'] = $('#id_keadaan_keluar :selected').html();
        formData['jns_layanan'] = $('#jns_layanan').val();
        formData['jns_kunjungan'] = $('#jns_kunjungan').val();
        formData['kasus_penyakit'] = $('#kasus_penyakit').val();
        formData['id_cara_bayar'] = $('#id_cara_bayar').val();
        formData['cara_bayar'] = $('#id_cara_bayar :selected').html();
        formData['no_bpjs'] = $('#no_bpjs').val();
        formData['no_jaminan'] = $('#no_jaminan').val();
        formData['id_tindakan_pelayanan'] = $('#id_tindakan_pelayanan').val();
        formData['tindakan_pelayanan'] = $('#id_tindakan_pelayanan :selected').html();

    if(formData['id_daftar']==""){
        alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
    }else if(formData['tgl_masuk']==""){
        alert('Ops. Tanggal masuk kosong. Silahkan pilih pasien dan pastikan tanggal masuk tampil');
    }else if(formData['tgl_keluar']==""){
        alert('Ops. Tanggal pulang kosong. Silahkan isi tanggal pulang pasien');
        $('#tgl_keluar').focus();
    }else if(formData['nomr']==""){
        alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
    }else if(formData['id_cara_keluar']==""){
        alert('Ops. Cara keluar kosong. Silahkan pilih option cara keluar');
        $('#id_cara_keluar').focus();
    }else if(formData['dpjp']==""){
        alert('Ops. DPJP kosong. Silahkan pilih option Dokter Penanggung Jawab');
        $('#dpjp').focus();
    }else if(formData['id_tindakan_pelayanan']==""){
        alert('Ops. Tindakan pelayanan kosong.  Silahkan pilih option tindakan pelayanan.');
        $('#id_tindakan_pelayanan').focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'nota_tagihan.php/pasien_pulang/simpan' ?>",
            type        : "POST",
            data        : formData,
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);
                if(data.code==200){
                    $('#divCariPasien').show();
                    $('#divTabelPendaftaranPasien').hide();
                    $('#divDataPasien').hide();
                }  
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
} 
</script>