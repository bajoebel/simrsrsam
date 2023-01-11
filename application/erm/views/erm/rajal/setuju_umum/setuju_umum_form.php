<table class="table">
    <tr>
        <td>No.Rekam Medis</td>
        <td>:  <?php echo $d->nomr ?></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>:  <?php echo $d->nama_pasien ?></td>
    </tr>
    <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:  <?php echo $d->tempat_lahir."/".DateFormatIndo($d->tgl_lahir) ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:         <?php if($d->jns_kelamin=="1") echo "Laki-Laki"; else if($d->jns_kelamin=="2") echo "Perempuan";else if($d->jns_kelamin=="3") echo "Tidak dapat ditentukan"; else "Tidak Mengisi" ?>
        </td>
    </tr>
</table>
<?php if ($s!=NULL) {?>
<table class="table">
    <tr>
        <th colspan="3">Yang Memberi Persetujuan</th>
    </tr>
    <tr>
        <td>Nama </td>
        <td><?= $s->namattd?></td>
    </tr>
    <tr>
        <td>Tempat Lahir </td>
        <td><?= $s->tempat_lahirttd?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin </td>
        <td> <?php if($s->jkttd=="1") echo "Laki-Laki"; else if($s->jkttd=="2") echo "Perempuan";else if($s->jkttd=="3") echo "Tidak dapat ditentukan"; else "Tidak Mengisi" ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?= $s->alamatttd ?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>: <?= $s->phonettd ?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>: <?= $s->phonettd ?></td>
    </tr>
    <tr>
        <td>Selaku</td>
        <td>: <?=$s->selaku?><?=($s->selaku=="lainnya")?", ".$s->selaku_lainnya:""; ?></td>
    </tr>
    <tr>
        <td>Keinginan Privasi</td>
        <td>:<?= arr_to_list($s->privasi_list,"<span style='margin-left:10px'>","</span></br>") ?></td>
    </tr>
    <tr>
        <td>Wewenang Informasi</td>
        <td>: <?= ($s->izininformasidiagnosis==1)?"Mengizinkan":"Tidak Mengizinkan";?></td>
    </tr>
    <tr>
        <td>Wewenang Informasi Terbatas Pada</td>
        <td>: <?= arr_to_list($s->terbatas_list,"<span style='margin-left:10px'>","</span></br>") ?></td>
    </tr>
</table>
<?php } else {?>
    <table class="table">
        <tr>
            <th colspan="3" class="text-center text-red">Belum Ada Form Persetujuan Dibuat di Pendaftaran</th>
        </tr>
    </table>
<?php }?>

