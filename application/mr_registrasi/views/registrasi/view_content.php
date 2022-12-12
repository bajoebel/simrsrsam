<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <style type="text/css">
            .font16 {
                font-size: 16pt;
            }

            .font18 {
                font-size: 18pt;
                font-weight: bold;
            }

            .font24 {
                font-size: 24pt;
                font-weight: bold;
            }

            .font32 {
                font-size: 48pt;
                font-weight: bold;
                color: #00a65a;
                text-shadow: 2px 2px #6de37f;
            }

            .box-header>.fa,
            .box-header>.glyphicon,
            .box-header>.ion,
            .box-header .box-title {
                display: inline-block;
                font-size: 24pt;
                margin: 0;
                line-height: 1;
            }

            .lingkaran {
                border: solid #00a65a;
                border-style: solid;
                border-collapse: collapse;
                padding: 5px;
                width: 140px;
                height: 140px;
                border-radius: 100%;
                box-shadow: 3px 3px #6de37f;
                text-align: center;

            }

            .lingkaran {
                border: solid #00a65a;
                border-style: solid;
                border-collapse: collapse;
                padding: 5px;
                width: 140px;
                height: 140px;
                border-radius: 100%;
                box-shadow: 3px 3px #6de37f;
                text-align: center;

            }

            .tersedia {
                font-size: 25pt;
                width: 100%;
            }

            .kosong {
                background: #00a65a;
                color: #fff;
                text-align: center;
            }

            .terisi {
                background: #dd4b39;
                color: #fff;
                text-align: center;
            }

            .total {
                float: right;
                text-align: center;
                width: 20%;
                background-color: #fff;
                color: #090909;
                border-radius: 45%;
                font-weight: bold;
            }

            .bulat {
                border-radius: 100px;
                float: right;
                background-color: #fff;
                color: #000;
                padding: 2px;
                width: 120px;
                text-align: center;
            }

            .split_bulat {
                border-radius: 80px;
                float: right;
                background-color: #fff;
                color: #000;
                padding: 2px;
                width: 30%;
                text-align: center;
            }

            .nama_ruang {
                font-size: 20pt;
                text-align: left;
                padding: 5px;
                border-bottom: 1px solid #ceedee;
                font-weight: bold;
            }

            .split_nama_ruang {
                font-size: 16pt;
                text-align: left;
                padding: 5px;
                border-bottom: 1px solid #ceedee;
            }

            .total_ruang {
                float: right;
                border-radius: 90;
                font-size: 20pt;
                padding: 5px;
                border-bottom: 1px solid #ceedee;
                text-align: center;
            }

            .kelas {
                font-size: 18pt;
                padding: 5px;
                border-bottom: 1px solid #00a65a;
                font-weight: bold;
            }

            .split_kelas {
                font-size: 14pt;
                padding: 5px;
                border-bottom: 1px solid #00a65a;
                font-weight: bold;
            }

            .jumlah {
                font-size: 18pt;
                padding: 5px;
                border-bottom: 1px solid #fff;
                font-weight: bold;
            }

            .split_jumlah {
                font-size: 14pt;
                padding: 5px;
            }

            .shadow {
                box-shadow: 5px #ceedef;
            }

            #display {
                padding: 0px 0px;
            }

            .col-5 {
                width: 20%;
                float: left;
                padding: 5px;
            }
        </style>
        <?php if (empty($setting)) $mode = "Tabel";
        else $mode = $setting->display_mode; ?>

        <!--div class="col-md-12"-->
            <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>">
            <input type="hidden" name="txt" id="txt" value="0">
            <div id="Block"></div>
            <div id="tabel"></div>
        <!--/div-->

    </div>
