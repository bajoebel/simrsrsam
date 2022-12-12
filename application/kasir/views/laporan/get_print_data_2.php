<?php 
    if($SQLItem->num_rows() > 0):
        $i = 1;
        $subTotal = 0;
    foreach($SQLItem->result_array() as $x): 
        $subTotal = $subTotal + $x['grand_total'];
?>
<tr>
    <td style="text-align: center;"><?php echo $i++; ?></td>
    <td style="text-align: center;"><?php echo $x['no_kwitansi']; ?></td>
    <td style="text-align: center;"><?php echo date('d-m-Y',strtotime($x['tgl_kwitansi'])); ?></td>
    <td style="text-align: center;"><?php echo $x['id_daftar']; ?></td>
    <td style="text-align: center;"><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['cara_bayar']; ?></td>
    <td><?php echo $x['nama_dpjp']; ?></td>
    <td style="text-align: right;"><?php echo number_format($x['grand_total'],0,',','.'); ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <td colspan="8" style="text-align: right;font-weight: 500;">Total</td>
    <td style="text-align: right;"><?php echo number_format($subTotal,0,',','.'); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>