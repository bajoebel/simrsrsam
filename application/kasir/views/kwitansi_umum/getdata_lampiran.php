<?php 
    if($SQL->num_rows() > 0):
        $i=1;
        foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $x['kode_item'] ?></td>
        <td><?php echo $x['nama_unit'] ?></td>
        <td class="rataKanan"><?php echo number_format($x['total_item'],0,',','.') ?></td>
        <td class="rataTengah">
            <?php if($x['jenis_item']=='1'): ?>
            <button class="btn btn-danger" type="button" onclick="window.open('<?php echo base_url().'kasir.php/kwitansi_umum/cetakLayanan?kode='.$x['kode_item'] ?>')" title="Cetak Lampiran">
                <i class="fa fa-search"></i></button>
            <?php else: ?>
            <button class="btn btn-danger" type="button" onclick="window.open('<?php echo base_url().'kasir.php/kwitansi_umum/cetakFarmasi?kode='.$x['kode_item'] ?>')" title="Cetak Lampiran">
                <i class="fa fa-search"></i></button>
            <?php endif; ?>            
        </td>
    </tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="7" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
