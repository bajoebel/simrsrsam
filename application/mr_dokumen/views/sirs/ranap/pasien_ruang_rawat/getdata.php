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
    	$subTotal = 0;
    	$grandTotal = 0;
        foreach($SQL->result_array() as $x): 
        	$sub01 = $sub01 + $x['KU_L'];
        	$sub02 = $sub02 + $x['KU_P'];
        	$sub03 = $sub03 + $x['K3_L'];
        	$sub04 = $sub04 + $x['K3_P'];
        	$sub05 = $sub05 + $x['K2_L'];
        	$sub06 = $sub06 + $x['K2_P'];
        	$sub07 = $sub07 + $x['K1_L'];
        	$sub08 = $sub08 + $x['K1_P'];
        	$subTotal = $x['KU_L']+$x['KU_P']+$x['K3_L']+$x['K3_P']+$x['K2_L']+$x['K1_L']+$x['K1_P'];
        	$grandTotal = $grandTotal + $subTotal;
?>
<tr class="item">
    <td class="desk"><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo $x['KU_L']; ?></td>
    <td><?php echo $x['KU_P']; ?></td>
    <td><?php echo $x['K3_L']; ?></td>
    <td><?php echo $x['K3_P']; ?></td>
    <td><?php echo $x['K2_L']; ?></td>
    <td><?php echo $x['K2_P']; ?></td>
    <td><?php echo $x['K1_L']; ?></td>
    <td><?php echo $x['K1_P']; ?></td>
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
    <td><?php echo $grandTotal; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="10">Data tidak ditemukan</td>
</tr>
<?php endif; ?>