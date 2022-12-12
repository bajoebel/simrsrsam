<?php 
    if($SQL->num_rows() > 0):
    $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerAlign"><?php echo $i++; ?></td>
        <td><?php echo $x['NMBRG'] ?></td>
        <td style="font-weight: bolder;"><?php echo $x['KDBRG'] ?></td>
        <td><?php echo $x['NMSATUAN'] ?></td>
        <td class="rightAlign"><?php echo number_format($x['JSTOK'],0,',','.') ?></td>
        <td><?php echo $x['NMLOKASI'] ?></td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="6" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
