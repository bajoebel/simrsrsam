<?php
if ($SQL->num_rows() > 0) :
    $i = 1;
    $subTotal = 0;
    foreach ($SQL->result_array() as $x) :

        //$subTotal = $subTotal + $x['grand_total'];
        if ($x['jkn'] == 1) {
            $grandtotal = $x["tarif_bpjs"] + $x["tarif_selisih_bayar"];
            $subTotal += $grandtotal;
        } else {
            $grandtotal = $x['grand_total'];
            $subTotal += $x['grand_total'];
        }
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $x['no_kwitansi']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($x['tgl_kwitansi'])); ?></td>
            <td><?php echo $x['id_daftar']; ?></td>
            <td><?php echo $x['nomr']; ?></td>
            <td><?php echo $x['nama_pasien']; ?></td>
            <td><?php echo $x['cara_bayar']; ?></td>
            <td><?php echo $x['nama_dpjp']; ?></td>
            <td style="text-align: right;">Rp. <?php echo number_format($grandtotal, 0, ',', '.'); ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="8" style="text-align: right;font-weight: 500;">Total</td>
        <td style="text-align: right;">Rp. <?php echo number_format($subTotal, 0, ',', '.'); ?></td>
    </tr>
<?php else : ?>
    <tr>
        <td colspan="9">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>