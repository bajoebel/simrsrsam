<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['layanan']; ?></td>
    <td style="text-align: right;"><?php echo number_format($x['jasa_sarana'],0,',','.'); ?></td>
    <td style="text-align: right;"><?php echo number_format($x['jasa_pelayanan'],0,',','.'); ?></td>
    <td style="text-align: right;"><?php echo number_format($x['tarif_layanan'],0,',','.'); ?></td>
    <td style="text-align: right;"><?php echo number_format($x['tarif_cito'],0,',','.'); ?></td>
    <td><?php echo $x['kategori_tarif']; ?></td>
    <td><?php echo $x['kelas_layanan']; ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="edit('<?php echo $x['idx'] ?>')">
            <i class="fa fa-edit"></i> Edit
        </a>        
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>