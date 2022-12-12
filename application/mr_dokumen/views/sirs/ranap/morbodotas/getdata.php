<?php 
    if($SQL->num_rows() > 0):
        foreach($SQL->result_array() as $x): 
?>
<tr class="item">
    <td class="desk"><?php echo $x['DTD']; ?></td>
    <td class="desk"><?php echo $x['Grup_ICD']; ?></td>
    <td class="desk"><?php echo $x['Morbiditas']; ?></td>
    <td><?php echo number_format($x['L0H6H'],0); ?></td>
    <td><?php echo number_format($x['P0H6H'],0); ?></td>
    <td><?php echo number_format($x['L6H28H'],0); ?></td>
    <td><?php echo number_format($x['P6H28H'],0); ?></td>
    <td><?php echo number_format($x['L28H1T'],0); ?></td>
    <td><?php echo number_format($x['P28H1T'],0); ?></td>
    <td><?php echo number_format($x['L1T4T'],0); ?></td>
    <td><?php echo number_format($x['P1T4T'],0); ?></td>
    <td><?php echo number_format($x['L4T14T'],0); ?></td>
    <td><?php echo number_format($x['P4T14T'],0); ?></td>
    <td><?php echo number_format($x['L14T24T'],0); ?></td>
    <td><?php echo number_format($x['P14T24T'],0); ?></td>
    <td><?php echo number_format($x['L24T44T'],0); ?></td>
    <td><?php echo number_format($x['P24T44T'],0); ?></td>
    <td><?php echo number_format($x['L44T64T'],0); ?></td>
    <td><?php echo number_format($x['P44T64T'],0); ?></td>
    <td><?php echo number_format($x['L64T'],0); ?></td>
    <td><?php echo number_format($x['P64T'],0); ?></td>
    <td><?php echo number_format($x['PKHMLK'],0); ?></td>
    <td><?php echo number_format($x['PKHMPR'],0); ?></td>
    <td><?php echo number_format($x['JPKH'],0); ?></td>
    <td><?php echo number_format($x['JPKM'],0); ?></td>
</tr>
<?php endforeach; else: ?>
<tr>
    <td colspan="25">Data tidak ditemukan</td>
</tr>
<?php endif; ?>