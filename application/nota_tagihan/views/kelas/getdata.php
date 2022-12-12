<?php
if ($SQL->num_rows() > 0) :
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td style="text-align: center;"><?php echo $x['idx']; ?></td>
            <td><?php echo $x['kelas_layanan']; ?></td>
            <td style="text-align: center;">
                <a href="Javascript:edit('<?php echo (int)$x['idx'] ?>','<?php echo $x['kelas_layanan'] ?>')" class="btn btn-danger">
                    <i class="fa fa-edit"></i></a>
                <a href="Javascript:hapus('<?php echo (int)$x['idx'] ?>')" class="btn btn-danger">
                    <i class="fa fa-remove"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="3">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>