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
        <td class="centerObj">
        <?php 
            $ap = explode(",",$x['AP']); 
            if(@$ap[0] == "1"):
                echo @$ap[1] . "," . @$ap[2] . "," . @$ap[3] . "," . @$ap[4] . "," . @$ap[5];
            elseif(@$ap[0] == "2"):
                echo @$ap[1] . "," . @$ap[2];
            elseif(@$ap[0] == "3"):
                echo @$ap[1]; 
            endif; ?>
        </td>
        <td><?php echo ($x['KRONIS']=="1") ? "Kronis" : "Non Kronis" ?></td>
        <td class="centerObj">
            <button class="btn" type="button" onclick="hapusTemp('<?php echo $x['IDX'] ?>')">
                <i class="icon icon-remove"></i> Delete</button>
        </td>
    </tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
