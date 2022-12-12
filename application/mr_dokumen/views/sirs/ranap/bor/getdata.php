<?php
if ($SQL->num_rows() > 0) :
    $sub01 = 0;
    $sub02 = 0;
    $sub03 = 0;
    $sub04 = 0;
    $sub05 = 0;
    $sub06 = 0;
    $sub07 = 0;
    $sub08 = 0;
    $sub09 = 0;
    $sub10 = 0;
    $sub11 = 0;
    $sub12 = 0;
    $subTotal = 0;
    $totTT = 0;
    $grandTotal = 0;
    foreach ($SQL->result_array() as $x) :
        $sub01 = $sub01 + $x['M01'];
        $sub02 = $sub02 + $x['M02'];
        $sub03 = $sub03 + $x['M03'];
        $sub04 = $sub04 + $x['M04'];
        $sub05 = $sub05 + $x['M05'];
        $sub06 = $sub06 + $x['M06'];
        $sub07 = $sub07 + $x['M07'];
        $sub08 = $sub08 + $x['M08'];
        $sub09 = $sub09 + $x['M09'];
        $sub10 = $sub10 + $x['M10'];
        $sub11 = $sub11 + $x['M11'];
        $sub12 = $sub12 + $x['M12'];
        $subTotal = $x['M01'] + $x['M02'] + $x['M03'] + $x['M04'] + $x['M05'] + $x['M06'] + $x['M07'] + $x['M08'] + $x['M09'] + $x['M10'] + $x['M11'] + $x['M12'];
        $grandTotal = $grandTotal + $subTotal;
        $totTT = $totTT + $x['jmlTT'];
?>
        <tr class="item">
            <td class="desk"><?php echo $x['ruang']; ?></td>
            <td><?php echo $x['jmlTT']; ?></td>
            <td><?php echo $x['M01']; ?></td>
            <td><?php echo $x['M02']; ?></td>
            <td><?php echo $x['M03']; ?></td>
            <td><?php echo $x['M04']; ?></td>
            <td><?php echo $x['M05']; ?></td>
            <td><?php echo $x['M06']; ?></td>
            <td><?php echo $x['M07']; ?></td>
            <td><?php echo $x['M08']; ?></td>
            <td><?php echo $x['M09']; ?></td>
            <td><?php echo $x['M10']; ?></td>
            <td><?php echo $x['M11']; ?></td>
            <td><?php echo $x['M12']; ?></td>
            <td><?php echo $subTotal; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr class="item total">
        <td>Total</td>
        <td><?php echo $totTT; ?></td>
        <td><?php echo $sub01; ?></td>
        <td><?php echo $sub02; ?></td>
        <td><?php echo $sub03; ?></td>
        <td><?php echo $sub04; ?></td>
        <td><?php echo $sub05; ?></td>
        <td><?php echo $sub06; ?></td>
        <td><?php echo $sub07; ?></td>
        <td><?php echo $sub08; ?></td>
        <td><?php echo $sub09; ?></td>
        <td><?php echo $sub10; ?></td>
        <td><?php echo $sub11; ?></td>
        <td><?php echo $sub12; ?></td>
        <td><?php echo $grandTotal; ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="15">Data tidak ditemukan</td>
    </tr>
<?php
endif;
$jh_01 = cal_days_in_month(CAL_GREGORIAN, 1, $tahun);
$jh_02 = cal_days_in_month(CAL_GREGORIAN, 2, $tahun);
$jh_03 = cal_days_in_month(CAL_GREGORIAN, 3, $tahun);
$jh_04 = cal_days_in_month(CAL_GREGORIAN, 4, $tahun);
$jh_05 = cal_days_in_month(CAL_GREGORIAN, 5, $tahun);
$jh_06 = cal_days_in_month(CAL_GREGORIAN, 6, $tahun);
$jh_07 = cal_days_in_month(CAL_GREGORIAN, 7, $tahun);
$jh_08 = cal_days_in_month(CAL_GREGORIAN, 8, $tahun);
$jh_09 = cal_days_in_month(CAL_GREGORIAN, 9, $tahun);
$jh_10 = cal_days_in_month(CAL_GREGORIAN, 10, $tahun);
$jh_11 = cal_days_in_month(CAL_GREGORIAN, 11, $tahun);
$jh_12 = cal_days_in_month(CAL_GREGORIAN, 12, $tahun);
$jhSeThn = $jh_01 + $jh_02 + $jh_03 + $jh_04 + $jh_05 + $jh_06 + $jh_07 + $jh_08 + $jh_09 + $jh_10 + $jh_11 + $jh_12;
?>
<tr class="item">
    <td>Jml. Hari</td>
    <td><?php echo $totTT; ?></td>
    <td><?php echo $jh_01; ?></td>
    <td><?php echo $jh_02; ?></td>
    <td><?php echo $jh_03; ?></td>
    <td><?php echo $jh_04; ?></td>
    <td><?php echo $jh_05; ?></td>
    <td><?php echo $jh_06; ?></td>
    <td><?php echo $jh_07; ?></td>
    <td><?php echo $jh_08; ?></td>
    <td><?php echo $jh_09; ?></td>
    <td><?php echo $jh_10; ?></td>
    <td><?php echo $jh_11; ?></td>
    <td><?php echo $jh_12; ?></td>
    <td><?php echo $jhSeThn; ?></td>
</tr>
<!--
BOR = Jumlah hari perawatan rumah sakit / (Jumlah TT X Jumlah hari dalam satu periode) x 100 %
-->
<tr class="item">
    <td>BOR (%)</td>
    <td><?php echo $totTT; ?></td>
    <td><?php echo @round(($sub01 * 100) / ($totTT * $jh_01), 2); ?></td>
    <td><?php echo @round(($sub02 * 100) / ($totTT * $jh_02), 2); ?></td>
    <td><?php echo @round(($sub03 * 100) / ($totTT * $jh_03), 2); ?></td>
    <td><?php echo @round(($sub04 * 100) / ($totTT * $jh_04), 2); ?></td>
    <td><?php echo @round(($sub05 * 100) / ($totTT * $jh_05), 2); ?></td>
    <td><?php echo @round(($sub06 * 100) / ($totTT * $jh_06), 2); ?></td>
    <td><?php echo @round(($sub07 * 100) / ($totTT * $jh_07), 2); ?></td>
    <td><?php echo @round(($sub08 * 100) / ($totTT * $jh_08), 2); ?></td>
    <td><?php echo @round(($sub09 * 100) / ($totTT * $jh_09), 2); ?></td>
    <td><?php echo @round(($sub10 * 100) / ($totTT * $jh_10), 2); ?></td>
    <td><?php echo @round(($sub11 * 100) / ($totTT * $jh_11), 2); ?></td>
    <td><?php echo @round(($sub12 * 100) / ($totTT * $jh_12), 2); ?></td>
    <td><?php echo @round(($grandTotal * 100) / ($totTT * $jhSeThn), 2); ?></td>
</tr>