<?php 
    if($SQL->num_rows() > 0):
        $lamaDirawat01 = 0;
        $lamaDirawat02 = 0;
        $lamaDirawat03 = 0;
        $lamaDirawat04 = 0;
        $lamaDirawat05 = 0;
        $lamaDirawat06 = 0;
        $lamaDirawat07 = 0;
        $lamaDirawat08 = 0;
        $lamaDirawat09 = 0;
        $lamaDirawat10 = 0;
        $lamaDirawat11 = 0;
        $lamaDirawat12 = 0;
        $lamaDirawatTotal = 0;
        $grandLamaDirawat = 0;

        $psKeluarHM01 = 0;
        $psKeluarHM02 = 0;
        $psKeluarHM03 = 0;
        $psKeluarHM04 = 0;
        $psKeluarHM05 = 0;
        $psKeluarHM06 = 0;
        $psKeluarHM07 = 0;
        $psKeluarHM08 = 0;
        $psKeluarHM09 = 0;
        $psKeluarHM10 = 0;
        $psKeluarHM11 = 0;
        $psKeluarHM12 = 0;
        $psKeluarHMTotal = 0;
        $grandPsKeluarHM = 0;

        foreach($SQL->result_array() as $x): 
            $lamaDirawat01 = $lamaDirawat01 + $x['M01'];
            $lamaDirawat02 = $lamaDirawat02 + $x['M02'];
            $lamaDirawat03 = $lamaDirawat03 + $x['M03'];
            $lamaDirawat04 = $lamaDirawat04 + $x['M04'];
            $lamaDirawat05 = $lamaDirawat05 + $x['M05'];
            $lamaDirawat06 = $lamaDirawat06 + $x['M06'];
            $lamaDirawat07 = $lamaDirawat07 + $x['M07'];
            $lamaDirawat08 = $lamaDirawat08 + $x['M08'];
            $lamaDirawat09 = $lamaDirawat09 + $x['M09'];
            $lamaDirawat10 = $lamaDirawat10 + $x['M10'];
            $lamaDirawat11 = $lamaDirawat11 + $x['M11'];
            $lamaDirawat12 = $lamaDirawat12 + $x['M12'];
            $lamaDirawatTotal = $x['M01']+$x['M02']+$x['M03']+$x['M04']+$x['M05']+$x['M06']+$x['M07']+$x['M08']+$x['M09']+$x['M10']+$x['M11']+$x['M12'];
            $grandLamaDirawat = $grandLamaDirawat + $lamaDirawatTotal;

            $psKeluarHM01 = $psKeluarHM01 + $x['K01'];
            $psKeluarHM02 = $psKeluarHM02 + $x['K02'];
            $psKeluarHM03 = $psKeluarHM03 + $x['K03'];
            $psKeluarHM04 = $psKeluarHM04 + $x['K04'];
            $psKeluarHM05 = $psKeluarHM05 + $x['K05'];
            $psKeluarHM06 = $psKeluarHM06 + $x['K06'];
            $psKeluarHM07 = $psKeluarHM07 + $x['K07'];
            $psKeluarHM08 = $psKeluarHM08 + $x['K08'];
            $psKeluarHM09 = $psKeluarHM09 + $x['K09'];
            $psKeluarHM10 = $psKeluarHM10 + $x['K10'];
            $psKeluarHM11 = $psKeluarHM11 + $x['K11'];
            $psKeluarHM12 = $psKeluarHM12 + $x['K12'];
            $psKeluarHMTotal = $x['K01']+$x['K02']+$x['K03']+$x['K04']+$x['K05']+$x['K06']+$x['K07']+$x['K08']+$x['K09']+$x['K10']+$x['K11']+$x['K12'];

            $grandPsKeluarHM = $grandPsKeluarHM + $psKeluarHMTotal;
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
    <td><?php echo $lamaDirawatTotal; ?></td>
    <td><?php echo $psKeluarHMTotal; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item total">
    <td>Total</td>
    <td><?php echo $lamaDirawat01; ?></td>
    <td><?php echo $psKeluarHM01; ?></td>
    <td><?php echo $lamaDirawat02; ?></td>
    <td><?php echo $psKeluarHM02; ?></td>
    <td><?php echo $lamaDirawat03; ?></td>
    <td><?php echo $psKeluarHM03; ?></td>
    <td><?php echo $lamaDirawat04; ?></td>
    <td><?php echo $psKeluarHM04; ?></td>
    <td><?php echo $lamaDirawat05; ?></td>
    <td><?php echo $psKeluarHM05; ?></td>
    <td><?php echo $lamaDirawat06; ?></td>
    <td><?php echo $psKeluarHM06; ?></td>
    <td><?php echo $lamaDirawat07; ?></td>
    <td><?php echo $psKeluarHM07; ?></td>
    <td><?php echo $lamaDirawat08; ?></td>
    <td><?php echo $psKeluarHM08; ?></td>
    <td><?php echo $lamaDirawat09; ?></td>
    <td><?php echo $psKeluarHM09; ?></td>
    <td><?php echo $lamaDirawat10; ?></td>
    <td><?php echo $psKeluarHM10; ?></td>
    <td><?php echo $lamaDirawat11; ?></td>
    <td><?php echo $psKeluarHM11; ?></td>
    <td><?php echo $lamaDirawat12; ?></td>
    <td><?php echo $psKeluarHM12; ?></td>

    <td><?php echo $grandLamaDirawat; ?></td>
    <td><?php echo $grandPsKeluarHM; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="26">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
<!--
BOR = Jumlah lama dirawat / Jumlah pasien keluar (Hidup Mati)
-->
<tr class="item">
    <td>AVLOS</td>
    <td colspan="2"><?php echo @round($lamaDirawat01/$psKeluarHM01,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat02/$psKeluarHM02,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat03/$psKeluarHM03,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat04/$psKeluarHM04,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat05/$psKeluarHM05,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat06/$psKeluarHM06,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat07/$psKeluarHM07,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat08/$psKeluarHM08,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat09/$psKeluarHM09,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat10/$psKeluarHM10,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat11/$psKeluarHM11,2); ?></td>
    <td colspan="2"><?php echo @round($lamaDirawat12/$psKeluarHM12,2); ?></td>
    <td colspan="2"><?php echo @round($grandLamaDirawat/$grandPsKeluarHM,2); ?></td>
</tr>

