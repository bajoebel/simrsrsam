<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['nama_etnis']; ?></td>
		<td align="center"><?php echo $x['jumlah']; ?></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="3" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
