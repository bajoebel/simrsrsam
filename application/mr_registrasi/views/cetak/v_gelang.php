<html>
<head>
<title></title>
<style type="text/css">
    body{
        padding: 0px;
        margin: 0px;
    }
    @page{
        size:auto;
        margin-top:1mm;
        margin-bottom:0mm;
        margin-left:1mm;
        margin-right:0mm;
    }

   *{margin:0; padding:0;}
   .container{margin:10px auto 0; width:25mm; height: 160mm; font-family:arial;float: left;padding-top: 50mm;}
     .text1 {
      writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    text-align: center;
    padding-right: 5px;
    height: 100mm;
    float:left;

    }

    .text2 {
      writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(-1deg);
    white-space:nowrap;
    float:right;
    }

    .barcode {
      writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    /*transform: rotate(-1deg);*/
    padding-top: 40px;
    transform:rotate(-90deg);
    white-space:nowrap;
    float:right;
    }
 
</style>

<!--script src="<?php //echo base_url() ."assets/js/" ?>html2canvas.min.js"></script-->
</head>
<!--body onLoad="window.print()"-->
<body>
<?php
error_reporting(0);
//foreach ($pas as $row){
    //$nomr = $row->nomr;
    $jenkel = $jns_kelamin;
    /**$umur = $row->Umur;
    
    if($umur > 15 ){
        if($jenkel=="P"){
        $panggilan = 'Ny. ';
        }
    }**/
    //echo $tgl_lahir;exit;
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
    $strtgl = substr($tgl_lahir,8,2)."-".substr($tgl_lahir,5,2)."-".substr($tgl_lahir,0,4)." [".$umur->y." Th, ".$umur->m." Bln]"; 
    //echo $tgl; exit;  
    $jk=array('1'=>'Laki-Laki', '0'=>'Perempuan');
    //echo $jk[$jenkel] . ", " . $strtgl . ", " . $umur;
//}


?>


    <div class="container">
      
      <p class="barcode"><img src="<?php echo base_url() ."b39?kode=" .$nomr; ?>" class="gambar"></p>
      <h2 class="text1"><?php echo $nomr; ?><br><?php echo $nama; ?></h2>
      <span class="text1"><?php echo $jk[$jenkel] .", " . $strtgl ; ?></span>
    </div>
    <script>
        //window.print();
        //window.close();
        setTimeout(function () { window.print(); }, 500);
        setTimeout(function () { window.close(); }, 500);
    </script>
</body>
</html>