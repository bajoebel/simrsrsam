<tr>
    <td colspan="7" align="left" style="font-weight: bolder;font-style: italic;">Nota Layanan</td>
</tr>
<?php 
    if($SQL_LAYANAN->num_rows() > 0):
    $i = 1;
    foreach($SQL_LAYANAN->result_array() as $x): 
        $unit = getPendaftaranByRegUnit($x['idx']);
        $paramValue = array(
            'kode_item' => $x['idx'],
            'kode_unit' => $unit['id_ruang'],
            'nama_unit' => $unit['nama_ruang'],
            'total_item' => $x['subTotal'],
            'jenis_item' => '1'
        );
        
?>
    <tr data-id="<?php echo $x['idx'] ?>" class="resultDat">
        <td>
            <input type="hidden" name="items[]" id="kode_1<?php echo $i++ . '-' . $x['subTotal'] ?>" value="<?php echo implode('##',$paramValue); ?>"/>
            <?php echo $x['idx'] ?>
        </td>
        <td><?php echo $paramValue['nama_unit'] ?></td>
        <td class="rightAlign"><?php echo number_format($x['subTotal'],0) ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger" type="button" onclick="window.open('<?php echo base_url().'nota_tagihan.php/nota_tagihan/cetak?kode='.$x['idx'] ?>')" title="Cetak Ulang Nota Tagihan">
                <i class="fa fa-search"></i> Lihat Nota</button>           
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="4" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
