<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td colspan="2"><?php echo $x['NMBRG'] ?></td>
        <td class="rightObj"><?php echo number_format($x['HJUAL'],2,',','.') ?></td>
        <td class="centerObj"><?php echo number_format($x['JMLJUAL'],0) ?></td>
        <td class="rightObj"><?php echo number_format($x['DISKON'],2,',','.') ?></td>
        <td class="rightObj"><?php echo number_format($x['SUBTOTAL'],2,',','.') ?></td>
        <td class="centerObj"><?php echo $x['PAKAI'] ?></td>
        <td><?php echo $x['AP'] ?></td>
        <td><?php echo ($x['KRONIS']=="1") ? "Kronis" : "Non Kronis" ?></td>
        <td class="centerObj">
            <button class="btn" type="button" onclick="hapusTemp('<?php echo $x['KDJL'] ?>','<?php echo $x['KDBRG'] ?>')">
                <i class="icon icon-remove"></i> Delete</button>
        </td>
    </tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="10">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
