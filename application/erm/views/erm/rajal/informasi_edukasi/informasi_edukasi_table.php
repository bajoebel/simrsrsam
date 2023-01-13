<?php $no = 1;
if ($data) {
foreach ($data->result() as $e) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= dateToIndo($e->tgl)." / ". $e->jam ?></td>
        <td><?= arr_to_list($e->topik_list) ?></td>
        <td><?= $e->metode ?></td>
        <td><?= $e->media ?></td>
        <td><?= $e->sasaran ?></td>
        <td><?= $e->evaluasi_awal ?></td>
        <td><?= $e->pemberi_edukasi ?></td>
        <td><?= $e->verifikasi ?></td>
        <td><?= $e->evaluasi_lanjut ?></td>
        <td>
            <button type="button" data-id="<?= $e->id ?>" class='btn btn-xs btn-danger' onclick="hapusEdukasiPasienDetail(this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
            </button>
        </td>
    </tr>
<?php endforeach; } ?>