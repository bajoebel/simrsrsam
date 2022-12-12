<?php
$i = 1;
$subTotal = 0;
$KDBKK = "";
foreach ($dataPreview->result_array() as $x) :
    if ($KDBKK == "") {
?>
        <tr>
            <td align="center"><?php echo $i++; ?></td>
            <td align="center"><?php echo date('d-m-Y', strtotime($x['TGLTRANSAKSI'])) ?></td>
            <td><?php echo $x['KDBKK'] ?></td>
            <td><?php echo $x['NMREKANAN'] ?></td>
            <td colspan="4">Data Barang</td>

        </tr>
        <tr>
            <td colspan="4"></td>
            <td><?php echo $x['KDBRG'] ?></td>
            <td><?php echo $x['NMBRG'] ?></td>

            <td align="right" style="font-weight: bolder;"><?php echo number_format($x['JMLBKK'], 0, ',', '.') ?></td>
            <td><?php echo $x['NMSATUAN'] ?></td>
        </tr>
        <?php
    } else {
        if ($KDBKK != $x['KDBKK']) {
        ?>
            <tr>
                <td align="center"><?php echo $i++; ?></td>
                <td align="center"><?php echo date('d-m-Y', strtotime($x['TGLTRANSAKSI'])) ?></td>
                <td><?php echo $x['KDBKK'] ?></td>
                <td><?php echo $x['NMREKANAN'] ?></td>
                <td colspan="4">Data Barang</td>

            </tr>
            <tr>
                <td colspan="4"></td>
                <td><?php echo $x['KDBRG'] ?></td>
                <td><?php echo $x['NMBRG'] ?></td>

                <td align="right" style="font-weight: bolder;"><?php echo number_format($x['JMLBKK'], 0, ',', '.') ?></td>
                <td><?php echo $x['NMSATUAN'] ?></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="4"></td>
                <td><?php echo $x['KDBRG'] ?></td>
                <td><?php echo $x['NMBRG'] ?></td>

                <td align="right" style="font-weight: bolder;"><?php echo number_format($x['JMLBKK'], 0, ',', '.') ?></td>
                <td><?php echo $x['NMSATUAN'] ?></td>
            </tr>
    <?php
        }
    }
    $KDBKK = $x["KDBKK"];
    ?>
    
<?php endforeach; ?>