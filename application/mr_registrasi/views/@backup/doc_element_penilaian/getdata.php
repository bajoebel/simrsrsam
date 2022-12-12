<?php
$datUser = getUserById(getUID());
if ($SQL->num_rows() > 0) :
    $i = 1;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['ep_sars_item']; ?></td>
            <td>
                <?php
                $datDoc = getEpSarsItemDocByEpSarsItemId($x['idx']);
                if (count($datDoc) > 0) :
                    foreach ($datDoc as $y) :
                        echo "<div class='m-0' style='font-size: 16px;'><i class='fa fa-file'></i> " . getJnsDokumen($y['jns_dokumen']) . "</div>";
                        echo "<div class='mb-2'><i class='fa fa-calendar'></i> " . date('Y-m-d', strtotime($y['tgl_upload'])) . "</div>";
                        $path = base64_encode(base_url() . 'uploads/' . $y['files_upload']);
                ?>
                        <button type="button" class="btn btn-primary btn-sm btn-block" onclick="lihat('<?= $path ?>')" title="Lihat Dokumen">
                            <i class="fa fa-fw fa-eye"></i> Lihat Dokumen
                        </button>
                        <?php
                        if ($datUser['level'] !== "administrator") :
                        ?>
                            <button type="button" class="btn btn-danger btn-sm btn-block" onclick="hapus_dokumen('<?php echo $y['idx'] ?>')" title="Hapus Dokumen">
                                <i class="fa fa-fw fa-ban"></i> Hapus Dokumen
                            </button>
                <?php
                        endif;
                        echo "<hr/>";
                    endforeach;
                else :
                    echo "<img src='" . base_url('images/file_not_found.png') . "' width='100px'/>";
                endif;
                ?>
            </td>

            <td><?php echo $x['nilai']; ?></td>
            <td class="td-responsive" style="text-align: center;">
                <?php if ($datUser['level'] == "administrator") : ?>
                    <button type="button" class="btn btn-danger btn-sm btn-block" onclick="set_nilai('<?= $x['idx'] ?>')">
                        <i class="fa fa-check"></i> Set Nilai
                    </button>

                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="edit('<?= $x['idx'] ?>')" title="Edit Data">
                        <i class="fa fa-fw fa-pencil"></i> Edit Data
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-block" onclick="hapus('<?php echo $x['idx'] ?>')" title="Hapus Data">
                        <i class="fa fa-fw fa-remove"></i> Hapus Data
                    </button>
                <?php else : ?>
                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="tambah_dokumen('<?php echo $x['idx'] ?>')" title="Tambah Dokumen">
                        <i class="fa fa-fw fa-plus"></i> Tambah Dokumen
                    </button>
                <?php endif; ?>
            </td>
        </tr>
    <?php
    endforeach;
else :
    ?>
    <tr>
        <td colspan="7">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>