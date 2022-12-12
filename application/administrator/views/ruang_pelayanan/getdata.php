<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['ruang']; ?></td>
    <td><?php echo $x['grNama']; ?></td>
    <!--td><?php //echo (($x['grid']=="2") ? "Kelas " : null) . $x['kelas_layanan'] ?></td>
    <td><?php //echo $x['jmlTT']; ?></td-->
    <td><?php if($x["status_ruang"]==1) echo "<span class='btn btn-success '>Aktif</span>"; else echo "<span class='btn btn-danger '>Non Aktif</span>"; ?></td>
    <td>
        <?php 
        if($x["grid"]==2){
            ?>
            <button type="button" class="btn btn-danger" onclick="kamar('<?php echo $x['idx'] ?>')">
            <i class="fa fa-bed"></i></button>
            <?php
        }
        ?>
        <button type="button" class="btn btn-danger" onclick="edit('<?php echo $x['idx'] ?>')">
            <i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $x['idx'] ?>')">
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