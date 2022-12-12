<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['KDBRG']; ?></td>
        <td><?php echo $x['NMBRG'] ?></td>
        <td class="centerObj"><?php echo $x['NMSATUAN'] ?></td>
        <td class="rightObj"><?php echo number_format($x['SISA'],0) ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn tip-bottom" type="button" onclick="setObat('<?php echo $x['KDBRG'] ?>','<?php echo urlencode($x['NMBRG']) ?>','<?php echo urlencode($x['NMSATUAN']) ?>','<?php echo urlencode(number_format($x['SISA'],0,'','')) ?>')">
                <i class="icon icon-ok"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
