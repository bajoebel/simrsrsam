<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
	
	$totBARUBPJS = $x['totBARUBPJS'];
	$totBARUUMUM = $x['totBARUUMUM'];
	$totLAMABPJS = $x['totLAMABPJS'];
	$totLAMAUMUM = $x['totLAMAUMUM'];
	
	$totPOLI = $totBARUBPJS + $totBARUUMUM + $totLAMABPJS + $totLAMAUMUM;
	
	$jumBARUBPJS = $jumBARUBPJS + $totBARUBPJS;
	$jumBARUUMUM = $jumBARUUMUM + $totBARUUMUM;
	$jumLAMABPJS = $jumLAMABPJS + $totLAMABPJS;
	$jumLAMAUMUM = $jumLAMAUMUM + $totLAMAUMUM;
	$totSELURUH = $totSELURUH + $totPOLI;
	 
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['grNama']; ?></td>
        <td align="right"><?php echo $totBARUBPJS ?></td>
        <td align="right"><?php echo $totBARUUMUM ?></td>
		<td align="right"><?php echo $totLAMABPJS ?></td>
        <td align="right"><?php echo $totLAMAUMUM ?></td>
		<td align="right"><?php echo $totPOLI ?></td>
    </tr>
<?php endforeach; ?>
	<tr style='font-weight:bold' bgcolor="#CCCCCC">
        <td align="center" colspan="2">JUMLAH</td>
        <td align="right"><?php echo $jumBARUBPJS ?></td>
        <td align="right"><?php echo $jumBARUUMUM ?></td>
		<td align="right"><?php echo $jumLAMABPJS ?></td>
        <td align="right"><?php echo $jumLAMAUMUM ?></td>
		<td align="right"><?php echo $totSELURUH ?></td>
    </tr>

<?php else: ?>
<tr>
    <td colspan="7" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
