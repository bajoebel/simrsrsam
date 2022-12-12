<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['NRP']; ?></td>
    <td><?php echo $x['pgwNama']; ?></td>
    <td><?php echo ($x['pgwJenkel']=="1") ? "Pria" : "Wanita"; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['pgwTglLahir'])); ?></td>
    <td><?php echo $x['profesi']; ?></td>
    <td>
        <a href="#" class="btn btn-primary" onclick="pilihAdminApp('<?php echo $x['NRP'] ?>')">
            <i class="fa fa-check"></i>
        </a>
    </td>
</tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>