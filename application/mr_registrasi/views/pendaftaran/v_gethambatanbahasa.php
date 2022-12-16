<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
?>
    <tr>
        <td align="center"><?php echo $x['ya']; ?></td>
		<td align="center"><?php echo $x['tidak']; ?></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="2" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
