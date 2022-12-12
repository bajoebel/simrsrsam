<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?= $i++; ?></td>
    <td><?= $x['NRP']; ?></td>
    <td><?= $x['pgwNama']; ?></td>
    <td><?= $x['ruang']; ?></td>
    <td><?= ($x['isDokter']=="0") ? "Perawat/Bidan" : "Dokter"; ?></td>
    <td style="text-align: center;">
        <a href="Javascript:edit('<?= $x['id'] ?>','<?= $x['NRP'] ?>','<?= $x['idruang'] ?>','<?= $x['isDokter'] ?>')" class="btn btn-danger">
            <i class="fa fa-edit"></i> 
        </a>
        <a href="Javascript:hapus('<?= $x['id'] ?>')" class="btn btn-danger">
            <i class="fa fa-remove"></i> 
        </a>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="6" style="text-align: right"><?= $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>