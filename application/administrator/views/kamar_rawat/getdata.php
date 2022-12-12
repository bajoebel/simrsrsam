<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['nama_kamar']; ?></td>
    <td><?php echo $x['kelas_layanan']; ?></td>
    <td><?php echo $x['ruang']; ?></td>
    <td><?php echo $x['jmlRusak'] + $x['jmlKosong'] + $x['jmlTerisi']; ?></td>
    <td><?php echo $x['jmlRusak']; ?></td>
    <td><?php echo $x['jmlKosong'] + $x['jmlTerisi']; ?></td>
    <td><?php echo $x['jmlKosong']; ?></td>
    <td><?php echo $x['jmlTerisi']; ?></td>
    <td>
        <button type="button" class="btn btn-warning" onclick="set_bed('<?php echo $x['idx'] ?>','<?php echo $x['nama_kamar'] ?>')">
            <i class="fa fa-bed"></i></button>
        <button type="button" class="btn btn-primary" onclick="edit('<?php echo $x['idx'] ?>','<?php echo $x['nama_kamar'] ?>','<?php echo $x['id_kelas'] ?>','<?php echo $x['id_ruang'] ?>')">
            <i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $x['idx'] ?>')">
            <i class="fa fa-remove"></i></button>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>