<?php 
	$start=0;
	foreach ($data as $d) {
	    $start++;
		$unikID=encrypt_decrypt('encrypt',$d->reg_unit,true);
	    ?>
	    <tr>
	        <td><?php echo $start ; ?></td>
	        <td><?php echo $d->nomr; ?></td>
	        <td><?php echo $d->id_daftar; ?></td>
	        <td><?php echo $d->no_ktp; ?></td>
	        <td><?php echo $d->nama_pasien; ?></td>
	        
	        <td><?php echo $d->nama_ruang; ?></td>
	        <td><?php echo $d->tgl_masuk ." - " .$d->tgl_daftar; ?></td>
	        <td><?php echo $d->rujukan; ?></td>
	        <td><?php echo $d->namaDokterJaga; ?></td>
	        
	        <td><?php echo $d->cara_bayar; ?></td>
	        <td><?php echo $d->no_bpjs; ?></td>
			<td>
			<a href="<?= base_url() ."mr_registrasi.php/registrasi/reg_success?uid=".$unikID?>" class="btn btn-success btn-sm"><span class="fa fa-list"></span> Detail</a>
			</td>
        </tr>
	    <?php
	}
?>