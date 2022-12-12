<?php 
    $i=1;
    $subTotal = 0;
    foreach($dataPreview->result_array() as $x): 
?>
<tr>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo date('d-m-Y',strtotime($x['TGLSA'])) ?></td>
    <td><?php echo $x['NOSA'] ?></td>
    <td><?php echo $x['KDBRG'] ?></td>
    <td><?php echo $x['NMBRG'] ?></td>
    <td><?php echo $x['NMSATUAN'] ?></td>
    <td><?php echo $x['NMGRBRG'] ?></td>
    <td><?php echo $x['NMLOKASI'] ?></td>
    <td align="right" style="font-weight: bolder;"><?php echo number_format($x['JMLSTOK'],0,',','.') ?></td>
</tr>
<?php endforeach; ?>

