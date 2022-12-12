<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['nomor']; ?></td>
        <td><?php echo $x['nama'] ?></td>
        <td class="centerObj"><?php echo ($x['kel']=="L") ? "Laki-Laki" : "Perempuan" ?></td>
        <td class="centerObj"><?php echo $x['lahir'] ?></td>
        <td class="centerObj"><?php echo $x['alamat'] ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn tip-bottom" type="button" onclick="setPasien('<?php echo urlencode($x['nomor']) ?>','<?php echo urlencode($x['nama']) ?>','<?php echo urlencode($x['alamat']) ?>')">
                <i class="icon icon-ok"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="6" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