</section>
    <!-- jQuery 3 -->
    <script src="<?php echo base_url() . "assets/" ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var elem = document.getElementById("body-content");
        var c = 0;
        var t;
        var hitung = 0;
        var timer_is_on = 0;
        var link = "<?php echo base_url() . "display.php/" ?>";
        //alert(base_url);
        //var mode=$('mode').val();
        //getDisplay();
        //getKamar(0);
        startCount();
        var c = 0;
        var mode = "";
        var interval = 1000;
        timedCount();

        function timedCount() {
            //document.getElementById("txt").value = c;
            //console.log(c);
            $('#txt').val(c);
            //if(mode!=$('#mode').val()) c=0;
            var mode = $('#mode').val();
            if (mode == 'Tabel' || mode == 'Split') interval = 5000;
            else interval = 1000;
            var limit = <?php echo $limit ?>;
            var jmlData = <?php echo $jmlData ?>;
            //alert(jmlData);

            if (c == jmlData % limit) c = 1;
            else c = c + 1;
            
            t = setTimeout(timedCount, interval);
            //console.clear();
            hitung++;
            //console.log(c);
            //if(c%5==0) getKelas();
            getDisplay();
            //getKamar(c);
        }

        function getDisplay() {
            var search;
            var url = link + "display/mode";
            //console.clear();
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {
                    $('#mode').val(data["display_mode"])
                    if (data["display_mode"] == "Block") {
                        $('#tabel').removeClass("col-md-6");
                        $('#Block').removeClass("col-md-6");
                        $('#tabel').hide();
                        $('#Block').show();
                        getRuangan();
                    } else if (data["display_mode"] == "Tabel") {
                        //(c);
                        $('#tabel').removeClass("col-md-6");
                        $('#Block').removeClass("col-md-6");
                        $('#tabel').show();
                        $('#Block').hide();
                        getKamar(c);
                    } else {
                        getRuangan();
                        getKamar(c);
                        $('#tabel').addClass("col-md-6");
                        $('#Block').addClass("col-md-6");
                        $('#tabel').show();
                        $('#Block').show();
                    }
                }
            });
        }

        function getRuangan() {
            //alert("test");
            var url = link + "display/ruangan";
            //console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {
                    var kelas = data["kelas"];
                    var ruang = data["ruang"];
                    var jmlData = ruang.length;
                    var display = "";
                    var total_bed = 0;
                    var terisi = 0;
                    var tersedia = 0;
                    var style_ruang = 'nama_ruang';
                    var style_total = 'bulat';
                    var style_kelas = 'kelas';
                    var style_jumlah = 'jumlah';
                    var mode = $('#mode').val();
                    if (mode == 'Split') {
                        style_ruang = 'split_nama_ruang';
                        style_total = 'split_bulat';
                        style_kelas = 'split_kelas';
                        style_jumlah = 'split_jumlah';
                    } else {
                        style_ruang = 'nama_ruang';
                        style_total = 'bulat';
                        style_kelas = 'kelas';
                        style_jumlah = 'jumlah';
                    }
                    var offset = 0;
                    var jmlkelas = kelas.length;
                    //console.log("JML KELAS : "+jmlkelas);
                    var selisih = jmlkelas - parseInt(data["jmlkelas"]);
                    //console.log("Selisih : "+data["jmlkelas"] +" - " +jmlkelas + " = "+ selisih);
                    for (var i = 0; i < jmlData; i++) {
                        total_bed = parseInt(ruang[i]["jml_tt"]);
                        //console.log(total_bed);
                        //if(i==0) display+="<div class='col-md-1'></div>";
                        if (mode == 'Block') var col = 'col-xs-3';
                        else col = 'col-xs-4';
                        offset = i % 4;
                        if (total_bed > 0) {
                            display += '<div class="' + col + ' shadow">';
                            display += '<div class="box box-primary box-solid ">';
                            display += '<div class="row">';
                            display += '<div class="col-md-12">';
                            display += '<div class=" col-md-12 bg-primary ' + style_ruang + '">';
                            display += ruang[i]["nama_ruang"];
                            display += '<b class="' + style_total + '">' + total_bed + '</b>';
                            display += '</div>';
                            display += '</div>';
                            display += '<div class="col-md-12">';
                            //Display Kelas
                            var kosong = 0;
                            var konten_kosong = '';

                            for (var j = 0; j < jmlkelas; j++) {
                                if (parseInt(ruang[i]['jml_tt_' + kelas[j]["kode"]]) > 0) {
                                    terisi = parseInt(ruang[i]['tlk_' + kelas[j]["kode"]]) + parseInt(ruang[i]['tpr_' + kelas[j]["kode"]]);
                                    tersedia = parseInt(ruang[i]['jml_tt_' + kelas[j]["kode"]]) - terisi;
                                    display += '<div class="col-md-8 ' + style_kelas + ' ">' + kelas[j]["alias"] + '</div>';
                                    display += '<div class="col-md-2 bg-green ' + style_jumlah + ' text-center" >' + tersedia + '</div>';
                                    display += '<div class="col-md-2 bg-red ' + style_jumlah + ' text-center" >' + terisi + '</div>';
                                } else {
                                    kosong++;
                                    if (kosong > selisih) {
                                        konten_kosong += '<div class="col-md-12 ' + style_kelas + ' ">&nbsp;</div>';
                                    }
                                }
                            }
                            display += konten_kosong;
                            display += '</div></div></div></div>';
                            if (mode == 'Block') {
                                if (i % 4 == 3) display += "<div class='row'></div>";
                            } else {
                                if (i % 2 == 1) display += "<div class='row'></div>";
                            }

                        }
                    }
                    //alert(mode);

                    if (mode == "Block") {
                        //display+='<div class="row"></div>';
                        //display+="";
                        display += '<div class="col-md-6 shadow">';
                    } else {
                        display += '<div class="col-md-12 shadow">';
                    }

                    display += '<div class="">';
                    display += '<div class="row">';
                    display += '<div class="col-md-12 text-center" >';
                    display += '<div class=" col-md-1 bg-green ' + style_ruang + '">&nbsp;</div>';
                    display += '<div class=" col-md-2 ' + style_ruang + '"><b> = Kosong</b></div>';
                    display += '<div class=" col-md-1 bg-red ' + style_ruang + '">&nbsp;</div>';
                    display += '<div class=" col-md-2 ' + style_ruang + '"><b> = Terisi</b></div>';
                    display += '<div class=" col-md-1 bg-blue ' + style_ruang + '"><div class="bulat" style="width:100%">&nbsp;</div></div>';
                    display += '<div class=" col-md-5 ' + style_ruang + '"><b> = Jumlah Tempat Tidur</b></div>';
                    display += '</div>';
                    display += '</div>';
                    display += '</div>';
                    display += '</div>';
                    $('#Block').html(display);
                }
            });
        }

        function startCount() {
            if (!timer_is_on) {
                timer_is_on = 1;
                timedCount();
            }
        }

        function getKelas() {
            var search;
            var url = link + "display/datakelas";
            //console.clear();
            //console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {
                    //console.log(data);
                    var jmlData = data.length;
                    var kelas = "";
                    var a = 0;
                    var style = 'box-info';
                    var bedtersedia = 0;
                    var bedterisi = 0;
                    var bedkosong = 0;
                    for (var i = 0; i < jmlData; i++) {

                        a = i + 1;
                        if (a == 1 || a % 3 == 1) style = 'box-info';
                        if (a == 2 || a % 3 == 2) style = 'box-warning';
                        if (a == 3 || a % 3 == 0) style = 'box-danger';
                        bedtersedia = (parseInt(data[i]["kapasitas_pria"]) + parseInt(data[i]["kapasitas_wanita"]) + parseInt(data[i]["kapasitas_priawanita"])) - parseInt(data[i]["bed_rusak"]);
                        bedterisi = parseInt(data[i]["terisi_pria"]) + parseInt(data[i]["terisi_wanita"]) + parseInt(data[i]["terisi_priawanita"]);
                        bedkosong = bedtersedia - bedterisi;
                        //console.log(bedkosong);
                        kelas += "<div class=\"col-md-4\"><div class=\"box " + style + " box-solid\"><div class=\"box-header with-border text-center\"><h3 class=\"box-title \">" + data[i]["kelas_nama"] + "</h3></div><div class=\"box-body text-center \"><button class=\"btn btn-default btn-Block\"><div class=\"font32 \">" + bedkosong + "</div></button></div><div class=\"box-footer box-success text-center\"><h3>TERISI : " + bedterisi + "</h3></div></div></div>";
                    }
                    $('#kelas').html(kelas);
                    //console.log(kelas);
                }
            });
        }

        function getKamar(c) {
            var search;
            var url = link + "display/datakamar/" + c;
            console.clear();
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {
                    //console.log(data);
                    var jmlData = data.length;
                    var kelas = "";
                    var a = 0;
                    var style = 'box-info';
                    var bedtersedia = 0;
                    var bedterisi = 0;
                    var bedkosong = 0;
                    var no = 0;
                    kelas += '<div class="col-md-12"><table class="table table-hover bordered" style="box-shadow: 5px 10px #a4e09b;font-size: 12pt;">';
                    kelas += '<thead class="bg-green text-center">';
                    kelas += '<tr>';
                    kelas += '<th rowspan="2">#</th>';
                    kelas += '<th rowspan="2">RUANGAN</th>';
                    kelas += '<th rowspan="2">KELAS</th>';
                    kelas += '<th rowspan="2">JML BED</th>';
                    kelas += '<th colspan="2" class="text-center">TERISI</th>';
                    kelas += '<th rowspan="2" class="text-center">KOSONG</th>';
                    kelas += '</tr>';
                    kelas += '<tr>';
                    kelas += '<th class="text-center">PRIA</th>';
                    kelas += '<th class="text-center">WANITA</th>';
                    kelas += '</tr>';
                    kelas += '</thead>';
                    kelas += '<tbody>';
                    for (var i = 0; i < jmlData; i++) {
                        jmlbed = parseInt(data[i]["total_TT"]);
                        no = c;
                        terpakai_male = parseInt(data[i]["terpakai_male"]);
                        terpakai_female = parseInt(data[i]["terpakai_female"]);
                        bedkosong = jmlbed - terpakai_male - terpakai_female;
                        if (bedkosong == 0) bg = "bg-red";
                        else bg = "bg-green";
                        kelas += '<tr>';
                        kelas += '<td>' + no + '</td>';
                        kelas += '<td>' + data[i]["jenis_ruangan"] + '</td>';
                        kelas += '<td>' + data[i]["kelas_perawatan"] + '</td>';
                        kelas += '<td class="text-center bg-green">' + jmlbed + '</td>';
                        kelas += '<td class="text-center">' + terpakai_male + '</td>';
                        kelas += '<td  class="text-center">' + terpakai_female + '</td>';
                        kelas += '<td  class="text-center ' + bg + '">' + bedkosong + '</td></tr>';
                        c++;
                    }
                    kelas += '</tbody></table></div>';
                    $('#tabel').html(kelas);
                    //console.log(kelas);
                }
            });
        }

        function stopCount() {
            clearTimeout(t);
            timer_is_on = 0;
        }

        function show_full() {
            req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
            //req.call(elem);
            return req;
            //alert("SHOW FULL SCREEN");
        }
    </script>