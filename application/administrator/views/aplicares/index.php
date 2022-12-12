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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Data Ketersediaan Tempat Tidur Aplicare</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Data Ketersediaan Tempat Tidur Rumah Sakit</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-1 pull-right">
                                <input type="hidden"  name="start" id="start" value='1'>
                                        
                                        <select name="limit" id="limit" class='form-control' onchange="getTable(1)">
                                            <option value="10">10</option>
                                            <option value="20" selected>20</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px" rowspan="2">#</th>
                                            <th rowspan="2">Nama Ruang</th>
                                            <th rowspan="2">Nama Kelas</th>
                                            <th rowspan="2">Kapasitas</th>
                                            <th colspan="3" style="text-align=center">Tersedia</th>
                                            <th style="width: 150px" rowspan="2">Aksi</th>
                                        </tr>    
                                        <tr>
                                            <th>Pria</th>
                                            <th>Wanita</th>
                                            <th>Pria / Wanita</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getdata"></tbody>
                                    <tfoot>
                                    <tr>
                                    <td colspan='9' id='pagination'>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class='btn btn-primary btn-sm' type='button'>Prev</button>
                                        </div>
                                        <div class="col-md-6 ">
                                            <button class='btn btn-primary btn-sm pull-right' type='button'>Next</button>
                                        </div>
                                    </div>
                                    </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" id="keyword1" name="keyword1" class="form-control pull-right" placeholder="Enter Keyword">
                                <div class="input-group-btn">
                                    <button type="button" id="btnKeyword" class="btn btn-primary">
                                        <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-1">
                                <input type="hidden"  name="start1" id="start1" value='1'>
                                        
                                        <select name="limit1" id="limit1" class='form-control' onchange="getTable1(1)">
                                            <option value="10">10</option>
                                            <option value="20" selected>20</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px" rowspan="2">#</th>
                                            <th rowspan="2">Nama Ruang</th>
                                            <th rowspan="2">Nama Kelas</th>
                                            <th rowspan="2">Kapasitas</th>
                                            <th colspan="3" style="text-align=center">Tersedia</th>
                                            <th style="width: 150px" rowspan="2">Aksi</th>
                                        </tr>    
                                        <tr>
                                            <th>Pria</th>
                                            <th>Wanita</th>
                                            <th>Pria / Wanita</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getdata1"></tbody>
                                    <tfoot>
                                    <tr>
                                    <td colspan='9' id='pagination1'>
                                    
                                    </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                
                </div>
                <!-- /.tab-content -->
            </div>
            
        </div>
    </div>
    
    <div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Entry</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kodekelas" id="kodekelas" class="form-control">
                                        <option value="-">Pilih Kelas</option>
                                        <?php 
                                        foreach ($kelas as $k ) {
                                            ?>
                                            <option value="<?= $k->kodekelas ?>"><?= $k->namakelas?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>                        
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Ruang</label>
                                    <input type="hidden" name="koderuang" id="koderuang">
                                    <input type="text" class="form-control" name="namaruang" id="namaruang">
                                </div>                        
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kapasitas</label>
                                    <input type="text" class="form-control" name="kapasitas" id="kapasitas">
                                </div>                        
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tersedia</label>
                                    <input type="text" class="form-control" name="tersedia" id="tersedia">
                                </div>                        
                            </div>  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tersedia (Pria)</label>
                                    <input type="text" class="form-control" name="tersediapria" id="tersediapria">
                                </div>                        
                            </div>     
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tersedia (Wanita)</label>
                                    <input type="text" class="form-control" name="tersediawanita" id="tersediawanita">
                                </div>                        
                            </div>   
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tersedia Pria/Wanita</label>
                                    <input type="text" class="form-control" name="tersediapriawanita" id="tersediapriawanita">
                                </div>                        
                            </div>                     
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="update()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable(1);
    getTable1(1);
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#idx').val('');
        $('#bahasa').val('');
        $('#formModal').modal('show');
    });
    $('#btnRefresh').click(function(){
        $('input').val('');
        getTable(1)
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            getTable(1)          
        }
    });
    $('#btnKeyword').click(function(){
        getTable1(1)           
    });
});

