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
$jenkel = ($jns_kelamin=='1') ? 'L' : 'P';

$lahir=new DateTime($tgl_lahir);
$today =new DateTime();
$umur=$today->diff($lahir);
if($umur->y > 15 ){
    if($jenkel=="P"){
        $panggilan = 'Ny. ';
    }
}
$umurDetail = "[".$umur->y." Th, ".$umur->m." Bln]"
?>

    <table class="w_border">
        <tr>
            <td class="c_page">
                <table>
				
                    <tr>
                        <td><strong><?php echo $nomr; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo $nama; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo date('d-m-Y',strtotime($tgl_lahir)) . " $umurDetail [ $jenkel ]"; ?></strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>