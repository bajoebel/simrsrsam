<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools">

                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <form action="#" class="form-horizontal" method="get">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label> Dari Bulan </label>
                                    <input type="text" name="dari" id="dari" class="form-control tanggal" value="<?= date('m/Y') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label> Sampai Bulan </label>
                                    <input type="text" name="sampai" id="sampai" class="form-control tanggal" value="<?= date('m/Y') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Layanan</label>
                                    <select name="jnslayanan" id="jnslayanan" class="form-control">
                                        <option value="RJ">Rawat Jalan</option>
                                        <option value="RI">Rawat Inap</option>
                                        <option value="GD">Gawat Darurat</option>
                                        <option value="PJ">Penunjang</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Group</label>

                                    <div class="input-group">
                                        <select name="group" id="group" class="form-control">
                                            <option value="">Pilih Group</option>
                                            <option value="jenis">Per Jenis Pasien (Baru / Lama)</option>
                                            <option value="poly">Per Poli</option>
                                            <option value="carabayar">Per Cara Bayar</option>
                                            <option value="wilayah">Per Wilayah</option>
                                        </select>
                                        <div class="input-group-btn">
                                            <button type="button" id="btn_keyword" class="btn btn-primary" onclick="view_rekapitulasi()">
                                                <i class="fa fa-search"></i></button>
                                            <button type="button" id="btn_keyword" class="btn btn-default">
                                                <i class="fa fa-print"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead id="content-header"></thead>
                            <tbody id="content-data"></tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pagination"></div>
                </div>
            </div>
        </div>
    </div>


</section>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        /*$('.tanggal').inputmask('yyyy-mm-dd', {
            'placeholder': 'yyyy-mm-dd'
        });*/

        $(".tanggal").inputmask("mm/yyyy", {
            "placeholder": "mm/yyyy",
            "baseYear": 1900
        });
        /*$('.tanggal').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });*/
        $('#dari').val("<?= date('m/Y') ?>");
        $('#sampai').val("<?= date('m/Y') ?>");
    });


    var base_url = "<?= base_url() . "mr_dokumen.php"; ?>"
    view_rekapitulasi();

    function view_rekapitulasi() {
        var dari = $('#dari').val();
        var sampai = $('#sampai').val();
        var group = $('#group').val();
        var layanan = $('#jnslayanan').val();
        var header = "";
        var url = base_url + "/rekapitulasi/databulanan?dari=" + dari + "&sampai=" + sampai + "&group=" + group + "&layanan=" + layanan;
        console.log(url);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            data: {
                get_param: 'value'
            },
            beforeSend: function() {
                //Sebelum eksekusi
                $('#content-header').html("");
                $('#content-data').html("<tr><td>Loading Data</td></tr>");
            },
            complete: function() {
                //$('#load').hide();
                //Selesai Ekseskusi
            },
            success: function(data) {
                //Sukses Eksekusi
                //console.log(data['content'].lenght);
                var list_data = "";
                var content = data['content'];
                var jmlData = Object.keys(content).length;
                var bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                if (group == "") {
                    for (i = 0; i < jmlData; i++) {
                        var str = data["content"][i]["bulankunjungan"];
                        var t_tgl = str.split("-");
                        var tgl = bulan[parseInt(t_tgl[1])] + " " + t_tgl[0];
                        //console.log(tgl); 
                        list_data += "<tr><td>" + tgl + "</td><td>" + data["content"][i]["jml_kunjungan"] + "</td></tr>";
                    }
                } else if (group == "jenis") {
                    console.log(data["content"]);
                    for (i = 0; i < jmlData; i++) {
                        var pasien_lama = parseInt(data["content"][i]["jml_kunjungan"]) - parseInt(data["content"][i]["pasien_baru"]);
                        var jmlpasien = parseInt(data["content"][i]["pasien_baru"]) + parseInt(data["content"][i]["pasien_lama"]);
                        var str = data["content"][i]["bulankunjungan"];
                        var t_tgl = str.split("-");
                        var tgl = bulan[parseInt(t_tgl[1])] + " " + t_tgl[0];
                        if (jmlpasien != parseInt(data["content"][i]["jml_kunjungan"])) style = "style ='background-color:#ce1e1e;color:#fff'";
                        else style = "";
                        list_data += "<tr " + style + "><td>" + tgl + "</td><td>" + data["content"][i]["pasien_baru"] + "</td><td>" + data["content"][i]["pasien_lama"] + "</td><td>" + data["content"][i]["jml_kunjungan"] + "</td></tr>";
                    }
                } else if (group == 'poly') {
                    var jmlField = Object.keys(data["field"]).length;
                    var values = "";
                    var jml = 0;
                    var tgl = "";
                    var t_tgl = "";
                    var a = 0;
                    for (i = 0; i < jmlData; i++) {
                        //var pasien_lama=parseInt(data["content"][i]["jml_kunjungan"])-parseInt(data["content"][i]["pasien_baru"]);
                        values = "";
                        var total = 0;
                        console.clear();
                        for (j = 0; j < jmlField; j++) {
                            console.log(data["field"][j]);
                            if (data["content"][i][data["field"][j]] == null) jml = 0;
                            else jml = data["content"][i][data["field"][j]];
                            values += "<td>" + jml + "</td>";
                            total += parseInt(jml);

                        }
                        var str = data["content"][i]["bulankunjungan"];
                        var t_tgl = str.split("-");
                        var tgl = bulan[parseInt(t_tgl[1])] + " " + t_tgl[0];
                        list_data += "<tr><td>" + tgl + "</td>" + values + "<td>" + total + "</td></tr>";

                    }
                } else if (group == "wilayah") {
                    var jmlField = Object.keys(data["field"]).length;
                    var values = "";
                    var jml = 0;

                    for (i = 0; i < jmlData; i++) {
                        values = "";
                        var str = data["content"][i]["bulankunjungan"];
                        var t_tgl = str.split("-");
                        var tgl = bulan[parseInt(t_tgl[1])] + " " + t_tgl[0];
                        list_data += "<tr><td>" + tgl + "</td><td>" + data["content"][i]["dalam_kota"] +
                        "</td><td>" + data["content"][i]["luar_kota"] + "</td><td>" + data["content"][i]["jml_kunjungan"] + "</td></tr>";
                    }
                } else if (group == 'carabayar') {
                    var jmlField = Object.keys(data["field"]).length;
                    var values = "";
                    var jml = 0;
                    var tgl = "";
                    var t_tgl = "";
                    var a = 0;
                    for (i = 0; i < jmlData; i++) {
                        //var pasien_lama=parseInt(data["content"][i]["jml_kunjungan"])-parseInt(data["content"][i]["pasien_baru"]);
                        values = "";
                        var total = 0;
                        for (j = 0; j < jmlField; j++) {
                            if (data["content"][i][data["field"][j]] == null) jml = 0;
                            else jml = data["content"][i][data["field"][j]];
                            values += "<td>" + jml + "</td>";
                            total += parseInt(jml);

                        }
                        var str = data["content"][i]["bulankunjungan"];
                        var t_tgl = str.split("-");
                        var tgl = bulan[parseInt(t_tgl[1])] + " " + t_tgl[0];
                        list_data += "<tr><td>" + tgl + "</td>" + values + "<td>" + total + "</td></tr>";

                    }
                }

                $('#content-header').html(data["header"]);
                $('#content-data').html(list_data);
            }
        });

        //alert(url);
    }
</script>