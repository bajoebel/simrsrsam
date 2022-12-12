<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['tgl_masuk'])); ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo $x['cara_bayar']; ?></td>
    <td><?php echo $x['user_daftar']; ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="daftar_rawat_inap('<?php echo $x['reg_unit']; ?>')">
            <i class="fa fa-check"></i> Pilih</a>        
    </td>
</tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>