<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo $x['tgl_proses']; ?></td>
    <td><?php echo $x['keterangan']; ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="hapusItem('<?php echo $x['idx'] ?>','<?php echo $x['id_penyimpanan_berkas'] ?>')">
            <i class="fa fa-remove"></i>
        </a>        
    </td>
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>