<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerAlign"><?php echo $x['KDBKK']; ?></td>
        <td><?php echo $x['DTBKK'] ?></td>
        <td><?php echo $x['NMREKANAN'] ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger" type="button" onclick="setBKK('<?php echo $x['KDBKK'] ?>')" title="Pilih" >
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
