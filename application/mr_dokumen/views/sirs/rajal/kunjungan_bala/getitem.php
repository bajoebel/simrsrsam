<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['kunjungan']; ?></td>
    <td style="text-align: right;"><?php echo $x['Jumlah']; ?></td>
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="2">Data tidak ditemukan</td>
</tr>
<?php endif; ?>