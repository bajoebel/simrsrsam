<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo $x['id_daftar']; ?></td>
        <td class="centerObj"><?php echo date('d-m-Y',strtotime($x['tgl_masuk'])); ?></td>
        <td class="centerObj"><?php echo $x['nomr']; ?></td>
        <td><?php echo $x['nama_pasien'] ?></td>
        <td class="centerObj"><?php echo ($x['jns_kelamin']=="1") ? "Laki-Laki" : "Perempuan" ?></td>
        <td class="centerObj"><?php echo date('d-m-Y',strtotime($x['tgl_lahir'])) ?></td>
        <td class="centerObj">
            <button title="Pilih" class="btn btn-danger" type="button" onclick="setPasien('<?php echo $x['id_daftar'] ?>','<?php echo $x['nomr'] ?>','<?php echo urlencode($x['nama_pasien']) ?>','<?php echo urlencode($x['jns_kelamin']) ?>','<?php echo urlencode(setDateInd($x['tgl_lahir'])) ?>','<?php echo urlencode(getUmur($x['tgl_lahir'])) ?>')">
                <i class="fa fa-check"></i></button>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="8" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
