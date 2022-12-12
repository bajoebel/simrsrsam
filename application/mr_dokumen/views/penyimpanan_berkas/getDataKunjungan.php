<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td class="rataTengah">
        <a href="#" class="btn btn-danger" onclick="pilihKunjungan('<?php echo $x['id_daftar'] ?>','<?php echo $x['nomr'] ?>','<?php echo $x['nama_pasien'] ?>','<?php echo $x['id_ruang'] ?>','<?php echo $x['nama_ruang'] ?>')">
            <i class="fa fa-check"></i> Pilih
        </a>        
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="5" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="5">Data tidak ditemukan</td>
</tr>
<?php endif; ?>