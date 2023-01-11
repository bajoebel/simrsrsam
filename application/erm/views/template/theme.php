<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <meta name="robots" content="none" />
    <link rel="shortcut icon" href="<?php echo base_url() . 'favicon.png' ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css" />

    <script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.js"></script>

    <script src="<?php echo base_url() ?>assets/bower_components/inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .navbar-nav>.notifications-menu>.dropdown-menu>li .menu>li>a,
        .navbar-nav>.messages-menu>.dropdown-menu>li .menu>li>a,
        .navbar-nav>.tasks-menu>.dropdown-menu>li .menu>li>a {
            display: block;
            white-space: normal;
            border-bottom: 1px solid #f4f4f4;
        }
        .navbar-nav>.notifications-menu>.dropdown-menu,
        .navbar-nav>.messages-menu>.dropdown-menu,
        .navbar-nav>.tasks-menu>.dropdown-menu {
            width: 500px;
            padding: 0 0 0 0;
            margin: 0;
            top: 100%;
        }
        .lock {
            bottom: 0;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            cursor: wait;
            background: #0000002e;
            color: #fff;
            z-index: 1520;

        }



        .center {
            margin: 150px auto auto auto;
            padding: 10px;
            text-align: center;
            width: 80%;
            border: #000 solid 1px;
            border-collapse: collapse;
            color: #000;
            border-radius: 10px;
            background-color: #fff;
        }

        .ui-autocomplete-loading {
            background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
        }

        .ui-autocomplete-input {
            border: none;
            font-size: 14px;
            border: 1px solid #DDD !important;
            z-index: 1511;
            position: relative;
        }

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

        @media only screen and (max-width: 1360px) {
            .center {
                margin: 80px auto auto auto;

            }
        }
    </style>
    <link href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/sweetalert/sweetalert.css">
    <script src="<?= base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- custom js -->
    <script src="<?php echo base_url() ?>js/remedis.js"></script>
    <script type='text/javascript'>
        var rooturl = "<?= base_url() ?>";
        var base_url = "<?= base_url() . "erm.php/"; ?>";
        var urljkn = "<?= base_url() . "mr_registrasi.php/jkn/"; ?>";
    </script>
</head>

