<?php
if ($SQL->num_rows() > 0) :
    foreach ($SQL->result_array() as $x) :
?>
        <tr>
            <td>
                <?php echo $x['NMBRG'] ?>
                <!--Control-->
                <input type="hidden" name="KDBRG[]" id="KDBRG<?= $x["KDBRG"] ?>" value="<?= $x["KDBRG"] ?>">
                <input type="hidden" name="NMBRG<?= $x["KDBRG"] ?>" id="NMBRG<?= $x["KDBRG"] ?>" value="<?= $x["NMBRG"] ?>">
                <input type="hidden" name="JSTOK<?= $x["KDBRG"] ?>" id="JSTOK<?= $x["KDBRG"] ?>" value="<?= $x["JSTOK"] ?>">
                <input type="hidden" name="HJUAL<?= $x["KDBRG"] ?>" id="HJUAL<?= $x["KDBRG"] ?>" value="<?= $x["HJUAL"] ?>">
                <input type="hidden" name="JMLJUAL<?= $x["KDBRG"] ?>" id="JMLJUAL<?= $x["KDBRG"] ?>" value="<?= $x["JMLJUAL"] ?>">

                <input type="hidden" name="SBM_PAGI<?= $x["KDBRG"] ?>" id="SBM_PAGI<?= $x["KDBRG"] ?>" value="<?= $x["SBM_PAGI"] ?>">
                <input type="hidden" name="SBM_SIANG<?= $x["KDBRG"] ?>" id="SBM_SIANG<?= $x["KDBRG"] ?>" value="<?= $x["SBM_SIANG"] ?>">
                <input type="hidden" name="SBM_MALAM<?= $x["KDBRG"] ?>" id="SBM_MALAM<?= $x["KDBRG"] ?>" value="<?= $x["SBM_MALAM"] ?>">

                <input type="hidden" name="STM_PAGI<?= $x["KDBRG"] ?>" id="STM_PAGI<?= $x["KDBRG"] ?>" value="<?= $x["STM_PAGI"] ?>">
                <input type="hidden" name="STM_SIANG<?= $x["KDBRG"] ?>" id="STM_SIANG<?= $x["KDBRG"] ?>" value="<?= $x["STM_SIANG"] ?>">
                <input type="hidden" name="STM_MALAM<?= $x["KDBRG"] ?>" id="STM_MALAM<?= $x["KDBRG"] ?>" value="<?= $x["STM_MALAM"] ?>">
                <input type="hidden" name="MALAM<?= $x["KDBRG"] ?>" id="MALAM<?= $x["KDBRG"] ?>" value="<?= $x["MALAM"] ?>">

                <input type="hidden" name="AP_WAKTUKET<?= $x["KDBRG"] ?>" id="AP_WAKTUKET<?= $x["KDBRG"] ?>" value="<?= $x["AP_WAKTUKET"] ?>">
                <input type="hidden" name="AP_KET<?= $x["KDBRG"] ?>" id="AP_KET<?= $x["KDBRG"] ?>" value="<?= $x["AP_KET"] ?>">

                <input type="hidden" name="DISKON<?= $x["KDBRG"] ?>" id="DISKON<?= $x["KDBRG"] ?>" value="<?= $x["DISKON"] ?>">
                <input type="hidden" name="R<?= $x["KDBRG"] ?>" id="R<?= $x["KDBRG"] ?>" value="<?= $x["R"] ?>">
                <input type="hidden" name="SUBTOTAL<?= $x["KDBRG"] ?>" id="SUBTOTAL<?= $x["KDBRG"] ?>" value="<?= $x["SUBTOTAL"] ?>">
                <input type="hidden" name="JNS_RESEP<?= $x["KDBRG"] ?>" id="JNS_RESEP<?= $x["KDBRG"] ?>" value="<?= $x["JNS_RESEP"] ?>">
                <input type="hidden" name="AP<?= $x["KDBRG"] ?>" id="AP<?= $x["KDBRG"] ?>" value="<?= $x["AP"] ?>">
                <input type="hidden" name="AP_JENISOBAT<?= $x["KDBRG"] ?>" id="AP_JENISOBAT<?= $x["KDBRG"] ?>" value="<?= $x["AP_JENISOBAT"] ?>">
                <input type="hidden" name="AP_JMLHARI<?= $x["KDBRG"] ?>" id="AP_JMLHARI<?= $x["KDBRG"] ?>" value="<?= $x["AP_JMLHARI"] ?>">
                <input type="hidden" name="AP_JMLSATUAN<?= $x["KDBRG"] ?>" id="AP_JMLSATUAN<?= $x["KDBRG"] ?>" value="<?= $x["AP_JMLSATUAN"] ?>">
                <input type="hidden" name="AP_SATUAN<?= $x["KDBRG"] ?>" id="AP_SATUAN<?= $x["KDBRG"] ?>" value="<?= $x["AP_SATUAN"] ?>">
                <input type="hidden" name="AP_CARAPAKAI<?= $x["KDBRG"] ?>" id="AP_CARAPAKAI<?= $x["KDBRG"] ?>" value="<?= $x["AP_CARAPAKAI"] ?>">
                <input type="hidden" name="AP_WAKTUJML<?= $x["KDBRG"] ?>" id="AP_WAKTUJML<?= $x["KDBRG"] ?>" value="<?= $x["AP_WAKTUJML"] ?>">
                <input type="hidden" name="AP_WAKTUPAKAI<?= $x["KDBRG"] ?>" id="AP_WAKTUPAKAI<?= $x["KDBRG"] ?>" value="<?= $x["AP_WAKTUPAKAI"] ?>">
                <input type="hidden" name="AP_WAKTUKET<?= $x["KDBRG"] ?>" id="AP_WAKTUKET<?= $x["KDBRG"] ?>" value="<?= $x["AP_WAKTUKET"] ?>">
                <input type="hidden" name="AP_KET<?= $x["KDBRG"] ?>" id="AP_KET<?= $x["KDBRG"] ?>" value="<?= $x["AP_KET"] ?>">

            </td>
            <td class="rightAlign"><?php echo number_format($x['JSTOK'], 0, ',', '.') ?></td>
            <td class="rightAlign"><?php echo number_format($x['HJUAL'], 0, ',', '.') ?></td>
            <td class="rightAlign"><?php echo number_format($x['JMLJUAL'], 0, ',', '.') ?></td>
            <td class="rightAlign"><?php echo number_format($x['DISKON'], 0, ',', '.') ?></td>
            <td class="rightAlign"><?php echo number_format($x['R'], 0, ',', '.') ?></td>
            <td class="rightAlign"><?php echo number_format($x['SUBTOTAL'], 0, ',', '.') ?></td>
            <td class="rightAlign"><?php echo $x['AP'] ?></td>
            <td class="centerAlign">
                <button class="btn btn-danger" type="button" onclick="hapusTemp('<?php echo $x['KDBRG'] ?>')">
                    <i class="fa fa-remove"></i></button>
            </td>
        </tr>
    <?php endforeach;
else : ?>
    <tr>
        <td colspan="9">Data tidak ditemukan</td>
    </tr>
<?php endif; ?>