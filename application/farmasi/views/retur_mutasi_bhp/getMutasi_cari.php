<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['KDMTBHP']; ?></td>
        <td><?php echo $x['DTMTBHP'] ?></td>
        <td class="centerObj"><?php echo $x['NMLOKASI_ASAL'] ?></td>
        <td class="centerObj"><?php echo $x['NMLOKASI_TUJUAN'] ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn tip-bottom" type="button" onclick="setMutasi('<?php echo $x['KDMTBHP'] ?>')">
                <i class="icon icon-ok"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
