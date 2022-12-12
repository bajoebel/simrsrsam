<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['username']; ?></td>
            <td><?php echo $x['nm_lengkap']; ?></td>
            <td><?php echo $x['level']; ?></td>
            <td>
                <?php
                if ($x['last_login'] !== NULL) {
                    echo date('d-m-Y H:i', strtotime($x['last_login']));
                }
                ?>
            </td>
            <td><?php echo ($x['user_status'] == "1") ? "User Aktif" : "User Non Aktif" ?></td>
            <td style="text-align: center;">
                <button <?php echo ($x['user_status'] == "1") ? "" : "disabled" ?> type="button" class="btn btn-danger" onclick="setNonAktif('<?php echo $x['idx'] ?>')">
                    <i class="fa fa-fw fa-lock"></i> Non Aktifkan
                </button>
                <button <?php echo ($x['user_status'] == "0") ? "" : "disabled" ?> type="button" class="btn btn-danger" onclick="setAktif('<?php echo $x['idx'] ?>')">
                    <i class="fa fa-fw fa-unlock"></i> Aktifkan
                </button>
            </td>
            <td style="text-align: center;">
                <button type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url() . 'users/tambah/' . $x['idx'] ?>'">
                    <i class="fa fa-fw fa-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger" onclick="reset('<?php echo $x['idx'] ?>')">
                    <i class="fa fa-fw fa-key"></i>
                </button>
            </td>
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