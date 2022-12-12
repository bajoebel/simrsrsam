<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
        $separator = ($x['TELP'] == "" || $x['FAKS'] == "") ? "" : " / ";
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo str_pad($x['KDSUPPLIER'], 6, 0, STR_PAD_LEFT); ?></td>
            <td><?php echo $x['NMSUPPLIER']; ?></td>
            <td><?php echo $x['ALAMAT']; ?></td>
            <td><?php echo $x['KOTA']; ?></td>
            <td><?php echo $x['NPWP']; ?></td>
            <td><?php echo $x['CONTACTP']; ?></td>
            <td><?php echo $x['TELP'] . $separator . $x['FAKS']; ?></td>
            <td><?php echo $x['EMAIL']; ?></td>
            <td>
                <button class="btn btn-danger" onclick="edit('<?php echo $x['KDSUPPLIER'] ?>')" title="Edit Data">
                    <i class="fa fa-edit"></i></button>
                <button class="btn btn-danger" onclick="hapus('<?php echo $x['KDSUPPLIER'] ?>')" title="Delete Data">
                    <i class="fa fa-remove"></i></button>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="10" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="10">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>
<input type="hidden" id="csrf" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">