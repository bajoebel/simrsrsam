<?php
$i = 1;
$subTotal = 0;
foreach ($dataPreview->result_array() as $x) :
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
        <td align="center"><?php echo date('d-m-Y', strtotime($x['TGL_MUTASI'])) ?></td>
        <td><?php echo $x['KDMT'] ?></td>
        <td><?php echo $x['KDBRG'] ?></td>
        <td><?php echo $x['NMBRG'] ?></td>
        <td><?php echo $x['NMSATUAN'] ?></td>
        <td><?php echo $x['NAMA_LOKASI_ASAL'] ?></td>
        <td><?php echo $x['NAMA_LOKASI_TUJUAN'] ?></td>
        <td align="right" style="font-weight: bolder;"><?php echo number_format($x['JMLMT'], 0, ',', '.') ?></td>
    </tr>
<?php endforeach; ?>