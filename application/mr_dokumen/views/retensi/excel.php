<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=DATA_PASIEN_" . date('Ymd') . ".xls");
header("Pragma: no-cache");
header("Expires: 0")
?>

<table id="simple-table" class="table table-bordered table-hover" style='color:#000000;' border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomr</th>
            <th>Nama Pasien</th>
            <th>Terakhir Berobat</th>
            <th>Poly Tujuan Terkahir</th>
            <th>Tgl Rawat Terakhir</th>
            <th>Diagnosa</th>
        </tr>
    </thead>
    <tbody>
        <?php // $data 
        ?>
        <?php
        $no = 0;
        foreach ($data as $d) {
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $d->nomr ?></td>
                <td><?= $d->nama_pasien ?></td>
                <td><?= $d->tanggal_terakhir_berobat ?></td>
                <td><?= $d->grNama ?></td>
                <td><?= $d->rawat_terakhir ?></td>
                <td><?= $d->diagnosa ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>