<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['no_kwitansi']; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['no_bpjs']; ?></td>
    <td><?php echo $x['no_sep']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['tgl_lahir']; ?></td>
    <td><?php echo ($x['jns_kelamin']==0) ? 'Perempuan' : 'Laki-Laki'; ?></td>
    <td>
        <a href="Javascript:cekSEP('<?php echo $x['no_sep'] ?>','<?php echo $x['no_bpjs'] ?>','<?php echo $x['nomr'] ?>','<?php echo $x['no_kwitansi'] ?>')" class="btn btn-danger">
            <i class="fa fa-check"></i></a>
    </td>
</tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>