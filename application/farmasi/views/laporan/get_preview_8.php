<?php 
    $i=1;
    $subTotal = 0;
    foreach($dataPreview->result_array() as $x): 
?>
<tr>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo date('d-m-Y',strtotime($x['TGLRESEP'])) ?></td>
    <td><?php echo $x['NOMR'] ?></td>
    <td><?php echo $x['NMPASIEN'] ?></td>
    <td align="center"><?php echo $x['NMJPASIEN'] ?></td>
    <td><?php echo $x['NMDOKTER'] ?></td>
    <td><?php echo $x['NMRUANGAN'] ?></td>
    <td align="right" style="font-weight: bolder;"><?php echo number_format($x['NILAI_R'],2,',','.') ?></td>
	<td align="right" style="font-weight: bolder;"><?php echo number_format($x['Total'],2,',','.') ?></td>
</tr>
<?php 
    $subTotal = $subTotal + ($x['Total']);
	$rTotal = $rTotal + ($x['NILAI_R']);
	$grand = $subTotal + $rTotal;
    endforeach; 
?>
<tr>
    <td colspan="8" align="right">Total</td>
	<td align="right" style="font-weight: bolder;"><?php echo number_format($subTotal,2,',','.') ?></td>
</tr>
<tr>
    <td colspan="8" align="right">R</td>
	<td align="right" style="font-weight: bolder;"><?php echo number_format($rTotal,2,',','.') ?></td>
</tr>
<tr>
    <td colspan="8" align="right">Grand Total</td>
	<td align="right" style="font-weight: bolder;"><?php echo number_format($grand,2,',','.') ?></td>
</tr>
