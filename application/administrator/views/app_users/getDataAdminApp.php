<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['NRP']; ?></td>
    <td><?php echo $x['pgwNama']; ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="resetAdminApp('<?php echo $x['NRP'] ?>')">
            <i class="fa fa-user"></i> Reset Password
        </a>
        <a href="#" class="btn btn-danger" onclick="deleteAdminApp('<?php echo $x['idx'] ?>')">
            <i class="fa fa-remove"></i> Hapus
        </a>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="4" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="4">Data tidak ditemukan</td>
</tr>
<?php endif; ?>