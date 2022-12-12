<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['NRP']; ?></td>
    <td><?php echo $x['pgwNama']; ?></td>
    <td><?php echo $x['ruang']; ?></td>
    <td>
    <?php 
        foreach ($level as $l ) {
        ?>
        <input type="radio" name="level<?= $i ?>" id="level<?= $l->idx ?>" <?php if($x['levelid']==$l->idx) echo "checked"; ?> onclick="setLevelNota('<?= $x['NRP'] ?>',<?= $i ?>)"> <?= $l->level ."<br>"; ?>
        <?php
        }
    ?>
    </td>
    <td>
        <a href="#" class="btn btn-danger <?php echo ($x['NRP']=='NRP1910460') ? 'disabled' : ''; ?>" onclick="deleteNotaTagihanApp('<?php echo $x['NRP'] ?>')">
            <i class="fa fa-remove"></i> Hapus
        </a>
        <a href="#" class="btn btn-danger <?php echo ($x['NRP']=='NRP1910460') ? '' : ''; ?>" onclick="getRuang('<?php echo $x['NRP'] ?>')">
            <i class="fa fa-edit"></i> Pilih Ruang Akses
        </a>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="6" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="5">Data tidak ditemukan</td>
</tr>
<?php endif; ?>