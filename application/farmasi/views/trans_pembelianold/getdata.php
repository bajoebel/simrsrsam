<?php 
    if($SQL->num_rows() > 0):
        $i = 1 + $offset;
    foreach($SQL->result_array() as $x): 
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $x['KDBL']; ?></td>
    <td><?php echo date('d-m-Y H:i',strtotime($x['DTBL'])); ?></td>
    <td><?php echo $x['NMSUPPLIER']; ?></td>
    <td><?php echo $x['NOFAKTUR']; ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['TGLFAKTUR'])); ?></td>
    <td><?php echo date('d-m-Y',strtotime($x['TGLTERIMA'])); ?></td>
    <td class="rightAlign"><?php echo number_format($x['GRANDTOT'],0,',','.') ?></td>
    <td><?php echo $x['PEMBAYARAN']; ?></td>
    <td>
        <button class="btn btn-danger" onclick="cetak('<?php echo $x['KDBL'] ?>')" title="Print Data">
            <i class="fa fa-print"></i></button>
        <button  class="btn btn-danger" onclick="batal('<?php echo $x['KDBL'] ?>')" title="Retur Data">
            <i class="fa fa-ban"></i></button>
    </td>
</tr>
<?php endforeach;?>
<tr>
    <td colspan="10" style="text-align: right"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="10">Data tidak ditemukan</td>
</tr>
<?php endif; ?>