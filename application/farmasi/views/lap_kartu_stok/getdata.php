<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['KDBRG']; ?></td>
    <td><?php echo $x['NMBRG']; ?></td>
    <td><?php echo $x['NMSATUAN']; ?></td>
    <td><?php echo $x['NMKTBRG']; ?></td>
    <td><?php echo $x['JENISBRG']; ?></td>
    <td>
        <button class="btn btn-danger" onclick="cetak('<?php echo $x['KDBRG'] ?>')" title="Print Kartu Stok">
            <i class="fa fa-print"></i></button>
    </td>
</tr>
<?php endforeach;?>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>