<body class="hold-transition <?= getSkin(3); ?> sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <?php echo $header; ?>

        <aside class="main-sidebar">
            <?php echo $nav_sidebar; ?>
        </aside>

        <div class="content-wrapper">
            <?php if (empty($this->session->userdata('kdlokasi'))) { ?>
                <div class="lock" *ngIf="blockContent">

                    <div class="center">
                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <h3><span class="fa fa-warning"></span> Perhatian ! </h3>
                                <span class="text-error"><b>
                                        <p style="font-size:16pt">Pilih Lokasi Login Sebelum Anda Melanjutkan </p>
                                    </b></span>
                                <hr>
                                <div style="text-align:justify;height:50vh;overflow: scroll;" id="shorcut-lokasi">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <?php echo $content
            // print_r($content);
            ?>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs"><?php echo getVersion() ?></div>
            <?php echo getFooter() ?>
        </footer>

        <div class="control-sidebar-bg"></div>
    </div>


    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
    <script src="<?php echo base_url() ?>assets/js/function.js"></script>
    <script src="<?php echo base_url() ?>assets/js/notify.js"></script>
    <?php
    $layanan = $this->nota_model->cekRuang();
    $rajal = $this->nota_model->cekRuang("1");
    $ranap = $this->nota_model->cekRuang("2");
    $penunjang = $this->nota_model->cekRuang("3");
    $igd = $this->nota_model->cekRuang("4");

    ?>
    <script>
        var layanan = "<?= $layanan ?>";
        var rajal = "<?= $rajal ?>";
        var ranap = "<?= $ranap ?>";
        var penunjang = "<?= $penunjang ?>";
        var igd = "<?= $igd; ?>";
        //alert(layanan);
        //showNotify(igd, ruang);
        //var myVar = setInterval(showNotify(igd, ruang), 1000);
        // var myVar = setInterval(showNotify, 60000);

        function myTimer() {
            var d = new Date();
            console.log(d)
        }
        var url_utama = "<?= base_url() ?>";

        // function showNotify() {
        //     var url = "<?= base_url() . "erm.php/notify" ?>";
        //     //console.clear();
        //     console.log('Cek Notif ...')
        //     $.ajax({
        //         url: url,
        //         type: "GET",
        //         dataType: "JSON",
        //         async: false,
        //         success: function(data) {
        //             //alert(data.message);
        //             var html_notif = "";
        //             if (data.status == true) {
        //                 not = data.data;
        //                 var jmlData = not.length;
        //                 console.log(jmlData)
        //                 var new_notif = 0;
        //                 var html_pesan;
        //                 for (var i = 0; i < jmlData; i++) {
        //                     console.log(not[i]["notif_pesan"]);
        //                     html_notif += '<li>' +
        //                         '<a href="#" onclick="bacaNotif(' + not[i]["idx"] + ')">' + not[i]["notif_pesan"] + '</a>' +
        //                         '</li>';
        //                     if (not[i]['notif_dering'] == 0) {
        //                         new_notif++;

        //                         var n = not[i]["notif_pesan"];
        //                         $.notify(n,
        //                             'warning'
        //                         );
        //                     }
        //                 }
        //                 if (jmlData > 0) {
        //                     $('.jmlnotif').html(jmlData);
        //                     $('#header-notif').html('Ada ' + jmlData + " Notifikasi");
        //                 } else {
        //                     $('.jmlnotif').html('')
        //                     $('#header-notif').html('Tidak Ada Notifikasi');
        //                 }

        //                 $('#list-notifikasi').html(html_notif);
        //                 if (new_notif > 0) {
        //                     clearInterval(myVar);
        //                     console.log('Clear Interval');
        //                     playAudio();
        //                 }
        //             }
        //         },
        //         error: function(jqXHR, ajaxOption, errorThrown) {
        //             console.log(jqXHR.responseText);
        //         }
        //     });

        // }

        // function cekNotif() {
        //     //alert('Cek Notif');
        //     myVar = setInterval(showNotify, 60000);
        //     console.log('cek Notif...');
        //     //setTimeout(showNotify(igd, ruang), 10000);
        // }

        // function bacaNotif(id) {
        //     var url = "<?= base_url() . "erm.php/notify/baca/" ?>" + id;
        //     //console.clear();
        //     console.log('Cek Notif ...')
        //     $.ajax({
        //         url: url,
        //         type: "GET",
        //         dataType: "JSON",
        //         async: false,
        //         success: function(data) {
        //             //alert(data.message);
        //             var html_notif = "";
        //             if (data.status == true) {
        //                 window.location.href = url_utama + "erm.php/nota_tagihan/entry_nota?idx=" + data.idx + "&kLok=" + data.data.notif_tujuan;
        //             }
        //         },
        //         error: function(jqXHR, ajaxOption, errorThrown) {
        //             console.log(jqXHR.responseText);
        //         }
        //     });
        // }

        // function playAudio() {
        //     console.log('Play Audio...')
        //     var x = document.getElementById("notify");
        //     x.play();
        // }

        // function pauseAudio() {
        //     var x = document.getElementById("notify");
        //     x.pause();
        // }

        var modul = "<?= MODUL_ID ?>";
        var level = "<?php print_r($this->session->userdata('level')); ?>";

        var select = "<?php if (!empty($index_menu)) echo $index_menu;
                        else echo "1" ?>";
        var base_url = '<?= base_url() . "erm.php/" ?>';
        // getmenu();

        getLokasi();

        // function getmenu() {
        //     var ruang_aktif = "<?= $this->session->userdata('kdlokasi'); ?>";
        //     var url = "<?= base_url() ?>" + "api.php/json/hakakses/" + modul + "/" + level + "/" + select + "/" + ruang_aktif;
        //     console.log(url);

        //     $.ajax({
        //         url: url,
        //         type: "GET",
        //         dataType: "json",
        //         data: {
        //             get_param: 'value'
        //         },
        //         success: function(data) {
        //             //menghitung jumlah data
        //             //console.clear();
        //             console.log(data.menu);
        //             var menu = data.menu;
        //             var jmlData = menu.length;
        //             var li = '<li class="header"><?php echo getAppName() ?></li>';
        //             var index = "";
        //             var sub_index = "";
        //             var dropdown = 0;
        //             for (var i = 0; i < jmlData; i++) {
        //                 console.log(menu[i].index_menu + " " + select);

        //                 if (menu[i].index_menu == select) var aktif = 'active';
        //                 else var aktif = '';
        //                 if (index != menu[i].index_menu) {

        //                     if (menu[i].file_kontrol == "#" || menu[i].file_kontrol == "") {
        //                         if (parseInt(layanan) <= 0 && menu[i].idmenu == 44) li += '';
        //                         else {
        //                             if (index != "") li += '</ul>';
        //                             li += '<li class="treeview ' + aktif + '"> ' +
        //                                 '<a href = "#"> <i class = "fa ' + menu[i].icon + '"> </i> <span>' + menu[i].judul_menu + '</span>' +
        //                                 '<span class = "pull-right-container">' +
        //                                 '<i class = "fa fa-angle-left pull-right"> </i> </span>' +
        //                                 '</a>' +
        //                                 '<ul class = "treeview-menu">';
        //                             dropdown = 1;
        //                         }



        //                     } else {
        //                         if (parseInt(layanan) <= 0 && menu[i].idmenu == 44) li += '';
        //                         else {
        //                             if (dropdown == 1) li += '</ul>';
        //                             li += '<li class="' + aktif + '"> <a href = "' + base_url + menu[i].file_kontrol + '"><i class = "fa ' + menu[i].icon + '"> </i> <span>' + menu[i].judul_menu + '</span> </a> </li>';
        //                             //menu += '<li><a href="' + base_url + menu[i].file_index + "/" + menu[i].file_control + '"> <i class = "fa fa-circle-o text-red"> </i>Negara</a> </li>';
        //                             dropdown = 0;
        //                         }

        //                     }
        //                 } else {

        //                     if (parseInt(rajal) <= 0 && menu[i].idmenu == 45) li += '';
        //                     else if (parseInt(ranap) <= 0 && menu[i].idmenu == 46) li += '';
        //                     else if (parseInt(penunjang) <= 0 && menu[i].idmenu == 47) li += '';
        //                     else if (parseInt(igd) <= 0 && menu[i].idmenu == 48) li += '';
        //                     else li += '<li><a href="' + base_url + menu[i].file_kontrol + '"> <i class = "fa ' + menu[i].icon + '"> </i>' + menu[i].judul_menu + '</a> </li>';
        //                 }

        //                 index = menu[i].index_menu;
        //                 sub_index = menu[i].sub_index_menu;
        //             }
        //             if (dropdown == 1) li += '</ul>';
        //             //console.log(li);
        //             console.log("Tampilkan Menu...");
        //             $('#menu').html(li);
        //         }
        //     });
        // }

        <?php if (!empty($ajaxdata)) echo $ajaxdata ?>
    </script>
    <?php if (!empty($lib)) {
        foreach ($lib as $lib) {
            echo '<script src="' . base_url() . $lib . '" type="text/javascript"></script>';
        }
    }
    ?>

    <div id="error" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="overflow-y: hidden;">
                <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center" id="xhrkode">Error Message</h4>
                </div>
                <div class="modal-body text-center">
                    <h1><i class="fa fa-warning text-red"></i></h1>
                    <h2 id="xhr"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>