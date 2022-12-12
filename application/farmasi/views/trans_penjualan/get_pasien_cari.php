<?php 
    if($SQL->num_rows() > 0):
        //print_r($SQL->result_array());exit;
    foreach($SQL->result_array() as $x): 
?>
    <tr data-id="<?php echo $x['reg_unit']; ?>" class="resultDat">
        <td><?php echo $x['reg_unit']; ?></td>
        <td><?php echo $x['id_daftar']; ?></td>
        <td><?php echo $x['nomr'] ?></td>
        <td><?php echo $x['nama_pasien'] ?></td>
        <td><?php echo $x['id_ruang'] . " # " . $x['nama_ruang'] ?></td>
        <td><?php echo $x['jns_layanan'] ?></td>
        <td><?php echo $x['id_cara_bayar'] . " # " . $x['cara_bayar'] ?></td>
        <td class="centerAlign">
            <div class="btnAksi">
                <button id="<?php echo $x['reg_unit']; ?>" class="btn btn-danger" type="button" onclick="setPasien('<?php echo $x['reg_unit'] ?>')" title="Pilih">
                    <i class="fa fa-check"></i></button>
            </div>
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="8" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
