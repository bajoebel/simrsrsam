<?php 
    $i=1;
    foreach($dataPreview->result_array() as $x): 
?>
<tr>
    <td align="center"><?php echo $i++; ?></td>
    <td><?php echo $x['KDBRG'] ?></td>
    <td><?php echo $x['NMBRG'] ?></td>
    <td align="center"><?php echo $x['JUAL'] ?></td>
</tr>
<?php endforeach; ?>

