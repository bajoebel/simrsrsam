<?php 
    if($SQL->num_rows() > 0):
    	$sub01 = 0;
    	$sub02 = 0;
    	$sub03 = 0;
    	$sub04 = 0;
    	$grandTotal = 0;
        foreach($SQL->result_array() as $x): 
        	$sub01 = $sub01 + $x['Pria'];
        	$sub02 = $sub02 + $x['Wanita'];
        	$sub03 = $sub03 + $x['Kasus_Baru'];
        	$sub04 = $sub04 + $x['Kasus_Lama'];
        	$grandTotal = $grandTotal + $x['num_kunjungan'];
?>
<tr class="item">
    <td class="desk"><?php echo $x['kode_icd']; ?></td>
    <td class="desk"><?php echo $x['icd']; ?></td>
    <td><?php echo number_format($x['Pria'],0,',','.'); ?></td>
    <td><?php echo number_format($x['Wanita'],0,',','.'); ?></td>
    <td><?php echo number_format($x['Kasus_Baru'],0,',','.'); ?></td>
    <td><?php echo number_format($x['Kasus_Lama'],0,',','.'); ?></td>
    <td><?php echo number_format($x['num_kunjungan'],0,',','.'); ?></td>
</tr>
<?php endforeach; ?>
<tr class="item">
	<td colspan="2">&nbsp;</td>
    <td><?php echo number_format($sub01,0,',','.'); ?></td>
    <td><?php echo number_format($sub02,0,',','.'); ?></td>
    <td><?php echo number_format($sub03,0,',','.'); ?></td>
    <td><?php echo number_format($sub04,0,',','.'); ?></td>
    <td><?php echo number_format($grandTotal,0,',','.'); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>