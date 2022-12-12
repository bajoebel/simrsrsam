<?php 
    if($SQLItem->num_rows() > 0):
        $i = 1;
    foreach($SQLItem->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td style="text-align: center;"><?php echo date('d-m-Y',strtotime($x['tgl_kembali'])); ?></td>
    <td><?php echo $x['keterangan']; ?></td>
</tr>
<?php endforeach;?>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>