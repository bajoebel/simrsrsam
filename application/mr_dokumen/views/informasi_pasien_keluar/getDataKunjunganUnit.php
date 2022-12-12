<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_keluar'])); ?></td>
    <td><?php echo $x['id_daftar'].'<br/>'.$x['reg_unit']; ?></td>
    <td><?php echo $x['nomr'].'<br/>'.$x['nama_pasien']; ?></td>
    <td><?php echo ($x['jns_kelamin']==0) ? "Perempuan" : "Laki-Laki"; ?></td>
    <td><?php echo $x['nama_dpjp']; ?></td>
    <td><?php echo $x['cara_keluar'].'<br/>'.$x['keadaan_keluar']; ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="batalPulang('<?php echo $x['idx'] ?>')">
            <i class="fa fa-ban"></i> Batal
        </a>  
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="8" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="8">Data tidak ditemukan</td>
</tr>
<?php endif; ?>