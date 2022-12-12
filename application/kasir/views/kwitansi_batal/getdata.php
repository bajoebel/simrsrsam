<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="rataTengah"><?php echo $i++  ?></td>
        <td class="rataTengah"><?php echo $x['kode_retur'] ?></td>
        <td class="rataTengah"><?php echo date('d-m-Y H:i',strtotime($x['tgl_retur']))  ?></td>
        <td class="rataTengah"><?php echo $x['no_kwitansi'] ?></td>
        <td><?php echo $x['alasan'] ?></td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="5" class="rataKanan"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="5">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
