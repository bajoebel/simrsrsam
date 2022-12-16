<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td align="right"><?php echo number_format($x['subTotal'],0,',','.'); ?></td>
    <td>
        <a href="#" onclick="cetak('<?php echo $x['reg_unit']; ?>')">
            <i class="fa fa-print"></i> Print
        </a>
    </td>
   
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>