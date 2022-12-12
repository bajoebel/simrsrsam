<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['DTJL_RET'] ?></td>
        <td class="centerObj"><?php echo $x['KDJL_RET'] ?></td>
        <td class="centerObj"><?php echo $x['NOMR'] ?></td>
        <td class="centerObj"><?php echo $x['NMPASIEN'] ?></td>
        <td class="centerObj"><?php echo $x['NMPELAYANAN'] ?></td>
        <td class="centerObj"><?php echo $x['NMRUANGAN'] ?></td>
        <td class="centerObj"><?php echo $x['NMLOKASI'] ?></td>
        <td class="centerObj">
            <button class="btn" type="button" onclick="cetak('<?php echo $x['KDJL_RET'] ?>')">
                <i class="icon icon-print"></i> Cetak</button>
        </td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="8" class="rightObj"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
