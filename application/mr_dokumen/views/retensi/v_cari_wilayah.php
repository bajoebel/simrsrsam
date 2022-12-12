<?php 
	$no=0;
	foreach ($wilayah as $p) {
		$no++;
		?>
		<tr onclick="set_wilayah('<?php echo $p->provinsi; ?>','<?php echo $p->kabkota ." " .$p->nama_kabkota; ?>','<?php echo $p->kecamatan; ?>','<?php echo $p->desa; ?>','<?php echo $p->wilayah_id ?>')">
			
			<td><?php echo $p->desa; ?></td>
			<td><?php echo $p->kecamatan; ?></td>
			<td><?php echo $p->kabkota ." " .$p->nama_kabkota; ?></td>
			<td><?php echo $p->provinsi; ?></td>
			<td style="text-align: right;"><button class="btn btn-primary btn-xs" id='idx_wilayah<?php echo $no ?>' onclick="set_wilayah('<?php echo $p->provinsi; ?>','<?php echo $p->kabkota ." " .$p->nama_kabkota; ?>','<?php echo $p->kecamatan; ?>','<?php echo $p->desa; ?>','<?php echo $p->wilayah_id ?>')" type="button"><span class="fa fa-check"></span></button></td>
		</tr>
		<?php
	}
?>