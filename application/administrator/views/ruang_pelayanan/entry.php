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

    #divLoading {
        display: none
    }

    .divRI {
        display: none
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ruang Pelayanan <span style="color: red"> * </span></label>
                                <input type="hidden" name="idx" id="idx" value="<?php echo $idx ?>">
                                <input type="text" class="form-control" name="ruang" id="ruang" value="<?php echo $ruang ?>">
                            </div>
                            <div class="form-group">
                                <label>Group Layanan</label>
                                <select name="grid" id="grid" class="form-control">
                                    <?php foreach ($glayanan->result_array() as $x) : ?>
                                        <option <?php echo ($grid == $x['idx']) ? "selected='selected'" : "" ?> value="<?php echo $x['idx'] ?>"><?php echo $x['group_ruang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group divRJ">
                                <label>Kode JKN</label>
                                <input type="text" class='form-control' id="kode_jkn" name="kode_jkn" value="<?= $kodejkn ?>" placeholder="Masukkan Subpesialis JKN">
                            </div>
                            <div class="form-group">
                                <label><input type="checkbox" id="status_ruang" name="status_ruang" value="1" <?php if ($status_ruang == 1) echo "checked" ?>> Aktif</label>

                            </div>


                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group">
                                    <div id="divBtn">
                                        <button type="button" class="btn btn-primary" id="btnKembali">
                                            <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                        <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                                            <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                    </div>
                                    <div id="divLoading">
                                        <span><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var grid = "<?php echo $grid ?>";
        $('#divBtn').show();
        $('#divLoading').hide();
        if (grid == "") {
            $('#grid').prop('selectedIndex', 0);
            //$('.divRI').hide();
            $('.divRJ').show();
        } else if (grid == "2") {
            $('.divRJ').hide();
            //$('.divRI').show();
        } else {
            $('.divRJ').show();
            //$('.divRI').hide();
        }

        $('#grid').change(function() {
            var a = $(this).val();
            if (a == "2") {
                //$('.divRI').show();
                $('.divRJ').hide();
            } else {
                //$('.divRI').hide();
                $('.divRJ').show();
            }
        });
        $(".inputmask").inputmask();
        $('#btnKembali').click(function() {
            var url = "<?php echo base_url() . 'administrator.php/ruang_pelayanan' ?>";
            window.location.href = url;
        });
        $('input').focus(function() {
            return this.select();
        });
    });

    function simpan() {
        var a = $('#idx').val();
        var b = $('#ruang').val();
        var c = $('#grid').val();
        var d = $('#grid :selected').html();
        if ($('#status_ruang').is(":checked")) {
            var e = 1;
        }else{
            var e = 0;
        }
        var f = $('#kode_jkn').val();
        var formdata = {
            idx: a,
            ruang: b,
            grid: c,
            grNama: d,
            status_ruang: e,
            kodejkn: f
        };

        if (b == "") {
            alert('Ops. Ruang Pelayanan harus di isi.');
            $('#ruang').focus();
        } else if (c == "") {
            alert('Ops. Group layanan harus di pilih.');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/ruang_pelayanan/simpan' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#divBtn').hide();
                    $('#divLoading').show();
                },
                success: function(data) {
                    $('#divBtn').show();
                    $('#divLoading').hide();
                    alert(data.message);
                    if (data.code == 200) {
                        $('#form1').find('input').val('');
                    } else if (data.code == 201) {
                        var url = "<?php echo base_url() . 'administrator.php/ruang_pelayanan' ?>";
                        window.location.href = url;
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#divBtn').show();
                    $('#divLoading').hide();
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
</script>