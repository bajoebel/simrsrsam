<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['KDBRG']; ?></td>
        <td><?php echo $x['NMBRG'] ?></td>
        <td class="centerObj"><?php echo $x['NMSATUAN'] ?></td>
        <td class="centerObj"><?php echo $x['NMKTBRG'] ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn btn-danger" type="button" onclick="pilihObat('<?php echo $x['KDBRG'] ?>','<?php echo urlencode($x['NMBRG']) ?>')">
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
