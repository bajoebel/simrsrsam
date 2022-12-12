<?php 
    if($SQL->num_rows() > 0):
    	$sub01 = 0;
    	$sub02 = 0;
    	$subHR = 0;
        $sub03 = 0;
        $sub04 = 0;
        $sub05 = 0;
        $sub06 = 0;
        $sub07 = 0;
        $sub08 = 0;
    	$grandHR = 0;
        foreach($SQL->result_array() as $x): 
        	$sub01 = $sub01 + $x['PM'];
            $sub02 = $sub02 + $x['LR'];
        	$subHR = $x['HR3']+$x['HR2']+$x['HR1']+$x['HR4'];

            $sub03 = $sub03 + $x['HR3'];
            $sub04 = $sub04 + $x['HR2'];
            $sub05 = $sub05 + $x['HR1'];
            $sub06 = $sub06 + $x['HR4'];
            $sub07 = $sub07 + $x['HR4'];
            $sub08 = $sub08 + $x['HR4'];
        	$grandHR = $grandHR + $subHR;
?>
<tr class="item">
    <td class="desk"><?php echo $x['jenis_pelayanan']; ?></td>
    <td><?php echo $x['PM']; ?></td>
    <td><?php echo $x['LR']; ?></td>
    <td><?php echo $subHR; ?></td>
    <td><?php echo $x['HR3']; ?></td>
    <td><?php echo $x['HR2']; ?></td>
    <td><?php echo $x['HR1']; ?></td>
    <td><?php echo $x['HR4']; ?></td>
    <td><?php echo $x['PK_48M']; ?></td>
    <td><?php echo $x['PK_M48']; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item">
	<td>&nbsp;</td>
    <td><?php echo $sub01; ?></td>
    <td><?php echo $sub02; ?></td>
    <td><?php echo $grandHR; ?></td>
    <td><?php echo $sub03; ?></td>
    <td><?php echo $sub04; ?></td>
    <td><?php echo $sub05; ?></td>
    <td><?php echo $sub06; ?></td>
    <td><?php echo $sub07; ?></td>
    <td><?php echo $sub08; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="10">Data tidak ditemukan</td>
</tr>
<?php endif; ?>