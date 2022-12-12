<html>
<head>
<title></title>
<style>
    
    *{
        font-size: 40px;
        margin: 0px;
		font-family:Arial, Helvetica, sans-serif;
    }
    td#spasi{
        height: 2mm;
    }
    @page{
        size:auto;
        margin-top:3mm;
        margin-bottom:0mm;
        margin-left:1mm;
        margin-right:0mm;
    }
    table.w_border{
        border: 1px solid #FFF;
        border-collapse: collapse;
        width: 160mm;
    }
    table.w_border tr td.c_page{
        width: 50mm;
    }
    table.w_border tr td.c_spasi{
        width: 5mm;
    }
    
    table.w_border tr td{
        border: 1px solid #FFF;
        height: 18mm;
    }
    
    table.w_border tr td table tr td{
        border: none;
        height: auto;
    }
    
</style>
</head>
<body onLoad="window.print()">
<?php
error_reporting(0);
foreach ($pas as $row){
    $idmr = $row->nomr;
    $jenkel = $row->jns_kelamin;
    /**$umur = $row->Umur;
	
	if($umur > 15 ){
		if($jenkel=="P"){
		$panggilan = 'Ny. ';
		}
	}**/
	
	$lahir=new DateTime($row->tgl_lahir);
	$today =new DateTime();
	
	$umur=$today->diff($lahir);
	
	if($umur->y > 15 ){
		if($jenkel=="P"){
		$panggilan = 'Ny. ';
		}
	}
	
$text = $row->nama;
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
    $tgl = substr($row->tgl_lahir,8,2)."-".substr($row->tgl_lahir,5,2)."-".substr($row->tgl_lahir,0,4)." [".$umur->y." Th, ".$umur->m." Bln]";   
     
}


?>

    <table class="w_border">
        <tr>
            <td class="c_page">
                <table>
				
                    <tr>
                        <td><strong><?php echo $idmr; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo "$nama"; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo "$tgl [ $jenkel ]"; ?></strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>