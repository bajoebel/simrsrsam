<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td><?php echo $x['NMBRG'] ?></td>
        <td class="centerObj"><?php echo $x['NMSATUAN'] ?></td>
        <td class="rightObj"><?php echo number_format($x['JMLMTBHP'],0) ?></td>
        <td class="rightObj"><?php echo number_format($x['JMLRET'],0) ?></td>
        <td class="centerObj">
            <button class="btn" type="button" onclick="hapusTemp('<?php echo $x['IDX'] ?>')">
                <i class="icon icon-remove"></i> Delete</button>
        </td>
    </tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="5">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
