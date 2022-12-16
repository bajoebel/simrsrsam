<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['reg_unit']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['tgl_masuk'])); ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['tgl_lahir'])); ?></td>
    <td><?php echo ($x['jns_kelamin']=='1') ? 'Laki-Laki' : 'Perempuan'; ?></td>
    <td><?php echo getStatusDaftarByID($x['status_daftar']); ?></td>
    <td><?php echo getJenisPelayananByID($x['id_cara_bayar']); ?></td>
    <td>
        <a href="#" class="btn btn-danger" onclick="pilihPasien('<?php echo $x['idx'] ?>','<?php echo $x['id_ruang'] ?>')">
            <i class="fa fa-check"></i> Pilih
        </a>  
        <!--
        <a href="#" class="btn btn-danger" onclick="edit('<?php echo $x['idx'] ?>')">
            <i class="fa fa-check"></i> <?php echo getRuangByID($x['id_ruang']); ?>
        </a>  
        -->    
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="11" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="11">Data tidak ditemukan</td>
</tr>
<?php endif; ?>