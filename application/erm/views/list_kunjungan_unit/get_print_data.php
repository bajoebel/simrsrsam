<?php 
    if($SQLItem->num_rows() > 0):
        $i = 1;
    foreach($SQLItem->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_masuk'])); ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_keluar'])); ?></td>
</tr>
<?php 
    endforeach;
    else: 
?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>