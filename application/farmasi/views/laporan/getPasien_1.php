<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['nomr']; ?></td>
        <td><?php echo $x['nama'] ?></td>
        <td class="centerObj"><?php echo ($x['jns_kelamin']=='L') ? "Laki-Laki" : "Perempuan" ?></td>
        <td class="centerObj"><?php echo $x['tgl_lahir'] ?></td>
        <td><?php echo $x['alamat'] ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn tip-bottom" type="button" onclick="setPasien('<?php echo urlencode($x['nomr']) ?>','<?php echo urlencode($x['nama']) ?>')">
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
