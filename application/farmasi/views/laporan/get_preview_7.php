<?php 
    $i=1;
    $subTotal = 0;
    ////////////////////////////////print_r($dataDetailPreview->result_array());
    //echo "<br>";
    foreach($dataPreview->result_array() as $x): 
?>
<tr>
    <td align="center"><?php echo $i++; ?></td>
    <td align="center"><?php echo date('d-m-Y',strtotime($x['DTJL'])) ?></td>
    <td align="center"><?php echo date('d-m-Y',strtotime($x['TGLRESEP'])) ?></td>
    <!--td><?php //echo $x['ID_DAFTAR'] ?></td-->
	<td><?php echo $x['NOMR'] ?></td>
    <td><?php /*echo $this->m_laporan->get_field('nama','m_pasien','nomr',$x['NOMR'],'simrs') ; */ //print_r($this->m_laporan->get_field('nama','m_pasien','nomr',$x['NOMR'],'simrs')); 
    echo $x['NMPASIEN'];
    ?></td>
    <td align="center"><?php echo $x['NMJPASIEN'] ?></td>
    <td><?php echo $x['NMDOKTER'] ?></td>
    <td><?php echo $x['NMRUANGAN'] ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" style="font-weight: bolder;"><?php echo number_format($x['Total'],2,',','.') ?></td>
</tr>
<?php 
    $subTotal = $subTotal + ($x['Total']);
        foreach($dataDetailPreview->result_array() as $y): 
        if($x['KDJL']==$y['KDJL']):
?>      
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<!--td>&nbsp;</td-->
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $y['NMBRG'] ?></td>
    <td align="right"><?php echo number_format($y['SISA'],0,',','.') ?></td>
    <td align="right"><?php echo number_format($y['HJUAL'],2,',','.') ?></td>
    <td align="right"><?php echo number_format($y['DISKON'],2,',','.') ?></td>
    <td align="right"><?php echo number_format($y['R'],0,',','.') ?></td>
    <td align="right"><?php echo number_format($y['Total'],2,',','.') ?></td>
    <td>&nbsp;</td>
</tr>
<?php                    
        endif;
        endforeach;
    endforeach; 
?>
<tr>
    <td colspan="14" align="right">Total</td>
    <td align="right" style="font-weight: bolder;"><?php echo number_format($subTotal,2,',','.') ?></td>
</tr>
