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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css" />
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css" rel="stylesheet">
</head>

<body class="hold-transition <?= getSkin(1); ?> sidebar-mini">
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
    <!--script src="<?php //echo base_url() 
                    ?>assets/bower_components/jquery/dist/jquery.js"></script-->
    <script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
    <script src="<?php echo base_url() ?>assets/js/function.js"></script>
    <script type="text/javascript">
        var modul = "<?= MODUL_ID ?>";
        var level = "<?php echo $this->session->userdata('level'); ?>";

        var select = "<?php if (!empty($index_menu)) echo $index_menu;
                        else echo "1" ?>";
        var base_url = "<?= base_url() . "administrator.php/" ?>";

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
    </script>
</body>

</html>