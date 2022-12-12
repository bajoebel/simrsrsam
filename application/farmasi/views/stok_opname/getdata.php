<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo date('d-m-Y', strtotime($x['TGLKOREKSI'])) . '<br/>' . date('H:i', strtotime($x['TGLKOREKSI'])); ?></td>
            <td><?php echo $x['NMBRG']; ?></td>
            <td><?php echo $x['KDBRG']; ?></td>
            <td><?php echo $x['JMLSTOK_DIKOREKSI']; ?></td>
            <td><?php echo $x['JMLKOREKSI']; ?></td>
            <td><?php echo $x['JMLREAL']; ?></td>
            <td><?php echo $x['NOBUKTI']; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="8" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="8">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>
<input type="hidden" id="csrf" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">