<?php 
    $i=1;
    $subTotal = 0;
    //print_r($dataPreview->result_array());
    foreach($dataPreview->result_array() as $x): 
?>
<tr>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo date('d-m-Y',strtotime($x['DTMT'])) ?></td>
    <td><?php echo $x['KDMT'] ?></td>
    <td><?php echo $x['KDBRG'] ?></td>
    <td><?php echo $x['NMBRG'] ?></td>
    <td><?php echo $x['NMSATUAN'] ?></td>
    <td><?php echo $x['JENISBRG'] ?></td>
    <td><?php echo $x['NMLOKASI'] ?></td>
    <td><?php echo $this->m_laporan->get_field('NMLOKASI','tbl04_lokasi','KDLOKASI',$x['LOKASI_TUJUAN']) ?></td>
    <td align="right" style="font-weight: bolder;"><?php echo number_format($x['JMLMT'],0,',','.') ?></td>
</tr>
<?php endforeach; ?>