var stat = new Array("Non Aktif", "Aktif");
var base_url="<?= base_url()."administrator.php" ?>";
function getTable(start){
    $('#start').val(start);
    var start = $('#start').val();
    var limit = $('#limit').val();
    var url = base_url+"aplicares/databed?start=" + start + "&limit=" + limit;
    console.clear()
    console.log(url)
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        beforeSend: function () {
            var tabel = "<tr id='loading'><td colspan='13'><b>Loading...</b></td></tr>";
            $('tbody#getdata').html(tabel);
            $('#pagination').html('');
        },
        success : function(data){
        //menghitung jumlah data
            if(data.metadata.code==1){
                $('tbody#getdata').html('');
                var res    = data.response.list;
                var jmlData=res.length;
                var tabel   = "";
                var row_count=35;
                //Create Tabel
                var no = (parseInt(start)*parseInt(limit))-parseInt(limit);
                var dari = no+1;
                var sampai = no+parseInt(limit);
                var desc = "<button class='btn btn-default btn-sm' type='button'>Showing "+ dari + " To " + sampai + " of " +data["row_count"]+"</button>";
                for(var i=0; i<jmlData;i++){
                    tabel="<tr>";tabel+="<td>"+res[i].rownumber+"</td>";
                    tabel+="<td>"+res[i].namaruang + "</td>";
                    tabel+="<td>"+res[i].namakelas + "</td>";
                    tabel+="<td>"+res[i].kapasitas + "</td>";
                    tabel+="<td>"+res[i].tersediapria + "</td>";
                    tabel+="<td>"+res[i].tersediawanita +"</td>";
                    tabel+="<td>"+res[i].tersediapriawanita + "</td>";
                    tabel+="<td style='text-align:right;'>"+
                    "<div class='btn-group'>"+
                    "<button onclick='editRuangAplicares(\""+res[i].kodekelas+"\",\""+res[i].koderuang+"\",\""+res[i].namaruang+"\",\""+res[i].kapasitas+"\",\""+res[i].tersedia+"\",\""+res[i].tersediapria+"\",\""+res[i].tersediawanita+"\",\""+res[i].tersediapriawanita+"\")' class='btn btn-warning btn-sm'><span class='fa fa-pencil'></span> Edit</button>"+
                    "<button onclick='hapusRuangAplicares(\""+res[i].kodekelas+"\",\""+res[i].koderuang+"\")' class='btn btn-danger btn-sm'><span class='fa fa-remove'></span> Hapus</button>"+
                    "</div></td>";tabel+="</tr>";
                    $('tbody#getdata').append(tabel);
                }
                //Create Pagination
                if(row_count<=limit){
                    $('#pagination').html("");
                }else{
                    console.log("buat Pagination");
                    var pagination="";
                    var btnIdx="";
                    jmlPage = Math.ceil(row_count/limit);
                    offset  = start % limit;
                    
                    var curIdx = start;
                    var btn="btn-default";
                    var btnFirst="<button class='btn btn-default btn-sm' onclick='getTable(1)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt=curIdx-limit;
                        btnFirst+="<button class='btn btn-default btn-sm' onclick='getTable("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
                    }
        
                    var btnLast="";
                    if(curIdx<jmlPage){
                        var nextSt=curIdx+1;
                        btnLast+="<button class='btn btn-default btn-sm' onclick='getTable("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
                    }
                    console.log(curIdx);
                    btnLast+="<button class='btn btn-default btn-sm' onclick='getTable("+jmlPage+")'><span class='fa fa-angle-double-right'></span></button>";
                    
                    if(jmlPage>=5){
                        console.clear();
                        console.log('Jumlah Halaman > 5');
                        if(curIdx>=3){
                            console.log('Cur Idx >= 3');
                            var idx_start=curIdx - 2;
                            var idx_end=curIdx + 2;
                            if(idx_end>=jmlPage) idx_end=jmlPage;
                        }else{
                            var idx_start=1;
                            var idx_end=5;
                        }
                        for (var j = idx_start; j<=idx_end; j++) {
                            if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getTable("+ j +")'>" + j +"</button>";
                        }
                    }else{
        
                        for (var j = 1; j<=jmlPage; j++) {
                            if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getTable("+ j +")'>" + j +"</button>";
                        }
                    }
                    pagination+="<div class='btn-group'>"+desc+btnFirst + btnIdx + btnLast+"</div>";
                    $('#pagination').html(pagination);
                }
            }
        },
        complete : function(){
            //$('#loading').hide();
        }
    });
}    
function getTable1(start){
    $('#start1').val(start);
    var start = $('#start1').val();
    var keyword = $('#keyword1').val();
    var limit = $('#limit1').val();
    var url = base_url+"aplicares/databedrs?start=" + start + "&limit=" + limit+ "&keyword=" + keyword;
    //console.clear()
    console.log(url)
    
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        beforeSend: function () {
            var tabel = "<tr id='loading'><td colspan='13'><b>Loading...</b></td></tr>";
            $('tbody#getdata1').html(tabel);
            $('#pagination1').html('');
        },
        success : function(data){
        //menghitung jumlah data
            if(data.status==true){
                $('tbody#getdata1').html('');
                var res    = data.data;
                var jmlData=res.length;
                var tabel   = "";
                var row_count=parseInt(data.row_count);
                //Create Tabel
                var no = (parseInt(start)*parseInt(limit))-parseInt(limit);
                var dari = no+1;
                var idx=data['start']; 
                var sampai = no+parseInt(limit);
                var desc = "<button class='btn btn-default btn-sm' type='button'>Showing "+ dari + " To " + sampai + " of " +data["row_count"]+"</button>";
                for(var i=0; i<jmlData;i++){
                    idx++
                    tabel="<tr>";tabel+="<td>"+idx+"</td>";
                    tabel+="<td>"+res[i].namaruang + "</td>";
                    tabel+="<td>"+res[i].kelas_jkn + "</td>";
                    tabel+="<td>"+res[i].kapasitas + "</td>";
                    tabel+="<td>"+res[i].tersediapria + "</td>";
                    tabel+="<td>"+res[i].tersediawanita +"</td>";
                    tabel+="<td>"+res[i].tersediapriawanita + "</td>";
                    tabel+="<td style='text-align:right;'><div class='btn-group'><button onclick='exportToAplicare(\""+res[i].kodekelas+"\",\""+res[i].koderuang+"\",\""+res[i].namaruang+"\",\""+res[i].kapasitas+"\",\""+res[i].tersediapria+"\",\""+res[i].tersediawanita+"\",\""+res[i].tersediapriawanita+"\")' class='btn btn-success btn-sm'><span class='fa fa-upload'></span> Export to Aplicare</button></div></td>";tabel+="</tr>";
                    $('tbody#getdata1').append(tabel);
                }
                //Create Pagination
                if(row_count<=limit){
                    $('#pagination1').html("");
                }else{
                    console.log("buat Pagination");
                    var pagination="";
                    var btnIdx="";
                    jmlPage = Math.ceil(row_count/limit);
                    offset  = start % limit;
                    
                    var curIdx = start;
                    var btn="btn-default";
                    var btnFirst="<button class='btn btn-default btn-sm' onclick='getTable1(1)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt=curIdx-limit;
                        btnFirst+="<button class='btn btn-default btn-sm' onclick='getTable1("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
                    }
        
                    var btnLast="";
                    if(curIdx<jmlPage){
                        var nextSt=curIdx+1;
                        btnLast+="<button class='btn btn-default btn-sm' onclick='getTable1("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
                    }
                    console.log(curIdx);
                    btnLast+="<button class='btn btn-default btn-sm' onclick='getTable1("+jmlPage+")'><span class='fa fa-angle-double-right'></span></button>";
                    
                    if(jmlPage>=5){
                        console.clear();
                        console.log('Jumlah Halaman > 5');
                        if(curIdx>=3){
                            console.log('Cur Idx >= 3');
                            var idx_start=curIdx - 2;
                            var idx_end=curIdx + 2;
                            if(idx_end>=jmlPage) idx_end=jmlPage;
                        }else{
                            var idx_start=1;
                            var idx_end=5;
                        }
                        for (var j = idx_start; j<=idx_end; j++) {
                            if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getTable1("+ j +")'>" + j +"</button>";
                        }
                    }else{
        
                        for (var j = 1; j<=jmlPage; j++) {
                            if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getTable1("+ j +")'>" + j +"</button>";
                        }
                    }
                    pagination+="<div class='btn-group'>"+desc+btnFirst + btnIdx + btnLast+"</div>";
                    $('#pagination1').html(pagination);
                }
            }
        },
        complete : function(){
            //$('#loading').hide();
        }
    });
}   
function editRuangAplicares(kodekelas,koderuang,namaruang,kapasitas,tersedia,tersediapria,tersediawanita,tersediapriawanita){
    //alert(namaruang)
    $('#submit').html('Update');
    $('#kodekelas').val(kodekelas);
    $('#koderuang').val(koderuang);
    $('#namaruang').val(namaruang);
    $('#kapasitas').val(kapasitas);
    $('#tersedia').val(tersedia);
    $('#tersediapria').val(tersediapria);
    $('#tersediawanita').val(tersediawanita);
    $('#tersediapriawanita').val(tersediapriawanita);
    $('#formModal').modal("show");
}
function update(){
    $.ajax({
            url         : "<?php echo base_url().'administrator.php/aplicares/updatebed' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            success     : function(data){
                if(data.metadata.code==1){
                    alert(data.metadata.message);
                    $('#form1').find('input').val('');
                }else {
                    alert(data.metadata.message);
                    $('#form1').find('input').val('');
                    $('#formModal').modal('hide');
                }
                getTable(1);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
}     
function hapusRuangAplicares(a,b){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/aplicares/hapus' ?>",
            type        : "POST",
            data        : {kodekelas:a,koderuang:b},
            dataType    : "JSON",
            success     : function(data){
                alert(data.metadata.message);    
                if(data.metadata.code==1){
                    getTable(1);
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
} 
function exportToAplicare(kodekelas,koderuang,namaruang,kapasitas,tersediapria,tersediawanita,tersediapriawanita){
    var x = confirm("Apakah anda yakin akan mengexport data ini ke aplicares?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/aplicares/export' ?>",
            type        : "POST",
            data        : {kodekelas:kodekelas,koderuang:koderuang,namaruang:namaruang,kapasitas:kapasitas,tersediapria:tersediapria,tersediawanita:tersediawanita,tersediapriawanita:tersediapriawanita},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==1){
                    getTable(1);
                    getTable1(1);
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
}
</script>