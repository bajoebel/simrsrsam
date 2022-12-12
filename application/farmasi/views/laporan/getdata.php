<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['KDJL'] ?></td>
        <td class="centerObj"><?php echo $x['NOMR'] ?></td>
        <td class="centerObj"><?php echo $x['NMPASIEN'] ?></td>
		<td class="centerObj"><?php echo $x['TGLRESEP'] ?></td>
        <td class="centerObj"><?php echo $x['KDBRG'] ?></td>
        <td class="centerObj"><?php echo $x['NMBRG'] ?></td>
        <td class="centerObj"><?php echo $x['SISA'] ?></td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="9" class="rightObj"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
