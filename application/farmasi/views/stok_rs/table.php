<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>jquery/jquery-ui.css" />
<style>
.table td.centerObj {text-align: center;}
.table td.rightObj {text-align: right;}
.table td{font-size: 0.9em;}
.icon a{font-size: 0.9em;}
body .modal {width: 80%;/* respsonsive width */margin-left:-40%;/*width/2)*/}
.modal-dialog{overflow-y: initial !important}
.modal-body{max-height: calc(100vh - 250px);overflow-y: auto;}
.table th{font-size: 0.9em;}
div#pagination{float: right;}
div#pagination b{background: #000;color: #FFF;}
.left{float: left;}
.right{float: right;text-align: right;}
#searchTable{
     float: right;
     position: relative;
     top: 0px;
     z-index: 1;
}
div#searchTable input[type="text"]{
    background-color: #fff;
    border-left: 1px solid #e3ebed;
    border: 1px solid #e3ebed;
    border-radius: 0;
    line-height: 24px;
    font-size: 0.9em;
}
div#searchTable select{
    width: 200px;
    background-color: #fff;
    border-left: 1px solid #e3ebed;
    border: 1px solid #e3ebed;
    border-radius: 0;
    line-height: 24px;
    font-size: 0.9em;
}
#searchTable button{
    background-color: #2e363f;
    border: 0 none;
    margin-left: -5px;
    margin-top: -11px;
    padding: 5px 10px;
}
#filter{margin-top: 5px;float: right;width: 100px;}
.select2-dropdown {z-index: 19001;}
.rataKanan{text-align: right;}
</style>
<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Data Stok Obat / Alkes Instalasi Farmasi</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="left span4">
                    <button type="button" id="refresh" class="btn"><i class="icon-retweet"></i> Refresh</button>
                </div>
                <div id="searchTable" class="right span8">
                    <input type="text" class="" placeholder="Enter nama obat / alkes ..." name="keywordText" id="keywordText"/>
                    <button type="button" id="keywordButton" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> 
                        <h5>Data Stok Obat / Alkes</h5>
                        <div id="filter">
                            <select name="keywordFilter" id="keywordFilter">
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                            </select>                    
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Stok Obat / Alkes</th>
                                    <th width="50px">Kode</th>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
                                    <th>Group</th>
                                    <th>Satuan</th>
                                    <th width="80px">Min Stok</th>
                                    <th>Lokasi Obat</th>
                                    <th width="80px">Jml Lokasi</th>
                                    <th width="80px">Jml Stok</th>
                                </tr>
                            </thead>
                            <tbody id="getData"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo get_asset() ?>jquery/jquery.js"></script> 
