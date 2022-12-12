<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="shortcut icon" href="<?php echo base_url() . 'favicon.png' ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
    <link href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css" rel="stylesheet">
    <style>
        .text-error{
            color: #d00a0a;
        }
    </style>
    <script type='text/javascript'>
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
    </script>
</head>

<body class="hold-transition <?= getSkin(2); ?> sidebar-mini">
    <div class="wrapper">
        <?php echo $header; ?>

        <aside class="main-sidebar">
            <?php echo $nav_sidebar; ?>
        </aside>

        <div class="content-wrapper">
            <?php echo $content ?>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs"><?php echo getVersion() ?></div>
            <?php echo getFooter() ?>
        </footer>

        <div class="control-sidebar-bg"></div>
    </div>
    
    <script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
    
    
    <script type="text/javascript">
        var ws_url = "<?= base_url() . "api.php/" ?>";
        var modul = "<?= MODUL_ID ?>";
        var level = "<?php echo $this->session->userdata('level'); ?>";

        var select = "<?php if (!empty($index_menu)) echo $index_menu;
                        else echo "1" ?>";
        var base_url = "<?= base_url() . "mr_registrasi.php/" ?>";

        function getmenu() {
            var url = "<?= base_url() ?>" + "api.php/json/hakakses/" + modul + "/" + level + "/" + select;
            console.log(url);
            //alert(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {
                    //menghitung jumlah data
                    //console.clear();
                    console.log(data.menu);
                    var menu = data.menu;
                    var jmlData = menu.length;
                    var li = '<li class="header"><?php echo getAppName() ?></li>';
                    var index = "";
                    var sub_index = "";
                    var dropdown = 0;
                    for (var i = 0; i < jmlData; i++) {
                        console.log(menu[i].index_menu + " " + select);
                        console.log(base_url + menu[i].file_kontrol);
                        if (menu[i].index_menu == select) var aktif = 'active';
                        else var aktif = '';
                        if (index != menu[i].index_menu) {

                            if (menu[i].file_kontrol == "#" || menu[i].file_kontrol == "") {
                                if (index != "") li += '</ul>';
                                li += '<li class="treeview ' + aktif + '"> ' +
                                    '<a href = "#"> <i class = "fa ' + menu[i].icon + '"> </i> <span>' + menu[i].judul_menu + '</span>' +
                                    '<span class = "pull-right-container">' +
                                    '<i class = "fa fa-angle-left pull-right"> </i> </span>' +
                                    '</a>' +
                                    '<ul class = "treeview-menu">';
                                dropdown = 1;

                            } else {
                                if (dropdown == 1) li += '</ul>';
                                li += '<li class="' + aktif + '"> <a href = "' + base_url + menu[i].file_kontrol + '"><i class = "fa ' + menu[i].icon + '"> </i> <span>' + menu[i].judul_menu + '</span> </a> </li>';
                                //menu += '<li><a href="' + base_url + menu[i].file_index + "/" + menu[i].file_control + '"> <i class = "fa fa-circle-o text-red"> </i>Negara</a> </li>';
                                dropdown = 0;
                            }
                        } else {

                            li += '<li><a href="' + base_url + menu[i].file_kontrol + '"> <i class = "fa ' + menu[i].icon + '"> </i>' + menu[i].judul_menu + '</a> </li>';
                        }

                        index = menu[i].index_menu;
                        sub_index = menu[i].sub_index_menu;
                    }
                    if (dropdown == 1) li += '</ul>';
                    //console.log(li);
                    console.log("Tampilkan Menu...");
                    $('#menu').html(li);
                }
            });
        }
        getmenu();
        // var base_url = "<?= base_url() ."mr_registrasi.php/" ?>";
        
        var url_call_back = "<?php echo base_url() . "mr_registrasi.php"; ?>";
        var sekarang="<?= date('Y-m-d')?>";
    </script>
    
    <script src="<?php echo base_url() ?>assets/js/function.js"></script>
    <?php
    if (!empty($libjs)) {
        if (is_array($libjs)) {
            foreach ($libjs as $l) {
                echo '<script src="' . base_url() . $l . '"></script>';
            }
        } else {
            echo '<script src="' . base_url() . $libjs . '"></script>';
        }
    }
    ?>
    <script type="text/javascript">
    <?php if(!empty($getData)) echo $getData .";"; ?>
    </script>
    <div id="error" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="overflow-y: hidden;">
                <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center" id="popuperror">Response Error Dari Server BPJS...</h4>
                </div>
                <div class="modal-body text-center">
                    <h1><i class="fa fa-warning text-red"></i></h1>
                    <h2  id="xhr"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>