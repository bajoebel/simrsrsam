<?php 
    if($SQL->num_rows() > 0):
        $i = 1+$offset;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['NRP']; ?></td>
    <td><?php echo $x['pgwNama']; ?></td>
    <td><?php echo ($x['pgwJenkel']=="1") ? "Pria" : "Wanita"; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['pgwTglLahir'])); ?></td>
    <td><?php echo $x['profesi']; ?></td>
    <td><?php echo $x['pgwAlmt']; ?></td>
    <td><?php echo $x['pgwTelp']; ?></td>
    <td>
        <a href="#" class="btn btn-danger <?php echo ($x['NRP']=='NRP1810001') ? 'disabled' : ''; ?>" onclick="resetAdminApp('<?php echo $x['NRP'] ?>')">
            <i class="fa fa-user"></i> Reset Password
        </a>
        <a href="#" class="btn btn-danger <?php echo ($x['NRP']=='NRP1810001') ? 'disabled' : ''; ?>" onclick="edit('<?php echo $x['NRP'] ?>')">
            <i class="fa fa-edit"></i> Edit
        </a>        
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