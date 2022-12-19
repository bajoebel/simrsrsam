<?php if ($pil == 1) { ?>
    <!-- surat masuk rawat jalan -->
    <div class="" style="max-height: 450px; overflow-y: scroll; ">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1;
                foreach ($list as $r) :
                    if ($r->jns_layanan == $jns_layanan) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $r->nama_ruang ?></td>
                            <td><?= $r->tgl_masuk ?></td>

                            <td>
                                <a href="<?= base_url() . "erm.php/rajal/masuk_rajal/" . $r->idx ?>" class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank"> <i class='fa fa-print'></i>
                                </a>
                            </td>
                        </tr>
                <?php endif;
                endforeach; ?>
            </tbody>
        </table>
    </div>

<?php } else if ($pil == 2) { ?>
    <!-- Persetujuan umum -->
    <div class="" style="max-height: 450px; overflow-y: scroll; ">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1;
                foreach ($list as $r) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r->nama ?></td>
                        <td><?= $r->created_at ?></td>
                        <td>
                            <?php
                            if ($r->status == 1) {
                                echo "<span class='badge bg-green'>Approved</span>";
                            } else {
                                echo "<span class='badge '>Waiting</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url() . 'erm.php/rajal/setuju_umum/' . $r->idx . "/" . $r->id ?>" class='btn btn-xs btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank"> <i class='fa fa-print'></i>
                            </a>
                            <?php  ?>
                            <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-xs btn-danger' onclick="hapusSetujuUmum(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="alert alert-danget">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Belum ada riwayat ditemukan
    </div>

<?php } ?>