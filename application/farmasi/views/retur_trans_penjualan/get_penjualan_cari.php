<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerAlign"><?php echo $x['KDJL']; ?></td>
        <td class="centerAlign"><?php echo date('d-m-Y',strtotime($x['TGLJUAL'])); ?></td>
        <td class="centerAlign"><?php echo $x['REG_UNIT']; ?></td>
        <td class="centerAlign"><?php echo $x['ID_DAFTAR']; ?></td>
        <td class="centerAlign"><?php echo $x['NOMR']; ?></td>
        <td><?php echo $x['NMPASIEN'] ?></td>
        <td><?php echo $x['NMRUANGAN'] ?></td>
        <td class="centerAlign">
            <button title="Pilih" class="btn btn-danger" type="button" onclick="setPenjualan('<?php echo $x['KDJL'] ?>')">
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
