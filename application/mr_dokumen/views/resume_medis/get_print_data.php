<?php 
    if($SQLItem->num_rows() > 0):
        $i = 1;
    foreach($SQLItem->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo getNamaPasienByNoMR($x['nomr']); ?></td>
    <td><?php echo getRuangByRegUnit($x['reg_unit']); ?></td>
    <td style="text-align: center;"><?php echo date('d-m-Y',strtotime($x['tgl_kembali'])); ?></td>
    <td><?php echo $x['keterangan']; ?></td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="5" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="5">Data tidak ditemukan</td>
</tr>
<?php endif; ?>