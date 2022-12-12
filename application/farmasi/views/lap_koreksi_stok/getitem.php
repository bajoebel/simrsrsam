
<?php 
    $i=0;
    foreach($dataPreview->result_array() as $x): 
        $i++;
?>
<tr>
<td><?php echo $i; ?></td>
    <td><?php echo $x['NMLOKASI']; ?></td>
    <td><?php echo $x['TGLKOREKSI']; ?></td>
    <td><?php echo $x['KDBRG']; ?></td>
    <td><?php echo $x['NMBRG']; ?></td>
    <td><?php echo $x['JMLSTOK_DIKOREKSI']; ?></td>
    <td><?php echo $x['JMLKOREKSI']; ?></td>
    <td><?php echo $x['JMLREAL']; ?></td>
    <td><?php echo $x['NOBUKTI']; ?></td>
    <td><?php echo $x['ALASAN']; ?></td>
</tr>
<?php 
    endforeach; 
?>