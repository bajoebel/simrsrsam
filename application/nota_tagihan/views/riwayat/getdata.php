<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
        $unikID=encrypt_decrypt('encrypt',$x['reg_unit'],true);
        if($x['jns_layanan']=="RI") $link = base_url() ."mr_registrasi.php/registrasi/reg_success_ranap?uid=" . $unikID;
        elseif($x['jns_layanan']=="GD") $link = base_url() ."mr_registrasi.php/registrasi/reg_success_igd?uid=" . $unikID;
        else $link = base_url() ."mr_registrasi.php/registrasi/reg_success?uid=" . $unikID;
?>
<tr class="<?php echo ($x['State']=='Active') ? '' : 'cancel';  ?>">    
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_masuk'])); ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo $x['cara_bayar']; ?></td>
    <td><?php echo $x['jns_layanan']; ?></td>
    <td><?php echo $x['State']; ?></td>
    <td><?php echo ($x['State']=='Active') ? getNamaUserByID($x['user_daftar']) : getNamaUserByID($x['userBatal']); ?></td>
    <td><a href="<?= $link ?>" class="btn btn-success btn-sm"><span class='fa fa-list'></span> Detail</a></td>
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="11">Data tidak ditemukan</td>
</tr>
<?php endif; ?>