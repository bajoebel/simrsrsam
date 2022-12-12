<tr>
    <td colspan="7" align="left" style="font-weight: bolder;font-style: italic;">Nota Farmasi</td>
</tr>
<?php 
    if($SQL_FARMASI->num_rows() > 0):
    $j = 1;
    foreach($SQL_FARMASI->result_array() as $x): 
        $paramValue = array(
            'kode_item' => $x['idx'],
            'kode_unit' => getPenjualanByKdJL($x['idx'])['KDLOKASI'],
            'nama_unit' => getPenjualanByKdJL($x['idx'])['NMLOKASI'],
            'total_item' => $x['subTotal'],
            'jenis_item' => '2'
        );
?>
    <tr data-id="<?php echo $x['idx'] ?>" class="resultDat">
        <td>
            <input type="hidden" name="items[]" id="kode_2<?php echo $j++ . '-' . $x['subTotal'] ?>" value="<?php echo implode('##',$paramValue); ?>"/>    
            <?php echo $x['idx'] ?>
        </td>
        <td><?php echo $paramValue['nama_unit'] ?></td>
        <td class="rightAlign"><?php echo number_format($x['subTotal'],0) ?></td>
        <td class="centerAlign">
            <button class="btn btn-danger" type="button" onclick="window.open('<?php echo base_url().'farmasi.php/trans_penjualan/cetak?kode='.$x['idx'] ?>')" title="Cetak Ulang Nota Farmasi">
                <i class="fa fa-search"></i> Lihat Nota</button>           
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="6" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
