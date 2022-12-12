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
    <td><?php echo $x['01']; ?></td>
    <td><?php echo $x['02']; ?></td>
    <td><?php echo $x['03']; ?></td>
    <td><?php echo $x['04']; ?></td>
    <td><?php echo $x['05']; ?></td>
    <td><?php echo $x['06']; ?></td>
    <td><?php echo $x['07']; ?></td>
    <td><?php echo $x['08']; ?></td>
    <td><?php echo $x['09']; ?></td>
    <td><?php echo $x['10']; ?></td>
    <td><?php echo $x['11']; ?></td>
    <td><?php echo $x['12']; ?></td>
    <td><?php echo $subTotal; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item">
	<td>&nbsp;</td>
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
<?php else: ?>
<tr>
    <td colspan="14">Data tidak ditemukan</td>
</tr>
<?php endif; ?>