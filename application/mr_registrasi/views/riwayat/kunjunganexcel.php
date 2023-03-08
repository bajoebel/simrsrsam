<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=DATA_PASIEN_" . date('Ymd') . ".xls");
header("Pragma: no-cache");
header("Expires: 0")
?>
<table class="table table-bordered" border="1">
    <thead class='bg-blue'>
        <tr>
            <th style="width: 50px">#</th>
            <th style="width: 60px">No MR</th>
            <th>Nama Pasien</th>
            <th style="width: 80px">No Reg RS</th>
            <th style="width: 100px">Tgl Registrasi</th>
            <th>Tujuan</th>
            <th>DPJP</th>
            <th style="width: 150px">Cara Bayar</th>
            <th style="width: 80px">No BPJS</th>
            <th style="width: 80px">Jns Layanan</th>
            <th style="width: 80px">Status<br/>Register</th>
            <th style="width: 80px">Jenis<br/>Pasien</th>
            <th style="width: 150px">Users</th>
        </tr>    
    </thead>
    <tbody id="getHistory">
        <?php 
        $no=0;
        foreach ($list as $l ) {
            $no++;
            ?>
            <tr>
                <th style="width: 50px"><?= $no ?></th>
                <th style="width: 60px"><?= $l->nomr ?></th>
                <th><?= $l->nama_pasien?></th>
                <th style="width: 80px"><?= $l->id_daftar?></th>
                <th style="width: 100px"><?= $l->tgl_masuk ?></th>
                <th><?= $l->nama_ruang ?></th>
                <th><?= $l->namaDokterJaga?></th>
                <th style="width: 150px"><?= $l->cara_bayar ?></th>
                <th style="width: 80px"><?= $l->no_bpjs ?></th>
                <th style="width: 80px"><?= $l->jns_layanan ?></th>
                <th style="width: 80px"><?= ($l->status_pasien==6 ? "Batal":"Aktif") ?></th>
                <th style="width: 80px"><?= $l->jns_pasien ?></th>
                <th style="width: 150px"><?= $l->pgwNama ?></th>
            </tr> 
            <?php
        }
        ?>
    </tbody>
</table>