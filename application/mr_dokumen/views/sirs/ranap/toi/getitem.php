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

        $psDirawat01 = 0;
        $psDirawat02 = 0;
        $psDirawat03 = 0;
        $psDirawat04 = 0;
        $psDirawat05 = 0;
        $psDirawat06 = 0;
        $psDirawat07 = 0;
        $psDirawat08 = 0;
        $psDirawat09 = 0;
        $psDirawat10 = 0;
        $psDirawat11 = 0;
        $psDirawat12 = 0;
        $psDirawatTotal = 0;
        $grandpsDirawatTotal = 0;

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

            $psDirawat01 = $psDirawat01 + $x['M01'];
            $psDirawat02 = $psDirawat02 + $x['M02'];
            $psDirawat03 = $psDirawat03 + $x['M03'];
            $psDirawat04 = $psDirawat04 + $x['M04'];
            $psDirawat05 = $psDirawat05 + $x['M05'];
            $psDirawat06 = $psDirawat06 + $x['M06'];
            $psDirawat07 = $psDirawat07 + $x['M07'];
            $psDirawat08 = $psDirawat08 + $x['M08'];
            $psDirawat09 = $psDirawat09 + $x['M09'];
            $psDirawat10 = $psDirawat10 + $x['M10'];
            $psDirawat11 = $psDirawat11 + $x['M11'];
            $psDirawat12 = $psDirawat12 + $x['M12'];
            $psDirawatTotal = $x['M01']+$x['M02']+$x['M03']+$x['M04']+$x['M05']+$x['M06']+$x['M07']+$x['M08']+$x['M09']+$x['M10']+$x['M11']+$x['M12'];
            $grandpsDirawatTotal = $grandpsDirawatTotal + $psDirawatTotal;

            $totTT = $totTT + $x['jmlTT'];
?>
<tr class="item">
    <td class="desk"><?php echo $x['ruang']; ?></td>
    <td><?php echo $x['jmlTT']; ?></td>
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
    <td><?php echo $psDirawatTotal; ?></td>
    <td><?php echo $psHMTotal; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item total">
    <td>Total</td>
    <td><?php echo $totTT; ?></td>
    <td><?php echo $psDirawat01; ?></td>
    <td><?php echo $psHM01; ?></td>
    <td><?php echo $psDirawat02; ?></td>
    <td><?php echo $psHM02; ?></td>
    <td><?php echo $psDirawat03; ?></td>
    <td><?php echo $psHM03; ?></td>
    <td><?php echo $psDirawat04; ?></td>
    <td><?php echo $psHM04; ?></td>
    <td><?php echo $psDirawat05; ?></td>
    <td><?php echo $psHM05; ?></td>
    <td><?php echo $psDirawat06; ?></td>
    <td><?php echo $psHM06; ?></td>
    <td><?php echo $psDirawat07; ?></td>
    <td><?php echo $psHM07; ?></td>
    <td><?php echo $psDirawat08; ?></td>
    <td><?php echo $psHM08; ?></td>
    <td><?php echo $psDirawat09; ?></td>
    <td><?php echo $psHM09; ?></td>
    <td><?php echo $psDirawat10; ?></td>
    <td><?php echo $psHM10; ?></td>
    <td><?php echo $psDirawat11; ?></td>
    <td><?php echo $psHM11; ?></td>
    <td><?php echo $psDirawat12; ?></td>
    <td><?php echo $psHM12; ?></td>
    <td><?php echo $grandpsDirawatTotal; ?></td>
    <td><?php echo $grandpsHMTotal; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="27">Data tidak ditemukan</td>
</tr>
<?php 
    endif; 
    $jh_01 = cal_days_in_month(CAL_GREGORIAN,1,$tahun);
    $jh_02 = cal_days_in_month(CAL_GREGORIAN,2,$tahun);
    $jh_03 = cal_days_in_month(CAL_GREGORIAN,3,$tahun);
    $jh_04 = cal_days_in_month(CAL_GREGORIAN,4,$tahun);
    $jh_05 = cal_days_in_month(CAL_GREGORIAN,5,$tahun);
    $jh_06 = cal_days_in_month(CAL_GREGORIAN,6,$tahun);
    $jh_07 = cal_days_in_month(CAL_GREGORIAN,7,$tahun);
    $jh_08 = cal_days_in_month(CAL_GREGORIAN,8,$tahun);
    $jh_09 = cal_days_in_month(CAL_GREGORIAN,9,$tahun);
    $jh_10 = cal_days_in_month(CAL_GREGORIAN,10,$tahun);
    $jh_11 = cal_days_in_month(CAL_GREGORIAN,11,$tahun);
    $jh_12 = cal_days_in_month(CAL_GREGORIAN,12,$tahun);
    $jhSeThn = $jh_01 + $jh_02 + $jh_03 + $jh_04 + $jh_05 + $jh_06 + $jh_07 + $jh_08 + $jh_09 + $jh_10 + $jh_11 + $jh_12;
