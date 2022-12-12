<?php 
    if($SQL->num_rows() > 0):
        $totTT = 0;
        
        $psHM01 = 0;
        $psHM02 = 0;
        $psHM03 = 0;
        $psHM04 = 0;
        $psHM05 = 0;
        $psHM06 = 0;
        $psHM07 = 0;
        $psHM08 = 0;
        $psHM09 = 0;
        $psHM10 = 0;
        $psHM11 = 0;
        $psHM12 = 0;
        $psHMTotal = 0;
        $grandpsHMTotal = 0;

        $psM01 = 0;
        $psM02 = 0;
        $psM03 = 0;
        $psM04 = 0;
        $psM05 = 0;
        $psM06 = 0;
        $psM07 = 0;
        $psM08 = 0;
        $psM09 = 0;
        $psM10 = 0;
        $psM11 = 0;
        $psM12 = 0;
        $psMTotal = 0;
        $grandpsMTotal = 0;

        foreach($SQL->result_array() as $x): 
            $psHM01 = $psHM01 + $x['K01'];
            $psHM02 = $psHM02 + $x['K02'];
            $psHM03 = $psHM03 + $x['K03'];
            $psHM04 = $psHM04 + $x['K04'];
            $psHM05 = $psHM05 + $x['K05'];
            $psHM06 = $psHM06 + $x['K06'];
            $psHM07 = $psHM07 + $x['K07'];
            $psHM08 = $psHM08 + $x['K08'];
            $psHM09 = $psHM09 + $x['K09'];
            $psHM10 = $psHM10 + $x['K10'];
            $psHM11 = $psHM11 + $x['K11'];
            $psHM12 = $psHM12 + $x['K12'];
            $psHMTotal = $x['K01']+$x['K02']+$x['K03']+$x['K04']+$x['K05']+$x['K06']+$x['K07']+$x['K08']+$x['K09']+$x['K10']+$x['K11']+$x['K12'];
            $grandpsHMTotal = $grandpsHMTotal + $psHMTotal;

            $psM01 = $psM01 + $x['M01'];
            $psM02 = $psM02 + $x['M02'];
            $psM03 = $psM03 + $x['M03'];
            $psM04 = $psM04 + $x['M04'];
            $psM05 = $psM05 + $x['M05'];
            $psM06 = $psM06 + $x['M06'];
            $psM07 = $psM07 + $x['M07'];
            $psM08 = $psM08 + $x['M08'];
            $psM09 = $psM09 + $x['M09'];
            $psM10 = $psM10 + $x['M10'];
            $psM11 = $psM11 + $x['M11'];
            $psM12 = $psM12 + $x['M12'];
            $psMTotal = $x['M01']+$x['M02']+$x['M03']+$x['M04']+$x['M05']+$x['M06']+$x['M07']+$x['M08']+$x['M09']+$x['M10']+$x['M11']+$x['M12'];
            $grandpsMTotal = $grandpsMTotal + $psMTotal;

            $totTT = $totTT + $x['jmlTT'];
?>
<tr class="item">
    <td class="desk"><?php echo $x['ruang']; ?></td>
    <td><?php echo $x['M01']; ?></td>
    <td><?php echo $x['K01']; ?></td>
    <td><?php echo $x['M02']; ?></td>
    <td><?php echo $x['K02']; ?></td>
    <td><?php echo $x['M03']; ?></td>
    <td><?php echo $x['K03']; ?></td>
    <td><?php echo $x['M04']; ?></td>
    <td><?php echo $x['K04']; ?></td>
    <td><?php echo $x['M05']; ?></td>
    <td><?php echo $x['K05']; ?></td>
    <td><?php echo $x['M06']; ?></td>
    <td><?php echo $x['K06']; ?></td>
    <td><?php echo $x['M07']; ?></td>
    <td><?php echo $x['K07']; ?></td>
    <td><?php echo $x['M08']; ?></td>
    <td><?php echo $x['K08']; ?></td>
    <td><?php echo $x['M09']; ?></td>
    <td><?php echo $x['K09']; ?></td>
    <td><?php echo $x['M10']; ?></td>
    <td><?php echo $x['K10']; ?></td>
    <td><?php echo $x['M11']; ?></td>
    <td><?php echo $x['K11']; ?></td>
    <td><?php echo $x['M12']; ?></td>
    <td><?php echo $x['K12']; ?></td>
    <td><?php echo $psMTotal; ?></td>
    <td><?php echo $psHMTotal; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item total">
    <td>Total</td>
    <td><?php echo $psM01; ?></td>
    <td><?php echo $psHM01; ?></td>
    <td><?php echo $psM02; ?></td>
    <td><?php echo $psHM02; ?></td>
    <td><?php echo $psM03; ?></td>
    <td><?php echo $psHM03; ?></td>
    <td><?php echo $psM04; ?></td>
    <td><?php echo $psHM04; ?></td>
    <td><?php echo $psM05; ?></td>
    <td><?php echo $psHM05; ?></td>
    <td><?php echo $psM06; ?></td>
    <td><?php echo $psHM06; ?></td>
    <td><?php echo $psM07; ?></td>
    <td><?php echo $psHM07; ?></td>
    <td><?php echo $psM08; ?></td>
    <td><?php echo $psHM08; ?></td>
    <td><?php echo $psM09; ?></td>
    <td><?php echo $psHM09; ?></td>
    <td><?php echo $psM10; ?></td>
    <td><?php echo $psHM10; ?></td>
    <td><?php echo $psM11; ?></td>
    <td><?php echo $psHM11; ?></td>
    <td><?php echo $psM12; ?></td>
    <td><?php echo $psHM12; ?></td>
    <td><?php echo $grandpsMTotal; ?></td>
    <td><?php echo $grandpsHMTotal; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="26">Data tidak ditemukan</td>
</tr>
<?php 
    endif; 
?>

<tr class="item">
    <td>NDR (x 1000%)</td>
    <td colspan="2"><?php echo @round($psM01*10/$psHM01,2); ?></td>
    <td colspan="2"><?php echo @round($psM02*10/$psHM02,2); ?></td>
    <td colspan="2"><?php echo @round($psM03*10/$psHM03,2); ?></td>
    <td colspan="2"><?php echo @round($psM04*10/$psHM04,2); ?></td>
    <td colspan="2"><?php echo @round($psM05*10/$psHM05,2); ?></td>
    <td colspan="2"><?php echo @round($psM06*10/$psHM06,2); ?></td>
    <td colspan="2"><?php echo @round($psM07*10/$psHM07,2); ?></td>
    <td colspan="2"><?php echo @round($psM08*10/$psHM08,2); ?></td>
    <td colspan="2"><?php echo @round($psM09*10/$psHM09,2); ?></td>
    <td colspan="2"><?php echo @round($psM10*10/$psHM10,2); ?></td>
    <td colspan="2"><?php echo @round($psM11*10/$psHM11,2); ?></td>
    <td colspan="2"><?php echo @round($psM12*10/$psHM12,2); ?></td>
    <td colspan="2"><?php echo @round($grandpsMTotal*10/$grandpsHMTotal,2); ?></td>
</tr>