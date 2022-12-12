<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['KDBRG']; ?></td>
            <td><?php echo $x['NMBRG']; ?></td>
            <td><?php echo $x['NMGENERIK']; ?></td>
            <td><?php echo $x['NMSATUAN']; ?></td>
            <td><?php echo $x['NMKTBRG']; ?></td>
            <td><?php echo $x['JENISBRG']; ?></td>
            <td class="rightAlign"><?php echo number_format($x['HJUAL'], 0, ',', '.'); ?></td>
            <td>
                <button class="btn btn-danger" onclick="edit('<?php echo $x['KDBRG'] ?>')" title="Edit Data">
                    <i class="fa fa-edit"></i></button>
                <button class="btn btn-danger" onclick="hapus('<?php echo $x['KDBRG'] ?>')" title="Delete Data">
                    <i class="fa fa-remove"></i></button>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="9">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>
<input type="hidden" id="csrf" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">