<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
        $unikID=encrypt_decrypt('encrypt',$x['reg_unit'],true);
        if($x['jns_layanan']=="RI") $link = base_url() ."mr_registrasi.php/registrasi/reg_success_ranap?uid=" . $unikID;
        elseif($x['jns_layanan']=="GD") $link = base_url() ."mr_registrasi.php/registrasi/reg_success_igd?uid=" . $unikID;
        else $link = base_url() ."mr_registrasi.php/registrasi/reg_success?uid=" . $unikID;
        $sep = $x['jns_layanan'] ."-". date('Ymd', strtotime($x['tgl_masuk'])) ."-". str_pad($x["id_ruang"], 2, "0", STR_PAD_LEFT) ."-";

        $reg_unit = $this->users_model->generate_kode($x["idx"],$sep,date('Y-m-d', strtotime($x['tgl_masuk'])), $x["id_ruang"]);
?>
<tr class="<?php echo ($x['State']=='Active') ? '' : 'cancel';  ?>">    
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama_pasien']; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $reg_unit; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_masuk'])); ?></td>
    <td><?php echo $x['nama_ruang']; ?></td>
    <td><?php echo $x['cara_bayar']; ?></td>
    <td><?php echo $x['jns_layanan']; ?></td>
</tr>
<?php endforeach;else: ?>
<tr>
    <td colspan="11">Data tidak ditemukan</td>
</tr>
<?php endif; ?>