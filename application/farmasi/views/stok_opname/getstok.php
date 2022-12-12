<?php
if ($SQL->num_rows() > 0) :
    $i = 1;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['NMBRG']; ?></td>
            <td><?php echo $x['KDBRG']; ?></td>
            <td><?php echo str_pad($x['KDBRG'], 6, 0, STR_PAD_LEFT); ?></td>
            <td><?php echo $x['NMLOKASI']; ?></td>
            <td style="text-align: right;"><?php echo number_format($x['JSTOK'], 0, ',', '.'); ?></td>
            <td>
                <button title="Pilih" class="btn btn-danger" type="button" onclick="setObat('<?php echo $x['KDBRG'] ?>','<?php echo urlencode($x['NMBRG']) ?>','<?php echo urlencode($x['JSTOK']) ?>')">
                    <i class="fa fa-check"></i></button>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="7" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="7">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>
<input type="hidden" id="csrf" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">