<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['provinsi']; ?></td>
    <td><?php echo $x['kabkota'] ." " .$x["nama_kabkota"]; ?></td>
    <td><?php echo $x['kecamatan']; ?></td>
    <td><?php echo $x['desa']; ?></td>
    <td style="text-align: center;">
        <a href="Javascript:edit('<?php echo $x['wilayah_id'] ?>','<?php echo $x['provinsi'] ?>','<?php echo $x['kabkota'] ?>','<?php echo $x['nama_kabkota'] ?>','<?php echo $x['kecamatan'] ?>','<?php echo $x['desa'] ?>')" class="btn btn-danger">
            <i class="fa fa-edit"></i> Edit</a>
        <a href="Javascript:hapus('<?php echo $x['wilayah_id'] ?>')" class="btn btn-danger">
            <i class="fa fa-remove"></i> Hapus</a>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="2" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="2">Data tidak ditemukan</td>
</tr>
<?php endif; ?>