<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
	
	$lahir=new DateTime($x['tgl_lahir']);
	$today =new DateTime();
	
	$umur=$today->diff($lahir);
	$umurpasien =$umur->y." Th, ".$umur->m." Bln";
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['nomr']; ?></td>
        <td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['no_telpon']; ?></td>
        <td><?php echo $x['jenis_penyakit']; ?></td>
		<td><?php echo $umurpasien; ?></td>
		<td><?php echo $x['tgl']; ?></td>
        <td><?php echo $x['nama_dokter']; ?></td>
		<td><?php echo $x['grNama']; ?></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="7" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
