<?php 
    if($dataPreview->num_rows() > 0):
	$i=1;
    foreach($dataPreview->result_array() as $x):
	$SQL1 = "SELECT count(b.`id_user`) as jumRJ FROM t_pendaftaran b WHERE b.`id_user`= '$x[NIP]' and (DATE(b.`tgl_reg`) >= '$TGLAWAL' AND DATE(b.`tgl_reg`) <= '$TGLAKHIR')";
	$data1 = $this->db->query("$SQL1")->row_array();
	
	$SQL2 = "SELECT count(c.`user_admisi`) as jumRI FROM t_admissi_ranap c WHERE c.`user_admisi`= '$x[NIP]' and (DATE(c.`tgl_masuk`) >= '$TGLAWAL' AND DATE(c.`tgl_masuk`) <= '$TGLAKHIR')";
	$data2 = $this->db->query("$SQL2")->row_array();
	
	$jumlah = $data1['jumRJ'] + $data2['jumRI'];
?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
		<td><?php echo $x['nama_lengkap']; ?></td>
        <td align="right"><?php echo $data1['jumRJ']; ?></td>
		<td align="right"><?php echo $data2['jumRI']; ?></td>
		<td align="right"><?php echo $jumlah; ?></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="5" align="left">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
