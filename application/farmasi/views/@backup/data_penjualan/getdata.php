<?php 
    if($SQL->num_rows() > 0):
    foreach($SQL->result_array() as $x): 
?>
    <tr>
        <td class="centerObj"><?php echo date('d-m-Y H:i:s',strtotime($x['DTJL'])) ?></td>
        <td class="centerObj"><?php echo $x['KDJL'] ?></td>
        <td class="centerObj"><?php echo date('d-m-Y',strtotime($x['TGLRESEP'])) ?></td>
        <td class="centerObj"><?php echo $x['userNamaLengkap'] ?></td>
        <td class="centerObj"><?php echo $x['NOMR'] ?></td>
        <td class="centerObj"><?php echo $x['NMPASIEN'] ?></td>
        <td class="rightObj"><?php echo number_format($x['GRANDTOT'],0,'.',',') ?></td>
        <td class="centerObj"><?php echo $x['NMLOKASI'] ?></td>
        <td class="centerObj"><?php echo $x['NMRUANGAN'] ?></td>
        <td class="centerObj">
            <button class="btn" type="button" onclick="cetak('<?php echo $x['KDJL'] ?>')">
                <i class="icon icon-print"></i> Cetak</button>
            <button class="btn" type="button" onclick="cetakTicket('<?php echo $x['KDJL'] ?>')">
                <i class="icon icon-print"></i> E Ticket</button>
            <!--
            <button class="btn" type="button" onclick="edit('<?php echo $x['KDJL'] ?>')">
                <i class="icon icon-edit"></i> Edit</button>
            -->
        </td>
    </tr>
<?php endforeach;?>
<tr>
    <td colspan="10" class="rightObj"><?php echo $this->ajax_page->create_links(); ?></td>
</tr>
<?php else: ?>
<tr>
    <td colspan="10">Data tidak ditemukan</td>
</tr>
<?php endif; ?>
