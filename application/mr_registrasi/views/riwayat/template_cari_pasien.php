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
    tr.cancel{
        background: gray;
        color: #fff;
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
                    Filter
                </div>
                <div class="box-body">
                    <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <select name="limit" id="limit" class="form-control" onchange="getPasien()">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="col-md-1 col-sm-1 col-xs-12 control-label">Periode</label>
                                        <div class="col-md-11 col-sm-11 col-xs-12">
                                            <span class="input-group-btn">
                                                <input type="text"  class="form-control tanggal" name="tglAwal" id="tglAwal" value='<?= date('Y-m-d') ?>' placeholder="____-__-__" onchange="getPasien()">
                                            </span>
                                            <span class="input-group-btn" >
                                                <input disabled="" type="text" class="form-control" value="s/d" style="text-align: center;border: none;">
                                            </span>
                                            <span class="input-group-btn">
                                                <input type="text" class="form-control tanggal" name="tglAkhir" value='<?= date('Y-m-d') ?>'  id="tglAkhir" placeholder="____-__-__" onchange="getPasien()">
                                            </span>
                                            <span class="input-group-btn">
                                                <select class="form-control" name="jns_layanan" id="jns_layanan" onchange="getPasien();getPoliklinik()">
                                                    <option value="">Pilih</option>
                                                    <option value="RJ" selected>Rawat Jalan</option>
                                                    <option value="GD">Gawat Darurat</option>
                                                    <option value="RI">Rawat Inap</option>
                                                </select>
                                                <!--input disabled="" type="text" class="form-control" style="text-align: center;border: none;"-->
                                            </span>
                                            <span class="input-group-btn">
                                                <select class="form-control" name="id_ruang" id="id_ruang" onchange="getPasien()">
                                                    <option value="">Pilih Poliklinik</option>
                                                </select>
                                                <!--input disabled="" type="text" class="form-control" style="text-align: center;border: none;"-->
                                            </span>
                                            <span class="input-group-btn">
                                                <select class="form-control" name="jns_pasien" id="jns_pasien" onchange="getPasien()">
                                                    <option value="">Pilih Jenis Pasien</option>
                                                    <option value="baru" >Pasien Baru</option>
                                                    <option value="lama">Pasien Lama</option>
                                                </select>
                                                <!--input disabled="" type="text" class="form-control" style="text-align: center;border: none;"-->
                                            </span>
                                                                           
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" name="q" value=''  id="q" placeholder="Keyword" onkeydown="search(event)">
                                        <div class="input-group-btn">
                                            <button type="button" id="cariPasien" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="col-xs-12">
            <ul class="nav nav-tabs nav-pills">
                <li class="active"><a data-toggle="tab" href="#home">Riwayat Kunjugan</a></li>
                <li><a data-toggle="tab" href="#menu1">Rekapitulasi Kunjungan</a></li>
            </ul>

            <div class="tab-content" style="background-color:#fff;">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class='bg-blue'>
                                        <tr>
                                            <th style="width: 50px">#</th>
                                            <th style="width: 60px">No MR</th>
                                            <th>Nama Pasien</th>
                                            <th style="width: 80px">No Reg RS</th>
                                            <!-- <th style="width: 120px">No Reg Unit</th> -->
                                            <th style="width: 100px">Tgl Registrasi</th>
                                            <th>Tujuan</th>
                                            <th>DPJP</th>
                                            <th style="width: 150px">Cara Bayar</th>
                                            <th style="width: 80px">No BPJS</th>
                                            <th style="width: 80px">Jns Layanan</th>
                                            <th style="width: 80px">Status<br/>Register</th>
                                            <th style="width: 80px">Jenis<br/>Pasien</th>
                                            <th style="width: 150px">Users</th>
                                            <th style="width: 80px">#</th>
                                        </tr>    
                                    </thead>
                                    <tbody id="getHistory"><tr><td colspan="14">Data masih kosong</td></tr></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="14" id="pagination"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12"></div>
                    </div>
                </div>
            </div>

            <!-- <div class="box box-success">
                <div class="box-header with-border">
                    Riwayat Kunjungan Pasien
                </div>
                


                <div class="box-body table-responsive">
                    
                </div>
            </div> -->
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    var Base64 = {
        _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
        encode: function(e) {
            var t = "";
            var n, r, i, s, o, u, a;
            var f = 0;
            e = Base64._utf8_encode(e);
            while (f < e.length) {
                n = e.charCodeAt(f++);
                r = e.charCodeAt(f++);
                i = e.charCodeAt(f++);
                s = n >> 2;
                o = (n & 3) << 4 | r >> 4;
                u = (r & 15) << 2 | i >> 6;
                a = i & 63;
                if (isNaN(r)) {
                    u = a = 64
                } else if (isNaN(i)) {
                    a = 64
                }
                t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
            }
            return t
        },
        decode: function(e) {
            var t = "";
            var n, r, i;
            var s, o, u, a;
            var f = 0;
            e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            while (f < e.length) {
                s = this._keyStr.indexOf(e.charAt(f++));
                o = this._keyStr.indexOf(e.charAt(f++));
                u = this._keyStr.indexOf(e.charAt(f++));
                a = this._keyStr.indexOf(e.charAt(f++));
                n = s << 2 | o >> 4;
                r = (o & 15) << 4 | u >> 2;
                i = (u & 3) << 6 | a;
                t = t + String.fromCharCode(n);
                if (u != 64) {
                    t = t + String.fromCharCode(r)
                }
                if (a != 64) {
                    t = t + String.fromCharCode(i)
                }
            }
            t = Base64._utf8_decode(t);
            return t
        },
        _utf8_encode: function(e) {
            e = e.replace(/\r\n/g, "\n");
            var t = "";
            for (var n = 0; n < e.length; n++) {
                var r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r)
                } else if (r > 127 && r < 2048) {
                    t += String.fromCharCode(r >> 6 | 192);
                    t += String.fromCharCode(r & 63 | 128)
                } else {
                    t += String.fromCharCode(r >> 12 | 224);
                    t += String.fromCharCode(r >> 6 & 63 | 128);
                    t += String.fromCharCode(r & 63 | 128)
                }
            }
            return t
        },
        _utf8_decode: function(e) {
            var t = "";
            var n = 0;
            var r = c1 = c2 = 0;
            while (n < e.length) {
                r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r);
                    n++
                } else if (r > 191 && r < 224) {
                    c2 = e.charCodeAt(n + 1);
                    t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                    n += 2
                } else {
                    c2 = e.charCodeAt(n + 1);
                    c3 = e.charCodeAt(n + 2);
                    t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                    n += 3
                }
            }
            return t
        }
    }
