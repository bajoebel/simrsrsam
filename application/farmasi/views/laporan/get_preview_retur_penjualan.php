<?php 
    $i=1;
    $subTotal = 0;
    foreach($dataPreview->result_array() as $x): 
?>
<tr>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo date('d-m-Y',strtotime($x['DTJL_RET'])) ?></td>
    <td><?php echo $x['KDJL_RET'] ?></td>
    <td><?php echo $x['KDBRG'] ?></td>
    <td><?php echo $x['NMBRG'] ?></td>
    <td><?php echo $x['TGLBELI']  ?></td>
    <td align="right"><?php echo number_format($x['JMLRET'],0,',','.')   ?></td>
    <td align="right" style="font-weight: bolder;">Rp. <?php echo number_format($x['HJUAL'],0,',','.') ?></td>
</tr>
<?php endforeach; ?>

