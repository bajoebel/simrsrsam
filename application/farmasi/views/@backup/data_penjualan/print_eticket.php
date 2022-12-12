<html>
<head><title></title></head>
<link rel="stylesheet" href="<?php echo base_url().'normalize.css' ?>">
<style>
    *{font-family: sans-serif;}
    .tebal{font-weight: bolder;}
    .font9{font-size: 9pt;}
    .font8{font-size: 8pt;}
    .font7{font-size: 7pt;}
    .font7-5{font-size: 7.5pt;}
    #page_print{margin-left: 35px;}
    .separator{margin-bottom: 10px;}
    #title{margin-top: 3px;}
    #barcode{margin-left: -10px;}
    
</style>
<body >
<div id="page_print">
    <div id="title" class="font9">RSUD Dr. ADNAAN WD PAYAKUMBUH</div>
    <div id="barcode"></div>
    <div class="separator"></div>
    <div class="tebal font7-5">AKSA ABDUL RAFIS/ WIDIA SRI ASTATI. BY</div>
    <div class="separator"></div>
    <div class="font7"><?php echo date('d/m/Y H:i:s',strtotime('2018-09-19 13:25:07')) ?></div>
    <div class="tebal font8"><?php echo strtoupper('Parasetamol 500') ?></div> 
    <div class="tebal font7">3 X SEHARI -- 1 Tablet -- SESUDAH MAKAN</div> 
    <div class="tebal font8">PAGI</div> 
</div>    
<script src="<?php echo base_url(); ?>js/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-barcode.js"></script>
<script type="text/javascript">
function generateBarcode(){
    var value = "2018-09-87-92";
    var btype = "code128";
    var renderer = "css";

    var quietZone = false;

    var settings = {
        output:renderer,
        bgColor: "#FFFFFF",
        color: "#000000",
        barWidth:1,
        barHeight:20,
        moduleSize: 5,
        posX: 10,
        posY: 20,
        addQuietZone: 1
    };
    $("#barcode").html("").show().barcode(value, btype, settings);
}
$(function(){
    generateBarcode();
    window.print();
});

</script>
</body>
</html>