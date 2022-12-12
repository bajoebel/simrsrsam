<?php 
    if($SQL->num_rows() > 0):
        $sub01 = 0;
        $sub02 = 0;
        $sub03 = 0;
        $sub04 = 0;
        $sub05 = 0;
        $sub06 = 0;
        $subTotal = 0;
        $grandTotal = 0;
        foreach($SQL->result_array() as $x): 
            $sub01 = $sub01 + $x['KH_P'];
            $sub02 = $sub02 + $x['KH_W'];
            $sub03 = $sub03 + $x['K48M_P'];
            $sub04 = $sub04 + $x['K48M_W'];
            $sub05 = $sub05 + $x['KM48_P'];
            $sub06 = $sub06 + $x['KM48_W'];
            $subTotal = $x['KH_P']+$x['KH_W']+$x['K48M_P']+$x['K48M_W']+$x['KM48_P']+$x['KM48_W'];
            $grandTotal = $grandTotal + $subTotal;
?>
<tr class="item">
    <td class="desk"><?php echo $x['jenis_pelayanan']; ?></td>
    <td><?php echo $x['KH_P']; ?></td>
    <td><?php echo $x['KH_W']; ?></td>
    <td><?php echo $x['K48M_P']; ?></td>
    <td><?php echo $x['K48M_W']; ?></td>
    <td><?php echo $x['KM48_P']; ?></td>
    <td><?php echo $x['KM48_W']; ?></td>
    <td><?php echo $subTotal; ?></td>
</tr>
<?php endforeach; ?>
<tr class="item">
    <td>&nbsp;</td>
    <td><?php echo $sub01; ?></td>
    <td><?php echo $sub02; ?></td>
    <td><?php echo $sub03; ?></td>
    <td><?php echo $sub04; ?></td>
    <td><?php echo $sub05; ?></td>
    <td><?php echo $sub06; ?></td>
    <td><?php echo $grandTotal; ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>