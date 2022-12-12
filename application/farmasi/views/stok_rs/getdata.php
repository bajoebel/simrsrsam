<?php 
    if($SQL->num_rows() > 0):
    $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
    <tr class="odd">
        <td class="centerObj"><?php echo $i++; ?></td>
        <td><?php echo $x['NMBRG'] ?></td>
        <td class="centerObj" style="font-weight: bolder;"><?php echo $x['KDBRG'] ?></td>
        <td><?php echo $x['JENISBRG'] ?></td>
        <td class="centerObj"><?php echo $x['NMKTBRG'] ?></td>
        <td class="centerObj"><?php echo $x['NMSATUAN'] ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="rightObj" style="font-weight: bolder;"><?php echo number_format($x['JMLSTOK'],0,',','.') ?></td>
    </tr>
<?php 
    foreach($SQLDetail->result_array() as $y):
    if($x['KDBRG']==$y['KDBRG']):
?>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php echo $y['NMLOKASI'] ?></td>
        <td class="rightObj"><?php echo number_format($y['JSTOK'],0,',','.') ?></td>
        <td>&nbsp;</td>
    </tr>
<?php 
        endif;
        endforeach;
    endforeach;
?>
<tr>
    <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
