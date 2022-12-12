<?php 
	foreach ($pasien as $p) {
		?>
		<tr onclick="get_pasien('<?php echo $p->nomr; ?>')">
			<td><?php echo $p->no_ktp; ?></td>
			<td><?php echo $p->nama; ?></td>
			<td><?php echo $p->tempat_lahir ." / " . $p->tgl_lahir; ?></td>
			<td><?php echo $p->jns_kelamin; ?></td>
			<td><?php echo $p->alamat; ?></td>
			<td style="text-align: right;"><button class="btn btn-primary btn-sm" onclick="get_pasien('<?php echo $p->nomr; ?>')"><span class="fa fa-check"></span></button></td>
		</tr>
		<?php
	}
?>