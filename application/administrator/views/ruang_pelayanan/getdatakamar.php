<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
        foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['nama_kamar']; ?></td>
    <td><?php echo "Kelas " .$x['kelas_layanan']; ?></td>
    <td><?php echo $x['jml_tt'] ?></td>
    <td><?php if($x['jekel']==0) echo "P"; else if($x['jekel'] == 1) echo "L"; else echo "L/P" ?></td>
    <td><?php if($x["status_kamar"]==1) echo "<span class='btn btn-success '>Aktif</span>"; else echo "<span class='btn btn-danger '>Non Aktif</span>"; ?></td>
    <td>
        <button type="button" class="btn btn-danger" onclick="edit('<?php echo $x['id_kamar'] ?>')">
            <i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $x['id_kamar'] ?>')">
            <i class="fa fa-remove"></i></button>
    </td>

</tr>
<?php endforeach;?>
<tr>
    <td colspan="7" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="7">Data tidak ditemukan</td>
</tr>
<?php endif; ?>