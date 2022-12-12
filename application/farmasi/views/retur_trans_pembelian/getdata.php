<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['KDBL']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['DTBL_RET'])); ?></td>
    <td><?php echo $x['ALASAN']; ?></td>
    <td><?php echo $x['UEXEC']; ?></td>    
    <td>
        <button class="btn btn-danger" onclick="cetak('<?php echo $x['KDBL_RET'] ?>')" title="Print Data">
            <i class="fa fa-print"></i></button>
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