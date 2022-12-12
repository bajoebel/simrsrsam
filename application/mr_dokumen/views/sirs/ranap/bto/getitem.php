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

            $totTT = $totTT + $x['jmlTT'];
?>
<tr class="item">
    <td class="desk"><?php echo $x['ruang']; ?></td>
    <td><?php echo $x['jmlTT']; ?></td>
    <td><?php echo $x['K01']; ?></td>
    <td><?php echo $x['K02']; ?></td>
    <td><?php echo $x['K03']; ?></td>
    <td><?php echo $x['K04']; ?></td>
    <td><?php echo $x['K05']; ?></td>
    <td><?php echo $x['K06']; ?></td>
    <td><?php echo $x['K07']; ?></td>
    <td><?php echo $x['K08']; ?></td>
    <td><?php echo $x['K09']; ?></td>
    <td><?php echo $x['K10']; ?></td>
    <td><?php echo $x['K11']; ?></td>
    <td><?php echo $x['K12']; ?></td>
    <td><?php echo $psHMTotal; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item total">
    <td>Total</td>
    <td><?php echo $totTT; ?></td>
    <td><?php echo $psHM01; ?></td>
    <td><?php echo $psHM02; ?></td>
    <td><?php echo $psHM03; ?></td>
    <td><?php echo $psHM04; ?></td>
    <td><?php echo $psHM05; ?></td>
    <td><?php echo $psHM06; ?></td>
    <td><?php echo $psHM07; ?></td>
    <td><?php echo $psHM08; ?></td>
    <td><?php echo $psHM09; ?></td>
    <td><?php echo $psHM10; ?></td>
    <td><?php echo $psHM11; ?></td>
    <td><?php echo $psHM12; ?></td>
    <td><?php echo $grandpsHMTotal; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="15">Data tidak ditemukan</td>
</tr>
<?php 
    endif; 
?>

<tr class="item">
    <td>BTO</td>
    <td>-</td>
    <td><?php echo @round($psHM01/$totTT,2); ?></td>
    <td><?php echo @round($psHM02/$totTT,2); ?></td>
    <td><?php echo @round($psHM03/$totTT,2); ?></td>
    <td><?php echo @round($psHM04/$totTT,2); ?></td>
    <td><?php echo @round($psHM05/$totTT,2); ?></td>
    <td><?php echo @round($psHM06/$totTT,2); ?></td>
    <td><?php echo @round($psHM07/$totTT,2); ?></td>
    <td><?php echo @round($psHM08/$totTT,2); ?></td>
    <td><?php echo @round($psHM09/$totTT,2); ?></td>
    <td><?php echo @round($psHM10/$totTT,2); ?></td>
    <td><?php echo @round($psHM11/$totTT,2); ?></td>
    <td><?php echo @round($psHM12/$totTT,2); ?></td>
    <td><?php echo @round($grandpsHMTotal/$totTT,2); ?></td>
</tr>