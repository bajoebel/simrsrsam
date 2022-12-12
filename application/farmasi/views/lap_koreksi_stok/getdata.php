<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['NMLOKASI']; ?></td>
    <td><?php echo $x['TGLKOREKSI']; ?></td>
    <td><?php echo $x['KDBRG']; ?></td>
    <td><?php echo $x['NMBRG']; ?></td>
    <td><?php echo $x['JMLSTOK_DIKOREKSI']; ?></td>
    <td><?php echo $x['JMLKOREKSI']; ?></td>
    <td><?php echo $x['JMLREAL']; ?></td>
    <td><?php echo $x['NOBUKTI']; ?></td>
    <td><?php echo $x['ALASAN']; ?></td>
    
</tr>
<?php endforeach;?>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>