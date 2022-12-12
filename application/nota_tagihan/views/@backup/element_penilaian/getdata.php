<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $x['ep_sars']; ?></td>
            <td><?= (int)$x['sars_id'] . ". " . $x['sars']; ?></td>
            <td style="text-align: center;" class="td-responsive">
                <button class="btn btn-danger" onclick="edit('<?php echo $x['idx'] ?>')" title="Edit Data">
                    <i class="fa fa-fw fa-edit"></i></button>
                <button class="btn btn-danger" onclick="hapus('<?php echo $x['idx'] ?>')" title="Hapus Data">
                    <i class="fa fa-fw fa-remove"></i></button>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    <tr>
        <td colspan="4" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="4">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>