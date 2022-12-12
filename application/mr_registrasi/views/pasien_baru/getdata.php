<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['no_ktp']; ?></td>
    <td><?php echo $x['nama']; ?></td>
    <td><?php echo ($x['jns_kelamin']=="1" || $x["jns_kelamin"]=="L") ? "Pria" : "Wanita"; ?> </td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_lahir'])); ?></td>
    <td><?php echo $x['alamat']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_daftar'])); ?></td>
    <td>
        <button href="#" class="btn btn-danger" <?php echo ($x['nomr']=="") ? "disabled" : ""; ?> onclick="cetak('<?php echo $x['nomr'] ?>')" title="Cetak Kartu Berobat dan Stiker">
            <i class="fa fa-print"></i>
        </button>
        <button href="#" class="btn btn-danger" onclick="edit('<?php echo $x['idx'] ?>')" title="Edit Data Pasien">
            <i class="fa fa-edit"></i> 
        </button>  
        <button href="#" class="btn btn-danger" <?php echo ($x['nomr']=="") ? "disabled" : ""; ?> onclick="history('<?php echo $x['nomr'] ?>')" title="Lihat Data Pasien">
            <i class="fa fa-search"></i> 
        </button>       
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="9" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="9">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
