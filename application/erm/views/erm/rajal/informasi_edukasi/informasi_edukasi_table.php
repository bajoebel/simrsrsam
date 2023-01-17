<?php $no = 1;
if ($data) {
foreach ($data->result() as $e) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= dateToIndo($e->tgl)." / ". $e->jam ?></td>
        <td><?= arr_to_list($e->topik_list) ?></td>
        <td><?= $e->metode ?></td>
        <td><?= $e->media ?></td>
        <td>
            <button type="button" data-id="<?= $e->id ?>" data-user="<?= $e->pemberi_edukasi_id ?>" class='btn btn-xs btn-info' onclick="signEdukasiPasienDetailSasaran(this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Tanda Tangan Sasaran"> <i class='fa fa-sign-in'></i>
            </button>
            <?= $e->sasaran ?>
        </td>
        <td><?= $e->evaluasi_awal ?></td>
        <td>
            <div id="qrcode_epd_<?=$e->id?>"></div>
            <?php if ($e->pemberiSign=="") { ?>
                <button type="button" data-id="<?= $e->id ?>" data-user="<?= $e->pemberi_edukasi_id ?>" class='btn btn-xs btn-info' onclick="signEdukasiPasienDetail(this.getAttribute('data-id'),this.getAttribute('data-user'))" data-toggle="tooltip" data-placement="top" title="Assign dan Generate QRCODE"> <i class='fa fa-sign-in'></i>
                </button><br>
            <?php } ?>
            <?= $e->pemberi_edukasi ?>
        </td>
        <td><?= $e->evaluasi_lanjut ?></td>
        <td>
            <button type="button" data-id="<?= $e->id ?>" class='btn btn-xs btn-danger' onclick="hapusEdukasiPasienDetail(this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
            </button>
            
        </td>
    </tr>
    <!-- qrcode -->
    <script type="text/javascript">
        var id = "<?= $e->id?>";
        var code = "<?= $e->pemberiSign?>";
        if (code) {
            var qrcode = new QRCode(document.getElementById("qrcode_epd_"+id), {
                text: code,
                width: 60,
                height: 60,
                colorDark : "#000",
                colorLight : "#fff",
            });
        }
    </script>
<?php endforeach; } ?>