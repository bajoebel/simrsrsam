<?php
if ($SQL->num_rows() > 0) :
    $i = 1 + $offset;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['layanan']; ?></td>
            <td style="text-align: right"><?php echo number_format($x['jasa_sarana'], 0); ?></td>
            <td style="text-align: right"><?php echo number_format($x['jasa_pelayanan'], 0); ?></td>
            <td style="text-align: right"><?php echo number_format($x['tarif_layanan'], 0); ?></td>
            <td><?php echo $x['kategori_tarif']; ?></td>
            <td><?php echo "Kelas " . $x['kelas_layanan']; ?></td>
            <td><?php echo $x['keterangan']; ?></td>
            <td>
                <button type="button" class="btn btn-danger" onclick="edit('<?php echo $x['idx'] ?>','<?php echo $x['layanan'] ?>','<?php echo $x['idxlayanan'] ?>','<?php echo $x['kategori_id'] ?>','<?php echo $x['keterangan'] ?>','<?php echo $x['jns_layanan'] ?>')">
                    <i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $x['idx'] ?>')">
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