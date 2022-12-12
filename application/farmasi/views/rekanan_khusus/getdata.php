<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['NMREKANAN']; ?></td>
            <td><?php echo $x['ALAMAT']; ?></td>
            <td><?php echo $x['CONTACTP']; ?></td>
            <td><?php echo $x['TELP']; ?></td>
            <td><?php echo $x['FAKS']; ?></td>
            <td>
                <button class="btn btn-danger" onclick="edit('<?php echo $x['KDREKANAN'] ?>')" title="Edit Data">
                    <i class="fa fa-edit"></i></button>
                <button class="btn btn-danger" onclick="hapus('<?php echo $x['KDREKANAN'] ?>')" title="Delete Data">
                    <i class="fa fa-remove"></i></button>
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