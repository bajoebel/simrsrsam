<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['GRLOKASI']; ?></td>
    <td>
        <button class="btn btn-danger" onclick="edit('<?php echo $x['KDGRLOKASI'] ?>','<?php echo $x['GRLOKASI'] ?>')">
            <i class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger" onclick="hapus('<?php echo $x['KDGRLOKASI'] ?>')">
            <i class="fa fa-ban"></i> Hapus</button>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="3" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="3">Data tidak ditemukan</td>
</tr>
<?php endif; ?>