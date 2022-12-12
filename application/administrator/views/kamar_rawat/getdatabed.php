<?php 
    if($SQL_Bed->num_rows() > 0):
        $i = 1;
    foreach($SQL_Bed->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['nomor_bed']; ?></td>
    <td><?php echo $x['status_bed']; ?></td>
    <td>
        <?php if($x['status_bed'] <> "Terisi"): ?>
        <a href="#" class="btn btn-primary" onclick="hapusBed('<?php echo $x['idx'] ?>')"> 
            <i class="fa fa-remove"></i> </a>
        <?php 
            else:
                echo "<a href='#' class='btn btn-primary' disabled=''><i class='fa fa-remove'></i> </a>";
            endif;
        ?>
    </td>
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="4">Data tidak ditemukan</td>
</tr>
<?php endif; ?>