<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['layanan']; ?></td>
    <td style="text-align: right;"><?php echo number_format($x['tarif_layanan'],0,',','.'); ?></td>
    <td><?php echo $x['kategori_tarif']; ?></td>
    <td><?php echo $x['kelas_layanan']; ?></td>
    <td>
        <a href="#" class="btn btn-danger " onclick="pilihTarif('<?php echo $x['idx'] ?>','<?php echo $x['layanan'] ?>',
        '<?php echo $x['jasa_sarana'] ?>','<?php echo $x['jasa_pelayanan'] ?>','<?php echo $x['tarif_layanan'] ?>','<?php echo $x['kategori_id'] ?>','<?php echo $x['kelas_id'] ?>')">
            <i class="fa fa-check"></i> Pilih
        </a>        
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="6" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<tr><td colspan="6"><?= $query ?></td></tr>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>