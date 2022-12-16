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
	
	if($x['cara_berobat']==1){
		$cara = "UMUM";
	}else if($x['cara_berobat']==2){
		$cara = "BPJS";
	}else{
		$cara = "-";
	}
	 
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['kode_booking']; ?></td>
		<td><?php echo $cara; ?></td>
        <td><?php echo $x['nomr']; ?></td>
        <td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['no_bpjs']; ?></td>
		<td><?php echo $x['no_rujukan']; ?></td>
		<td><?php echo $x['tgl_kontrol']; ?></td>
		<td><?php echo $x['nohp']; ?></td>
		<td><?php echo $x['grNama']; ?></td>
        <td><?php echo $x['tgl_booking']; ?></td>
		<td><?php echo $stat; ?></td>
		<td><?php echo $x['alasan_batal']; ?></td>
    </tr>
	<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="13" align="left">Data tidak ditemukan</td>
	</tr>
	<?php endif; ?>
