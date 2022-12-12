<html>
<head>
<title></title>
<style>
    
    /**{
        font-size: 40px;
        margin: 0px;
        font-family:Arial, Helvetica, sans-serif;
    }*/
    td#spasi{
        height: 2mm;
    }
    body{
        padding: 0px;
        margin: 0px;
    }
    @page{
        size:auto;
        margin-top:3mm;
        margin-bottom:0mm;
        margin-left:1mm;
        margin-right:0mm;
    }
   
    .stiker{
        width:54mm;
        height: 16mm;
        /*border-width: 0.5px;
        border-collapse: collapse;
        border-style: solid;*/
        display: block;
        padding: 1px;
    }
    .barcode{
        /*width: 135px;*/
        /*height: 22px;*/
        float: left;

    }
    .tulisan{
        font-size: 20px;
        padding-left: 1px;
        text-align: right;
    }
    .nama{
        /*padding-left: 5px;*/
        width: 54mm;
        display: block;
        font-size: 10px;
    }
    .deskripsi{
        padding-left: 10px;
        font-size: 11px;
    }
    .bar{
        height: 50px;
        width: 100px;
    }
    .nomr{
        font-size: 14px;
    }
</style>
<!--script src="<?php //echo base_url() ."assets/js/" ?>html2canvas.min.js"></script-->
</head>
<body>
<!--body-->
<?php
error_reporting(0);
//foreach ($pas as $row){
    //$idmr = $row->nomr;
    //$jenkel = $row->jns_kelamin;
    /**$umur = $row->Umur;
    
    if($umur > 15 ){
        if($jenkel=="P"){
        $panggilan = 'Ny. ';
        }
    }**/
    
    $lahir=new DateTime($tgl_lahir);
    $today =new DateTime();
    
    $umur=$today->diff($lahir);
    
    if($umur->y > 15 ){
        if($jenkel=="P"){
        $panggilan = 'Ny. ';
        }
    }
    
    $text = $nama;
    preg_match('/^.{0,20}[^\s]*/', $text, $matches);
    $excerpt = $matches[0];
    $kata_array = explode(" ",$excerpt); 
    $kalimat_baru = ""; 
    $i=1; 
    foreach($kata_array AS $kata_array1){ 
    if ($i<=4) $kalimat_baru .= $kata_array1.' '; 
    $i++;
    }
    $singkat = substr($kata_array[4],0,1);
    $tx = $kalimat_baru." ".$singkat;

    $nama = strtoupper($tx);

    //$tgl = substr($row['TGLLAHIR'],8,2)."-".substr($row['TGLLAHIR'],5,2)."-".substr($row['TGLLAHIR'],0,4);;   
    $tgl = substr($tgl_lahir,8,2)."-".substr($tgl_lahir,5,2)."-".substr($tgl_lahir,0,4)." [".$umur->y." Th, ".$umur->m." Bln]";   
    //$jk=array('L'=>'Laki-Laki', 'P'=>'Perempuan');
    $jenkel = ($jns_kelamin=='1' || $jns_kelamin=="L") ? 'Laki-Laki' : 'Perempuan';
//}


?>

    
    <div class="stiker" id="capture" style="display: hide;">
        <table style="border-collapse: collapse;">
            <tr>
                <td>
                    <div class="barcode">
                        <img src="<?php echo base_url() ."b39?kode=" .$nomr; ?>">
                    </div>
                    <font size="4.5" style="float: left"><b><?php echo $nomr; ?></b></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="2"><b><?php echo $nama; ?></b></font>
                    <br>
                    <font class="nama"><?php echo $jenkel .", " . $tgl; ?></font>
                </td>
            </tr>
        </table>
        
    </div>

   
   
    
    <script>
        setTimeout(function () { window.print(); }, 500);
        setTimeout(function () { window.close(); }, 500);
        
    </script>
</body>
</html>