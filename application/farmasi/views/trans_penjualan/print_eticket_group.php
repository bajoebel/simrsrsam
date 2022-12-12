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
    #page_print{
        padding: 10px 25px;
        height: 40mm;
        width: 65mm;
        border: solid;
        border-width: 1px;
        border-collapse: collapse;
        margin-bottom: 2mm;
        border-radius: 10px;
        display: block;
    }
    .separator{margin-bottom: 2px;}
    #title{margin-top: 3px;}
    .barcode{margin-left: -10px; float: left;}
    @media print {
        @page { margin: 0; }
        body{
            padding: 0px;
            margin: 0px;
        }
    }
</style>
<body >
<?php 
$i=1;
//print_r($dataPreview->result_array());
foreach($dataPreview->result_array() as $x): 
    $ap=explode(',', $x['AP']);
    //$tgl_lahir=$this->m_laporan->get_field('tgl_lahir','m_pasien','nomr',$NOMR,'simrs');
    

    $tgl_lahir=$this->farmasi_model->getField('tgl_lahir','tbl01_pasien','nomr',$NOMR);
    $NMSATUAN=$this->farmasi_model->getField('NMSATUAN','tbl04_barang','KDBRG',$x["KDBRG"]);
    $lahir=new DateTime($tgl_lahir);
    $today =new DateTime();
    
    $umur=$today->diff($lahir);
    //echo $x["KDBRG"];
    //$exp=$this->m_laporan->getExp($x["KDBRG"],$KDLOKASI);
    $exp=date('Y-m-d');
    //echo $exp;
    ?>
    <div id="page_print" >
        <div id="title" class="font12">RSUD PADANG PANJANG</div>
        <div id="barcode<?php echo $i; ?>" class='barcode'></div>
        <div class="separator"></div>
        <div class="tebal font10"><?php echo $NMPASIEN ?></div>
        <div class="font7"><?php echo date('d/m/Y',strtotime($tgl_lahir)) ." (" .$umur->y ." Thn " .$umur->m ." Bulan)" ?></div><br>
        <!--div class="font7"><?php //echo date('d/m/Y H:i:s',strtotime($DTJL)) ." (" .$umur->y ." Thn " .$umur->m ." Bulan)" ?></div><br-->

        <div class="tebal font11"><?php echo strtoupper($x['NMBRG']); ?></div> 
        <div class="tebal font10">Jumlah Obat <?php echo strtoupper($x['JMLJUAL']) ." " .$NMSATUAN; ?></div> 
        <div class="tebal font10"><?php echo @$ap[0]; ?></div> 
        <div class="tebal font10"><?php echo @$ap[1] . " - " . @$ap[2] ?></div>  
        <div class="tebal font10">EXP: <?php echo date('d/m/Y ',strtotime($x["AP_EXPDATE"])); ?></div>
    </div>                  
    <?php
    $i++;
    //".$umur->y." Th, ".$umur->m." Bln]"
endforeach; 
?>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-barcode.js"></script>
<script type="text/javascript">
function generateBarcode(nomr, id){
    var value = nomr;
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
    $("#barcode" +id).html("").show().barcode(value, btype, settings);
}
$(function(){
    <?php 
    $y=1;
    foreach ($dataPreview->result_array() as $x) {
        ?>
        generateBarcode('<?php echo $NOMR; ?>','<?php echo $y; ?>');
        <?php
        $y++;
    }
    ?>
    
    window.print();
    window.close();
});

</script>

</body>
</html>