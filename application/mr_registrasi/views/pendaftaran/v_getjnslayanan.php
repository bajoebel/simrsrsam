<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
	
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['id_daftar']; ?></td>
        <td><?php echo $x['nomr']; ?></td>
        <td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['grNama']; ?></td>
		<td><?php echo $x['tgl_reg']; ?></td>
		<td><?php echo $x['nama_lengkap']; ?></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="7" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
