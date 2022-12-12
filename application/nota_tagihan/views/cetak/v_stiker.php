<?php
/**
 * @author Dendi Ferdinal, S.Kom
 * @copyright 05 April 2016
 */
error_reporting(0);

function getUmurA($dob,$dtnow){
    // Tanggal Lahir
    // $dob = "1992-05-22";
    // $dt = "1992-05-22";
    // Convert Ke Date Time
    $biday = new DateTime($dob);
    $today = new DateTime($dtnow);
    $diff = $today->diff($biday);
    return $diff->y.' Th, '.$diff->m.' Bln, '.$diff->d.' Hari';
}

function getUmurC($dob){
    $dtnow = date('Y-m-d H:i:s');
    $biday = new DateTime($dob);
    $today = new DateTime( date("Y-m-d"),new DateTimeZone('Europe/London'));
    $diff = $today->diff($biday);
    return  $diff->y.' Th, '.$diff->m.' Bln';
}


?>
<html>
<head>
<title></title>
<style>
    *{
        font-size: 12px;
        font-family: Arial,sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        margin: 0px;
    }
    td#spasi{height: 2mm;}
    @page{
        size            :auto;
        margin-top      :2mm;
        margin-bottom   :0mm;
        margin-left     :8mm;
        margin-right    :0mm;
    }
    table.w_border{
        border: 1px solid #fff;
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
        border: 1px solid #fff;
        height: 18mm;
    }
    
    table.w_border tr td table tr td{
        border: none;
        height: auto;
    }
    div.tanggal{font-size: 10px}
</style>
</head>
<script type="text/javascript">
    // window.print();
    // window.close();
</script>
<body>
<?php
    $tgl = "<div class=tanggal>";
    $tgl .= substr($tgl_lahir,8,2)."-".substr($tgl_lahir,5,2)."-".substr($tgl_lahir,0,4);
    $tgl .= ' [' . getUmurC($tgl_lahir) . ']' . ' [' . $jenkel . ']';
    $tgl .= "</div>";

?>
<br>
    <table class="w_border">
        <tr>
            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>

            <td class="c_spasi">&nbsp;</td>
            
            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>

            <td class="c_spasi">&nbsp;</td>

            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td id="spasi" colspan="5"></td>
        </tr>
        
        <tr>
            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>

            <td class="c_spasi">&nbsp;</td>
            
            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>

            <td class="c_spasi">&nbsp;</td>

            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td id="spasi" colspan="5"></td>
        </tr>
        
        <tr>
            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>

            <td class="c_spasi">&nbsp;</td>
            
            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>

            <td class="c_spasi">&nbsp;</td>

            <td class="c_page">
                <table>
                <tr>
                        <td><?php echo $idmr; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo substr($nama,0,31); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                </table>
            </td>
        </tr>      
        
        <tr>
            <td id="spasi" colspan="5"></td>
        </tr>
         
    </table>
</body>
</html>