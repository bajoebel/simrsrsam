<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<style>
    div#pagination b {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    div#pagination a {
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

    /*.modal-content {
        max-height: 600px;
    }*/
    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .divRegCredit {
        display: none
    }

    a em {
        font-size: 10px;
    }

    fieldset legend {
        text-transform: uppercase;
        font-weight: bolder;
    }
    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    /* .ui-autocomplete-input {
        border: none;
        font-size: 14px;
        border: 1px solid #DDD !important;
        z-index: 1511;
        position: relative;
    } */

    .ui-menu .ui-menu-item a {
        font-size: 12px;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        /*width: 160px;*/
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }

    .ui-menu-item>a.ui-corner-all {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;
    }

    .ui-state-hover,
    .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #0088cc;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
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
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="box-title"><button class="btn btn-primary" type="button" onclick="addDpo()"><span class="fa fa-plus"></span> Tambah Pasien DPO</button></h3>
                        </div>
                        
                        
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="q" id="q" value="" onkeyup="getData(1)" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm" onclick="getData(1)">Search</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="input-group">
                                <input type="hidden" name="param" id="param">
                                <select name="limit" id="limit" class='form-control' onchange="getData(1)">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table id="simple-table" class="table table-bordered table-hover" style='color:#000000;'>
                        <thead class="bg-blue">
                            <th>No</th>
                            <th>Nomr</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Status DPO</th>
                            <th>User Verifikasi</th>
                            <th>Tgl entri</th>
                            <th style="width: 150px;">#</th>
                        </thead>
                        <tbody id="data">

                        </tbody>
                        <tfoot >
                            <tr>
                                <td colspan="8" id="pagination"></td>
                            </tr>
                        </tfoot>
                    </table><br>&nbsp;
                </div>
            </div>
        </div>
    </div>


</section>

<div class="modal fade" id="formdpo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Aprove</h4>
            </div>
            <div class="modal-body">

                <!--form id="form1" class="form-horizontal" onsubmit="return false"-->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" class="form-horizontal">
                            <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">Nomr</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <input type="hidden" name="Id" id="Id">
                                        <input name="dponomr" id="dponomr" type="text" class="form-control" value="" placeholder="Ketikan Nomr" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <input name="dponama" id="dponama" type="text" class="form-control" placeholder="Ketikkan Nama Pasien">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">Keterangan</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <textarea name="dpoketerangan" id="dpoketerangan" cols="5" rows="5" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">&nbsp;</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <input type="checkbox" name="status_dpo" id="status_dpo" value="1"> Selesai
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCariRujukanPasien" onclick="simpanDpo()" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url() . "mr_registrasi.php/"; ?>";

    $(document).ready(function() {
        $.widget("custom.pasien", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
            },
            _renderMenu(ul, items) {
                var self = this;
                ul.addClass("container");

                let header = {
                    nomr: "Nomr",
                    nama: "Nama Pasien",
                    isheader: true
                };
                self._renderItemData(ul, header);
                $.each(items, function(index, item) {
                    self._renderItemData(ul, item);
                });

            },
            _renderItemData(ul, item) {
                return this._renderItem(ul, item).data("ui-autocomplete-item", item);
            },
            _renderItem(ul, item) {
                var $li = $("<li class='ui-menu-item' role='presentation'></li>");
                if (item.isheader)
                    $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important; width:100%'></li>");
                var $content = "<div class='col-md-12 ui-menu-item-wrapper'>" +
                    "<div class='col-md-2'>" + item.nomr + "</div>" +
                    "<div class='col-md-10'>" + item.nama + "</div>" +
                    "</div>";
                $li.html($content);
                return $li.appendTo(ul);
            }
        });

        $("#dponomr").pasien({
            source: function(request, response) {
                $.ajax({
                    url: base_url+"dpo/caripasien",
                    dataType: "JSON",
                    method: "GET",
                    data: {
                        param:'nomr',
                        nomr: request.term
                    },
                    success: function(data) {
                        console.clear();
                        console.log(data);
                        // console.log(diagnosa);
                        response(data.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 2,
            focus: function(event, ui) {
                $("#dponomr").val(ui.item['nomr']);
                $("#dponama").val(ui.item['nama']);
                $("#dponomr").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                $("#dponomr").val(ui.item['nomr']);
                $("#dponama").val(ui.item['nama']);
                $("#dponomr").removeClass("ui-autocomplete-loading");
                // spesialistiRujukan()
                return false;
            }
        });
        $("#dponama").pasien({
            source: function(request, response) {
                $.ajax({
                    url: base_url+"dpo/caripasien",
                    dataType: "JSON",
                    method: "GET",
                    data: {
                        param:'nama',
                        nomr: request.term
                    },
                    success: function(data) {
                        console.clear();
                        console.log(data);
                        // console.log(diagnosa);
                        response(data.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 2,
            focus: function(event, ui) {
                $("#dponomr").val(ui.item['nomr']);
                $("#dponama").val(ui.item['nama']);
                $("#dponama").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                $("#dponomr").val(ui.item['nomr']);
                $("#dponama").val(ui.item['nama']);
                $("#dponama").removeClass("ui-autocomplete-loading");
                // spesialistiRujukan()
                return false;
            }
        });
    })
    function editDpo(id){
        var url = base_url + "dpo/edit/" + id;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {},
            success: function (data) {
                if(data.status==true){
                    $('#formdpo').modal('show');
                    $('#Id').val(data.data.Id)
                    $('#dponomr').val(data.data.nomr)
                    $('#dponama').val(data.data.nama)
                    $('#dpoketerangan').val(data.data.keterangan)
                    if(data.data.status_dpo==1)  $('#status_dpo').prop('checked',true);
                    else $('#status_dpo').prop('checked',false);
                    $('#dponomr').prop('readonly',true);
                    $('#dponama').prop('readonly',true);
                }else{
                    tampilkanPesan('error',data.message);
                }
            }
        });
    }
    function hapusDpo(id){
        swal({
			title: "Konfirmasi",
			text: 'Apakah anda yakin akan menghapus status dpo pasien ini ?',
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
			closeOnConfirm: true,
			closeOnCancel: true
		},
		function (isConfirm) {
			if (isConfirm) {
                var url = base_url + "dpo/hapus/" + id;
                console.log(url);
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    data: {},
                    success: function (data) {
                        if(data.status==true){
                            getData(1);
                        }else{
                            tampilkanPesan('error',data.message);
                        }
                    }
                });
            }
        });
        
    }
    function simpanDpo(){
        var url = base_url + "dpo/simpan";
        console.log(url);
        var st=$('#status_dpo').prop('checked');
        if(st==true) var status_dpo=1; else var status_dpo=0;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                'Id':$('#Id').val(),
                'nomr':$('#dponomr').val(),
                'nama':$('#dponama').val(),
                'keterangan':$('#dpoketerangan').val(),
                'status_dpo':status_dpo,
            },
            success: function (data) {
                if(data.status==true){
                    $('#formdpo').modal('hide');
                    getData(1);
                }else{
                    tampilkanPesan('error',data.message);
                }
            }
        });
    }
    function addDpo(){
        $('#formdpo').modal('show');
        $('#Id').val("");
        $('#dponama').val("");
        $('#dponomr').val("");
        $('#dpoketerangan').val("");
        $('#dponomr').prop('readonly',false)
        $('#dponama').prop('readonly',false)
    }
</script>