?>
<tr class="item">
    <td>Jml. Hari</td>
    <td>-</td>
    <td colspan="2"><?php echo $jh_01; ?></td>
    <td colspan="2"><?php echo $jh_02; ?></td>
    <td colspan="2"><?php echo $jh_03; ?></td>
    <td colspan="2"><?php echo $jh_04; ?></td>
    <td colspan="2"><?php echo $jh_05; ?></td>
    <td colspan="2"><?php echo $jh_06; ?></td>
    <td colspan="2"><?php echo $jh_07; ?></td>
    <td colspan="2"><?php echo $jh_08; ?></td>
    <td colspan="2"><?php echo $jh_09; ?></td>
    <td colspan="2"><?php echo $jh_10; ?></td>
    <td colspan="2"><?php echo $jh_11; ?></td>
    <td colspan="2"><?php echo $jh_12; ?></td>
    <td colspan="2"><?php echo $jhSeThn; ?></td>
</tr>
<tr class="item">
    <td>Jml.TT x Periode</td>
    <td>-</td>
    <td colspan="2"><?php echo $totTT*$jh_01; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_02; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_03; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_04; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_05; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_06; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_07; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_08; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_09; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_10; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_11; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_12; ?></td>
    <td colspan="2"><?php echo $totTT*$jhSeThn; ?></td>
</tr>
<tr class="item">
    <td>Hari Rawatan</td>
    <td>-</td>
    <td colspan="2"><?php echo $psDirawat01; ?></td>
    <td colspan="2"><?php echo $psDirawat02; ?></td>
    <td colspan="2"><?php echo $psDirawat03; ?></td>
    <td colspan="2"><?php echo $psDirawat04; ?></td>
    <td colspan="2"><?php echo $psDirawat05; ?></td>
    <td colspan="2"><?php echo $psDirawat06; ?></td>
    <td colspan="2"><?php echo $psDirawat07; ?></td>
    <td colspan="2"><?php echo $psDirawat08; ?></td>
    <td colspan="2"><?php echo $psDirawat09; ?></td>
    <td colspan="2"><?php echo $psDirawat10; ?></td>
    <td colspan="2"><?php echo $psDirawat11; ?></td>
    <td colspan="2"><?php echo $psDirawat12; ?></td>
    <td colspan="2"><?php echo $grandpsDirawatTotal; ?></td>
</tr>
<tr class="item">
    <td>(Jml.TT x Periode) - Hari Rawatan</td>
    <td>-</td>
    <td colspan="2"><?php echo $totTT*$jh_01-$psDirawat01; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_02-$psDirawat02; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_03-$psDirawat03; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_04-$psDirawat04; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_05-$psDirawat05; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_06-$psDirawat06; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_07-$psDirawat07; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_08-$psDirawat08; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_09-$psDirawat09; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_10-$psDirawat10; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_11-$psDirawat11; ?></td>
    <td colspan="2"><?php echo $totTT*$jh_12-$psDirawat12; ?></td>
    <td colspan="2"><?php echo $totTT*$jhSeThn-$grandpsDirawatTotal; ?></td>
</tr>
<tr class="item">
    <td>Pasien Keluar (Hidup+Mati)</td>
    <td>-</td>
    <td colspan="2"><?php echo $psHM01; ?></td>
    <td colspan="2"><?php echo $psHM02; ?></td>
    <td colspan="2"><?php echo $psHM03; ?></td>
    <td colspan="2"><?php echo $psHM04; ?></td>
    <td colspan="2"><?php echo $psHM05; ?></td>
    <td colspan="2"><?php echo $psHM06; ?></td>
    <td colspan="2"><?php echo $psHM07; ?></td>
    <td colspan="2"><?php echo $psHM08; ?></td>
    <td colspan="2"><?php echo $psHM09; ?></td>
    <td colspan="2"><?php echo $psHM10; ?></td>
    <td colspan="2"><?php echo $psHM11; ?></td>
    <td colspan="2"><?php echo $psHM12; ?></td>
    <td colspan="2"><?php echo $grandpsHMTotal; ?></td>
</tr>
<tr class="item">
    <td>TOI</td>
    <td>-</td>
    <td colspan="2"><?php echo @round((($totTT*$jh_01)-$psDirawat01)/$psHM01,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_02)-$psDirawat02)/$psHM02,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_03)-$psDirawat03)/$psHM03,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_04)-$psDirawat04)/$psHM04,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_05)-$psDirawat05)/$psHM05,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_06)-$psDirawat06)/$psHM06,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_07)-$psDirawat07)/$psHM07,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_08)-$psDirawat08)/$psHM08,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_09)-$psDirawat09)/$psHM09,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_10)-$psDirawat10)/$psHM10,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_11)-$psDirawat11)/$psHM11,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jh_12)-$psDirawat12)/$psHM12,2); ?></td>
    <td colspan="2"><?php echo @round((($totTT*$jhSeThn)-$grandpsDirawatTotal)/$grandpsHMTotal,2); ?></td>
</tr>