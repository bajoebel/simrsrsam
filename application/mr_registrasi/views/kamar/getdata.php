<?php
if ($SQL->num_rows() > 0) :
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td class="text-center"><?= $x['idx']; ?></td>
            <td><?= $x['kamar_layanan']; ?></td>
            <td><?= getRuangById($x['ruang_id'])['ruang_layanan']; ?></td>
            <td><?= getKelasById($x['kelas_id'])['kelas_layanan']; ?></td>
            <td><?= getSmfById($x['smf_id'])['nama_smf']; ?></td>
            <td class="text-center"><?= (int)$x['jml_tt']; ?></td>
            <td class="text-center"><?= (int)$x['jml_rusak']; ?></td>
            <td class="text-center"><?= (int)$x['jml_tersedia']; ?></td>
            <td class="text-center"><?= (int)$x['jml_terisi']; ?></td>
            <td class="text-center">
                <a href="Javascript:edit('<?= (int)$x['idx'] ?>','<?= $x['kamar_layanan'] ?>','<?= $x['ruang_id'] ?>','<?= $x['kelas_id'] ?>','<?= $x['smf_id'] ?>')" class="btn btn-sm btn-primary btn-block mb-1">
                    <i class="fa fa-edit"></i> Edit Kamar
                </a>
                <a href="Javascript:hapus('<?= (int)$x['idx'] ?>')" class="btn btn-sm btn-danger btn-block mb-1">
                    <i class="fa fa-remove"></i> Hapus Kamar
                </a>
                <a href="Javascript:infoTempatTidur('<?= (int)$x['idx'] ?>')" class="btn btn-sm btn-info btn-block mb-1">
                    <i class="fa fa-search"></i> Info Tempat Tidur
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="10"  class="text-right"><?= $this->ajax_page->create_links(); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="10">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>