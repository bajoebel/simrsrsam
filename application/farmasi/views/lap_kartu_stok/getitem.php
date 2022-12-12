<tr>
    <td colspan="5">Stok Akhir Sebelum Tanggal <?php echo $TGLAWAL ?></td>
    <td align="right"><?php echo number_format($StokAwal,0,',','.') ?></td>
</tr>
<?php 
    $sisa = 0 + $StokAwal;
    foreach($dataPreview->result_array() as $x): 
    $sisa = $sisa + $x['JMASUK'] - $x['JKELUAR'];
?>
<tr>
    <td><?php echo date('d-m-Y',strtotime($x['DTTRANS'])) ?></td>
    <td><?php echo $x['NOREFF'] ?></td>
    <td><?php echo getKetNota($x['JTRANS']) . " (" .  $x['KETERANGAN'] . ")"  ?></td>
    <td align="right"><?php echo number_format($x['JMASUK'],0,',','.') ?></td>
    <td align="right"><?php echo number_format($x['JKELUAR'],0,',','.') ?></td>
    <td align="right"><?php echo number_format($sisa,0,',','.') ?></td>
</tr>
<?php 
    endforeach; 
?>