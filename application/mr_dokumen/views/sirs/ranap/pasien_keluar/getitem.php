<?php 
    if($SQL->num_rows() > 0):
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
    	$grandTotal = 0;
        foreach($SQL->result_array() as $x): 
        	$sub01 = $sub01 + $x['01'];
        	$sub02 = $sub02 + $x['02'];
        	$sub03 = $sub03 + $x['03'];
        	$sub04 = $sub04 + $x['04'];
        	$sub05 = $sub05 + $x['05'];
        	$sub06 = $sub06 + $x['06'];
        	$sub07 = $sub07 + $x['07'];
        	$sub08 = $sub08 + $x['08'];
        	$sub09 = $sub09 + $x['09'];
        	$sub10 = $sub10 + $x['10'];
        	$sub11 = $sub11 + $x['11'];
        	$sub12 = $sub12 + $x['12'];
        	$subTotal = $x['01']+$x['02']+$x['03']+$x['04']+$x['05']+$x['06']+$x['07']+$x['08']+$x['09']+$x['10']+$x['11']+$x['12'];
        	$grandTotal = $grandTotal + $subTotal;
?>
<tr class="item">
    <td class="desk"><?php echo $x['jenis_pelayanan']; ?></td>
    <td><?php echo number_format($x['01'],0,',','.'); ?></td>
    <td><?php echo number_format($x['02'],0,',','.'); ?></td>
    <td><?php echo number_format($x['03'],0,',','.'); ?></td>
    <td><?php echo number_format($x['04'],0,',','.'); ?></td>
    <td><?php echo number_format($x['05'],0,',','.'); ?></td>
    <td><?php echo number_format($x['06'],0,',','.'); ?></td>
    <td><?php echo number_format($x['07'],0,',','.'); ?></td>
    <td><?php echo number_format($x['08'],0,',','.'); ?></td>
    <td><?php echo number_format($x['09'],0,',','.'); ?></td>
    <td><?php echo number_format($x['10'],0,',','.'); ?></td>
    <td><?php echo number_format($x['11'],0,',','.'); ?></td>
    <td><?php echo number_format($x['12'],0,',','.'); ?></td>
    <td><?php echo number_format($subTotal,0,',','.'); ?></td>
</tr>
<?php endforeach; ?>
<tr class="item">
	<td>&nbsp;</td>
    <td><?php echo number_format($sub01,0,',','.'); ?></td>
    <td><?php echo number_format($sub02,0,',','.'); ?></td>
    <td><?php echo number_format($sub03,0,',','.'); ?></td>
    <td><?php echo number_format($sub04,0,',','.'); ?></td>
    <td><?php echo number_format($sub05,0,',','.'); ?></td>
    <td><?php echo number_format($sub06,0,',','.'); ?></td>
    <td><?php echo number_format($sub07,0,',','.'); ?></td>
    <td><?php echo number_format($sub08,0,',','.'); ?></td>
    <td><?php echo number_format($sub09,0,',','.'); ?></td>
    <td><?php echo number_format($sub10,0,',','.'); ?></td>
    <td><?php echo number_format($sub11,0,',','.'); ?></td>
    <td><?php echo number_format($sub12,0,',','.'); ?></td>
    <td><?php echo number_format($grandTotal,0,',','.'); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="14">Data tidak ditemukan</td>
</tr>
<?php endif; ?>