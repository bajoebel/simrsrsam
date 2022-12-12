<?php 
//echo json_encode($_GET);
?>
<html>
<head><title></title></head>
<link rel="stylesheet" href="<?php echo base_url().'normalize.css' ?>">
<style>
    *{font-family: sans-serif;}
    .tebal{font-weight: bolder;}
    .font12{font-size: 12pt;}
    .font11{font-size: 11pt;}
    .font10{font-size: 10pt;}
    .font9{font-size: 9pt;}
    .font8{font-size: 8pt;}
    .font7{font-size: 7pt;}
    .font7-5{font-size: 7.5pt;}
    .font7-4{font-size: 7.4pt;}
    .font7-3{font-size: 7.3pt;}
    .font7-2{font-size: 7.2pt;}
    .font7-1{font-size: 7.1pt;}
    #page_print{margin-left: 30px;}
    .separator{margin-bottom: 10px;}
    #title{margin-top: 3px;}
    #barcode{margin-left: -10px;}
    
</style>
<body>
<?php 
$ap = explode(",",$_GET['ap']); ?>


<div id="page_print">
    <div id="title" class="font8"><?php echo COMPANY_NAME ?></div>
    <div id="barcode"></div>
    <div class="separator"></div>
    <div class="tebal font7-5"><?php echo $_GET['nama'] ?></div>
    
    <div class="font7"><?php echo date('d/m/Y H:i:s',strtotime($_GET['tgl'])) ?></div>
    <?php if(@$ap[0] == "1"): ?>
        <div class="tebal font8"><?php echo strtoupper($_GET['brg']) ?></div> 
        <div class="tebal font9"><?php echo @$ap[1] . " - " . @$ap[2] ?></div> 
        <div class="tebal font8"><?php echo @$ap[3] ?></div> 
        <div class="tebal font7-5"><?php echo @$ap[4] ?></div> 
        <div class="tebal font7-5"><?php echo @$ap[5] ?></div> 
    <?php elseif(@$ap[0] == "2"): ?>
        <div class="separator"></div>
        <div class="tebal font8"><?php echo strtoupper($_GET['brg']) ?></div> 
        <div class="tebal font7">&nbsp;</div> 
        <div class="tebal font8"><?php echo @$ap[1] ?></div> 
        <div class="tebal font7-5"><?php echo @$ap[2] ?></div> 
    <?php elseif(@$ap[0] == "3"): ?>
        <div class="separator"></div>
        <div class="tebal font7">&nbsp;</div> 
        <div class="tebal font7">&nbsp;</div> 
        <div class="tebal font12"><?php echo @$ap[1] ?></div> 
    <?php endif; ?>
</div>    

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-barcode.js"></script>
<script type="text/javascript">
function generateBarcode(){
    var value = "<?php echo $_GET['nomr'] ?>";
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
    //window.close();
});

</script>
</body>
</html>