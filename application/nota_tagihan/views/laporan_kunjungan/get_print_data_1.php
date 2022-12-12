<?php 
    if($SQLItem->num_rows() > 0):
        $i = 1;
    foreach($SQLItem->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_reg'])); ?></td>
    <td><?php echo getRuangByID($x['id_ruang']); ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo getNamaPasienByNomr($x['nomr']); ?></td>
    <td><?php echo ($x['tgl_pulang'] == "") ? "" : date('d-m-Y',strtotime($x['tgl_pulang'])); ?></td>>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="8" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>