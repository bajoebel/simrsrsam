<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td><?php echo $x['NMBRG'] ?></td>
        <td class="centerAlign"><?php echo $x['NMSATUAN'] ?></td>
        <td class="rightAlign"><?php echo number_format($x['HJUAL'],0) ?></td>
        <td class="rightAlign"><?php echo number_format($x['JMLJUAL'],0) ?></td>
        <td class="rightAlign"><?php echo number_format($x['JMLRET'],0) ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger" type="button" onclick="hapusTemp('<?php echo $x['IDX'] ?>')">
                <i class="fa fa-remove"></i></button>
        </td>
    </tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
