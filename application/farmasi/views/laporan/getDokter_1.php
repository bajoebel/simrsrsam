<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['KDDOKTER']; ?></td>
        <td><?php echo $x['NMDOKTER'] ?></td>
        <td class="centerObj"><?php echo $x['NOTELP'] ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn tip-bottom" type="button" onclick="setDokter('<?php echo urlencode($x['KDDOKTER']) ?>','<?php echo urlencode($x['NMDOKTER']) ?>')">
                <i class="icon icon-ok"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
