<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td><?php echo $x['NMBRG'] ?></td>
        <td class="centerAlign"><?php echo setDateInd($x['EXPDATE']) ?></td>
        <td class="rightAlign"><?php echo number_format($x['HBELI'],2,',','.') ?></td>
        <td class="rightAlign"><?php echo number_format($x['JMLBELI'],0,',','.') ?></td>
        <td class="rightAlign"><?php echo number_format($x['HDISKON'],2,',','.') ?></td>
        <td class="rightAlign"><?php echo number_format($x['SUBTOTAL'],2,',','.') ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger btn-xs" type="button" onclick="hapusTemp('<?php echo $x['IDX'] ?>')">
                <i class="fa fa-remove"></i></button>
        </td>
    </tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
