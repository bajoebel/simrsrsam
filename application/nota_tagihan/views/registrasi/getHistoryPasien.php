<?php 
    if($getHistory->num_rows() > 0):
        $i = 1;
        foreach($getHistory->result_array() as $xHis): 
            $unikID=encrypt_decrypt('encrypt',$xHis['reg_unit'],true);
            if($xHis['jns_layanan']=="RI") $link = base_url() ."mr_registrasi.php/registrasi/reg_success_ranap?uid=" . $unikID;
            elseif($xHis['jns_layanan']=="GD") $link = base_url() ."mr_registrasi.php/registrasi/reg_success_igd?uid=" . $unikID;
            else $link = base_url() ."mr_registrasi.php/registrasi/reg_success?uid=" . $unikID;
?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $xHis['id_daftar'] ?></td>
        <td><a href='<?= $link ?>' class='btn btn-default btn-xs'><?php echo $xHis['reg_unit'] ?></a></td>
        <td><?php echo $xHis['tgl_masuk'] ?></td>
        <td><?php echo $xHis['nama_ruang'] ?></td>
        <td><?= $xHis['cara_bayar'] ."(".$xHis['jenis_peserta'].")"?></td>
        <td><?php echo $xHis['jns_layanan'] ?></td>
        <td><?php echo $xHis['user_daftar'] ?></td>
    </tr>
<?php endforeach; else: ?>
    <tr><td colspan="7">Data tidak ditemukan</td></tr>
<?php endif; ?>