<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['idx']; ?></td>
    <td><?php echo $x['tanggal']; ?></td>
    <td><?php echo getNamaUserByID($x['userID']); ?></td>
    <td><?php echo $x['jmlDokumen']; ?></td>
    <td>
        <a href="Javascript:edit('<?php echo $x['idx'] ?>')" class="btn btn-danger">
            <i class="fa fa-edit"></i> Edit</a>
        <a href="Javascript:hapus('<?php echo $x['idx'] ?>')" class="btn btn-danger">
            <i class="fa fa-ban"></i> Batal</a>
        <a href="Javascript:cetakNota('<?php echo $x['idx'] ?>')" class="btn btn-danger">
            <i class="fa fa-print"></i> Cetak</a>
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