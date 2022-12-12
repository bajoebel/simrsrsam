<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['KDMTBHP']; ?></td>
        <td><?php echo date('d-m-Y',strtotime($x['TGL_MUTASI'])) ?></td>
        <td class="centerObj"><?php echo $x['NAMA_LOKASI_ASAL'] ?></td>
        <td class="centerObj"><?php echo $x['NAMA_LOKASI_TUJUAN'] ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn btn-danger" type="button" onclick="setMutasi('<?php echo $x['KDMTBHP'] ?>')">
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
