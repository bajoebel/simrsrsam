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
                            <fieldset>
                                <legend>Data kamar</legend>
                                <?php
                                if (!empty($kamar)) {
                                    $kelas = $kamar->kelas_id;
                                    $jekel = $kamar->jekel;
                                    $ruang_display = $kamar->idruang_display;
                                    $kelas_display = $kamar->idkelas_display;
                                    $status_kamar = $kamar->status_kamar;
                                } else {
                                    $kelas = "";
                                    $jekel = "2";
                                    $ruang_display = "";
                                    $kelas_display = "";
                                    $status_kamar=$status_kamar;
                                }
                                ?>
                                <div class="form-group">
                                    <label>Nama Kamar <span style="color: red"> * </span></label>
                                    <input type="hidden" id="id_ruang" name="id_ruang" value="<?= $idx ?>">
                                    <input type="hidden" id="nama_ruang" name="nama_ruang" value="<?= $ruang ?>">
                                    <input type="hidden" name="id_kamar" id="id_kamar" value="<?php if (!empty($kamar)) echo $kamar->id_kamar ?>">
                                    <input type="text" class="form-control" name="nama_kamar" id="nama_kamar" value="<?php if (!empty($kamar)) echo $kamar->nama_kamar ?>" placeholder="Nama Kamar">
                                </div>
                                <div class="form-group">
                                    <label>Kelas Layanan</label>
                                    <select name="kelas_id" id="kelas_id" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($klayanan->result_array() as $x) : ?>
                                            <option <?php echo ($kelas == $x['idx']) ? "selected='selected'" : ""
                                                    ?> value="<?php echo $x['idx'] ?>"><?php echo $x['kelas_layanan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah TT</label>
                                    <input type="text" class='form-control' id="jml_tt" name="jml_tt" value="<?php if (!empty($kamar)) echo $kamar->jml_tt ?>" placeholder="Jumlah Tempat Tidur">
                                </div>
                                <div class="form-group">
                                    <label>Peruntukan</label>
                                    <select name="jekel" id="jekel" class="form-control">
                                        <option value="0" <?php echo ($jekel == "0") ? "selected='selected'" : "" ?>>P</option>
                                        <option value="1" <?php echo ($jekel == "1") ? "selected='selected'" : "" ?>>L</option>
                                        <option value="2" <?php echo ($jekel == "2") ? "selected='selected'" : "" ?>>L/P</option>
                                    </select>
                                </div>

                            </fieldset>
                            <fieldset>
                                <legend>Mapping Bed Monitoring</legend>
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select name="idruang_display" id="idruang_display" class="form-control">
                                        <option value="">Pilih Ruangan</option>
                                        <?php foreach ($ruangan_kemkes as $rk) : ?>
                                            <option value="<?php echo $rk['ruang_id'] ?>" <?php echo ($ruang_display == $rk['ruang_id']) ? "selected='selected'" : ""
                                                                                            ?>><?php echo $rk['ruang_perawatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="idkelas_display" id="idkelas_display" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas_kemkes as $x) : ?>
                                            <option <?php echo ($kelas_display == $x['kelas_id']) ? "selected='selected'" : ""
                                                    ?> value="<?php echo $x['kelas_id'] ?>"><?php echo $x['kelas_nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><input type="checkbox" id="status_kamar" name="status_kamar" value="1" <?php if ($status_kamar == 1) echo "checked" ?>> Aktif</label>
                                </div>
                            </fieldset>


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
        if ($('#status_kamar').is(":checked")) {
            var status_kamar = 1;
        } else {
            var status_kamar = 0;
        }
        var id_ruang = $('#id_ruang').val();
        var nama_ruang = $('#id_ruang').val();
        var nama_kamar = $('#id_kamar').val();
        var kelas = $('#kelas_id').val();
        var jml_tt = $('#jml_tt').val();

        var formdata = {
            id_kamar: $('#id_kamar').val(),
            nama_kamar: $('#nama_kamar').val(),
            id_ruang: $('#id_ruang').val(),
            nama_ruang: $('#nama_ruang').val(),
            kelas_id: $('#kelas_id').val(),
            kelas_layanan: $('#kelas_id :selected').html(),
            jml_tt: $('#jml_tt').val(),
            jekel: $('#jekel').val(),
            idruang_display: $('#idruang_display').val(),
            ruang_display: $('#idruang_display :selected').html(),
            idkelas_display: $('#idkelas_display').val(),
            kelas_display: $('#idkelas_display :selected').val(),
            status_kamar: status_kamar
        };

        if (id_kamar == "") {
            alert('Ops. Nama kamar harus di isi.');
            $('#ruang').focus();
        } else if (kelas == "") {
            alert('Ops. kelas layanan harus di pilih.');
        } else if (jml_tt == "") {
            alert('Ops. Jumlah Tempat tidur harus di pilih.');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/ruang_pelayanan/simpankamar' ?>",
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
                        var idruang = $('#id_ruang').val();
                        var url = "<?php echo base_url() . 'administrator.php/ruang_pelayanan/kamar/'  ?>" + idruang;
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