$(document).ready(function () { 
    getPasien();
    getPoliklinik();
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "yyyy-mm-dd"
    }) 
    $('#cariPasien').click(function(){
        getPasien();
        /*var a = $('#tglAwal').val();
        var b = $('#tglAkhir').val();
        if(a == '' || b == ''){
            alert('Periode tanggal tidak boleh kosong');
        }else{*/
                       
        //}
    }); 
});  
function getPasien(page="1"){
    var param={
        limit : $('#limit').val(),
        page : page,
        dari : $('#tglAwal').val(),
        sampai : $('#tglAkhir').val(),
        jnslayanan : $('#jns_layanan').val(),
        id_ruang : $('#id_ruang').val(),
        jnspasien : $('#jns_pasien').val(),
        keyword : $('#q').val(),
    }
    $.ajax({
        url     : "<?php echo base_url().'mr_registrasi.php/riwayat/data' ?>",
        type    : "GET",
        data    : param,
        beforeSend : function(){
            $('#getHistory').html("<tr><td colspan=11><i class='fa fa-spin fa-refresh'></i> Silahkan ditunggu... Sedang menghubungi server.</td></tr>");
        },
        success : function(data){
            var listdata=data.list;
            var table="";
            // let page=data.page;
            let limit=data.limit;

            var no=(page*limit)-limit;
            for (let i = 0; i < listdata.length; i++) {
                no++;
                const e = listdata[i];
                if(e.status_daftar !='Active') var st="class='cancel'"; else var st="";
                encodedString = Base64.encode(e.reg_unit);
                table+=`<tr `+st+`>
                <td style="width: 50px">`+no+`</td>
                <td style="width: 60px">`+e.nomr+`</td>
                <td>`+e.nama_pasien+`</td>
                <td style="width: 80px">`+e.id_daftar+`</td>
                <td style="width: 100px">`+e.tgl_masuk+`</td>
                <td>`+e.nama_ruang+`</td>
                <td>`+e.namaDokterJaga+`</td>
                <td style="width: 150px">`+e.cara_bayar+`</td>
                <td style="width: 80px">`+e.no_bpjs+`</td>
                <td style="width: 80px">`+e.jns_layanan+`</td>
                <td style="width: 80px">`+e.status_daftar+`</td>
                <td style="width: 80px">`+e.jns_pasien+`</td>
                <td style="width: 150px">`+e.pgwNama+`</td>
                <td style="width: 80px">
                <a href='`+base_url+`riwayat/alih/`+e.reg_unit+`' class='btn btn-danger btn-sm'><span class="fa fa-list"></span> Detail</a>
                </td>
                </tr>`;
            }
            $('#getHistory').html(table);
            createPagination('getPasien',data.jmldata,page,limit,'pagination')
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });    
}
function createPagination(func, jmldata,start,limit,pagidx){
        var pagination="";
        var btnIdx="";
        jmlPage = Math.ceil(jmldata/limit);
        offset  = start % limit;
        var curIdx = start;
        var btn="btn-default";
        var btnFirst="<button class='btn btn-default btn-sm' onclick='"+func+"(1)'><<</button>";
        if (curIdx > 1) {
            var prevSt=curIdx-1;
            btnFirst+="<button class='btn btn-default btn-sm' onclick='"+func+"("+prevSt+")'><</button>";
        }     
        var btnLast="";
        if(curIdx<jmlPage){
            var nextSt=curIdx+1;
            btnLast+="<button class='btn btn-default btn-sm' onclick='"+func+"("+nextSt+")'>></button>";
        }
        console.log(curIdx);
        btnLast+="<button class='btn btn-default btn-sm' onclick='"+func+"("+jmlPage+")'>>></button>";
        if(jmlPage>=5){
            console.clear();
            console.log('Jumlah Halaman > 5');
            if(curIdx>=3){
                console.log('Cur Idx >= 3');
                var idx_start=parseInt(curIdx) - 2;
                var idx_end=parseInt(curIdx) + 2;
                if(idx_end>=jmlPage) {
                    idx_end=jmlPage;
                }
            }else{
                var idx_start=1;
                var idx_end=5;
            }
            for (var j = idx_start; j<=idx_end; j++) {
                if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                btnIdx+="<button class='btn " +btn +" btn-sm' onclick='"+func+"("+ j +")'>" + j +"</button>";
            }
        }else{
                    
            for (var j = 1; j<=jmlPage; j++) {
                if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                btnIdx+="<button class='btn " +btn +" btn-sm' onclick='"+func+"("+ j +")'>" + j +"</button>";
            }
        }
        if(jmlPage>1){
            var tdata="<button class='btn btn-default btn-sm' type='button'> Total Data "+jmldata+"</button>";
            pagination+="<div class='btn-group'>"+tdata+btnFirst + btnIdx + btnLast+"</div>";
            $('#'+pagidx).html(pagination);
        }else{
            $('#'+pagidx).html('');
        }
        
    }
function search(evt){
    //alert("Cari Pasien")
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if(evt.keyCode==13){
        //alert('ENter');
		getPasien();
	}
	return true;
}

function getPoliklinik(){
    var jnslayanan=$('#jns_layanan').val();
    $.ajax({
        url     : "<?php echo base_url().'mr_registrasi.php/riwayat/poliklinik/' ?>"+jnslayanan,
        type    : "GET",
        data    : {},
        beforeSend : function(){
            // $('#getHistory').html("<tr><td colspan=11><i class='fa fa-spin fa-refresh'></i> Silahkan ditunggu... Sedang menghubungi server.</td></tr>");
        },
        success : function(data){
            var table='<option value="">Pilih</option>';
            var no=0;
            for (let i = 0; i < data.length; i++) {
                table+=`<option value='`+data[i].idx+`'>`+data[i].ruang+`</option>`;
            }
            $('#id_ruang').html(table);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    }); 
}
</script>
