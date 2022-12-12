<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td><?php echo $x['KDBRG']; ?></td>
        <td><?php echo $x['NMBRG'] ?></td>
        <td><?php echo getSatuanObatById($x['KDBRG']) ?></td>
        <td class="rightAlign"><?php echo number_format($x['SISA'],0,',','.') ?></td>
        <td class="rightAlign"><?php echo number_format($x['HJUAL'],0,',','.') ?></td>
        <td class="centerAlign">
            <button title="Pilih" class="btn btn-danger" type="button" onclick="pilihObat('<?php echo $x['KDBRG'] ?>','<?php echo urlencode($x['NMBRG']) ?>','<?php echo getSatuanObatById($x['KDBRG']) ?>','<?php echo urlencode($x['HJUAL']) ?>','<?php echo urlencode($x['SISA']) ?>')">
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="6" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
