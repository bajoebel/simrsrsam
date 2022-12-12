<?php
if ($SQL->num_rows() > 0) :
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $x['id_daftar']; ?></td>
            <td><?php echo $x['reg_unit']; ?></td>
            <td><?php echo date('d-m-Y H:i', strtotime($x['tgl_masuk'])); ?></td>
            <td><?php echo $x['nomr']; ?></td>
            <td><?php echo $x['nama_pasien']; ?></td>
            <td><?php echo $x['tgl_lahir']; ?></td>
            <td><?php echo ($x['jns_kelamin'] == 0) ? "Perempuan" : "Laki-Laki"; ?></td>
            <td>
                <?php if ($x['PK_INDEX'] == "") : ?>
                    <a href="#" class="btn btn-danger" onclick="pilihPasien('<?php echo $x['reg_unit'] ?>')">
                        <i class="fa fa-check"></i> Pilih
                    </a>
                <?php else : ?>
                    Data pasien keluar telah diset
                <?php endif; ?>
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