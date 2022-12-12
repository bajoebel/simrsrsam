<?php
if ($SQL->num_rows() > 0) :
    $i = 1;
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['nomr']; ?></td>
            <td><?php echo $x['nama_pasien']; ?></td>
            <td><?php echo $x['id_daftar']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($x['tgl_masuk'])); ?></td>
            <td><?php
                $alamat = strtoupper($x["alamat"]);
                if (!empty($x["nama_kelurahan"])) $alamat .= " KEL. " . strtoupper($x["nama_kelurahan"]);
                if (!empty($x["nama_kecamatan"])) $alamat .= " KEC. " . strtoupper($x["nama_kecamatan"]);
                if (!empty($x["nama_kab_kota"])) $alamat .= " " . strtoupper($x["nama_kab_kota"]);
                if (!empty($x["nama_provinsi"])) $alamat .= " PROV. " . strtoupper($x['nama_provinsi']);
                echo $alamat;
                ?></td>
            <td><?php echo $x['cara_bayar'] . "(" . $x['jenis_peserta'] . ")"; ?></td>
        </tr>
    <?php endforeach;
else : ?>
    <tr>
        <td colspan="6">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>