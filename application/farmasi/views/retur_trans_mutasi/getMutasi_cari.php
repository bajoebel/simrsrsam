<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerAlign"><?php echo $x['KDMT']; ?></td>
        <td><?php echo $x['DTMT'] ?></td>
        <td class="centerAlign"><?php echo $x['NAMA_LOKASI_ASAL'] ?></td>
        <td class="centerAlign"><?php echo $x['NAMA_LOKASI_TUJUAN'] ?></td>
        <td class="centerAlign">
            <button title="Pilih" class="btn btn-danger" type="button" onclick="setMutasi('<?php echo $x['KDMT'] ?>')">
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php   
        endforeach; 
    else: 
?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php 
    endif; 
?>
