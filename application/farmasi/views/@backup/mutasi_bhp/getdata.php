<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['DTMTBHP'] ?></td>
        <td class="centerObj"><?php echo $x['KDMTBHP'] ?></td>
        <td class="centerObj"><?php echo $x['NMLOKASI_ASAL'] ?></td>
        <td class="centerObj"><?php echo $x['NMLOKASI_TUJUAN'] ?></td>
        <td class="centerObj"><?php echo $x['KETMTBHP'] ?></td>
        <td class="centerObj">
            <button class="btn" type="button" onclick="cetak('<?php echo $x['KDMTBHP'] ?>')">
                <i class="icon icon-print"></i> Cetak</button>
        </td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="6" class="rightObj"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
