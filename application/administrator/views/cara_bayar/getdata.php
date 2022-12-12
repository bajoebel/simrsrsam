<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['cara_bayar']; ?></td>
    <td><?php if($x['jkn']=='0') echo "Umum"; elseif($x['jkn'] == '1') echo "JKN"; else echo "Asuransi Lain" ?></td>
    <td>
        <!--Silahkan hubungi administrator -->
        <button type="button" class="btn btn-primary" onclick="edit('<?php echo $x['idx'] ?>','<?php echo $x['cara_bayar'] ?>','<?= $x['jkn'] ?>')">
            <i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $x['idx'] ?>')">
            <i class="fa fa-remove"></i></button>
        
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