<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Document Viewer</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link href="<?= base_url() ?>assets/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!--Normal FLipbook-->
                <div class="_df_book" height="680" webgl="true" backgroundcolor="teal" source="<?= base64_decode($_GET['source']) ?>" id="df_manual_book"></div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?= base_url() ?>assets/dflip/js/dflip.min.js" type="text/javascript"></script>
</body>

</html>