<script src="<?php echo get_asset() ?>jquery/jquery.mask.js"></script>
<script src="<?php echo get_asset() ?>jquery/jquery-ui.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo get_asset() ?>js/bootstrap.min.js"></script> 
<script src="<?php echo get_asset() ?>js/select2.min.js"></script> 
<script src="<?php echo get_asset() ?>js/maruti.js"></script>
<script src="<?php echo get_asset() ?>js/defira.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    	$('#KDKTBRG').select2({placeholder:'Pilih Kategori Barang'}).val('').trigger('change');
    	$('#KDGRBRG').select2({placeholder:'Pilih Group Barang'}).val('').trigger('change');
    	$('#KDSATUAN').select2({placeholder:'Pilih Satuan'}).val('').trigger('change');
    	$('#KDJENISBRG').select2({placeholder:'Pilih Jenis Barang'}).val('').trigger('change');
    	$('#keywordFilter').select2().val('10').trigger('change');
        
        getTable();
        function getTable(){
            $.ajax({
                url     : "<?php echo base_url().'stok_rs/getView' ?>",
                type    : "POST",
                data    : {sFilter:10,sLike:""},
                beforeSend  : function(){
                    $('tbody#getData').html("<tr><td colspan=11>Loading... Please Wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getData').html(data);
                },
                error   : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });            
        }
        $('#refresh').click(function(){
            $('#keywordFilter').val('').trigger('change');
            $('#keywordText').val("");
            window.location.reload();
        });           
        $('#keywordFilter').change(function(){
            var a = $("#keywordFilter").val();
            var b = $("#keywordText").val();
            $.ajax({
                url         : "<?php echo base_url().'stok_rs/getView' ?>",
                type        : "POST",
                data        : {sFilter:a,sLike:b},
                beforeSend  : function(){
                    $('tbody#getData').html("<tr><td colspan=11>Loading... Please Wait</td></tr>");
                },
                success     : function(data){
                    $('tbody#getData').html(data);
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });            
        });
        $('#MARKUP').keydown(function(){
            var x = $(this).val();
            if(x==""){
                $('#MARKUP').val("0");
            }
        });
        $('#MINSTOK').keydown(function(){
            var x = $(this).val();
            if(x==""){
                $('#MINSTOK').val("0");
            }
        });
        $('#keywordText').keyup(function(ev){
            var event = ev.keyCode | ev.witch;
            if(event==13){
                $('#keywordButton').click();
            }
        });
        $('#keywordButton').click(function(){
            var a = $("#keywordFilter").val();
            var b = $("#keywordText").val();
            $.ajax({
                url         : "<?php echo base_url().'stok_rs/getView' ?>",
                type        : "POST",
                data        : {sFilter:a,sLike:b},
                beforeSend  : function(){
                    $('tbody#getData').html("<tr><td colspan=11>Loading... Please Wait</td></tr>");
                },
                success     : function(data){
                    $('tbody#getData').html(data);
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });            
        });
    });
</script>
<script>
    function getTable(){
        $.ajax({
            url : "<?php echo base_url().'stok_rs/getView' ?>",
            type : "POST",
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=11>Loading... Please Wait</td></tr>");
            },
            success : function(data){
                $('tbody#getData').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(errorThrown);
            }
        });            
    }
    function addData(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#NMGENERIK').val('');
        $('#KDKTBRG').val('').trigger('change');
        $('#KDGRBRG').val('').trigger('change');
        $('#KDSATUAN').val('').trigger('change');
        $('#KDJENISBRG').val('').trigger('change');
        $('#MARKUP').val('0');
        $('#MINSTOK').val('0');
        $('#myModal').modal('show');
    }            
    function edit(a,b,c,d,e,f,g,h){
        $('#KDBRG').val(a);
        $('#NMBRG').val(urldecode(b));
        $('#NMGENERIK').val(urldecode(c));
        $('#KDKTBRG').val(urldecode(d)).trigger('change');
        $('#KDGRBRG').val(urldecode(e)).trigger('change');
        $('#KDSATUAN').val(urldecode(f)).trigger('change');
        $('#KDJENISBRG').val(urldecode(g)).trigger('change');
        $('#MARKUP').val(curencyFormat(urldecode(h)));
        $('#MINSTOK').val(curencyFormat(urldecode(i)));
        $('#myModal').modal('show');
    }    
    function hapus(a){
        var x = confirm("Apakah anda yakin akan menghapus Record ini?");
        if(x){
            $.ajax({
                url         : "<?php echo base_url().'stok_rs/hapusRecord' ?>",
                type        : "POST",
                data        : {KDBRG:a},
                dataType    : "JSON",
                success     : function(data){
                    alert(data.message);
                    getTable();
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);                    
                    alert(jqXHR.errorThrown);
                }
            });            
        }else{
            return false;            
        }
    }
    function simpanData(){
        var a = $('#KDBRG').val();
        var b = $('#KDKTBRG').val();
        var c = $('#KDSATUAN').val();
        var d = $('#NMBRG').val();
        var e = $('#MINSTOK').val();
        var f = $('#KDGRBRG').val();
        var g = $('#KDJENISBRG').val();
        if(b==""){
            alert("Kategori harus di pilih");
            $('#KDKTBRG').focus();
        }else if(f==""){
            alert("Group Barang harus di isi");
            $('#KDGRBRG').focus();
        }else if(c==""){
            alert("Satuan harus di pilih");
            $('#KDSATUAN').focus();
        }else if(g==""){
            alert("Jenis harus di pilih");
            $('#KDJENISBRG').focus();
        }else if(d==""){
            alert("Nama stok_rs / Alat Kesehatan harus di isi");
            $('#NMBRG').focus();
        }else if(e==""){
            alert("Harga jual harus di isi");
            $('#MINSTOK').focus();
        }else{
            $.ajax({
                url         : "<?php echo base_url().'stok_rs/simpan' ?>",
                type        : "POST",
                data        : $('#form1').serialize(),
                dataType    : "JSON",
                success     : function(data){
                    getTable();
                    if(data.code==201){
                        $('#myModal').modal('hide');
                    }else if(data.code==401){
                        alert(data.message);
                    }else{
                        $('#KDBRG').val("");
                        $('#NMBRG').val("");
                        $('#NMGENERIK').val("");
                        $('#MINSTOK').val("0");
                        $('#NMBRG').focus();
                    }
                },
                error   : function(jqXHR,ajaxOption,errorThrown){
                    console.log('Error Function : ' + jqXHR.responseText)
                    alert('Response : '+errorThrown);
                }
            });            
        }
    }       
</script>
