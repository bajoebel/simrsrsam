<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo getNamaUserByID($x['id_dokter']); ?></td>
    <td><?php echo $x['layanan']; ?></td>
    <td style="text-align: right;"><?php echo number_format($x['tarif_layanan'],0,',','.'); ?></td>
    <td style="text-align: right;"><?php echo number_format($x['jml'],0,',','.'); ?></td>
    <td style="text-align: right;"><?php echo number_format($x['sub_total_tarif'],0,',','.'); ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="hapusItem('<?php echo $x['idx'] ?>','<?php echo $x['reg_unit'] ?>')">
            <i class="fa fa-remove"></i>
        </a>        
    </td>
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>