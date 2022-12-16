<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
	
	if($x['verifikasi']==1){
		$stat = "Terdaftar";
	}else if($x['verifikasi']==2){
		$stat = "Dibatalkan";
	}else{
		$stat = "Booked";
	}
	 
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['kode_booking']; ?></td>
        <td><?php echo $x['no_ktp']; ?></td>
        <td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['tempat_lahir']." / ".$x['tgl_lahir']; ?></td>
		<td><?php echo $x['jns_kelamin']; ?></td>
        <td><?php echo $x['alamat']; ?></td>
		<td><?php echo $x['no_bpjs']; ?></td>
        <td><?php echo $x['no_telpon']; ?></td>
		<td><?php echo $x['grNama']; ?></td>
		<td><?php echo $x['tgl_booking']; ?></td>
        <td><?php echo $stat; ?></td>
    </tr>
	<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="13" align="left">Data tidak ditemukan</td>
	</tr>
	<?php endif; ?>
