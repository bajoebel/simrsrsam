<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
    <tr data-id="<?php echo $x['no_kwitansi']; ?>" class="resultDat">
        <td><?php echo $i++  ?></td>
        <td><?php echo date('d-m-Y H:i',strtotime($x['tgl_kwitansi']))  ?></td>
        <td><?php echo $x['no_kwitansi'] ?></td>
        <td><?php echo $x['id_daftar'] ?></td>
        <td><?php echo $x['nomr'] ?></td>
        <td><?php echo $x['nama_pasien'] ?></td>
        <td class="rataKanan"><?php echo number_format($x['grand_total'],0,',','.') ?></td>
        <td><?php echo $x['cara_bayar'] ?></td>
        <td class="rataTengah">
            <button class="btn btn-danger" type="button" onclick="window.open('<?php echo base_url().'kasir.php/kwitansi_jkn/cetak_kwitansi?kode='.$x['no_kwitansi'] ?>');" title="Cetak Kwitansi">
                <i class="fa fa-print"></i></button>
            <button class="btn btn-danger" type="button" onclick="printLampiran('<?php echo $x['no_kwitansi'] ?>','<?php echo $x['nomr'] ?>','<?php echo rawurlencode($x['nama_pasien']) ?>')" title="Lampiran">
                <i class="glyphicon glyphicon-new-window"></i></button>
            <button class="btn btn-danger" type="button" onclick="window.open('<?php echo base_url().'kasir.php/kwitansi_jkn/cetak_kwitansi_jkn?kode='.$x['no_kwitansi'] ?>');" title="Cetak Kwitansi JKN">
                <i class="fa fa-bookmark"></i></button>
            <button id="<?php echo $x['no_kwitansi']; ?>" class="btn btn-danger" type="button" onclick="batal('<?php echo $x['no_kwitansi'] ?>')" title="Retur Kwitansi">
                <i class="fa fa-ban"></i></button>
        </td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="9" class="rataKanan"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
