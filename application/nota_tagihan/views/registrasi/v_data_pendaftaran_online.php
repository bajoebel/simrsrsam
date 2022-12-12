<?php 
	$start=0;
	foreach ($data as $d) {
	    $start++;
	    ?>
	    <tr>
	        <td><?php echo $start ; ?></td>
	        <td><?php if(!empty($d->daftar_nomr)) echo $d->daftar_nomr; else echo "Pasien Baru"; ?></td>
	        <td><?php echo $d->no_ktp; ?></td>
	        <td><?php echo $d->nama; ?></td>
	        
	        <td><?php echo $d->poly_nama; ?></td>
	        <td><?php echo $d->daftar_tglkunjungan; ?></td>
	        <td><?php echo $d->rujukan; ?></td>
	        <td><?php if(!empty($d->KodeLoket)) echo $d->KodeLoket ."." .$d->antrian_loket; else echo "-"
	        ?></td>
	        <td><?php echo $d->daftar_antrian_poly; ?></td>
	        <td><?php echo $d->dokter_nama; ?></td>
	        
	        <td><?php echo $d->cara_bayar; ?></td>
	        <td><?php echo $d->daftar_tgl; ?></td>
	        <td><?php echo $d->no_bpjs; ?></td>
	        <td><?php if($d->daftar_aprove==0) echo "<a href='".base_url() ."mr_registrasi.php/online/pendaftaran/".$d->daftar_id."' class='btn btn-danger btn-xs' >Aprove</button>"; else echo "<button class='btn btn-success btn-xs'><span class='fa fa-check'></span></button>"; ?></td>
	    </tr>
	    <?php
	}
?>