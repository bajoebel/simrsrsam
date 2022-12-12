<?php 
    if($SQL->num_rows() > 0):
        $i = 1;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $x['id_daftar']; ?></td>
    <td><?php echo $x['nomr']; ?></td>
    <td><?php echo $x['nama']; ?></td>
    <td><?php echo getRuangByRegUnit($x['reg_unit']); ?></td>
    <td class="rataTengah">
        <?php if($x['id_kembali']==""): ?>
        <a href="#" class="btn btn-danger" onclick="pilihKunjungan('<?php echo $x['id_daftar'] ?>','<?php echo $x['reg_unit'] ?>','<?php echo $x['nomr'] ?>','<?php echo $x['nama'] ?>','<?php echo getRuangByRegUnit($x['reg_unit']) ?>')">
            <i class="fa fa-check"></i> Pilih
        </a>        
        <?php
            else: 
                echo "Dokumen telah dikembalikan.<br/>Dengan kode rekap : " . $x['id_kembali'];
            endif; 
        ?>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="6" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak ditemukan</td>
</tr>
<?php endif; ?>