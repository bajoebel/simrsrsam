<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['DTD']; ?></td>
    <td><?php echo $x['Grup_ICD']; ?></td>
    <td><?php echo $x['Morbiditas']; ?></td>
    <td><?php echo ($x['kecelakaan']=='0') ? 'Tidak' : 'Ya'; ?></td>
    <td>
        <button type="button" class="btn btn-primary" onclick="edit('<?php echo $x['DTD'] ?>','<?php echo $x['Grup_ICD'] ?>','<?php echo $x['Morbiditas'] ?>','<?php echo $x['kecelakaan'] ?>')">
            <i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $x['DTD'] ?>')">
            <i class="fa fa-remove"></i></button>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="6" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>